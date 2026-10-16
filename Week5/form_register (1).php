<?php

if (isset($_POST["submit"])) {

$nameErr = "";
$emailErr = "";
$success = true;


if (empty($_POST["fullname"])) {
    $success = false;
    $nameErr = "Please fill name required fields<br>";
}
if (empty($_POST["email"])) {
    $success = false;
    $emailErr = "Please fill email required fields<br>";
}
    
if ($success) {
echo "<h2>Student Information</h2>";
echo "Fullname: " . $_POST["fullname"] . "<br>";
echo "Email: " . $_POST["email"] . "<br>";
echo "Place of Birth: " . $_POST["pob"] . "<br>";

if (!empty($_POST["gender"]))
echo "Gender: " . $_POST["gender"] . "<br>";

echo "Faculty: " . $_POST["faculty"] . "<br>";

echo "Languages: ";
if(isset($_POST["languages"])) {
    foreach ($_POST["languages"] as $value) 
        echo "$value, ";
}
echo "<br>";

echo "Comment: " . $_POST["comment"] . "<br>";

}


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        .error {
            color: red;
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
<input type="text" name="fullname"  value="<?php if(isset($_POST["fullname"]) && !$success) echo $_POST["fullname"]; ?>"><br>
<span class="error"><?php if (isset($nameErr)) echo $nameErr; ?></span><br>

<label for="">Email: </label>
<input type="email" name="email"  value="<?php if(isset($_POST["email"]) && !$success) echo $_POST["email"]; ?>"><br>
<span class="error"><?php  if (isset($emailErr)) echo $emailErr; ?></span><br>

<label for="">Place of Birth: </label>
<input type="text" name="pob" id="" value="<?php if(isset($_POST["pob"]) && !$success) echo $_POST["pob"]; ?>"> <br><br>

<label for="">Gender: </label>
<input type="radio" name="gender" value="male" <?php if(isset($_POST["gender"]) && !$success && $_POST["gender"] == "male") echo "checked"; ?>> Male
<input type="radio" name="gender" value="female" <?php if(isset($_POST["gender"]) && !$success && $_POST["gender"] == "female") echo "checked"; ?>> Female <br><br>

<label for="">Faculty: </label>
<select name="faculty" id="">
    <option value="computer" <?php if(isset($_POST["faculty"]) && !$success && $_POST["faculty"] == "computer") echo "selected"; ?>>Computer and IT</option>
    <option value="medicine" <?php if(isset($_POST["faculty"]) && !$success && $_POST["faculty"] == "medicine") echo "selected"; ?>>Medicine and Health Science</option>
    <option value="engineering" <?php if(isset($_POST["faculty"]) && !$success && $_POST["faculty"] == "engineering") echo "selected"; ?>>Engineering</option>
    <option value="ecom" <?php if(isset($_POST["faculty"]) && !$success && $_POST["faculty"] == "ecom") echo "selected"; ?>>Business</option>
</select> <br><br>

<label for="">Languages: </label>
<input type="checkbox" name="languages[]" value="Somali" <?php if(isset($_POST["languages"]) && !$success && in_array("Somali", $_POST["languages"])) echo "checked"; ?>>Somali
<input type="checkbox" name="languages[]" value="English" <?php if(isset($_POST["languages"]) && !$success && in_array("English", $_POST["languages"])) echo "checked"; ?>>English
<input type="checkbox" name="languages[]" value="Arabic" <?php if(isset($_POST["languages"]) && !$success && in_array("Arabic", $_POST["languages"])) echo "checked"; ?>>Arabic
<input type="checkbox" name="languages[]" value="Chinese" <?php if(isset($_POST["languages"]) && !$success && in_array("Chinese", $_POST["languages"])) echo "checked"; ?>>Chinese <br><br>

<label for="">Comment: </label>
<textarea name="comment" id="" rows="4" cols="30"><?php if(isset($_POST["comment"]) && !$success) echo $_POST["comment"]; ?></textarea><br><br>

<input type="submit" name="submit" value="Register">
<input type="reset" name="reset" value="Clear">

</fieldset>

</form>

</body>
</html>


