<?php
$src_image_path = "auto.png";
$src_logo_path = "google.png";

// tamanho máximo para o logo
$logo_width = 100;
$logo_height = 100;

list($w_image, $h_image) = getimagesize($src_image_path);
list($w_logo, $h_logo) = getimagesize($src_image_path);

$ratio_logo = $w_logo / $h_logo;
if($logo_width/$logo_height > $ratio_logo) {
    $logo_width = $logo_height * $ratio_logo;
} else {
    $logo_height = $logo_width / $ratio_logo;        
}

$src_image = imagecreatefrompng($src_image_path);
$src_logo = imagecreatefrompng($src_logo_path);

$dst_image = imagecreatetruecolor($w_image, $h_image);
$dst_logo = imagecreatetruecolor($logo_width, $logo_height);
imagecopyresampled($dst_logo, $src_logo, 0,0,0,0, $logo_width, $logo_height, $w_logo, $h_logo);

imagecopy($dst_image, $src_image, 0, 0, 0, 0, $w_image, $h_image);
imagecopy($dst_image, $dst_logo, 10, 10, 0, 0, $logo_width, $logo_height);

header("Content-Type: image/png");
imagepng($dst_image);

?>