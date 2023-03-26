<?php

$source = 'source';
$target = 'target';

$watermark = imagecreatefrompng('kingchobo.png');
$src_width = imagesx($watermark);
$src_height = imagesy($watermark);

//echo $src_width .'x'. $src_height;

$margin_right = 10; 
$margin_bottom = 10;

// $c = array_diff($a, $b);

$images = array_diff(scandir($source), ['.','..']);

foreach($images AS $image) {
  $dst_img = imagecreatefromjpeg($source .'/'. $image);
  $dst_x = imagesx($dst_img) - $src_width - $margin_right;
  $dst_y = imagesy($dst_img) - $src_height - $margin_bottom;

  $src_x = 0;
  $src_y = 0;

  imagecopy(
    $dst_img, // 대상 이미지 도화지 
    $watermark, // 워터마크 이미지 도화지
    $dst_x,
    $dst_y,
    $src_x, // 워터마크
    $src_y,// 워터마크
    $src_width,// 워터마크
    $src_height// 워터마크
  );
  
  imagejpeg($dst_img, $target .'/'. $image, 100);
  imagedestroy($dst_img);
}
