
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
<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname ="g00398283";
//Connecting to database
$connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
//adding items to shopping cart
if(isset($_POST["add_to_cart"])){
	if(isset($_SESSION["shopping_cart"])){
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
			'item_id' => $_GET["id"],
			'item_name' => $_POST["hidden_name"],
			'item_price' => $_POST["hidden_price"],
			'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count]= $item_array;
			//creates an array of products in cart
		}else{
			echo '<script>alert("Already in Basket")</script>';
			echo '<script>window.location="project.php"</script>';
		}
		
	}else{
		$item_array=array(
		'item_id' => $_GET["id"],
		'item_name' => $_POST["hidden_name"],
		'item_price' => $_POST["hidden_price"],
		'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
if(isset($_GET["action"])){
	//Removing item from cart
	if($_GET["action"] == "delete"){
		foreach($_SESSION["shopping_cart"] as $keys => $values){
			if($values["item_id"]== $_GET["id"]){
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="project.php"</script>';
			}
		}
	}
}


?>
<style>
	
	html body{
		/* Change background color to grey*/
		background-color: rgb(120,120,120);
		}
</style>
	<!--Navigation bar with site name, links to products and login-->
	<!--Code from https://www.youtube.com/watch?v=4sosXZsdy-s&t=1945s-->
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Craft Beer Ireland</a>
			<!--Toggler is automatically aligned to the right when used after navbar-brand-->
			<!--Navbar options set to hamburger icon when screen-size is less than large-->
			<button class="navbar-toggler" type="button"
			data-bs-toggle="collapse" data-bs-target="#navmenu">
				<span class="navbar-toggler-icon"</span>
			</button>
			
			<div class="collapse navbar-collapse" id="navmenu">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a href="#beers" class="nav-link">Beers</a>
					</li>
					<li class="nav item">
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalForm">Login</button>
							<div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<!-- Login Form from login button -->
											<form action="">
												<div class="modal-header">
												<h5 class="modal-title">Login</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
										<div class="modal-body">
										<div class="mb-3">
										<!-- Username entry-->
										<label for="Username">Username<span class="text-danger">*</span></label>
										<input type="text" name="username" class="form-control" id="Username" placeholder="Enter Username">
										</div>

										<div class="mb-3">
										<!-- Pasword Entry-->
										<label for="Password">Password<span class="text-danger">*</span></label>
										<input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
										</div>
    
										</div>
										<div class="modal-footer pt-4"> <!-- Submit button runs validate() function from javascript below -->                 
											<input type="submit" class="btn" onClick="validate()"/>
										</div>
 
											</form>
									</div>
								</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<!--Carousel-->
<!-- Code taken from http://meeny.com/2020/07/22/shuffle-carousel-slides/ -->
<div id="carousel" class="carousel slide" data-bs-ride="carousel">
	<ol class ="carousel-indicators">
		<!-- Carousel slideshow -->
		<li data-target"#carousel" data-bs-slide-to="0" class="active"></li>
		<li data-target=#carousel" data-bs-slide-to="1"></li>
		<li data-target=#carousel" data-bs-slide-to="2"></li>
		<li data-target=#carousel" data-bs-slide-to="3"></li>
		<li data-target=#carousel" data-bs-slide-to="4"></li>
		<li data-target=#carousel" data-bs-slide-to="5"></li>
		<li data-target=#carousel" data-bs-slide-to="6"></li>
		<li data-target=#carousel" data-bs-slide-to="7"></li>
		<li data-target=#carousel" data-bs-slide-to="8"></li>
		<li data-target=#carousel" data-bs-slide-to="9"></li>
		<li data-target=#carousel" data-bs-slide-to="10"></li>
	</ol>
	<div class = "carousel-inner">
	<!-- images input, with size setting -->
		<div class="carousel-item active">
			<img id="img0" src="craftpic.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img1" src="craftpic1.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img2" src="craftpic2.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img3" src="craftpic3.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img4" src="craftpic4.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img5" src="craftpic5.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img6" src="craftpic6.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img7" src="craftpic7.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img8" src="craftpic8.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img9" src="craftpic9.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<div class="carousel-item">
			<img id="img10" src="craftpic10.png" class="d-block mx-auto" style="width:197px;height:256px">
		</div>
		<!--Slider control buttons-->
		<a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>  
	</div>
	
	
<!--Shopping Trolley-->	
<!--Code from https://www.youtube.com/watch?v=0wYSviHeRbs-->
	<div class="container" style="width:700px;">
		<!--product showcase-->
		<h3 align="center">Our Beers</h3>
		<!-- Product information from database-->
		<?php
		$query = "SELECT * FROM products Order BY id ASC";
		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
			?>
			<div class="col-md">
			<!--Form used to create product displays-->
				<form method="post" action="project.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius: 5px; padding:16px" align="center">
					<!--Product information from database-->
						<img src="projectFolder\project_images\" "<?php echo $row["image"]; ?>" class="img-responsive" style="width: 150; height:200px"/><br />
						<h4 class="text-info"><?php echo $row["name"]; ?></h4>
						<h4 class="text-danger"><?php echo $row["price"]; ?></h4>
						<input type="text" name="quantity" class="form-control" value="1" />
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
						<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Add to Trolley" />
					</div>
				</form>
			</div>
			<?php
			}
		}
	?>
	<div style="clear:both"></div>
	<!--Order Summary-->
	<h3>Your Order</h3>
	<div class = "table-responsive">
		<table class="table table-bordered" Style="color:white">
			<tr>
			<!--Order summary Table-->
				<th width="40%">Beer Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price</th>
				<td><a href="#" class="btn btn-info" onclick="empty_cart">Checkout</a></td>
			</tr>
			<?php
			if(!empty($_SESSION["shopping_cart"])){
				$total = 0;
				foreach($_SESSION["shopping_cart"] as $keys => $values){
			?>
			<tr>
				<td><?php echo $values["item_name"]; ?></td>
				<td><?php echo $values["item_quantity"]; ?></td>
				<td><?php echo $values["item_price"]; ?></td>
				<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
				<!--Remove product from cart option-->
				<td><a href="project.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="test-danger">Remove</span></a></td>
			</tr>
			<!--Calculate total cost-->
			<?php
				$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
			?>
			
			<tr>
				<td colspan="3" align= "right">Total</td>
				<td align="right"><?php echo number_format($total, 2); ?></td>
			<?php
			}
			?>
			
		</table>
	</div>
	
	</div>
</div>
<script>
//Make carousel image random order   
   function shuffle(picArray) {
        for (let i = picArray.length - 1; i > 0; i--) {
            let j = Math.floor(Math.random() * (i + 1));
            [picArray[i], picArray[j]] = [picArray[j], picArray[i]];
        }
    }
	//Populate image array with images common to database, also in project folder
    let picArray = ["craftpic.png" ,"craftpic1.png", "craftpic2.png",
"craftpic3.png",
"craftpic4.png",
"craftpic5.png",
"craftpic6.png",
"craftpic7.png",
"craftpic8.png",
"craftpic9.png",
"craftpic10.png"];
        
    shuffle(picArray);
//shuffle this array to return a new starting image each time
//Code block taken from http://meeny.com/2020/07/22/shuffle-carousel-slides/
    let k = 3;
    for(let i = 0; i < k; ++i ){
        document.getElementById("img" + i).src = "project_images/" + picArray[i];
    }

</script>
<script>
//Function to clear shopping cart. used in checkout button.
function clear_cart(){
	if(checkout){
		document.["shoping_cart"].command.value="empty_cart";
		document.["shoping_cart"].submit();
		
	}
}
</script>

<script>
//Login validation check, username set to 'user' and password set to 'pass'
function validate(){
var username = document.getElementById("Username").value;
var password = document.getElementById("Password").value;

if (username == "user" && password == "pass"){
	alert ("You are logged in!");
	return true;
}
else{
	alert("Incorrect Login details");
	return false;
}
}
</script>


 
<script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>