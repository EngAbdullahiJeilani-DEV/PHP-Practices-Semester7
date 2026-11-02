<?php

$success = false;
$errMsg = "";
$nameErr = "";
$emailErr = "";
$facultyErr = "";

if (isset($_POST["submit"])) {

    $success = true;

    if (empty($_POST["fullname"])) {
        $success = false;
        $nameErr = "* Please fill fullname field!";
    }

    if (empty($_POST["email"])) {
        $success = false;
        $emailErr = "* Please fill email field!";
    }

    if (empty($_POST["faculty"])) {
        $success = false;
        $facultyErr = "* Please select faculty!";
    }

    if (!$success) {
        $errMsg = "Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php if ($success) { ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                <h4>Student Information</h4>
                <hr>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Fullname</th>
                        <td><?php echo $_POST["fullname"]; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $_POST["email"]; ?></td>
                    </tr>
                    <tr>
                        <th>Place of Birth</th>
                        <td><?php echo $_POST["pob"] ?? ""; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $_POST["gender"] ?? ""; ?></td>
                    </tr>
                    <tr>
                        <th>Faculty</th>
                        <td><?php echo $_POST["faculty"] ?? ""; ?></td>
                    </tr>
                    <tr>
                        <th>Languages</th>
                        <td>
                            <?php
                            if (isset($_POST["languages"])) {
                                echo implode(", ", $_POST["languages"]);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Comment</th>
                        <td><?php echo $_POST["comment"] ?? ""; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Student Registration Form</h2>
                </div>

                <div class="card-body">

                    <?php if (!empty($errMsg)) { ?>
                        <div class="alert alert-danger"><?php echo $errMsg; ?></div>
                    <?php } ?>

                    <form method="post" action="">

                        <fieldset>
                            <legend class="text-primary mb-3">Personal Information</legend>

                            <!-- Fullname -->
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Fullname <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your fullname" value="<?php if (!$success && isset($_POST["fullname"])) { echo $_POST["fullname"]; } ?>">
                                <div id="nameError" class="text-danger small"><?php echo $nameErr; ?></div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php if (!$success && isset($_POST["email"])) { echo $_POST["email"]; } ?>">
                                <div id="emailError" class="text-danger small"><?php echo $emailErr; ?></div>
                            </div>

                            <!-- Place of Birth -->
                            <div class="mb-3">
                                <label for="pob" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control" id="pob" name="pob" placeholder="Enter your place of birth" value="<?php if (!$success && isset($_POST["pob"])) { echo $_POST["pob"]; } ?>">
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="male" <?php if (!$success && isset($_POST["gender"]) && $_POST["gender"] == "male") { echo "checked"; } ?>>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="female" <?php if (!$success && isset($_POST["gender"]) && $_POST["gender"] == "female") { echo "checked"; } ?>>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                                <div id="genderError" class="text-danger small"></div>
                            </div>

                            <!-- Faculty -->
                            <div class="mb-3">
                                <label for="faculty" class="form-label">Faculty <span class="text-danger">*</span></label>

                                <select class="form-select" name="faculty" id="faculty">
                                    <option value="computer" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "computer") { echo "selected"; } ?>>Computer and IT</option>
                                    <option value="medicine" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "medicine") { echo "selected"; } ?>>Medicine and Health Science</option>
                                    <option value="engineering" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "engineering") { echo "selected"; } ?>>Engineering</option>
                                    <option value="ecom" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "ecom") { echo "selected"; } ?>>Business</option>
                                </select>

                                <div id="facultyError" class="text-danger small"><?php echo $facultyErr; ?></div>
                            </div>

                            <!-- Languages -->
                            <div class="mb-3">
                                <label class="form-label d-block">Languages</label>

                                <?php
                                $languages = ["Somali", "English", "Arabic", "Chinese"];

                                foreach ($languages as $language) {
                                    $checked = (!$success && isset($_POST["languages"]) && in_array($language, $_POST["languages"])) ? "checked" : "";
                                ?>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="languages[]" id="<?php echo strtolower($language); ?>" value="<?php echo $language; ?>" <?php echo $checked; ?>>
                                    <label class="form-check-label" for="<?php echo strtolower($language); ?>"><?php echo $language; ?></label>
                                </div>

                                <?php } ?>
                            </div>

                            <!-- Comment -->
                            <div class="mb-4">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Write your comment here..."><?php if (!$success && isset($_POST["comment"])) { echo $_POST["comment"]; } ?></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                <button type="reset" class="btn btn-outline-secondary">Clear</button>
                            </div>

                        </fieldset>
                    </form>
                </div>

                <div class="card-footer text-center text-muted">Student Registration System</div>
            </div>

        </div>
    </div>
</div>


</body>
</html>