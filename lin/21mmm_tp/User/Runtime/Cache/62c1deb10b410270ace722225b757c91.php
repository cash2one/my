<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<link href="__PUBLIC__/Skin/User/login.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div id="login">
	
	     <div id="top">
		      <div id="top_left"></div>
			  <div id="top_center"></div>
		 </div>
		 
		 <div id="center">
		      <div id="center_left"></div>
			  <div id="center_middle">
			  	<form action="__URL__/chkLogin" method="post" style="margin:0px;">
			  		<div id="lexing"></div>
			       <div id="user">用&nbsp;&nbsp;&nbsp;&nbsp;户：
			           <input type="text" name="username" id="username" style="width:120px; border:#648ab4 1px solid;" /> 
			       </div>
				   <div id="pwd">密&nbsp;&nbsp;&nbsp;&nbsp;码：
				       <input type="password" name="password" id="password" style="width:120px; border:#648ab4 1px solid;" /> 
				   </div>
				   <div id="howlong" >记住密码：<input type="checkbox" name="savetime" id="savetime" /></div>
				   <!--<div id="lexing">验&nbsp;证&nbsp;码：<input type="text" name="code" style="width:80px; border:#648ab4 1px solid;" /> <img src="/code/code.php" style="cursor:pointer;margin-bottom:-10px !important;margin-bottom:-5px;" onclick="javascript:this.src=this.src+'?'+Math.random();" />
			       </div>-->
                   <input type="hidden" value="<?php echo ($referer); ?>" name="referer" id="referer" />
				   <div id="btn"><span><input type="submit" value='登录' /></span> <span><input type="reset" value='清空' /></span></div> 
                   <div id="service2" style="margin:10px;">
                   	<a href="/register.php?type=person">注册个人用户</a> 
                   	<a href="/register.php?type=unit">注册企业用户</a>
                    <a href="/register.php?type=school">注册学校用户</a>
                    
                   </div>
                   <div style="text-align:center;"><a href="fetchpwd.php">忘记了密码，我要找回密码</a></div>
			  </form>
			  </div>
			  <div id="center_right"></div>		 
		 </div>
		 <div id="down">
		      <div id="down_left">
			      <div id="inf">
					   <span class="copyright">中华美容网 版权所有 沪ICP备</span>
			      </div>
			  </div>
			  <div id="down_center"></div>		 
		 </div>

	</div>
</body>
</html>