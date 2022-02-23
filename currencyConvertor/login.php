<?php
session_start();

include "dbConnection.php";

include 'header.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();
    } else if (empty($pass)) {

        header("Location: index.php?error=Password is required");

        exit();
    } else {

        $sql = "SELECT * FROM user_master WHERE user_name='$uname' AND user_password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['USER_NAME'] === $uname && $row['USER_PASSWORD'] === $pass) {

                echo "Logged in!";

                $_SESSION['USER_NAME'] = $row['USER_NAME'];

                $_SESSION['USER_ID'] = $row['USER_ID'];

                if (! empty($_POST["remember"])) {
                    setcookie("USER_LOGIN", $uname, time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    if (isset($_COOKIE["USER_LOGIN"])) {
                        setcookie("USER_LOGIN", "");
                    }
                }
                $currentIp = $_SERVER['REMOTE_ADDR'];

                if ($currentIp === "::1") {
                    $ipSql = "SELECT * FROM authorization WHERE IP='127.0.0.1'";
                } else {
                    $ipSql = "SELECT * FROM authorization WHERE IP='$currentIp'";
                }

                $ipResult = mysqli_query($conn, $ipSql);

                if (mysqli_num_rows($ipResult) === 1) {
                    logger("%file% %level% %message%", [
                        "level" => "info",
                        "message" => $row['USER_NAME'] . " Logged In Successfully",
                        "file" => __FILE__
                    ]);
                    header("Location: dashBoard.php");
                } else {
                    header("Location: index.php?error=Invalid IP Address ");

                    exit();
                }

                exit();
            } else {

                header("Location: index.php?error=Incorect User name or password");

                exit();
            }
        } else {

            header("Location: index.php?error=Incorect User name or password");

            exit();
        }
    }
} else {

    header("Location: index.php");

    exit();
}