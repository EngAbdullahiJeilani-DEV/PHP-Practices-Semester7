<?php

$name = "Omar Abdi";
$age = 20;
echo "My name is $name";
echo "<br>";
echo "My age is $age <br>";

// String Functions
$message = "Good Morning";
echo "The position of 5 is: " . $message[5] . "<br>";
echo "Check whether the word W contains \"$message\": " . strpos($message, "W");
echo "<br>";
$count = strlen($message);
echo "This message \"$message\" contain $count characters <br>";
$message = "The quick brown fox jumps over the lazy dog";
$word_count = str_word_count($message);
echo "This message contains $word_count words <br>";
$message = "Good Morning";
echo str_replace("Morning", "Night", $message);

echo "<br>";

echo "Good" . " Morning";

echo "<br>";

// Calculate Area of Circle
define("PI", 3.14);
$pi = "3.14";
// echo var_dump($pi);
$radius = 6;
$area = $pi * ($radius * $radius);
echo "The area of circle is ", $area;

echo "<br>";

$num = 12345 * 67890;
echo $num;
echo "<br>";
echo substr($num, 3, 1);



echo "<h5>Arithmetic Operators </h5>";

$x = 5;
$y = 4;

$result = $x + $y;
echo "The sum of $x and $y = ", $result;

echo "<br>";
$result = $x - $y;
echo "The difference of $x and $y = ", $result;

echo "<br>";
$result = $x * $y;
echo "The product of $x and $y = ", $result;

echo "<br>";
$result = $x / $y;
echo "The division of $x and $y = ", $result;

echo "<br>";
$result = $x % $y;
echo "The Modolus of $x and $y = ", $result;

// Operator Precedence
echo "<br>";
$result = 1 + 5 * 3 - 1 * (4/3);
echo "The result is ", $result;
echo "<br>";
$result = 1 + 5 * 3 - 1 * (6/3) > 10 || 4 / 2 == 2 && !false;
echo "The result is ", $result ? 'True' : 'False';


// Concatenation Operator
echo "<h5>Concatenation Operators </h5>";
$a = "Welcome ";
$b = "PHP & ";
$c = "Mysql";
echo $a . $b . $c, "<br>";

$greeting = "Hello, ";
$message = "Its nice to meet you!";
echo $greeting . $message;

// Increment / Decrement Operator
echo "<h5>Increment / Decrement Operators </h5>";
$x = 5;
echo ++$x, " First increments then prints <br>";
echo $x, "<br>";
  
$x = 5;
echo $x++, " First prints then increments <br>";
echo $x, "<br>";
  
$x = 5;
echo --$x, " First decrements then prints <br>";
echo $x, "<br>";
  
$x = 5;
echo $x--, " First prints then decrements <br>";
echo $x;
echo "<br>";

echo "<h5>Arithmetic Assignment Operators </h5>";
$x = 78;
echo " x +1 value is : ",$x+=1,"";
echo " x -1 value is : ",$x-=1,"";
echo " x / 1 value is : ",$x/=1,"";
echo " x * 1 value is : ",$x*=1,"";
echo " x % 1 value is : ",$x%=1,"";

echo "<br>";

echo "<h5>Comparison Operators </h5>";
$x = 5;
$y = 4;

echo "Check whether X and Y is equal: " . ($x == $y) . "<br>"; 
echo "Check whether X and Y is not equal: " . ($x != $y) . "<br>"; 

?>