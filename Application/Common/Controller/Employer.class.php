<?php
namespace Common\Controller;
class Employer{
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
    //分店列表数据返回
    public function fresh_store_company(){
         $Model_STORE_C=M("store_c");
         $uid=$this->get_user_id();
         $result_store_c=$Model_STORE_C->where("userid=$uid")->select();

         $this->ajaxReturn($result_store_c);
    }
    //
    public function fresh_store_company_si(){
         $Model_STORE_C=M("store_c");
         $uid=$this->get_user_id();
         $pid=I("id");
         $result_store_c=$Model_STORE_C->where("userid=$uid and parent_id=$pid")->select();

         $this->ajaxReturn($result_store_c);
    }
    //分公司列表数据返回
    public function fresh_store(){
         $Model_CHILD_COMPANY=M("child_company");
         $Model_STORE_C=M("store_c");
         $uid=$this->get_user_id();
         $result_child_company=$Model_CHILD_COMPANY->where("userid=$uid")->select();

         $this->ajaxReturn($result_child_company);

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

	*客户列表模板
    */
	public function customer_list(){

		$this->assignMod();
		$this->display("/clients");
	}
	/*
	*个人客户列表json数据
	*/
	public function customer_list_ajax(){
		$Model_CUSTOMER_C=M("customer_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        $result=$Model_CUSTOMER_C->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $this->ajaxReturn($result,$info,$status,$type);
	}
	/*
	*企业客户列表json数据
	*/
	public function customer_list_ajax_org(){
		$Model_CUSTOMER_O=M("customer_o");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $this->ajaxReturn($result);
	}
	public function customer_search_ajax(){
		$Model_CUSTOMER_O=M("customer_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $res['message']='';
        $res['value']=$result;
        $res['code']=200;
        $res['redirect']='';
        $this->ajaxReturn($res);
	}
	public function test(){
		$this->display("/test");
	}
	public function customer_search_ajax_org(){
		$Model_CUSTOMER_O=M("customer_o");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $res['message']='';
        $res['value']=$result;
        $res['code']=200;
        $res['redirect']='';
        $this->ajaxReturn($res);
	}

	public function test_ajax(){
		$Model_CUSTOMER_O=M("customer_o");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();

		$res['message']="";
		$res['value']=$result;
		 $this->ajaxReturn($res);
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
    /*
        *描述：企业客户新增
        *
        *
    */
    public function add_customer_o(){
    	if(IS_POST){
    	if($this->get_customers_num()>=$this->get_customer_level()){
    		$res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
    	}else{
    		$Model_CUSTOMER_O=M("customer_o");
            $data = $Model_CUSTOMER_O->create($_POST);
            $uid=$this->get_user_id();
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $Model_CUSTOMER_O->add($data);
    		$res_arr=array("","res_tip"=>"新增完成","status"=>1);
    	}
    	$this->ajaxReturn($res_arr);
    	}else{
    		$this->assignMod();
    		$this->display("/add_customer_org");
    	}
    }
    /*
        *描述：个人客户新增
        *
        *
    */
    public function add_customer(){
    	if(IS_POST){
    	if($this->get_customers_num()>=$this->get_customer_level()){
    		$res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
    	}else{
    		$Model_CUSTOMER_C=M("customer_c");
            $data = $Model_CUSTOMER_C->create($_POST);
            $uid=$this->get_user_id();
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $data['blacklist']=0;
            $Model_CUSTOMER_C->add($data);
    		$res_arr=array("","res_tip"=>"新增完成","status"=>1);
    	}
    	$this->ajaxReturn($res_arr);
    	}else{
    		$this->assignMod();
    		$this->display("/add_customer");
    	}
    }
    /*
	*个人客户详细ajax
    */
    public function customer_detail_ajax(){
    	$id=I("id");
    	$Model_CUSTOMER_C=M("customer_c");
    	$where['userid']=$this->get_user_id();
    	$where['id']=$id;
    	$result=$Model_CUSTOMER_C->where($where)->find();
    	$result['addtime']=date('Y-m-d H:i',$result['addtime']);
    	if(!empty($result)){
    		$this->ajaxReturn($result);
    	}else{
    		echo 0;
    	}

    }
    /*
	*企业客户详细ajax
    */
    public function customer_detail_ajax_org(){
    	$id=I("id");
    	$Model_CUSTOMER_O=M("customer_o");
    	$where['userid']=$this->get_user_id();
    	$where['id']=$id;
    	$result=$Model_CUSTOMER_O->where($where)->find();
    	$result['addtime']=date('Y-m-d H:i',$result['addtime']);
    	if(!empty($result)){
    		$this->ajaxReturn($result);
    	}else{
    		echo 0;
    	}

    }
    /*
        *描述：客户编辑
        *
        *
    */
    public function edit_customer(){

    }
    /*
        *描述：客户删除
        *
        *
    */
    public function del_customer_c(){
    	$id=I("id");
        $Model_CUSTOMER_C=M("customer_c");
        $where=array();
        $data['is_delete']=1;
        $result=$Model_CUSTOMER_C->where("id=$id")->save($data);
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*
        *描述：客户列表
        *
    */
    public function list_customer(){

    }
    /*
        *描述：客户拉黑名单
        *
    */
    public function lock_customer(){

    }

    public function car_search_ajax(){
    	$Model=$this->get_cars_model();
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        //$where['userid']=array('in',"$uid");
        //$where['is_delete']=0;
        

        $result=$Model->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            //$result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $res['message']='';
        $res['value']=$result;
        $res['code']=200;
        $res['redirect']='';
        $this->ajaxReturn($res);
    }
    public function get_car_detail(){
    	$id=I("id");
        $Model=$this->get_cars_model();
        $where=array();
        $data['is_delete']=1;
        $result=$Model->where("id=$id")->find();
        if(!empty($result)){
            echo "<div class='footable-row-detail-row'><div class='footable-row-detail-name'>品牌:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["brand"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>车系：</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["name"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>气囊:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["qinang"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>座椅:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["zuoyi"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>油箱:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["youxiang"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>天窗:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["tianchuan"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>驱动:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["qudong"]."</span></div><div class='footable-row-detail-name'></div></div><div class='footable-row-detail-row'><div class='footable-row-detail-name'>发动机:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["fadongji"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>燃油编号：</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["ranyou"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>车门:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["chemen"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>座位:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["zuowei"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>结构:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["jiegou"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>级别:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["jibie"]."</span></div><div class'footable-row-detail-name'></div></div>";
        }else{
            echo 0;
        }
    }

    /*
        *描述：车辆新增
        *
    */
    public function add_car(){
    	if(IS_POST){
    	if($this->get_cars_num()>=$this->get_cars_level()){
    		$res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
    	}else{
    		$Model=$this->get_cars_c_model();
            $data = $Model->create($_POST);
            $uid=$this->get_user_id();
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $data['xubao_date']=strtotime(I('xubao_date'));
            $data['buy_date']=strtotime(I('buy_date'));
            $data['baoyang_date']=strtotime(I('baoyang_date'));
            //$data['blacklist']=0;
            $Model->add($data);
    		$res_arr=array("","res_tip"=>"新增完成","status"=>1);
    	}
    	$this->ajaxReturn($res_arr);
    	}else{
    	$this->assignMod();
    	$this->assignMod();
    	$this->display("/add_car");
    	}
	}
    /*
        *描述：车辆列表
        *
    */
    public function list_car(){
    	$this->assignMod();
    	$this->display("/cars_manager");
    }
    public function cars_list(){
    	$status=I("status");

    	$Model_CUSTOMER_O=M("cars_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        if($status==1){
        	$where['status']='待租';
        }else if($status==2){
        	$where['status']='在租';
        }else if($status==3){
        	$where['status']='维修/保养';
        }
        $where['is_delete']=0;
        //$where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $this->ajaxReturn($result);
    }
    public function edit_car(){
    	
    }
    /*
        *描述：车辆删除
        *
    */
    public function del_car(){
    	$id=I("id");
        $Model_CUSTOMER_C=M("cars_c");
        $where=array();
        $data['is_delete']=1;
        $result=$Model_CUSTOMER_C->where("id=$id")->save($data);
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }

    /*
        *描述：车辆价格设定
        *
    */
    public function add_car_price(){
    	
    }
    public function view_car(){
    	$id=I("id");
        $Model=M('cars_c');
        $where=array();
        //$result=$Model->where("id=$id")->find();
        $result = M('cars_c as a')->join('cars as b on b.id = a.cars_id')->where("a.id =$id")->find();
        $this->assign('nickname',$result['nickname']);
        $this->assign('chepai',$result['chepai']);
        $this->assign('status',$result['status']);
        $this->assign('addtime',$result['addtime']);
        $this->assign('gongli',$result['gongli']);
        $this->assign('youliang',$result['youliang']);
        $this->assign('chepai',$result['chepai']);
        $this->assign('id',$id);
        //基本信息
        $this->assign('name',$result['name']);
        $this->assign('brand',$result['brand']);
        $this->assign('qinang',$result['qinang']);
        $this->assign('zuoyi',$result['zuoyi']);
        $this->assign('youxiang',$result['youxiang']);
        $this->assign('tianchuang',$result['tianchuan']);
        $this->assign('fadongji',$result['fadongji']);
        $this->assign('ranyou',$result['ranyou']);
        $this->assign('chemen',$result['chemen']);
        $this->assign('zuowei',$result['zuowei']);
        $this->assign('jiegou',$result['jiegou']);
        $this->assign('qudong',$result['qudong']);
        $this->assign('jibie',$result['jibie']);
        $this->assign('xubao_date',$result['xubao_date']);
        $this->assign('baoyang_date',$result['baoyang_date']);
        $this->assign('buy_date',$result['buy_date']);
        $yiguo_st=time()-$result['xubao_date'];
        $yiguo=ceil(($yiguo_st/3600)/24);
        $shengyu=365-$yiguo;
        $this->assign('yiguo',$yiguo);
        $this->assign('shengyu',$shengyu);
        //$percent_xubao=(ceil(($yiguo/365)*10))*1000;

        $percent_xubao=90;
        $this->assign('percent_xubao',$percent_xubao);
        
        //租金相关
        $this->assign('yajin',$this->num_format($result['yajin']));
        $this->assign('price',$this->num_format($result['price']));
        $this->assign('week_price',$this->num_format($result['week_price']));
        $this->assign('month_price',$this->num_format($result['month_price']));
        $this->assign('half_price',$this->num_format($result['half_price']));
        $this->assign('reason_price',$this->num_format($result['reason_price']));
        $this->assign('year_price',$this->num_format($result['year_price']));
        $this->assign('bujimianpei',$result['bujimianpei']);
        $this->assign('disanzhe',$result['disanzhe']);
        $this->assign('jiaoqiang',$result['jiaoqiang']);
        $this->assign('chesun',$result['chesun']);
        $this->assign('chaoshi',$result['chaoshi']);
    	$this->assignMod();
    	$this->display("/car_detail");
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
    //根据租车时间 车辆id 以及车辆租金是否包含保险 计算总价格
    public function price(){
    	$start=strtotime(I('start_time'));
    	$end=strtotime(I('end_time'));
    	$_price=$this->get_price($carid);
    	$_b_price=$this->get_b_price($carid,$a,$b,$c);
    	$res_arr=$this->get_days($start,$end);
    	$days=$res_arr['day'];
    	$x=[1,7,30,90,180,365,10000];//根据carid获得价格区间数组 例如：若没有月租选项，则去掉数组中的30元素，表示大于等于7天 小于90天的情况下 按周祖金计算
    	$_count=count($x);
    	for($i = 0;$i <= $_count-1;$i++){
	    	if($days > $x[$i] && $days <= $x[$i+1]){
	    		$p = $_price[$i];
	    	}
    	}

    	echo $p*$days;
    	echo "<br/>";
    	echo $_b_price*$days;
    	echo "共计：";


    }
    //获得某车辆保险价格
    public function get_b_price($carid,$a,$b,$c){
    	return $price;
    }
    //获得车辆要计算的价格
    public function get_price($id){
    	//根据日/周/月/季/半年/年价格组建数组，若价格为null则忽略
    	//1<=price<7
    	$price[0]=210;
    	//7<=price<30
    	$price[1]=190;
    	//30<=price<90
    	$price[2]=170;
    	//90=<price<180
    	$price[3]=150;
    	//180<=price<365
    	$price[4]=130;
    	//price>=365
    	$price[5]=110;

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
		$orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5).substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
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