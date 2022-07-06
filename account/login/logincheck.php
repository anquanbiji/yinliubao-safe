<?php
// 返回JSON格式的数据
header("Content-Type:application/json"); 
//过滤掉单引号 防止注入
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}
// 获取前端POST过来的数据
$user = trim_my($_POST["user"]);
$pwd = trim_my($_POST["pwd"]);

//防暴力破解  连续输入10次 则禁止登陆
session_start(); 

if(isset($_SESSION["pass.wrong"])) {
	if(intval($_SESSION["pass.wrong"]) > 10) {
		$result = array(
			'code' => '106',
			'msg' => '账号或密码错误'
		);
		echo json_encode($result,JSON_UNESCAPED_UNICODE);
		exit(0);
		
	}
	
}

// 过滤表单
if (empty($user)) {
	// 请求结果数组
	$result = array(
		'code' => '101',
		'msg' => '账号未填'
	);
}else if (empty($pwd)) {
	// 请求结果数组
	$result = array(
		'code' => '102',
		'msg' => '密码未填'
	);
}else{
	// 连接数据库
	include '../../db_config/db_config.php';

	// 创建连接
	$conn = new mysqli($db_url, $db_user, $db_pwd, $db_name);
	 
	$check_user = "SELECT * FROM huoma_user WHERE user='$user' AND pwd='$pwd'";
	$result_user = $conn->query($check_user);
	
	// 验证结果
	if ($result_user->num_rows > 0) {
	    // 账号密码正确
	   
		$_SESSION["pass.wrong"] = 0; //清除错误计数 
	    // 获取账号的过期时间、使用状态
	    while($row_userinfo = $result_user->fetch_assoc()) {
			$user_status = $row_userinfo["user_status"];
			$expire_time = $row_userinfo["expire_time"]; // 到期日期
		}

		// 计算是否已经到期
		date_default_timezone_set("Asia/Shanghai");
		$thisdate=date("Y-m-d");// 当前日期

		// 判断逻辑
		if ($user_status == 1) {
			// 判断账号是否已到期
			if(strtotime($thisdate)<strtotime($expire_time)){
				// 账号正常、未到期，允许登录
				$result = array(
					'code' => '100',
					'msg' => '登录成功'
				);
				session_start();
				$_SESSION['huoma.admin'] = $user;
			}else{
				$result = array(
					'code' => '103',
					'msg' => '该账号已到期，请续期'
				);
			}
		}else if ($user_status == 2){
			$result = array(
				"result" => "104",
				"msg" => "该账号已被停止使用"
			);
		}else if ($user_status == 3){
			$result = array(
				"result" => "105",
				"msg" => "该账号已被永久封号"
			);
		}
	} else {
	    $result = array(
			'code' => '106',
			'msg' => '账号或密码错误' 
		);
		
		if(isset($_SESSION["pass.wrong"])){
			$_SESSION["pass.wrong"] = intval($_SESSION["pass.wrong"]) + 1; 
		}else {
			$_SESSION["pass.wrong"] = 1; 
		}
		
	}
	// 断开数据库连接
	$conn->close();
}

// 输出JSON格式的数据
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>