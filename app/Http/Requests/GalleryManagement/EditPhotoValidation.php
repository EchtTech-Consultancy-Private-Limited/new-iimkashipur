<?php

namespace App\Http\Requests\GalleryManagement;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class EditPhotoValidation extends FormRequest
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
            'title_name_en'=> 'required|unique:gallery_management,title_name_en,'.$Id.',uid',
           // 'section_name_hi'=> 'required',
            //'sort_order'=> 'required',
         //   'sort_order'=> 'required|unique:gallery_management,sort_order,'.$Id.',uid',
        ];
    }
    public function messages()
    {
        return [
            'title_name_en.required'=> 'Enter English Name.',
            'title_name_en.unique'=> 'Enter Unique Name.',
            //'section_name_hi.required'=> 'Enter Hindi Name.',
            //'sort_order.required'=> 'Enter Sort Order.',
        ];
    }
}
