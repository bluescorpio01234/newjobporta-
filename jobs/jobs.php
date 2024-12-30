<?php
include("../homepage/connection.php");
include('../include/include.php');

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    $query = "SELECT j.*, c.name AS company_name, c.logo AS company_logo, j.points AS job_points, j.skills AS job_skills FROM jobs j
JOIN company c ON j.company_id = c.id
WHERE j.id = $job_id";

    $result = mysqli_query($conn, $query);

    $job = mysqli_fetch_assoc($result);
    $points = $job['job_points'];
    $skills = $job['job_skills'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSpace</title>
    <link rel="stylesheet" href="details-style.css">
    <link rel="stylesheet" href="bac.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .job-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .job-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .job-card h3 {
            margin: 10px 0;
            font-size: 1.2em;
        }

        #imageUpload {
            position: absolute;

        }

        .apply-form {
            background-color: aliceblue;
            width: 250px;
            height: 600px;
            margin-left: 30px;
            margin-top: 30px;
        }

        .apply-bn {
            background-color: blue;
            height: 30px;
            width: 5rem;
            margin-bottom: 10px;
        }

        .apply-bn:hover {
            background-color: blueviolet;
        }

        .message {
            width: 100%;
            position: relative;
            margin-bottom: 60px;
            display: flex;
            justify-content: center;

        }

        .message .success {
            font-size: 20px;
            color: green;
            position: absolute;
            animation: buttons .3s linear;
            display: none;
        }

        .message .danger {
            font-size: 20px;
            color: red;
            position: absolute;
            animation: buttons .3s linear;
            display: none;
        }

        footer {
            position: relative;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgb(205, 220, 234);
            height: auto;
            width: 100vw;
            font-family: "open sans";
            padding-top: 40px;
            color: rgb(236, 241, 246);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .footer-content h3 {
            font-size: 1.8rem;
            font-weight: 400;
            text-transform: capitalize;
            line-height: 3rem;
        }

        .footer-content p {
            max-width: 500px;
            margin: 10px auto;
            line-height: 28px;
            font-size: 1px;
        }

        .socials {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem 0 3rem 0;
        }

        .socials li {
            margin: 0 10px;
        }

        .socials a {
            text-decoration: none;
            color: rgb(4, 27, 47);
        }

        .socials a i {
            font-size: 1.1rem;
            transition: color 0.4s ease;
        }

        .socials a:hover i {
            color: aqua;
        }

        .footer-bottom {
            background-color: rgb(176, 196, 213);
            width: 100vw;
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom p {
            font-size: 14px;
            word-spacing: 2px;
            text-transform: capitalize;
        }

        .footer-bottom span {
            text-transform: uppercase;
            opacity: 0.4;
            font-weight: 200;
        }

        @keyframes buttons {
            0% {
                transform: scale(0.1);
            }

            50% {
                transform: scale(0.5);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <header>
        <!-- Header Start -->
        <nav class="navbar">
            <a href="../homepage/user-index.php" class="logo">JobSpace.</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="../homepage/user-index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="../homepage/user-index.php" class="nav-link">View Jobs</a>
                </li>
                <li class="nav-item">
                    <a href="../homepage/user-index.php" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a href="../homepage/user-index.php" class="nav-link">About Us</a>
                </li>
            </ul>

            <div class="signin-signup">
                <div class="join">
                    <a href="../homepage/my-info.php" class="sign-in">My Profile</a>
                    <a href="../homepage/logout.php" class="sign-up">Log Out</a>
                </div>

                <div id="menu-icon" class="fa-solid fa-bars"></div>
            </div>
        </nav>
        <!-- Header End -->
    </header>
    <?php if ($job) { ?>
        <div class="container">


            <div class="container-1">
                <div class="logo">
                    <img src="../logos/<?php echo $job['company_logo']; ?>" alt="" />
                </div>
                <div class="info">
                    <h3><?php echo $job['title']; ?></h3>
                    <br />

                    <span><?php echo $job['company_name']; ?></span>
                    <span><i class="fas fa-map-marker-alt"></i> <?php echo $job['location']; ?></span>
                    <span><?php echo $job['salary']; ?></span>
                </div>
                <div class="details">
                    <h3>Job Description</h3>
                    <br />
                    <p>
                        <?php echo $job['details']; ?>
                    </p>
                </div>
                <div class="skills">
                    <h3>Required Knowledge</h3>
                    <br />
                    <?php
                    $lines = explode("\n", $points);


                    echo "<ul>";
                    foreach ($lines as $line) {

                        $line = trim($line);
                        if (!empty($line)) {

                            echo "<li>$line</li>";
                        }
                    }
                    echo "</ul>";
                    ?>
                    <div class="skills">
                        <h3>Education + Experience</h3>
                        <br />
                        <?php
                        $lines = explode("\n", $skills);


                        echo "<ul>";
                        foreach ($lines as $line) {

                            $line = trim($line);
                            if (!empty($line)) {

                                echo "<li>$line</li>";
                            }
                        }
                        echo "</ul>";
                        ?>

                    </div>

                </div>
                <div class="container-2">
                    <div class="job-info">
                        <h3>Job Overview</h3>
                        <br /> <br />



                        <li>Posted date : <span class="ov"
                                style="margin-left: 3rem;"><?php echo $job['posted_date']; ?></span></li>
                        <li>Location : <span class="ov" style="margin-left: 4.8rem;"><?php echo $job['location']; ?></span>
                        </li>
                        <li>Vacancy : <span class="ov"
                                style="margin-left: 4.7rem;"><?php echo $job['no_of_vacancy']; ?></span></li>
                        <li>Job nature : <span class="ov"
                                style="margin-left: 3.8rem;"><?php echo $job['available_for']; ?></span></li>
                        <li>Salary : <span class="ov" style="margin-left: 6.1rem;"><?php echo $job['salary']; ?></span></li>
                        <li>Application date : <span class="ov"
                                style="margin-left: 1rem;"><?php echo $job['deadline']; ?></span></li>


                        <form action="apply-job.php" method="POST" enctype="multipart/form-data" class="apply-form">
                            <label for="imageUpload"><strong>Upload CV: </strong></label><br> <br>
                            <input type="file" id="imageUpload" name="imageUpload" /><br><br>
                            <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="userId" />

                            <input type="hidden" value="<?php echo $job_id; ?>" name="jobId" />
                            <button type="submit" id="apply-now" onclick="message()">Apply Now</button>

                            <div class="message">
                                <div class="success" id="success">
                                    Successfully Applied!
                                </div>
                                <div class="danger" id="danger" name="danger">
                                    Can't be Empty!
                                </div>
                            </div>

                    </div>

                </div>
            </div>

        </div>
    <?php }
    ?>

    <?php


    function cosineSimilarity($vec1, $vec2)
    {
        $dotProduct = 0;
        $magnitude1 = 0;
        $magnitude2 = 0;

        foreach ($vec1 as $key => $value) {
            if (isset($vec2[$key])) {
                $dotProduct += $value * $vec2[$key];
            }
            $magnitude1 += $value ** 2;
        }

        foreach ($vec2 as $value) {
            $magnitude2 += $value ** 2;
        }

        $magnitude1 = sqrt($magnitude1);
        $magnitude2 = sqrt($magnitude2);

        if ($magnitude1 * $magnitude2 == 0) {
            return 0;
        } else {
            return $dotProduct / ($magnitude1 * $magnitude2);
        }
    }


    function textToVector($description)
    {

        $cleanedDesc = strtolower(preg_replace('/[^\w\s]/', '', $description));


        $words = explode(' ', $cleanedDesc);


        $stopWords = array('the', 'and', 'in', 'with', 'is', 'for', 'a', 'of', 'to', 'an', 'by');
        $keywords = array_diff($words, $stopWords);


        $frequency = array_count_values($keywords);
        return $frequency;
    }


    $currentJobId = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;
    if ($currentJobId == 0) {
        die("Invalid job ID.");
    }


    $conn = new mysqli('localhost', 'root', '', 'jobportal');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $currentJobQuery = "SELECT j.points, c.name AS company_name, c.logo AS company_logo FROM jobs j JOIN company c ON j.company_id = c.id WHERE j.id = ?";
    $stmt = $conn->prepare($currentJobQuery);
    $stmt->bind_param("i", $currentJobId);
    $stmt->execute();
    $result = $stmt->get_result();
    $currentJob = $result->fetch_assoc();
    if (!$currentJob) {
        die("Job not found.");
    }
    $currentJobDescription = $currentJob['points'];


    $jobQuery = "SELECT j.id, j.points, j.title, j.location, c.name AS company_name, c.logo AS company_logo FROM jobs j JOIN company c ON j.company_id = c.id WHERE j.id != ? ";
    $stmt = $conn->prepare($jobQuery);
    $stmt->bind_param("i", $currentJobId);
    $stmt->execute();
    $result = $stmt->get_result();
    $jobList = $result->fetch_all(MYSQLI_ASSOC);


    $currentJobVector = textToVector($currentJobDescription);


    $similarityScores = [];
    foreach ($jobList as $job) {
        $jobVector = textToVector($job['points']);
        $similarity = cosineSimilarity($currentJobVector, $jobVector);
        if ($similarity >= 0) {
            $similarityScores[] = [
                'job_id' => $job['id'],
                'similarity' => $similarity,
                'company_logo' => $job['company_logo'],
                'job_title' => $job['title'],
                'location' => $job['location'],
            ];
        }
    }


    usort($similarityScores, function ($a, $b) {
        return $b['similarity'] <=> $a['similarity'];
    });
    $similarityScores = array_slice($similarityScores, 0, 5);


    echo '<div class="job-grid">';
    foreach ($similarityScores as $score) {
        echo '<div class="job-card">';
        echo '<img src="' . htmlspecialchars($score['company_logo']) . '" alt="Company Logo">';
        echo '<a href="?job_id=' . htmlspecialchars($score['job_id']) . '">' . htmlspecialchars($score['job_title']) . '</a>';
        echo '<p>Location: ' . htmlspecialchars($score['location']) . '</p>';
        echo '<p>Similarity Score: ' . round($score['similarity'], 2) . '</p>';
        echo '</div>';
    }
    echo '</div>';

    $conn->close();
    ?>



    <footer>
        <div class="footer-content">
            <h3>JOBSPACE</h3>
            <p style="width: 20px;">yes</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; 2023 All Rights Reserved<span>&nbsp; Arbeen</span></p>
        </div>
    </footer>

    <script>
        function message() {

            var cv = document.getElementById('imageUpload');
            const success = document.getElementById('success');
            const danger = document.getElementById('danger');

            if (cv == "") {
                danger.style.display = 'block';
            } else {
                success.style.display = 'block';
            }
        }
    </script>

</body>

</html>