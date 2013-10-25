<?php
   
if (!isset($_REQUEST['name'])) {die('LOLNOPE.');}



$file = 'yourmom.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= $_REQUEST['name'] . "\n";
// Write the contents back to the file
file_put_contents($file, $current);

$im = imagecreatefrompng('cissp.png');

header('Content-type: image/png');

$name = $_REQUEST['name'];

if (strlen($_REQUEST['name']) > 100) {$name = 'Too Long LOL';}
if (strpos(strtolower($name), 'c0ffee') !== FALSE) {$name = 'Give Up, C0FFEE';}

$font = 'diploma.ttf';
$font_bold = 'cb.ttf';

function imagettftextalign($image, $size, $angle, $x, $y, $color, $font, $text, $alignment='L') {
    
    //check width of the text
    $bbox = imagettfbbox ($size, $angle, $font, $text);
    $textWidth = $bbox[2] - $bbox[0];
    switch ($alignment) {
        case "R":
            $x -= $textWidth; 
            break;
        case "C":
            $x -= $textWidth / 2;
            break;
    }
        
    //write text
    imagettftext ($image, $size, $angle, $x, $y, $color, $font, $text);

}

imagettftextalign($im, 28, 0, 400, 246, imagecolorallocate ($im, 100, 100, 100), $font, $name, 'C');

imagettftextalign($im, 12, 0, 624, 450, imagecolorallocate ($im, 60, 60, 60), $font_bold, rand(100000,999999));

$dt = date("F", mt_rand(1262055681,9962055681));
$dt .= ' ' . (2014 + rand(0,3));
imagettftextalign($im, 12, 0, 624, 500, imagecolorallocate ($im, 60, 60, 60), $font_bold, $dt);


imagepng($im);

?>
