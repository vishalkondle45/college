<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');

if (empty($_SESSION['usertype']) || $_SESSION['role'] != 'student') {
    echo "<script>window.location.href='../index.php';</script>";
}

$usertype = $_SESSION['usertype'] = 'users';
$userid = $_SESSION['userid'];
$collegeid = $_SESSION['collegeid'];

$query = mysqli_query($conn, "SELECT * FROM college WHERE id = '$collegeid'");
$row = mysqli_fetch_array($query);
if ($row['status'] == 0) {
    echo "<script>alert('Your College Account is Currently Deactivate!! Contact Admin!');window.location.href='../index.php';</script>";
}
$college_name = $row['username'];

$query1 = mysqli_query($conn, "SELECT * FROM users WHERE `id`='$userid'");
$user_row = mysqli_fetch_assoc($query1);
$user_key = $user_row['unique_key'];
$email = $user_row['email'];
$user_id = $user_row['username'];
$user_department = $user_row['department'];
$user_year = $user_row['education'];
$flname = $user_row['fname'] . ' ' . $user_row['lname'];

$query2 = mysqli_query($conn, "SELECT * FROM college WHERE `id`='$collegeid'");
$college_row = mysqli_fetch_assoc($query2);

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
