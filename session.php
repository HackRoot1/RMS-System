<?php

session_start();
require("config.php");

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $_SESSION = [];
    header("Location: ../login.php");
}
