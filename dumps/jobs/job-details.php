<?php
include("../homepage/connection.php");
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    $query = "SELECT j.*, c.name AS company_name, c.logo AS company_logo FROM jobs j
JOIN company c ON j.company_id = c.id
WHERE j.id = $job_id";
    $result = mysqli_query($conn, $query);
    $job = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JobSpace</title>
    <!-- <link rel="stylesheet" href="../homepage/details-style.css" /> -->
    <!--  <link rel="stylesheet" href="../homepage/style.css" /> -->
    <link rel="stylesheet" href="details-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/slicknav.css">
    <link rel="stylesheet" href="../assets/css/price_rangs.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .apply-btn {
            background-color: aliceblue;

        }

        .apply-btn:hover {
            cursor: pointer;
            background-color: blue;
        }
    </style>

</head>

<body>
    <header>
        <!-- Header Start -->
        <nav class="navbar">
            <a href="#" class="logo">JobSpace.</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">View Jobs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
            </ul>

            <div class="signin-signup">
                <div class="join">
                    <a href="my-profile.php" class="sign-in">My Profile</a>
                    <a href="logout.php" class="sign-up">Log Out</a>
                </div>

                <div id="menu-icon" class="fa-solid fa-bars"></div>
            </div>
        </nav>
        <!-- Header End -->
    </header>



    <main>
        <?php if ($job) { ?>

            <!-- job post company Start -->
            <div class="job-post-company pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-between">
                        <!-- Left Content -->
                        <div class="col-xl-7 col-lg-8">
                            <!-- job single -->
                            <div class="single-job-items mb-50">
                                <div class="job-items">
                                    <div class="company-img company-img-details">
                                        <img src="../logos/<?php echo $job['company_logo']; ?>" alt="<?php echo $job['company_name']; ?>">
                                    </div>
                                    <div class="job-tittle">
                                        <a href="#">
                                            <h4><?php echo $job['title']; ?></h4>
                                        </a>
                                        <ul>
                                            <li>Creative Agency</li>
                                            <li><i class="fas fa-map-marker-alt"></i><?php echo $job['location']; ?></li>
                                            <li>$3500 - $4000</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- job single End -->

                            <div class="job-post-details">
                                <div class="post-details1 mb-50">
                                    <!-- Small Section Tittle -->
                                    <div class="small-section-tittle">
                                        <h4>Job Description</h4>
                                    </div>
                                    <p><?php echo $job['details']; ?></p>
                                </div>
                                <div class="post-details2  mb-50">
                                    <!-- Small Section Tittle -->
                                    <div class="small-section-tittle">
                                        <h4>Required Knowledge, Skills, and Abilities</h4>
                                    </div>
                                    <ul>
                                        <li>System Software Development</li>
                                        <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                        <li>Research and code , libraries, APIs and frameworks</li>
                                        <li>Strong knowledge on software development life cycle</li>
                                        <li>Strong problem solving and debugging skills</li>
                                    </ul>
                                </div>
                                <div class="post-details2  mb-50">
                                    <!-- Small Section Tittle -->
                                    <div class="small-section-tittle">
                                        <h4>Education + Experience</h4>
                                    </div>
                                    <ul>
                                        <li>3 or more years of professional design experience</li>
                                        <li>Direct response email experience</li>
                                        <li>Ecommerce website design experience</li>
                                        <li>Familiarity with mobile and web apps preferred</li>
                                        <li>Experience using Invision a plus</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- Right Content -->
                        <div class="col-xl-4 col-lg-4">
                            <div class="post-details3  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Overview</h4>
                                </div>
                                <ul>
                                    <li>Posted date : <span><?php echo $job['posted_date']; ?></span></li>
                                    <li>Location : <span><?php echo $job['location']; ?></span></li>
                                    <li>Vacancy : <span><?php echo $job['no_of_vacancy']; ?></span></li>
                                    <li>Job nature : <span><?php echo $job['available_for']; ?></span></li>
                                    <li>Salary : <span><?php echo $job['salary']; ?></span></li>
                                    <li>Application date : <span><?php echo $job['deadline']; ?></span></li>
                                </ul>
                                <div class="apply-btn2">
                                    <a href="apply-job.php" id="openPopup" class="btn">Apply Now</a>
                                </div>
                                <div class="popup-overlay" id="popupOverlay"></div>
                                <div class="popup">
                                    <h2>Apply Now</h2>
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <label for="imageUpload">Upload CV:</label>
                                        <input type="file" id="imageUpload" name="imageUpload" /><br><br>

                                        <label for="textArea">Enter Text:</label>
                                        <textarea id="textArea" name="textArea" rows="4" cols="50"></textarea>

                                        <button type="submit" style="background-color: blue;" class="apply-btn">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="post-details4  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Company Information</h4>
                                </div>
                                <span>Colorlib</span>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <ul>
                                    <li>Name: <span>Colorlib </span></li>
                                    <li>Web : <span> colorlib.com</span></li>
                                    <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php   }
        ?>
        <!-- job post company End -->

    </main>


    <script>
        // JavaScript to handle the popup functionality
        const openPopupButton = document.getElementById("openPopup");
        const popupOverlay = document.getElementById("popupOverlay");
        const popup = document.getElementsByClassName("popup");

        openPopupButton.addEventListener("click", () => {
            console.log("Button clicked"); // Add this line for debugging
            popupOverlay.style.display = "block";
            popup.style.display = "block";
        });

        popupOverlay.addEventListener("click", () => {
            console.log("Overlay clicked"); // Add this line for debugging
            popupOverlay.style.display = "none";
            popup.style.display = "none";
        });
    </script>


</body>

</html>