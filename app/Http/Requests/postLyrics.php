<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class postLyrics extends FormRequest
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
            'lyrics_title' => 'required|between:1,50',
            'lyrics_comment'=> 'required|between:1,128', 
            'lyrics_contents'=> 'required|between:1,600', 
        ];
    }

    public function messages()
    {
        return[     
            'lyrics_title.required' => 'タイトルを入力してください。',
            'lyrics_title.between' => 'タイトルは1~50文字で入力して下さい。',
            'lyrics_comment.required'=> 'コメントが入力されていません。',
            'lyrics_comment.between' => 'コメントは1~128文字で入力して下さい。',
            'lyrics_contents.required'=>'歌詞を入力してください。',
            'lyrics_contents.between'=>'歌詞は1~600文字で入力して下さい。',
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
