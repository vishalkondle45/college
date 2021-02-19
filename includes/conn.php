<?php
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
if (!$conn) {
    echo "<script>alert('DB Connection Error!!')</script>";
}
