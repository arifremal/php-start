<?php
// $x = 24;
// $y = 2;
// echo $x + $y;
// echo "<br>";

// conditionnal

$age =13;
// if($age<=12){
//     echo "20";
// } elseif($age< 18){
//     echo "11";
// } else{
//     echo "nothing";
// }

$watched =false;

if($age >= 15 && !$watched){
echo "herry";
} 

if($age >=15 || !$watched){
    echo "not hary";
}

$day =3;
switch($day){
    case 1;
    echo"arif";
    break;
    case 2;
    echo "RRREMAL";
    break;
    default:
    echo "day";
}