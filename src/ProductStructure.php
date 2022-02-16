<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    protected function convertToArray(array $products): array
    {
        $array = [];
        foreach ($products as $product) {
            $arr = explode("-", $product);

            if (!array_key_exists($arr[0], $array)) {
                $array[$arr[0]] = [$arr[1] => 1];
            } else {
                if (!array_key_exists($arr[1], $array[$arr[0]])) {
                    $array[$arr[0]][$arr[1]] = 1;
                } else {
                    $array[$arr[0]][$arr[1]] += 1;
                }
            }
        }
        return $array;
    }

    public function make(): array
    {
        return $this->convertToArray(self::products);
    }
}