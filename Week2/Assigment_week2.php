<?php

// ===================================================
// Question 1: largest or smallest Q1.php
// ===================================================
echo "<h3 style='color: blue;'>Question 1: Largest or Smallest Number</h3>";

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
echo "The smallest number is: $smallest<br>"; 

echo "<br><br>";

// ===================================================
// Question 2: Divisible Q2.PHP
// ===================================================
echo "<h3 style='color: blue;'>Question 2: Divisible by 3 and 5</h3>";

$num = 15;

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "The number is divisible by both 3 and 5<br>";
} elseif ($num % 3 == 0) {
    echo "The number is divisible by 3<br>";
} elseif ($num % 5 == 0) {
    echo "The number is divisible by 5<br>";
} else {
    echo "The number is divisible by neither 3 nor 5<br>";
}

echo "<br><br>";

// ===================================================
// Question 3: OddNumbers Q3.php
// ===================================================
echo "<h3 style='color: blue;'>Question 3: Odd & Even Numbers</h3>";

echo "Odd numbers from 2 to 20:<br>";

for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

echo "<br><br>";

echo "Even numbers from 35 to 7:<br>";

for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}    

echo "<br><br>";

// ===================================================
// Question 4: divisible q4.php
// ===================================================
echo "<h3 style='color: blue;'>Question 4: Numbers Divisible by 2 and 5 (50 to 2)</h3>";

for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }
}

echo "<br><br>";

// ===================================================
// Question 5: reverse q5.php
// ===================================================
echo "<h3 style='color: blue;'>Question 5: Reverse a Number</h3>";

$num = 12345;
$reverse = 0;

while ($num > 0) {
    $digit = $num % 10;
    $reverse = ($reverse * 10) + $digit;
    $num = (int)($num / 10);
}

echo "The reverse number is: " . $reverse . "<br>";

echo "<br><br>";

// ===================================================
// Question 6: lcm q6.php
// ===================================================
echo "<h3 style='color: blue;'>Question 6: LCM of Two Numbers</h3>";

$num1 = 8;
$num2 = 12;

for ($lcm = 1; ; $lcm++) {
    if ($lcm % $num1 == 0 && $lcm % $num2 == 0) {
        break;
    }
}

echo "LCM of $num1 and $num2 = $lcm<br>";

echo "<br><br>";

// ===================================================
// Question 7: hcf q7.php
// ===================================================
echo "<h3 style='color: blue;'>Question 7: HCF of Two Numbers</h3>";

$num1 = 18;
$num2 = 24;

$hcf = 1;

for ($i = 1; $i <= $num1 && $i <= $num2; $i++) {
    if ($num1 % $i == 0 && $num2 % $i == 0) {
        $hcf = $i;
    }
}

echo "HCF of $num1 and $num2 = $hcf<br>";

echo "<br><br>";

// ===================================================
// Question 8: multiplication_table Q8.php
// ===================================================
echo "<h3 style='color: blue;'>Question 8: Multiplication Table</h3>";

echo "<style>
    body {
        font-family: Arial;
        text-align: center;
        background-color: #f2f2f2;
    }

    h2 {
        color: #333;
    }

    table {
        margin: auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    th {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
    }

    td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    td:hover {
        background-color: #dff0d8;
    }
</style>";

echo "<h2>Multiplication Table</h2>";

echo "<table>";

for ($i = 1; $i <= 12; $i++) {
    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {
        if ($i == 1 || $j == 1) {
            echo "<th>" . ($i * $j) . "</th>";
        } else {
            echo "<td>" . ($i * $j) . "</td>";
        }
    }

    echo "</tr>";
}

echo "</table>";

echo "<br><br>";

// ===================================================
// Question 9: primeNumberOrNot Q9.php
// ===================================================
echo "<h3 style='color: blue;'>Question 9: Check Prime Number</h3>";

$num = 17;
$count = 0;

for ($i = 1; $i <= $num; $i++) {
    if ($num % $i == 0) {
        $count++;
    }
}

if ($count == 2) {
    echo "$num is a prime number<br>";
} else {
    echo "$num is a non-prime number<br>";
}

echo "<br><br>";

// ===================================================
// Question 10: primeNumFrom10_50 Q10.php
// ===================================================
echo "<h3 style='color: blue;'>Question 10: Prime Numbers from 10 to 50</h3>";

for ($num = 10; $num <= 50; $num++) {
    $count = 0;

    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $count++;
        }
    }

    if ($count == 2) {
        echo $num . " ";
    }
}

echo "<br><br>";

?>
