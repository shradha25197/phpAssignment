<?php
session_start();
include "header.php";

?>

<html>
<head>
<script>
function validateIp()
{
var ip=document.getElementById("ip").value;
var form=document.getElementById("ipForm");
form.action="ipCOntroller.php";
if(/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ip))
{
form.submit();
}
else
{
alert("Please enter valid IP");
location.reload();
}
}
</script>
</head>
<body>
	<div class="container">
		<form role="form" id="ipForm" name="ipForm"
			style="max-width: 50%; margin-left: 25%;" action="" method="POST">
			<div class="form-group row">

				<label for="fromCurrency" class="col-sm-2 col-form-label">Ip Address</label>
				<div class="col-sm-10">
					<input type="hidden" id="action" name="action" value="A"> <input
						class="form-control" type="text" id="ip" name="ip"
						oncut="return false" oncopy="return false" onpaste="return false"
						ondrag="return false" ondrop="return false" value="">
				</div>
			</div>

		</form>

		<div class="form-group row" style="width: 10%; margin-left: 25%;">
			<div class="col-sm-10">
				<button onclick="validateIp()">Add IP</button>
			</div>
		</div>
	</div>
</body>
</html>