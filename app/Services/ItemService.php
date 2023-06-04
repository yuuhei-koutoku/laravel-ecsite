<?php

namespace App\Services;

class ItemService
{
    public static function csvDownload($products)
    {
        $productsArr = $products->toArray()['data'];
        $download_file = getenv('HOME') . '/Downloads/' . 'products_' . date('Y-m-d_H-i-s', strtotime('now')) . '.csv';
        file_put_contents($download_file, "商品ID, 商品名, カテゴリー, 価格, 詳細\n");
        foreach ($productsArr as $product) {
            file_put_contents($download_file,
            $product['id'] . ',' .
            $product['name'] . ',' .
            $product['category'] . ',' .
            $product['price'] . ',' .
            $product['information'] . "\n",
            FILE_APPEND | LOCK_EX);
        }
    }
}
