<?php 

$arr1=array("�й�","2144","��B");
$arr2 = array('����','dsfds','l lover you');
$arr = array_merge($arr1,$arr2);

shuffle($arr);
print_r($arr);

?>