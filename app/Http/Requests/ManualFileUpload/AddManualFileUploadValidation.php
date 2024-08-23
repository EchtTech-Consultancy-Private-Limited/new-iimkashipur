<?php

namespace App\Http\Requests\ManualFileUpload;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class AddManualFileUploadValidation extends FormRequest
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
            'title_name'=>['required',
                    new UniqueTitleNotSoftDeleted('manual_file_uploads', 'title_name', 'soft_delete'),
            ],
            'file_path' => "required|mimes:jpeg,bmp,png,gif,svg,pdf,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp|max:10240"
        ];
    }
    public function messages()
    {
        return [
            'title_name.required'=> 'Enter Title Name.',
            'title_name.unique'=> 'Enter Unique title Name.',
            'file_path.dimensions'=> 'file is required.',
        ];
    }
}
