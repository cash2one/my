<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($pageTitle); ?></title>

<link href="__PUBLIC__/Css/public.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Skin/Index/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="allnet">
		<div id="school">
			<div id="star">
				<div class="bj_live">
					<p>
						                        	<?php if(($logined)  ==  "n"): ?><div class="bj_live_left">
                            <form action="__APP__/public/checklogin" method="post">
                                <span style="font-weight:bold; color:#333;">通行证：</span>	    
                                <input name="username" type="text" style="width:70px;" id="username"/>
                                <span style="font-weight:bold; color:#333;">密码：</span>
                                <input name="password" type="text" style="width:70px;" id="password"/>
                                <span style="vertical-align:middle;"><input type="image"  src="__PUBLIC__/Skin/Index/nmdl.jpg" /></span>
                                <span style="padding-left:3px; vertical-align:middle;"><a href="/public/register"><img src="__PUBLIC__/Skin/Index/zhuce.jpg" /></a></span>
                                <span style="padding-left:3px;"><a href="#">忘记密0000码</a></span>欢迎您<?php echo ($_SESSION['loginUserName']); ?>
                            </form>
                            </div><?php endif; ?>
                            <?php if(($logined)  ==  "y"): ?><div class="bj_live_left">
                             	您好:
                                <span style="font-weight:bold; color:#333;"><?php echo ($u["username"]); ?></span>	    
                                上次登录:
                                <span style="font-weight:bold; color:#333;"><?php echo ($u["lastLoginTime"]); ?></span>
                                登录次数:
                                <span style="font-weight:bold; color:#333;"><?php echo ($u["loginCount"]); ?></span>			
                               	新消息:
                                <span style="font-weight:bold; color:#333;"><?php echo ($u["loginCount"]); ?></span>
                                <span style="padding-left:3px;"><a href="/public/logout" style="color:#f00;">退出</a></span>
                             </div><?php endif; ?>
                            
                           
						<ul class="bj_live_right">
							<li>·<a href="#" target="_blank">推广</a></li>
							<li>·<a href="#" target="_blank">充值</a></li>
							<li>·<a href="#" target="_blank">客服</a></li>
							<li>·<a href="#" target="_blank">导航</a></li>
							<li>·<a href="#" target="_blank">收藏</a></li>
							<li>·<a href="#" target="_blank">手机上网</a></li>
							<li>·<a href="#" target="_blank">设为主页</a></li>
						</ul>		 
					</p>
				</div>
				<div class="clear"></div>
				<div class="logo">
					<div class="logo_vi"><a href="#"><img src="__PUBLIC__/Skin/Index/logo.jpg" /></a></div>
					<div class="logo_ad">
						<div class="logo_ad_left"><img src="__PUBLIC__/Skin/Index/l_1.jpg" /></div>
						<ul class="logo_center">
							<li><a href="#" target="_blank">招聘</a></li>
							<li><a href="#" target="_blank">求职</a></li>
							<li><a href="#" target="_blank">培训</a></li>
							<li><a href="#" target="_blank">供求</a></li>
							<li><a href="#" target="_blank">招商</a></li>
							<li><a href="#" target="_blank">转让</a></li>
							<li><a href="#" target="_blank">门店</a></li>
							<li><a href="#" target="_blank">消费</a></li>
							<li><a href="#" target="_blank">加盟</a></li>
							<li><a href="#" target="_blank">展会</a></li>
							<li><a href="#" target="_blank">展厅</a></li>
							<li><a href="#" target="_blank">资讯</a></li>
							<li style="background-image:none;"><a href="#" target="_blank">页面提速</a></li>
						</ul>
						<div class="logo_ad_left"><img src="__PUBLIC__/Skin/Index/r_1.jpg" /></div>
					</div>
				</div>
				<div class="banner">
					<div class="banner_left"><img src="__PUBLIC__/Skin/Index/bj_1.jpg" /></div>
					<div class="banner_center">
						<div class="hyzc">
							<div class="hyzc_l">
								<span class="titl"><a href="#" target="_blank">个人会员注册</a></span>
								<span class="ml"><a href="#" target="_blank">求职</a> | <a href="#" target="_blank">求学</a> | <a href="#" target="_blank">消费</a> | <a href="#" target="_blank">贸易</a></span>
							</div>
							<div class="hyzc_l">
								<span class="titl"><a href="#" target="_blank">企业会员注册</a></span>
								<span class="ml"><a href="#" target="_blank">招聘</a> | <a href="#" target="_blank">招商</a> | <a href="#" target="_blank">代理</a> | <a href="#" target="_blank">供求</a> | <a href="#" target="_blank">转让</a> | <a href="#" target="_blank">消费</a> | <a href="#" target="_blank">加盟</a> | <a href="#" target="_blank">展会</a> | <a href="#" target="_blank">贸易</a></span>
							</div>
							<div class="hyzc_l">
								<span class="titl"><a href="#" target="_blank">学校会员注册</a></span>
								<span class="ml"><a href="#" target="_blank">课程</a> | <a href="#" target="_blank">招生</a> | <a href="#" target="_blank">互动</a> | <a href="#" target="_blank">贸易</a></span>
							</div>
						</div>
						<div class="fbxh">
						
							<div class="fbxh_pic"><a href="#" target="_blank" title="招聘VIP"><img src="__PUBLIC__/Skin/Index/zp.jpg"/></a></div>
							<div class="fbxh_pic"><a href="#" target="_blank" title="网络招聘"><img src="__PUBLIC__/Skin/Index/wl.jpg"/></a></div>
							<div class="fbxh_pic"><a href="#" target="_blank" title="校园招聘"><img src="__PUBLIC__/Skin/Index/xy.jpg" /></a></div>
						</div>
						<div class="clear"></div>
						<div class="spor">9月20日 星期一 农历八月二十三 秋分 上海 多云 <img src="__PUBLIC__/Skin/Index/b0.gif" width="15" /> <img src="__PUBLIC__/Skin/Index/b1.gif" width="15"/> 20℃ / 33℃</div>
						<div class="jsnews">
							<span class="jsnews_left"><a href="#" target="_blank">即时新闻</a></span>
							<span class="jsnews_r">25分钟前 <a href="#" target="_blank">中国对秦始皇兵马俑再次挖掘</a></span>
						</div>
					</div>
					<div class="banner_left"><img src="__PUBLIC__/Skin/Index/bj_3.jpg" /></div>
				</div>
				<div class="clear"></div>
				<div class="aqij">
					<div class="aqij_left">
						<span class="aqij_pic"><a href="#" target="_blank" title="注册简历"><img src="__PUBLIC__/Skin/Index/zc.gif" /></a></span>
						<span class="aqij_pic"><a href="#" target="_blank" title="发布招聘"><img src="__PUBLIC__/Skin/Index/fb.gif" /></a></span>
					</div>
					<div class="aqij_right">
						<div class="r_l"><img src="__PUBLIC__/Skin/Index/bj_6.gif" /></div>
						<div class="zpzs">
							<h1>最新消息</h1>
							<div class="clear"></div>
							<p>招聘企业：<span style="color:#CC0000">25618</span>家<br />招聘职位：<span style="color:#CC0000">446555</span>个<br />应聘简历：<span style="color:#CC0000">45658</span>份</p>
						</div>
						<div class="mlp">
							<div class="gech">
								<span class="c1" style="margin-left:0;"><a href="#" target="_blank" style="font-weight:bold;">企业会员注册</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">发布招聘</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">邀请面试</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">招聘VIP</a></span><span class="c4">-></span><span class="c3"><a href="#" target="_blank">与人才互动</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">完成招聘</a></span>
							</div>
							<div class="gech">
								<span class="c1" style="margin-left:0;"><a href="#" target="_blank" style="font-weight:bold;">个人会员注册</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">发布求职</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">查找职位</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">投递简历</a></span><span class="c4">-></span><span class="c3"><a href="#" target="_blank">沟通与面试</a></span><span class="c4">-></span><span class="c2"><a href="#" target="_blank">完成求职</a></span>
							</div>
							<div class="dsh"><strong>美业搜索：</strong><select name=""><option>选择地区</option></select> <input name="" type="text" value="--关键字--" style="width:100px; text-align:center;" /> <input name="" type="text" value="--发布时间--" style="width:120px; text-align:center;" /> <select name=""><option>职位</option></select> <a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ss.gif" style="vertical-align: inherit;"/></a></div>
							<div class="dsh"><a href="#" target="_blank">找工作</a> <a href="#" target="_blank">找人才</a> <a href="#" target="_blank">职业分类</a> <a href="#" target="_blank">人才分类</a></div>
							<div class="dqrk"><a href="#" target="_blank" title="地区入口" ><img src="__PUBLIC__/Skin/Index/dq.gif" style="vertical-align: middle;"/></a> <a href="#" target="_blank">福建</a> | <a href="#" target="_blank">北京</a> | <a href="#" target="_blank">上海</a> | <a href="#" target="_blank">南京</a> | <a href="#" target="_blank">河南</a>....</div>
							<div class="dsh" style="text-align:right; margin-top:0;"><a href="#" target="_blank" style=" font-weight:normal;">职位预定？人才预定？招聘求职很轻松</a></div>
						</div>
					</div>
				</div>
				<div class="scho">
					<div class="scho_left"><img src="__PUBLIC__/Skin/Index/xl.gif" /></div>
					<div class="scho_c">
						<div class="renjian">
							<div class="renjian_pic"><a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_5.gif" title="发布课程" /></a></div>
							<div class="renjian_pic" style="margin-top:10px;"><a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_4.gif" title="求学咨询" /></a></div>
						
						</div>
						<div class="gddh">
							<div class="gddh_top"><img src="__PUBLIC__/Skin/Index/bj_10.gif" /></div>
							<div class="gddh_c">
								<div class="gzp">
									<div class="gech" style="margin-top:8px;">
										<span class="c1" style="margin-left:0;"><a href="#" target="_blank" style="font-weight:bold;">个人会员注册</a></span><span class="c4">-></span><span class="c1"><a href="#" target="_blank">发布求学招贴</a></span><span class="c4">-></span><span class="c1"><a href="#" target="_blank">在线报名咨询</a></span><span class="c4">-></span><span class="c1"><a href="#" target="_blank">下载学习资源</a></span><span class="c4">-></span><span class="c5"><a href="#" target="_blank">建立博客，参加讨论</a></span>
									</div>
									<div class="gech" style="margin-top:10px;">
										<span class="c1" style="margin-left:0;"><a href="#" target="_blank" style="font-weight:bold;">学校会员注册</a></span><span class="c4">-></span><span class="c1"><a href="#" target="_blank">发布培训课程</a></span><span class="c4">-></span><span class="c1"><a href="#" target="_blank">在线招生</a></span><span class="c4">-></span><span class="c1"><a href="#" target="_blank">与学员互动</a></span><span class="c4">-></span><span class="c6"><a href="#" target="_blank">充值金币推广学校和课程</a></span>
									</div>
									<div class="gech" style="margin-top:10px;">
										<div class="gzp_pic" style="margin-left:0;"><a href="#" target="_blank">知名学校</a></div>
										<div class="gzp_pic" style="background-image:url(__PUBLIC__/Skin/Index/d2.gif);"><a href="#" target="_blank">经典课程</a></div>
										<div class="gzp_pic" style="background-image:url(__PUBLIC__/Skin/Index/d5.gif);"><a href="#" target="_blank">课程查询</a></div>
										<div class="gzp_pic" style="background-image:url(__PUBLIC__/Skin/Index/d4.gif);"><a href="#" target="_blank">发布课程</a></div>
										<div class="gzp_pic" style="background-image:url(__PUBLIC__/Skin/Index/d3.gif);"><a href="#" target="_blank">发帖求学</a></div>
										<div class="gzp_pic" style="background-image:url(__PUBLIC__/Skin/Index/d6.gif);"><a href="#" target="_blank">申请学习</a></div>
									</div>
									<div class="buzd"><a href="#" target="_blank">美容</a> | <a href="#" target="_blank">美发</a> <a href="#" target="_blank">化妆</a> | <a href="#" target="_blank">纹绣</a> | <a href="#" target="_blank">美甲</a> | <a href="#" target="_blank">形象设计</a> | <a href="#" target="_blank">中医香薰</a> | <a href="#" target="_blank">美体</a> | <a href="#" target="_blank">瑜伽</a> | <a href="#" target="_blank">管理</a> | <a href="#" target="_blank">各校培育成员成就</a></div>
									<h1><span class="titti"><a href="#" target="_blank">名校荟萃 Meta-schools</a></span></h1>
									<div class="buzd"><a href="#" target="_blank"><strong>湖北天姿</strong></a> <a href="#" target="_blank"><strong>上海雨茜</strong></a> <a href="#" target="_blank"><strong>广东伊丽莎白</strong></a> <a href="#" target="_blank"><strong>上海谢晓薇</strong></a> <a href="#" target="_blank"><strong>安徽新视点</strong></a> <a href="#" target="_blank"><strong>杭州金莎</strong></a> <a href="#" target="_blank"><strong>重庆金太子</strong></a> <a href="#" target="_blank"><strong>>></strong></a></div>
								</div>
							</div>
							<div class="gddh_top"><img src="__PUBLIC__/Skin/Index/bj_11.gif" /></div>
						</div>
					</div>					
					<div class="scho_left"><img src="__PUBLIC__/Skin/Index/lx.gif" /></div>
				</div>
				<div class="qcnh">
					<div class="qcnh_left"><img src="__PUBLIC__/Skin/Index/se_ch.jpg" /></div>
					<div class="qcnh_c">
						<span class="yuliang">全站搜索：<select name="" style="width:130px;"><option>招聘职位</option></select> <input name="" type="text" style="width:200px;"/> <a href="#" target="_blank" title="搜索" style="vertical-align:inherit;"><img src="__PUBLIC__/Skin/Index/search.jpg" /></a></span>
					</div>
					<div class="qcnh_left" style="width:10px;"><img src="__PUBLIC__/Skin/Index/sc_b.jpg" /></div>
				</div>
				<div class="qiugou">
					<div class="mantian">
						<div class="mantian_pic" style="margin-left:0;"><a href="#" target="_blank">产品供应求购</a></div>
						<div class="mantian_pic"><a href="#" target="_blank">产品招商代理</a></div>
						<div class="mantian_pic"><a href="#" target="_blank">二手产品转让</a></div>
						<div class="mantian_pic"><a href="#" target="_blank">门店转让求购</a></div>
						<div class="mantian_pic"><a href="#" target="_blank">行业连锁加盟</a></div>
						<div class="clear"></div>
						<div class="qiant">
							<div class="qiant_pic"><img src="__PUBLIC__/Skin/Index/ad_6.jpg" /></div>
							<div class="qiant_c">
								<span class="but"><a href="#" target="_blank" style="font-size:13px; color:#fff;">企业会员注册</a></span>
								<span class="huiw">-> <a href="#" target="_blank">发布供应</a> -> <a href="#" target="_blank">寻求招商</a> -> <a href="#" target="_blank">产品转让</a> -> <a href="#" target="_blank">连锁加盟</a> -> <a href="#" target="_blank">与客户互动</a> -> <a href="#" target="_blank">完成加盟</a></span>
								<div class="clear"></div>
								<span class="but" style="margin-top:8px;"><a href="#" target="_blank" style="font-size:13px; color:#fff;">个人会员注册</a></span>
								<span class="huiw" style="margin-top:8px;">-> <a href="#" target="_blank">与商家互动</a> -> <a href="#" target="_blank">完成交易</a></span>
							</div> 
							<div class="qiant_ad"><a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_7.jpg" width="230" /></a></div>
						</div>
					</div>
				</div>
				<div class="fuwu">
					<div class="fuwu_pic"><a href="#" target="_blank" title="推广服务项目">推广服务项目</a></div>
					<div class="fuwu_pic"><a href="#" target="_blank" title="发布服务项目">发布服务项目</a></div>
				</div>
				<div class="zhanhui">
					<div class="zhanhui_pic"><a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/k_2.gif" title="网上打展会" /></a></div>
					<div class="clear"></div>
					<div class="kaixin"><a href="#" target="_blank">免费注册</a> > <a href="#" target="_blank">网上展会</a> > <a href="#" target="_blank">全面展销</a></div>
				</div>
				<div class="dance">
					<div class="dace_left">
						<h1><a href="#" target="_blank">美容行业展会信息</a><br />EXHIBITION</h1>
						<div class="dace_pic">
							<a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_11.jpg" width="176" /></a>
							<p><a href="#" target="_blank">2008年广州美容美发用品展销会</a></p>
						</div>
					</div>
					<div class="dace_right">
						<div class="xuy"><a href="#" target="_blank" title="发布展会"><img src="__PUBLIC__/Skin/Index/fbzh.jpg" /></a> <a href="#" target="_blank" title="我要参展"><img src="__PUBLIC__/Skin/Index/wycz.jpg" /></a></div>
						<div class="fliu"><a href="#" target="_blank">国内展会</a> | <a href="#" target="_blank">国际展会</a> | <a href="#" target="_blank">全部展会</a> | <a href="#" target="_blank">推荐展会</a> | <a href="#" target="_blank">展会回顾</a></div>
						<div class="fliu">各地展会：<a href="#" target="_blank">全国</a> <a href="#" target="_blank">上海</a> <a href="#" target="_blank">广州</a> <a href="#" target="_blank">北京</a> <a href="#" target="_blank">武汉</a> <a href="#" target="_blank">兰州</a> <a href="#" target="_blank">深圳</a> <a href="#" target="_blank">福州</a> <a href="#" target="_blank">杭州</a> <a href="#" target="_blank">海口</a> <a href="#" target="_blank">南宁</a> <a href="#" target="_blank">济南</a> <a href="#" target="_blank">昆明</a> <a href="#" target="_blank">大连</a> <a href="#" target="_blank">沈阳</a> <a href="#" target="_blank">哈尔滨</a> <a href="#" target="_blank">重庆</a> <a href="#" target="_blank">国外</a></div>
						<div class="fxiang_pic" style="margin-left:0;">
							<a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_12.jpg" width="161" /></a>
							<p><a href="#" target="_blank">深圳美容博览会</a></p>
						</div>
						<div class="fxiang_pic">
							<a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_12.jpg" width="161" /></a>
							<p><a href="#" target="_blank">深圳美容博览会</a></p>
						</div>
						<div class="fxiang_pic">
							<a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_12.jpg" width="161" /></a>
							<p><a href="#" target="_blank">深圳美容博览会</a></p>
						</div>
						<div class="fxiang_pic">
							<a href="#" target="_blank"><img src="__PUBLIC__/Skin/Index/ad_12.jpg" width="161" /></a>
							<p><a href="#" target="_blank">深圳美容博览会</a></p>
						</div>
					</div>
				</div>
				<div class="myzz">
					<div class="myzz_l"><img src="__PUBLIC__/Skin/Index/k_3.jpg" /></div>
					<div class="myzz_t">
						<h1>公告/客服</h1>
						<p style="padding-top:5px;">客服电话：021-87858584</p>
						<p>客服QQ：154896354</p>
						<p>客服MSN：21mmm@hotmail.com</p>
						<p>客服邮箱：21mmmm@163.com</p>
						<p>其他客服：</p>
					</div>
					<div class="myzz_l" style="width:21px;"><img src="__PUBLIC__/Skin/Index/k_5.jpg" /></div>
					<div class="myzz_z">
						<div class="fsbwbd">
							<div class="fsbwbd_pic"><img src="__PUBLIC__/Skin/Index/k_8.jpg" /></div>
							<div class="fsbwbd_h"><a href="#" target="_blank">我要美业资讯预定</a><br />I WOULD LIKE TO BOOK</div>
							<div class="fsbwbd_x"><a href="#" target="_blank">行业动向</a>/<a href="#" target="_blank">招聘信息</a>/<a href="#" target="_blank">培训信息</a>/<a href="#" target="_blank">美业展会</a>/<a href="#" target="_blank">全面速递</a></div>
						</div>
						<div class="wyeshji"><input name="" type="text" style="width:130px;" /> @ <input name="" type="text" style="width:130px;" /> <a href="#" target="_blank" title="提交" style="vertical-align:inherit;"><img src="__PUBLIC__/Skin/Index/k_9.jpg" /></a> <a href="#" target="_blank" title="退订" style="vertical-align:inherit;"><img src="__PUBLIC__/Skin/Index/k_10.jpg" /></a>
						</div>
						<div class="wyeshji" style="margin-top:10px;">*正确填写您的E-mail地址，我们将通过您的邮箱给您发送最新的美业资讯</div>
					</div>
					<div class="myzz_l" style="width:11px;"><img src="__PUBLIC__/Skin/Index/k_6.jpg" /></div>
					<div class="gaojie">
						<div class="myzz_l" style="width:11px;"><img src="__PUBLIC__/Skin/Index/k_11.jpg" /></div>
						<div class="myzz_z" style="width:143px;">
							<h1><a href="#" target="_blank">美业资讯第三期展示</a></h1>
							<div class="pgc"><a href="#" target="_blank" title="美业资讯第三期展示"><img src="__PUBLIC__/Skin/Index/ad_13.jpg" width="80" height="105" /></a></div>
						
						
						</div>
						<div class="myzz_l" style="width:11px;"><img src="__PUBLIC__/Skin/Index/k_6.jpg" /></div>
					
					
					
					
					
					
					</div>
				
				
				
				
				</div>
				
				
				
				
				
				<div class="clear"></div>
				<div class="foot">
					<div class="text">
					<a href="#">关于我们</a> - <a href="#">网站地图</a> - <a href="#">法律声明</a> - <a href="#">招聘VIP</a> - <a href="# ">营销推广</a> - <a href="#">充值方式</a> - <a href="#">化妆品</a> - <a href="#">联系我们</a></div>Copyright 2008-2009 21mmm.com. All Rights Reserve <a href="#" target="_blank">沪ICP备06003754</a> <br />
					<div><a href="http://www.miibeian.gov.cn/"><img src="__PUBLIC__/Skin/Index/biaoshi.gif" /></a> <a href="http://www.fuzhou.cyberpolice.cn/" target="_blank"><img src="__PUBLIC__/Skin/Index/sznet110anwang.gif" width="40" /></a> <a href="http://www.fuzhou.cyberpolice.cn/" target="_blank"><img src="__PUBLIC__/Skin/Index/gt.gif" width="50" /></a><br />
			<a href="http://www.cnzz.com/" target="_blank"><img src="__PUBLIC__/Skin/Index/pic1.gif" /></a> <a href="http://www.51yes.com/" target="_blank"><img src="__PUBLIC__/Skin/Index/count1.gif" /></a></div>
				</div>

			</div>	
		</div>
	</div>
</body>
</html>