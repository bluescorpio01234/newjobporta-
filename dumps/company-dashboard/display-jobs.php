<?php
session_start();
if (!isset($_SESSION["company_id"])) {
    // echo "no key";
    // session_destroy();
    // return;
    header("location: ../homepage/index.php");
}

$company_id = $_SESSION['company_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>company</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            padding-bottom: 12px;
            font-size: 13px;
            text-align: left;
            border-bottom: 1px solid var(--grey);
        }

        table td {
            padding: 16px 0;
        }

        table tr td:first-child {
            display: flex;
            align-items: center;
            grid-gap: 12px;
            padding-left: 6px;
        }

        table td img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        table tbody tr:hover {
            background: var(--grey);
        }

        .right {
            background-color: #3c91e6;
            color: aliceblue;
        }

        .btn-primary {
            color: azure;
        }

        .right:hover {
            background-color: rgb(2, 2, 29);
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="comp.logo.jpg" class="logo" />
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="index.php">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="display-jobs.php">
                    <i class="bx bxs-shopping-bag-alt"></i>
                    <span class="text">Jobs</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-group"></i>
                    <span class="text">Applicants</span>
                </a>
            </li>

        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="./homepage/logout.php" class="logout">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="bx bx-menu"></i>

            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden />
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class="bx bxs-bell"></i>
                <span class="num"></span>
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Jobs</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="display-jobs.php">Jobs</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <a href="new-job-form.php
                    " class="btn-primary">Add Jobs</a>
                </div>
            </div>
            <br>

            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Posted Date</th>
                            <th>Deadline</th>
                            <!-- <th>Details</th> -->
                            <th>Location</th>
                            <th>Salary</th>
                            <th>Type</th>
                            <th>No of Vacancy</th>
                            <th>Job Level</th>
                            <th>Available For</th>
                            <th>Operation</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $company_id = $_SESSION['company_id'];

                        // Connect to the database and retrieve user data
                        include("connection.php");
                        $query = "SELECT * FROM jobs where company_id = $company_id";
                        $result = mysqli_query($con, $query);

                        // Loop through the data and generate table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['posted_date'] . "</td>";
                            echo "<td>" . $row['deadline'] . "</td>";
                            // echo "<td>" . $row['details'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['salary'] . "</td>";
                            echo "<td>" . $row['type_id'] . "</td>";
                            echo "<td>" . $row['no_of_vacancy'] . "</td>";
                            echo "<td>" . $row['job_level'] . "</td>";
                            echo "<td>" . $row['available_for'] . "</td>";
                            echo "<td><a href='delete-company.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this company?\")'>Delete</a></td>";

                            echo "</tr>";
                        }

                        // Close the database connection

                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="script.js"></script>
</body>

</html>