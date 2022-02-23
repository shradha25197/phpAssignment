<?php
session_start();

include "dbConnection.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="loginStyle.css">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
            $(document).ready(function(){           
            $('#currencyFrom').change(function(){
                var inputValue = $(this).val();

                $.post('ajax.php', { fromCurrency: inputValue }, function(data){
                    createCookie("convertRate", data, "10");
                });
            });
        });
        function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}
        
        </script>
</head>
<body>

	<div class="container">
		<form role="form" class="frConverter"
			style="max-width: 50%; margin-left: 25%;" action="#" method="POST">
			<div class="form-group row">

				<label for="fromCurrency" class="col-sm-2 col-form-label">FROM</label>
				<div class="col-sm-10">
					<select id="currencyFrom" name="currencyFrom" class="form-control">
<?php

$sql = "SELECT * FROM CURRENCY_MASTER";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div>
							<span>FROM</span>
	<?php
        if (isset($_POST['currencyFrom'])) {
            if ($row['CURRENCY_CODE'] == $_POST['currencyFrom']) {
                echo '<option value="' . $row['CURRENCY_CODE'] . '" selected>' . $row['CURRENCY_CODE'] . '</option>';
            } else {
                echo '<option value="' . $row['CURRENCY_CODE'] . '">' . $row['CURRENCY_CODE'] . '</option>';
            }
        } else if ($row['CURRENCY_CODE'] == "EUR") {
            echo '<option value="' . $row['CURRENCY_CODE'] . '" selected>' . $row['CURRENCY_CODE'] . '</option>';
        } else {
            echo '<option value="' . $row['CURRENCY_CODE'] . '">' . $row['CURRENCY_CODE'] . '</option>';
        }
        ?>
	</div>
           <?php

}
}

?>
        </select> <br />
				</div>
			</div>

			<div class="form-group row">
				<label for="fromCurrency" class="col-sm-2 col-form-label">Amount</label>
				<div class="col-sm-10">
					<input class="form-control" type="number" step="0.01" id="amount"
						name="amount" oncut="return false" oncopy="return false"
						onpaste="return false" ondrag="return false" ondrop="return false"
						value="<?php echo $_POST['amount'];?>">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-10">
					<button class="form-control">Convert Rate</button>
				</div>
			</div>

			<div class="form-group row" id="exchangeRate">

				<div class="col-sm-10">

					<table border="1">
						<thead>
							<tr>
<?php

$sql = "SELECT * FROM CURRENCY_MASTER";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>

		<th> <?php echo $row['CURRENCY_CODE'];?> </th>
		
		<?php } ?>
		</tr>
						</thead>
						<tbody>
							<tr>
		<?php
    $result1 = mysqli_query($conn, $sql);

    while ($row1 = mysqli_fetch_assoc($result1)) {
        ?>

<td>
<?php
        if (isset($_POST['amount']) && isset($_POST['currencyFrom']) && isset($_COOKIE["convertRate"])) {
            echo $_POST['amount'] / $_COOKIE["convertRate"] * $row1['CURRENCY_RATE'];
        } else {
            echo $row1['CURRENCY_RATE'];
        }

        ?>  </td>

           <?php

}
}

?>
        
</tr>
						</tbody>
					</table>
					<br />
				</div>
			</div>

		</form>

	</div>


</body>
</html>

