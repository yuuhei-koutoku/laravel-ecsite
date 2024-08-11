<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\StreamedResponse;

class ItemService
{
    public static function csvDownload($products, $type)
    {
        $csvHeader = ['商品ID', '商品名', '値段', 'カテゴリー', '詳細'];

        if ($type === 'all_pages') {
            $csvData = $products->toArray();
            $filename = 'all_products_'.date('Y-m-d_H-i-s', strtotime('now')).'.csv';
        }

        if ($type === 'current_page') {
            $csvData = $products->toArray()['data'];
            $filename = 'current_page_products_'.date('Y-m-d_H-i-s', strtotime('now')).'.csv';
        }

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                unset($row['sort_order'], $row['filename']);
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename = '.$filename,
        ]);

        return $response;
    }
}
