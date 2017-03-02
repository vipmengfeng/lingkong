<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\EmployerController;
use Common\Controller\Employer;
use Common\Controller\NormalController;
class AdminController extends EmployerController {
   
    /*
        *描述：增加系统管理员，仅限普通店员和财务账号的添加
        *
        *
    */
    public function add_meng(){

        $el=new Employer();
        $el->add();
    }
    
     
    

    public function tongji_zonghe(){
        $this->display("/graph_metrics");
    }

}