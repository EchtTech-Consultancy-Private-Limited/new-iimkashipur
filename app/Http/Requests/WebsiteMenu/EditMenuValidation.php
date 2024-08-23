<?php

namespace App\Http\Requests\WebsiteMenu;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class EditMenuValidation extends FormRequest
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
            'name_en'=> 'required|unique:website_menu_management,name_en,'.$Id.',uid',
            'sort_order'=> 'required',
            // 'title_name_hi'=> 'required',
            // 'start_date'=> 'required',
            // 'end_date'=> 'required',
            // 'description_en'=> 'required',
            // 'description_hi'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'sort_order.required'=> 'Enter sort order',
            'name_en.required'=> 'Enter Unique menu Name.',
            'name_en.unique'=> 'Enter menu Name.',
            // 'title_name_hi.required'=> 'Enter Hindi Title Name.',
            // 'start_date.required'=> 'Enter start Date.',
            // 'end_date.required'=> 'Enter End Date.',
            // 'description_en.required'=> 'Enter description English.',
            // 'description_hi.required'=> 'Enter description Hindi.',

        ];
    }
}
