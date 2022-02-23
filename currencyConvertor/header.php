<html>
<head>
<link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>

	<div class="topnav">
		<a href="currencyConvertor.php">Currency Convertor</a> <a
			href="updateCurrencyRate.php">Update Currency Rate</a> <a
			href="registration.php">Registration</a> <a href="ipOperation.php">Add
			IP</a> <a href="userInfo.php">Users Info</a>
		<li style="float: right"><a href="logout.php">Logout</a></li>
	</div>

</body>
</html>

<?php

function logger($message, array $data, $logFile = "logger.log")
{
    foreach ($data as $key => $val) {
        $message = str_replace("%{$key}%", $val, $message);
    }
    $message .= PHP_EOL;

    return file_put_contents($logFile, $message, FILE_APPEND);
}
?>