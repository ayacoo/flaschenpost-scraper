<?php

declare(strict_types=1);

use Ayacoo\Flaschenpost\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {
    /**
     * @var Product
     */
    protected $subject;

    public function setUp(): void
    {
        $this->subject = new \Ayacoo\Flaschenpost\Model\Product();
    }

    /**
     * @test
     */
    public function getIdReturnsInteger() {
        $expected = 123;
        $this->subject->setId($expected);
        $this->assertEquals($expected, $this->subject->getId());
    }
}