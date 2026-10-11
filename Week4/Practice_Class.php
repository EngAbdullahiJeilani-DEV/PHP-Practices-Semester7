<?php

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
        $total = $marks["Total"];
        if ($total >= 50 && $total <= 60) {
            $rowColor = "yellow";
        } elseif ($total < 50) {
            $rowColor = "red";
        } else {
            $rowColor = "white";
        }
        echo "<tr style='background-color: $rowColor;'>";

        if ($firstRow) {
            echo "<td rowspan='3' style='vertical-align:middle; font-weight:bold; text-align:center;'>"
                . $semester .
                "</td>";

            $firstRow = false;
        }

        echo "<td>" . $course . "</td>";
        echo "<td>" . $marks["CW1"] . "</td>";
        echo "<td>" . $marks["MidTerm"] . "</td>";
        echo "<td>" . $marks["CW2"] . "</td>";
        echo "<td>" . $marks["Final"] . "</td>";

        echo "<td style='color: black; font-weight: bold;'>"
            . $total .
            "</td>";

        // Status
        if ($marks["Status"] == "Pass") {

            echo "<td>
                    <span class='status-pass'>" .
                    $marks["Status"] .
                    "</span>
                  </td>";

        } else {

            echo "<td>
                    <span class='status-fail'>" .
                    $marks["Status"] .
                    "</span>
                  </td>";
        }

        echo "</tr>";
    }
}

echo "</table>";

echo '</div>';

?>