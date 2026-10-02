<?php


echo '<style>
    body {
        font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
        background-color: #f1f5f9;
        color: #1e293b;
        margin: 0;
        padding: 40px 20px;
    }

    .header-box {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: #ffffff;
        padding: 30px 35px;
        border-radius: 16px;
        margin-bottom: 35px;
        box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.25);
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }

    .header-box h1 {
        margin: 0 0 18px 0;
        font-size: 26px;
        font-weight: 700;
        border-bottom: 1px solid rgba(255, 255, 255, 0.25);
        padding-bottom: 12px;
        letter-spacing: 0.5px;
    }

    .student-details {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        font-size: 15px;
    }

    .student-details div {
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.3px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .question-section {
        background: #ffffff;
        border-radius: 16px;
        padding: 30px 35px;
        margin-bottom: 35px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .question-section:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .question-title {
        font-size: 20px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 20px;
        padding: 8px 16px;
        background: #eff6ff;
        border-left: 5px solid #3b82f6;
        border-radius: 6px;
        display: inline-block;
    }

    .result-box {
        background: #f8fafc;
        border-left: 4px solid #2563eb;
        padding: 12px 18px;
        margin: 10px 0;
        border-radius: 0 8px 8px 0;
        font-size: 15px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 18px;
        background: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #cbd5e1;
    }

    th, td {
        padding: 14px 18px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        border-right: 1px solid #e2e8f0;
    }

    th:last-child, td:last-child {
        border-right: none;
    }

    tr:last-child td {
        border-bottom: none;
    }

    th {
        background-color: #1e3a8a;
        color: #ffffff;
        font-weight: 600;
        font-size: 15px;
    }

    tr:nth-child(even) {
        background-color: #f8fafc;
    }

    tr:hover {
        background-color: #f1f5f9;
    }

    .status-pass {
        color: #15803d;
        font-weight: 700;
        background: #dcfce7;
        padding: 5px 14px;
        border-radius: 20px;
        display: inline-block;
        font-size: 14px;
    }

    .status-fail {
        color: #b91c1c;
        font-weight: 700;
        background: #fee2e2;
        padding: 5px 14px;
        border-radius: 20px;
        display: inline-block;
        font-size: 14px;
    }

    h3 {
        color: #1e3a8a;
        margin-top: 22px;
        margin-bottom: 12px;
        font-size: 17px;
    }
</style>';

// ------------------------------------------------------------------
// HEADER SECTION
// ------------------------------------------------------------------
echo '<div class="header-box">';
echo '<h1>PHP Practices - Assignment Week 3</h1>';
echo '<div class="student-details">';
echo '<div>Student Name: Abdulahi Jeilani Mayow</div>';
echo '<div>Student ID: C1230276</div>';
echo '<div>Class: CA234</div>';
echo '</div>';
echo '</div>';


// ==========================================
// QUESTION 1
// ==========================================
echo '<div class="question-section">';
echo '<div class="question-title">Question 1: 1D Array Operations</div>';

// 1. Declare and initialize the array
$numbers = array(5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);

// 2. Print all elements of the array
echo "<strong>All elements of the array:</strong><br>";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br><br>";

// 3. Calculate total of all elements
$total = array_sum($numbers);
echo '<div class="result-box"><strong>Total of all elements:</strong> ' . $total . '</div>';

// 4. Calculate total of even elements
$evenTotal = 0;
foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $evenTotal += $number;
    }
}
echo '<div class="result-box"><strong>Total of even elements:</strong> ' . $evenTotal . '</div>';

// 5. Calculate total of odd elements
$oddTotal = 0;
foreach ($numbers as $number) {
    if ($number % 2 != 0) {
        $oddTotal += $number;
    }
}
echo '<div class="result-box"><strong>Total of odd elements:</strong> ' . $oddTotal . '</div>';

// 6. Find minimum element and its positions
$minimum = min($numbers);
$minPositions = array();
foreach ($numbers as $index => $number) {
    if ($number == $minimum) {
        $minPositions[] = $index;
    }
}
echo '<div class="result-box"><strong>Minimum element:</strong> ' . $minimum . ' (Position(s): ' . implode(", ", $minPositions) . ')</div>';

// 7. Find maximum element and its positions
$maximum = max($numbers);
$maxPositions = array();
foreach ($numbers as $index => $number) {
    if ($number == $maximum) {
        $maxPositions[] = $index;
    }
}
echo '<div class="result-box"><strong>Maximum element:</strong> ' . $maximum . ' (Position(s): ' . implode(", ", $maxPositions) . ')</div>';

echo '</div>'; // End Question 1 Section


// ==========================================
// QUESTION 2
// ==========================================
echo '<div class="question-section">';
echo '<div class="question-title">Question 2: 2D Associative Colors Array</div>';

$colors = array(
    "Light" => array(
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),

    "Normal" => array(
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),

    "Dark" => array(
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    )
);

echo "<table>";
echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $rowName => $row) {
    echo "<tr>";
    echo "<th>" . $rowName . "</th>";
    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo '</div>';

// ==========================================
// QUESTION 3
// ==========================================
echo '<div class="question-section">';
echo '<div class="question-title">Question 3: 2D Square Array Calculations</div>';

$numbers = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);

$rows = count($numbers);
$cols = count($numbers[0]);

echo "<h3>All Elements of the Array</h3>";
echo "<table>";
for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $cols; $j++) {
        echo "<td>" . $numbers[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table><br>";

$oddTotal = 0;
$evenTotal = 0;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        if ($numbers[$i][$j] % 2 != 0) {
            $oddTotal += $numbers[$i][$j];
        } else {
            $evenTotal += $numbers[$i][$j];
        }
    }
}

