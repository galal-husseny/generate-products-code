<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToCollection , SkipsEmptyRows, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        Validator::make($collection->toArray(), [
            '*.item_name' => ['required'],
            '*.item_stock_quantity' => ['required', 'numeric']
        ])->validate();

        $batch = Product::max('batch') + 1 ;
        // dd($batch);
        foreach ($collection as $row)
        {
            $strArray = explode(" ", $row['item_name']);
            $productName ="";
            foreach (array_chunk($strArray,5) as $sub) {
                $productName .= trim(implode(" ",$sub)) . "\n";
            }
            Product::updateOrCreate([
                'name' => $productName
            ],
            [
                'name' => $productName ?? '',
                'price' => $row['item_stock_value'] ?? 0,
                'quantity' => $row['item_stock_quantity'] ?? 0,
                'batch' => $batch
            ]);
        }
    }
}
