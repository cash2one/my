<?php
/*---------------------------------------------------------------
����: ͼƬ������
����: ice_berg16(Ѱ�εĵ�����)
-----------------------------------------------------------------*/

class gdimage
{
 var $imageInfo=Array();
 var $width=200;
 var $height=200;
 //==========================================
 // ����: switchpic($sourFile,$width=128,$height=128) 
 // ����: ת��ͼƬ��ʽ,���ָ����С.
 // ����: $sourFile ͼƬԴ�ļ�
 // ����: $newName ���ɵ��ļ�URL
 // ����: $width ��������ͼ�Ŀ��
 // ����: $height ��������ͼ�ĸ߶�
 // ����: 0 ʧ�� �ɹ�ʱ�������ɵ�ͼƬ·��
 //==========================================
 function switchpic($sourFile , $newName , $width=200,$height=200,$zoomtype=0) 
 {
  $imageInfo =$this->getInfo($sourFile);
  switch ($imageInfo["type"])
  {
   case 1: //gif
    $img = imagecreatefromgif($sourFile);
    break;
   case 2: //jpg
    $img = imagecreatefromjpeg($sourFile);
    break;
   case 3: //png
    $img = imagecreatefrompng($sourFile);
    break;
   default:
    return 0;
    break;
  }
  if (!$img) 
   return 0;

  $width  = ($width > $imageInfo["width"]) ? $imageInfo["width"] : $width;
  $height = ($height > $imageInfo["height"]) ? $imageInfo["height"] : $height;
  $srcW = $imageInfo["width"];
  $srcH = $imageInfo["height"];
  
  if($zoomtype)
  {
   	//$height=round($srcH * $zoomtype);
   	//$width=round($srcW * $zoomtype);
   }
  if($this->width<$width)
  {
  	$width=$this->width;
  }
  
  if($this->height<$height)
  {
  	$height=$this->height;
  }
  
  if($srcW/$srcH >1)
  {
	  //$width = 
  	//$width=($srcW/$srcH)*$height;
	$height = round($srcH * ($width / $srcW));
  }
  else
  {
 // 	$height=($srcW/$srcH)*$width;
 	$width = round($srcW * ($height / $srcH));
  }
  //echo "w: $width-------h:$height <br />";
  if (function_exists("imagecreatetruecolor")) //GD2.0.1
  {
   $new = imagecreatetruecolor($width, $height);
   ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
  }
  else
  {
   $new = imagecreate($width, $height);
   ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
  }
  //*/
    if (file_exists($newName)) unlink($newName);
   $maketype = strtolower(substr(strrchr($newName,"."),1));
   switch($maketype)
  {
    case "jpg": ImageJPEG($new, $newName);break;
    case "gif" : ImageGIF($new, $newName);break;
    case "png" : ImagePNG($new, $newName);break;
    case "wbmp" : ImageWBMP($new, $newName);break;
    default: ImageJPEG($new, $newName);
  }
   ImageDestroy($new);
   ImageDestroy($img);
   return $newName;
  


 }
 
