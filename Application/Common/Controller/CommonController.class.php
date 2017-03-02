<?php
namespace Common\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
         header("Content-type: text/html; charset=utf-8");
        //判断session里是否有值
        if(!session('?username')){
            redirect(get_login_url(),2,'请先登陆');
        }
        if(!session('?user_perm')){
        	redirect(get_login_url(),2,'权限错误');
        }
        $perm=array(
                'fance'=>array(),
                'admin'=>array(
                                //员工模块
                               'Employer/add_employer',
                               'Employer/list_employer',
                               'Employer/del_employer',
                               'Employer/unlock_employer',
                               'Employer/lock_employer',
                               'Employer/fresh_employer',
                               'Employer/reset_employer',
                               //财务模块
                               

                               //客户模块
                               'Customer/add_customer',
                               'Customer/get_customers_num',
                               'Customer/customer_detail_ajax',
                               'Customer/del_customer_c',
                               'Customer/add_customer_o',
                               'Customer/customer_list',
                               'Customer/customer_list_ajax',
                               'Customer/customer_list_ajax_org',
                               'Customer/customer_search_ajax',
                               'Customer/customer_search_ajax_org',
                               'Customer/test_ajax',
                               'Customer/save_detail',
                               //分公司门店模块
                               'Store/fresh_store_company',
                               'Store/fresh_store_company_si',
                               'Store/fresh_store',
                               'Store/add_child_company',
                               'Store/add_store',
                               'Store/list_store',
                               'Store/del_child_company',
                               'Store/del_store',
                               'Store/fresh_store_company',
                               'Store/fresh_store_company',
                               //汽车管理模块
                               'Car/add_car',
                               'Car/car_search_ajax',
                               'Car/get_car_detail',
                               'Car/list_car',
                               'Car/cars_list',
                               'Car/del_car',
                               'Car/add_car_price',
                               'Car/view_car',
                               'Car/add_car',
                               'Car/wb',
                               
                               //订单模块
                               'Order/order_add',
                               'Order/step_two',
                               'Order/date_add',
                               'Order/search_car',
                               'Order/search_user',
                               'Order/check_days',
                               'Order/car_detail',
                               'Order/order_post',
                               'Order/get_price',
                               'Order/price',
                               'Order/get_price_array',
                               'Order/get_days',
                               'Order/user_add',
                               'Order/create_sn',
                               'Order/order_database',
                               'Order/order_list',
                               'Order/xuzu',
                               'Order/change_status',
                               'Order/order_detail',
                               'Order/blacklist',
                               'Order/blacklist_add',
                               'Order/blacklist_search',
                               'Order/pay',
                               'Order/delete',
                               'Order/order_jiesuan',
                               'Order/jiesuan_price',
                               'Order/jiesuan',
                               'Order/order_list_j',
                               'Order/order_list_w',
                               'Order/testa',
                               'Order/xuzu',
                               //系统配置
                               'Setting/set',
                               'Setting/set_config',




                               'Admin/user_index',
                               'Admin/logout',
                               'Admin/order_add',
                               'Admin/tongji_zonghe',
                               'Admin/shouzhi',
                               'Admin/order_list'

                              ),
                'employer'=>array()
            );
        foreach ($perm as $key => $value) {
            # code...
            $new_keys[]=$key;
        }
            $session_name=session('user_perm');
            if(!in_array(session('user_perm'), $new_keys)){
                $res_arr=array("","res_tip"=>"权限错误001:用户角色与该控制器名称不对应,请注意检查字母大小写aaaaaaaaaaaaaaaaaaaaa","status"=>-1);
                $this->ajaxReturn($res_arr);
                //echo "权限错误001:用户角色与该控制器名称不对应,请注意检查字母大小写";
                exit();
            }
             $name_p=CONTROLLER_NAME."/".ACTION_NAME;
             //echo "$name_p";
             //print_r($perm[$session_name]);
             if(!in_array($name_p, $perm[$session_name])){
                $res_arr=array("","res_tip"=>"权限错误002:非法的操作请求".$name_p,"status"=>-1);
                $this->ajaxReturn($res_arr);
                //echo "权限错误002:非法的操作请求";
                exit();
             }

           
        
    }























    //获得用户id
    public function get_user_id(){
    	return session('uid');
    }
    //获得用户公司名称
    public function get_user_company(){
    	return session('ucompany');
    }
    //获得用户权限
    public function get_user_permission(){
    	return session('user_perm');
    }
    //获得用户角色
    public function get_user_roles($roles){
    	
    	$PermissionArray=array(
    		"test"=>"试用","admin"=>"店长","employer"=>"店员","finances"=>"财务"
    		);
    	if(empty($roles)){
    		return $PermissionArray[session('user_perm')];
    	}else{
    		return $PermissionArray[$roles];
    	}
    }
    //获取系统菜单数组
    public function get_menu($roles){
    	$menu_admin   =array("employer",'customer','order','car','finance','store','system','blackList');//管理员菜单
    	$meun_default =array();        //默认菜单
    	$menu_employer=array('customer','order','car','store','blackList');       //店员菜单
    	$meun_finance =array('finance');        //财务菜单
    	$menu_test    =array("employer","customer",'order','car','finance','store','system','blackList');//试用菜单
    	switch ($roles) {
    		case 'test':
    			return $menu_test;
    			break;
    		case 'employer':
    			return $menu_employer;
    			break;
    		case 'finances':
    			return $meun_finance;
    			break;
    		case 'admin':
    			return $menu_admin;
    			break;
    		default:
    		return $meun_default;
    			break;
    	}
    }
    //判断菜单显示
    public function display_menu(){
    	$cache_array=$this->get_menu($this->get_user_permission());
    	$this->assign('menu',$cache_array);
    	$this->assign('menu_employer','employer');//员工管理
    	$this->assign('menu_customer','customer');//客户管理
    	$this->assign('menu_order','order');      //订单管理
    	$this->assign('menu_car','car');          //车辆管理
    	$this->assign('menu_finance','finance');   //财务管理
    	$this->assign('menu_content','content');   //内容管理
    	$this->assign('menu_store','store');       //门店管理
    	$this->assign('menu_system','system');     //系统设置
    	$this->assign('menu_blackList','blackList');//黑名单管理

    }
    //赋值模块名称，渲染至模板
    public function assignMod(){
    	$this->assign('mod',session('user_perm'));
    }
    public function assignUserName(){
    	$user_roles=$this->get_user_roles();
    	$this->assign('user_roles',$user_roles);
 	 	$this->assign('username',session('username'));
    }
    //重复检测
    public function repet_colums($module,$colums,$data,$tip,$userid=null){
    	$where[$colums]=$data;
    	if($userid!=null){
    		$where['userid']=$userid;
    	}
       	$result=$module->where($where)->find();
    	if(!empty($result)){
    		$res_arr=array("","res_tip"=>"操作失败，".$tip."已被占用！请更换后再进行尝试！","status"=>0);
    		$this->ajaxReturn($res_arr);
    		exit;
    	}


    }
    //图片上传
    public function upload(){
     if (!empty($_FILES)) {
            //图片上传设置

            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'	 =>    'public',
                'savePath'   =>    '/Uploads/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,
                'subName'    =>    array('date','Ymd')
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
             //$upload->thumbPath = './Public/Uploads/
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savename'];
                echo $info;
                $image = new \Think\Image(); 
				$image->open("public/Uploads/".$info);
				// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
				$image->thumb(162, 65)->save('public/Uploads/m_'.$info);
                //返回文件地址和名给JS作回调用
                
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
    //获得表M
    public function get_cars_model(){
    	$model_c=M("cars");
    	return $model_c;
    }
    //
    public function get_cars_c_model(){
    	$model_c=M("cars_c");
    	return $model_c;
    }
    
    //系统首页
     public function user_index(){
     	$mod=session('user_perm');
     	$this->display_menu();
     	$this->assignUserName();
     	$this->assignMod();
        $this->display("/index");
    }

    

    /*
        *描述：获取用户级别确定可以增加车辆、客户以及订单的数量
        *
    */
    //用户级别
    public function get_level(){
        //return 1;
    }
    //车辆上限
    public function get_cars_level(){
    	//return $car_level;
    	return 10;
    }
    //客户上限
    public function get_customer_level(){
    	return 10;
    }
    //订单上限
    public function get_orders_level(){
    	return 10;
    }
    //获取车辆总数
    public function get_cars_num(){
    	return 1;
    }
    //获取客户总数
    public function get_customers_num(){
    	return 1;
    }
    //获取订单总数
    public function get_orders_num(){
    	return 1;
    }
    
    

    
    //订单列表
    public function order_list(){
    	$model=M("order_c");
    	$uid=$this->get_user_id();
    	$order_list_before=$model->where("userid=$uid")->select();
    	

    	$this->assign('order_list',$order_list);
    	$this->assignMod();
    	$this->display("/order_list");

    }
    public function print_m(){
    	$this->display("/print");
    }
    //订单模板渲染
    public function order_add(){
    	$id=I("car_id");
    	$Model=M("child_company");
    	$Model_store=M("store_c");
        $where=array();
        $result = M('cars_c as a')->join('cars as b on b.id = a.cars_id')->where("a.id =$id")->find();
        $tid=$result['tingkao_company'];
        $sid=$result['tingkao_store'];
        $res=$Model->where("id=$tid")->find();
        $res_store=$Model_store->where("id=$sid")->find();

        if(!empty($result)){
        	if($result['status']!='待租'){
        		echo "车辆状态不符！";
        		exit();
        	}
        $result['company_name']=$res['company_name'];
        $result['store_name']=$res_store['store_name'];
        $nickname=$result['nickname'];
        $this->assign('cars_id',$id);
        $this->assign('nickname',$nickname);
        $this->assign('chepai',$result['chepai']);
        $this->assign('gongli',$result['gongli']);
        $this->assign('youliang',$result['youliang']);
        $this->assign('youxiang',$result['youxiang']);
        $this->assign('company_name',$result['company_name']);
        $this->assign('store_name',$result['store_name']);
        $this->assign('chaoshi',$result['chaoshi']);
        $this->assign('price',$result['price']);
        $this->assign('yajin',$result['yajin']);


        $this->assignMod();
    	$this->display("/order_add");
    	}else{
        echo " 出错了!";
    	}
    	
    }
    //订单增加
    public function add_order(){
    	$cars_id=I('cars_id');
    	$Model_c=M('cars_c');
    	$r=$Model_c->where("id=$cars_id")->find();

    	if($this->get_orders_num()>=$this->get_orders_level()){
    		$res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
    	}else{

    		if($r['status']!='待租'){
    			$res_arr=array("","res_tip"=>"该车辆已经在租或维修，暂时不能租用","status"=>0);
    		}else{

		    		$Model=M('order_c');
		            $data = $Model->create($_POST);
		            $uid=$this->get_user_id();
		            

		            $data['userid']=$this->get_user_id();
		            $data['order_sn']=$this->create_sn();
		            $data['order_status']='待支付';

		            $data['order_start']=strtotime(I('start_time'));
		            $data['order_end']=strtotime(I('end_time'));

		            
		            $data['order_addtime']=time();

		            //$data['blacklist']=0;
		            $result=$Model->add($data);
		            if(!empty($result)){
		            	$dc['status']='在租';
		            	$Model_c->where("id=$cars_id")->save($dc);
		    		$res_arr=array("","res_tip"=>"新增完成","status"=>1);
		    		}else{
		    			$res_arr=array("","res_tip"=>"新增err失败","status"=>0);
		    		}
		    	
		    	}
    	}
    	$this->ajaxReturn($res_arr);
    }
    //根据租车时间 车辆id 计算总价格
    /*public function price($carid){
    	$start=strtotime(I('start_time'));
    	$end=strtotime(I('end_time'));
    	$_price=$this->get_price($carid);
    	$res_arr=$this->get_days($start,$end);
    	$days=$res_arr['day'];

    	//$x=[1,7,30,90,180,365,10000];//根据carid获得价格区间数组 例如：若没有月租选项，则去掉数组中的30元素，表示大于等于7天 小于90天的情况下 按周祖金计算
        $x=get_price_array($carid);
    	$_count=count($x);
    	for($i = 0;$i <= $_count-1;$i++){
	    	if($days > $x[$i] && $days <= $x[$i+1]){
	    		$p = $_price[$i];
	    	}
    	}

    	return $p*$days;
    }*/
    //获得某车辆保险价格
    public function get_b_price($carid,$a,$b,$c){
        $Model_cars=M("cars_c");
        $car=$Model_cars->where("id=".$carid)->find();
        if($car['bujimianpei']!=""){
            $price[]=$car['bujimianpei'];


        }
    	return $price;
    }
    //获得车辆要计算的价格
    public function get_price($id){
    	//根据日/周/月/季/半年/年价格组建数组，若价格为null则忽略
        //$id=I("id");
        $Model_cars=M("cars_c");
        $car=$Model_cars->where("id=".$id)->find();
        //print_r($car);

        //1<=price<7
        if($car['price']!=""){
         $price[]=$car['price'];
        }
        //7<=price<30
        if($car['week_price']!=""&&$car['week_price']!=0){
         $price[]=$car['week_price'];
        }
        //30<=price<90
        if($car['month_price']!=""&&$car['month_price']!=0){
         $price[]=$car['month_price'];
        }
        //90=<price<180
        if($car['reason_price']!=""&&$car['reason_price']!=0){
         $price[]=$car['reason_price'];
        }
        //180<=price<365
        if($car['half_price']!=""&&$car['half_price']!=0){
         $price[]=$car['half_price'];
        }
        //price>=365
        if($car['year_price']!=""&&$car['year_price']!=0){
         $price[]=$car['year_price'];
        }

    	return $price;
    }//获得车辆价格区间数组
    public function get_price_array($id){
        $Model_cars=M("cars_c");
        $car=$Model_cars->where("id=".$id)->find();
        //1<=price<7
        if($car['price']!=""){
         $price[]=1;
        }
        //7<=price<30
        if($car['week_price']!=""&&$car['week_price']!=0){
         $price[]=7;
        }
        //30<=price<90
        if($car['month_price']!=""&&$car['month_price']!=0){
         $price[]=30;
        }
        //90=<price<180
        if($car['reason_price']!=""&&$car['reason_price']!=0){
         $price[]=90;
        }
        //180<=price<365
        if($car['half_price']!=""&&$car['half_price']!=0){
         $price[]=180;
        }
        //price>=365
        if($car['year_price']!=""&&$car['year_price']!=0){
         $price[]=365;
        }
        $price[]=10000;
        return $price;
    }
    //测试时间计算
    public function test_d(){
    	//
    	$start=strtotime(I('start_time'));
    	$end=strtotime(I('end_time'));
		            	$res_arr=$this->get_days($start,$end);
		            	echo $res_arr['day'];
		            	echo "天";
		            	echo $res_arr['hour'];
		            	echo "小时";
		            	exit();
		            //
    }
    //计算天数
    public function get_days($start,$end){
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
    //计算租金
    public function price_all(){
    	$st_time=strtotime(I("st_time"));
    	$ed_time=strtotime(I("ed_time"));
    	$price=I("price");
    	$_time=$ed_time-$st_time;
    	$day=ceil($_time/(24*3600));
    	$_price=$day*$price;
    	echo $_price;
    }
    //订单号生成
    public function create_sn(){

    	$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
		$orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5).substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
		return $orderSn;
    }
    //货币格式化
    public function num_format($num){
	if(!is_numeric($num)){
		return false;
	}
	$rvalue='';
	$num = explode('.',$num);//把整数和小数分开
	$rl = !isset($num['1']) ? '' : $num['1'];//小数部分的值
	$j = strlen($num[0]) % 3;//整数有多少位
	$sl = substr($num[0], 0, $j);//前面不满三位的数取出来
	$sr = substr($num[0], $j);//后面的满三位的数取出来
	$i = 0;
	while($i <= strlen($sr)){
		$rvalue = $rvalue.','.substr($sr, $i, 3);//三位三位取出再合并，按逗号隔开
		$i = $i + 3;
	}
	$rvalue = $sl.$rvalue;
	$rvalue = substr($rvalue,0,strlen($rvalue)-1);//去掉最后一个逗号
	$rvalue = explode(',',$rvalue);//分解成数组
	if($rvalue[0]==0){
		array_shift($rvalue);//如果第一个元素为0，删除第一个元素
	}
	$rv = $rvalue[0];//前面不满三位的数
	for($i = 1; $i < count($rvalue); $i++){
		$rv = $rv.','.$rvalue[$i];
	}
	if(!empty($rl)){
		$rvalue = $rv.'.'.$rl;//小数不为空，整数和小数合并
	}else{
		$rvalue = $rv;//小数为空，只有整数
	}
	return $rvalue;
}
}
?>