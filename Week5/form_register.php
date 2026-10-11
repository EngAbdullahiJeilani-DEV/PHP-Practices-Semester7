<?php

if (isset($_POST["submit"])) {

$errMsg = "";

if (empty($_POST["fullname"]))
    $errMsg .= "<font color='red'>Please fill name required fields<br></font><br><br>";
if (empty($_POST["email"]))
    $errMsg .= "<font color='red'>Please fill email required fields<br></font>";

echo "<div class='display-box'>";
echo "<h2>Student Information</h2>";

echo "<strong>Fullname:</strong> " . $_POST["fullname"] . "<br>";
echo "<strong>Email:</strong> " . $_POST["email"] . "<br>";
echo "<strong>Place of Birth:</strong> " . $_POST["pob"] . "<br>";

if (!empty($_POST["gender"]))
echo "<strong>Gender:</strong> " . $_POST["gender"] . "<br>";

echo "<strong>Faculty:</strong> " . $_POST["faculty"] . "<br>";

echo "<strong>Languages:</strong> ";
if(isset($_POST["languages"])) {
    foreach ($_POST["languages"] as $value) 
        echo "$value, ";
}
echo "<br>";

echo "<strong>Comment:</strong> " . $_POST["comment"] . "<br>";
echo "</div>";


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, "Helvetica Neue", sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            margin: 0;
            padding: 40px 20px;
        }

        .display-box {
            max-width: 580px;
            margin: 0 auto 30px auto;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-left: 6px solid #2563eb;
            border-radius: 12px;
            padding: 25px 32px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            font-size: 15px;
            line-height: 2.1;
            color: #1e293b;
        }

        .display-box h2 {
            margin: 0 0 16px 0;
            color: #1e3a8a;
            font-size: 22px;
            font-weight: bold;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
        }

        .display-box strong {
            color: #334155;
            display: inline-block;
            min-width: 140px;
        }

        form {
            max-width: 580px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            padding: 30px 35px 35px;
        }

        h1 {
            color: #1e3a8a;
            font-size: 24px;
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e2e8f0;
        }

        fieldset {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #f8fafc;
            padding: 22px 25px;
            margin: 0;
        }

        legend {
            font-weight: bold;
            font-size: 14px;
            color: #ffffff;
            background-color: #2563eb;
            padding: 5px 14px;
            border-radius: 6px;
        }

        font[color='red'] {
            font-weight: 600;
            display: inline-block;
            margin-bottom: 6px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            color: #334155;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            background-color: #ffffff;
            color: #1e293b;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        input[type="radio"],
        input[type="checkbox"] {
            accent-color: #2563eb;
            cursor: pointer;
            margin-left: 6px;
            margin-right: 4px;
            vertical-align: middle;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            margin-top: 10px;
            transition: background-color 0.2s;
        }

        input[type="submit"] {
            background-color: #2563eb;
            color: #ffffff;
        }

        input[type="submit"]:hover {
            background-color: #1d4ed8;
        }

        input[type="reset"] {
            background-color: #e2e8f0;
            color: #334155;
            margin-left: 8px;
        }

        input[type="reset"]:hover {
            background-color: #cbd5e1;
        }
    </style>
</head>
<body>
    
<form method="post" action="">

<h1>Student Registration Form</h1>

<fieldset>
    <legend>Personal Info </legend>

    <?php
       if (isset($errMsg)) echo $errMsg . "<br>";
    ?>

<label for="">Fullname: </label>
<input type="text" name="fullname"><br><br>

<label for="">Email: </label>
<input type="email" name="email"><br><br>

<label for="">Place of Birth: </label>
<input type="text" name="pob" id=""> <br><br>

<label for="">Gender: </label>
<input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="female"> Female <br><br>

<label for="">Faculty: </label>
<select name="faculty" id="">
    <option value="computer">Computer and IT</option>
    <option value="medicine">Medicine and Health Science</option>
    <option value="engineering">Engineering</option>
    <option value="ecom">Business</option>
</select> <br><br>

<label for="">Languages: </label>
<input type="checkbox" name="languages[]" value="Somali">Somali
<input type="checkbox" name="languages[]" value="English">English
<input type="checkbox" name="languages[]" value="Arabic">Arabic
<input type="checkbox" name="languages[]" value="Chinese">Chinese <br><br>

<label for="">Comment: </label>
<textarea name="comment" id="" rows="4" cols="30"></textarea><br><br>

<input type="submit" name="submit" value="Register">
<input type="reset" name="reset" value="Clear">

</fieldset>

</form>

</body>
</html>
