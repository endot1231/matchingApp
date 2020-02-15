<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class postMusic extends FormRequest
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
            'music_title' => 'required|between:1,50',
            'music_comment'=> 'required|between:1,128',
            'music_file'=>'required|mimes:mpga,wav',
        ];
    }

    public function messages()
    {
        return[     
            'music_title.required' => 'タイトルを入力してください。',
            'music_title.between' => 'タイトルは1~50文字で入力して下さい。',
            'music_comment.required'=> 'コメントが入力されていません。',
            'music_comment.between' => 'コメントは1~128文字で入力して下さい。',
            'music_file.required'=>'ファイルが選択されていません。',
            'music_file.mimes:mpga,wav'=>'ファイル形式が正しくありません。ファイルはWAV及びMP3のみ投稿できます。',
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
