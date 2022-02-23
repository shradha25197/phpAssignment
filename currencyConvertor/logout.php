<?php
include 'header.php';

session_start();

session_unset();

session_destroy();

logger("%file% %level% %message%", [
    "level" => "info",
    "message" => " Logged Out Successfully",
    "file" => __FILE__
]);

header("Location: index.php");