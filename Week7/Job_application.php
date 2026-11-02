<?php

$success = false;

$nameErr = "";
$emailErr = "";
$positionErr = "";
$educationErr = "";
$experienceErr = "";
$skillsErr = "";
$cvErr = "";
$commentErr = "";
$certificationsErr = "";

$cvName = "";
$certificationNames = array();

if (isset($_POST["submit"])) {

    // Full Name
    if (empty($_POST["fullname"])) {
        $nameErr = "Please fill fullname field!";
    }

    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Please fill email field!";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please enter a valid email!";
    }

    // Job Position
    if (empty($_POST["position"])) {
        $positionErr = "Please select job position!";
    }

    // Education
    if (empty($_POST["education"])) {
        $educationErr = "Please select education level!";
    }

    // Experience
    if (empty($_POST["experience"])) {
        $experienceErr = "Please select years of experience!";
    }

    // Skills
    if (empty($_POST["skills"])) {
        $skillsErr = "Please select at least one skill!";
    }

    // CV Upload
    if (empty($_FILES["cv"]["name"])) {
        $cvErr = "Please upload your CV!";
    } elseif ($_FILES["cv"]["size"] > 2097152) {
        $cvErr = "CV must not exceed 2 MB!";
    } elseif ($_FILES["cv"]["type"] != "application/pdf") {
        $cvErr = "Only PDF files are allowed for CV!";
    }

    // Certifications Upload
    if (
        !isset($_FILES["certifications"]["name"][0]) ||
        $_FILES["certifications"]["name"][0] === ""
    ) {
        $certificationsErr = "Please upload at least one certification!";
    } else {

        for ($i = 0; $i < count($_FILES["certifications"]["name"]); $i++) {

            $certName = $_FILES["certifications"]["name"][$i];
            $certSize = $_FILES["certifications"]["size"][$i];
            $certType = $_FILES["certifications"]["type"][$i];

            if ($certSize > 2097152) {
                $certificationsErr = "Each certification must not exceed 2 MB!";
                break;
            }

            if (
                $certType != "image/jpeg" &&
                $certType != "image/png" &&
                $certType != "application/pdf"
            ) {
                $certificationsErr = "Only JPG, JPEG, PNG and PDF files are allowed!";
                break;
            }
        }
    }

    // Upload Files if there are no validation errors
    if (
        $nameErr == "" &&
        $emailErr == "" &&
        $positionErr == "" &&
        $educationErr == "" &&
        $experienceErr == "" &&
        $skillsErr == "" &&
        $cvErr == "" &&
        $certificationsErr == ""
    ) {

        // Create CV Folder
        if (!is_dir("uploads/cv")) {
            mkdir("uploads/cv", 0755, true);
        }

        // Upload CV
        $cvName = $_FILES["cv"]["name"];
        $cvTemp = $_FILES["cv"]["tmp_name"];
        $cvFolder = "uploads/cv/" . $cvName;

        if (move_uploaded_file($cvTemp, $cvFolder)) {

            // Create Certifications Folder
            if (!is_dir("uploads/certifications")) {
                mkdir("uploads/certifications", 0755, true);
            }

            // Upload Certifications
            if (!empty($_FILES["certifications"]["name"][0])) {

                for ($i = 0; $i < count($_FILES["certifications"]["name"]); $i++) {

                    $certName = $_FILES["certifications"]["name"][$i];
                    $certTemp = $_FILES["certifications"]["tmp_name"][$i];
                    $certFolder = "uploads/certifications/" . $certName;

                    if (move_uploaded_file($certTemp, $certFolder)) {
                        $certificationNames[] = $certName;
                    } else {
                        $certificationsErr = "Certification upload failed!";
                        break;
                    }
                }
            }

            if ($certificationsErr == "") {
                $success = true;
            }

        } else {
            $cvErr = "CV upload failed!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Job Application System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        .job-application-container {
            max-width: 760px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5 mb-5 job-application-container">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h3>Job Application Form</h3>
            </div>

            <div class="card-body">

                <?php if ($success) { ?>

                    <div class="alert alert-success">
                        Application submitted successfully!
                    </div>

                    <h4 class="mb-3">Application Details</h4>

                    <table class="table table-bordered">

                        <tr>
                            <th>Full Name</th>
                            <td><?php echo $_POST["fullname"]; ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?php echo $_POST["email"]; ?></td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td>
                                <?php
                                if (isset($_POST["gender"])) {
                                    echo $_POST["gender"];
                                } else {
                                    echo "Not selected";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Job Position</th>
                            <td><?php echo $_POST["position"]; ?></td>
                        </tr>

                        <tr>
                            <th>Education Level</th>
                            <td><?php echo $_POST["education"]; ?></td>
                        </tr>

                        <tr>
                            <th>Years of Experience</th>
                            <td><?php echo $_POST["experience"]; ?></td>
                        </tr>

                        <tr>
                            <th>Skills</th>
                            <td>
                                <?php
                                foreach ($_POST["skills"] as $skill) {
                                    echo $skill . "<br>";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>CV</th>
                            <td>
                                <a href="uploads/cv/<?php echo $cvName; ?>" target="_blank">
                                    <?php echo $cvName; ?>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th>Certifications</th>
                            <td>
                                <?php
                                if (count($certificationNames) > 0) {
                                    foreach ($certificationNames as $certification) {
                                        echo $certification . "<br>";
                                    }
                                } else {
                                    echo "No certifications uploaded";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Additional Comments</th>
                            <td>
                                <?php
                                if (!empty($_POST["comments"])) {
                                    echo $_POST["comments"];
                                } else {
                                    echo "No comments";
                                }
                                ?>
                            </td>
                        </tr>

                    </table>

                    <a href="job_application.php" class="btn btn-primary">
                        New Application
                    </a>

                <?php } else { ?>

                    <form action="" method="POST" enctype="multipart/form-data" id="jobForm">

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label">
                                Full Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" class="form-control"
                                   name="fullname" id="fullname"
                                   value="<?php if (isset($_POST["fullname"])) { echo $_POST["fullname"]; } ?>">

                            <div id="nameError" class="text-danger small">
                                <?php echo $nameErr; ?>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email" class="form-control"
                                   name="email" id="email"
                                   value="<?php if (isset($_POST["email"])) { echo $_POST["email"]; } ?>">

                            <div id="emailError" class="text-danger small">
                                <?php echo $emailErr; ?>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label">Gender</label>

                            <div class="form-check">
                                <input type="radio" class="form-check-input"
                                       name="gender" id="male" value="Male"
                                       <?php if (isset($_POST["gender"]) && $_POST["gender"] == "Male") { echo "checked"; } ?>>
                                <label for="male" class="form-check-label">Male</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input"
                                       name="gender" id="female" value="Female"
                                       <?php if (isset($_POST["gender"]) && $_POST["gender"] == "Female") { echo "checked"; } ?>>
                                <label for="female" class="form-check-label">Female</label>
                            </div>

                            <div id="genderError" class="text-danger small"></div>
                        </div>

                        <!-- Job Position -->
                        <div class="mb-3">
                            <label for="position" class="form-label">
                                Job Position <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="position" id="position">

                                <option value="">Select Job Position</option>

                                <option value="Web Developer" <?php if (!$success && isset($_POST["position"]) && $_POST["position"] == "Web Developer") { echo "selected"; } ?>>
                                    Web Developer
                                </option>

                                <option value="Software Developer" <?php if (!$success && isset($_POST["position"]) && $_POST["position"] == "Software Developer") { echo "selected"; } ?>>
                                    Software Developer
                                </option>

                                <option value="UI/UX Designer" <?php if (!$success && isset($_POST["position"]) && $_POST["position"] == "UI/UX Designer") { echo "selected"; } ?>>
                                    UI/UX Designer
                                </option>

                                <option value="Database Administrator" <?php if (!$success && isset($_POST["position"]) && $_POST["position"] == "Database Administrator") { echo "selected"; } ?>>
                                    Database Administrator
                                </option>

                            </select>

                            <div id="positionError" class="text-danger small">
                                <?php echo $positionErr; ?>
                            </div>
                        </div>

                        <!-- Education -->
                        <div class="mb-3">
                            <label for="education" class="form-label">
                                Education Level <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="education" id="education">

                                <option value="">Select Education Level</option>

                                <option value="High School" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "High School") { echo "selected"; } ?>>
                                    High School
                                </option>

                                <option value="Diploma" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "Diploma") { echo "selected"; } ?>>
                                    Diploma
                                </option>

                                <option value="Bachelor Degree" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "Bachelor Degree") { echo "selected"; } ?>>
                                    Bachelor Degree
                                </option>

                                <option value="Master Degree" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "Master Degree") { echo "selected"; } ?>>
                                    Master Degree
                                </option>

                            </select>

                            <div id="educationError" class="text-danger small">
                                <?php echo $educationErr; ?>
                            </div>
                        </div>

                        <!-- Experience -->
                        <div class="mb-3">
                            <label for="experience" class="form-label">
                                Years of Experience <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="experience" id="experience">

                                <option value="">Select Experience</option>

                                <option value="0-1" <?php if (!$success && isset($_POST["experience"]) && $_POST["experience"] == "0-1") { echo "selected"; } ?>>
                                    0-1 Years
                                </option>

                                <option value="1-3" <?php if (!$success && isset($_POST["experience"]) && $_POST["experience"] == "1-3") { echo "selected"; } ?>>
                                    1-3 Years
                                </option>

                                <option value="3-5" <?php if (!$success && isset($_POST["experience"]) && $_POST["experience"] == "3-5") { echo "selected"; } ?>>
                                    3-5 Years
                                </option>

                                <option value="5+" <?php if (!$success && isset($_POST["experience"]) && $_POST["experience"] == "5+") { echo "selected"; } ?>>
                                    5+ Years
                                </option>

                            </select>

                            <div id="experienceError" class="text-danger small">
                                <?php echo $experienceErr; ?>
                            </div>
                        </div>

                        <!-- Skills -->
                        <div class="mb-3">
                            <label class="form-label">
                                Skills <span class="text-danger">*</span>
                            </label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" value="PHP"
                                       <?php if (!$success && isset($_POST["skills"]) && in_array("PHP", $_POST["skills"])) { echo "checked"; } ?>>
                                <label class="form-check-label">PHP</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" value="HTML"
                                       <?php if (!$success && isset($_POST["skills"]) && in_array("HTML", $_POST["skills"])) { echo "checked"; } ?>>
                                <label class="form-check-label">HTML</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" value="CSS"
                                       <?php if (!$success && isset($_POST["skills"]) && in_array("CSS", $_POST["skills"])) { echo "checked"; } ?>>
                                <label class="form-check-label">CSS</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" value="JavaScript"
                                       <?php if (!$success && isset($_POST["skills"]) && in_array("JavaScript", $_POST["skills"])) { echo "checked"; } ?>>
                                <label class="form-check-label">JavaScript</label>
                            </div>

                            <div id="skillsError" class="text-danger small">
                                <?php echo $skillsErr; ?>
                            </div>
                        </div>

                        <!-- CV Upload -->
                        <div class="mb-3">
                            <label for="cv" class="form-label">
                                Upload CV (PDF) <span class="text-danger">*</span>
                            </label>

                            <input type="file" class="form-control"
                                   name="cv" id="cv" accept=".pdf">

                            <div id="cvError" class="text-danger small">
                                <?php echo $cvErr; ?>
                            </div>
                        </div>

                        <!-- Certifications -->
                        <div class="mb-3">
                            <label for="certifications" class="form-label">
                                Certifications <span class="text-danger">*</span>
                            </label>

                            <input type="file" class="form-control"
                                   name="certifications[]" id="certifications"
                                   multiple accept=".jpg,.jpeg,.png,.pdf">

                            <div id="certificationsError" class="text-danger small">
                                <?php echo $certificationsErr; ?>
                            </div>

                            <div class="form-text">
                                JPG, JPEG, PNG and PDF. Maximum 2 MB per file.
                            </div>
                        </div>

                        <!-- Additional Comments -->
                        <div class="mb-3">
                            <label for="comments" class="form-label">
                                Additional Comments
                            </label>

                            <textarea class="form-control" name="comments"
                                      id="comments" rows="4"><?php
                                if (isset($_POST["comments"])) {
                                    echo $_POST["comments"];
                                }
                            ?></textarea>

                            <div id="CommentError" class="text-danger small"><?php echo $commentErr; ?></div> 

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">

                            <button type="submit" name="submit"
                                    class="btn btn-primary">
                                Submit Application
                            </button>

                            <button type="reset" class="btn btn-secondary">
                                Reset
                            </button>

                        </div>

                    </form>

                <?php } ?>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

            <script>

        $(document).ready(function () {

            $("#jobForm").on("submit", function (event) {

                // Full Name
                if ($("#fullname").val().trim() === "") {
                    $("#fullname").removeClass("is-valid").addClass("is-invalid");
                    $("#nameError").text("Please fill fullname field!");
                    event.preventDefault();
                }

                // Email
                if ($("#email").val().trim() === "") {
                    $("#email").removeClass("is-valid").addClass("is-invalid");
                    $("#emailError").text("Please fill email field!");
                    event.preventDefault();
                }
                 if (!$("input[name='gender']:checked").val()) {
            $("#genderError").text("Please select gender!");
            event.preventDefault();
        } else {
            $("#genderError").text("");
        }

                // Job Position
                if ($("#position").val() === "") {
                    $("#position").removeClass("is-valid").addClass("is-invalid");
                    $("#positionError").text("Please select job position!");
                    event.preventDefault();
                }

                // Education
                if ($("#education").val() === "") {
                    $("#education").removeClass("is-valid").addClass("is-invalid");
                    $("#educationError").text("Please select education level!");
                    event.preventDefault();
                }

                // Experience
                if ($("#experience").val() === "") {
                    $("#experience").removeClass("is-valid").addClass("is-invalid");
                    $("#experienceError").text("Please select years of experience!");
                    event.preventDefault();
                }

                // Skills
                if (!$("input[name='skills[]']:checked").length != 0) {
                    $("#skillsError").text("Please select at least one skill!");
                    event.preventDefault();
                } else {
                    $("#skillsError").text("");
                }

                // CV
                if ($("#cv").val() === "") {
                    $("#cv").removeClass("is-valid").addClass("is-invalid");
                    $("#cvError").text("Please upload your CV!");
                    event.preventDefault();
                }

                if ($("#cv").val() !== "" &&
                    $("#cv").val().split(".").pop().toLowerCase() !== "pdf") {
                    $("#cv").removeClass("is-valid").addClass("is-invalid");
                    $("#cvError").text("Only PDF files are allowed!");
                    event.preventDefault();
                }

                if ($("#cv").val() !== "" &&
                    $("#cv")[0].files[0].size > 2097152) {
                    $("#cv").removeClass("is-valid").addClass("is-invalid");
                    $("#cvError").text("CV must not exceed 2 MB!");
                    event.preventDefault();
                }

                // Certifications
                var files = $("#certifications")[0].files;

                if (files.length === 0) {
                    $("#certifications").removeClass("is-valid").addClass("is-invalid");
                    $("#certificationsError").text("Please upload at least one certification!");
                    event.preventDefault();
                } else {
                    $("#certifications").removeClass("is-invalid");
                    $("#certificationsError").text("");
                    for (var i = 0; i < files.length; i++) {

                        var extension = files[i].name.split(".").pop().toLowerCase();

                        if (extension !== "jpg" &&
                            extension !== "jpeg" &&
                            extension !== "png" &&
                            extension !== "pdf") {

                            $("#certifications").addClass("is-invalid");
                            $("#certificationsError").text("Only JPG, JPEG, PNG and PDF files are allowed!");
                            event.preventDefault();
                            break;
                        }

                        if (files[i].size > 2097152) {
                            $("#certifications").addClass("is-invalid");
                            $("#certificationsError").text("Each certification must not exceed 2 MB!");
                            event.preventDefault();
                            break;
                        }
                    }
                }
                if ($("#comments").val().trim() === "") {
                    $("#comments").removeClass("is-valid").addClass("is-invalid");
                    $("#CommentError").text("Please fill the comment field!");
                    event.preventDefault();
                }

               

            });


            // Reset Form
            $("#jobForm").on("reset", function () {

                $(".form-control, .form-select").removeClass("is-valid is-invalid");
                $(".text-danger").text("");

            });

        });

    </script>

</body>
</html>
    </div>