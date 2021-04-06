<?php
include_once 'session.php';
$userid = $_GET['id'];
$user = $_GET['user'];

if (!empty($user) || !empty($user)) {
    if ($user == 'college') {
        if (mysqli_query($conn, "DELETE FROM college WHERE id='$userid'")) {
            echo "<script>alert('Deletion Successfull!!') window.location.href='colleges.php' </script>";
        }
    } elseif ($user == 'student' || $user == 'teacher') {
        if (mysqli_query($conn, "DELETE FROM users WHERE id='$userid'")) {
            echo "<script>alert('Deletion Successfull!!')</script>";
            if ($user == 'student')
                echo "<script>window.location.href='students.php'</script>";
            else
                echo "<script>window.location.href='teachers.php'</script>";
        }
    }
}
