<?php
namespace Common\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class AdministratorController extends CommonController {
	public function _initialize(){
		header("Content-type: text/html; charset=utf-8");
		if($this->get_user_roles()!="店长"){
			redirect(get_login_url(),2,'权限不足');
		}
	}
}
?>