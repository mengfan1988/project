<?php
header("content-type:image/jpeg;charset=utf-8");
session_start();
$img=imagecreatetruecolor(100,30);
$element='abcdefghigkmnpqrstuvwxy3456789';
$str='';
for($i=0;$i<4;$i++){
$str.=substr($element,rand(0,strlen($element)-1),1);
}
$_SESSION['code']=$str;
$color=imagecolorallocate($img,rand(200,255),rand(150,255),rand(200,255));//��ɫ
$colorborder=imagecolorallocate($img,rand(200,255),rand(150,255),rand(200,255));//��ɫ
$color1=imagecolorallocate($img,rand(100,200),rand(100,150),rand(100,200));//��ɫ
$color2=imagecolorallocate($img,rand(100,200),rand(100,150),rand(100,200));//��ɫ
imagefill($img,0,0,$color);
imagerectangle($img,0,0,99,29,$colorborder);//���������
for($i=0;$i<=100;$i++){
imagesetpixel($img,rand(1,99),rand(1,29),$color1);//��С��
}
/*for($i=1;$i<=2;$i++){
imageline($img,rand(0,20),rand(0,30),rand(60,99),rand(0,30),$color2);//����
}*/
imagettftext($img,16,rand(-3,5),20,20,$color2,"Helvetica.Ttf",$str);
imagejpeg($img);
imagedestroy($img);