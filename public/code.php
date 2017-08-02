<?php 
//session_start();
//use think\Session;
$authnum=random(4); 
//$_SESSION['code']=$authnum;
//Session::set('code',$name);
Header("Content-type: image/PNG"); 
$im = imagecreate(55,22); //imagecreate() 新建图像，大小为 x_size 和 y_size 的空白图像。 
$red = ImageColorAllocate($im, 153,51,0); //设置背景颜色 
$white = ImageColorAllocate($im, 255,204,0);//设置文字颜色 
$gray = ImageColorAllocate($im, 102,102,0); //设置杂点颜色 
imagefill($im,55,22,$red); 
for ($i = 0; $i < strlen($authnum); $i++){ 
    imagestring($im, 6, 13*$i+4, 1, substr($authnum,$i,1), $white); 
} 
for($i=0;$i<100;$i++) imagesetpixel($im, rand()%55 , rand()%18 , $gray); //加入干扰象素 
ImagePNG($im); //以 PNG 格式将图像输出到浏览器或文件 
ImageDestroy($im);//销毁一图像 

function random($length) { 
    $hash = ''; 
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghijkmnpqrstuvwxyz'; 
    $max = strlen($chars) - 1; 
    mt_srand((double)microtime() * 1000000); 
    for($i = 0; $i < $length; $i++) { 
        $hash .= $chars[mt_rand(0, $max)]; 
    } 
    return $hash; 
}
?>
