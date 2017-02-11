<?php 
error_reporting(0);
if(function_exists('session_start')) 
session_start();
header('Cache-control: private, no-cache, must-revalidate');
header('Expires: 0');
$string = "0123456789abcdefghijklmnopqrst";
$name = "security_number";
$fontSize = 5;
$fontColor = "000000";
$bgColor = "FFFFFF";
$lineColor = "B0B0B0";
function convertRGB($color) {
$color = eregi_replace('[^0-9a-f]', '', $color);
return array(hexdec(substr($color, 0, 2)), hexdec(substr($color, 2, 2)), hexdec(substr($color, 4, 2)));}
function createImage($text, $width, $height, $font = 5) {
global $fontColor, $bgColor, $lineColor;
if($img = @ImageCreate($width, $height)) {
list($R, $G, $B) = convertRGB($fontColor);
$fontColor = ImageColorAllocate($img, $R, $G, $B);
list($R, $G, $B) = convertRGB($bgColor);
$bgColor = ImageColorAllocate($img, $R, $G, $B);list($R, $G, $B) = convertRGB($lineColor);
$lineColor = ImageColorAllocate($img, $R, $G, $B);ImageFill($img, 0, 0, $bgColor);
for($i = 0; $i <= $width; $i += 5) {
@ImageLine($img, $i, 0, $i, $height, $lineColor);}
for($i = 0; $i <= $height; $i += 5) {
@ImageLine($img, 0, $i, $width, $i, $lineColor);}
$hcenter = $width / 2;
$vcenter = $height / 2;
$x = round($hcenter - ImageFontWidth($font) * strlen($text) / 2);
$y = round($vcenter - ImageFontHeight($font) / 2);
ImageString($img, $font, $x, $y, $text, $fontColor);
if(function_exists('ImagePNG')) { 
 header('Content-Type: image/png');  
 @ImagePNG($img);}
 else if(function_exists('ImageGIF')) {
 header('Content-Type: image/gif'); 
 @ImageGIF($img);}
 else if(function_exists('ImageJPEG')) {
 header('Content-Type: image/jpeg');  
 @ImageJPEG($img);
 }
 ImageDestroy($img);
 }}
 $secCode = substr(str_shuffle($string) , 0 , 5);
$_SESSION[$name] = $secCode;
createImage($secCode, 71, 21, $fontSize); 
?>