<?php

namespace App\Http\Requests\ModuleManagement;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class EditManualFileUploadValidation extends FormRequest
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
            'title_name'=> 'required|unique:manual_file_uploads,title_name,'.$Id.',uid',
            //'file_path' => "required|mimes:jpeg,bmp,png,gif,svg,pdf,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp|max:10240"
        ];
    }
    public function messages()
    {
        return [
            'title_name.required'=> 'Enter Title Name.',
            'title_name.unique'=> 'Enter Unique title Name.',
            //'file_path.dimensions'=> 'file is required.',
        ];
    }
}
