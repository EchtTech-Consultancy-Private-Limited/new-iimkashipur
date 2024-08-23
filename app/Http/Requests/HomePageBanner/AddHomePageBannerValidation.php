<?php

namespace App\Http\Requests\HomePageBanner;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class AddHomePageBannerValidation extends FormRequest
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
        $imgsizeW = 'max_width='.env('BANNER_WIDTH')??'1900';
        $imgsizeH = 'max_height='.env('BANNER_HEIGHT')??'500';
        
        return [
            'title_name_en'=>['required',
                    new UniqueTitleNotSoftDeleted('home_page_banner_management', 'title_name_en', 'soft_delete'),
            ],
            'tabtype'=> 'required',
            'title_name_hi'=> 'required',
            'image'=> "required|mimes:jpeg,bmp,png,gif,svg|max:2048|dimensions:".$imgsizeW.','.$imgsizeH,
        ];
    }
    public function messages()
    {
        $imgsizeW = 'max_width='.env('BANNER_WIDTH')??'1900';
        $imgsizeH = 'max_height='.env('BANNER_HEIGHT')??'500';
        return [
            'title_name_en.unique'=> 'Enter Unique title Name.',
            'title_name_en.required'=> 'English name is required.',
            'title_name_hi.required'=> 'Hindi name is required.',
            'image.dimensions'=> 'Image is required.'.$imgsizeW.','.$imgsizeH,
        ];
    }
}
