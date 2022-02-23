<?php
session_start();
include "header.php";

if ($_POST['action'] == "A") {
    addUser();
}

function addUser()
{
    include "dbConnection.php";

    $sql = "INSERT INTO user_master (USER_NAME, USER_PASSWORD, USER_EMAIL,USER_ADDRESS,USER_ADDED_DATE)
VALUES ('" . $_POST['userName'] . "', '" . $_POST['userPass'] . "', '" . $_POST['email'] . "','" . $_POST['address'] . "',now())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        logger("%file% %level% %message%", [
            "level" => "info",
            "message" => " New Record Created Successfully For " . $_POST['userName'],
            "file" => __FILE__
        ]);
        $headers = "From: 25shradha25@gmail.com";
        mail($_POST['email'], "subject", "msg body", $headers);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        logger("%file% %level% %message%", [
            "level" => "Error",
            "message" => " Error: " . $sql . "<br>" . $conn->error,
            "file" => __FILE__
        ]);
    }
}