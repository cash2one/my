<?php
@ini_set('display_errors', 1); //��ʾ����
error_reporting(E_ALL ^ E_NOTICE); //���д���
ini_set("memory_limit",1048576000); //�����ڴ�����Ϊ1G
set_time_limit(0); //����ʱ

function getdb()
{
	//$servername = '61.152.101.173';
	//$dbusername = '2144newdbdb';
	//$dbpassword = 'BHUIJN789woshi';
	/*$db['h'] = '61.152.101.173';
	$db['u'] = '2144newdbdb';
	$db['p'] = 'BHUIJN789woshi';
	$db['d'] = '2144xyx';
	$db['t'] = 'flash_flash';*/
	
	$db['h'] = '10.240.133.59';
	$db['u'] = 'root';
	$db['p'] = '2144testmysql';
	$db['d'] = '2144xyx';
	$db['t'] = 'flash_flash';
	
	return $db;
}

$dbApp = array(
	'h' => '10.240.133.59',
	'u' => 'root',
	'p' => '2144testmysql',
	'd' => 'app_2144_cn',
	
	/*'h' => '10.10.16.78',
	'u' => 'app21user',
	'p' => 'f4g2dlf2',
	'd' => 'app_2144_cn',*/
	
);

$db = getdb();
$links = mysql_connect($db['h'] , $db['u'] , $db['p']);
$ln    = mysql_select_db($db['d'] , $links);
mysql_query("set names gb2312" , $links);

$sqlstr = "SELECT id,title,editor FROM `flash_flash`";
$result = mysql_query($sqlstr , $links);
$flasharr = array();
while($row = mysql_fetch_array($result))
{
	$id     = $row['id'];
	$title  = function_change_utf8($row['title']);
	$editor = function_change_utf8($row['editor']);
	$flasharr[$id]['id'] = $id;
	$flasharr[$id]['t']  = $title;
	$flasharr[$id]['e']  = $editor; 
	//echo "e: {$flasharr[$id]['e']} --------- e: $editor//////";exit;
}
//var_dump($flasharr);exit;
mysql_close($links);

define('DIR', dirname(__FILE__));

//���ļ�д��ͷ
//$fp = fopen(DIR.'/baidu_k/f_baidu_' . date("Ymd") . '.php' , 'a');
//echo DIR.'/baidu_k/f_baidu_' . date("Ymd") . '.php';exit;
//write($fp, "<?php \n" . '$flasharr=array(');
//exit('sb');

//==========================================================
$links = mysql_pconnect($dbApp['h'] , $dbApp['u'] , $dbApp['p']);
$ln    = mysql_select_db($dbApp['d'] , $links);
mysql_query("set names gb2312" , $links);
//============================================================

$i = 1;
foreach($flasharr as $id => $flash_a)
{
	$key = $flash_a['t'];
	
	//======================== д���ݿ� ==================================
	
	/*
	if(ͳ�Ʊ��и���Ϸ){
		if(��¼��ϢΪ��){
			���²ɼ���Ϣ,���¶�Ӧ��¼��Ϣ
		}
		if(���ʱ�����7��){
			���²ɼ���Ϣ,���¶�Ӧ��¼��Ϣ
		}
	}else{
		�ɼ���Ϣ,���뵽���ݿ�
	}
	*/
	$sql = "select * from t_stat where id = $id";
	$r = mysql_query($sql);
	$r =mysql_fetch_array($r, MYSQL_ASSOC);
	
	if(is_array($r)){
		if(empty($r['bt']) || strtotime($r['ctime']) + 7*86400 < time()){
			$rebaidu = fetch_baidu('2144.cn', $key);
			$op = "update";
			
		}else{
			echo "sb--------------\r\n";
			continue;
		}
	}else{
		
		$rebaidu = fetch_baidu('2144.cn', $key);
		$op = "insert";
		
	}
	
	//var_dump($rebaidu);
	if($rebaidu){
		$t = $flasharr[$id]['t'];
		$e = $flasharr[$id]['e'];
		$bt = $rebaidu[0]['title'];
		$bo = $rebaidu[0]['order'];
		$bd = $rebaidu[0]['time'];
		$bw = $rebaidu[0]['weight'];
		$ctime = date('Y-m-d',time());
		
		if($op == 'update'){
			$sql = "update t_stat set t = '$t', e = '$e', bt = '$bt', bo = '$bo', bw = '$bw', ctime = '$ctime' where id = $id";
		}else{
			$sql = "insert into t_stat(id,t,e,bt,bo,bd,bw, ctime) values($id, '$t', '$e', '$bt', '$bo', '$bd', '$bw', '$ctime')";
		}
		
		echo $sql;
		$result = mysql_query($sql, $links);
	
		unset($rebaidu);
		
	}
	
	//==========================================================
	
	$i++;
	if($i % 10 == 0)
	{
		$ut = rand(12000 , 18000);
		usleep($ut);
	}
	
	
	/*//$flasharr[$id]['baidu'] = $rebaidu[0];
	$flasharr[$id]['bt'] = $rebaidu[0]['title'];
	$flasharr[$id]['bo'] = $rebaidu[0]['order'];
	$flasharr[$id]['bd']  = $rebaidu[0]['time'];
	$flasharr[$id]['bw']= $rebaidu[0]['weight'];
	
	
	$wrn = var_export($flasharr[$id] , true);
	$wrn = "$id => $wrn,";
	write($fp,$wrn);
	//echo $wrn;
	if($i % 10 == 0)
	{
		//$ut = rand(12000 , 18000);
		//usleep($ut);
	}*/
	
	
	
}

//echo $_SERVER["DOCUMENT_ROOT"] . "/stat/baidu_k/";

/*$wrn = var_export($flasharr , true);
$wrnow = "<?php \n" . '$flasharr=' . $wrn . ';' . "\n?>";

 
if(file_exists('/data/httpd/2144/sync.2144.cn/channel/project.qq61/sources/stat/')){ //Ԥ��������
	$fp = fopen('/data/httpd/2144/sync.2144.cn/channel/project.qq61/sources/stat/baidu_k/f_baidu_' . date("Ymd") . '.php' , 'w');
}else{
	$fp = fopen('./f_baidu_' . date("Ymd") . '.php' , 'w');
}*/



