<?php 

$arr = array( rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100) );
rsort($arr);
print_r($arr);

echo "<br>Nilai terbesar ke dua = ".$arr[1];
?>