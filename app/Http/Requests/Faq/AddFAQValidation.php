<?php

namespace App\Http\Requests\Faq;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class AddFAQValidation extends FormRequest
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

    public function rules()
    {
        return [
            'question_en'=>['required',
                    new UniqueTitleNotSoftDeleted('faq', 'question_en', 'soft_delete'),
            ],
            'question_hi'=> 'required',
            'kt_description_en'=> 'required',
            'kt_description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'title_name_en.required'=> 'Enter Unique Question Name.',
            'title_name_en.unique'=> 'Enter Question Name.',
            'question_hi.required'=> 'Enter Hindi Question Name.',
            'kt_description_en.required'=> 'Enter description English.',
            'kt_description_hi.required'=> 'Enter description Hindi.',

        ];
    }
}