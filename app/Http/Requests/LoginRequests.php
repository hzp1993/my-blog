<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class LoginRequests extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * [messages 自定义返回]
     * @Author   Jack                     964114968@qq.com
     * @DateTime 2017-04-25T10:57:02+0800
     * @return   [type]   [description]
     */
    public function messages(){
        return [
            'username.required' =>  '用户名不能为空！',
            'password.required' =>  '登录密码不能为空！',
        ];
    }
}
