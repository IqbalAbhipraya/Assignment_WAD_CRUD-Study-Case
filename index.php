<?php
    include_once("config.php");

    $result = mysqli_query($mysqli, "SELECT * FROM product");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
    <div class="top-button">
        <a href="add.php" class="button">Add new product</a><br><br>
    </div>
    <table width='80%' class="tabledata">
        <tr style="background-color: lightblue;">
            <th>Id</th> <th>Name</th> <th>Quantity</th> <th>Price</th> <th>Update</th>
        </tr>
        <?php  
        while($product_data = mysqli_fetch_array($result)) {  
            echo "<tr class='datarow'>";
            echo "<td>".$product_data['id']."</td>";
            echo "<td>".$product_data['name']."</td>";
            echo "<td>".$product_data['quantity']."</td>";     
            echo "<td>".$product_data['price']."</td>";    
            echo "<td><a href='edit.php?id=$product_data[id]' class='edit-button'>Edit</a> | 
            <a href='delete.php?id=$product_data[id]' class='delete-button' onClick=\"javascript: return confirm('Confirm delete product with Id $product_data[id]');\">Delete</a></td></tr>";        
        }
        ?>
</body>
</html>
