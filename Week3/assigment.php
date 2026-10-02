<?php

$students = array(
    "CA221" => array(
        "Name" => "Mohamed Ahmed",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ),

    "CA223" => array(
        "Name" => "Ahmed Ali Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ),

    "CA224" => array(
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    )
);

echo "<table border='1'>";

echo "<tr>";
echo "<th style='background-color: lightgray;'></th>";
echo "<th style='background-color: lightgray;'>Name</th>";
echo "<th style='background-color: lightgray;'>Phone</th>";
echo "<th style='background-color: lightgray;'>Address</th>";
echo "</tr>";

foreach ($students as $id => $student) {

    echo "<tr>";
    echo "<td>" . $id . "</td>";

    foreach ($student as $key => $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>