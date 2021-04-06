<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');

if (empty($_SESSION['usertype']) || $_SESSION['role'] != 'college') {
    echo "<script>alert('Sorry')</script>";
    echo "<script>window.location.href='../index.php';</script>";
} else {
    $collegeid = $_SESSION['userid'];

    $query = mysqli_query($conn, "SELECT * FROM college WHERE id='$collegeid'");
    $row = mysqli_fetch_array($query);
    $college_name = $row['username'];

    $userid = 0;
    $usertype = 'college';
}

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
