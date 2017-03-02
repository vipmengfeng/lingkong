<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->display("/index_v3");
	}
    //登录
    public function login(){
        header("Content-type: text/html; charset=utf-8");
        if(IS_POST){
        $username=I("username");
        $password=I("password");
        $Model_USER=M("user_c");
        $data = $Model_USER->create($_POST);
        $where=array();
        $where['username'] = $data['username'];
        $result=$Model_USER->where($where)->find();
         // 验证用户名 对比 密码
         if ($result && $result['password'] == md5($data['password'])) {
             if($result['status']==0){
                 redirect(get_login_url(), 2, '该账户已经锁定，不能登录！...');
                 exit;
                 }
             $data['password']=md5($data['password']);
             $data['lasttime']=time();
             $data['lastip']=get_client_ip();
             // 存储session
             session('uid', $result['id']);              // 当前用户id
             session('nickname', $result['nickname']);   // 当前用户昵称
             session('ucompany', $result['company']);   // 当前用户所属公司
             session('username', $result['username']);   // 当前用户名
             session('lasttime', $result['lasttime']);   // 上一次登录时间
             session('lastip',   $result['lastip']);       // 上一次登录ip
             session('user_perm',$result['user_perm']);  //用户角色
             // 更新用户登录信息
             $where['id'] = session('uid');
             $Model_USER->where($where)->setInc('loginnum');   // 登录次数加 1
             $Model_USER->where($where)->save($data);   // 更新登录时间和登录ip
             //$this->success(0, get_user_index_url(session('user_perm')));
             header("Location: /index.php/home/admin/user_index");
         } else {
             redirect(get_login_url(), 2, '账户密码错误，不能登录！...正在跳转至登录页面');
         }
     }else{
        FormGetErr();
     }
    }
    //注册
    public function register(){
        if(IS_POST){
            $Model_USER=M("user_c");
            $data = $Model_USER->create($_POST);
            $data['password']=md5($data['password']);
            $data['nickname']=I("username");
            $data['id']=md5(time());
            $data['addtime']=time();
            $userid=$Model_USER->add($data);
            if(!empty($userid)){
                //新增用户所属总公司
                $Model_CHILD_COMPANY=M("child_company");
                $data_company_child['company_name']="总公司";
                $data_company_child['userid']=$userid;
                $data_company_child['company_type']=1;
                $companyid=$Model_CHILD_COMPANY->add($data_company_child);
                //新增用户所属总公司总店
                $Model_STORE_C=M("store_c");
                $data_store_c['store_name']="总店";
                $data_store_c['parent_id']=$companyid;
                $data_store_c['store_type']=1;
                $Model_STORE_C->add($data_store_c);
                $this->success('注册成功,正跳转至系统登录页面...', get_login_url());
            }else{
                echo "注册失败!";
            }

            
        }else{
        FormGetErr();
        }
    }
    //退出
    public function logout(){
        header("Content-type: text/html; charset=utf-8");
        session(null);
        redirect(get_login_url(), 2, '正在退出登录...');
    }


}