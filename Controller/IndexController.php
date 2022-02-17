<?php

namespace Controller;

class IndexController{
    public function IndexAction(){
        require_once("./req/template/main/index.php");
        echo $_GET["id"];
    }

    public function ErrorAction($code = 500){
        echo "Error: ".$code;exit;
    }
}