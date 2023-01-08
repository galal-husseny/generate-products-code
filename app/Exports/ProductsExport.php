<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    private const COLUMNS_NUMBER = 3;

    public function __construct(private int $batch) {

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::select(['name', 'id','quantity'])->where('batch', $this->batch)->get();

        $collection = collect([]);
        $rowCollection = [];
        $columnCounter = 0;

        foreach ($products as $index => $product)
        {
            for ($i = 0; $i < $product->quantity; $i++)
            {
                if ($columnCounter == self::COLUMNS_NUMBER)
                {
                    $collection->push($rowCollection);
                    $columnCounter = 0; # reset counter
                    $rowCollection = []; # reset Row
                }
                $rowCollection[$columnCounter] = "{$product->name} " . PHP_EOL . " {$product->id}";
                $columnCounter++;
            }

        }
        if (!empty($rowCollection))
            $collection->push($rowCollection);
        return $collection;
    }
}
