<?php


use app\learncenter\model\SystemParamModel;

class LcGov
{

    private $url1 = "http://110.88.";
    private $url2 = "153.177:901";
    private $path = "/Convergence/webservice/ConvergenceService?wsdl";

    const 推送表 = "WEB612";
    const 题库 = "WEB611";
    const 文章内容 = "WEB610";
    const 做题记录 = "WEB609";
    const 用户信息 = "WEB608";
    const 用户表 = "WEB607";
    const 礼物表 = "WEB606";
    const 礼物记录 = "WEB605";
    const 文章 = "WEB604";
    const 题目 = "WEB603";

    private function url()
    {
        return $this->url1 . $this->url2 . $this->path;
    }

    public function Login(): string
    {
        $userid = SystemParamModel::where("key", "userid")->value("val");
        $password = SystemParamModel::where("key", "password")->value("val");
        $array = [
            "userid" => $userid,
            "password" => $password
        ];
        $client = new SoapClient($this->url());
        $ret = $client->LoginByAccount($array);
        return $ret->return;
    }

    public function pushXml($guid, $xml)
    {

    }

}