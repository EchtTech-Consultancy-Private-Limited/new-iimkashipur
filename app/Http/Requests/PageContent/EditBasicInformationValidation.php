<?php

namespace App\Http\Requests\PageContent;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class EditBasicInformationValidation extends FormRequest
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
            'page_title_en'=> 'required|unique:dynamic_content_page_metatag,page_title_en,'.$Id.',uid',
            'page_title_hi'=> 'required',
            // 'description_en'=> 'required',
            // 'description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'page_title_en.required'=> 'Enter page title name.',
            'page_title_en.unique'=> 'Enter Unique Title Name.',
            'page_title_hi.required'=> 'Enter Hindi Title Name.',
            // 'description_en.required'=> 'Enter description English.',
            // 'description_hi.required'=> 'Enter description Hindi.',


        ];
    }
}