echo '<div class="result-box"><strong>Total odd elements =</strong> ' . $oddTotal . '</div>';
echo '<div class="result-box"><strong>Total even elements =</strong> ' . $evenTotal . '</div>';

echo "<h3>Total of Each Row</h3>";
for ($i = 0; $i < $rows; $i++) {
    $rowTotal = 0;
    for ($j = 0; $j < $cols; $j++) {
        $rowTotal += $numbers[$i][$j];
    }
    echo '<div class="result-box">Row ' . ($i + 1) . ' total = ' . $rowTotal . '</div>';
}

echo "<h3>Total of Each Column</h3>";
for ($j = 0; $j < $cols; $j++) {
    $columnTotal = 0;
    for ($i = 0; $i < $rows; $i++) {
        $columnTotal += $numbers[$i][$j];
    }
    echo '<div class="result-box">Column ' . ($j + 1) . ' total = ' . $columnTotal . '</div>';
}

$mainDiagonal = 0;
$secondaryDiagonal = 0;
for ($i = 0; $i < $rows; $i++) {
    $mainDiagonal += $numbers[$i][$i];
    $secondaryDiagonal += $numbers[$i][$cols - 1 - $i];
}

echo "<h3>Diagonal Totals</h3>";
echo '<div class="result-box">Main diagonal total = ' . $mainDiagonal . '</div>';
echo '<div class="result-box">Secondary diagonal total = ' . $secondaryDiagonal . '</div>';

$allTotal = 0;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $allTotal += $numbers[$i][$j];
    }
}
echo '<div class="result-box"><strong>Total all elements =</strong> ' . $allTotal . '</div>';

$minimum = $numbers[0][0];
$minPositions = array();
$maximum = $numbers[0][0];
$maxPositions = array();

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        if ($numbers[$i][$j] < $minimum) {
            $minimum = $numbers[$i][$j];
            $minPositions = array("[$i,$j]");
        } elseif ($numbers[$i][$j] == $minimum) {
            $minPositions[] = "[$i,$j]";
        }

        if ($numbers[$i][$j] > $maximum) {
            $maximum = $numbers[$i][$j];
            $maxPositions = array("[$i,$j]");
        } elseif ($numbers[$i][$j] == $maximum) {
            $maxPositions[] = "[$i,$j]";
        }
    }
}

echo '<div class="result-box">Minimum element is: ' . $minimum . ' (Positions: ' . implode(", ", $minPositions) . ')</div>';
echo '<div class="result-box">Maximum element is: ' . $maximum . ' (Positions: ' . implode(", ", $maxPositions) . ')</div>';

echo '</div>'; 



// ==========================================
// QUESTION 4
// ==========================================
echo '<div class="question-section">';
echo '<div class="question-title">Question 4: Student Records Table</div>';

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

echo "<table>";
echo "<tr>";
echo "<th></th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($students as $id => $student) {
    echo "<tr>";
    echo "<td>" . $id . "</td>";
    foreach ($student as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo '</div>';



// ==========================================
// QUESTION 5
// ==========================================
echo '<div class="question-section">';
echo '<div class="question-title">Question 5: Academic Transcript Table</div>';

$transcript = array(
    "Semester 1" => array(
        "Data Science" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "PHP" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "Linux" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )
    ),

    "Semester 2" => array(
        "E-Commerce" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 0,
            "Total" => 45,
            "Status" => "Fail"
        ),

        "UI/UX Designer" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "Oracle" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )
    )
);

echo "<table>";
echo "<tr>";
echo "<th>Semester</th>";
echo "<th>Course</th>";
echo "<th>CW1</th>";
echo "<th>MidTerm</th>";
echo "<th>CW2</th>";
echo "<th>Final</th>";
echo "<th>Total</th>";
echo "<th>Status</th>";
echo "</tr>";

foreach ($transcript as $semester => $courses) {
    $firstRow = true;
    foreach ($courses as $course => $marks) {
        echo "<tr>";
        if ($firstRow) {
            echo "<td rowspan='3' style='vertical-align:middle; font-weight:bold; text-align:center;'>" . $semester . "</td>";
            $firstRow = false;
        }

        echo "<td>" . $course . "</td>";
        echo "<td>" . $marks["CW1"] . "</td>";
        echo "<td>" . $marks["MidTerm"] . "</td>";
        echo "<td>" . $marks["CW2"] . "</td>";
        echo "<td>" . $marks["Final"] . "</td>";
        echo "<td>" . $marks["Total"] . "</td>";
        
        if ($marks["Status"] == "Pass") {
            echo "<td><span class='status-pass'>" . $marks["Status"] . "</span></td>";
        } else {
            echo "<td><span class='status-fail'>" . $marks["Status"] . "</span></td>";
        }

        echo "</tr>";
    }
}
echo "</table>";

echo '</div>'; 

echo '<br><br><br>';

echo '<style>
.assignment-footer {
    width: fit-content;
    margin: 0 auto;
    padding: 14px 30px;
    border: 2px solid #a78bfa;
    border-radius: 999px;
    background: linear-gradient(135deg, #6d28d9, #db2777);
    color: #fff;
    font: 600 16px/1.4 Arial, sans-serif;
    box-shadow: 0 8px 20px rgba(109, 40, 217, .3);
    animation: footer-walk 2.4s ease-in-out infinite;
}
@keyframes footer-walk {
    0%, 100% { transform: translateX(-14px) rotate(-1deg); }
    50% { transform: translateX(14px) rotate(1deg); }
}
@media (prefers-reduced-motion: reduce) {
    .assignment-footer { animation: none; }
}
</style>';
echo '<footer class="assignment-footer">End of Assignment Week 3.</footer>';

?>