/*if($fp)
{
	write($fp, ');' . "\n?>");
	fwrite($fp , $wrnow);
	fclose($fp);
}*/


function fetch_baidu($d, $k)
{
	$urlw = urlencode(function_change_gbk($k));
	$max_srh_page = 2;
	$baidu_ids = array();
	$baidu_mus = array();
	$isrank = 0;
	$all_count = 0;
	$dm_weight = 0;
	for ($page_no = 1; $page_no <= $max_srh_page; $page_no++)
	{
		if ($page_no > 16) break;
		$fail_try = 1;
		$pn = ($page_no - 1) * 50;
		$url = "http://www.baidu.com/s?wd={$urlw}&pn={$pn}&rn=50";
		$snoopy = new Snoopy;
//		$snoopy->proxy_host = "127.0.0.1";	//�ɼ���ѡ����IP������Ƶ��ץ�ٶȷ����ٶ�ҧ
//		$snoopy->proxy_port = "80";			//proxy�������ö˿�
		$snoopy->fetch($url);
		$contents = function_change_utf8($snoopy->results);
		unset($snoopy);
		//echo $contents;
		//exit;
		
		if (preg_match_all("/((<table cellpadding=\"0\" cellspacing=\"0\".*?id=\"(\d+)\" )|(<table id=\"(\d+)\"  cellpadding=\"0\" cellspacing=\"0\" >))[\s|\S]*?((<a.*?href=\".*?\".*?>(.*?)<\/a>)|(<div id=\"app_.*?\"><\/div>))/i", $contents, $out_mu))
		{
			//echo $url;
			//echo $contents;
			//var_dump($out_mu);
//			exit;
			foreach ($out_mu[0] as $om_key => $om_val)
			{
				$om_id1 = $out_mu[3][$om_key];
				$om_href1 = $out_mu[4][$om_key];
				$om_id2 = $out_mu[6][$om_key];
				$om_href2 = $out_mu[7][$om_key];
				$om_title = strip_tags($out_mu[10][$om_key]);
				$baidu_mus[] = $om_id1 . $om_id2;
				$dm_weight = $dm_weight + get_dm_weight($om_href1 . $om_href2, $om_id1 . $om_id2);
				if (preg_match("/:\/\/(\w*?\.)*?baidu\.com\//i", $om_href1 . $om_href2, $om_domain))
				{
					$baidu_ids[] = $om_id1 . $om_id2;
				}
				if (preg_match("/:\/\/(\w*?\.)*?{$d}\//i", $om_href1 . $om_href2, $om_domain))
				{
					/*
					echo '123<a href="http://www.baidu.com/s?wd=' . $k . '">' . $k . '</a>
					' . $om_id1 . $om_id2 . '
					<a href="' . $om_href1 . $om_href2 . '">' . $om_title . '</a>
					';
					*/
					$isrank = 1;
				}
			}
		}
		if(preg_match_all("/<table cellpadding=\"0\" cellspacing=\"0\" class=\"result\" id=\"(\d+)\".*><tr><td class=f><h3 class=\"t\">(<font.*?<\/font>)?<a.*?href=\"(.*?)\"\s*target=\"_blank\">(.*?)<\/a>\s*?<\/h3><font size=\-1>.*?<span class=\"g\">.*? ((\d{4}\-\d{1,2}\-\d{1,2})|(\d+Сʱǰ)|(\d+����ǰ)) .*?<\/span>.*?<br><\/font><\/td><\/tr><\/table>/i", $contents, $out_all))
		{
			$jj = 0;
			foreach ($out_all[0] as $o_key => $o_val)
			{
				$o_id = $out_all[1][$o_key];
				$o_href = $out_all[3][$o_key];
				$o_title = strip_tags($out_all[4][$o_key]);
				$o_cache = $out_all[6][$o_key] . $out_all[7][$o_key] . $out_all[8][$o_key];
				$dm_weight = $dm_weight + get_dm_weight($o_href, $o_id);
				if (preg_match("/:\/\/(\w*?\.)*?baidu\.com\//i", $o_href, $o_domain))
				{
					$baidu_ids[] = $o_id;
				}
				if (preg_match("/:\/\/(\w*?\.)*?{$d}\//i", $o_href, $o_domain))
				{
					//echo '<div style="clear:both"></div><span class="s_kw"><a href="http://www.baidu.com/s?wd=' . $urlw . '">' . $k . '</a></span><span class="s_rank">' . $o_id . '</span><span class="s_wt">' . $dm_weight . '%</span><span class="s_title"><a href="' . $o_href . '">' . $o_title . '</a></span><span class="s_cache">' . $o_cache . '</span>';
					$isrank = 1;
					$t[$jj]['k']      = function_change_utf8($k);   //�ؼ���
					$t[$jj]['order']  = $o_id; //����
					$t[$jj]['title']  = function_change_utf8($o_title);   //����
					$t[$jj]['weight'] = $dm_weight;  //Ȩ��
					$t[$jj]['time']   = $o_cache;    //ʱ��
					$jj++;
				}
			}
		}
		
		//$all_count���������������ƥ���Ƿ�ƥ�䵽��������������ر��ע�ٶ�ϵ��վ�㡢�ٶȿ���ƽ̨�Լ��ٶ�Ӧ�õ��б�����ͨ�������
		if (isset($out_mu[0])) $all_count = $all_count + count($out_mu[0]);
		if (isset($out_all[0])) $all_count = $all_count + count($out_all[0]);
//		echo '<br />�ܹ��ҵ�' . $all_count . '��ƥ��<br />';
		if (!preg_match("/<a href=\"s\?wd=.*?>��һҳ<\/a>.*?<\/p>/i",$contents,$out))
		{
			break;
		}
	}
	unset($ebaidu);
	//var_dump($t);
	return $t;
}

