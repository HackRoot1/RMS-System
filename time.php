<?php

date_default_timezone_set("Asia/Kolkata");
// $date = date("Y-m-d");
// // get current time
// $time = date("h:i:s");

// Fetch the current date
$current_date = date('Y-m-d');

// Calculate the next day's date
$next_day = date('Y-m-d', strtotime('+1 day', strtotime($current_date)));

// Calculate the day after the next day's date
$day_after_next = date('Y-m-d', strtotime('+2 days', strtotime($current_date)));