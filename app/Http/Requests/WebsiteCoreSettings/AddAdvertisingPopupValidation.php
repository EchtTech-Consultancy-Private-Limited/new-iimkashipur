<?php

namespace App\Http\Requests\WebsiteCoreSettings;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class AddAdvertisingPopupValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'tab_type'=> 'required',
            'title_name_en'=> 'required|unique:career_management',
            'title_name_hi'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
            'description_en'=> 'required',
            'description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'tab_type.required'=> 'Select Tab Type',
            'title_name_en.required'=> 'Enter Unique Title Name.',
            'title_name_en.unique'=> 'Enter Title Name.',
            'title_name_hi.required'=> 'Enter Hindi Title Name.',
            'start_date.required'=> 'Enter start Date.',
            'end_date.required'=> 'Enter End Date.',
            'description_en.required'=> 'Enter description English.',
            'description_hi.required'=> 'Enter description Hindi.',

        ];
    }
}
