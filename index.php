<?php

$domain = $_SERVER['DOCUMENT_ROOT']; // or https://www.xxx.yy.zz
$target = './index.html';
$html ='';

$file = fopen ( $target, 'r' );
if($file){
  while ( $line = fgets ($file) ) {
    $pattern = '/<!--[\s?]*#include virtual="(.*?)"[\s?]*-->/';
    if ( preg_match ( $pattern, $line, $array_result ) == 1 ){
        $src = file_get_contents ( $domain . $array_result[1] );
        $html .= $src;
    } else {
        $html .= $line;
    }
  }
}
fclose ($file);

echo $html;

?>