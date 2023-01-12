<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutfitRequest extends FormRequest
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
            'item' => 'required',
            'name' =>'max:100',
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'item.required' => 'アイテムは必ず選択してください。'
        ];
    }
}
