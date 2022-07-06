
**里客云活码安全增强版**  
## 说明  
里客云活码系统是目前能够找到的唯一免费活码系统，用户量巨大，包括我们，但网站经常被攻击，后来发现是因为这套代码本身存在安全漏洞，反馈开发者很久也没有修复，因此在源代码基础上进行了修改，并将修改的部分全部开源，希望更多用户收益。

本代码是基于[里客云 6.0.1 活码系统](http://www.likeyunba.com/hm/)进行开发的里客云增强版活码，主要是修复源代码中的[安全漏洞](https://www.cnvd.org.cn/flaw/flawListByManu/256466),可以满足个人搭建自用的微信/企业微信/QQ/钉钉等活码系统  

由于平时工作比较忙，可能无法及时处理issus, 因此建了一个付费交流群，希望大家可以讨论关于活码相关技术，为了防止广告人加入，设置了付费入群，每人仅需1元, [**点击付费1元加入里客云官方交流 链接**](http://720life.cn/joinqun.php/2/)    
或者直接扫码加入    
![](http://static.720life.cn/img/likeyun/1%E5%85%83%E7%BE%A4.png)  


## liKeYun_Huoma
这是一套开源、免费、可上线运营的活码系统，便于协助自己、他人进行微信私域流量资源获取，更大化地进行营销推广活动！降低运营成本，提高工作效率，获取更多资源。  
微信群二维码活码工具，生成微信群活码，随时可以切换二维码！微信官方群二维码有效期是7天，过期后无法扫码进群，或者是群人数满200人就无法扫码进群，如果我们在推广的时候，群满人或者过期了，别人还想进群，我们将会失去很多推广效果，所以有了群活码，可以在不更换链接和二维码的前提下，切换扫码后显示的内容，灵活变换！  

## 使用教程  
### 安装 
本文主要以在Centos 7 安装为例进行介绍    
先安装宝塔管理面板   
```
yum install -y wget && wget -O install.sh http://download.bt.cn/install/install_6.0.sh && sh install.sh
```
登录宝塔，安装php,nginx,mysql即可   
下载代码到服务器 最终目录 /home/www/liKeYun_Huoma-main  
在宝塔上，新建站点 选择php和创建mysql数据库   
访问网站的/install目录，如下图所示     
![](http://static.720life.cn/img/likeyun/0-1-%E5%AE%89%E8%A3%85.png)   
如果目录权限不对，需要设置权限     
![](http://static.720life.cn/img/likeyun/0-2%20%E6%9D%83%E9%99%90%E8%AE%BE%E7%BD%AE.png)    
输入数据库信息和账号密码(账号和密码尽可能复杂)即可完成安装    
![](http://static.720life.cn/img/likeyun/0-2%20%E6%95%B0%E6%8D%AE%E5%BA%93%E4%BF%A1%E6%81%AF.png)     

### 使用  
登录后台 /dashboard/account/login/  输入配置的账号和密码  
![](http://static.720life.cn/img/likeyun/1-%E7%99%BB%E5%BD%95%E5%90%8E%E5%8F%B0.png) 
点击**系统设置**,输入网站域名，注意需要输入http://  
![](http://static.720life.cn/img/likeyun/2-%E8%AE%BE%E7%BD%AE%E5%9F%9F%E5%90%8D.png)  
![](http://static.720life.cn/img/likeyun/3-%E5%85%A5%E5%8F%A3%E5%9F%9F%E5%90%8D.png)    
![](http://static.720life.cn/img/likeyun/3-%E8%90%BD%E5%9C%B0%E5%9F%9F%E5%90%8D.png)    
前台登录  /console/account/login/  输入配置的账号和密码  
![](http://static.720life.cn/img/likeyun/4-%E5%89%8D%E5%8F%B0%E7%99%BB%E5%BD%95.png)
创建群活码  
![](http://static.720life.cn/img/likeyun/5-%E5%89%8D%E5%8F%B0%E5%88%9B%E5%BB%BA%E6%B4%BB%E7%A0%81.png)  
![](http://static.720life.cn/img/likeyun/6-%E9%85%8D%E7%BD%AE%E5%9F%9F%E5%90%8D.png)  
![](http://static.720life.cn/img/likeyun/7-%E7%BC%96%E8%BE%91%E9%85%8D%E7%BD%AE.png)  
![](http://static.720life.cn/img/likeyun/8-%E8%AE%BE%E7%BD%AE%E9%98%88%E5%80%BC%E5%92%8C%E6%9B%B4%E6%96%B0.png)
**注意**默认是暂停使用，需要将其修改成**正常使用**   
![](http://static.720life.cn/img/likeyun/9-%E6%B4%BB%E7%A0%81%E5%9C%B0%E5%9D%80.png)  
![](http://static.720life.cn/img/likeyun/10-%E6%B4%BB%E7%A0%81%E5%9C%B0%E5%9D%80.png)  

### 最终效果  
![](http://static.720life.cn/img/likeyun/11-%E6%95%88%E6%9E%9C.png)   
![](http://static.720life.cn/img/likeyun/12-%E4%BB%98%E8%B4%B9%E5%85%A5%E7%BE%A4.png)   

## 修复漏洞列表  
### **第一阶段** 满足自用需求  
保证除后台外功能没有常见的安全漏洞   

### 注册功能  
#### SQL注入漏洞:  
注册时存在SQL注入漏洞,未对传入参数进行任何处理，进行数据库查询      
**文件**:  account\reg\regcheck.php    
**修复方法**:  
由于接收的参数都是字符串类型，因此直接将接收到参数进行单引号字符替换   
```
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}
$user = trim_my($_POST["user"]);
$pwd = trim_my($_POST["pwd"]);
$email = trim_my($_POST["email"]);
$yqm = trim_my($_POST["yqm"]);
```
####  HTTP_HOST导致的SSRF  
当注册成功后，会向注册邮箱发送邮件 
```
$sendurl = dirname(dirname('http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"])).'/email/send_reg.php?email='.$email.'&user='.$user.'&pwd='.$pwd;
					file_get_contents($sendurl);
```
其中$_SERVER['HTTP_HOST'] 是取自客户端请求的HOST数据  
当网站为默认网站(注:不需要通过请求HOST进行转发时)存在SSRF漏洞，由于已经修复了入口的SQL注入 ，导致验证码校验出无法验证通过  
```
	// 验证邀请码
	$sql_checkyqm = "SELECT * FROM huoma_yqm WHERE yqm = '$yqm'";
	$result_yqm = $conn->query($sql_checkyqm);
	 
	if ($result_yqm->num_rows > 0) {
``` 
因此SSRF需要同时满足，攻击者有验证码，并且网站是默认站点，两个条件才会触发，暂且不进行修复，等下期处理   

### 登录功能  
#### SQL注入漏洞 
没有对输入的用户名和密码进行过滤，导致SQL注入，进而造成万能密码登录的问题   
**文件**: account\login\logincheck.php 
**修复方法**:  
由于接收的参数都是字符串类型，因此直接将接收到参数进行单引号字符替换   
```
//过滤掉单引号 防止注入
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}
// 获取前端POST过来的数据
$user = trim_my($_POST["user"]);
$pwd = trim_my($_POST["pwd"]);
```  
#### 暴力破解  
登录未对登录次数进行限制，存在暴力破解   
采用session保存错误次数  
```
//防暴力破解  连续输入10次 则禁止登陆
session_start(); 

if(isset($_SESSION["pass.wrong"])) {
	if(intval($_SESSION["pass.wrong"]) > 10) {
		$result = array(
			'code' => '106',
			'msg' => '账号或密码错误'
		);
		
	}
	
}
```
登录失败一次，记一次数   
```
$result = array(
        'code' => '106',
        'msg' => '账号或密码错误' 
    );
    
    if(isset($_SESSION["pass.wrong"])){
        $_SESSION["pass.wrong"] = intval($_SESSION["pass.wrong"]) + 1; 
    }else {
        $_SESSION["pass.wrong"] = 1; 
    }
```  
由于session本身基于客户端传递的cookie，因此当客户端每次爆破未传递cookie，将导致**无session**，进而防御失效   
可通过设置强密码和未知用户名来提高攻击门槛，下一版本增加对IP和图片验证码功能    

### xufei_do  
在account下有个xufei_do.php文件，同样存在SQL注入 ,直接修复  

```
//过滤掉单引号 防止注入
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}
// 获得表单POST过来的数据
$yqmstr = trim_my($_POST["yqm"]);
$user = trim_my($_POST["user"]);
```

### 密码找回  
与注册功能存在同样的漏洞:SQL注入和特定条件下的SSRF   
**文件**: account\fpwd\fpwdcheck.php
```
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}
// 获取前端POST过来的数据
$user = trim_my($_POST["user"]);
$email = trim_my($_POST["email"]);
```

### 后台功能登录  
存在SQL注入，同样进行修复  
文件 \dashboard\account\login\logincheck.php  
```
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}

// 获取前端POST过来的数据
$user = trim($_POST["user"]);
$pwd = trim($_POST["pwd"]);
```

### 活码 
文件地址  \common\qun\index.php  

只接收了 hmid 参数，并且是int类型，直接强制转换成int即可  
```
$qun_hmid = intval($qun_hmid); 
```  

文件  common\qun\redirect\index.php 
这个是字符型  修复代码  
```
//过滤掉单引号 防止注入
function trim_my($mydata) {
	return trim(str_replace("'","",$mydata));
}
// 获取数据
$qun_hmid = trim_my($_GET["hmid"]);

```  

common下其它问题 都进行类似处理即可   

### 总结  
第一版只修复部分功能，保证登录入口和活码接口的安全性，只适合个人自己使用，部署建议:  

- 删除addons和pay文件夹 
这个主要是做微信支付的，用不到可以直接删除  
- 后台功能如console和dashboard 可以在宝塔上添加401 二次认证  防止漏洞出现    


  
## 联系我们   
由于平时工作比较忙，可能无法及时处理issus, 因此建了一个付费交流群，希望大家可以讨论关于活码相关技术，为了防止广告人加入，设置了付费入群，每人仅需1元, [**点击付费1元加入里客云官方交流 链接**](http://720life.cn/joinqun.php/2/)   
或者直接扫码加入    
![](http://static.720life.cn/img/likeyun/1%E5%85%83%E7%BE%A4.png)   


## 原作者
Name:TANKING<br/>
WeChat:sansure2016<br/>
Blog:https://segmentfault.com/u/tanking<br/>

