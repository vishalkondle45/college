<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
if (isset($_SESSION['usertype']) && !empty($_SESSION['usertype'])) {
} else {
    echo "<script>window.location.href='../index.php'</script>";
}
