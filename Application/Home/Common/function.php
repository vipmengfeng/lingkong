<?php
//获得登录地址
 function get_login_url(){

    	return "/index.php/home/display/index";
    }
    //获得用户中心首页地址
 function get_user_index_url($mod){
    	return "/index.php/home/".$mod."/user_index";
    }
    //表单未提交错误
 function FormGetErr(){

    	echo "function FormGetErr 报错！";
    }
function mxget_roles(){


}


/*计算天数 
*参数：时间戳 
*返回：数组array
*/
function get_days($start,$end){
    	$_minutes=($end-$start)/60;

    	$_hours=floor($_minutes/60);

    	if($_hours>=24){
    		$_days=floor($_hours/24);
    	}else{
    		$_days=0;
    	}

    	$l_hours=$_hours%24;

    	$days['day']=$_days;
    	$days['hour']=$l_hours;
    	return $days;
}









































//判断是否登录
function is_login(){
	$se=session('uid');
		 if(empty($se)){
		 	header("Content-type: text/html; charset=utf-8");
			  redirect("/Index.php/home/index/index", 2, '非法访问，正在跳转...');
			  exit;
			 }
		}
//获取角色某模块内权限,比如删除，添加，修改，审核等右侧横向菜单权限。返回 0 代表无权限
function get_module_perm($perm,$m_per,$modid){
			 is_login();
			 $perm_name=D('mxweb_perm');
			 $whereA=array();
			 $whereA['peimission_name']=$m_per;//中文横向菜单名称
			 $whereA['moduleid']=$modid;       //模块的id，修改系统菜单架构后 变为主菜单下的栏目id，但该id不固定，所以该处错误待修正，但通过名称获取id时可用
			 $resultA=$perm_name->where($whereA)->find();
			
			 $roles = D('mxweb_roles');
			 $where = array();
             $where['id'] = $perm;   //角色id
             $result = $roles->where($where)->find();
			 
				if(strpos($result['perm'],$resultA['id'])===false){
				return 0;
				}else{
					return 1;
					}
		  	
			
		}
//获取登录角色主要菜单权限，返回0代表无权限,$pem: 角色id，$pem_r:菜单ID
function get_menu_perm($perm,$perm_r){
 		 is_login();
 		 $roles = D('mxweb_roles');
			 $where = array();
             $where['id'] = $perm;
             $result = $roles->where($where)->find();
				if(strpos($result['menu_perm'],$perm_r)==false){
					return 0;
		  		}else{
					return 1;
				}

}
//获取角色模块权限,返回 0 代表无权限,$pem: 角色id，$pem_r:模块id
function get_user_perm($perm,$perm_r){
			 is_login();
			 $roles = D('mxweb_roles');
			 $where = array();
             $where['id'] = $perm;
             $result = $roles->where($where)->find();
				if(strpos($result['mod_perm'],$perm_r)==false){
					return 0;
				
		  	}else{
				return 1;
				}
	 
	 }
//获取当前账户模块内功能权限列表，右侧菜单使用
function get_user_allperm($perm){
			 is_login();
			 $roles = D('mxweb_roles');
			 $where = array();
             $where['id'] = $perm;
             $result = $roles->where($where)->find();
			 return $result['perm'];
	}

//权限错误提示
function perm_err_message($str){
		if($str==0)
		{
			exit("没有权限");
			
		}
	}
	
	
//安装模块主要安装mxweb_meun，mxweb_perm以及管理员权限分配
function mod_install($module_name,$name_en,$list){
		 header("Content-type: text/html; charset=utf-8");
		 //安装模块，自动验证模块名称是否已经存在
		 $mx_menu =  D("mxweb_menu");
		 $mx_roles  =  D("mxweb_roles");
		 $mx_perm   =  D('mxweb_perm');
		 $where     =  array();
		 $resid_list=   array();
		 $data['name']   =$module_name;
		 $data['menu_en'] =$name_en;
		  if(!$mx_menu->create($data)){
			  exit($mx_menu->getError());
			  }else{
				  $install_id=$mx_menu->add();
				  //向网站管理员追加该模块权限
				  if($install_id){ 
						$where['id']=array('in','1,2');
						$result_perm=$mx_roles->where($where)->find();
						$data_p['menu_perm']=$result_perm['menu_perm'].",".$install_id;
						$mx_roles->where($where)->save($data_p);
				 		echo "模块安装完成!<br/>";
				   }else{
					  	  echo "安装失败！";
				        }
		 };
		 //安装模块功能菜单
		foreach($list as $v){
			$list_install[]=array('peimission_name'=>$v,'moduleid'=>$install_id);
			}
		foreach($list_install as $v){
			$result=$mx_perm->add($v);
			$resid_list[]=$result;
			}
			//分配超级管理员功能权限
			$result_perm=$mx_roles->where($where)->find();
			foreach($resid_list as $v){
				$data_perm['perm'].=",".$v;
			}
			$data_perm['perm']=$result_perm['perm'].$data_perm['perm'];
			$mx_roles->where($where)->save($data_perm);
			echo "模块菜单安装完成!<br/>";
			echo "超级管理员权限分配完成";
		
		}	
