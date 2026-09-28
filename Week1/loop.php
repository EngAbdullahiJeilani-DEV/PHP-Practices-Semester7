<?php

// While Loop Print 1 - 15
$count = 1;
while ($count <= 15) {
    echo "$count, ";
    $count++;
}

echo "<br>";

//Do While Loop 12 Multiplication Table
$i = 1;
do {
    echo "$i * 12 = " . $i * 12 . "<br>";
    $i++;
} while ($i <= 12);

echo "<br>";

// For Loop Factorial of 5!
$result = 1;

for ($n = 5; $n >= 1; $n--) {
    $result = $result * $n;
}

echo "The Factorial of 5! = " . $result;

echo "<br>";

// Print Factorial by 5!
$n = 5;
$result = 1;

do {
    $result = $result * $n; 

    if ($n == 1){
        echo "$n";
        break;
    }
    else {
        echo "$n * ";
    }   
    $n--;
} while ($n >= 1);

echo "<br>";
echo "The Factorial of 5! = " . $result;

echo "<br>";

$count = 1;
while ($count <= 15) {
    echo "$count, ";
    if ($count == 10)
    break;
    $count++;
}

echo "<br>";

// Print 1 - 15 with Odd Numbers
$count = 0;

do {
    $count++;
    if ($count % 2 == 0) {
        continue;
    }

    echo "$count, ";

} while ($count <= 15);

echo "<br>";

// Nested Loop 3 Week and 7 Days
$week = 3;
$day = 7;

for ($i = 1; $i <= $week; $i++) {

    echo "Week " . $i . ":<br>";

    for ($j = 1; $j <= $day; $j++) {
        echo "&nbsp; &nbsp; Day " . $j . "<br>";
    }
}

echo "<br>";

// Print 5 triangle Stars
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

?>