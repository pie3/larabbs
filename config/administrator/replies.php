<?php

use App\Models\Reply;

return [
    // 页面标题
    'title' => '回复',

    // 模型单例，用作页面 【新建 $single】
    'single' => '回复',

    // 数据模型，用作数据的 CRUD
    'model' => Reply::class,

    // 字段负责渲染 【数据表格】，由无数的 【列】组成
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'content' => [
            'title' => '内容',
            'sortable' => false,
            'output' => function ($value, $model) {
                return '<div style="max-width:220px">' . $value . '</div>';
            },
        ],
        'user' => [
            'title' => '作者',
            'sortable' => false,
            'output' => function ($value, $model) {
                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="' . $avatar . '" style="height:22px;width:22px">' . e($model->user->name);
                return model_link($value, $model->user);
            },
        ],
        'topic' => [
            'title' => '话题',
            'sortable' => false,
            'output' => function ($value, $model) {
                return '<div style="max-width:260px">' . admin_model_link(e($model->topic->title), $model->topic) . '</div>';
            },
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],

    // 【模型表单】设置项
    'edit_fields' => [
        'user' => [
            'title' => '用户',
            'type' => 'relationship',
            'name_field' => 'name',
            // 自动补全，对于大数据量的对应关系，推荐开启自动补全，可防止一次性加载对系统造成负担
            'autocomplete' => true,
            // 自动补全的搜索字段
            'search_fields' => ["CONCAT(id, ' ', name)"],
            // 自动补全排序
            'options_sort_field' => 'id',
        ],
        'topic' => [
            'title' => '话题',
            'type' => 'relationship',
            'name_field' => 'title',
            'search_fields' => ["CONCAT(id, ' ', title)"],
            'options_sort_field' => 'id',
        ],
        'content' => [
            'title' => '内容',
            'type' => 'textarea',
        ],
    ],

    // 【数据过滤】设置
    'filters' => [
        'user' => [
            'title' => '用户',
            'type' => 'relationship',
            'name_field' => 'name',
            'autocomplete' => true,
            'search_fields' => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'topic' => [
            'title' => '话题',
            'type' => 'relationship',
            'name_field' => 'title',
            'autocomplete' => true,
            'search_fields' => array("CONCAT(id, ' ', title)"),
            'options_sort_field' => 'id',
        ],
        'content' => [
            'title' => '回复内容',
        ],
    ],

    // 新建和编辑时的表单验证规则
    'rules' => [
        'content' => 'required',
    ],

    // 表单验证错误时定制错误消息
    'messages' => [
        'content.required' => '请填写回复内容！',
    ]
];
