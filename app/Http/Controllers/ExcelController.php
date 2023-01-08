<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Http\Requests\ExcelRequest;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ExcelRequest $request)
    {
        Excel::import(new ProductsImport, $request->safe()->excel);

        return redirect()->back()->with('success', 'All good!');

    }

    public function export(Request $request, $batch = null)
    {
        $batch = $batch ?? Product::max('batch');

        return Excel::download(new ProductsExport($batch), str_replace('{*}',$batch,EXCEL_NAME));
    }
}
