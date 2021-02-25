<?php
include_once 'session.php';
if ($_POST['action'] == 'check_username') {
    $username = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($query) > 0) {
        echo $username;
    }
}
if ($_POST['action'] == 'check_email') {
    $email = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        echo $email;
    }
}
if ($_POST['action'] == 'check_mobile') {
    $mobile = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE mobile='$mobile'");
    if (mysqli_num_rows($query) > 0) {
        echo $mobile;
    }
}
