<?php
session_start();
// Checking if the user is not logged in with a valid session
if (!isset($_SESSION['company_id'])) {
    // Redirecting to the login page 
    header("Location: company-login.php");
    exit();
}

include("../homepage/connection.php");

// Query to retrieve the company name based on the company ID from the session
$company_id = $_SESSION['company_id'];
$company_query = "SELECT name FROM company WHERE id = '$company_id'";
$company_result = mysqli_query($conn, $company_query);
$company_row = mysqli_fetch_assoc($company_result);
$company_name = $company_row['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />

    <title>Company Dashboard</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../logos/4.png" class="logo" alt="logo" />
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="company-dashboard.php">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="display-jobs.php">
                    <i class="bx bxs-shopping-bag-alt"></i>
                    <span class="text">Posted Jobs</span>
                </a>
            </li>
            <li>
                <a href="applied-jobs.php">
                    <i class="bx bxs-group"></i>
                    <span class="text">Applied Jobs</span>
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
                <a href="logout.php" class="logout">
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
                    <h1>Dashboard</h1>
                    <h1></h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php"><?php echo $company_row['name']; ?></a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="box-info">
                <li>
                    <i class="bx bxs-calendar-check"></i>
                    <h2><span class="text" id="jobCount"></span></h2>

                    <p style="text-decoration: wavy; font-weight: bold">Active Jobs</p>

                </li>
                <li>
                    <i class="bx bxs-group"></i>
                    <h2><span class="text" id="appliedJobCount"></h2>

                    <p style="text-decoration: wavy; font-weight: bold">Applied Jobs</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Jobs</h3>
                        <i class="bx bx-search"></i>
                        <i class="bx bx-filter"></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="logo.png" />
                                    <p>Ram sharma</p>
                                </td>
                                <td>01-10-2023</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="logo.png" />
                                    <p>Sita Thapa</p>
                                </td>
                                <td>20-8-2023</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="logo.png" />
                                    <p>Shyam Timilsina</p>
                                </td>
                                <td>23-1-2023</td>
                                <td><span class="status process">Process</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="logo.png" />
                                    <p>Hari Shrestha</p>
                                </td>
                                <td>05-10-2023</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        
    </section>
    
    <script>
        // Function to fetch and update job count
        function updateJobCount() {
            fetch('get-job-count.php') 
                .then(response => response.json())
                .then(data => {
                    document.getElementById('jobCount').innerText = data.count;
                })
                .catch(error => console.error('Error fetching job count:', error));
        }

        function updateAppliedJobCount() {
            fetch('get-applied-job-count.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('appliedJobCount').innerText = data.count;
                })
                .catch(error => console.error('Error fetching applied job count:', error));
        }

        // Calling the function to update applied job count when the page loads
        window.onload = function() {
            updateJobCount(); // Updating active job count
            updateAppliedJobCount(); // Updating applied job count
        };


        // Calling the function to update job count when the page loads
    </script>


    <script src="script.js"></script>
</body>

</html>