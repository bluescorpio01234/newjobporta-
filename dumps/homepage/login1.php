<?php
session_start();
include('connection.php');

$userId = $_POST['id'];
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];
$userRole = 1;



$loginQuery = "SELECT * FROM users WHERE email = '$userEmail' && password = '$userPassword' ";


$data =  mysqli_query($conn, $loginQuery);

$total = mysqli_num_rows($data);

if ($total > 0) {


    $_SESSION['user_email'] = $userEmail;
    $_SESSION['user_id'] = $userId;

    if ($userRole == 0) {

        header('location:user-index.php');
    } else if ($userRole == 1) {
        header('location:../dashboard/index.php');
    }
} else {
    header('location:register-form.php');
}
$_SESSION['user_email'] = $userEmail['email'];
$_SESSION['role'] = $userRole['role'];
header('location: index.php');
