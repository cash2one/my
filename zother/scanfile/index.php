<?php
set_time_limit(0);
// ע���� 4.0.0-RC2 ֮ǰ������ !== �����

/**
 * �г�Ŀ¼���ļ�
 */
function getfile($dir, $deep = 0){
	global $root,$rootdir,$savepath;
	$dirname = createdirname();
	$i = 1;
	if ($handle = opendir($dir)) {
		//echo $dir;
		$title = gettitle($dir);
		insertmain($title);
		//echo createchar($deep).$dir."<br />";
		/* ������ȷ�ر���Ŀ¼���� */
	   while (false !== ($file = readdir($handle))) {
			 if ($file != "." && $file != "..") {
				 $temp =  $dir.$file;
				 //echo $temp.'/';
				 if(is_dir($temp.'/')){
				 	getfile($temp.'/');
				 }
				 else{
					 if(in_array(getext($temp),array('jpg','gif','png'))){
						//echo createchar($deep+1)."$file<br />";
						$filename = createfilename();
						$savename = $root.$rootdir.$dirname.$filename; //���������ļ���
						copy($temp,$savename);
						
						//����ͼ
						require_once("gdimage.class.php");
						$g = new gdimage();
						$newname =  $root.$rootdir.$dirname."thumb.".$filename;
						if(cut($savename, $newname , 160,160)){
							$thumb = $newname;
						}
						
						insertdb($rootdir.$dirname.$filename,$rootdir.$dirname."thumb.".$filename);
						if($i == 1){
							updatethumb($rootdir.$dirname."thumb.".$filename);
							$i++;
						}
						
					 }
				 }
			 }
		}
	
		closedir($handle);
	}
}

/**
 * ���ɷָ���
 */
function createchar($num){
	$str =  "";
	for($i = 0; $i < $num; $i++){
		$str .= "--";
	}
	return $str;
}

/**
 * �����ļ�
 */
function copyfile($s, $d){

}

/**
 * ����Ŀ¼��
 */
function createdirname(){
	global $root,$rootdir;
	$name = date('ymd').rand();
	if(mkdir($root.$rootdir.$name)){
		return $name.'/';
	}
}

/**
 * �����ļ���
 */
function createfilename(){
	return date('His').uniqid().'.jpg';
}

/**
 * �������ݿ�
 */
function insertmain($title){
	global $tid;
	//$cid = rand(2,6);
	$cid = 8;
	require_once("dbstuff.class.php");
	$db = new dbstuff();
	$db->connect('localhost','root','','21mmm');
	$db->query("set names gbk");
	
	$ctime = time();
	$sql = "insert into mmm_photo(title,ctime,cid) values('$title',$ctime,$cid)";
	if($db->query($sql)){
		$tid = $db->insert_id();
	}
}

function insertdb($imgurl,$thumb){
	global $tid,$roothttp;
	require_once("dbstuff.class.php");
	$db = new dbstuff();
	$db->connect('localhost','root','','21mmm');
	$db->query("set names gbk");
	
	
	$ctime = time();
	if($roothttp){
		$imgurl = $roothttp.$imgurl;
		$thumb =  $roothttp.$thumb;
	}
	$type = 'photoba';
	$sql = "insert into mmm_file(type,utype,tid,imgurl,thumb,ctime) values('$type','$utype',$tid,'$imgurl','$thumb',$ctime)";
	$db->query($sql);
	
}

function updatethumb($thumb){
	global $tid,$roothttp;
	require_once("dbstuff.class.php");
	$db = new dbstuff();
	$db->connect('localhost','root','','21mmm');
	$db->query("set names gbk");
	if($roothttp){
		$thumb =  $roothttp.$thumb;
	}
	$sql = "update mmm_photo set thumb = '$thumb' where id = $tid";
	//echo $sql;
	$db->query($sql);
}

function getext($file){
	$a = explode('.',$file);
	return $a[count($a)-1];
}

function gettitle($dir){
	$a = explode('/',$dir);
	$a = $a[count($a)-2];
	return $a;
}

//$dir = "O:/0-mm-pic/ͼƬ_��С/m24/";                   //Ҫɨ���Ŀ¼
global $dir;$dir = "E:/web/myphp/car/";
global $root;$root = "M:/img/";         //�ļ�����ĸ�Ŀ¼
global $rootdir;$rootdir = "p/";                   //ͼƬ���Ŀ¼
global $roothttp;$roothttp = "/";  //url����ַ
global $tid;$tid = 0;
getfile($dir);
//echo "hi"
//gettitle('K:/picture/0a/����ϲ����ɧ������˭�ܵ��˾����ȥ����/');
/*$temp = "K:/picture/0a/��ɧŮ��/B01.jpg";
$dirname = createdirname();
$s = "D:/photo1/".$dirname."0247424b396dce5f5e2.jpg";
copy($temp,$s);*/
//insertdb('����');
?> 