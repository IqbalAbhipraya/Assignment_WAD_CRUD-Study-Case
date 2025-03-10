<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" href="style.css">
</head>
 
<body>
	<div class="top-button">
		<a href="index.php" class="button">Go to Home</a>
	</div> 
	<form action="add.php" method="post" name="form1" class="input-form">
		<table width="25%" border="0" class="input-table">
			<tr> 
				<td><label for="name">Name</label></td>
				<td>:</td>
				<td><input type="text" name="name" id="name" required></td>
			</tr>
			<tr> 
				<td><label for="quantity">Quantity</label></td>
				<td>:</td>
				<td><input type="number" name="quantity" id="quantity"></td>
			</tr>
			<tr> 
				<td><label for="price">Price</label></td>
				<td>:</td>
				<td><input type="number" name="price" id="price"></td>
			</tr>
			<tr> 
				<td></td>
				<td></td>
				<td><input type="submit" name="Submit" value="Add" class="submit-button" ></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];

		// include database connection file
		include_once("config.php");
			
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO product(name,quantity,price) VALUES('$name','$quantity','$price')");
	
		header("Location:index.php");
	}
	?>
</body>
</html>