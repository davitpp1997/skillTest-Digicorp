<?php 
$kata = 'strawberry';
echo "Kata = ".$kata;

$huruf = str_split($kata);
echo "<br>";
$jumlahHuruf = array_count_values($huruf);
arsort($jumlahHuruf);
echo "Paling banyak muncul adalah = ";

foreach($jumlahHuruf as $x=>$x_value){
   echo $x . " " . $x_value."x";
   break;
}

?>