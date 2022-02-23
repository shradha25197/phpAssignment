<?php
session_start();

function getFromCurrencyRate($selectedVal)
{
    include "dbConnection.php";

    $sql = "SELECT * FROM CURRENCY_MASTER WHERE CURRENCY_CODE='$selectedVal'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        $currencyRate = $row['CURRENCY_RATE'];
    }

    echo $currencyRate;
}

function deleteUser($user)
{
    include "dbConnection.php";

    $sql = "DELETE FROM USER_MASTER WHERE USER_ID='$user'";

    if ($conn->query($sql) === TRUE) {
        $result = "SUCCESS";
    } else {
        $result = "FAIL";
    }

    echo $result;
}
if (isset($_POST['fromCurrency'])) {
    if ($_POST['fromCurrency']) {

        getFromCurrencyRate($_POST['fromCurrency']);
    }
}

if (isset($_POST['userInfo'])) {
    if ($_POST['userInfo']) {
        deleteUser($_POST['userInfo']);
    }
}