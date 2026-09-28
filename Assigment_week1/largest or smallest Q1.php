<?php 
 
$num1 = 25; 
$num2 = 10; 
$num3 = 40; 
 
if ($num1 >= $num2 && $num1 >= $num3) { 
    $largest = $num1; 
} elseif ($num2 >= $num1 && $num2 >= $num3) { 
    $largest = $num2; 
} else { 
    $largest = $num3; 
} 
 
if ($num1 <= $num2 && $num1 <= $num3) { 
    $smallest = $num1; 
} elseif ($num2 <= $num1 && $num2 <= $num3) { 
    $smallest = $num2; 
} else { 
    $smallest = $num3; 
} 
 
echo "The three numbers are: $num1, $num2, $num3<br>"; 
echo "The largest number is: $largest<br>"; 
echo "The smallest number is: $smallest"; 
 
?>