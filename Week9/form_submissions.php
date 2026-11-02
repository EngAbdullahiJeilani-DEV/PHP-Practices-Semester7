
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">


            <!-- Registration Form -->
            <div class="card shadow mb-5">

                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Student Registration Form</h2>
                </div>

                <div class="card-body">
                    <!-- Alert Message -->
                    <div id="alertMessage"></div>

                    <form method="post" id="studentForm">

                        <fieldset>
                            <legend class="text-primary mb-3">
                                Personal Information
                            </legend>

                            <!-- Fullname -->
                            <div class="mb-3">
                                <label for="fullname" class="form-label">
                                    Fullname <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control"
                                    id="fullname" name="fullname"
                                    placeholder="Enter your fullname">

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

                            <!-- Place of Birth -->
                            <div class="mb-3">
                                <label for="pob" class="form-label">
                                    Place of Birth
                                </label>

                                <input type="text" class="form-control"
                                    id="pob" name="pob"
                                    placeholder="Enter your place of birth">
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input"
                                        id="male" name="gender" value="male">
                                    <label for="male" class="form-check-label">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input"
                                        id="female" name="gender" value="female">
                                    <label for="female" class="form-check-label">
                                        Female
                                    </label>
                                </div>

                                <div id="genderError" class="text-danger small"></div>
                            </div>

                            <!-- Faculty -->
                            <div class="mb-3">
                                <label for="faculty" class="form-label">
                                    Faculty <span class="text-danger">*</span>
                                </label>

                                <select class="form-select" name="faculty" id="faculty">
                                    <option value="">Select Faculty</option>
                                    <option value="computer">Computer and IT</option>
                                    <option value="medicine">Medicine and Health Science</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="ecom">Business</option>
                                </select>

                                <div id="facultyError" class="text-danger small"></div>
                            </div>

                            <!-- Languages -->
                            <div class="mb-3">
                                <label class="form-label d-block">Languages</label>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input"
                                        name="languages[]" id="somali" value="Somali">
                                    <label for="somali" class="form-check-label">
                                        Somali
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input"
                                        name="languages[]" id="english" value="English">
                                    <label for="english" class="form-check-label">
                                        English
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input"
                                        name="languages[]" id="arabic" value="Arabic">
                                    <label for="arabic" class="form-check-label">
                                        Arabic
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input"
                                        name="languages[]" id="chinese" value="Chinese">
                                    <label for="chinese" class="form-check-label">
                                        Chinese
                                    </label>
                                </div>
                            </div>

                            <!-- Comment -->
                            <div class="mb-4">
                                <label for="comment" class="form-label">
                                    Comment
                                </label>

                                <textarea class="form-control" name="comment"
                                    id="comment" rows="4"
                                    placeholder="Write your comment here..."></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2">
                                <button type="submit" name="submit"
                                    id="submitBtn" class="btn btn-primary">
                                    Register
                                </button>

                                <button type="reset"
                                    class="btn btn-outline-secondary">
                                    Clear
                                </button>
                            </div>

                        </fieldset>
                    </form>

                </div>

                <div class="card-footer text-center text-muted">
                    Student Registration System
                </div>

            </div>


            <!-- Student Table -->
            <div class="card shadow">

                <div class="card-header bg-success text-white text-center py-3">
                    <h3 class="mb-0">Registered Students</h3>
                </div>

                <div class="card-body">
                    <!-- <div class="mb-3">
                        <input type="search" id="search" class="form-control" placeholder="Search students by name">
                    </div> -->

                    <div class="table-responsive">

                        <table id="studentTable" class="table table-bordered table-striped table-hover">

                            <thead class="table-primary">
                                <tr>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Place of Birth</th>
                                    <th>Gender</th>
                                    <th>Faculty</th>
                                    <th>Languages</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- AJAX data will appear here -->
                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="card-footer text-muted text-center">
                    Student Information Table
                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
$(document).ready(function() {

    $("#fullname").blur(function() {
        if ($(this).val().trim() == "") {
            $("#nameError").text("Please fill fullname field!");
            $(this).addClass("is-invalid");
        } else {
            $("#nameError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#email").blur(function() {
        if ($(this).val().trim() == "") {
            $("#emailError").text("Please fill email field!");
            $(this).addClass("is-invalid");
        } else {
            $("#emailError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#faculty").change(function() {
        if ($(this).val() == "") {
            $("#facultyError").text("Please select faculty!");
            $(this).addClass("is-invalid");
        } else {
            $("#facultyError").text("");
            $(this).removeClass("is-invalid");
        }
    });

    $("#studentForm").on("submit", function(event) {

        if ($("#fullname").val().trim() === "") {
            $("#fullname").removeClass("is-valid").addClass("is-invalid");
            $("#nameError").text("Please fill fullname field!");
            event.preventDefault();
        }

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

        if ($("#faculty").val() === "") {
            $("#faculty").removeClass("is-valid").addClass("is-invalid");
            $("#facultyError").text("Please select faculty!");
            event.preventDefault();
        }

        event.preventDefault();
        $("#submitBtn").prop("disabled", true).text("Submitting...");

        // Send form data using AJAX
        $.ajax({
            url: "form_handling.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success === true) {
                    // SUCCESS ALERT
                    $("#alertMessage").html(`
                        <div class="alert alert-success">
                            <strong>Success!</strong> ${response.message}
                        </div>`);

                    let student = response.data;

                    // Create new table row
                    let row = `<tr>
                            <td>${student.fullname}</td>
                            <td>${student.email}</td>
                            <td>${student.pob}</td>
                            <td>${student.gender}</td>
                            <td>${student.faculty}</td>
                            <td>${student.languages}</td>
                            <td>${student.comment}</td>
                        </tr>`;
                    // Add row dynamically
                    $("#studentTable tbody").append(row);
                    // Reset form
                    $("#studentForm")[0].reset();
                } else {
                    // ERROR ALERT
                    $("#alertMessage").html(`
                        <div class="alert alert-danger">
                            <strong>Error!</strong> ${response.message}
                        </div>
                    `);
                }
            },
            error: function(response) {
                $("#alertMessage").html(`
                    <div class="alert alert-danger">
                        Something went wrong! Please try again.
                        ${response.status} <br>
                        ${response.responseText}
                    </div>
                `);
                console.log(response.responseText);
            }
        });
    });

    


});
</script>

</body>
</html>
