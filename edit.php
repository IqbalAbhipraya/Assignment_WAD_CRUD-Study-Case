<?php
// include database connection file
include_once("config.php");
 
	// Check if form is submitted for user update, then redirect to homepage after update
	if(isset($_POST['update'])){	
		$id = $_POST['id'];
	
		$name=$_POST['name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
	
		
		// update user data
		$result = mysqli_query($mysqli, "UPDATE product SET name='$name', quantity='$quantity', price='$price' WHERE id=$id");
			
		// Redirect to homepage to display updated user in list
		header("Location: index.php");
		
	}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM product WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name'];
	$quantity = $user_data['quantity'];
	$price = $user_data['price'];
}
?>
<html>
<head>	
	<link rel="stylesheet" href="style.css">
	<title>Edit Product Data</title>
</head>
 
<body>
	<div class="top-button">
		<a href="index.php" class="button">Go To Home</a>
	</div>

	<form name="update_product" method="post" action="edit.php" class="input-form">
		<table border="0" class="input-table">
			<tr> 
				<td><label for="name">Name</label></td>
				<td>:</td>
				<td><input type="text" name="name" id="name" value=<?php echo $name;?> required></td>
			</tr>
			<tr> 
				<td><label for="quantity">Quantity</label></td>
				<td>:</td>
				<td><input type="number" name="quantity" id="quantity" value=<?php echo $quantity;?>></td>
			</tr>
			<tr> 
				<td><label for="price">Price</label></td>
				<td>:</td>
				<td><input type="number" name="price" id="price" value=<?php echo $price;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td></td>
				<td><input type="submit" name="update" value="Update" class="submit-button"></td>
			</tr>
		</table>
	</form>
</body>
</html>