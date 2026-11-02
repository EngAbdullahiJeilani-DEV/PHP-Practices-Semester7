<?php

header("Content-Type: application/json");

$success = false;
$errMsg = "";

$nameErr = "";
$emailErr = "";
$genderErr = "";
$positionErr = "";
$educationErr = "";
$experienceErr = "";
$skillsErr = "";
$commentsErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $success = true;

    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $position = $_POST["position"] ?? "";
    $education = $_POST["education"] ?? "";
    $experience = $_POST["experience"] ?? "";
    $skills = $_POST["skills"] ?? [];
    $comments = trim($_POST["comments"] ?? "");

    if (empty($fullname)) {
        $success = false;
        $nameErr = "Please fill fullname field!";
    }

    if (empty($email)) {
        $success = false;
        $emailErr = "Please fill email field!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $success = false;
        $emailErr = "Please enter a valid email!";
    }

    if (empty($gender)) {
        $success = false;
        $genderErr = "Please select gender!";
    }

    if (empty($position)) {
        $success = false;
        $positionErr = "Please select job position!";
    }

    if (empty($education)) {
        $success = false;
        $educationErr = "Please select education level!";
    }

    if (empty($experience)) {
        $success = false;
        $experienceErr = "Please select years of experience!";
    }

    if (empty($skills)) {
        $success = false;
        $skillsErr = "Please select at least one skill!";
    }

    if (!$success) {
        $errMsg = "Please correct the errors in the form.";
    }

} else {
    $errMsg = "Please submit the form.";
}

if ($success) {

    $application = [
        "fullname" => $fullname,
        "email" => $email,
        "gender" => $gender,
        "position" => $position,
        "education" => $education,
        "experience" => $experience,
        "skills" => implode(", ", $skills),
        "comments" => $comments
    ];

    echo json_encode([
        "success" => true,
        "message" => "Application submitted successfully!",
        "data" => $application
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => $errMsg,
        "errors" => [
            "fullname" => $nameErr,
            "email" => $emailErr,
            "gender" => $genderErr,
            "position" => $positionErr,
            "education" => $educationErr,
            "experience" => $experienceErr,
            "skills" => $skillsErr
        ]
    ]);
}

?>