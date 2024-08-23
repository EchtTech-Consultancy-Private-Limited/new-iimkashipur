<?php

namespace App\Http\Requests\PageContent;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;


class EditPageContentValidation extends FormRequest
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
    public function rules(Request $request)
    {
        $Id = $request->get('id');
        return [
            'kt_summernote_en'=> 'required|unique:dynamic_content_page_metatag,page_content_en,'.$Id.',uid',
            'kt_summernote_hi'=> 'required',
            'pageTitle_id'=> 'required',
            // 'description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'kt_summernote_en.required'=> 'Enter description in english.',
            'kt_summernote_hi.required'=> 'Enter description in hindi.',
            'pageTitle_id.required'=> 'Select Page TItle.',
            // 'description_hi.required'=> 'Enter description Hindi.',

        ];
    }
}
