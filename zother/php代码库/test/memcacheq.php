<?php
session_start();
$memcache_obj = new Memcache;
$memcache_obj->connect('10.240.128.84', 21201) or die ("����MemcacheQ������ʧ��");
if($_GET['a'] == "s"){
	if(!$_SESSION['i']){
		$_SESSION['i'] = 1;
	}else {
		$_SESSION['i']++;
	}
	echo "������Ϣ����(��ջ):".$_SESSION['i'];
	memcache_set($memcache_obj, 'test',$_SESSION['i'], 0, 0);
}else{
	/* consume a message from 'demoqueue1' */
	echo "������Ϣ����(��ջ)".memcache_get($memcache_obj, 'test');
}
memcache_close($memcache_obj);
?>
