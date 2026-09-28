<h1>Welcome to PHP Practice</h1>

Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quis dolorem doloribus sequi est corrupti optio? Vitae fugiat earum non blanditiis cum quae repudiandae magnam tempore, quis amet voluptas. Minus.
<br>

<?php
// Echo and Print
echo ("This is echo Statement");
echo "<br>";
print ("This is print Statement <br>");
echo "This Echo is without Parentheses";
echo "<br>";

echo "This is an output ", " Two Parameters using echo";
// print "This is an output ", "Two Parameters using print"; Error

echo "<br>";

$x = 5;
$y = 4;

($x < $y) ? print "$x is less than $y" : print "$x is greater than $y";
// ($x < $y) ? echo "$x is less than $y" : echo "$x is greater than $y";

echo "<br>";
$x = 5;
echo "This is the value of $x <br>";
echo 'This is the value of $x';
echo "<br>";

$a = 4;
$b = 5;
$c = $a + $b;

echo "Total of $a and $b = $c";
echo "<br>";
echo 'Total of $a and $b = $c';

// echo `Total of $a and $b = $c`;

$student_number = 200;
$name = "Omar Ali";
$single = true;
$salary = 10.5;

echo "<br>";
Echo "Student Number: $student_number <br>";
Echo "Student name: $name <br>";
Echo "Student single: $single <br>";
Echo "Student salary: $salary <br>";

// echo var_dump($student_number);

Echo "Student Number:", var_dump($student_number), "<br>";
Echo "Student name:", var_dump($name), "<br>";
Echo "Student single:", var_dump($single), "<br>";
Echo "Student salary:", var_dump($salary), "<br>";
?>