<?php

$errName = "";
$errEmail = "";
$errPob = "";
$errGender = "";
$errFaculty = "";
$errLanguages = "";
$errComment = "";

if (isset($_POST["submit"])) {

    // 1. Fullname validation
    if (empty(trim($_POST["fullname"] ?? ""))) {
        $errName = "Full name is required.";
    }

    // 2. Email validation
    if (empty(trim($_POST["email"] ?? ""))) {
        $errEmail = "Email is required.";
    }

    // 3. Place of Birth validation
    if (empty(trim($_POST["pob"] ?? ""))) {
        $errPob = "Place of Birth is required.";
    }

    // 4. Gender validation
    if (empty($_POST["gender"])) {
        $errGender = "Please select your gender.";
    }

    // 5. Faculty validation
    if (empty($_POST["faculty"])) {
        $errFaculty = "Please select your faculty.";
    }

    // 6. Languages validation
    if (empty($_POST["languages"]) || !is_array($_POST["languages"])) {
        $errLanguages = "Please select at least one language.";
    }

    // 7. Comment validation
    if (empty(trim($_POST["comment"] ?? ""))) {
        $errComment = "Comment is required.";
    }

    // Display Student Information only when all required fields are valid
    if (empty($errName) && empty($errEmail) && empty($errPob) && empty($errGender) && empty($errFaculty) && empty($errLanguages) && empty($errComment)) {
        echo "<div class='result-box'>";
        echo "<h2>Student Information</h2>";

        echo "Fullname: " . htmlspecialchars($_POST["fullname"]) . "<br>";
        echo "Email: " . htmlspecialchars($_POST["email"]) . "<br>";
        echo "Place of Birth: " . htmlspecialchars($_POST["pob"]) . "<br>";
        echo "Gender: " . htmlspecialchars($_POST["gender"]) . "<br>";
        echo "Faculty: " . htmlspecialchars($_POST["faculty"]) . "<br>";

        echo "Languages: ";
        foreach ($_POST["languages"] as $value) {
            echo htmlspecialchars($value) . ", ";
        }
        echo "<br>";

        echo "Comment: " . nl2br(htmlspecialchars($_POST["comment"])) . "<br>";
        echo "</div>";
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
        body {
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            margin: 0;
            padding: 40px 20px;
        }

        .result-box {
            max-width: 620px;
            margin: 0 auto 30px auto;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-left: 5px solid #2563eb;
            border-radius: 12px;
            padding: 24px 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            font-size: 15px;
            line-height: 1.8;
        }

        .result-box h2 {
            margin: 0 0 14px 0;
            color: #1e3a8a;
            font-size: 22px;
            font-weight: 700;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 8px;
        }

        form {
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            padding: 35px 35px 40px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin: 0 0 25px 0;
            color: #1e3a8a;
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 15px;
        }

        fieldset {
            border: 1.5px solid #cbd5e1;
            border-radius: 12px;
            padding: 25px 25px 20px;
            background: #f8fafc;
        }

        legend {
            font-weight: 700;
            font-size: 14px;
            color: #ffffff;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 6px 18px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(30, 58, 138, 0.2);
            letter-spacing: 0.5px;
        }

        .error-msg {
            color: #dc2626;
            font-size: 13.5px;
            font-weight: 600;
            margin-left: 8px;
            display: inline-block;
        }

        .input-error {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15) !important;
        }

        .choice-error {
            border: 1.5px dashed #ef4444;
            border-radius: 8px;
            padding: 4px 8px;
            display: inline-block;
            background-color: #fef2f2;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            color: #334155;
            display: inline-block;
            margin-bottom: 4px;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 14px;
            font-size: 14.5px;
            font-family: inherit;
            color: #1e293b;
            background-color: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus,
        textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.18);
        }

        input[type="radio"],
        input[type="checkbox"] {
            accent-color: #2563eb;
            width: 16px;
            height: 16px;
            cursor: pointer;
            vertical-align: middle;
            margin: 0 4px 0 10px;
        }

        input[type="radio"]:first-of-type,
        input[type="checkbox"]:first-of-type {
            margin-left: 6px;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        input[type="submit"],
        input[type="reset"] {
            display: inline-block;
            padding: 12px 28px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            margin-top: 10px;
        }

        input[type="submit"] {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            transform: translateY(-1.5px);
            box-shadow: 0 6px 16px rgba(30, 58, 138, 0.35);
        }

        input[type="reset"] {
            background: #e2e8f0;
            color: #475569;
            border: 1.5px solid #cbd5e1;
            margin-left: 10px;
        }

        input[type="reset"]:hover {
            background: #cbd5e1;
            color: #0f172a;
        }
    </style>
</head>
<body>
    
<form method="post" action="">

<h1>Student Registration Form</h1>

<fieldset>
    <legend>Personal Info </legend>

<label for="">Fullname: </label><?php if (!empty($errName)) echo "<span class='error-msg'>$errName</span>"; ?><br>
<input type="text" name="fullname" class="<?php if(!empty($errName)) echo 'input-error'; ?>" value="<?php if(isset($_POST['fullname'])) echo htmlspecialchars($_POST['fullname']); ?>"><br><br>

<label for="">Email: </label><?php if (!empty($errEmail)) echo "<span class='error-msg'>$errEmail</span>"; ?><br>
<input type="email" name="email" class="<?php if(!empty($errEmail)) echo 'input-error'; ?>" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"><br><br>

<label for="">Place of Birth: </label><?php if (!empty($errPob)) echo "<span class='error-msg'>$errPob</span>"; ?><br>
<input type="text" name="pob" id="" class="<?php if(!empty($errPob)) echo 'input-error'; ?>" value="<?php if(isset($_POST['pob'])) echo htmlspecialchars($_POST['pob']); ?>"><br><br>

<label for="">Gender: </label><?php if (!empty($errGender)) echo "<span class='error-msg'>$errGender</span>"; ?><br>
<span class="<?php if(!empty($errGender)) echo 'choice-error'; ?>">
<input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] === 'male') echo 'checked'; ?>> Male
<input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] === 'female') echo 'checked'; ?>> Female
</span><br><br>

