<?php
$conn = mysqli_connect("localhost", "root", "", "jobportal");


if ($conn) {
    // echo "Connected Succesfully";
} else {
    echo "Failed to connect";
}
