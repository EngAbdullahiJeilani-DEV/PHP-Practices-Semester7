<?php

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

?>