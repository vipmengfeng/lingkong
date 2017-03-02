<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class EmployerController extends CommonController {
	//员工账号添加
	public function add_employer(){
        if(IS_POST){
            $Model_USER=M("user_c");
            $data = $Model_USER->create($_POST);
            $uid=$this->get_user_id();
            $this->repet_colums($Model_USER,'username',$data['username'],"用户名",$uid);
            if($data['user_perm']=='employer'||$data['user_perm']=='finances'){
                $data['password']=md5($data['password']);
                $data['id']=md5(time()+$uid+$this->get_user_company());
                $data['parent']=$this->get_user_id();
                $data['company']=$this->get_user_company();
                $data['addtime']=time();
                $Model_USER->add($data);
                $res_arr=array("","res_tip"=>"添加完成","status"=>1);
            }else{
                $res_arr=array("","res_tip"=>"添加失败","status"=>0);
            }
            $this->ajaxReturn($res_arr);
        }else{
            $this->display("/add_employer");
        }

    }
    /*
        *描述：刷新系统管理员列表
        *
        *
    */
     public function fresh_employer(){
        $Model_USER=M("user_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['parent']=array('in',"0,$uid");
        $result=$Model_USER->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            $result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
        }
        $this->ajaxReturn($result,$info,$status,$type);
        
     }
     /*
        *描述：列出系统管理员
        *
        *
    */
     public function list_employer(){
        $Model_USER=M("user_c");
        $uid=$this->get_user_id();
        $where['parent']=array('in',"0,$uid");
        $result=$Model_USER->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            $result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
        }
        $this->assign('list',$result);
        $this->display("/table_basic");
        
     }

    /*
        *描述：重置密码，仅限普通店员和财务账号的编辑
        *
        *
    */
    public function reset_employer(){
        $id=I("id");
        $Model_USER=M("user_c");
        $where=array();
        $data['password']=md5(123456);
        $where['id']=$id;
        $result=$Model_USER->where($where)->save($data);
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*
        *描述：删除系统管理员，店长账号除外
        *
        *
    */
    public function del_employer(){
        $id=I("id");
        $Model_USER=M("user_c");
        $where=array();
         $where['id']=$id;
        $result=$Model_USER->where($where)->delete();
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*
        *描述：锁定系统管理员
        *
        *
    */
    public function lock_employer(){
        $id=I("id");
        $Model_USER=M("user_c");
        $where=array();
         $where['id']=$id;
        $data['status']=0;
        $result=$Model_USER->where($where)->save($data);
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }


    }
    /*
        *描述：解锁系统管理员
        *
        *
    */
    public function unlock_employer(){
        $id=I("id");
        $Model_USER=M("user_c");
        $where=array();
        $where['id']=$id;
        $data['status']=1;
        $result=$Model_USER->where($where)->save($data);
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }

    }

}