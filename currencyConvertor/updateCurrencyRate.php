<?php
session_start();
include "header.php";
include "dbConnection.php";

$url = 'http://www.floatrates.com/daily/eur.json';
$json = file_get_contents($url);
$json_output = json_decode($json, JSON_PRETTY_PRINT);

$inrRate = $json_output['inr'];
$bsdRate = $json_output['bsd'];
$usdRate = $json_output['usd'];
$eurRate = '1';
/*
 * $inrRate['rate']='1';
 * $bsdRate['rate']='2';
 * $usdRate['rate']='3';
 * $eurRate='4.25';
 */

$currenciesRate = array(
    "INR" => $inrRate['rate'],
    "BSD" => $bsdRate['rate'],
    "USD" => $usdRate['rate'],
    "EUR" => $eurRate
);
$currencies = array(
    "INR",
    "BSD",
    "USD",
    "EUR"
);

foreach ($currencies as $value) {
    $sql = "UPDATE CURRENCY_MASTER SET CURRENCY_RATE=$currenciesRate[$value] WHERE CURRENCY_CODE='$value'";
    logger("%file% %level% %message%", [
        "level" => "info",
        "message" => "Currency Rate Record Updated Successfully For " . $value,
        "file" => __FILE__
    ]);
    logger("%file% %level% %message%", [
        "level" => "info",
        "message" => "Query " . $sql,
        "file" => __FILE__
    ]);
    if ($conn->query($sql) === TRUE) {
        echo "<pre>";
        echo "Record Updated Successfully For " . $value . "\n";
    } else {
        echo "Record Not Updated Successfully For " . $value;
    }
}

?>