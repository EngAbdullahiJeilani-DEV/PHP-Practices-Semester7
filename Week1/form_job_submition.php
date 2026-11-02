<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- Job Application Form -->
            <div class="card shadow mb-5">

                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Job Application Form</h2>
                </div>

                <div class="card-body">
                    <div id="alertMessage"></div>

                    <form method="post" id="jobForm">

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label">
                                Full Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" class="form-control"
                                   id="fullname" name="fullname"
                                   placeholder="Enter your full name">

                            <div id="nameError" class="text-danger small"></div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email" class="form-control"
                                   id="email" name="email"
                                   placeholder="Enter your email">

                            <div id="emailError" class="text-danger small"></div>
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label d-block">
                                Gender <span class="text-danger">*</span>
                            </label>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input"
                                       id="male" name="gender" value="Male">
                                <label for="male" class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input"
                                       id="female" name="gender" value="Female">
                                <label for="female" class="form-check-label">Female</label>
                            </div>

                            <div id="genderError" class="text-danger small"></div>
                        </div>

                        <!-- Job Position -->
                        <div class="mb-3">
                            <label for="position" class="form-label">
                                Job Position <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" id="position" name="position">
                                <option value="">Select Job Position</option>
                                <option value="Web Developer">Web Developer</option>
                                <option value="Graphic Designer">Graphic Designer</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="IT Support">IT Support</option>
                            </select>

                            <div id="positionError" class="text-danger small"></div>
                        </div>

                        <!-- Education Level -->
                        <div class="mb-3">
                            <label for="education" class="form-label">
                                Education Level <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" id="education" name="education">
                                <option value="">Select Education Level</option>
                                <option value="High School">High School</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Bachelor Degree">Bachelor Degree</option>
                                <option value="Master Degree">Master Degree</option>
                            </select>

                            <div id="educationError" class="text-danger small"></div>
                        </div>

                        <!-- Years of Experience -->
                        <div class="mb-3">
                            <label for="experience" class="form-label">
                                Years of Experience <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" id="experience" name="experience">
                                <option value="">Select Experience</option>
                                <option value="No experience">No experience</option>
                                <option value="Less than 1 year">Less than 1 year</option>
                                <option value="1-3 years">1-3 years</option>
                                <option value="4-6 years">4-6 years</option>
                                <option value="More than 6 years">More than 6 years</option>
                            </select>

                            <div id="experienceError" class="text-danger small"></div>
                        </div>

                        <!-- Skills -->
                        <div class="mb-3">
                            <label class="form-label d-block">
                                Skills <span class="text-danger">*</span>
                            </label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" id="html" value="HTML">
                                <label for="html" class="form-check-label">HTML</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" id="css" value="CSS">
                                <label for="css" class="form-check-label">CSS</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" id="javascript" value="JavaScript">
                                <label for="javascript" class="form-check-label">JavaScript</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       name="skills[]" id="php" value="PHP">
                                <label for="php" class="form-check-label">PHP</label>
                            </div>

                            <div id="skillsError" class="text-danger small"></div>
                        </div>

                        <!-- Comments -->
                        <div class="mb-4">
                            <label for="comments" class="form-label">Comments</label>

                            <textarea class="form-control" id="comments" name="comments"
                                      rows="4"
                                      placeholder="Write your comments here..."></textarea>
                            <div id="CommentError" class="text-danger small"></div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" id="submitBtn" class="btn btn-primary">
                                Submit Application
                            </button>

                            <button type="reset" class="btn btn-outline-secondary">
                                Clear
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Submitted Applications Table -->
            <div class="card shadow">

                <div class="card-header bg-success text-white text-center py-3">
                    <h3 class="mb-0">Submitted Applications</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table id="applicationTable"
                               class="table table-bordered table-striped table-hover">

                            <thead class="table-primary">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Job Position</th>
                                    <th>Education</th>
                                    <th>Experience</th>
                                    <th>Skills</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- AJAX data will appear here -->
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-muted text-center">
                    Job Application Information Table
                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function() {

    $("#fullname").blur(function() {
        if ($(this).val().trim() === "") {
            $("#nameError").text("Please fill fullname field!");
            $(this).addClass("is-invalid");
        } else {
            $("#nameError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#email").blur(function() {
        if ($(this).val().trim() === "") {
            $("#emailError").text("Please fill email field!");
            $(this).addClass("is-invalid");
        } else {
            $("#emailError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#position").change(function() {
        if ($(this).val() === "") {
            $("#positionError").text("Please select job position!");
            $(this).addClass("is-invalid");
        } else {
            $("#positionError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#education").change(function() {
        if ($(this).val() === "") {
            $("#educationError").text("Please select education level!");
            $(this).addClass("is-invalid");
        } else {
            $("#educationError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#experience").change(function() {
        if ($(this).val() === "") {
            $("#experienceError").text("Please select years of experience!");
            $(this).addClass("is-invalid");
        } else {
            $("#experienceError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#jobForm").on("submit", function(event) {

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

        // Gender
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
        if ($("input[name='skills[]']:checked").length === 0) {
            $("#skillsError").text("Please select at least one skill!");
            event.preventDefault();
        } else {
            $("#skillsError").text("");
        }
        if ($("#comments").val().trim() === "") {
                    $("#comments").removeClass("is-valid").addClass("is-invalid");
                    $("#CommentError").text("Please fill the comment field!");
                    event.preventDefault();
        }

        // Stop here when one of the checks prevented submission
        if (event.isDefaultPrevented()) {
            return;
        }

        // Prevent normal form submission and send with AJAX
        event.preventDefault();
        $("#submitBtn").prop("disabled", true).text("Submitting...");

        $.ajax({
            url: "form_job_handling.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",

            success: function(response) {
                if (response.success === true) {
                    $("#alertMessage").html(
                        '<div class="alert alert-success"></div>'
                    );
                    $("#alertMessage .alert").text(response.message);

                    let application = response.data;
                    let row = $("<tr></tr>");

                    row.append($("<td></td>").text(application.fullname));
                    row.append($("<td></td>").text(application.email));
                    row.append($("<td></td>").text(application.gender));
                    row.append($("<td></td>").text(application.position));
                    row.append($("<td></td>").text(application.education));
                    row.append($("<td></td>").text(application.experience));
                    row.append($("<td></td>").text(application.skills));
                    row.append($("<td></td>").text(application.comments));

                    $("#applicationTable tbody").append(row);
                    $("#jobForm")[0].reset();

                } else {
                    $("#alertMessage").html(
                        '<div class="alert alert-danger"></div>'
                    );
                    $("#alertMessage .alert").text(response.message);

                    $("#nameError").text(response.errors.fullname);
                    $("#emailError").text(response.errors.email);
                    $("#genderError").text(response.errors.gender);
                    $("#positionError").text(response.errors.position);
                    $("#educationError").text(response.errors.education);
                    $("#experienceError").text(response.errors.experience);
                    $("#skillsError").text(response.errors.skills);
                }
            },

            error: function() {
                $("#alertMessage").html(
                    '<div class="alert alert-danger">' +
                    'Something went wrong. Please try again.' +
                    '</div>'
                );
            },

            complete: function() {
                $("#submitBtn").prop("disabled", false)
                               .text("Submit Application");
            }
        });
    });

    $("#jobForm").on("reset", function() {
        $(".text-danger").text("");
        $(".form-control, .form-select").removeClass("is-invalid");
        $("#alertMessage").empty();
    });

});
</script>

</body>
</html>