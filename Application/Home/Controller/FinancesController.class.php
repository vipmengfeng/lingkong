<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class FinancesController extends CommonController {
   public function _initialize(){
        header("Content-type: text/html; charset=utf-8");
        if($this->get_user_roles()!="财务"){
            echo "Finances权限不足：错误代码:000000004";
            exit;
        }
    }
    


}