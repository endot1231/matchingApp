<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class postProfile extends FormRequest
{
 /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile_name'=> 'required|between:1,32', 
            'profile_comment'=> 'required|between:1,255', 
        ];
    }

    public function messages()
    {
        return[     
            'profile_name.required' => 'ユーザー名を入力してください。',
            'profile_name.between' => 'ユーザー名は1~32文字で入力して下さい。',
            'profile_comment.required'=> 'コメントが入力されていません。',
            'profile_comment.between' => 'コメントは1~255文字で入力して下さい。',
           ];       
    }

         /**
     * @Override
     * 勝手にリダイレクトさせない
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     */
    protected function failedValidation(Validator $validator) {
        $res = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ], 400);
        throw new HttpResponseException($res);
    }

    /**
     * バリデータを取得する
     * @return  \Illuminate\Contracts\Validation\Validator  $validator
     */
    public function getValidator()
    {
        return $this->validator;
    }
}