 //==========================================
 // ����: waterMark($sourFile, $text)
 // ����: ��ͼƬ��ˮӡ
 // ����: $sourFile ͼƬ�ļ���
 // ����: $text �ı�����(���������ַ���)
 // ����: 1 �ɹ� �ɹ�ʱ�������ɵ�ͼƬ·��
 //==========================================
 function waterMark($sourFile, $text) 
 {
  $fontName = "1900805.ttf";
  $imageInfo = gdimage::getInfo($sourFile);
  switch ($imageInfo["type"])
  {
   case 1: //gif
    $img = imagecreatefromgif($sourFile);
    break;
   case 2: //jpg
    $img = imagecreatefromjpeg($sourFile);
    break;
   case 3: //png
    $img = imagecreatefrompng($sourFile);
    break;
   default:
    return 0;
    break;
  }
  if (!$img) 
   return 0;

  $width  = $imageInfo["width"];
  $height = $imageInfo["height"];
  $srcW = $imageInfo["width"];
  $srcH = $imageInfo["height"]; 
  if ($srcW * $width > $srcH * $height)
   $height = round($srcH * $width / $srcW);
  else
   $width = round($srcW * $height / $srcH);
  if (function_exists("imagecreatetruecolor")) //GD2.0.1
  {
   $new = imagecreatetruecolor($width, $height);
   ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
  }
  else
  {
   $new = imagecreate($width, $height);
   ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
  }
  $white = imageColorAllocate($new, 255, 255, 255);
  $black = imageColorAllocate($new, 0, 0, 0);
  $alpha = imageColorAllocateAlpha($new, 230, 230, 230, 40);
  //$rectW = max(strlen($text[0]),strlen($text[1]))*7;
  ImageFilledRectangle($new, 0, $height-26, $width, $height, $alpha);
  ImageFilledRectangle($new, 13, $height-20, 15, $height-7, $black);
  //ImageTTFText($new, 4.9, 0, 20, $height-14, $black, $fontName, $text[0]);
  ImageTTFText($new, 4.9, 0, 20, $height-6, $black, $fontName, $text);
  //*/
  ImageJPEG($new, $sourFile);
  ImageDestroy($new);
  ImageDestroy($img);

 }

 function waterpic($logopic , $photopic , $maxWidth = 500 , $maxHeight = 300) 
 {
  $imageInfo = gdimage::getInfo($logopic);
  switch ($imageInfo["type"])
  {
   case 1: //gif
    $img = imagecreatefromgif($logopic);
    break;
   case 2: //jpg
    $img = imagecreatefromjpeg($logopic);
    break;
   case 3: //png
    $img = imagecreatefrompng($logopic);
    break;
   default:
    return 0;
    break;
  }
  if (!$img) 
   return 0;

  $width = $srcW = $imageInfo["width"];
  $height = $srcH = $imageInfo["height"];
  $new = ImageCreateFromJpeg($photopic);
  ImageAlphaBlending($new, true);
  ImageCopy($new, $img, 0, 0, 0, 0, $width, $height);

  ImageJPEG($new, $photopic);
  ImageDestroy($new);
        ImageDestroy($img);
 }

function cutpic($logopic ,$photopic ,$lux,$luy,$width,$height)
 {
 	$imageInfo=$this->getInfo($logopic);
  switch ($imageInfo["type"])
  {
   case 1: //gif
    $img = imagecreatefromgif($logopic);
    break;
   case 2: //jpg
    $img = imagecreatefromjpeg($logopic);
    break;
   case 3: //png
    $img = imagecreatefrompng($logopic);
    break;
   default:
    return 0;
    break;
  }
  if (!$img) 
   return 0;
   
  $new = imagecreate($width, $height);
  if (function_exists("imagecreatetruecolor")) //GD2.0.1
  {
   $new = imagecreatetruecolor($width, $height);
   ImageCopy($new, $img, 0, 0, $lux, $luy,  $imageInfo['width'], $imageInfo['height']);
  }
  else
  {
   $new = imagecreate($width, $height);
   ImageCopy($new, $img, 0, 0, $lux, $luy, $imageInfo['width'], $imageInfo['height']);
  }
   if (file_exists($photopic)) unlink($photopic);
   $maketype = strtolower(substr(strrchr($photopic,"."),1));
   switch($maketype)
  {
    case "jpg": ImageJPEG($new, $photopic);break;
    case "gif" : ImageGIF($new, $photopic);break;
    case "png" : ImagePNG($new, $photopic);break;
    case "wbmp" : ImageWBMP($new, $photopic);break;
    default: ImageJPEG($new, $photopic);
  }
  return true;
 }

 function getInfo($file) 
 {
  $data = getimagesize($file);
  $imageInfo["width"] = $data[0];
  $imageInfo["height"]= $data[1];
  $imageInfo["type"] = $data[2];
  $imageInfo["name"] = basename($file);
  //$imageInfo["size"]  = filesize($file);
  return $imageInfo;  
 }
 
