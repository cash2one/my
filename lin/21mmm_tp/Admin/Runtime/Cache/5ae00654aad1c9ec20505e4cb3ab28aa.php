<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>menu</title>
<link rel="stylesheet" href="__PUBLIC__/Skin/admin/css/base.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Skin/admin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Skin/admin/js/frame/menu.js"></script>
<base target="main" />
<style type="text/css">
.new{ margin-left:40px; display:inline-block;}
</style>
</head>
<table>
<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): ++$i;$mod = ($i % 2 )?><?php if(($item['group_id'])  ==  $menuTag): ?><?php if((strtolower($item['name']))  !=  "public"): ?><?php if((strtolower($item['name']))  !=  "index"): ?><?php if(($item['access'])  ==  "1"): ?><tr class="row " >
	<td><div style="margin:0px 5px"><img SRC="../Public/images/comment.gif" WIDTH="9" HEIGHT="9" BORDER="0" align="absmiddle" ALT=""> <a href="__APP__/<?php echo ($item['name']); ?>/index/" id="<?php echo ($key); ?>"><?php echo ($item['title']); ?></a></div></td>
</tr><?php endif; ?><?php endif; ?><?php endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
	<!-- Item 1 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items1_1")'>常用操作</dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <ul class='sitemu'>
            <li>
              <div class='items'>
                <div class='fllct'><a href='archives.html' target='main'>网站栏目管理</a></div>
                <div class='flrct'> <a href='archives.html' target='main'><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='创建栏目' title='创建栏目'/></a> </div>
              </div>
            </li>
            <li><a href='archives.html' target='main'>所有档案列表</a> </li>
            <li>
              <div class='items'>
                <div class='fllct'><a href='archives.html' target='main'>内容回收站</a></div>
                <div class='flrct'> <a href='archives.html' target='main'><img src='__PUBLIC__/Skin/admin/images/frame/gtk-del.png' alt='清空回收站' title='清空回收站'/></a> </div>
              </div>
            </li>
          </ul>
        </dd>
      </dl>
      <!-- Item 1 End -->
      
      
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items2_1")'>个人版块</dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li>
            	<div class='items'>
                    <div class='fllct'><a href='__APP__/Member/index/utype/person' target='main'>个人用户</a></div>
                    <div class='flrct'> <a href='__APP__/Member/add/utype/person' target='main'><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='创建用户' title='创建用户'/></a> </div>
             	</div>
            </li>
            <li><a href='__APP__/Resume'>简历管理</a>  <a href='__APP__/Resume/add' class="new"><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='添加' title='添加'/></a></li>
            <li><a href='#'>求学管理</a></li>
            <li><a href='#'>咨询管理</a></li>
            <li><a href='#'>报名管理</a></li>
            <li>
            	<div class='items'>
                    <div class='fllct'><a href='archives.html' target='main'>网站栏目管理</a></div>
                    <div class='flrct'> <a href='archives.html' target='main'><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='创建栏目' title='创建栏目'/></a> </div>
             	 </div>
            </li>
            <li><a href='#'>个人证书</a></li>
          </ul>
        </dd>
      </dl>
      <!-- Item 2 End -->
      
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items3")'>企业版块</dt>
        <dd style='display:block' class='sitem' id='items3'>
          <ul class='sitemu'>
            <li>
            	<div class='items'>
                    <a href='__APP__/Member/index/utype/unit' target='main'>企业用户</a>
                    <a href='archives.html'  class="new"><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='创建用户' title='创建用户'/></a>
             	 </div>
            </li>
            <li><a href='__APP__/Company'>公司管理</a> <a href='__APP__/Company/add' class="new"><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='添加' title='添加'/></a></li>
            <li><a href='__APP__/Job'>职位管理</a> <a href='__APP__/JOb/add' class="new"><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='添加' title='添加'/></a></li>
            <li><a href='#'>收费服务</a></li>
            <li><a href='#'>个人证书</a></li>
            <li><a href='#'>求学管理</a></li>
            <li><a href='#'>咨询管理</a></li>
            <li><a href='#'>报名管理</a></li>
          </ul>
        </dd>
      </dl>
      <!-- Item 2 End -->
      
      <dl class='bitem'>
        <dt onClick='showHide("items4")'>学校管理</dt>
        <dd style='display:block' class='sitem' id='items4'>
          <ul class='sitemu'>
            <li><a href='#'>学校用户</a></li>
            <li><a href='#'>学校管理</a></li>
            <li><a href='#'>教室管理</a></li>
            <li><a href='#'>课程管理</a></li>
            <li><a href='#'>教师管理</a></li>
            <li><a href='#'>作品管理</a></li>
            <li><a href='#'>荣誉管理</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items5")'>财物管理</dt>
        <dd style='display:block' class='sitem' id='items5'>
          <ul class='sitemu'>
         	<li><a href='#'>服务设置</a></li>
          	<li><a href='#'>金币管理</a></li>
            <li><a href='#'>充值记录</a></li>
            <li><a href='#'>服务购买记录</a></li>
          </ul>
        </dd>
      </dl>
      
       <dl class='bitem'>
        <dt onClick='showHide("items6")'>资讯</dt>
        <dd style='display:block' class='sitem' id='items6'>
          <ul class='sitemu'>
            <li><a href='__APP__/News'>新闻管理</a></li>
            <li><a href='__APP__/'>专题管理</a></li>
            <li><a href='__APP__/One'>一句话</a></li>
            <li><a href='__APP__/comment'>评论管理</a></li>
            <li><a href='__APP__/complain'>投诉管理</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items7")'>其它项目</dt>
        <dd style='display:block' class='sitem' id='items7'>
          <ul class='sitemu'>
            <li>
            	<div class='items'>
                    <div class='fllct'><a href='__APP__/Supply'>供求管理</a></div>
                    <div class='flrct'> <a href='__APP__/Supply/add'><img src='__PUBLIC__/Skin/admin/images/frame/gtk-sadd.png' alt='添加' title='添加'/></a> </div>
             	</div>
            </li>
            <li><a href='__APP__/Supply'>招商</a></li>
            <li><a href='__APP__/Supply'>展位</a></li>
            <li><a href='__APP__/Supply'>展厅</a></li>
            <li><a href='__APP__/Supply'>门店</a></li>
            <li><a href='__APP__/Supply'>加盟</a></li>
            <li><a href='__APP__/Supply'>供求</a></li>
            <li><a href='__APP__/Supply'>供求</a></li>
            <li><a href='__APP__/Supply'>供求</a></li>
            <li><a href='__APP__/File'>文件管理</a></li>
            <li><a href='#/admin-templates/'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items8")'>邮件管理</dt>
        <dd style='display:block' class='sitem' id='items8'>
          <ul class='sitemu'>
            <li><a href='__APP__/Email/send'>批量发送邮件</a></li>
            <li><a href='__APP__/Email/collect'>邮箱收集</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items8")'>会员管理</dt>
        <dd style='display:block' class='sitem' id='items8'>
          <ul class='sitemu'>
            <li><a href='#'>联运类别管理</a></li>
            <li><a href='#/admin-templates/'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items9")'>采集管理</dt>
        <dd style='display:block' class='sitem' id='items9'>
          <ul class='sitemu'>
            <li><a href='#'>联运类别管理</a></li>
            <li><a href='#/admin-templates/'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items10")'>模板管理</dt>
        <dd style='display:block' class='sitem' id='items10'>
          <ul class='sitemu'>
            <li><a href='#'>联运类别管理</a></li>
            <li><a href='#/admin-templates/'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
      
       <dl class='bitem'>
        <dt onClick='showHide("items11")'>应用中心</dt>
        <dd style='display:block' class='sitem' id='items11'>
          <ul class='sitemu'>
          	<li><a href='__APP__/public/menu/tag/2/title/'>应用中心</a></li>
            <li><a href='__APP__/Form'>数据管理</a></li>
            
            <li><a href='__APP__/Node/'>节点</a></li>
            <li><a href='__APP__/Role/'>角色</a></li>
            <li><a href='__APP__/User/'>后台用户</a></li>
            
            <li><a href='#/admin-templates/'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items12")'>推广管理</dt>
        <dd style='display:block' class='sitem' id='items12'>
          <ul class='sitemu'>
            <li><a href='#'>人才置顶</a></li>
            <li><a href='#'>人才推荐</a></li>
            <li><a href='#'>供求置顶</a></li>
            <li><a href='#'>供求推荐</a></li>
          </ul>
        </dd>
      </dl>
      
      <dl class='bitem'>
        <dt onClick='showHide("items13")'>系统管理</dt>
        <dd style='display:block' class='sitem' id='items13'>
          <ul class='sitemu'>
            <li><a href='__APP__/Enum'>联动类别管理</a></li>
            <li><a href='__APP__/Category'>分类管理</a></li>
            <li><a href='__APP__/Config'>系统配置</a></li>
            <li><a href='__APP__/Js'>生成js公共变量</a></li>
          </ul>
        </dd>
      </dl>
      
      
     
      <dl class='bitem'>
        <dt onClick='showHide("items14")'>系统帮助</dt>
        <dd style='display:block' class='sitem' id='items14'>
          <ul class='sitemu'>
            <li><a href='#'>官方网站</a></li>
            <li><a href='#/admin-templates/'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
	  </td>
  </tr>
</table>
</body>
</html>