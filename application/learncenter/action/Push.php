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
            $xml->add_colums("id", $data["id"], "")
                ->add_colums("quiz_id", $data["quiz_id"], "")
                ->add_colums("tag", $data["tag"], "")
                ->add_colums("title", $data["title"], "")
                ->add_colums("content", $data["content"], "")
                ->add_colums("correct", $data["correct"], "")
                ->add_colums("a", $data["A"], "")
                ->add_colums("b", $data["B"], "")
                ->add_colums("c", $data["C"], "")
                ->add_colums("d", $data["D"], "");

        }
        $xml->toXml();
        return $xml->toXml();

    }


}