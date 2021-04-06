<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');

if (empty($_SESSION['usertype']) || $_SESSION['role'] != 'admin') {
    echo "<script>window.location.href='../index.php';</script>";
}
