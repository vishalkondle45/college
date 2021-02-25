<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
if ($_SESSION['user'] != 'normal' || empty($_SESSION)) {
    echo "Session_Error";
    exit();
}
