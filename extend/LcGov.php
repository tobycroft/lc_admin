<?php


use app\learncenter\model\SystemParamModel;

class LcGov
{

    private $url1 = "http://110.88.";
    private $url2 = "153.177:901";
    private $path = "/Convergence/webservice/ConvergenceService?wsdl";

    private function url()
    {
        return $this->url1 . $this->url2 . $this->path;
    }

    public function Login()
    {
        $userid = SystemParamModel::where("key", "userid")->value("val");
        $password = SystemParamModel::where("key", "password")->value("val");
        $array = [
            "userid" => $userid,
            "password" => $password
        ];
        return Net::Soap_wsdl($this->url());
    }

}