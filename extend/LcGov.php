<?php


use app\learncenter\model\SystemParamModel;
use Spatie\ArrayToXml\ArrayToXml;

class LcGov
{

    private $url1 = "http://110.88.";
    private $url2 = "153.177:901";
    private $path = "/Convergence/webservice/ConvergenceService?wsdl";

    public const 推送表 = "WEB612";
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

    private array $xml_array = array();
    private array $xml_arrays = ['row' => []];


    private string $guid;

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
        $this->guid = $ret->return;
        return $ret->return;
    }

    public function pushXml($guid, $xml = null)
    {
        if (empty($this->guid)) {
            $this->Login();
        }
        if (!$xml) {

        }
    }

    public function builder($type): self
    {
        $this->done();
        $this->xml_array = [
            '_attributes' => ['type' => $type]
        ];
        return $this;
    }

    public function add_colums(string $field, mixed $data, string $name, bool $is_attachment = false): self
    {
        if (empty($this->xml_array)) {
            throw new Error("需要先构建");
        }
        $this->xml_array[$field] = [
            '_attributes' => ['name' => $name, 'isattachment' => $is_attachment],
            '_cdata' => $data,
        ];
        return $this;
    }

    public function toString()
    {
        $this->done();
        return json_encode($this->xml_arrays, 320);
    }

    private function done()
    {
        if (!empty($this->xml_array)) {
            $this->xml_arrays['row'][] = $this->xml_array;
            $this->xml_array = [];
        }
    }

    public function toXml()
    {
        $this->done();

        $data = new ArrayToXml($this->xml_arrays, 'table', true, "UTF-8");
        $data->setDomProperties(["formatOutput" => true]);
        return $data->toXml();
    }

}