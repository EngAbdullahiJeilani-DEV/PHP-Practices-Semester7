<?php

session_start();

if (!isset($_SESSION["student"])) {
    header("Location: Registration_form_Assigment.php");
    exit();
}

$student = $_SESSION["student"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Profile</title>
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

        /* Success Banner */
        .success-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: #ECFDF5;
            color: #059669;
            border: 1px solid #A7F3D0;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
            margin-bottom: 30px;
        }

        /* Student Hero Profile Header */
        .student-hero-banner {
            background: linear-gradient(135deg, #F8FAFC 0%, #EEF2FF 100%);
            border: 1px solid #E0E7FF;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 24px;
        }

        @media (max-width: 600px) {
            .student-hero-banner {
                flex-direction: column;
                text-align: center;
            }
        }

        .hero-img-container {
            flex-shrink: 0;
        }

        .hero-img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 16px;
            border: 4px solid #FFFFFF;
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.2);
        }

        .hero-info h2 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .badge-pill-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
        }

        .badge-id {
            background: #EEF2FF;
            color: #4F46E5;
            border: 1px solid #C7D2FE;
        }

        .badge-faculty {
            background: #F5F3FF;
            color: #7C3AED;
            border: 1px solid #DDD6FE;
        }

        .badge-date {
            background: #ECFDF5;
            color: #059669;
            border: 1px solid #A7F3D0;
        }

        /* Details Table */
        .profile-table {
            border: 1px solid var(--border-color);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 0;
        }

        .profile-table thead th {
            background: #F8FAFC;
            color: #475569;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .profile-table tbody td {
            padding: 13px 20px;
            border-bottom: 1px solid #F1F5F9;
            font-size: 0.94rem;
            vertical-align: middle;
        }

        .profile-table tbody tr:last-child td {
            border-bottom: none;
        }

        .profile-table tbody tr:hover {
            background-color: #F8FAFC;
        }

        .table-field-name {
            font-weight: 600;
            color: #334155;
            width: 35%;
        }

        .table-field-value {
            font-weight: 500;
            color: var(--text-dark);
        }

        .section-separator-row td {
            background: #F8FAFC;
            font-weight: 700;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--primary);
            padding: 11px 20px;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        /* Buttons */
        .btn-submit-wow {
            background: var(--primary-gradient);
            border: none;
            color: #FFFFFF;
            padding: 12px 28px;
            font-weight: 700;
            font-size: 0.95rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.35);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .btn-submit-wow:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(79, 70, 229, 0.45);
            color: #FFFFFF;
            filter: brightness(1.05);
        }

        .btn-print-wow {
            background: #F8FAFC;
            border: 1.5px solid var(--border-color);
            color: #475569;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 12px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-print-wow:hover {
            background: #F1F5F9;
            color: var(--text-dark);
            border-color: #CBD5E1;
        }

        @media print {
            .no-print {
                display: none !important;
            }
            body {
                padding: 0;
            }
            .portal-card {
                box-shadow: none;
                border: none;
                padding: 0;
            }
        }
    </style>
</head>

<body>

<div class="bg-mesh-decor"></div>

<div class="container py-3">
    <div class="portal-card">

        <!-- Top Header -->
        <div class="text-center">
            <div class="success-pill">
                <i class="bi bi-patch-check-fill"></i> Registration Complete
            </div>
            <h1 class="portal-title">Student Profile Verified</h1>
            <p class="portal-subtitle">Official registration record summary for the current academic session.</p>
        </div>

        <!-- Student Hero Profile Banner -->
        <div class="student-hero-banner">
            <div class="hero-img-container">
                <img src="uploads/<?php echo rawurlencode($student["image"]); ?>"
                     alt="Student Image" class="hero-img">
            </div>
            <div class="hero-info">
                <h2><?php echo htmlspecialchars($student["name"]); ?></h2>
                <div class="d-flex flex-wrap gap-2 mt-2">
                    <span class="badge-pill-tag badge-id">
                        <i class="bi bi-hash"></i> ID: <?php echo htmlspecialchars($student["studentid"]); ?>
                    </span>
                    <span class="badge-pill-tag badge-faculty">
                        <i class="bi bi-building"></i> <?php echo htmlspecialchars($student["faculty"]); ?>
                    </span>
                    <span class="badge-pill-tag badge-date">
                        <i class="bi bi-calendar-check"></i> Registered: <?php echo htmlspecialchars($student["registrationdate"]); ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- Information Table -->
        <div class="table-responsive">
            <table class="table profile-table align-middle">
                <thead>
                    <tr>
                        <th scope="col" style="width: 35%;">Information Field</th>
                        <th scope="col">Student Record Details</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Personal Information Group -->
                    <tr class="section-separator-row">
                        <td colspan="2"><i class="bi bi-person-fill me-1"></i> Personal Details</td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-person me-2 text-primary"></i> Name</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["name"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-geo-alt me-2 text-primary"></i> Place of Birth</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["pob"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-calendar3 me-2 text-primary"></i> Date of Birth</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["dob"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-pin-map me-2 text-primary"></i> Address</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["address"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-gender-ambiguous me-2 text-primary"></i> Gender</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["gender"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-telephone me-2 text-primary"></i> Telephone</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["telephone"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-envelope me-2 text-primary"></i> Email</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["email"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-image me-2 text-primary"></i> Student Image</td>
                        <td class="table-field-value">
                            <img src="uploads/<?php echo rawurlencode($student["image"]); ?>"
                                 alt="Student Image" class="rounded border p-1" style="width: 80px; height: 80px; object-fit: cover;">
                        </td>
                    </tr>

                    <!-- Parent Information Group -->
                    <tr class="section-separator-row">
                        <td colspan="2"><i class="bi bi-people-fill me-1"></i> Parent / Guardian Details</td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-person-heart me-2 text-success"></i> Parent Name</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["parentname"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-phone me-2 text-success"></i> Parent Telephone</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["parenttelephone"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-diagram-2 me-2 text-success"></i> Relationship</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["relationship"]); ?></td>
                    </tr>

                    <!-- Academic Information Group -->
                    <tr class="section-separator-row">
                        <td colspan="2"><i class="bi bi-mortarboard-fill me-1"></i> Academic Details</td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-hash me-2 text-warning"></i> Student ID</td>
                        <td class="table-field-value">
                            <span class="badge bg-light text-dark border px-2 py-1"><?php echo htmlspecialchars($student["studentid"]); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-building me-2 text-warning"></i> Faculty</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["faculty"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-journal-bookmark me-2 text-warning"></i> Department</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["department"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-diagram-3 me-2 text-warning"></i> Class</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["class"]); ?></td>
                    </tr>
                    <tr>
                        <td class="table-field-name"><i class="bi bi-calendar-check me-2 text-warning"></i> Registration Date</td>
                        <td class="table-field-value"><?php echo htmlspecialchars($student["registrationdate"]); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer Actions -->
        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3 mt-4 no-print">
            <a href="Registration_form_Assigment.php" class="btn btn-submit-wow">
                <i class="bi bi-person-plus-fill"></i> Register Another Student
            </a>
            <button onclick="window.print()" class="btn btn-print-wow">
                <i class="bi bi-printer-fill"></i> Print Summary
            </button>
        </div>

    </div>
</div>

</body>
</html>
