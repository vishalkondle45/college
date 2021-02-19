<?php
session_start();
if ($_SESSION['user'] != 'normal' || empty($_SESSION)) {
    echo "Session_Error";
    exit();
}