<label for="">Faculty: </label><?php if (!empty($errFaculty)) echo "<span class='error-msg'>$errFaculty</span>"; ?><br>
<select name="faculty" id="" class="<?php if(!empty($errFaculty)) echo 'input-error'; ?>">
    <option value="">-- Select Faculty --</option>
    <option value="computer" <?php if(isset($_POST['faculty']) && $_POST['faculty'] === 'computer') echo 'selected'; ?>>Computer and IT</option>
    <option value="medicine" <?php if(isset($_POST['faculty']) && $_POST['faculty'] === 'medicine') echo 'selected'; ?>>Medicine and Health Science</option>
    <option value="engineering" <?php if(isset($_POST['faculty']) && $_POST['faculty'] === 'engineering') echo 'selected'; ?>>Engineering</option>
    <option value="ecom" <?php if(isset($_POST['faculty']) && $_POST['faculty'] === 'ecom') echo 'selected'; ?>>Business</option>
</select><br><br>

<label for="">Languages: </label><?php if (!empty($errLanguages)) echo "<span class='error-msg'>$errLanguages</span>"; ?><br>
<span class="<?php if(!empty($errLanguages)) echo 'choice-error'; ?>">
<input type="checkbox" name="languages[]" value="Somali" <?php if(isset($_POST['languages']) && is_array($_POST['languages']) && in_array('Somali', $_POST['languages'])) echo 'checked'; ?>>Somali
<input type="checkbox" name="languages[]" value="English" <?php if(isset($_POST['languages']) && is_array($_POST['languages']) && in_array('English', $_POST['languages'])) echo 'checked'; ?>>English
<input type="checkbox" name="languages[]" value="Arabic" <?php if(isset($_POST['languages']) && is_array($_POST['languages']) && in_array('Arabic', $_POST['languages'])) echo 'checked'; ?>>Arabic
<input type="checkbox" name="languages[]" value="Chinese" <?php if(isset($_POST['languages']) && is_array($_POST['languages']) && in_array('Chinese', $_POST['languages'])) echo 'checked'; ?>>Chinese
</span><br><br>

<label for="">Comment: </label><?php if (!empty($errComment)) echo "<span class='error-msg'>$errComment</span>"; ?><br>
<textarea name="comment" id="" rows="4" cols="30" class="<?php if(!empty($errComment)) echo 'input-error'; ?>"><?php if(isset($_POST['comment'])) echo htmlspecialchars($_POST['comment']); ?></textarea><br><br>

<input type="submit" name="submit" value="Register">
<input type="reset" name="reset" value="Clear" onclick="window.location.href='form_register.php';">

</fieldset>

</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Automatically remove red border and error message when user corrects the field
    const fields = document.querySelectorAll("input, select, textarea");
    fields.forEach(function (field) {
        function clearError() {
            field.classList.remove("input-error");
            const parentChoice = field.closest(".choice-error");
            if (parentChoice) {
                parentChoice.classList.remove("choice-error");
            }

            // Find preceding error message
            let prev = field.previousElementSibling;
            while (prev) {
                if (prev.classList && prev.classList.contains("error-msg")) {
                    prev.style.display = "none";
                    break;
                }
                if (prev.tagName === "LABEL") {
                    const msg = prev.nextElementSibling;
                    if (msg && msg.classList && msg.classList.contains("error-msg")) {
                        msg.style.display = "none";
                    }
                    break;
                }
                prev = prev.previousElementSibling;
            }
        }

        field.addEventListener("input", clearError);
        field.addEventListener("change", clearError);
    });
});
</script>

</body>
</html>
