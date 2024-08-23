<?php

namespace App\Http\Requests\DepartmentDesignation;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;

class AddDepartmentValidation extends FormRequest
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
            'name_en'=>['required',
                    new UniqueTitleNotSoftDeleted('emp_depart_designations', 'name_en', 'soft_delete'),
            ],
            'name_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_en.required'=> 'Enter English Name.',
            'name_en.unique'=> 'Enter Unique Name.',
            'name_hi.required'=> 'Enter Hindi Name.',

        ];
    }
}
