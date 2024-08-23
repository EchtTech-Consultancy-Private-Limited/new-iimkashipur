<?php

namespace App\Http\Requests\PageContent;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;


class AddPageContentValidation extends FormRequest
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
            'kt_summernote_en'=>['required',
                    new UniqueTitleNotSoftDeleted('dynamic_page_content', 'page_content_en', 'soft_delete'),
            ],
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
