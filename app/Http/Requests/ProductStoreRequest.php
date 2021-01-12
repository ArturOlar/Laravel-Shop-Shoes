<?php

namespace App\Http\Requests;

use App\Model\Brand;
use App\Model\Category;
use App\Model\GenderCategory;
use App\Model\Size;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        $tableGender =(new GenderCategory())->getTable();
        $tableCategory =(new Category())->getTable();
        $tableBrand =(new Brand())->getTable();
        $tableSize = (new Size())->getTable();

        return [
            'name' => 'required|min:3|max:25',
            'price' => 'required|min:3',
            'id_gender' => "required|integer|exists:{$tableGender},id_gender",
            'id_category' => "required|integer|exists:{$tableCategory},id_category",
            'id_brand' => "required|integer|exists:{$tableBrand},id_brand",
            'id_size' => "required",
        ];
    }
}
