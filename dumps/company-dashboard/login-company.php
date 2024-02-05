<?php
session_start();
include('connection.php');

$uid =  $_GET['uid'];

if (strlen($uid) < 1) {
    echo "Hello ";
    return;
}
$sql = "SELECT * FROM company where identifier = '$uid'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
if ($row <= 0) {
    echo "No row";
    return;
}
