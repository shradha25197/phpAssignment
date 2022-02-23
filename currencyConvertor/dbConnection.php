<?php
$sname = "localhost";

$unmae = "root";

$password = "";

$db_name = "currencyConvertor";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (! $conn) {

    echo "Connection failed!";
    logger("%file% %level% %message%", [
        "level" => "Error",
        "message" => " Connection Failed For Database.",
        "file" => __FILE__
    ]);
}