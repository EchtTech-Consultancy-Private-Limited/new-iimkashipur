<?php

namespace App\Http\Requests\EmployeeDirectory;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;

class AddEmployeeDirectoryValidation extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'tab_type'=> 'required',
            'fname_en'=> 'required',
            'mname_en'=> 'required',
            'lname_en'=> 'required',
            'fname_hi'=> 'required',
            'mname_hi'=> 'required',
            'lname_hi'=> 'required',
            'mobile'=> 'required',
            'email'=> ['required','string','email','max:50','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'department_id'=> 'required',
            'designation_id'=> 'required',
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
