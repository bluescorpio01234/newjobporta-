<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../homepage/connection.php");
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    $query = "SELECT j.*, c.name AS company_name, c.logo AS company_logo FROM jobs j
JOIN company c ON j.company_id = c.id
WHERE j.id = $job_id";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $job = mysqli_fetch_assoc($result);
    if ($job) {
        print_r($job); // Debugging output to see the contents of $job
    }
}
