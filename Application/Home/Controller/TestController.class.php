<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class TestController extends CommonController {
   public function _initialize(){
        header("Content-type: text/html; charset=utf-8");
        if($this->get_user_roles()!="试用"){
            echo "test权限不足：错误代码:000000003";
            exit;
        }
    }
    


}