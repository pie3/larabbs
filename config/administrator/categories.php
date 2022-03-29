<?php

use App\Models\Category;

return [
    // 页面标题
    'title' => '分类',

    // 模型单例，用作页面 【新建 $single】
    'single' => '分类',

    // 数据模型，用作数据的 CRUD
    'model' => Category::class,

    // 对 CRUD 动作的单独权限控制，其他动作不指定默认为通过
    'action_permissions' => [
        // 删除权限控制
        'delete' => function () {
            // 只有站长才能删除话题分类
            return Auth::user()->hasRole('Founder');
        }
    ],

    // 字段负责渲染 【数据表格】，由无数的 【列】组成
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '名称',
            'sortable' => false,
        ],
        'description' => [
            'title' => '描述',
            'sortable' => false,
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],

    // 【模型表单】设置项
    'edit_fields' => [
        'name' => [
            'title' => '名称',
        ],
        'description' => [
            'title' => '描述',
            'type' => 'textarea',
        ],
    ],

    // 【数据过滤】设置
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '名称',
        ],
        'description' => [
            'title' => '描述',
        ],
    ],

    // 新建和编辑时的表单验证规则
    'rules' => [
        'name' => 'required|min:1|unique:categories',
    ],

    // 表单验证错误时定制错误消息
    'messages' => [
        'name.required' => '请确保名字至少一个字符以上！',
        'name.unique' => '分类名在数据库里有重复，请选用其他名称！',
    ]
];
