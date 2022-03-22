<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
                // CREATE
            case 'POST':
                // UPDATE
            case 'PUT':
            case 'PATCH': {
                    return [
                        'content' => 'required|min:2',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default: {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [
            'content.required' => '评论内容不能为空',
            'content.min' => '评论内容必须至少两个字符',
        ];
    }
}
