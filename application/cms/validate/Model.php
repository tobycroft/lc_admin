<?php


namespace app\cms\validate;

use think\Validate;

/**
 * 文档模型验证器
 * @package app\cms\validate
 */
class Model extends Validate
{
    // 定义验证规则
    protected $rule = [
        'name|模型标识'  => 'require|regex:^[a-z]+[a-z0-9_]{0,39}$|unique:cms_model',
        'title|模型标题' => 'require|length:1,30|unique:cms_model',
        'table|附加表'  => 'regex:^[#@a-z]+[a-z0-9#@_]{0,60}$|unique:cms_model',
    ];

    // 定义验证提示
    protected $message = [
        'name.regex' => '模型标识由小写字母、数字或下划线组成，不能以数字开头',
        'table.regex' => '附加表由小写字母、数字或下划线组成，不能以数字开头',
    ];

    // 定义场景
    protected $scene = [
        'edit' =>  ['title'],
    ];
}
