<?php
include_once 'session.php';
if ($_POST['action'] == 'check_username') {
    $username = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($query) > 0) {
        echo "1";
        exit();
    } else {
        echo "0";
    }
}
if ($_POST['action'] == 'check_email') {
    $email = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        echo "1";
        exit();
    } else {
        echo "0";
    }
}
if ($_POST['action'] == 'check_mobile') {
    $mobile = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE mobile='$mobile'");
    if (mysqli_num_rows($query) > 0) {
        echo "1";
        exit();
    } else {
        echo "0";
    }
}

if ($_POST['action'] == 'delete_notice') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM noticeboard WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_post') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM posts WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_poll') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM poll WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_forum') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM forums WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_year') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `year` WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_dept') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `department` WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_education') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `education` WHERE id='$id'")) {
        echo true;
    }
}
