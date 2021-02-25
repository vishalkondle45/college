<?php
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
$usertype = $_SESSION['usertype'] = 'users';
$userid = $_SESSION['userid'] = 1;
$collegeid = $_SESSION['collegeid'] = 1;

$query1 = mysqli_query($conn, "SELECT * FROM users WHERE `id`='$userid'");
$user_row = mysqli_fetch_assoc($query1);

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
