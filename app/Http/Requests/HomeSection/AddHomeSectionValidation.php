<?php

namespace App\Http\Requests\HomeSection;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;

class AddHomeSectionValidation extends FormRequest
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
            'section_name_en'=>['required',
                    new UniqueTitleNotSoftDeleted('home_page_sections_list', 'title_en', 'soft_delete'),
            ],
            'section_name_hi'=> 'required',
            'sort_order'=>['required',
                    new UniqueTitleNotSoftDeleted('home_page_sections_list', 'sort_order', 'soft_delete'),
            ],
            //'sort_order'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'section_name_en.required'=> 'Enter English Name.',
            'section_name_en.unique'=> 'Enter Unique Name.',
            'section_name_hi.required'=> 'Enter Hindi Name.',
            'sort_order.required'=> 'Enter Sort Order.',
            'sort_order.unique'=> 'Enter Unique Order Number.',

        ];
    }
}
