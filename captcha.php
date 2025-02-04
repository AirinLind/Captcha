<?php
session_start();

$chars = 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghijkmnprstuvwxyz123456789';
$captcha_text = substr(str_shuffle($chars), 0, 5);
$_SESSION['captcha'] = $captcha_text;

$width = 200;
$height = 100;
$font_size = 20;
$image = imagecreatefromjpeg('noise.jpg');

$font = 'C:\Windows\Fonts\Autumn__.ttf'; 
$text_color = imagecolorallocate($image, 0, 0, 0);

for ($i = 0; $i < strlen($captcha_text); $i++) {
    $size = rand(18, 25);
    $angle = rand(-15, 15);
    $x = 20 + ($i * 40);
    $y = rand(25, 35);
    imagettftext($image, $font_size, $angle, $x, $y, $text_color, $font, $captcha_text[$i]);
}

header('Content-Type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
?>