function get_dm_weight($h, $i)
{
	//$h��ʾ���������url��$i��ʾ�������
	$p = ceil($i / 10);		//��������ڼ�ҳ
	
	$i_weight = array(1 => 52, 2 => 15, 3 => 10, 4 => 5, 5 => 5, 6 => 4, 7 => 1, 8 => 3, 9 => 2, 0 => 3);
	$h_str = preg_replace("/^.*?:\/\/(.*?)(#.*)?$/i", "$1$3", $h);	//ȥ��url�е�Э�飨����http����#��ϢƬ�β���
	$h_arr = explode("?", $h_str, 2);
	$h0_arr = explode("/", $h_arr[0]);
	if ($h0_arr[count($h0_arr) - 1] == '')
	{
		$level_l = count($h0_arr) - 1;
	}
	else
	{
		$level_l = count($h0_arr);
	}
	if (isset($h_arr[1]))
	{
		if ($h_arr[1] != '')
		{
			$level_r = count(explode("&", $h_arr[1]));
		}
		else
		{
			$level_r = 0;
		}
	}
	else
	{
		$level_r = 0;
	}
	$dw = $i_weight[$i % 10] * pow(0.5, ($level_l + $level_r - 1)) * 9 / pow(10, $p);
	return number_format($dw, 1);;
}
//ת��UTF8
function function_change_utf8($str)
{ 
	/*
	$returncode = mb_detect_encoding($str , "UTF-8,EUC-CN");
	if(trim($returncode) <> "UTF-8")
	{
		$str = mb_convert_encoding($str, "UTF-8", "EUC-CN");
	}
	*/
	return $str;
}
//gbkת��
function function_change_gbk($str)
{ 
	$returncode = mb_detect_encoding($str , "UTF-8,EUC-CN");
	if(trim($returncode) <> "EUC-CN")
	{
		$str = mb_convert_encoding($str, "EUC-CN", "UTF-8");
	}
	return $str;
}

function write($handle, $content){
	echo $content;
	//if($handle = fopen($filename, 'a')){
		fwrite($handle, $content);
	//}
   
}
?>


<?php

/*************************************************

Snoopy - the PHP net client
Author: Monte Ohrt <monte@ispi.net>
Copyright (c): 1999-2008 New Digital Group, all rights reserved
Version: 1.2.4

 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

You may contact the author of Snoopy by e-mail at:
monte@ohrt.com

The latest version of Snoopy can be obtained from:
http://snoopy.sourceforge.net/

*************************************************/

class Snoopy
{
	/**** Public variables ****/
	
	/* user definable vars */

	var $host			=	"www.php.net";		// host name we are connecting to
	var $port			=	80;					// port we are connecting to
	var $proxy_host		=	"";					// proxy host to use
	var $proxy_port		=	"";					// proxy port to use
	var $proxy_user		=	"";					// proxy user to use
	var $proxy_pass		=	"";					// proxy password to use
	
	var $agent			=	"Snoopy v1.2.4";	// agent we masquerade as
	var	$referer		=	"";					// referer info to pass
	var $cookies		=	array();			// array of cookies to pass
												// $cookies["username"]="joe";
	var	$rawheaders		=	array();			// array of raw headers to send
												// $rawheaders["Content-type"]="text/html";

	var $maxredirs		=	5;					// http redirection depth maximum. 0 = disallow
	var $lastredirectaddr	=	"";				// contains address of last redirected address
	var	$offsiteok		=	true;				// allows redirection off-site
	var $maxframes		=	0;					// frame content depth maximum. 0 = disallow
	var $expandlinks	=	true;				// expand links to fully qualified URLs.
												// this only applies to fetchlinks()
												// submitlinks(), and submittext()
	var $passcookies	=	true;				// pass set cookies back through redirects
												// NOTE: this currently does not respect
												// dates, domains or paths.
	
	var	$user			=	"";					// user for http authentication
	var	$pass			=	"";					// password for http authentication
	
	// http accept types
	var $accept			=	"image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
	
	var $results		=	"";					// where the content is put
		
	var $error			=	"";					// error messages sent here
	var	$response_code	=	"";					// response code returned from server
	var	$headers		=	array();			// headers returned from server sent here
	var	$maxlength		=	500000;				// max return data length (body)
	var $read_timeout	=	0;					// timeout on read operations, in seconds
												// supported only since PHP 4 Beta 4
												// set to 0 to disallow timeouts
	var $timed_out		=	false;				// if a read operation timed out
	var	$status			=	0;					// http request status

	var $temp_dir		=	"/tmp";				// temporary directory that the webserver
												// has permission to write to.
												// under Windows, this should be C:\temp

	var	$curl_path		=	"/usr/local/bin/curl";
												// Snoopy will use cURL for fetching
												// SSL content if a full system path to
												// the cURL binary is supplied here.
												// set to false if you do not have
												// cURL installed. See http://curl.haxx.se
												// for details on installing cURL.
												// Snoopy does *not* use the cURL
												// library functions built into php,
												// as these functions are not stable
												// as of this Snoopy release.
	
	/**** Private variables ****/	
	
	var	$_maxlinelen	=	4096;				// max line length (headers)
	
	var $_httpmethod	=	"GET";				// default http request method
	var $_httpversion	=	"HTTP/1.0";			// default http request version
	var $_submit_method	=	"POST";				// default submit method
	var $_submit_type	=	"application/x-www-form-urlencoded";	// default submit type
	var $_mime_boundary	=   "";					// MIME boundary for multipart/form-data submit type
	var $_redirectaddr	=	false;				// will be set if page fetched is a redirect
	var $_redirectdepth	=	0;					// increments on an http redirect
	var $_frameurls		= 	array();			// frame src urls
	var $_framedepth	=	0;					// increments on frame depth
	
	var $_isproxy		=	false;				// set if using a proxy server
	var $_fp_timeout	=	30;					// timeout for socket connection

/*======================================================================*\
	Function:	fetch
	Purpose:	fetch the contents of a web page
				(and possibly other protocols in the
				future like ftp, nntp, gopher, etc.)
	Input:		$URI	the location of the page to fetch
	Output:		$this->results	the output text from the fetch
\*======================================================================*/

