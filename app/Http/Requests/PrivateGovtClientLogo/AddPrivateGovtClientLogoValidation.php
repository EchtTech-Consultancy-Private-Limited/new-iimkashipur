<?php

namespace App\Http\Requests\PrivateGovtClientLogo;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class AddPrivateGovtClientLogoValidation extends FormRequest
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
            'title_name_en'=>['required',
                    new UniqueTitleNotSoftDeleted('private_government_clients', 'title_en', 'soft_delete'),
            ],
            'tabtype'=> 'required',
            'logo_url'=> 'required',
            'image' => "required|mimes:jpeg,bmp,png,gif,svg|max:2048|dimensions:max_width=230,max_height=80"
        ];
    }
    public function messages()
    {
        return [
            'tabtype.required'=> 'Select Tab Type',
            'title_name_en.unique'=> 'Enter Unique title Name.',
            'title_name_en.required'=> 'English name is required.',
            'logo_url.required'=> 'Logo url is required.',
            'image.dimensions'=> 'Image is required max_width=230,max_height=80',

        ];
    }
}