 //����ͼƬ,$width��õĿ�ȣ�$heigh��õĸ߶�
  function scale($sourFile , $newName , $width=200,$height=200,$zoomtype=0) 
 {
  $imageInfo =$this->getInfo($sourFile);
  switch ($imageInfo["type"])
  {
   case 1: //gif
    $img = imagecreatefromgif($sourFile);
    break;
   case 2: //jpg
    $img = imagecreatefromjpeg($sourFile);
    break;
   case 3: //png
    $img = imagecreatefrompng($sourFile);
    break;
   default:
    return 0;
    break;
  }
  if (!$img) 
   return 0;

  $width  = ($width > $imageInfo["width"]) ? $imageInfo["width"] : $width;
  $height = ($height > $imageInfo["height"]) ? $imageInfo["height"] : $height;
  $srcW = $imageInfo["width"];
  $srcH = $imageInfo["height"];

  /*if($this->width<$width)
  {
  	$width=$this->width;
  }
  
  if($this->height<$height)
  {
  	$height=$this->height;
  }*/
  
  /*if($srcW < $srcH)
  {
	  //$width = 
  	//$width=($srcW/$srcH)*$height;
	
	$height = round($srcH * ($width / $srcW));
  }
  else
  {
 // 	$height=($srcW/$srcH)*$width;
 	$width = round($srcW * ($height / $srcH));
  }
  */
  //echo "w: $width-------h:$height <br />";
  if (function_exists("imagecreatetruecolor")) //GD2.0.1
  {
   $new = imagecreatetruecolor($width, $height);
   ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
  }
  else
  {
   $new = imagecreate($width, $height);
   ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]);
  }
  //*/
    if (file_exists($newName)) unlink($newName);
   $maketype = strtolower(substr(strrchr($newName,"."),1));
   switch($maketype)
  {
    case "jpg": ImageJPEG($new, $newName);break;
    case "gif" : ImageGIF($new, $newName);break;
    case "png" : ImagePNG($new, $newName);break;
    case "wbmp" : ImageWBMP($new, $newName);break;
    default: ImageJPEG($new, $newName);
  }
   ImageDestroy($new);
   ImageDestroy($img);
   return $newName;
  


 }
 
}


/*������
������λ��С������������
�� 800*600 ���ų�200*100
800/200 = 4
600/100 = 6
��ô����4Ϊ���ű���
800/4=200
600/4=150

����Ҫ��6Ϊ����λ���ʹ�����
800/6=133.333
600/6=100
�ͱ�� 133*100��ͼƬ�ˣ����ü����ͼƬҪ����200*100��û���ﵽ����ߴ��ˡ�
*/

function cut($sImg,$dImg,$cutW = 100,$cutH = 160){
//$img = $sImg = "a.jpg"; 
//$saveimg = "cut.jpg";
$g = new gdimage();



$pinfo = $g->getInfo($sImg);
$sW = $pinfo['width'];
$sH = $pinfo['height'];
$wMult = $sW / $cutW; //�����ű���
$hMult = $sH / $cutH; //�����ű���
$mult = $wMult < $hMult ? $wMult : $hMult;
//echo $mult;
$scaleW = $sW / $mult;
$scaleH = $sH / $mult;
//echo $width."--".$height;
$scaleTempImg = $dImg."_temp.jpg"; //���ŵ�ͼƬ
$g->scale($sImg,$scaleTempImg,$scaleW,$scaleH); //����ͼƬ


//�������ź��ͼƬ
$pinfo = $g->getInfo($scaleTempImg); 
if($pinfo['width'] > $pinfo['height']){
	//ȥ���ߣ�Ҳ���� x = (width - 100)/2
	$x = ($pinfo['width'] - $cutW) / 2;
	$y = 0;
}else{
	//ȥ�ײ�
	$x = 0;
	$y = 0;
}

$g->cutpic($scaleTempImg,$dImg,$x,$y,$cutW,$cutH);
}

?>
