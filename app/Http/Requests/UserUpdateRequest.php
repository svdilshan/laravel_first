<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule as RuleRule;
#use Illuminate\Validation\Rule;


class UserUpdateRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            'name'=>['required'],
            'email'=>['required','email' ,Rule::unique('users')->ignore($this->user->id, )],
            'role_id'=>['required' ]
           
        ];
    }
    
}
  #'email'=>['required','email', Role::unique('users')->ignore($this->user->id)],