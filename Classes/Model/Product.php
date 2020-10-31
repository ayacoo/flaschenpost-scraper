<?php
declare(strict_types=1);

namespace Ayacoo\Flaschenpost\Model;

class Product
{

    protected int $id = 0;

    protected int $categoryId = 0;

    protected string $subCategory = '';

    protected int $subCategoryId = 0;

    protected string $name = '';

    protected string $description = '';

    protected float $price = 0.00;

    protected float $oldPrice = 0.00;

    protected float $savings = 0.00;

    protected string $image = '';

    protected string $link = '';

    protected string $type = '';

    protected bool $offer = false;

    protected bool $oneWay = false;

    protected bool $multiWay = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getSubCategory(): string
    {
        return $this->subCategory;
    }

    /**
     * @param string $subCategory
     */
    public function setSubCategory(string $subCategory): void
    {
        $this->subCategory = $subCategory;
    }

    /**
     * @return int
     */
    public function getSubCategoryId(): int
    {
        return $this->subCategoryId;
    }

    /**
     * @param int $subCategoryId
     */
    public function setSubCategoryId(int $subCategoryId): void
    {
        $this->subCategoryId = $subCategoryId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getOldPrice(): float
    {
        return $this->oldPrice;
    }

    /**
     * @param float $oldPrice
     */
    public function setOldPrice(float $oldPrice): void
    {
        $this->oldPrice = $oldPrice;
    }

    /**
     * @return float
     */
    public function getSavings(): float
    {
        return $this->savings;
    }

    /**
     * @param float $savings
     */
    public function setSavings(float $savings): void
    {
        $this->savings = $savings;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isOffer(): bool
    {
        return $this->offer;
    }

    /**
     * @param bool $offer
     */
    public function setOffer(bool $offer): void
    {
        $this->offer = $offer;
    }

    /**
     * @return bool
     */
    public function isOneWay(): bool
    {
        return $this->oneWay;
    }

    /**
     * @param bool $oneWay
     */
    public function setOneWay(bool $oneWay): void
    {
        $this->oneWay = $oneWay;
    }

    /**
     * @return bool
     */
    public function isMultiWay(): bool
    {
        return $this->multiWay;
    }

    /**
     * @param bool $multiWay
     */
    public function setMultiWay(bool $multiWay): void
    {
        $this->multiWay = $multiWay;
    }
}