<?php

namespace app\learncenter\action;

use app\learncenter\model\ArticleContentModel;
use app\learncenter\model\ArticleModel;
use app\learncenter\model\GiftModel;
use app\learncenter\model\GiftRecordModel;
use app\learncenter\model\PushModel;
use app\learncenter\model\QuizQsModel;
use app\learncenter\model\QuizRecordModel;
use app\learncenter\model\UserInfoModel;
use app\learncenter\model\UserModel;
use LcGov;

class Push
{
    public function timu()
    {
        $datas = QuizQsModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add');
            $xml->add_colums("id", $data["id"], "内容id")
                ->add_colums("quiz_id", $data["quiz_id"], "文章id")
                ->add_colums("tag", $data["tag"], "文章小标签")
                ->add_colums("title", $data["title"], "题目")
                ->add_colums("content", $data["content"], "内容")
                ->add_colums("correct", $data["correct"], "正确选项")
                ->add_colums("a", $data["A"], "选项a")
                ->add_colums("b", $data["B"], "选项b")
                ->add_colums("c", $data["C"], "选项c")
                ->add_colums("d", $data["D"], "选项d");
        }
        echo "\n" . __FUNCTION__;
        return $xml->pushXml(LcGov::题目);
    }


    public function wenzhang()
    {
        $datas = ArticleModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], "文章id")
                ->add_colums('tag_id', $data['tag_id'], "标签id(1新婚期2备孕中3怀孕中4宝宝已出生)")
                ->add_colums('from_day', $data['from_day'], "开始天数")
                ->add_colums('to_day', $data['to_day'], "结束天")
                ->add_colums('title', $data['title'], "标题")
                ->add_colums('img', $data['img'], "背景（无用）")
                ->add_colums('show_type', $data['show_type'], "展示模式（0未设定1原版综合多重结构文章混排2ps类似音频+文章内容3孕期周刊v14新生儿周刊v15备孕周刊v1）");
        }
        echo "\n" . __FUNCTION__;
        return $xml->pushXml(LcGov::文章);
    }

    public function liwubiao()
    {
        $datas = GiftModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums("id", $data["id"], "礼物id")
                ->add_colums("name", $data["name"], "文章id")
                ->add_colums("img", $data["img"], "用户id")
                ->add_colums("type", $data["type"], "类型（'common'|'other'）")
                ->add_colums("num", $data["num"], "礼物余量");
        }
        echo "\n" . __FUNCTION__;
        return $xml->pushXml(LcGov::礼物表);
    }

    public function liwujilu()
    {
        $datas = GiftRecordModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], '记录id')
                ->add_colums('img', $data['img'], '用户id')
                ->add_colums('gift_id', $data['gift_id'], '礼物id')
                ->add_colums('quiz_id', $data['quiz_id'], "题库id")
                ->add_colums('qs_id', $data['qs_id'], '题目id');
        }
        return $xml->pushXml(LcGov::礼物记录);
    }

    public function yonghubiao()
    {
        $datas = UserModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('uid', $data['id'], '用户id')
                ->add_colums('username', $data['username'], '用户名')
                ->add_colums('phone', $data['phone'], '电话')
                ->add_colums('wx_id', $data['wx_id'], '微信opencode')
                ->add_colums('wx_name', $data['wx_name'], '姓名')
                ->add_colums('wx_img', $data['wx_img'], '头像');
        }
        return $xml->pushXml(LcGov::用户表);
    }

    public function yonghuxinxi()
    {
        $datas = UserInfoModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], '信息id')
                ->add_colums('uid', $data['uid'], '用户id')
                ->add_colums('couple_name', $data['couple_name'], '伴侣名字')
                ->add_colums('face', $data['face'], '头像')
                ->add_colums('birthday', $data['birthday'], '生日')
                ->add_colums('marrige_date', $data['marrige_date'], '结婚日期')
                ->add_colums('baby_gender', $data['baby_gender'], '孩子性别')
                ->add_colums('pregnant_date', $data['pregnant_date'], '怀孕日期')
                ->add_colums('baby_birthday', $data['baby_birthday'], '孩子生日')
                ->add_colums('province', $data['province'], '省')
                ->add_colums('city', $data['city'], '市')
                ->add_colums('district', $data['district'], '区')
                ->add_colums('street', $data['street'], '街道')
                ->add_colums('address', $data['address'], '地址');
        }
        return $xml->pushXml(LcGov::用户信息);
    }

    public function wenzhangneirong()
    {
        $datas = ArticleContentModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], '内容id')
                ->add_colums('aid', $data['aid'], '文章id')
                ->add_colums('name', $data['name'], '文章名称')
                ->add_colums('tag', $data['tag'], '文章小标签')
                ->add_colums('title', $data['title'], '标题')
                ->add_colums('url', $data['url'], '音频文件地址')
                ->add_colums('content', $data['content'], '内容');
        }
        return $xml->pushXml(LcGov::文章内容);
    }

    public function tiku()
    {
        $datas = QuizQsModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], '记录id')
                ->add_colums('title', $data['title'], '标题')
                ->add_colums('content', $data['content'], '内容')
                ->add_colums('discription', $data['discription'], '简介')
                ->add_colums('img', $data['img'], '背景图');
        }
        return $xml->pushXml(LcGov::题库);
    }

    public function tuisong()
    {
        $datas = PushModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], '内容id')
                ->add_colums('article_id', $data['article_id'], '文章id')
                ->add_colums('uid', $data['uid'], '用户id');
        }
        return $xml->pushXml(LcGov::推送表);
    }

    public function zuotijilu()
    {
        $datas = QuizRecordModel::select();
        $xml = new LcGov();
        foreach ($datas as $data) {
            $xml->builder('add')
                ->add_colums('id', $data['id'], '记录id')
                ->add_colums('uid', $data['uid'], '用户id')
                ->add_colums('quiz_id', $data['quiz_id'], '题库id')
                ->add_colums('qs_id', $data['qs_id'], '题目id')
                ->add_colums('choice', $data['choice'], '用户选择')
                ->add_colums('is_correct', $data['is_correct'], '是否正确')
                ->add_colums('gift_id', $data['gift_id'], '礼物id');
        }
        return $xml->pushXml(LcGov::做题记录);
    }

}