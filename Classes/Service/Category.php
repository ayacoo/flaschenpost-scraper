<?php
declare(strict_types=1);

namespace Ayacoo\Flaschenpost\Service;

class Category
{
    protected array $categories = [
        'water' => [1, 2, 3, 4, 5, 51, 89],
        'beer' => [6, 10, 7, 12, 13, 15, 9, 47, 83, 8, 190, 191, 88],
        'lemonade' => [18, 19, 20, 21, 22, 46, 52, 84, 85, 24],
        'juice' => [96, 97, 98, 99, 100, 101, 102, 103, 126, 105, 104, 106, 107],
        'wine' => [56, 55, 57, 63, 58, 64],
        'spirits' => [77, 73, 75, 74, 193, 194, 195, 196]
    ];
}