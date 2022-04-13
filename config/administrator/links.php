<?php

use App\Models\Link;
use Illuminate\Support\Facades\Auth;

return [
    // 页面标题
    'title' => '资源推荐',

    // 模型单例，用作页面 【新建 $single】
    'single' => '资源推荐',

    // 数据模型，用作数据的 CRUD
    'model' => Link::class,

    // 访问权限判断
    'permission' => function () {
        // 只允许站长管理资源推荐链接
        return Auth::user()->hasRole('Founder');
    },

    // 字段负责渲染 【数据表格】，由无数的 【列】组成
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title' => '名称',
            'sortable' => false,
        ],
        'link' => [
            'title' => '链接',
            'sortable' => false,
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],

    // 【模型表单】设置项
    'edit_fields' => [
        'title' => [
            'title' => '名称',
        ],
        'link' => [
            'title' => '链接',
        ],
    ],

    // 【数据过滤】设置
    'filters' => [
        'id' => [
            'title' => '标签 ID',
        ],
        'title' => [
            'title' => '名称',
        ],
    ],

    // 新建和编辑时的表单验证规则
    'rules' => [
        'title' => 'required|min:1',
    ],

    // 表单验证错误时定制错误消息
    'messages' => [
        'title.required' => '请确保名称至少一个字符以上！',
    ]
];
