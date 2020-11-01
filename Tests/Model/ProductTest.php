<?php

declare(strict_types=1);

namespace Ayacoo\Flaschenpost\Tests\Model;

use Ayacoo\Flaschenpost\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @var Product
     */
    protected Product $subject;

    public function setUp(): void
    {
        $this->subject = new \Ayacoo\Flaschenpost\Model\Product();
    }

    /**
     * @test
     */
    public function getIdReturnsInteger()
    {
        $expected = 123;
        $this->subject->setId($expected);
        $this->assertEquals($expected, $this->subject->getId());
    }

    /**
     * @test
     */
    public function getCategoryIdReturnsInteger()
    {
        $expected = 123;
        $this->subject->setCategoryId($expected);
        $this->assertEquals($expected, $this->subject->getCategoryId());
    }

    /**
     * @test
     */
    public function getSubCategoryReturnsString()
    {
        $expected = 'flaschenpost';
        $this->subject->setSubCategory($expected);
        $this->assertEquals($expected, $this->subject->getSubCategory());
    }

    /**
     * @test
     */
    public function getNameReturnsString()
    {
        $expected = 'flaschenpost';
        $this->subject->setName($expected);
        $this->assertEquals($expected, $this->subject->getName());
    }

    /**
     * @test
     */
    public function getDescriptionReturnsString()
    {
        $expected = 'flaschenpost';
        $this->subject->setDescription($expected);
        $this->assertEquals($expected, $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getPriceReturnsFloat()
    {
        $expected = 0.00;
        $this->subject->setPrice($expected);
        $this->assertEquals($expected, $this->subject->getPrice());
    }

    /**
     * @test
     */
    public function getOldPriceReturnsFloat()
    {
        $expected = 0.00;
        $this->subject->setOldPrice($expected);
        $this->assertEquals($expected, $this->subject->getOldPrice());
    }

    /**
     * @test
     */
    public function getSavingsReturnsFloat()
    {
        $expected = 0.00;
        $this->subject->setSavings($expected);
        $this->assertEquals($expected, $this->subject->getSavings());
    }

    /**
     * @test
     */
    public function getImageReturnsString()
    {
        $expected = 'flaschenpost';
        $this->subject->setImage($expected);
        $this->assertEquals($expected, $this->subject->getImage());
    }

    /**
     * @test
     */
    public function getLinkReturnsString()
    {
        $expected = 'flaschenpost';
        $this->subject->setLink($expected);
        $this->assertEquals($expected, $this->subject->getLink());
    }

    /**
     * @test
     */
    public function getTypeReturnsString()
    {
        $expected = 'flaschenpost';
        $this->subject->setType($expected);
        $this->assertEquals($expected, $this->subject->getType());
    }

    /**
     * @test
     */
    public function isOfferReturnsBoolean()
    {
        $expected = false;
        $this->subject->setOffer($expected);
        $this->assertEquals($expected, $this->subject->isOffer());
    }

    /**
     * @test
     */
    public function isOneWayReturnsBoolean()
    {
        $expected = false;
        $this->subject->setOneWay($expected);
        $this->assertEquals($expected, $this->subject->isOneWay());
    }

    /**
     * @test
     */
    public function isMultiWayReturnsBoolean()
    {
        $expected = false;
        $this->subject->setMultiWay($expected);
        $this->assertEquals($expected, $this->subject->isMultiWay());
    }

}