	function fetch($URI)
	{
	
		//preg_match("|^([^:]+)://([^:/]+)(:[\d]+)*(.*)|",$URI,$URI_PARTS);
		$URI_PARTS = parse_url($URI);
		if (!empty($URI_PARTS["user"]))
			$this->user = $URI_PARTS["user"];
		if (!empty($URI_PARTS["pass"]))
			$this->pass = $URI_PARTS["pass"];
		if (empty($URI_PARTS["query"]))
			$URI_PARTS["query"] = '';
		if (empty($URI_PARTS["path"]))
			$URI_PARTS["path"] = '';
				
		switch(strtolower($URI_PARTS["scheme"]))
		{
			case "http":
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_connect($fp))
				{
					if($this->_isproxy)
					{
						// using proxy, send entire URI
						$this->_httprequest($URI,$fp,$URI,$this->_httpmethod);
					}
					else
					{
						$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
						// no proxy, send only the path
						$this->_httprequest($path, $fp, $URI, $this->_httpmethod);
					}
					
					$this->_disconnect($fp);

					if($this->_redirectaddr)
					{
						/* url was redirected, check if we've hit the max depth */
						if($this->maxredirs > $this->_redirectdepth)
						{
							// only follow redirect if it's on this site, or offsiteok is true
							if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
							{
								/* follow the redirect */
								$this->_redirectdepth++;
								$this->lastredirectaddr=$this->_redirectaddr;
								$this->fetch($this->_redirectaddr);
							}
						}
					}

					if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
					{
						$frameurls = $this->_frameurls;
						$this->_frameurls = array();
						
						while(list(,$frameurl) = each($frameurls))
						{
							if($this->_framedepth < $this->maxframes)
							{
								$this->fetch($frameurl);
								$this->_framedepth++;
							}
							else
								break;
						}
					}					
				}
				else
				{
					return false;
				}
				return true;					
				break;
			case "https":
				if(!$this->curl_path)
					return false;
				if(function_exists("is_executable"))
				    if (!is_executable($this->curl_path))
				        return false;
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_isproxy)
				{
					// using proxy, send entire URI
					$this->_httpsrequest($URI,$URI,$this->_httpmethod);
				}
				else
				{
					$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
					// no proxy, send only the path
					$this->_httpsrequest($path, $URI, $this->_httpmethod);
				}

				if($this->_redirectaddr)
				{
					/* url was redirected, check if we've hit the max depth */
					if($this->maxredirs > $this->_redirectdepth)
					{
						// only follow redirect if it's on this site, or offsiteok is true
						if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
						{
							/* follow the redirect */
							$this->_redirectdepth++;
							$this->lastredirectaddr=$this->_redirectaddr;
							$this->fetch($this->_redirectaddr);
						}
					}
				}

				if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
				{
					$frameurls = $this->_frameurls;
					$this->_frameurls = array();

					while(list(,$frameurl) = each($frameurls))
					{
						if($this->_framedepth < $this->maxframes)
						{
							$this->fetch($frameurl);
							$this->_framedepth++;
						}
						else
							break;
					}
				}					
				return true;					
				break;
			default:
				// not a valid protocol
				$this->error	=	'Invalid protocol "'.$URI_PARTS["scheme"].'"\n';
				return false;
				break;
		}		
		return true;
	}

/*======================================================================*\
	Function:	submit
	Purpose:	submit an http form
	Input:		$URI	the location to post the data
				$formvars	the formvars to use.
					format: $formvars["var"] = "val";
				$formfiles  an array of files to submit
					format: $formfiles["var"] = "/dir/filename.ext";
	Output:		$this->results	the text output from the post
\*======================================================================*/

	function submit($URI, $formvars="", $formfiles="")
	{
		unset($postdata);
		
		$postdata = $this->_prepare_post_body($formvars, $formfiles);
			
		$URI_PARTS = parse_url($URI);
		if (!empty($URI_PARTS["user"]))
			$this->user = $URI_PARTS["user"];
		if (!empty($URI_PARTS["pass"]))
			$this->pass = $URI_PARTS["pass"];
		if (empty($URI_PARTS["query"]))
			$URI_PARTS["query"] = '';
		if (empty($URI_PARTS["path"]))
			$URI_PARTS["path"] = '';

		switch(strtolower($URI_PARTS["scheme"]))
		{
			case "http":
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_connect($fp))
				{
					if($this->_isproxy)
					{
						// using proxy, send entire URI
						$this->_httprequest($URI,$fp,$URI,$this->_submit_method,$this->_submit_type,$postdata);
					}
					else
					{
						$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
						// no proxy, send only the path
						$this->_httprequest($path, $fp, $URI, $this->_submit_method, $this->_submit_type, $postdata);
					}
					
					$this->_disconnect($fp);

					if($this->_redirectaddr)
					{
						/* url was redirected, check if we've hit the max depth */
						if($this->maxredirs > $this->_redirectdepth)
						{						
							if(!preg_match("|^".$URI_PARTS["scheme"]."://|", $this->_redirectaddr))
								$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr,$URI_PARTS["scheme"]."://".$URI_PARTS["host"]);						
							
							// only follow redirect if it's on this site, or offsiteok is true
							if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
							{
								/* follow the redirect */
								$this->_redirectdepth++;
								$this->lastredirectaddr=$this->_redirectaddr;
								if( strpos( $this->_redirectaddr, "?" ) > 0 )
									$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
								else
									$this->submit($this->_redirectaddr,$formvars, $formfiles);
							}
						}
					}

					if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
					{
						$frameurls = $this->_frameurls;
						$this->_frameurls = array();
						
						while(list(,$frameurl) = each($frameurls))
						{														
							if($this->_framedepth < $this->maxframes)
							{
								$this->fetch($frameurl);
								$this->_framedepth++;
							}
							else
								break;
						}
					}					
					
				}
				else
				{
					return false;
				}
				return true;					
				break;
			case "https":
				if(!$this->curl_path)
					return false;
				if(function_exists("is_executable"))
				    if (!is_executable($this->curl_path))
				        return false;
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_isproxy)
				{
					// using proxy, send entire URI
					$this->_httpsrequest($URI, $URI, $this->_submit_method, $this->_submit_type, $postdata);
				}
				else
				{
					$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
					// no proxy, send only the path
					$this->_httpsrequest($path, $URI, $this->_submit_method, $this->_submit_type, $postdata);
				}

				if($this->_redirectaddr)
				{
					/* url was redirected, check if we've hit the max depth */
					if($this->maxredirs > $this->_redirectdepth)
					{						
						if(!preg_match("|^".$URI_PARTS["scheme"]."://|", $this->_redirectaddr))
							$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr,$URI_PARTS["scheme"]."://".$URI_PARTS["host"]);						

						// only follow redirect if it's on this site, or offsiteok is true
						if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
						{
							/* follow the redirect */
							$this->_redirectdepth++;
							$this->lastredirectaddr=$this->_redirectaddr;
							if( strpos( $this->_redirectaddr, "?" ) > 0 )
								$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
							else
								$this->submit($this->_redirectaddr,$formvars, $formfiles);
						}
					}
				}

				if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
				{
					$frameurls = $this->_frameurls;
					$this->_frameurls = array();

					while(list(,$frameurl) = each($frameurls))
					{														
						if($this->_framedepth < $this->maxframes)
						{
							$this->fetch($frameurl);
							$this->_framedepth++;
						}
						else
							break;
					}
				}					
				return true;					
				break;
				
			default:
				// not a valid protocol
				$this->error	=	'Invalid protocol "'.$URI_PARTS["scheme"].'"\n';
				return false;
				break;
		}		
		return true;
	}

