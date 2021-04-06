<?php
include_once 'session.php';
// session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
session_unset();
session_destroy();
echo "<script>window.location.href='../index.php';</script>";
