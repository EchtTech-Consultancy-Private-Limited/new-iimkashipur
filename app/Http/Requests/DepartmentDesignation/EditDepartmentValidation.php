<?php

namespace App\Http\Requests\DepartmentDesignation;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;


class EditDepartmentValidation extends FormRequest
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
    public function rules(Request $request)
    {
        $Id = $request->get('id');
        return [
            'name_en'=> 'required|unique:emp_depart_designations,name_en,'.$Id.',uid',
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
