<?php 
		//���������
		$client_cache_time=600;//��λ - ��
        header('Cache-Control: public, max-age='.$client_cache_time);
        header('Expires: '.gmdate('D, d M Y H:i:s',time()+$client_cache_time).' GMT');//����ҳ�滺��ʱ��
        header('Last-Modified: '.gmdate('D, d M Y H:i:s',time()).' GMT');//��������޸�ʱ��
        header('Pragma: public');
        //header('Etag:phpblogxx');//���ر�ʶ�����ڱ�ʶ�ϴε�ȷ���ʹ�(������д��ڻ���)
?>
<?php ob_start('ob_gzip'); ?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />  
<title>�ޱ����ĵ�</title>  
</head>  

<body>  
<?php  
for($i=0;$i<10000;$i++){  
echo 'Hello World!'; 
}  
?>  
</body>  
</html>  

<?php  
ob_end_flush();  
//ѹ������  
function ob_gzip($content){  
if(!headers_sent()&&extension_loaded("zlib")&&strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){  
$content = gzencode($content,9);  
header("Content-Encoding: gzip");  
header("Vary: Accept-Encoding");  
header("Content-Length: ".strlen($content));  
}  
return $content;  
}  
?>  
