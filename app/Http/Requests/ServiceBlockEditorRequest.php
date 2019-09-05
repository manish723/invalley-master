<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceBlockEditorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'edtServiceBlock_cboIcon' => 'required',
            'edtServiceBlock_txtTitle' => 'required',
            'edtServiceBlock_txtPrice' => 'required',
            'edtServiceBlock_txtButtonUrl' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'edtServiceBlock_cboIcon.required' => 'Please select an icon from the list',
            'edtServiceBlock_txtTitle.required' => 'Please enter a title',
            'edtServiceBlock_txtPrice.required' => 'Please enter a price',
            'edtServiceBlock_txtButtonUrl.required' => 'Please enter a button URL'
        ];
    }
}
