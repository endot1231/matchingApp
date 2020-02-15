<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addAccount extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:1,32',
            'email'=> 'email',
            'email'=> 'unique:users,email',
            'password1'=>'required|between:1,32|same:password2',
        ];
    }

    public function messages()
    {
        return[     
            'name.required' => 'ユーザー名をしてください。',
            'name.between' => 'ユーザー名は1~32文字で入力して下さい。',
            'email.email'=> 'メールアドレスの形式が正しくありません。',
            'email.unique'=> 'すでに同じメールアドレスが登録されています。',
            'password1.required'=>'パスワード入力してください。',
            'password1.between'=>'パスワードは1~32文字で入力して下さい。',
            'password1.same'=>'パスワードが一致しません。',
           ];   
    }
}
