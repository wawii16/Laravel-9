<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'store_name' => 'required',
            'owner' => 'required',
            'photo' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'founded_date' => 'required|date',

        ];
    }
}
