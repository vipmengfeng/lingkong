<?php
namespace Home\Controller;
use Think\Controller;
class DisplayController extends Controller {

	//首页
    public function index(){
    	header("Content-type: text/html; charset=utf-8");
    	$this->display("/login_new");

        }
    
    //注册
    public function register(){

    	$this->display("/register");
    }

    }
?>