/*======================================================================*\
	Function:	fetchlinks
	Purpose:	fetch the links from a web page
	Input:		$URI	where you are fetching from
	Output:		$this->results	an array of the URLs
\*======================================================================*/

	function fetchlinks($URI)
	{
		if ($this->fetch($URI))
		{			
			if($this->lastredirectaddr)
				$URI = $this->lastredirectaddr;
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
					$this->results[$x] = $this->_striplinks($this->results[$x]);
			}
			else
				$this->results = $this->_striplinks($this->results);

			if($this->expandlinks)
				$this->results = $this->_expandlinks($this->results, $URI);
			return true;
		}
		else
			return false;
	}

/*======================================================================*\
	Function:	fetchform
	Purpose:	fetch the form elements from a web page
	Input:		$URI	where you are fetching from
	Output:		$this->results	the resulting html form
\*======================================================================*/

	function fetchform($URI)
	{
		
		if ($this->fetch($URI))
		{			

			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
					$this->results[$x] = $this->_stripform($this->results[$x]);
			}
			else
				$this->results = $this->_stripform($this->results);
			
			return true;
		}
		else
			return false;
	}
	
	
/*======================================================================*\
	Function:	fetchtext
	Purpose:	fetch the text from a web page, stripping the links
	Input:		$URI	where you are fetching from
	Output:		$this->results	the text from the web page
\*======================================================================*/

	function fetchtext($URI)
	{
		if($this->fetch($URI))
		{			
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
					$this->results[$x] = $this->_striptext($this->results[$x]);
			}
			else
				$this->results = $this->_striptext($this->results);
			return true;
		}
		else
			return false;
	}

/*======================================================================*\
	Function:	submitlinks
	Purpose:	grab links from a form submission
	Input:		$URI	where you are submitting from
	Output:		$this->results	an array of the links from the post
\*======================================================================*/

	function submitlinks($URI, $formvars="", $formfiles="")
	{
		if($this->submit($URI,$formvars, $formfiles))
		{			
			if($this->lastredirectaddr)
				$URI = $this->lastredirectaddr;
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
				{
					$this->results[$x] = $this->_striplinks($this->results[$x]);
					if($this->expandlinks)
						$this->results[$x] = $this->_expandlinks($this->results[$x],$URI);
				}
			}
			else
			{
				$this->results = $this->_striplinks($this->results);
				if($this->expandlinks)
					$this->results = $this->_expandlinks($this->results,$URI);
			}
			return true;
		}
		else
			return false;
	}

/*======================================================================*\
	Function:	submittext
	Purpose:	grab text from a form submission
	Input:		$URI	where you are submitting from
	Output:		$this->results	the text from the web page
\*======================================================================*/

	function submittext($URI, $formvars = "", $formfiles = "")
	{
		if($this->submit($URI,$formvars, $formfiles))
		{			
			if($this->lastredirectaddr)
				$URI = $this->lastredirectaddr;
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
				{
					$this->results[$x] = $this->_striptext($this->results[$x]);
					if($this->expandlinks)
						$this->results[$x] = $this->_expandlinks($this->results[$x],$URI);
				}
			}
			else
			{
				$this->results = $this->_striptext($this->results);
				if($this->expandlinks)
					$this->results = $this->_expandlinks($this->results,$URI);
			}
			return true;
		}
		else
			return false;
	}

	

/*======================================================================*\
	Function:	set_submit_multipart
	Purpose:	Set the form submission content type to
				multipart/form-data
\*======================================================================*/
	function set_submit_multipart()
	{
		$this->_submit_type = "multipart/form-data";
	}

	
/*======================================================================*\
	Function:	set_submit_normal
	Purpose:	Set the form submission content type to
				application/x-www-form-urlencoded
\*======================================================================*/
	function set_submit_normal()
	{
		$this->_submit_type = "application/x-www-form-urlencoded";
	}

	
	

