<?php

namespace Controller;

class IndexController{
    public function IndexAction(){
        require_once("./req/template/main/index.php");
    }

    public function ErrorAction($code = 500){
        echo "Error: ".$code;exit;
    }
}