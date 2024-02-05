<?php
include('../homepage/connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $targetDir = "../logos/"; // Specifying the folder where CVs will be stored
    $fileName = basename($_FILES["imageUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Checking if file is uploaded successfully
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFilePath)) {
        // Retrieving user_id from the session (assuming it's already set during login)
        session_start();
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Retrieving job_id from the form (assuming it's submitted via a hidden field)
            $job_id = $_POST['jobId'];


            // Checking if the user has already applied for this job
            $checkSql = "SELECT * FROM applied_jobs WHERE users_id = '$user_id' AND jobs_id = '$job_id'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) == 0) {
                // User has not applied for this job before, so inserting the application
                $insertSql = "INSERT INTO applied_jobs (users_id, jobs_id, cv) VALUES ('$user_id', '$job_id', '$targetFilePath')";
                $insertResult = mysqli_query($conn, $insertSql);

                if ($insertResult) {
                    // Application inserted successfully
                    header("location: http://localhost/myjobwebsite/jobs/jobs.php?job_id=" . $job_id);
                } else {
                   $_SESSION["error_msg"] = "Application submission failed.";
                    header("location: http://localhost/myjobwebsite/jobs/jobs.php?job_id=" . $job_id);
                   
                }
            } else {
                // User has already applied for this job
                $_SESSION["error_msg"] = "You have already applied for this job.";
                header("location: http://localhost/myjobwebsite/jobs/jobs.php?job_id=" . $job_id);

            }
        } else {
            echo "User not authenticated."; // Handling the case where the user is not authenticated
        }
    } else {
        $_SESSION["error_msg"] = "File upload failed.";
        header("location: http://localhost/myjobwebsite/jobs/jobs.php?job_id=" . $job_id);
    }
}
