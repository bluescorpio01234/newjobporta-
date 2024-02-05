<?php
include('connection.php');
// Function to generate a unique location using Adler-32 algorithm
session_start();

// Retrieve form data
$title = ($_POST['title']);
$posted_date = $_POST['posted_date'];
$deadline = $_POST['deadline'];
$details = $_POST['details'];
$location = $_POST['location'];
$salary = $_POST['salary'];
$type = $_POST['type'];
$company_id = $_SESSION['company_id'];
$no_of_vacancy = $_POST['no_of_vacancy'];
$job_level = $_POST['job_level'];
$available_for = $_POST['available_for'];

//Query
$sql = "INSERT INTO jobs (title, posted_date, deadline, details, location, salary, type_id, company_id, no_of_vacancy, available_for, job_level) VALUES ('$title', '$posted_date', '$deadline', '$details', '$location', '$salary', '$type', '$company_id', '$no_of_vacancy', '$available_for', '$job_level')";
echo $sql;
if (mysqli_query($con, $sql)) {
    header('location:display-jobs.php');
} else {
    echo "Error adding job: " . mysqli_error($con);
}


mysqli_close($con);
