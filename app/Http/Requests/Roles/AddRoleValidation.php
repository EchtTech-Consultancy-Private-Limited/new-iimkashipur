<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueTitleNotSoftDeleted;
use Illuminate\Http\Request;

class AddRoleValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'role_type'=>['required',
                    new UniqueTitleNotSoftDeleted('role_type_users', 'role_type', 'soft_delete'),
            ],
            'sort_order'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'role_type.unique'=> 'Enter Unique Role Name.',
            'role_type.required'=> 'Enter Role Name.',
            'sort_order.required'=> 'Enter Sort order.',
        ];
    }
}
