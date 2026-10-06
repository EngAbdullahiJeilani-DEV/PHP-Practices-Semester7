<?php

echo "<h1>PHP Assignment 2</h1>";

/* =====================================================
   QUESTION 1
   One-Dimensional Array
   ===================================================== */

echo "<h2>Question 1</h2>";

$array = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

echo "All Elements: ";

foreach ($array as $value) {
    echo $value . " ";
}

echo "<br><br>";

$total = 0;
$evenTotal = 0;
$oddTotal = 0;

foreach ($array as $value) {

    $total += $value;

    if ($value % 2 == 0) {
        $evenTotal += $value;
    } else {
        $oddTotal += $value;
    }
}

echo "Total of all elements: " . $total . "<br>";
echo "Total of even elements: " . $evenTotal . "<br>";
echo "Total of odd elements: " . $oddTotal . "<br>";

$min = min($array);

echo "Minimum element: " . $min . "<br>";
echo "Minimum positions: ";

foreach ($array as $index => $value) {
    if ($value == $min) {
        echo $index . " ";
    }
}

echo "<br>";

$max = max($array);

echo "Maximum element: " . $max . "<br>";
echo "Maximum positions: ";

foreach ($array as $index => $value) {
    if ($value == $max) {
        echo $index . " ";
    }
}

echo "<br><br>";


/* =====================================================
   QUESTION 2
   Two-Dimensional Associative Array
   ===================================================== */

echo "<h2>Question 2</h2>";

$colors = [

    "Light" => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],

    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],

    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

echo "Red&nbsp;&nbsp;&nbsp;&nbsp;Green&nbsp;&nbsp;&nbsp;&nbsp;Blue<br>";

foreach ($colors as $rowName => $row) {

    echo $rowName . ": ";

    foreach ($row as $value) {
        echo $value . "&nbsp;&nbsp;&nbsp;&nbsp;";
    }

    echo "<br>";
}

echo "<br>";


/* =====================================================
   QUESTION 3
   Square Two-Dimensional Array
   ===================================================== */

echo "<h2>Question 3</h2>";

$array2 = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6]
];

echo "All Elements:<br>";

foreach ($array2 as $row) {

    foreach ($row as $value) {
        echo $value . "&nbsp;&nbsp;";
    }

    echo "<br>";
}

echo "<br>";

$oddTotal = 0;
$evenTotal = 0;
$total = 0;

foreach ($array2 as $row) {

    foreach ($row as $value) {

        $total += $value;

        if ($value % 2 == 0) {
            $evenTotal += $value;
        } else {
            $oddTotal += $value;
        }
    }
}

echo "Total of odd elements: " . $oddTotal . "<br>";
echo "Total of even elements: " . $evenTotal . "<br>";

echo "<br>";

echo "Total of each row:<br>";

foreach ($array2 as $index => $row) {

    $rowTotal = 0;

    foreach ($row as $value) {
        $rowTotal += $value;
    }

    echo "Row " . ($index + 1) . " = " . $rowTotal . "<br>";
}

echo "<br>";

echo "Total of each column:<br>";

$columns = count($array2[0]);

for ($column = 0; $column < $columns; $column++) {

    $columnTotal = 0;

    foreach ($array2 as $row) {
        $columnTotal += $row[$column];
    }

    echo "Column " . ($column + 1) . " = " . $columnTotal . "<br>";
}

echo "<br>";

$mainDiagonal = 0;

for ($i = 0; $i < count($array2); $i++) {
    $mainDiagonal += $array2[$i][$i];
}

echo "Main diagonal total: " . $mainDiagonal . "<br>";

$otherDiagonal = 0;
$size = count($array2);

for ($i = 0; $i < $size; $i++) {
    $otherDiagonal += $array2[$i][$size - 1 - $i];
}

echo "Other diagonal total: " . $otherDiagonal . "<br>";

echo "Total of all elements: " . $total . "<br>";

$flatArray = [];

foreach ($array2 as $row) {
    foreach ($row as $value) {
        $flatArray[] = $value;
    }
}

$min = min($flatArray);

echo "Minimum element: " . $min . "<br>";
echo "Minimum positions: ";

foreach ($array2 as $i => $row) {

    foreach ($row as $j => $value) {

        if ($value == $min) {
            echo "Row " . ($i + 1) .
                 ", Column " . ($j + 1) . " | ";
        }
    }
}

echo "<br>";

$max = max($flatArray);

echo "Maximum element: " . $max . "<br>";
echo "Maximum positions: ";

foreach ($array2 as $i => $row) {

    foreach ($row as $j => $value) {

        if ($value == $max) {
            echo "Row " . ($i + 1) .
                 ", Column " . ($j + 1) . " | ";
        }
    }
}

echo "<br><br>";


/* =====================================================
   QUESTION 4
   Student Information
   ===================================================== */

echo "<h2>Question 4</h2>";

$students = [

    "CA221" => [
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],

    "CA223" => [
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],

    "CA224" => [
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]
];

foreach ($students as $id => $student) {

    echo "Student ID: " . $id . "<br>";
    echo "Name: " . $student["Name"] . "<br>";
    echo "Phone: " . $student["Phone"] . "<br>";
    echo "Address: " . $student["Address"] . "<br>";
    echo "<br>";
}


/* =====================================================
   QUESTION 5
   Student Transcript
   ===================================================== */

echo "<h2>Question 5</h2>";

$transcript = [

    "Semester 1" => [

        "subject1" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ],

        "subject2" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ],

        "subject3" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ]
    ],

    "Semester 2" => [

        "subject1" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 0,
            "Total" => 45,
            "Status" => "Fail"
        ],

        "subject2" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ],

        "subject3" => [
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ]
    ]
];

foreach ($transcript as $semester => $courses) {

    echo "<strong>" . $semester . "</strong><br>";

    foreach ($courses as $course => $data) {

        echo "Course: " . $course . "<br>";
        echo "CW1: " . $data["CW1"] . "<br>";
        echo "MidTerm: " . $data["MidTerm"] . "<br>";
        echo "CW2: " . $data["CW2"] . "<br>";
        echo "Final: " . $data["Final"] . "<br>";
        echo "Total: " . $data["Total"] . "<br>";
        echo "Status: " . $data["Status"] . "<br>";
        echo "<br>";
    }
}

?>