//新增模块功能，追加管理员权限
function mod_add($name,$list){
	header("Content-type: text/html; charset=utf-8");
		 $mx_roles  =  D("mxweb_roles");
		 $mx_perm   =  D('mxweb_perm');
		 $install_id=get_mod_id($name);
		 $where['id']=array('in','1,2');
		 $data_p['mod_perm']=$install_id;
		 $result_perm=$mx_roles->where($where)->find();
		foreach($list as $v){
			$list_install[]=array('peimission_name'=>$v,'moduleid'=>$install_id);
			}
		foreach($list_install as $v){
			$result=$mx_perm->add($v);
			$resid_list[]=$result;
			}
			//分配超级管理员功能权限
			$result_perm=$mx_roles->where($where)->find();
			foreach($resid_list as $v){
				$data_perm['perm'].=",".$v;
			}
			$data_perm['perm']=$result_perm['perm'].$data_perm['perm'];
			$mx_roles->where($where)->save($data_perm);
			echo "模块菜单安装完成!<br/>";
			echo "超级管理员权限分配完成";
	}
/*后台不显示某菜单
$mod_name :模块名称
$name     :需要隐藏的功能名称
*/
function display_no($mod_name,$name){
	$mx_perm   =  D('mxweb_perm');
	$where     =  array();
	$where['peimission_name']=$name;
	$where['moduleid']=get_mod_id($mod_name);
	$data['is_display']=0;
	$mx_perm->where($where)->save($data);
	}
	
//获得模块ID
function get_mod_id($name){
	 $mx_menu =  D("mxweb_menu");
	 $where     =  array();
	 $where['name']=$name;
	 $result    =  $mx_menu->where($where)->find();
	 //perm_err_message(count($result));
	 
	 return $result['id'];
	}	
//获取某模块功能操作菜单
function get_mod_menus($id){
	$mx_perm =  D("mxweb_perm");
	$where     =  array();
	$where['moduleid']=$id;
	$where['is_display']='1';
	$result    =  $mx_perm->where($where)->select();
	return $result;
	//dump($result);
	}
	
//获取右侧菜单
function get_right_menu($module_name,$listAll){
		header("Content-type: text/html; charset=utf-8");
		 is_login();
		 $show_menu=array();
		 $show_menu_ico=array();
		  $result= get_mod_menus(get_mod_id($module_name));
		  $perm_str=get_user_allperm(session('user_perm'));
		  //dump($perm_str);
		  foreach($result as $v){
			 if(strpos($perm_str,$v['id'])==true){
				 $show_menu[]=$v['peimission_name'];
				 }
			 }
			foreach($show_menu as $v){
				$show_menu_ico[]=array_search($v,$listAll);
				}
			$res_array=array_combine($show_menu_ico,$show_menu);
			return $res_array;
	}

//获取后台左侧菜单列表，$pem为session('user_perm')
function main_menu($pem){
	$mx_menu   =  D("mxweb_menu");
	$mx_moudle   =  D("mxweb_module");
	$where     =  array();
	$result_menu=$mx_menu->select();
	$arr_c=array();
	$arr_r=array();
	foreach ($result_menu as $value) {
		if(get_menu_perm($pem,$value['id'])==1){
					$arr_r[]=$value;
				}
			}
		foreach ($arr_r as $value) {
		unset($where); 
		unset($arr_c); 
		$where['parent_id']=$value['id'];
		$module_result=$mx_moudle->where($where)->select();
		foreach ($module_result as $key => $value2) {
				$arr_c['name']=$value2['name'];
				$arr_c['id']=$value2['id'];
			$arr_b[]=$arr_c;
			}
		$value['ids']=$arr_b;
		$return_result[]=$value;
	}
	return $return_result;

}


	
	
?>