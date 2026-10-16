<?php
session_start();

$nameErr = "";
$pobErr = "";
$dobErr = "";
$addressErr = "";
$genderErr = "";
$telephoneErr = "";
$emailErr = "";
$imageErr = "";
$parentnameErr = "";
$parenttelephoneErr = "";
$relationshipErr = "";
$studentidErr = "";
$facultyErr = "";
$departmentErr = "";
$classErr = "";
$registrationdateErr = "";

$success = true;
$imageName = "";

$today = date("Y-m-d");
$minimumDOB = date("Y-m-d", strtotime("-18 years"));

if (isset($_POST["submit"])) {

    $success = true;

    // Personal Information

    if (empty($_POST["name"])) {
        $success = false;
        $nameErr = "Please enter student name";
    }
    else if (!preg_match("/^[a-zA-Z ]+$/", $_POST["name"])) {
        $success = false;
        $nameErr = "Name must contain letters and spaces only";
    }

    if (empty($_POST["pob"])) {
        $success = false;
        $pobErr = "Please enter place of birth";
    }

    if (empty($_POST["dob"])) {
        $success = false;
        $dobErr = "Please enter date of birth";
    }
    else if ($_POST["dob"] > $minimumDOB) {
        $success = false;
        $dobErr = "Student must be at least 18 years old";
    }
    else if ($_POST["dob"] > $today) {
        $success = false;
        $dobErr = "Date of birth cannot be in the future";
    }

    if (empty($_POST["address"])) {
        $success = false;
        $addressErr = "Please enter address";
    }

    if (empty($_POST["gender"])) {
        $success = false;
        $genderErr = "Please select gender";
    }

    if (empty($_POST["telephone"])) {
        $success = false;
        $telephoneErr = "Please enter telephone";
    }

    if (empty($_POST["email"])) {
        $success = false;
        $emailErr = "Please enter email";
    }
    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $success = false;
        $emailErr = "Please enter a valid email address";
    }

    // Parent Information

    if (empty($_POST["parentname"])) {
        $success = false;
        $parentnameErr = "Please enter parent name";
    }
    else if (!preg_match("/^[a-zA-Z ]+$/", $_POST["parentname"])) {
        $success = false;
        $parentnameErr = "Parent name must contain letters and spaces only";
    }

    if (empty($_POST["parenttelephone"])) {
        $success = false;
        $parenttelephoneErr = "Please enter parent telephone";
    }

    if (empty($_POST["relationship"])) {
        $success = false;
        $relationshipErr = "Please select relationship";
    }

    // Academic Information

    if (empty($_POST["studentid"])) {
        $success = false;
        $studentidErr = "Please enter student ID";
    }

    if (empty($_POST["faculty"])) {
        $success = false;
        $facultyErr = "Please select faculty";
    }

    if (empty($_POST["department"])) {
        $success = false;
        $departmentErr = "Please enter department";
    }

    if (empty($_POST["class"])) {
        $success = false;
        $classErr = "Please enter class";
    }

    if (empty($_POST["registrationdate"])) {
        $success = false;
        $registrationdateErr = "Please enter registration date";
    }
    else if ($_POST["registrationdate"] != $today) {
        $success = false;
        $registrationdateErr = "Registration date must be today only";
    }

    // Keep the previously uploaded image

    if (isset($_POST["savedImage"])) {
        $imageName = basename($_POST["savedImage"]);
    }

    // Check if a new image was selected

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] != 4) {

        if ($_FILES["image"]["error"] != 0) {
            $success = false;
            $imageErr = "Image upload failed";
        }
        else if ($_FILES["image"]["size"] > 5000000) {
            $success = false;
            $imageErr = "Image must not exceed 5 MB";
        }
        else {
            $imageType = strtolower(
                pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION)
            );

            if (!in_array($imageType, array("jpg", "jpeg", "png", "gif"))) {
                $success = false;
                $imageErr = "Only JPG, JPEG, PNG and GIF images are allowed";
            }
            else {
                if (!is_dir("uploads")) {
                    mkdir("uploads");
                }

                $newImageName = time() . "_" .
                    basename($_FILES["image"]["name"]);

                if (move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    "uploads/" . $newImageName
                )) {
                    $imageName = $newImageName;
                }
                else {
                    $success = false;
                    $imageErr = "Unable to save image";
                }
            }
        }
    }

    // Check whether an image is available

    if (empty($imageName) || !file_exists("uploads/" . $imageName)) {
        $success = false;
        $imageErr = "Please upload student image";
    }

    // Redirect after successful validation

    if ($success) {

        $_SESSION["student"] = $_POST;
        $_SESSION["student"]["image"] = $imageName;

        header("Location: Displaying_info.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Portal</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary: #4F46E5;
            --primary-hover: #4338CA;
            --primary-light: #EEF2FF;
            --primary-gradient: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            --text-dark: #0F172A;
            --text-muted: #64748B;
            --border-color: #E2E8F0;
            --card-bg: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: #FFFFFF;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            padding: 40px 15px;
        }

        .bg-mesh-decor {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.04) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(124, 58, 237, 0.04) 0px, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .portal-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.08), 0 0 1px rgba(0, 0, 0, 0.04);
            padding: 42px 48px;
            max-width: 900px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .portal-card {
                padding: 24px 18px;
                border-radius: 18px;
            }
        }

        /* Header */
        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .portal-title {
            font-weight: 800;
            font-size: 2.1rem;
            color: var(--text-dark);
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .portal-subtitle {
            color: var(--text-muted);
            font-size: 0.96rem;
            margin-bottom: 35px;
        }

        /* Section Cards */
        .section-card {
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 26px 26px 22px;
            margin-bottom: 28px;
            background: #FFFFFF;
            transition: all 0.2s ease;
        }

        .section-card:hover {
            border-color: #CBD5E1;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04);
        }

        .section-legend {
            float: none;
            width: auto;
            margin: 0;
            padding: 0 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .section-icon-badge {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
        }

        .badge-personal {
            background: #EEF2FF;
            color: #4F46E5;
        }

        .badge-parent {
            background: #ECFDF5;
            color: #059669;
        }

        .badge-academic {
            background: #F5F3FF;
            color: #7C3AED;
        }

        /* Labels & Input Groups */
        .form-label {
            font-weight: 600;
            font-size: 0.88rem;
            color: #334155;
            margin-bottom: 7px;
        }

        .form-label .req {
            color: #EF4444;
            font-weight: 700;
        }

        .custom-input-group {
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .custom-input-group .input-group-text {
            background: #F8FAFC;
            border: 1.5px solid var(--border-color);
            border-right: none;
            color: #64748B;
            font-size: 1rem;
            padding-left: 14px;
            padding-right: 14px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            transition: all 0.2s ease;
        }

        .custom-input-group .form-control,
        .custom-input-group .form-select {
            border: 1.5px solid var(--border-color);
            border-left: none;
            padding: 10px 14px;
            font-size: 0.93rem;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            color: var(--text-dark);
            background-color: #FFFFFF;
            transition: all 0.2s ease;
        }

        .custom-input-group .form-control:focus,
        .custom-input-group .form-select:focus {
            box-shadow: none;
            border-color: #818CF8;
            background-color: #FFFFFF;
        }

        .custom-input-group:focus-within {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
            border-radius: 10px;
        }

        .custom-input-group:focus-within .input-group-text {
            border-color: #818CF8;
            background: #EEF2FF;
            color: var(--primary);
        }

        .custom-input-group:focus-within .form-control,
        .custom-input-group:focus-within .form-select {
            border-color: #818CF8;
        }

        /* Radio Toggle Cards for Gender */
        .gender-container {
            display: flex;
            gap: 12px;
        }

        .gender-radio-card {
            flex: 1;
            position: relative;
            cursor: pointer;
            user-select: none;
        }

        .gender-radio-card input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .gender-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            background: #F8FAFC;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            font-size: 0.92rem;
            font-weight: 600;
            color: #475569;
            transition: all 0.2s ease;
        }

        .gender-radio-card:hover .gender-box {
            background: #F1F5F9;
            border-color: #CBD5E1;
        }

        .gender-radio-card input[type="radio"]:checked + .gender-box {
            background: #EEF2FF;
            border-color: var(--primary);
            color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
        }

        /* Error & Preserved Image */
        .error {
            display: none;
        }

        .error:not(:empty) {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #DC2626;
            background: #FEF2F2;
            border-left: 3px solid #EF4444;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 600;
            margin-top: 6px;
        }

        .saved {
            display: none;
        }

        .saved:not(:empty) {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #047857;
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 8px;
            width: 100%;
        }

        /* Buttons */
        .btn-submit-wow {
            background: var(--primary-gradient);
            border: none;
            color: #FFFFFF;
            padding: 13px 36px;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.35);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-submit-wow:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(79, 70, 229, 0.45);
            color: #FFFFFF;
            filter: brightness(1.05);
        }

        .btn-submit-wow:active {
            transform: translateY(0);
        }

        .btn-clear-wow {
            background: #F8FAFC;
            border: 1.5px solid var(--border-color);
            color: #64748B;
            padding: 13px 30px;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 12px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-clear-wow:hover {
            background: #F1F5F9;
            color: #334155;
            border-color: #CBD5E1;
        }
    </style>
</head>

<body>

<div class="bg-mesh-decor"></div>

<div class="container py-3">
    <div class="portal-card">
        
        <!-- Header -->
        <div class="text-center">
            <div class="header-badge">
                <i class="bi bi-shield-check"></i> Admissions 2026-2027
            </div>
            <h1 class="portal-title">Student Registration Form</h1>
            <p class="portal-subtitle">Please fill in all required academic and personal information below to complete registration.</p>
        </div>

        <form method="post" action="" enctype="multipart/form-data">

            <!-- Section 1: Personal Information -->
            <fieldset class="section-card">
                <legend class="section-legend">
                    <span class="section-icon-badge badge-personal">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <span>Personal Information</span>
                </legend>

                <div class="row g-3 mt-1">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Full Name <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Enter student name"
                                   value="<?php if(isset($_POST["name"])) echo htmlspecialchars($_POST["name"]); ?>">
                        </div>
                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Place of Birth <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" name="pob" class="form-control" placeholder="City or region of birth"
                                   value="<?php if(isset($_POST["pob"])) echo htmlspecialchars($_POST["pob"]); ?>">
                        </div>
                        <span class="error"><?php echo $pobErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Date of Birth <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                            <input type="date" name="dob" class="form-control"
                                   max="<?php echo $minimumDOB; ?>"
                                   value="<?php if(isset($_POST["dob"])) echo htmlspecialchars($_POST["dob"]); ?>">
                        </div>
                        <span class="error"><?php echo $dobErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label d-block">Gender <span class="req">*</span></label>
                        <div class="gender-container">
                            <label class="gender-radio-card">
                                <input type="radio" name="gender" value="Male"
                                <?php if(isset($_POST["gender"]) && $_POST["gender"]=="Male") echo "checked"; ?>>
                                <span class="gender-box">
                                    <i class="bi bi-gender-male"></i> Male
                                </span>
                            </label>
                            <label class="gender-radio-card">
                                <input type="radio" name="gender" value="Female"
                                <?php if(isset($_POST["gender"]) && $_POST["gender"]=="Female") echo "checked"; ?>>
                                <span class="gender-box">
                                    <i class="bi bi-gender-female"></i> Female
                                </span>
                            </label>
                        </div>
                        <span class="error"><?php echo $genderErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Telephone <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="tel" name="telephone" class="form-control" placeholder="e.g. +252 61..."
                                   value="<?php if(isset($_POST["telephone"])) echo htmlspecialchars($_POST["telephone"]); ?>">
                        </div>
                        <span class="error"><?php echo $telephoneErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Email Address <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com"
                                   value="<?php if(isset($_POST["email"])) echo htmlspecialchars($_POST["email"]); ?>">
                        </div>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Residential Address <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-pin-map"></i></span>
                            <input type="text" name="address" class="form-control" placeholder="Street, District, City"
                                   value="<?php if(isset($_POST["address"])) echo htmlspecialchars($_POST["address"]); ?>">
                        </div>
                        <span class="error"><?php echo $addressErr; ?></span>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Student Photo <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-image"></i></span>
                            <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                        </div>
                        <input type="hidden" name="savedImage"
                               value="<?php echo htmlspecialchars($imageName); ?>">
                        <?php
                        if (!empty($imageName) && file_exists("uploads/" . $imageName)) {
                            echo '<span class="saved"><i class="bi bi-check2-circle me-1"></i> Image already uploaded: ';
                            echo htmlspecialchars($imageName);
                            echo '</span>';
                        }
                        ?>
                        <span class="error"><?php echo $imageErr; ?></span>
                    </div>
                </div>
            </fieldset>

            <!-- Section 2: Parent Information -->
            <fieldset class="section-card">
                <legend class="section-legend">
                    <span class="section-icon-badge badge-parent">
                        <i class="bi bi-people-fill"></i>
                    </span>
                    <span>Parent / Guardian Information</span>
                </legend>

                <div class="row g-3 mt-1">
                    <div class="col-12">
                        <label class="form-label">Parent / Guardian Name <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-person-heart"></i></span>
                            <input type="text" name="parentname" class="form-control" placeholder="Full name of parent or guardian"
                                   value="<?php if(isset($_POST["parentname"])) echo htmlspecialchars($_POST["parentname"]); ?>">
                        </div>
                        <span class="error"><?php echo $parentnameErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Parent Telephone <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" name="parenttelephone" class="form-control" placeholder="Parent phone number"
                                   value="<?php if(isset($_POST["parenttelephone"])) echo htmlspecialchars($_POST["parenttelephone"]); ?>">
                        </div>
                        <span class="error"><?php echo $parenttelephoneErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Relationship <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-diagram-2"></i></span>
                            <select name="relationship" class="form-select">
                                <option value="">Select Relationship</option>
                                <option value="Father"
                                <?php if(isset($_POST["relationship"]) && $_POST["relationship"]=="Father") echo "selected"; ?>>Father</option>
                                <option value="Mother"
                                <?php if(isset($_POST["relationship"]) && $_POST["relationship"]=="Mother") echo "selected"; ?>>Mother</option>
                                <option value="Guardian"
                                <?php if(isset($_POST["relationship"]) && $_POST["relationship"]=="Guardian") echo "selected"; ?>>Guardian</option>
                            </select>
                        </div>
                        <span class="error"><?php echo $relationshipErr; ?></span>
                    </div>
                </div>
            </fieldset>

            <!-- Section 3: Academic Information -->
            <fieldset class="section-card">
                <legend class="section-legend">
                    <span class="section-icon-badge badge-academic">
                        <i class="bi bi-mortarboard-fill"></i>
                    </span>
                    <span>Academic Information</span>
                </legend>

                <div class="row g-3 mt-1">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Student ID <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-hash"></i></span>
                            <input type="text" name="studentid" class="form-control" placeholder="e.g. C123000"
                                   value="<?php if(isset($_POST["studentid"])) echo htmlspecialchars($_POST["studentid"]); ?>">
                        </div>
                        <span class="error"><?php echo $studentidErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Faculty <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <select name="faculty" class="form-select">
                                <option value="">Select Faculty</option>
                                <option value="Computer and IT"
                                <?php if(isset($_POST["faculty"]) && $_POST["faculty"]=="Computer and IT") echo "selected"; ?>>Computer and IT</option>
                                <option value="Medicine and Health Science"
                                <?php if(isset($_POST["faculty"]) && $_POST["faculty"]=="Medicine and Health Science") echo "selected"; ?>>Medicine and Health Science</option>
                                <option value="Engineering"
                                <?php if(isset($_POST["faculty"]) && $_POST["faculty"]=="Engineering") echo "selected"; ?>>Engineering</option>
                                <option value="Business"
                                <?php if(isset($_POST["faculty"]) && $_POST["faculty"]=="Business") echo "selected"; ?>>Business</option>
                            </select>
                        </div>
                        <span class="error"><?php echo $facultyErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Department <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-journal-bookmark"></i></span>
                            <input type="text" name="department" class="form-control" placeholder="e.g. Computer Science"
                                   value="<?php if(isset($_POST["department"])) echo htmlspecialchars($_POST["department"]); ?>">
                        </div>
                        <span class="error"><?php echo $departmentErr; ?></span>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Class <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-diagram-3"></i></span>
                            <input type="text" name="class" class="form-control" placeholder="e.g. CA211"
                                   value="<?php if(isset($_POST["class"])) echo htmlspecialchars($_POST["class"]); ?>">
                        </div>
                        <span class="error"><?php echo $classErr; ?></span>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Registration Date <span class="req">*</span></label>
                        <div class="input-group custom-input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                            <input type="date" name="registrationdate" class="form-control"
                                   min="<?php echo $today; ?>"
                                   max="<?php echo $today; ?>"
                                   value="<?php echo $today; ?>">
                        </div>
                        <span class="error"><?php echo $registrationdateErr; ?></span>
                    </div>
                </div>
            </fieldset>

            <!-- Form Actions -->
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center mt-4">
                <button type="submit" name="submit" value="Register" class="btn btn-submit-wow">
                    <i class="bi bi-check2-circle fs-5"></i> Register Student
                </button>
                <button type="reset" name="reset" value="Clear" class="btn btn-clear-wow">
                    <i class="bi bi-arrow-counterclockwise fs-6"></i> Clear Form
                </button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
