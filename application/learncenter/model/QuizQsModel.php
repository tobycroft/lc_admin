<?php


namespace app\learncenter\model;

use think\Model;

/**
 * 后台用户模型
 * @package app\admin\model
 */
class QuizQsModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'lc_quiz_qs';

    // 设置当前模型对应的完整数据表名称

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

}
