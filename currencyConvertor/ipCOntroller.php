<?php
session_start();
include "header.php";

if ($_POST['action'] == "A") {
    addIp();
}

function addIp()
{
    include "dbConnection.php";

    $sql = "INSERT INTO authorization (IP) VALUES ('" . $_POST['ip'] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New IP Record added successfully";
        logger("%file% %level% %message%", [
            "level" => "info",
            "message" => " New IP Record added successfully of " . $_POST['ip'],
            "file" => __FILE__
        ]);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        logger("%file% %level% %message%", [
            "level" => "Error",
            "message" => " Error: " . $sql . "<br>" . $conn->error,
            "file" => __FILE__
        ]);
    }
}