<?php
session_start();

$x = 0;
$y = 0;
$font = 'C:\OpenServer\domains\myproject.loc\www\fonts\7fonts.ru_Caslon-Book.ttf';
$str = 'abcdefghijknmpqrstuvwxyz123456789';
$captcha = '';

// Создаем изображение

$img = imagecreatetruecolor(220, 70);
imagefill($img, 0, 0, 0xF0F0F3);

for ($i = 0; $i < 6; $i++) {
    imagettftext($img, rand(28, 30), rand(-12, 12), $x = $x + 25, $y = 40,
    imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255)), $font, $random_text = $str[rand(0, mb_strlen($str))]);
    imageline($img, 0, rand(0, 60), 220, rand(0, 40), 0x000000);

    $captcha = $captcha.$random_text;
}

header('Content-type: image/png');

$_SESSION['captcha'] = $captcha;
imagepng($img);
imagedestroy($img);

exit();