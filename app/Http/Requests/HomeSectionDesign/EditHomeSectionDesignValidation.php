<?php

namespace App\Http\Requests\HomeSectionDesign;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;


class EditHomeSectionDesignValidation extends FormRequest
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
        if($request->kt_description_en != "<p><br></p>"){
            $request['kt_description_en'] =$request->kt_description_en;
        }else{
            $request['kt_description_en'] = '';
        }
        return [
            'kt_description_en'=>'required',
            'section_id'=> 'required',
            'sort_order'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'kt_description_en.required'=> 'Enter description.',
            'section_id.required'=> 'Select Section ID.',
            'sort_order.required'=> 'Enter Sort Order.',

        ];
    }
}