/*======================================================================*\
	Private functions
\*======================================================================*/
	
	
/*======================================================================*\
	Function:	_striplinks
	Purpose:	strip the hyperlinks from an html document
	Input:		$document	document to strip.
	Output:		$match		an array of the links
\*======================================================================*/

	function _striplinks($document)
	{	
		preg_match_all("'<\s*a\s.*?href\s*=\s*			# find <a href=
						([\"\'])?					# find single or double quote
						(?(1) (.*?)\\1 | ([^\s\>]+))		# if quote found, match up to next matching
													# quote, otherwise match up to next space
						'isx",$document,$links);
						

		// catenate the non-empty matches from the conditional subpattern

		while(list($key,$val) = each($links[2]))
		{
			if(!empty($val))
				$match[] = $val;
		}				
		
		while(list($key,$val) = each($links[3]))
		{
			if(!empty($val))
				$match[] = $val;
		}		
		
		// return the links
		return $match;
	}

/*======================================================================*\
	Function:	_stripform
	Purpose:	strip the form elements from an html document
	Input:		$document	document to strip.
	Output:		$match		an array of the links
\*======================================================================*/

	function _stripform($document)
	{	
		preg_match_all("'<\/?(FORM|INPUT|SELECT|TEXTAREA|(OPTION))[^<>]*>(?(2)(.*(?=<\/?(option|select)[^<>]*>[\r\n]*)|(?=[\r\n]*))|(?=[\r\n]*))'Usi",$document,$elements);
		
		// catenate the matches
		$match = implode("\r\n",$elements[0]);
				
		// return the links
		return $match;
	}

	
	
/*======================================================================*\
	Function:	_striptext
	Purpose:	strip the text from an html document
	Input:		$document	document to strip.
	Output:		$text		the resulting text
\*======================================================================*/

	function _striptext($document)
	{
		
		// I didn't use preg eval (//e) since that is only available in PHP 4.0.
		// so, list your entities one by one here. I included some of the
		// more common ones.
								
		$search = array("'<script[^>]*?>.*?</script>'si",	// strip out javascript
						"'<[\/\!]*?[^<>]*?>'si",			// strip out html tags
						"'([\r\n])[\s]+'",					// strip out white space
						"'&(quot|#34|#034|#x22);'i",		// replace html entities
						"'&(amp|#38|#038|#x26);'i",			// added hexadecimal values
						"'&(lt|#60|#060|#x3c);'i",
						"'&(gt|#62|#062|#x3e);'i",
						"'&(nbsp|#160|#xa0);'i",
						"'&(iexcl|#161);'i",
						"'&(cent|#162);'i",
						"'&(pound|#163);'i",
						"'&(copy|#169);'i",
						"'&(reg|#174);'i",
						"'&(deg|#176);'i",
						"'&(#39|#039|#x27);'",
						"'&(euro|#8364);'i",				// europe
						"'&a(uml|UML);'",					// german
						"'&o(uml|UML);'",
						"'&u(uml|UML);'",
						"'&A(uml|UML);'",
						"'&O(uml|UML);'",
						"'&U(uml|UML);'",
						"'&szlig;'i",
						);
		$replace = array(	"",
							"",
							"\\1",
							"\"",
							"&",
							"<",
							">",
							" ",
							chr(161),
							chr(162),
							chr(163),
							chr(169),
							chr(174),
							chr(176),
							chr(39),
							chr(128),
							"",
							"",
							"",
							"",
							"",
							"",
							"",
						);
					
		$text = preg_replace($search,$replace,$document);
								
		return $text;
	}

/*======================================================================*\
	Function:	_expandlinks
	Purpose:	expand each link into a fully qualified URL
	Input:		$links			the links to qualify
				$URI			the full URI to get the base from
	Output:		$expandedLinks	the expanded links
\*======================================================================*/

	function _expandlinks($links,$URI)
	{
		
		preg_match("/^[^\?]+/",$URI,$match);

		$match = preg_replace("|/[^\/\.]+\.[^\/\.]+$|","",$match[0]);
		$match = preg_replace("|/$|","",$match);
		$match_part = parse_url($match);
		$match_root =
		$match_part["scheme"]."://".$match_part["host"];
				
		$search = array( 	"|^http://".preg_quote($this->host)."|i",
							"|^(\/)|i",
							"|^(?!http://)(?!mailto:)|i",
							"|/\./|",
							"|/[^\/]+/\.\./|"
						);
						
		$replace = array(	"",
							$match_root."/",
							$match."/",
							"/",
							"/"
						);			
				
		$expandedLinks = preg_replace($search,$replace,$links);

		return $expandedLinks;
	}

/*======================================================================*\
	Function:	_httprequest
	Purpose:	go get the http data from the server
	Input:		$url		the url to fetch
				$fp			the current open file pointer
				$URI		the full URI
				$body		body contents to send if any (POST)
	Output:		
\*======================================================================*/
	
	function _httprequest($url,$fp,$URI,$http_method,$content_type="",$body="")
	{
		$cookie_headers = '';
		if($this->passcookies && $this->_redirectaddr)
			$this->setcookies();
			
		$URI_PARTS = parse_url($URI);
		if(empty($url))
			$url = "/";
		$headers = $http_method." ".$url." ".$this->_httpversion."\r\n";		
		if(!empty($this->agent))
			$headers .= "User-Agent: ".$this->agent."\r\n";
		if(!empty($this->host) && !isset($this->rawheaders['Host'])) {
			$headers .= "Host: ".$this->host;
			if(!empty($this->port))
				$headers .= ":".$this->port;
			$headers .= "\r\n";
		}
		if(!empty($this->accept))
			$headers .= "Accept: ".$this->accept."\r\n";
		if(!empty($this->referer))
			$headers .= "Referer: ".$this->referer."\r\n";
		if(!empty($this->cookies))
		{			
			if(!is_array($this->cookies))
				$this->cookies = (array)$this->cookies;
	
			reset($this->cookies);
			if ( count($this->cookies) > 0 ) {
				$cookie_headers .= 'Cookie: ';
				foreach ( $this->cookies as $cookieKey => $cookieVal ) {
				$cookie_headers .= $cookieKey."=".urlencode($cookieVal)."; ";
				}
				$headers .= substr($cookie_headers,0,-2) . "\r\n";
			} 
		}
		if(!empty($this->rawheaders))
		{
			if(!is_array($this->rawheaders))
				$this->rawheaders = (array)$this->rawheaders;
			while(list($headerKey,$headerVal) = each($this->rawheaders))
				$headers .= $headerKey.": ".$headerVal."\r\n";
		}
		if(!empty($content_type)) {
			$headers .= "Content-type: $content_type";
			if ($content_type == "multipart/form-data")
				$headers .= "; boundary=".$this->_mime_boundary;
			$headers .= "\r\n";
		}
		if(!empty($body))	
			$headers .= "Content-length: ".strlen($body)."\r\n";
		if(!empty($this->user) || !empty($this->pass))	
			$headers .= "Authorization: Basic ".base64_encode($this->user.":".$this->pass)."\r\n";
		
		//add proxy auth headers
		if(!empty($this->proxy_user))	
			$headers .= 'Proxy-Authorization: ' . 'Basic ' . base64_encode($this->proxy_user . ':' . $this->proxy_pass)."\r\n";


		$headers .= "\r\n";
		
		// set the read timeout if needed
		if ($this->read_timeout > 0)
			socket_set_timeout($fp, $this->read_timeout);
		$this->timed_out = false;
		
		fwrite($fp,$headers.$body,strlen($headers.$body));
		
		$this->_redirectaddr = false;
		unset($this->headers);
						
		while($currentHeader = fgets($fp,$this->_maxlinelen))
		{
			if ($this->read_timeout > 0 && $this->_check_timeout($fp))
			{
				$this->status=-100;
				return false;
			}
				
			if($currentHeader == "\r\n")
				break;
						
			// if a header begins with Location: or URI:, set the redirect
			if(preg_match("/^(Location:|URI:)/i",$currentHeader))
			{
				// get URL portion of the redirect
				preg_match("/^(Location:|URI:)[ ]+(.*)/i",chop($currentHeader),$matches);
				// look for :// in the Location header to see if hostname is included
				if(!preg_match("|\:\/\/|",$matches[2]))
				{
					// no host in the path, so prepend
					$this->_redirectaddr = $URI_PARTS["scheme"]."://".$this->host.":".$this->port;
					// eliminate double slash
					if(!preg_match("|^/|",$matches[2]))
							$this->_redirectaddr .= "/".$matches[2];
					else
							$this->_redirectaddr .= $matches[2];
				}
				else
					$this->_redirectaddr = $matches[2];
			}
		
			if(preg_match("|^HTTP/|",$currentHeader))
			{
                if(preg_match("|^HTTP/[^\s]*\s(.*?)\s|",$currentHeader, $status))
				{
					$this->status= $status[1];
                }				
				$this->response_code = $currentHeader;
			}
				
			$this->headers[] = $currentHeader;
		}

		$results = '';
		do {
    		$_data = fread($fp, $this->maxlength);
    		if (strlen($_data) == 0) {
        		break;
    		}
    		$results .= $_data;
		} while(true);

		if ($this->read_timeout > 0 && $this->_check_timeout($fp))
		{
			$this->status=-100;
			return false;
		}
		
		// check if there is a a redirect meta tag
		
		if(preg_match("'<meta[\s]*http-equiv[^>]*?content[\s]*=[\s]*[\"\']?\d+;[\s]*URL[\s]*=[\s]*([^\"\']*?)[\"\']?>'i",$results,$match))

		{
			$this->_redirectaddr = $this->_expandlinks($match[1],$URI);	
		}

		// have we hit our frame depth and is there frame src to fetch?
		if(($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\s+.*src[\s]*=[\'\"]?([^\'\"\>]+)'i",$results,$match))
		{
			$this->results[] = $results;
			for($x=0; $x<count($match[1]); $x++)
				$this->_frameurls[] = $this->_expandlinks($match[1][$x],$URI_PARTS["scheme"]."://".$this->host);
		}
		// have we already fetched framed content?
		elseif(is_array($this->results))
			$this->results[] = $results;
		// no framed content
		else
			$this->results = $results;
		
		return true;
	}

/*======================================================================*\
	Function:	_httpsrequest
	Purpose:	go get the https data from the server using curl
	Input:		$url		the url to fetch
				$URI		the full URI
				$body		body contents to send if any (POST)
	Output:		
\*======================================================================*/
	
	function _httpsrequest($url,$URI,$http_method,$content_type="",$body="")
	{  
		if($this->passcookies && $this->_redirectaddr)
			$this->setcookies();

		$headers = array();		
					
		$URI_PARTS = parse_url($URI);
		if(empty($url))
			$url = "/";
		// GET ... header not needed for curl
		//$headers[] = $http_method." ".$url." ".$this->_httpversion;		
		if(!empty($this->agent))
			$headers[] = "User-Agent: ".$this->agent;
		if(!empty($this->host))
			if(!empty($this->port))
				$headers[] = "Host: ".$this->host.":".$this->port;
			else
				$headers[] = "Host: ".$this->host;
		if(!empty($this->accept))
			$headers[] = "Accept: ".$this->accept;
		if(!empty($this->referer))
			$headers[] = "Referer: ".$this->referer;
		if(!empty($this->cookies))
		{			
			if(!is_array($this->cookies))
				$this->cookies = (array)$this->cookies;
	
			reset($this->cookies);
			if ( count($this->cookies) > 0 ) {
				$cookie_str = 'Cookie: ';
				foreach ( $this->cookies as $cookieKey => $cookieVal ) {
				$cookie_str .= $cookieKey."=".urlencode($cookieVal)."; ";
				}
				$headers[] = substr($cookie_str,0,-2);
			}
		}
		if(!empty($this->rawheaders))
		{
			if(!is_array($this->rawheaders))
				$this->rawheaders = (array)$this->rawheaders;
			while(list($headerKey,$headerVal) = each($this->rawheaders))
				$headers[] = $headerKey.": ".$headerVal;
		}
		if(!empty($content_type)) {
			if ($content_type == "multipart/form-data")
				$headers[] = "Content-type: $content_type; boundary=".$this->_mime_boundary;
			else
				$headers[] = "Content-type: $content_type";
		}
		if(!empty($body))	
			$headers[] = "Content-length: ".strlen($body);
		if(!empty($this->user) || !empty($this->pass))	
			$headers[] = "Authorization: BASIC ".base64_encode($this->user.":".$this->pass);
			
		for($curr_header = 0; $curr_header < count($headers); $curr_header++) {
			$safer_header = strtr( $headers[$curr_header], "\"", " " );
			$cmdline_params .= " -H \"".$safer_header."\"";
		}
		
		if(!empty($body))
			$cmdline_params .= " -d \"$body\"";
		
		if($this->read_timeout > 0)
			$cmdline_params .= " -m ".$this->read_timeout;
		
		$headerfile = tempnam($temp_dir, "sno");

		exec($this->curl_path." -k -D \"$headerfile\"".$cmdline_params." \"".escapeshellcmd($URI)."\"",$results,$return);
		
		if($return)
		{
			$this->error = "Error: cURL could not retrieve the document, error $return.";
			return false;
		}
			
			
		$results = implode("\r\n",$results);
		
		$result_headers = file("$headerfile");
						
		$this->_redirectaddr = false;
		unset($this->headers);
						
		for($currentHeader = 0; $currentHeader < count($result_headers); $currentHeader++)
		{
			
			// if a header begins with Location: or URI:, set the redirect
			if(preg_match("/^(Location: |URI: )/i",$result_headers[$currentHeader]))
			{
				// get URL portion of the redirect
				preg_match("/^(Location: |URI:)\s+(.*)/",chop($result_headers[$currentHeader]),$matches);
				// look for :// in the Location header to see if hostname is included
				if(!preg_match("|\:\/\/|",$matches[2]))
				{
					// no host in the path, so prepend
					$this->_redirectaddr = $URI_PARTS["scheme"]."://".$this->host.":".$this->port;
					// eliminate double slash
					if(!preg_match("|^/|",$matches[2]))
							$this->_redirectaddr .= "/".$matches[2];
					else
							$this->_redirectaddr .= $matches[2];
				}
				else
					$this->_redirectaddr = $matches[2];
			}
		
			if(preg_match("|^HTTP/|",$result_headers[$currentHeader]))
				$this->response_code = $result_headers[$currentHeader];

			$this->headers[] = $result_headers[$currentHeader];
		}

		// check if there is a a redirect meta tag
		
		if(preg_match("'<meta[\s]*http-equiv[^>]*?content[\s]*=[\s]*[\"\']?\d+;[\s]*URL[\s]*=[\s]*([^\"\']*?)[\"\']?>'i",$results,$match))
		{
			$this->_redirectaddr = $this->_expandlinks($match[1],$URI);	
		}

		// have we hit our frame depth and is there frame src to fetch?
		if(($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\s+.*src[\s]*=[\'\"]?([^\'\"\>]+)'i",$results,$match))
		{
			$this->results[] = $results;
			for($x=0; $x<count($match[1]); $x++)
				$this->_frameurls[] = $this->_expandlinks($match[1][$x],$URI_PARTS["scheme"]."://".$this->host);
		}
		// have we already fetched framed content?
		elseif(is_array($this->results))
			$this->results[] = $results;
		// no framed content
		else
			$this->results = $results;

		unlink("$headerfile");
		
		return true;
	}

/*======================================================================*\
	Function:	setcookies()
	Purpose:	set cookies for a redirection
\*======================================================================*/
	
	function setcookies()
	{
		for($x=0; $x<count($this->headers); $x++)
		{
		if(preg_match('/^set-cookie:[\s]+([^=]+)=([^;]+)/i', $this->headers[$x],$match))
			$this->cookies[$match[1]] = urldecode($match[2]);
		}
	}

	
/*======================================================================*\
	Function:	_check_timeout
	Purpose:	checks whether timeout has occurred
	Input:		$fp	file pointer
\*======================================================================*/

	function _check_timeout($fp)
	{
		if ($this->read_timeout > 0) {
			$fp_status = socket_get_status($fp);
			if ($fp_status["timed_out"]) {
				$this->timed_out = true;
				return true;
			}
		}
		return false;
	}

/*======================================================================*\
	Function:	_connect
	Purpose:	make a socket connection
	Input:		$fp	file pointer
\*======================================================================*/
	
	function _connect(&$fp)
	{
		if(!empty($this->proxy_host) && !empty($this->proxy_port))
			{
				$this->_isproxy = true;
				
				$host = $this->proxy_host;
				$port = $this->proxy_port;
			}
		else
		{
			$host = $this->host;
			$port = $this->port;
		}
	
		$this->status = 0;
		
		if($fp = fsockopen(
					$host,
					$port,
					$errno,
					$errstr,
					$this->_fp_timeout
					))
		{
			// socket connection succeeded
			return true;
		}
		else
		{
			// socket connection failed
			$this->status = $errno;
			switch($errno)
			{
				case -3:
					$this->error="socket creation failed (-3)";
				case -4:
					$this->error="dns lookup failure (-4)";
				case -5:
					$this->error="connection refused or timed out (-5)";
				default:
					$this->error="connection failed (".$errno.")";
			}
			return false;
		}
	}
/*======================================================================*\
	Function:	_disconnect
	Purpose:	disconnect a socket connection
	Input:		$fp	file pointer
\*======================================================================*/
	
	function _disconnect($fp)
	{
		return(fclose($fp));
	}

	
/*======================================================================*\
	Function:	_prepare_post_body
	Purpose:	Prepare post body according to encoding type
	Input:		$formvars  - form variables
				$formfiles - form upload files
	Output:		post body
\*======================================================================*/
	
	function _prepare_post_body($formvars, $formfiles)
	{
		settype($formvars, "array");
		settype($formfiles, "array");
		$postdata = '';

		if (count($formvars) == 0 && count($formfiles) == 0)
			return;
		
		switch ($this->_submit_type) {
			case "application/x-www-form-urlencoded":
				reset($formvars);
				while(list($key,$val) = each($formvars)) {
					if (is_array($val) || is_object($val)) {
						while (list($cur_key, $cur_val) = each($val)) {
							$postdata .= urlencode($key)."[]=".urlencode($cur_val)."&";
						}
					} else
						$postdata .= urlencode($key)."=".urlencode($val)."&";
				}
				break;

			case "multipart/form-data":
				$this->_mime_boundary = "Snoopy".md5(uniqid(microtime()));
				
				reset($formvars);
				while(list($key,$val) = each($formvars)) {
					if (is_array($val) || is_object($val)) {
						while (list($cur_key, $cur_val) = each($val)) {
							$postdata .= "--".$this->_mime_boundary."\r\n";
							$postdata .= "Content-Disposition: form-data; name=\"$key\[\]\"\r\n\r\n";
							$postdata .= "$cur_val\r\n";
						}
					} else {
						$postdata .= "--".$this->_mime_boundary."\r\n";
						$postdata .= "Content-Disposition: form-data; name=\"$key\"\r\n\r\n";
						$postdata .= "$val\r\n";
					}
				}
				
				reset($formfiles);
				while (list($field_name, $file_names) = each($formfiles)) {
					settype($file_names, "array");
					while (list(, $file_name) = each($file_names)) {
						if (!is_readable($file_name)) continue;

						$fp = fopen($file_name, "r");
						$file_content = fread($fp, filesize($file_name));
						fclose($fp);
						$base_name = basename($file_name);

						$postdata .= "--".$this->_mime_boundary."\r\n";
						$postdata .= "Content-Disposition: form-data; name=\"$field_name\"; filename=\"$base_name\"\r\n\r\n";
						$postdata .= "$file_content\r\n";
					}
				}
				$postdata .= "--".$this->_mime_boundary."--\r\n";
				break;
		}

		return $postdata;
	}
}

?>
