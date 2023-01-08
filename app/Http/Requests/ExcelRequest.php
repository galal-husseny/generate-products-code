<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'excel'=>[
                'required',
                'mimes:xlsx,xls,csv',
                'mimetypes:application/csv,application/excel,application/vnd.ms-excel,application/vnd.msexcel,text/csv,text/comma-separated-values',
                'max:10240']
        ];
    }
}
