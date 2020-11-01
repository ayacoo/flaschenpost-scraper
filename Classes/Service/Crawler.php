<?php
declare(strict_types=1);

namespace Ayacoo\Flaschenpost\Service;

use Ayacoo\Flaschenpost\Model\Product;
use DOMDocument;
use DOMNodeList;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Cookie\CookieJar;

class Crawler
{
    protected const ONE_WAY = 'EINWEG';

    protected const MULTI_WAY = 'MEHRWEG';

    /**
     * @param string $postal
     * @return array
     */
    public function getRecommendations(string $postal = ''): array
    {
        $storage = [];
        $content = $this->getContentByPostal('https://www.flaschenpost.de', $postal);
        if ($content) {
            libxml_use_internal_errors(true);

            $doc = new \DOMDocument;
            $doc->loadHTML($content, LIBXML_ERR_NONE);
            $xpath = new \DOMXPath($doc);

            $slides = $xpath->query('//*[@class="swiper-container swiper-container--cms "]/div[3]/div[@class="swiper-slide"]/div');
            $numberOfSlides = $slides->length ?? 0;
            for ($i = 0; $i < $numberOfSlides; $i++) {
                $product = new Product();
                $product->setId((int)$slides->item($i)->getAttribute('data-article'));
                $product->setCategoryId((int)$slides->item($i)->getAttribute('data-category'));
                $product->setSubCategoryId((int)$slides->item($i)->getAttribute('data-sub-category'));
                $product->setSubCategory($slides->item($i)->getAttribute('data-sub-category-name'));

                $slideHtml = $doc->saveHTML($slides->item($i));

                $slideDoc = new \DOMDocument;
                $slideDoc->preserveWhiteSpace = false;
                $slideDoc->loadHTML($slideHtml, LIBXML_ERR_NONE);
                $xpath = new \DOMXPath($slideDoc);

                $productNameDom = $xpath->query('//*[@class="cms-offer-element-header--name"]');
                if ($productNameDom->item(0)->firstChild) {
                    $product->setName($this->handleDomElement($slideDoc, $productNameDom));
                }

                $productInfoDom = $xpath->query('//*[@class="cms-offer-element-header--alcohol-info"]');
                if ($productInfoDom->item(0)) {
                    $product->setDescription($this->handleDomElement($slideDoc, $productInfoDom));
                }

                $priceInfoDom = $xpath->query('//*[@class="cms-offer-element-infos--price"]');
                if ($priceInfoDom->item(0)) {
                    $price = str_replace(',', '.', $this->handleDomElement($slideDoc, $priceInfoDom));
                    $product->setPrice((float)$price);
                }

                $oldPriceDom = $xpath->query('//*[@class="cms-offer-element-infos-price--old"]');
                if ($oldPriceDom->item(0)) {
                    $oldPrice = str_replace(',', '.', $this->handleDomElement($slideDoc, $oldPriceDom));
                    $product->setOldPrice((float)$oldPrice);
                    $product->setOffer(true);

                    if ($product->getPrice() > 0.00) {
                        $savings = round((($product->getOldPrice() / $product->getPrice()) * 100) - 100);
                        $product->setSavings($savings);
                    }
                }

                $typeDom = $xpath->query('//*[@class="cms-offer-element--bottle-type"]');
                if ($typeDom->item(0)->firstChild) {
                    $type = $this->handleDomElement($slideDoc, $typeDom);
                    if ($type === self::MULTI_WAY) {
                        $product->setMultiWay(true);
                    }
                    if ($type === self::ONE_WAY) {
                        $product->setOneWay(true);
                    }
                }

                $imageDom = $xpath->query('//*[@class="cms-offer-element--image"]/img');
                if ($imageDom->item(0)) {
                    $product->setImage($imageDom->item(0)->getAttribute('src'));
                }

                $linkDom = $xpath->query('//a[@class="cms-offer-element-header--link"]');
                if ($linkDom->item(0)) {
                    $product->setLink('https://www.flaschenpost.de' . $linkDom->item(0)->getAttribute('href'));
                }

                $storage = $this->addProductToStorage($product, $storage);
            }
        }

        return $storage;
    }

    /**
     * @param DOMDocument $doc
     * @param DOMNodeList $element
     * @return string
     */
    protected function handleDomElement(DOMDocument $doc, DOMNodeList $element): string
    {
        return utf8_decode($doc->saveHTML($element->item(0)->firstChild));
    }

    /**
     * @param string $url
     * @param string $postal
     * @return bool|string
     */
    protected function getContentByPostal(string $url, string $postal)
    {
        $client = new Client();
        try {
            $cookieJar = CookieJar::fromArray([
                'fp-account-zipcode-fee' => 'False',
                'fp-account-zipcode-fee-limit' => '0,0',
                'fp-htlp-zipcode' => $postal,
                'fp-htlp' => '1',
                'fp-account-zipcode' => $postal
            ], '.flaschenpost.de');
            $response = $client->request('GET', $url, ['cookies' => $cookieJar]);
            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {

        }

        return false;
    }

    /**
     * @param Product $product
     * @param array $storage
     * @return array
     */
    protected function addProductToStorage(Product $product, array $storage): array
    {
        $storage[] = [
            'id' => $product->getId(),
            'categoryId' => $product->getCategoryId(),
            'subCategory' => $product->getSubCategory(),
            'subCategoryId' => $product->getSubCategoryId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'offer' => $product->isOffer(),
            'price' => $product->getPrice(),
            'oldPrice' => $product->getOldPrice(),
            'oneWay' => $product->isOneWay(),
            'multiWay' => $product->isMultiWay(),
            'link' => $product->getLink(),
            'image' => $product->getImage(),
            'savings' => $product->getSavings()
        ];
        return $storage;
    }
}