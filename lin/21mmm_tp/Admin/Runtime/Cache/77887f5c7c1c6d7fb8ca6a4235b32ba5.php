<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理平台 <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css" />
<script type="text/javascript" src="__PUBLIC__/Js/publicVar.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';

//-->
</script>
</head>

<body >


<style type="text/css">


#pPanel{ border:solid 0px #0f0; text-align:left;}
#splitBorder{ border:3px solid #f00; margin:10px 0;}
#panel{ border:solid 0px #f00; text-align:left;}
.spFirst { cursor:hand; color:#F63; font-size:12px; font-weight:bold; margin:0 10px;}
.spSelect{ color:#F63; font-size:12px; font-weight:bold; margin:0 10px; background-color:#fff;}
</style>
<style type="text/css" >

/*.window_bg{ position:absolute; width:1500px; height:1000px; z-index:9; background-color:#464646; left:0; top:0; FILTER: alpha(opacity=50);}
.window{ position:absolute; height:300px; width:500px; background-color:#ccc; z-index:99; display:none; padding:0 0px; font-size:13px; font-weight:bold; border:1px solid #935A69;}*/
</style>
<style type="text/css">
body{ width:100%; height:100%; margin:0;}

.window_bg{ position:absolute; width:100%; height:100%; z-index:9; background-color:#464646; left:0; top:0; FILTER: alpha(opacity=50);}
.window_bg iframe{ width:100%; height:100%; background-color=transparent;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); }
.window{ position:absolute; height:300px; width:500px; background-color:#ccc; z-index:99; display:none; padding:0 0px; font-size:13px; font-weight:bold; border:1px solid #935A69;}

#wTitle{ height:30px; line-height:30px; color:#fff; background:url(__PUBLIC__/Skin/index/bj_nav.jpg);} /*标题栏*
#wContent{text-align:left;} /*内容*/
#wStatus{} /*状态栏*/
#dSelect{ text-align:left; margin:5px; 5px;} /*显示选中*/
.spSelected{ margin:0 20px; } /* 选中的项的span*/


/*iframe{ width:100px; height:100px; background-color:#F00;}*/

.textArea{ color:#CCC;}
</style>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Job/place.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/wpCalendar.js"></script>

<div id="main" class="main" >
<div class="content">
<div class="title">添加数据 [ <a href="__URL__">返回列表</a> ]</div>
<div id="result" class="result none"></div>

<div style="position:relative;">


<form method='post' id="form1" name="form1" action="__URL__/insert" >
<input type="hidden" id="tempid" name="tempid" value="<?php echo ($vo["tid"]); ?>" />

<table width="800" cellpadding="3" cellspacing="3" class="add">
<tr>
	<td class="tRight" width="100">简历名称：</td>
	<td class="tLeft" ><input  name="resumename" id="resumename" type="text" value="<?php echo ($vo["resumename"]); ?>"></td>
</tr>
<tr> 
	<td class="tRight tTop">真实姓名：</td>
	<td class="tLeft"><input name="realname" type="text" id="realname" value="<?php echo ($vo["realname"]); ?>" /></td>
</tr>

<tr> 
	<td class="tRight tTop">求职意向：</td>
	<td class="tLeft"><input id="btnSelect" type="button" onclick="selectJobClick();" value="<?php echo ($vo["job_request_text"]); ?>" />
                        <input type="hidden" value="<?php echo ($vo["job_request"]); ?>" id="job_request" name="job_request" check="Require" warning="求职意向必须选择"/></td>
</tr>
<tr> 
	<td class="tRight tTop">希望工作地：</td>
	<td class="tLeft"><input id="btnArea" type="button" onclick="selectAreaClick();" value="<?php echo ($vo["local"]); ?>" />	    <input type="hidden" value="<?php echo ($vo["local"]); ?>" id="local" name="local" check="Require" warning="工作地必须选择"/></td>
</tr>
<tr> 
	<td class="tRight tTop">手机：</td>
	<td class="tLeft"><input name="mobile" type="text" id="mobile" value="<?php echo ($vo["mobile"]); ?>" check="Mobile" warning="手机格式不正确"/><span></span></td>
</tr>
<tr> 
	<td class="tRight tTop">电子邮件：</td>
	<td class="tLeft"><input name="email" type="text" id="email" value="<?php echo ($vo["email"]); ?>" check="Email" warning="email格式不正确" /><span></span></td>
</tr>
<tr> 
	<td class="tRight tTop">qq：</td>
	<td class="tLeft"><input name="qq" type="text" id="qq" value="<?php echo ($vo["qq"]); ?>" /></td>
</tr>
<tr> 
	<td class="tRight tTop">性别：</td>
	<td class="tLeft"><input type=radio name=gender value='1'>男&nbsp;<input type=radio name=gender value='0' checked>女&nbsp;</td>
</tr>

<tr> 
	<td class="tRight tTop">工作经验：</td>
	<td class="tLeft"><textarea name="work" rows="10" cols="70" id="work" class="textArea" onfocus="clearValue(this);"><?php echo ($vo["work"]); ?></textarea></td>
</tr>
<tr> 
	<td class="tRight tTop">技能专长：</td>
	<td class="tLeft"><textarea name="skill" rows="10" cols="70" id="skill" class="textArea" onfocus="clearValue(this);"><?php echo ($vo["skill"]); ?></textarea></td>
</tr>


</table>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Job/city.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/SB/place.js" charset="utf-8"></script>
<div id="details">
<table width="100%" cellpadding="3" cellspacing="3">
<tr> 
	<td width="100" class="tRight tTop">教育经历：</td>
	<td class="tLeft"><textarea name="edu" rows="10" cols="70" id="edu" class="textArea" onfocus="clearValue(this);"><?php echo ($vo["edu"]); ?></textarea></td>
</tr>

<tr> 
	<td width="100" class="tRight tTop">其它：</td>
	<td class="tLeft"><textarea name="other" id="other"  rows="10" cols="70" class="textArea"  onfocus="clearValue(this);"><?php echo ($vo["other"]); ?></textarea></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">固定电话：</td>
	<td class="tLeft"><input name="phone" type="text" id="phone" value="<?php echo ($vo["phone"]); ?>" /></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">现居住地：</td>
	<td class="tLeft"><script>areao.load("inplace","city","<?php echo ($vo["inplace"]); ?>","<?php echo ($vo["city"]); ?>",2)</script></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">户籍：</td>
	<td class="tLeft">
    
    <script>areao.load("household","city","<?php echo ($vo["household"]); ?>","<?php echo ($vo["city"]); ?>",2)</script>
    </td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">出生日期：</td>
	<td class="tLeft"><input name="birthday" type="text" id="birthday" value="<?php echo ($vo["birthday"]); ?>" onfocus="showCalendar(this)" readonly /></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">民族：</td>
	<td class="tLeft">
    <select name="native" id="native"><option value=''>请选择</option><option value='汉族' selected>汉族</option><option value='蒙古族'>蒙古族</option><option value='满族'>满族</option><option value='朝鲜族'>朝鲜族</option><option value='赫哲族'>赫哲族</option><option value='达斡尔族'>达斡尔族</option><option value='鄂温克族'>鄂温克族</option><option value='鄂伦春族'>鄂伦春族</option><option value='回族'>回族</option><option value='东乡族'>东乡族</option><option value='土族'>土族</option><option value='撒拉族'>撒拉族</option><option value='保安族'>保安族</option><option value='裕固族'>裕固族</option><option value='维吾尔族'>维吾尔族</option><option value='哈萨克族'>哈萨克族</option><option value='柯尔克孜族'>柯尔克孜族</option><option value='锡伯族'>锡伯族</option><option value='塔吉克族'>塔吉克族</option><option value='乌孜别克族'>乌孜别克族</option><option value='俄罗斯族'>俄罗斯族</option><option value='塔塔尔族'>塔塔尔族</option><option value='藏族'>藏族</option><option value='门巴族'>门巴族</option><option value='珞巴族'>珞巴族</option><option value='羌族'>羌族</option><option value='彝族'>彝族</option><option value='白族'>白族</option><option value='哈尼族'>哈尼族</option><option value='傣族'>傣族</option><option value='傈僳族'>傈僳族</option><option value='佤族'>佤族</option><option value='拉祜族'>拉祜族</option><option value='纳西族'>纳西族</option><option value='景颇族'>景颇族</option><option value='布朗族'>布朗族</option><option value='阿昌族'>阿昌族</option><option value='普米族'>普米族</option><option value='怒族'>怒族</option><option value='德昂族'>德昂族</option><option value='独龙族'>独龙族</option><option value='基诺族'>基诺族</option><option value='苗族'>苗族</option><option value='布依族'>布依族</option><option value='侗族'>侗族</option><option value='水族'>水族</option><option value='仡佬族'>仡佬族</option><option value='壮族'>壮族</option><option value='瑶族'>瑶族</option><option value='仫佬族'>仫佬族</option><option value='毛南族'>毛南族</option><option value='京族'>京族</option><option value='土家族'>土家族</option><option value='黎族'>黎族</option><option value='畲族'>畲族</option><option value='高山族'>高山族</option></select>
    </td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">外语：</td>
	<td class="tLeft">
   				<select name="foreign_language">
						<option value="无">无</option>
						<option value="英语" selected="selected">英语</option>
						<option value="日语">日语</option>
						<option value="德语">德语</option>
						<option value="法语">法语</option>
						<option value="俄语">俄语</option>
						<option value="朝鲜语">朝鲜语</option>
						<option value="西班牙语">西班牙语</option>
						<option value="阿拉伯语">阿拉伯语</option>
						<option value="其他">其他</option>
						
				</select> 水平：
				<select name="foreign_level">
						<option value="无">无</option>
						<option value="四级">四级</option>
						<option value="六级">六级</option>
						<option value="八级">八级</option>
						<option value="精通">精通</option>
						<option value="良好">良好</option>
						<option value="一般" selected="selected">一般</option>
				</select>
    </td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">身高：</td>
	<td class="tLeft"><input name="high" type="text" id="high" value="<?php echo ($vo["high"]); ?>" /></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">体重：</td>
	<td class="tLeft"><input name="weight" type="text" id="weight" value="<?php echo ($vo["weight"]); ?>" /></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">身份证：</td>
	<td class="tLeft"><input name="card" type="text" id="card" value="<?php echo ($vo["card"]); ?>" /></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">婚姻状况：</td>
	<td class="tLeft"><label> <?php echo ($vo["marriage"]); ?> </label></td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">提供食宿：</td>
	<td class="tLeft"><?php echo ($vo["housing"]); ?></td>
</tr> 
<tr> 
	<td width="100" class="tRight tTop">到岗时间：</td>
	<td class="tLeft"><?php echo ($vo["toposi"]); ?></td>
</tr> 
<tr> 
	<td width="100" class="tRight tTop">求职性质：</td>
	<td class="tLeft"><?php echo ($vo["em_type"]); ?></td>
</tr> 
<tr> 
	<td width="100" class="tRight tTop">个人主页：</td>
	<td class="tLeft"><input name="domain" type="text" id="domain" value="<?php echo ($vo["domain"]); ?>" /></td>
</tr> 
<tr> 
	<td width="100" class="tRight tTop">学历：</td>
	<td class="tLeft">
    <select name=study id=study><option value=''>请选择</option><option value='初中'>初中</option><option value='高中'>高中</option><option value='中专' selected>中专</option><option value='大专'>大专</option><option value='本科'>本科</option><option value='硕士'>硕士</option><option value='硕士以上'>硕士以上</option><option value='其他'>其他</option></select>
    </td>
</tr>
<tr> 
	<td width="100" class="tRight tTop">美容证书：</td>
	<td class="tLeft">
    <select name="certificate">
						  <option value="">请选择</option>
						  <option value="初级美容师证">初级美容师证</option>
						  <option value="中级美容师证"  selected="selected">中级美容师证</option>
						  <option value="高级美容师证">高级美容师证</option>
						  <option value="香薰师">香薰师</option>
						  <option value="纹绣师">纹绣师</option>
						  <option value="化妆师">化妆师</option>
						  <option value="美体师">美体师</option>
						  <option value="营养师">营养师</option>
						  <option value="医师">医师</option>
						  <option value="初级发型师">初级发型师</option>
						  <option value="中级发型师">中级发型师</option>
						  <option value="高级发型师">高级发型师</option>
						  <option value="教师资格">教师资格</option>
						  <option value="初级美甲师">初级美甲师</option>
						  <option value="中级美甲师">中级美甲师</option>
						  <option value="高级美甲师">高级美甲师</option>
						  <option value="保健师">保健师</option>
						  <option value="按摩师">按摩师</option>
						  <option value="其他">其他</option>
				 </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://school.21mmm.com/zjbm.php" target="_blank" style="left:100px;">我要考证</a>
    </td>
</tr> 
<tr> 
	<td width="100" class="tRight tTop">联系地址：</td>
	<td class="tLeft"><input name="addr" type="text" id="addr" value="<?php echo ($vo["addr"]); ?>" /></td>
</tr> 
<!--<tr> 
	<td class="tRight tTop">邮政编码：</td>
	<td class="tLeft"><input name="part" type="text" id="part" value="<?php echo ($vo["part"]); ?>" /></td>
</tr> -->
<tr> 
	<td width="100" class="tRight tTop">个人风采：</td>
	<td height="220" class="tLeft">
   			
            
    </td>
</tr> 

</table>
</div>
<div style="width:85%;margin:5px; text-align:center;">
	<input type="hidden" name="status" value="1">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>">
    <input type="hidden" name="model" id="model" value="resume" />
    <input type="hidden" name="thumb" id="thumb" value="" />
    <input type="hidden" name="tid" id="tid" value="<?php echo ($vo["tid"]); ?>" /><!--个人照片及风采tid-->
    <input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>" /><!--简历id,用于修改-->
    <input type="hidden" name="pid" id="pid" value="<?php echo ($vo["pid"]); ?>" /><!--若不用旧程序时，此处可去-->
	<input type="submit" value="保 存"  class="button small"> 
	&nbsp;
	<input name="按钮" type="button" class="button " onclick="showDetails()" value="详 细" id="btnDetails" />
</div>
</form>
<div style="position:absolute; left: 640px; top: 3px; width: 250px; height: 25px; border: 1px none #000000;">
<form action="<?php echo C("IMG_URL");?>upload/upload_one.php?tid=<?php echo ($vo["tid"]); ?>" enctype="multipart/form-data" method="post" target="up" onsubmit="clearCut();" >
<input name="img" type="file" id="img" size="15" />
<input type="submit" name="button" id="submit" value="提交" />

<input type="hidden" name="model" id="model" value="Person" />
<input type="hidden" name="type" id="type" value="job" />
<input type="hidden" name="utype" id="utype" value="person_face" />
<input type="hidden" name="tid" id="tid" value="<?php echo ($vo["tid"]); ?>" />

<input type="hidden" name="upThumb" id="upThumb" />
<input type="hidden" name="thumb" id="thumb_999" value="<?php echo ($vo["thumb"]); ?>" />
<input name="k" value="999" type="hidden" />
<input type="hidden" name="upTid" id="upTid" />


<input name="x1" type="hidden" id="x1" />
<input name="y1" type="hidden" id="y1" />
<input name="x2" type="hidden" id="x2" />
<input name="y2" type="hidden" id="y2" />
<input name="w" type="hidden" id="w" />
<input name="h" type="hidden" id="h" />

</form>
<iframe name="up" style="display:none;"></iframe>
<div id="preview"><?php if(empty($vo["thumb"])): ?>没有图片<?php else: ?><img src="<?php echo (img($vo["thumb"])); ?>" /><?php endif; ?></div>
<div id="p2"></div>
</div>

<!--修改个人风采图片-->
<div style="position:absolute; left: 108px; top: 1613px; width: 250px; height: 25px;  border: 0px solid #000000; z-index:2; width:700px; height:200px;">
		<table><tr>
			<?php if(is_array($p)): $k = 0; $__LIST__ = $p;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): ++$k;$mod = ($k % 2 )?><td valign="bottom">
            	<img id="img_<?php echo ($k); ?>" src="<?php if(empty($img["thumb"])): ?>err/nohave.gif<?php else: ?><?php echo (img($img["thumb"])); ?><?php endif; ?>" width="100" />
                <!--<a id="editPhoto">编辑</a>-->
                
               
                <form id="form_<?php echo ($k); ?>" action="<?php echo C("IMG_URL");?>upload/upload_one.php?tid=<?php echo ($vo["tid"]); ?>" enctype="multipart/form-data" method="post" target="fr<?php echo ($k); ?>">
                <input name="file1" type="file" id="file1" size="1" onchange="fileChange(<?php echo ($k); ?>,this);" />
                <input name="k" value="<?php echo ($k); ?>" type="hidden" />
                <?php if(($img["thumb"])  !=  ""): ?><a href="/file/del/id/<?php echo ($img["id"]); ?>" urn="">删除</a><?php endif; ?>
                <input type="hidden" id="thumb_<?php echo ($k); ?>" name="thumb" value="<?php echo ($img["thumb"]); ?>" />
                <input type="hidden" id="model" name="model" value="PersonMien" />
                <input type="hidden" id="type" name="type" value="job" />
                <input type="hidden" id="utype" name="utype" value="person" />
                <input type="hidden" id="tempid" name="tempid" value="<?php echo ($vo["tid"]); ?>" />
                <input type="hidden" id="desPreview" name="desPreview" value="bbb" />
                
                <iframe name="fr<?php echo ($k); ?>" style="display:none;"></iframe>
                </form>
            </td><?php endforeach; endif; else: echo "" ;endif; ?>
           <div id="bbb" style="display:none;"></div>
            
            
         </tr></table>
</div>


</div>
</div>
</div>

<input type="hidden" id="workValue"  value="填写工作经历，例如：
2007年8月- 现在    某某网  网络编辑
工作职责和业绩：
1、 根据某某网“体坛快讯”频道的整体规划，参与频道内容改版，执行频道和版块内容的策划与实现，并根据具体情况，对网页进行不定期的整改；
2、 负责本频道栏目内容的维护更新，对资源进行筛选，以及内容及形式进行审核，并负责频道内容的策划、编辑以及内容发布等工作；

2005年7月-2007年7月 某某某网 助理编辑

工作职责和业绩：协助主编进行资料收集、专题策划等。"/>


<input type="hidden" id="skillValue"  value="
填写内容参考: 

*.熟练的专业技能.深谙客户心理.掌握销售技巧.

*.技术技能熟练.善于与客户沟通!

*.工作中学习.学习中总结.总结中提升.我将不断努力!"/>

<input type="hidden" id="eduValue"  value="
                        
填写教育经历，例如：

2002/9-2004/7  北方工业大学  计算机科学与技术  本科

2000/9-2002/7  北方工业大学  计算机科学与技术  大专

1998/9-2000/7  北京大学计算机学院  计算机应用 中专
                       "/>


<input type="hidden" id="otherValue"  value="
自我评价参考:                                 
*.工作认真负责.专业知识扎实.能出色完成任务   
*.为人诚实正直.做事认真负责.专业精益求精     
*.踏踏实实做事.老老实实做人                 
                                "/>

                        
 <style>
 body{font-family:tahoma}
 div.footer{ clear:both; padding:8px 0px; width:98%; text-align:center; font:normal normal normal 11px Verdana,Geneva,Arial,Helvetica,sans-serif; background-color:#464646; border-top:2px solid silver; color:silver}
div.footer a{color:white; text-decoration:none; border-bottom:1px dotted}
div.footer a:hover{color:silver; text-decoration:none; border-bottom:1px dotted}
.think_run_time{text-align:center; width:100%;font-size:12px;}
</style>
<!-- 版权信息区域 -->
<!--<div id="footer" class="footer" >Powered by qihjn <?php echo (THINK_VERSION); ?> | Template designed by <a target="_blank" href="http://www.wzrun.com">TopThink</a> <span id="run"></span>
</div>-->
</body>
</html>
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>


<script language="javascript" src="__PUBLIC__/Js/Form/myCheckForm.js?"+Math.random()+""></script>
<script type="text/javascript" src="__PUBLIC__/Js/CutImg/jquery-1.4.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/CutImg/css/imgareaselect-default.css" />
<script type="text/javascript" src="__PUBLIC__/Js/CutImg/jquery.imgareaselect.pack.js"></script>

<script type="text/javascript" src="__PUBLIC__/Js/CutImg/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/CutImg/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
document.domain = jsDomain;
//document.getElementById("details").style.display = "none";
function showDetails(){
	//alert(document.getElementById("details").style.display);
	if(document.getElementById("details").style.display == "none"){
		document.getElementById("details").style.display = "block";
		document.getElementById("btnDetails").value = "隐藏";
	}else{
		document.getElementById("details").style.display = "none";
		document.getElementById("btnDetails").value = "详细";
	}
}
function show() {
    if ($('#lightbox-image').is(':visible')) {
        $('#lightbox-image').imgAreaSelect({ 
            x1: 10, y1: 10, x2: 100, y2: 100, handles: true,
            parent: '#jquery-lightbox'
        });
        $('#jquery-lightbox').unbind('click');
        $('#lightbox-nav').remove();
    }
    else
        setTimeout(show, 50);
}


var coord = { x1: 50, y1: 50, x2: 170, y2: 210,w:150,h:200,maxHeight:400,maxWidth:300};
$('#x1').val(coord.x1);
$('#y1').val(coord.y1);
$('#x2').val(coord.x2);
$('#y2').val(coord.y2);
//$('#w').val(coord.w);
//$('#h').val(coord.h);
function preview(img, selection) {
    if (!selection.width || !selection.height)
        return;

	if(!(selection.x1 || selection.y2)){
		selection.x1 = coord.x1;
		selection.y2 = coord.y1;
		selection.x2 = coord.x2;
		selection.y2 = coord.y2;
	}
    $('#x1').val(selection.x1);
    $('#y1').val(selection.y1);
    $('#x2').val(selection.x2);
    $('#y2').val(selection.y2);
    $('#w').val(selection.width);
    $('#h').val(selection.height);    
}


</script>


<script language="javascript" type="text/javascript">
var cut;
document.getElementById("img").onchange = function(){
	document.getElementById("preview").innerHTML = '';
	document.getElementById("preview").innerHTML = '<img  src="' + document.getElementById("img").value + '"  />';

	cut = $('#preview img').imgAreaSelect({ x1: coord.x1, y1: coord.y1, x2: coord.x2, y2: coord.y2,maxHeight:coord.maxHeight,maxWidth:coord.maxWidth,handles:false,aspectRatio: '3:4',onSelectChange: preview,show: false,instance: true });

}

function clearCut(){
	

}
function clear(){
	cut.setOptions({ hide: true });
	cut.update();
}

window.onload = function(){
	document.getElementById("submit").onclick = clear;
	//if(document.getElementById("id").value){
		//清除swf上传
		
		//创建5个单页上传表单
	//}
}

</script>

 

<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Job/cate.js"></script>
<script language="javascript" type="text/javascript">
/*********************************  弹出窗口 ****************************/
var bg,w;
function createWindow(title,content,stauts){
	//alert(title);
	document.body.style.width = "100%";
	document.body.style.height = "100%";
	bg = document.createElement('div');
	bg.className = 'window_bg';
	bg.style.width = document.documentElement.clientWidth;
	bg.innerHTML = '<iframe allowtransparency="true" ></iframe>';
	document.body.appendChild(bg);  //$('<div class="window_bg">test</div>').appendTo(document.body);
	
	
	w = document.createElement("div");
	w.className = "window";
	//document.getElementById().setAttribute(
	w.setAttribute('id','w1');
	w.style.display = 'block';
	html =  '<div id="wTitle">'+title+'</div>' +
    		   '<div id="wContent">'+content+'</div>' +
    		   '<div id="wStatus">'+stauts+'</div>';
	w.innerHTML = html;
	document.body.appendChild(w);
	var bodyW = document.documentElement.clientWidth; //窗口可见区域的宽
	var bodyH = document.documentElement.clientHeight; //窗口可见区域的高
	
	var winW = w.clientWidth ;
	var winH = w.clientHeight;
//alert(document.documentElement.clientHeight);
	var winX = (bodyW - winW) / 2;
	var winY = (bodyH - winH) / 2;

	w.style.left = winX;
	w.style.top = winY;
}


function closeWindow(name){
	bg.style.display = 'none';
	w.style.display = 'none';
	document.body.removeChild(w);
}
</script>
<script language="javascript">
/***************************一二级数据显示类*********************************/
var popdata = function(data,pram){
	this.data = data;
	this.selectedValue = [];
	this.confirmSelected = []; //最终选定的值，格式：arr[20]=true
};
popdata.prototype={
	getTitle:function(k){
		//alert(k);
		//alert(this.data[0].title);
		var str;
		for(var i = 0; i < this.data.length; i++){ //数组从0开始
			//alert(v);
			if(this.data[i]["id"] == k){
				return this.data[i]["title"];
			}
			//str += this.data[i]['title'];
		}
		//return str;
	},
	showSelectedValue:function(){
		//alert(this.selectedValue);
		var arr = this.concat();
		//alert(arr.valueOf());
		var html = "";
		var j = 0;
		for(var i = 1; i <= arr.length; i++){ //由于以id为数组下标，故无索引为0的元素，从1开始
			if(arr[i]){
				html += '<input type="checkbox" value="'+i+'" name ="" checked="checked" onclick="selectedCheckboxClick(this);"  /> '+this.getTitle(i); 
				if(j % 5 == 4){
					html += '<br />';
				}
				j++;
				//html += '<span>'+ this.getTitle(i) +'</span>';
				//alert(i);
			}
		}
		return html;
	},
	concat:function(){
		var arr = [];
		var len = this.confirmSelected.length > this.selectedValue.length ? this.confirmSelected.length : this.selectedValue.length;
		for(var i = 1; i<len; i++){
			if(this.confirmSelected[i] ||  this.selectedValue[i]){
				arr[i] = true;
			}
		}
		return arr;
	},
	changValue:function(v,type){
		if(type){
			
		}else{
			
		}
	},
	showFirst:function(parent){
		var listFirstHTML = '';
		var i=0;
		for(var k in this.data){
			if(this.data[k].parentid == parent){
				//listFirstHTML += '<input type="checkbox" value="'+data[k].id+'" name =""  /> '+'<span class="spFirst" urn="' + data[k].id + '">' + data[k].title + '</span>'; 
				listFirstHTML += '<span class="spFirst" urn="' + this.data[k].id + '">' + this.data[k].title + '</span>'; 
				if(i % 5 == 4){
					listFirstHTML += '<br />';
				}
				i++;
			}
		}
		
		return listFirstHTML;
	},
	showSecond:function(parent){
		var listFirstHTML = '';
		var i=0;
		for(var k in this.data){
			if(this.data[k].parentid == parent){
				listFirstHTML += '<input type="checkbox" value="'+this.data[k].id+'" name =""  /> '+this.data[k].title; 
				if(i % 5 == 4){
					listFirstHTML += '<br />';
				}
				i++;
			}
		}
	
		return listFirstHTML;
	},
	clear:function(v){},
	clearAll:function(){}
	
	
};


/*
显示窗体，关闭窗体，选择项目，第二次打开显示前一次所选的值，
现在做的，第二次弹出窗口并没有显示已选中的值。
最好解决冲突办法就是写个类。
*/



function cancelClick(){
	clearAll(); //清除
	closeWindow(''); //不显示
}

var divFirst = 'pPanel';
var divSecond = 'panel';
var divSelect = 'dSelect';
var currentSpan;

//绑定一级列表span的click事件
function spanClick(){
	elements = document.getElementById(divFirst).getElementsByTagName('span');
	//alert(elements.length);
	for(var i = 0; i< elements.length; i++){
		elements[i].onclick = function(){
			currentSpan ? currentSpan.className = 'spFirst' : '';
			currentSpan = this;
			currentSpan.className = "spSelect";
			//alert(this.getAttribute('urn'));
			document.getElementById(divSecond).innerHTML = p.showSecond(this.getAttribute('urn'));
			bindSecondClick();
		}
	}
}


//绑定二级checkbox的click事件
function bindSecondClick(){
	var elements = document.getElementById('panel').getElementsByTagName('input');
	//var selectedElements = document.getElementById("selected").getElementsByTagName("input");
	//elements = elements.concat(selectedElements);
	for(var i = 0; i < elements.length; i++){
		if('checkbox' == elements[i].getAttribute('type')){
			elements[i].onclick = function(){
				secondCheckboxClick(this);
			}
		}
	}
}

//二级checkbox的点击事件监听
function secondCheckboxClick(v){
	//alert(v.value);
	p.selectedValue[v.value]= v.checked;
	p.confirmSelected[v.value] = v.checked;
	//alert(p.selectedValue.valueOf());
	document.getElementById(divSelect).innerHTML = p.showSelectedValue();
}

function selectedCheckboxClick(v){
	secondCheckboxClick(v);
	clearSecond(v.value);
}

//选中项清除时，清除二级选中
function clearSecond(v){
	var e = document.getElementById(divSecond).getElementsByTagName("input");
	for(var i = 0; i < e.length; i++){
		if(e[i].value == v){
			e[i].checked = false;
		}
	}
}

function clearAll(){
	p.selectedValue = [];
	
	document.getElementById(divSelect).innerHTML = p.showSelectedValue();
	var e = document.getElementById(divSecond).getElementsByTagName("input");
	for(var i = 0; i < e.length; i++){
		e[i].checked = false;
	}
}

function confirmJobSelected(){
	var v = text = '';
	p.confirmSelected = p.concat();
	for(var i = 1; i <= p.confirmSelected.length; i++){
		if(p.confirmSelected[i]){
		//text += p.getTitle(i)+",";
		v += i+",";
		
		text += p.getTitle(i)+",";
		//alert(v);
		}
	}
	closeWindow();
	document.getElementById("btnSelect").value = text;
	document.getElementById("job_request").value = v;
}

function showJobText(){
	var v = text = '';
	for(var i = 1; i <= p.confirmSelected.length; i++){
		if(p.confirmSelected[i]){
		//v += i+",";
		text += p.getTitle(i)+",";
		}
	}
	document.getElementById("btnSelect").value = text;
}

function selectJobClick(){
	createWindow('请选择 ','<div id="dSelect"></div><div id="pPanel"></div><div id="splitBorder"></div><div id="panel"></div>','<input type="button" value="确定" onclick="confirmJobSelected();" />&nbsp;&nbsp;<input type="button" value="清除所选" onclick="clearAll();" />&nbsp;&nbsp;<input type="button" value="取消" onclick="cancelClick();"  />');
	
	
	document.getElementById(divFirst).innerHTML = p.showFirst(0);
	document.getElementById(divSecond).innerHTML = p.showSecond(6);
	document.getElementById(divSelect).innerHTML = p.showSelectedValue();
	spanClick();
	//bindFirstClick();
	bindSecondClick();

}
var p = new popdata(data);

//var arr = ("40,").split(',');
//alert(arr[40]);

//初妈职位的值
var arr = new Array();
var jobRequest = document.getElementById("job_request").value;
//alert(jobRequest);
if(jobRequest){
	var arr = jobRequest.split(',');
	for(var i = 0; i< arr.length-1; i++){
		p.confirmSelected[arr[i]] = true;
	}
	showJobText();
}
//p.confirmSelected = arr;
//selectJobClick();





/******************************* 省市弹出部分 *****************************/

//alert(areaValue);

var selectedArea=[];
var currentProvince = '';
var areaValue = "";
var btnText = "";
var areaValue = document.getElementById("local").value
if(selectedArea.length < 1 && document.getElementById("local").value){
	//alert('空');
	selectedArea = areaValue.split(',');
	selectedArea.length = selectedArea.length -1;
	//alert(document.getElementById("local").value);
}
var oneCity = ['上海市','北京市','天津市','重庆市','香港','澳门'];
function createProvince(){
	var html = '';
	var i = 0;
	for(var k in province_node){
		//html += '<input type="checkbox" name="province'+k+'" id="province'+k+'" value="'+k+'" /> <span class="spFirst" urn="'+k+'">'+province_node[k]+'</span>';
		html += '<span class="spFirst" urn="'+k+'">'+province_node[k]+'</span>';
		i++;
		if(i % 7 == 0){
			html += '</br>';
		}
	}
	return html;
}

function createCity(p){
	
	var html = '';
	for(var k in oneCity){
		//alert(e);
		if(province_node[p] == oneCity[k]){
			html += '<input type="checkbox" name="province'+p+'" id="province'+p+'" value="'+oneCity[k]+'" /> <span class="province">'+oneCity[k]+'</span>';
			return html;
		}
	}
	
	for(var k in city_node){
		if(p == city_node[k].parent){
			html += '<input type="checkbox" name="province'+k+'" id="province'+k+'" value="'+city_node[k].title+'" /> <span class="province">'+city_node[k].title+'</span>';
		}
	}
	return html;
}

function bindProvinceClick(){
	var elements = document.getElementById('pPanel').getElementsByTagName('input');
	for(var i = 0; i < elements.length; i++){
		if('checkbox' == elements[i].getAttribute('type')){
			elements[i].onclick = function(){
				document.getElementById('panel').innerHTML = createCity(this.value);
				bindCityClick();
				addToArea(this.value,this.checked);
				selectAll('panel',this.checked);
				showArea();
			}
		}
	}
}

function bindSpanProvinceClick(){
	var elements = document.getElementById('pPanel').getElementsByTagName('span');
	for(var i = 0; i < elements.length; i++){
		elements[i].onclick = function(){
			if(currentProvince){
				currentProvince.className = 'spFirst';
			}
			currentProvince = this;
			currentProvince.className = 'spSelect';
			document.getElementById('panel').innerHTML = createCity(this.getAttribute('urn'));
			bindCityClick();
		}
	}
}

function bindCityClick(){
	var elements = document.getElementById('panel').getElementsByTagName('input');
	//alert(elements);
	for(var i = 0; i < elements.length; i++){
		if('checkbox' == elements[i].getAttribute('type')){
		//alert(k);
			elements[i].onclick = function(){
				cityClickHander(this);
			}
		}
	}
}

function cityClickHander(v){
	var value = '';
	if(v.value == '不限'){
		value = currentProvince.innerHTML;
	}else{
		value = currentProvince.innerHTML + '/' + v.value;
		for(var k in oneCity){
			if(v.value == oneCity[k]){
				value = v.value;
			}
		}
		
	}
	
	addToArea(value, v.checked);
	showArea();
	/*if(currentProvince.innerHTML != '上海市' && currentProvince.innerHTML != '北京市' && currentProvince.innerHTML != '天津市' && currentProvince.innerHTML != '重庆市' ){
		addToArea(currentProvince.innerHTML + '/' + v.value, v.checked);
		//alert(currentProvince.innerHTML);
	} else{
		addToArea(v.value, v.checked);
	}*/
	//alert(this.value);
	//selectAll('panel',this.checked);
	
}

function getOneArea(v){
	for(var k in province_node){
		if(v == k){
			return province_node[k];
		}
	}
	for(var k in city_node){
		if(v == k){
			return city_node[k];
		}
	}
}
function addToArea(v, type){
	//alert(v);
	//v = getOneArea(v);
	if(type){
		selectedArea.push(v);
	} else {
		removeArea(v);
	}
}
function removeArea(e){
	for(var i = 0; i < selectedArea.length; i++){
		if(e == selectedArea[i]){
			selectedArea[i] = -1;
		}
	}
}
function clearRepeateArea(){
	for(var i = 0; i < selectedArea.length; i++){
		for(var j = 0; j < selectedArea.length; j++){
			if(selectedArea[i] == selectedArea[j].parent){
				selectedArea[j] = -1;
			}
		}
	}
	
}
function clearAllArea(){
	selectedArea = new Array();
	document.getElementById('btnArea').value = '';
	document.getElementById('local').value = '';
	btnText = '请选择城市';
	areaValue = '';
	showArea();
}
function showArea(){
	var html = '';
	for(var k in selectedArea){
		text =  selectedArea[k];
		if(text != -1){
			//html += '<span class="spSelected">' + text + '</span>';
			html += '<input type="checkbox" value="'+text+'" name ="" checked="checked" onclick="selectedCheckboxClick(this);"  /> '+text; 
			//areaValue += text + ',';
			//btnText += text + ' ';
		}
	}
	if(btnText.length > 20){
		btnText = btnText.substring(0,20) + '...';
	}
	
	document.getElementById('dSelect').innerHTML = '您选择的城市有：' + html;
}

function confirmAreaSelected(){
	//alert(selectedArea.valueOf());
	var html =btnText = areaValue = '';
	for(var k in selectedArea){
		
		text =  selectedArea[k];
		
		if(text != -1){
			//html += '<span class="spSelected">' + text + '</span>';
			//html += '<input type="checkbox" value="'+text+'" name ="" checked="checked" onclick="selectedCheckboxClick(this);"  /> '+text; 
			areaValue += text + ',';
			btnText += text + ',';
		}
		
	}
	document.getElementById('btnArea').value = btnText;
	document.getElementById('local').value = areaValue;
	closeWindow();
}

function btnAreaCancle(){
	selectedArea = [];
	closeWindow();
}

function selectAreaClick(){
	createWindow('请选择城市','<div id="dSelect"></div><div id="pPanel">'+createProvince()+'</div><div id="splitBorder"></div><div id="panel"></div>','<input type="button" value="确定" onclick="confirmAreaSelected();" />&nbsp;&nbsp;<input type="button" value="清除所选" onclick="clearAllArea();" />&nbsp;&nbsp;<input id="areaCancle" type="button" value="取消" onclick="btnAreaCancle();"  />','');
	bindProvinceClick();
	bindSpanProvinceClick();
	showArea();
}

//修改时，若没有选择职位则填空默认文本
if(!document.getElementById("btnSelect").value){
	document.getElementById("btnSelect").value = "请请选择职位";
}

if(!document.getElementById("btnArea").value){
	document.getElementById("btnArea").value = "请选择城市";
}

var arr = new Array();
var jobRequest = document.getElementById("local").value;
//alert(jobRequest);
if(jobRequest){
	var arr = jobRequest.split(',');
	for(var i = 0; i< arr.length-1; i++){
		p.confirmSelected[arr[i]] = true;
	}
	showArea();
}
//********************************省市弹出结束

//textarea默认值处理
var defaultElements = new Array("other","work","edu",'skill');
var defaultV = [];
for(var e  in defaultElements){
	var els = document.getElementById(defaultElements[e]);
	if(!els.value ){
		els.value = document.getElementById(defaultElements[e]+"Value").value;
		defaultV[defaultElements[e]] = document.getElementById(defaultElements[e]).value;
	}
}


function clearValue(e){
	if(e.value == defaultV[e.id]){
		e.value = "";
		e.className="";
	}
}


//清除默认值
function clearDefault(){
	
	for(var e  in defaultElements){
		if(defaultV[defaultElements[e]] == document.getElementById(defaultElements[e]).value){
			document.getElementById(defaultElements[e]).value = "";
			
		}
	}
	
}
CheckForm(document.getElementById("form1"));
document.getElementById("form1").onsubmit = function(){
	clearDefault();
	//return CheckForm(this);
}

//个人风采图片修改
/*var edit = document.getElementById("editPhoto");
edit.onclick = function(){
	form = document.createElement("form");
	var upHtml = '<form action="http://img.21mmm.cn/upload/upload_one.php" enctype="multipart/form-data" method="post" target="fr">'+
                '<input name="file1" type="file" id="file1" size="10" />测试'+
                '<input type="submit" name="button2" id="button" value="提交" />'+
				'<input type="text" id="thumb" name="thumb" value="<?php echo ($vo["thumb"]); ?>" />'+
                '<iframe name="fr" ></iframe>'+
                '</form>';
	var div = document.createElement("div");
	div.innerHTML = upHtml;
	var up = this.parentNode.getElementsByTagName("div")[0];
	up.innerHTML = upHtml;
//document.body.insertBefore(div,this.nextSibling);	
}*/
//ctrl+s 保存
//if( e.ctrlKey && num == 83 ){
	//document.getElementById("form1").submit();
	//alert("s");
//}



	selectedValue("native",'<?php echo ($vo["native"]); ?>');
	selectedValue("certificate",'<?php echo ($vo["certificate"]); ?>');
	selectedValue("foreign_language",'<?php echo ($vo["foreign_language"]); ?>');
	selectedValue("foreign_level",'<?php echo ($vo["foreign_level"]); ?>');
	 
	
	//选中值
	function selectedValue(obj,v){
		var ops = document.getElementById(obj).options;
		for(var i = 0; i < ops.length; i++){
			if(ops[i].value == v){
				ops[i].selected = true;
			}
		}
	}
	
	



</script>