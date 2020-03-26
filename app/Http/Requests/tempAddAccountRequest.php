<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tempAddAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'email'=> 'required|email|unique:users,email',
            'password1'=>'required|between:1,32|same:password2',
        ];
    }

    public function messages()
    {
        return[     
            'email.required'=> 'メールアドレスを入力してください。',
            'email.email'=> 'メールアドレスの形式が正しくありません。',
            'email.unique'=> 'すでに同じメールアドレスが登録されています。',
            'password1.required'=>'パスワードを入力してください。',
            'password1.between'=>'パスワードは1~32文字で入力して下さい。',
            'password1.same'=>'パスワードが一致しません。',
           ];   
    }
}
