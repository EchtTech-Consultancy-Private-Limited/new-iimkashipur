<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class EditNewsValidation extends FormRequest
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
            'title_name_en'=> 'required|unique:news_management,title_name_en,'.$Id.',uid',
            'tabtype'=> 'required',
            'startdate'=> 'required',
            'enddate'=> 'required',
           // 'kt_description_en'=> 'required',
            //'kt_description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'tabtype.required'=> 'Select Tab Type',
            'title_name_en.required'=> 'Enter Unique Title Name.',
            'title_name_en.unique'=> 'Enter Title Name.',
            'title_name_hi.required'=> 'Enter Hindi Title Name.',
            'startdate.required'=> 'Enter start Date.',
            'enddate.required'=> 'Enter End Date.',
           // 'kt_description_en.required'=> 'Enter description English.',
           // 'kt_description_hi.required'=> 'Enter description Hindi.',

        ];
    }
}
