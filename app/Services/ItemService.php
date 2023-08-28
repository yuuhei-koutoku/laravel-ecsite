<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\StreamedResponse;

class ItemService
{
    public static function csvDownload($products)
    {
        $csvHeader = ['商品ID', '商品名', 'カテゴリー', '価格', '詳細'];
        $csvData = $products->toArray()['data'];

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename = products_" . date('Y-m-d_H-i-s', strtotime('now')) . ".csv",
        ]);

        return $response;
    }
}
