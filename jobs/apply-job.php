<?php
include('../homepage/connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "../logos/"; // Folder for storing CVs
    $fileName = basename($_FILES["imageUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Check if file is uploaded successfully
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFilePath)) {
        // Retrieve user_id from the session (assuming it's set during login)
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $job_id = $_POST['jobId']; // Retrieve job_id from the form
            
            // Check if the user has already applied for this job
            $checkSql = "SELECT * FROM applied_jobs WHERE users_id = '$user_id' AND jobs_id = '$job_id'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) == 0) {
                // User has not applied before, so insert the application
                $insertSql = "INSERT INTO applied_jobs (users_id, jobs_id, cv) VALUES ('$user_id', '$job_id', '$targetFilePath')";
                $insertResult = mysqli_query($conn, $insertSql);

                if ($insertResult) {
                    // Application inserted successfully, now log the interaction
                    $interaction_type = "apply";
                    $timestamp = date('Y-m-d H:i:s');
                    
                    // Insert into user_job_interactions
                    $interactionSql = "INSERT INTO user_job_interactions (user_id, job_id, interaction_type, timestamp) VALUES ('$user_id', '$job_id', '$interaction_type', '$timestamp')";
                    $interactionResult = mysqli_query($conn, $interactionSql);
                    
                    if ($interactionResult) {
                        $_SESSION["success_msg"] = "Application submitted successfully!";
                    } else {
                        $_SESSION["error_msg"] = "Application submitted, but interaction logging failed.";
                    }
                    
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
            echo "User not authenticated."; // Handle the case where the user is not authenticated
        }
    } else {
        $_SESSION["error_msg"] = "File upload failed.";
        header("location: http://localhost/myjobwebsite/jobs/jobs.php?job_id=" . $job_id);
    }
}
?>
