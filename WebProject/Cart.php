<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php
	session_start();
	$dbname = "g00398283";
	$connect = mysqli_connect(host: "localhost", user:"root", password:"", $dbname );
	
	if(isset($_SESSION['cart'])){
		$item_array_id = array_column($_SESSION['cart'], column:"id");
		if (!in_array($_GET["id"],$item_array_id)){
			$count = count($_SESSION["cart"]);
			$item_array = array(
			"id" => $_GET["id"],
			"item_name" => $_POST["hidden_name"],
			"product_price" => $_POST["hidden_price"],
			"item_quantity" => $_POST["quantity"],
		);
		$_SESSION["cart"][$count]=$item_array;
		echo '<sript>window.location=""Cart.php"</script>'
	}else{
		echo '<script>alert("Product is already in cart")</script>'
		echo '<script>window.location="Cart.php"</script>'
	}else{
		$item_array= array(
		"id" => $_GET["id"],
		"item_name" => $_POST["hidden_name"],
		"product_price" => $_POST["hidden_price"],
		"item_quantity" => $_POST["quantity"],
		);
		$_SESSION["cart"][0] = $item_array;
	}
	}
	if(isset($_GET["action"])){
		if($_GET["action"] == "delete"){
			foreach($_SESSION["cart"] as $keys =>$value){
				if($value["product_id"] == $_GET["id"]){
					unset($_SESSION["cart"][$keys]);
					echo '<script>alert("Product has been removed from basket")</script>'
					echo '<script>window.location="Cart.php"</script>'
				}
			}
		}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Craft Beer Ireland</title>
	<link rel = "stylesheet" href = "projectstyle.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container" style=width:65%">
	<h2>Shopping Cart</h2>
	<?php
		$query = "SELECT * FROM products ORDER BY id" ASC;
		$result = mysqli_query($connect, $query);
		if(my_sqli_num_rows($result) > 0){
			
			while($row = my_sqli_fetch_array($result)){
			?>
			
		<div class="coll-md-3">
			<form method="post" action="Cart.php?action=add&id=<?php echo $row['id'] ?>">
			
		<div>
		<img src = "<?php echp $row['image']?>" class="img-responsive">
		)
		<h5 class="text-info"><?php echo $row['name'];?></h5>
		<h5 class="text-danger"><?php echo $row['price'];?></h5>
		<input type="text" name="quantity" class="form-control" vale="1">
		<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>">
		<input type="hidden" price="hidden_price" value="<?php echo $row['price']; ?>>
		input type="submit" name="add" style="margin-top: 5px" class="btn btn-success" value="Add to Basket">
		</div>
		<?php
		
		
		?>
		
		<div style="clear: both"></div>
		<h3 class = "title2">Our Products</h3>
		<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th width="30%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width= "13%">Price</th>
				<th width= "10%">Total Price</th>
				<th width= "17%">Remove Item</th>
			</tr>
		
		<?php
		if(!empty($_SESSION['cart'])){
			$total = 0;
			foreach($_SESSION['cart'] as $key => $value){
				?>
			<tr>
			<td><?php echo $value['item_name']; ?></td>
			<td><?php echo $value['item_quantity']; ?></td>
			<td>$<?php echo $value['item_price']; ?></td>
			<td>$ <?php echo number_format(number: $value['item_quantity'] * $value['product_price'], decimals;2);?></td>
			<td><a href = "Cart.php?action=delete&id=<?php echo $value['product_id']; ?><span class ="text-danger">Remove Item</span></a></td>
			</tr>
			<?php
			$total = $total +($value['item_quantity'] + $value['product_price']);
			}?>
			<tr>
				<td colspan="3" align-"right">Total</td>
				<th align="right">$ <?php echo number_format($total,decimal:2)?></th>
			</tr>
			<?php
			}
			?>
		</table>
		
		</div>
		
		</div>
			
			}
		}
	
<div class="container" style=width:65%">
	<h3 align = "center">Shopping Cart</h2>
	<?php
		$query = "SELECT * FROM products ORDER BY id ASC";
		$result = mysqli_query($connect, $query);
		if(my_sqli_num_rows($result) > 0){
			
			while($row = my_sqli_fetch_array($result)){
			?>
			
		<div class="col-md-3">
			<form method="post" action="project.html?action=add&id=<?php $row["id"]; ?>">
			
		<div>
		<img src = "<?php echp $row['image']?>" class="img-responsive" /><br/>
		)
		<h4 class="text-info"><?php echo $row['name'];?></h4>
		<h4 class="text-danger"><?php echo $row['price'];?></h4>
		<input type="text" name="quantity" class="form-control" vale="1">
		<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>">
		<input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>>
		
		
		input type="submit" name="add" style="margin-top: 5px" class="btn btn-success" value="Add to Basket">
		</div>
		<?php
		
		
		?>
		
		<div style="clear: both"></div>
		<h3 class = "title2">Our Products</h3>
		<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th width="30%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width= "13%">Price</th>
				<th width= "10%">Total Price</th>
				<th width= "17%">Remove Item</th>
			</tr>
		
		<?php
		if(!empty($_SESSION['cart'])){
			$total = 0;
			foreach($_SESSION['cart'] as $key => $value){
				?>
			<tr>
			<td><?php echo $value["item_name"]; ?></td>
			<td><?php echo $value["item_quantity"]; ?></td>
			<td>$<?php echo $value["item_price"]; ?></td>
			<td>$ <?php echo number_format(number: $value["item_quantity"] * $value["product_price"], decimals;2);?></td>
			<td><a href = "project.html?action=delete&id=<?php echo $value["product_id"]; ?><span class ="btn btn-danger">Remove Item</span></a></td>
			</tr>
			<?php
			$total +($value["item_quantity"] + $value["product_price"]);
			}?>
			<tr>
				<td colspan="3" align="right">Total</td>
				<th align="right">$ <?php echo number_format($total,2)?></th>
			</tr>
			<?php
			}
			?>
		</table>
		
		</div>
		
		</div>
			
			}
		}
		</div>
<?php
	error_reporting(0);
	session_start();
	$dbname = "g00398283";
	$connect = mysqli_connect(host: "localhost", user:"root", password:"", $dbname );
	
	if(isset($_POST["add"])){
		if(isset($_SESSION["cart"])){
			$item_array_id = array_column($_SESSION["cart"], column:"product_id");
			if (!in_array($_GET["id"],$item_array_id)){
				$count = count($_SESSION["cart"]);
				$item_array = array(
				"product_id" => $_GET["id"],
				"item_name" => $_POST["hidden_name"],
				"product_price" => $_POST["hidden_price"],
				"item_quantity" => $_POST["quantity"],
			);
			$_SESSION["cart"][$count]=$item_array;
			echo "<script>window.location="project.html"</script>"
			}else{
			echo "<script>alert("Product is already in cart")</script>"
			echo "<script>window.location="project.html"</script>"
	}else{
		$item_array= array(
		"product_id" => $_GET["id"],
		"item_name" => $_POST["hidden_name"],
		"product_price" => $_POST["hidden_price"],
		"item_quantity" => $_POST["quantity"],
		);
		$_SESSION["cart"][$count] = $item_array;
	}
	}
	if(isset($_GET["action"])){
		if($_GET["action"] == "delete"){
			foreach($_SESSION["cart"] as $keys =>$value){
				if($value["product_id"] == $_GET["id"]){
					unset($_SESSION["cart"][$keys]);
					echo "<script>alert("Product has been removed from basket")</script>"
					echo "<script>window.location="project.html"</script>"
				}
			}
		}
	}
?>



</body>
</html>