<?php
session_start();
// Check if the user is not logged in with a valid session
if (!isset($_SESSION['company_id'])) {
    // Redirect to the login page or any other appropriate page
    header("Location: company-login.php");
    exit();
}

include("../homepage/connection.php");

// Function to validate and sanitize input
function validateInput($input)
{
    include('../homepage/connection.php');
    return mysqli_real_escape_string($conn, trim($input));
}

// Retrieve form data and validate/sanitize
$title = validateInput($_POST['title']);
$posted_date = validateInput($_POST['posted_date']);
$deadline = validateInput($_POST['deadline']);
$details = validateInput($_POST['details']);
$points = validateInput($_POST["points"]);
$skills = validateInput($_POST["skills"]);  // Job description or skill details
$location = validateInput($_POST['location']);
$salary = validateInput($_POST['salary']);
$type = validateInput($_POST['type']);
$no_of_vacancy = validateInput($_POST['no_of_vacancy']);
$job_level = validateInput($_POST['job_level']);
$available_for = validateInput($_POST['available_for']);

// Retrieve company ID from session
$company_id = $_SESSION['company_id'];

// Step 1: Run the Python script to dynamically extract skills from job description
$pythonCommand = escapeshellcmd("python extract_skills.py " . escapeshellarg($skills));
$output = shell_exec($pythonCommand);

// Step 2: Decode the JSON output from Python to get the extracted skills
$job_skills = json_decode($output, true);
if (!$job_skills) {
    $job_skills = "";  // Default to an empty string if no skills are found
} else {
    $job_skills = implode(", ", $job_skills);  // Convert to comma-separated string
}

// Step 3: Insert the job into the database, using the dynamically extracted job_skills
$sql = "INSERT INTO jobs (title, posted_date, deadline, details, points, skills, location, salary, type_id, no_of_vacancy, available_for, job_level, company_id, job_skills) 
        VALUES ('$title', '$posted_date', '$deadline', '$details', '$points', '$skills', '$location', '$salary', '$type', '$no_of_vacancy', '$available_for', '$job_level', '$company_id', '$job_skills')";

$stmt = mysqli_prepare($conn, $sql);

if (mysqli_stmt_execute($stmt)) {
    header('location: display-jobs.php');
} else {
    echo "Error adding job: " . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
