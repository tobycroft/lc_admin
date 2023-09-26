<?php

namespace app\learncenter\action;

use app\learncenter\model\QuizQsModel;

class Push
{
    public function timu()
    {
        $datas = QuizQsModel::select();
        $xml = new \LcGov();
        $xml->builder("add");
        foreach ($datas as $data) {

        }
    }


}