<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class OrderController extends CommonController {
	//续租
	public function xuzu(){
		$day=I("day");
		$price=I("price");
		$xz_Model=M("xuzu");
		$orderid=I("orderid");
		$ispay=I("ispay");

		$data['day']=$day;
		$data['price']=$price;
		$data['orderid']=$orderid;
		$data['ispay']=$ispay;
		$data['status']="1";
		//$this->ajaxReturn($data);

		$order_model=M("order_c");
		$where['id']=$orderid;

		$result=$order_model->where($where)->find();

		//$new_end=date("$result['order_end']",strtotime("+$day day"));
		$new_end=date('y-m-d',strtotime("+$day day",$result['order_end']));

		$d['order_end']=strtotime($new_end);
		$order_model->where($where)->save($d);

		$xz_Model->add($data);

		echo $new_end;
	}
	//
	public function blacklist_search(){

		$blacklist_model=M("blacklist");
		$v=I("name");

		$where['name|tel|pincode']=array('eq',"$v");
		$result=$blacklist_model->where($where)->find();
		if(!empty($result)){
			$result['info']==1;
		}else{
			$result['info']==0;
		}

		$this->ajaxReturn($result);
	}

	public function blacklist_add(){
		$blacklist_model=M("blacklist");
		$data['name']=I("name");
		$data['tel']=I("tel");
		$data['pincode']=I("pincode");
		$data['beizhu']=I("reason");

		$result=$blacklist_model->add($data);
		if($result){
			echo 1;
		}else{
			echo 0;
		}

		
	}
	public function blacklist(){

		$this->display("/blacklist");
	}
	//
	
	public function delete(){
		$id=I("id");
		$Model_order=M("order_c");
		$where["id"]=$id;
		$data['is_delete']=1;
		$result=$Model_order->where("id='$id'")->save($data);

	}
	public function pay(){
		$id=I("id");
		$Model_order=M("order_c");
		$where["id"]=$id;
		$data['order_status']="已支付";
		$result=$Model_order->where("id='$id'")->save($data);

		
	}
	//
	public function jiesuan_price(){

		$id=I("id");
		$order_model=M("order_c");
		$result=$order_model->where("id='$id'")->find();



		/////
		$start_time=date("Y-m-d H:i:s",$result['order_start']);                              //开始时间
		

		$end_time=I("order_end_time");       
		
		$baoxianheji=0;
		if($result['jiaoqiang']!=""&&$result['jiaoqiang']!="无购买"){
			$baoxianheji+=$result['jiaoqiang'];
		}
		if($result['disanzhe']!=""&&$result['disanzhe']!="无购买"){
			$baoxianheji+=$result['disanzhe'];
		}
		if($result['chesun']!=""&&$result['chesun']!="无购买"){
			$baoxianheji+=$result['chesun'];
		}
		if($result['bujimianpei']!=""&&$result['bujimianpei']!="无购买"){
			$baoxianheji+=$result['bujimianpei'];
		}
		
		$start=$result['order_start'];
    	$end=strtotime($end_time);
		$res_arr=$this->get_days($start,$end);
    	$days=$res_arr['day'];
		$order_baoxian=$days*$baoxianheji;


		                                                        //天数
		$order_car_id=$result["cars_id"];                                                     //车辆ID
		$order_user_id=$result["customer_id"];                                                   //用户ID
		$order_price=$this->price($order_car_id,$start_time,$end_time);                     //车辆租金(不含保险)


		$yh=$result["order_youhui"];

		//echo $days;

		$order_price=$order_price+$order_baoxian-$yh;
		//echo $order_price;
		$res['order_price']=$order_price;
		$res['old_price']=$result['shishou_price'];

		//续租是否支付
		$xz_Model=M("xuzu");

		$where_xz['orderid']=$id;

		$price_xz=$xz_Model->where($where_xz)->sum('price');



		$res['chajia']=$order_price-$result['shishou_price']-$price_xz;




		$this->ajaxReturn($res);

	}
	public function jiesuan(){
		$id=I("id");

		$Model_order=M("order_c");
		$where["id"]=$id;
		$data['order_status']="已结算";
		$data['jiesuan_time']=time();
		$data['jiesuan_price']=I("jiesuan_price");
		$Model_order->where($where)->save($data);
		$result=$Model_order->where($where)->find();

		$car_id=$result['cars_id'];

		$car_model=M("cars_c");
		$st['status']="待租";
		$car_model->where("id='$car_id'")->save($st);

		echo "结算完毕，请关闭该页面！";





	}
	public function testa(){
		$car=A("car");
		$car->testA();
	}
	public function order_jiesuan(){

		$id=I("id");
		$Model_order=M("order_c");
		$where["id"]=$id;
		$result=$Model_order->where($where)->find();


		//租车人
		$user_model=M('customer_c');
		$t_id=$result['customer_id'];
		$userResult=$user_model->where("id='$t_id'")->find();
		//
		$result['customer_tel']=$userResult['tel'];
		$result['pincode_org']=$userResult['pincode_org'];
		$result['pincode']=$userResult['pincode'];
		$result['address']=$userResult['address'];
		$result['now_address']=$userResult['now_address'];

		//车辆信息
		$car_model=M("cars_c");
		$carResult=$car_model->where("id=".$result['cars_id'])->find();
		$result['gongli']=$carResult['gongli'];
		$result['youliang']=$carResult['youliang'];
		$this->assign('result',$result);
		$this->display("/order_jiesuan");
	}
	//订单详细
	public function order_detail(){
		$id=I("id");
		$Model_order=M("order_c");
		$where["id"]=$id;
		$result=$Model_order->where($where)->find();


		//租车人
		$user_model=M('customer_c');
		$t_id=$result['customer_id'];
		$userResult=$user_model->where("id='$t_id'")->find();
		//
		$result['customer_tel']=$userResult['tel'];
		$result['pincode_org']=$userResult['pincode_org'];
		$result['pincode']=$userResult['pincode'];
		$result['address']=$userResult['address'];
		$result['now_address']=$userResult['now_address'];

		//车辆信息
		$car_model=M("cars_c");
		$carResult=$car_model->where("id=".$result['cars_id'])->find();
		$result['gongli']=$carResult['gongli'];
		$result['youliang']=$carResult['youliang'];
		$this->assign('result',$result);
		$this->display("/order_detail");
	}
	//
	public function order_list_j(){
		$Model_list=M("order_c");
		$where["userid"]=$this->get_user_id();
		$where['is_delete']=0;
		$where['order_status']='已结算';
		$result=$Model_list->where($where)->select();
		$this->assign('order_list',$result);
		$this->display("/order_list_j");
	}
	public function order_list_w(){
		$Model_list=M("order_c");
		$where["userid"]=$this->get_user_id();
		$where['is_delete']=0;
		$where['order_status']='已支付';
		$result=$Model_list->where($where)->select();
		//echo $Model_list->getLastSql();
		$this->assign('order_list',$result);
		$this->display("/order_list");
	}
	public function order_list(){
		$Model_list=M("order_c");
		$where["userid"]=$this->get_user_id();
		$where['is_delete']=0;
		$result=$Model_list->where($where)->select();


		$this->assign('order_list',$result);
		$this->display("/order_list");
	}
	//订单新增
	public function order_add(){
		
		$this->display("/order_new");
	}
	//订单新增用户(非选择用户)
	public function user_add(){
			$data["id"]=md5(date('Y-m-d H:i:s')+rand(0,10000));
			$data['realname']=I("order_realname");
			$data['sex']=I("order_sex");
			$data['user_level']=I("order_user_level");
			$data["pincode"]=I("order_pincode");
			$data["pincode_org"]=I("order_org");
			$data["address"]=I("order_pin_address");
			$data["tel"]=I("order_tel");
			$data["now_address"]=I("order_address");
			$data["email"]=I("order_email");
			$data["driver_code"]=I("order_jzhm");
			$data["driver_type"]=I("order_jiazhao");
			$data["driver_license"]=I("order_jzorg");


			$Model_CUSTOMER_C=M("customer_c");
            $uid=$this->get_user_id();
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $data['blacklist']=0;
            $res=$Model_CUSTOMER_C->add($data);
            if(empty($res)){
            	echo 0;
            }else{
            	echo $data["id"];
            }
           
	}
	//订单入库
	public function order_database(){
		$Model_order=M("order_c");
		$data['id']=md5(I("order_sn"));
		$data['order_sn']=I("order_sn");
		$data['order_status']="待支付";
		$data['userid']=$this->get_user_id();
		$data['customer_id']=I("customer_id");
		$data['cars_id']=I("car_id");
		$data['order_start']=strtotime(I("order_start"));
		$data['order_end']=strtotime(I("order_end"));
		$data['order_contract']=I('order_contact');
		$data['order_contract_tel']=I('order_contact_tel');
		$data['order_price']=I('order_price');
		$data['order_yajin']=I("yajin");
		$data['order_addtimme']=time();
		$data['order_youhui']=I("order_youhui");
		$data['customer_name']=I("customer_name");
		$data['car_chepai']=I("order_chepai");
		$data['order_beizhu']=I("order_beizhu");
		$data['payment']=I("payment");
		$data['car_name']=I("car_name");
		$data['jiaoqiang']=I("order_jiaoqiang");
		$data['chesun']=I("order_chesun");
		$data['disanzhe']=I("order_disanzhe");
		$data['bujimianpei']=I("order_bujimianpei");
		$data['heji_price']=I("heji_price");
		$data["shishou_price"]=I("shishou_price");

		$Model_order->add($data);

		$this->change_status(I("car_id"));
		$this->ajaxReturn($data);
		

	}
	public function change_status($id){

		//更改车辆状态
		$car_model=M("cars_c");
		$where['id']=$id;
		$d_data['status']="在租";
		$car_model->where($where)->save($d_data);
	}
	public function order_post(){
		//print_r($_POST);
		$start_time=I("order_start_time");                                                   //开始时间
		$end_time=I("order_end_time");                                                       //结束时间
		$order_days=I("order_days");                                                         //天数
		$order_car_id=$_POST["order_car_id"];                                                     //车辆ID
		$order_user_id=I("order_user_id");                                                   //用户ID
		$order_price=$this->price($order_car_id,$start_time,$end_time);                      //车辆租金(不含保险)
		$yh=I("yh");
		if(!is_numeric($yh)){
			$yh=0;
		}
		$Model_users=M("customer_c");

		$userResult=$Model_users->where("id='$order_user_id'")->find();                       //用户结果
		

		//根据前端选择的保险项目取得数据库中对应的值计算，并且标识哪些保险是选中状态，方便订单详情展示的时候判断
		$baoxian_=I("baoxian");
		//echo "$baoxian";
		$Model_cars=M("cars_c");
        $car=$Model_cars->where("id='$order_car_id'")->find();
        $baoxian = explode(',',$baoxian_); 
		if(in_array("jiaoqiang",$baoxian)){
			$jiaoqiang_=true;//选中标识
			$baoxianheji+=$car["jiaoqiang"];
		}
		if(in_array("chesun",$baoxian)){
			$chesun_=true;//选中标识
			$baoxianheji+=$car["chesun"];
		}
		if(in_array("disanzhe",$baoxian)){
			$disanzhe_=true;//选中标识
			$baoxianheji+=$car["disanzhe"];
		}
		if(in_array("bujimianpei",$baoxian)){
			$bujimianpei_=true;//选中标识
			$baoxianheji+=$car["bujimianpei"];
		}
		$start=strtotime($start_time);
    	$end=strtotime($end_time);
		$res_arr=$this->get_days($start,$end);
    	$days=$res_arr['day'];
		$order_baoxian=$days*$baoxianheji;            //保险
		//echo $order_baoxian;
		//订单详情数据
		$result["userid"]=I("order_user_id");
		$result["carid"]=I("order_car_id");
		$result["order_sn"]=$this->create_sn();
		$result["user_name"]=$userResult['realname'];
		$result["user_tel"]=$userResult["tel"];
		$result["pincode"]=$userResult["pincode"];
		$result["pincode_org"]=$userResult["pincode_org"];
		$result["address"]=$userResult["address"];
		$result["now_address"]=$userResult["now_address"];
		$result["contact_name"]=I("order_contact");
		$result["contact_tel"]=I("order_contact_tel");
		$result["contact_address"]=I("order_contact_address");
		$result["car_chepai"]=$car["chepai"];
		$result["car_zujin"]=$order_price;
		$result["start_time"]=$start_time;
		$result["end_time"]=$end_time;

		$result["jiaoqiang"]=$jiaoqiang_;
		$result["jiaoqiang_"]=$car["jiaoqiang"];
		$result["disanzhe"]=$disanzhe_;
		$result["disanzhe_"]=$car["disanzhe"];
		$result["chesun"]=$chesun_;
		$result["chesun_"]=$car["chesun"];
		$result["bujimianpei"]=$bujimianpei_;
		$result["bujimianpei_"]=$car["bujimianpei"];


		$result["yajin"]=$car["yajin"];
		$result["carname"]=$car["nickname"];
		$result["chaoshi"]=$car["chaoshi"];
		$result["baoxian"]=$order_baoxian;
		$result["heji"]=$order_baoxian+$order_price;
		$result["shishou"]=$order_baoxian+$order_price-$yh;

		$this->ajaxReturn($result);



	}
	public function baoxian_price($id,$s,$e){

	}
	//可删除
	public function get_price2($id){
    	//根据日/周/月/季/半年/年价格组建数组，若价格为null则忽略
        $id=I("id");
        $Model_cars=M("cars_c");
        $car=$Model_cars->where("id=".$id)->find();
        print_r($car);

    	if($car['price']!=""){
         $price[]=$car['price'];
        }
        if($car['week_price']!=""&&$car['week_price']!=0){
         $price[]=$car['week_price'];
        }
        if($car['month_price']!=""&&$car['month_price']!=0){
         $price[]=$car['month_price'];
        }
        if($car['reason_price']!=""&&$car['reason_price']!=0){
         $price[]=$car['reason_price'];
        }
        if($car['half_price']!=""&&$car['half_price']!=0){
         $price[]=$car['half_price'];
        }
        if($car['year_price']!=""&&$car['year_price']!=0){
         $price[]=$car['year_price'];
        }

    	print_r($price);
    }
	//时间转换返回
	public function date_add(){

		$date_type=I("d");
		$t=I("ti");
		$t_2=strtotime($t);
		$d6=I("s");
		
		switch ($date_type) {
			case '0':
				# code...
				$add_time="+1 day";
				break;
			case '1':
				# code...
				$add_time="+7 day";
				break;
			case '2':
					# code...
				$add_time="+1 month";
				break;
			case '3':
					# code...
				$add_time="+3 month";
				break;
			case '4':
					# code...
				$add_time="+6 month";

				break;
			case '5':
					# code...
				$add_time="+1 year";
				
				break;
			case '6':
				$add_time="+$d6 day";
				break;
			default:
				# code...
			$add_time="+1 day";
				break;
		}
		
		$t2=strtotime($t.$add_time);

		$days=ceil(($t2-$t_2)/86400);
		if($days<=0){
			$res['info']=-1;
		}else{
			$res['info']=1;
		}
		//echo date("Y-m-d H:i",$t);
		$res['date']=date("Y-m-d H:i",$t2);
		$res['days']=$days;
		$this->ajaxReturn($res);


	}
	public function check_days(){
		$start_time=strtotime(I("start_time"));
		$end_time=strtotime(I("end_time"));
		$days=($end_time-$start_time)/86400;
		$res['days']=$days;
		if($days>=1){
			$res['info']=1;
		}else{
			$res['info']=-1;
		}
		$this->ajaxReturn($res);


	}
	public function search_user(){
		$keywords=I("keywords");
		$Model_CUSTOMER_O=M("customer_c");
        $uid=$this->get_user_id();
        
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        $where['realname|tel|pincode']=array('like',"%$keywords%");
        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->limit(0,8)->select();
        $this->ajaxReturn($result);
	}
	public function search_car(){
		$keywords=I("keywords");
		$Model_CUSTOMER_O=M("cars_c");
        $uid=$this->get_user_id();
        
        $where['userid']=array('in',"$uid");
        $where['status']='待租';
        $where['is_delete']=0;
        $where['nickname']=array('like',"%$keywords%");
        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        $this->ajaxReturn($result);
	}
	public function car_detail(){
		$id=I("id");
		//用户车辆表
		$Model_CUSTOMER_O=M("cars_c");
        $uid=$this->get_user_id();
        $where['id']="$id";
        $result=$Model_CUSTOMER_O->where($where)->find();
       
        if(!empty($result)){
        	//车辆基本信息表
        	$Model_base=M("cars");
        	$cid=$result["cars_id"];
        	$result2=$Model_base->where('id='.$cid)->find();
        	//停靠门店信息
        	$Model_tingkao=M('child_company');
        	$cid=$result['tingkao_company'];
        	$result3=$Model_tingkao->where("id=".$cid)->find();
        	$Model_mendian=M('store_c');
        	$cid=$result['tingkao_store'];
        	$result4=$Model_mendian->where("id=".$cid)->find();


    	}	
    	/*print_r($result);
    	print_r($result2);
    	print_r($result3);
    	print_r($result4);*/
    	//echo date("Y-m-d H:i:s",$t); 

    	$result["xubao_date"]=date("Y-m-d",$result["xubao_date"]);
    	$result["baoyang_date"]=date("Y-m-d",$result["baoyang_date"]);
    	$result["buy_date"]=date("Y-m-d",$result["buy_date"]);
    	$result['brand']=$result2['brand'];
    	$result['name']=$result2['name'];
    	$result['qinang']=$result2['qinang'];
    	$result['zuoyi']=$result2["zuoyi"];
    	$result['youxiang']=$result2["youxiang"];
    	$result['tianchuang']=$result2["tianchuang"];
    	$result['fadongji']=$result2["fadongji"];
    	$result['qudong']=$result2["qudong"];
    	$result['ranyou']=$result2["ranyou"];
    	$result["chemen"]=$result2["chemen"];
    	$result["zuowei"]=$result2["zuowei"];
    	$result["jiegou"]=$result2["jiegou"];
    	$result["jibie"]=$result2["jibie"];
    	$result["tingkao_company"]=$result3["company_name"]."-".$result4["store_name"];
    	
    	//print_r($result);
        $this->ajaxReturn($result);


	}
	public function step_two(){
		echo "step_two";
	}



	///////////////////////////////
	//根据租车时间 车辆id 计算总价格
    public function price($carid,$start_time,$end_time){
    	$start=strtotime($start_time);
    	$end=strtotime($end_time);
    	$_price=$this->get_price($carid);
    	$res_arr=$this->get_days($start,$end);
    	$days=$res_arr['day'];

    	//$x=[1,7,30,90,180,365,10000];//根据carid获得价格区间数组 例如：若没有月租选项，则去掉数组中的30元素，表示大于等于7天 小于90天的情况下 按周祖金计算
        $x=$this->get_price_array($carid);
    	$_count=count($x);
    	for($i = 0;$i <= $_count-1;$i++){
	    	if($days > $x[$i] && $days <= $x[$i+1]){
	    		$p = $_price[$i];
	    	}
    	}

    	return $p*$days;
    }
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
        $car=$Model_cars->where("id='$id'")->find();
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
        $car=$Model_cars->where("id='$id'")->find();
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
}
?>