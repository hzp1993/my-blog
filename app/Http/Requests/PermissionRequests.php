<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class PermissionRequests extends FormRequest
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
            'name'          => 'required',
            'display_name'  => 'required',
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
            'name.required'             =>  trans('tips.permission.Url cannot be empty'),
            'display_name.required'     =>  trans('tips.permission.Name cannot be empty'),
        ];
    }
}
