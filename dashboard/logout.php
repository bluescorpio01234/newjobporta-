<?php

session_start();

session_unset();

session_destroy();
header('location:../homepage/register-form.php');
exit();
