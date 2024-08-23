<?php

namespace App\Http\Requests\PageContent;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;


class AddPageBannerValidation extends FormRequest
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
            'page_title_en'=>['required',
                    new UniqueTitleNotSoftDeleted('dynamic_content_page_metatag', 'page_title_en', 'soft_delete'),
            ],
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
            'page_title_en.required'=> 'Enter Title Name.',
            'page_title_en.unique'=> 'Enter Unique Title Name.',
            'title_name_hi.required'=> 'Enter Hindi Title Name.',
            'start_date.required'=> 'Enter start Date.',
            'end_date.required'=> 'Enter End Date.',
            'description_en.required'=> 'Enter description English.',
            'description_hi.required'=> 'Enter description Hindi.',

        ];
    }
}
