<?php

namespace LcGov;
class LcGov
{

    private $url1 = "http://110.88.";
    private $url2 = "153.177:901";
    private $path = "/Convergence/webservice/ConvergenceService?wsdl";

    private function url()
    {
        return $this->url1 + $this->url2 + $this->path;
    }


}