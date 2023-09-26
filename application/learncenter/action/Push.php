<?php

namespace app\learncenter\action;

use app\learncenter\model\QuizQsModel;

class Push
{
    public function timu()
    {
        $datas = QuizQsModel::select();
        $xml = new \LcGov();
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
        return $xml->toXml();

    }


}