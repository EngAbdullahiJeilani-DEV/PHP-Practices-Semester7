<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
        nav {
            background-color: rgb(24 90 188);
        }
        .sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
            background-color: rgb(232,240,254);
        }
        .sidebar li {
            background-color: rgb(24 90 188) !important;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
        }
        .sidebar a {
            text-decoration: none;
            color: #fff !important;
        }
        .section-bg {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .card-img-top {
            border-radius: 10px 10px 0 0;
        }
        footer {
            background-color: rgb(24 90 188);
            color: white;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="row">
            <?php include "sidebar.php"; ?>

            <main class="col-lg-9 p-3">
                <?php include "student_profile.php"; ?>
                <?php include "courses.php"; ?>
                <?php include "grades.php"; ?>
                <?php include "event.php"; ?>
                <?php include "about.php"; ?>
                <?php include "contact.php"; ?>

            </main>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>