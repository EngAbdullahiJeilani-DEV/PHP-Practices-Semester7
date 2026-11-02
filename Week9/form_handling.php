<?php

header("Content-Type: application/json");

$success = false;
$errMsg = "";
$nameErr = "";
$emailErr = "";
$facultyErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $success = true;

    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $pob = trim($_POST["pob"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $faculty = $_POST["faculty"] ?? "";
    $languages = $_POST["languages"] ?? [];
    $comment = trim($_POST["comment"] ?? "");

    if (empty($fullname)) {
        $success = false;
        $nameErr = "* Please fill fullname field!";
    }

    if (empty($email)) {
        $success = false;
        $emailErr = "* Please enter a valid email!";
    }

    if (empty($faculty)) {
        $success = false;
        $facultyErr = "* Please select faculty!";
    }

    if (!$success) {
        $errMsg = "Please fill all required fields.";
    }
}


// If validation is successful
if ($success) {

    // Prepare student data
    $student = [
        "fullname" => $fullname,
        "email" => $email,
        "pob" => $pob,
        "gender" => $gender,
        "faculty" => $faculty,
        "languages" => implode(", ", $languages),
        "comment" => $comment
    ];

    // Return success response
    echo json_encode([
        "success" => true,
        "message" => "Student registered successfully!",
        "data" => $student
    ]);

} else {

    // Return error response
    echo json_encode([
        "success" => false,
        "message" => $errMsg,
        "errors" => [
            "fullname" => $nameErr,
            "email" => $emailErr,
            "faculty" => $facultyErr
        ]
    ]);

}


?>