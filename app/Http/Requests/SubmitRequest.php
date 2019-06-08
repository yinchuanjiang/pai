<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'POST':
            {
                return [
                    'files' => 'required',
                    'files.*' => 'required|file|mimes:jpeg,gif,png,mpga',
                    'wp_pai_category_id' => 'required',
                    'is_anonymous' => 'required|in:1,-1',
                    'mobile' => 'required|max:11|min:11',
                    'content' => 'required|max:1000'
                ];
            }
            case 'PUT':
            case 'PATCH':
            case 'DELETE':
            default: {
                return [];
            }
        }
    }
    public function messages()
    {
        return [
            'files.required'=>'图片不能为空',
            'files.*.required' => '有图片格式不正确',
            'files.*.file' => '有图片格式不正确',
            'wp_pai_category_id.required'=>'曝光类型必须选择',
            'is_anonymous' => '非法请求是否匿名选项',
            'mobile.required' => '手机号不能为空',
            'mobile.max' => '手机号格式不正确',
            'mobile.min' => '手机号格式不正确',
            'content.required' => '情况描述不能为空',
            'content.max' => '情况描述最多为1000个字符',
        ];
    }
}
