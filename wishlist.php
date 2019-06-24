<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/icon.jpg" />
	<title>
		UrStore | Wishlist
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<body>

	<?php
 
		if(isset($_POST["add"])){

							$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$dbname ="urstore1212";

// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$pid=$_POST['add'];
				$uid=$_SESSION["id"];

				$sql = "INSERT INTO cart (product_id,user_id) VALUES ('$pid','$uid')";
				$sql1 = "DELETE FROM wishlist WHERE product_id='$pid' AND user_id='$uid'";

				

				if ($conn->query($sql) === TRUE && $conn->query($sql1)) {
					echo "<script>
					$(window).load(function(){
						$('#myModal1').modal('show');
						});
						</script>";

					}
				}

?>

				<div id="myModal1" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Success</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Product added to cart successfully.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

	<nav class="navbar bg-dark navbar-dark navbar-expand-md fixed-top">
					<a class="navbar-brand" href="index.php">UrStore</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						
						<ul class="nav navbar-nav d-none d-md-block" style="margin-left:950px">
							<li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Hi, 
								<?php echo $_SESSION["fname"]; ?></a>
								<div class="dropdown-menu pull-left">
									<a class="dropdown-item" href="wishlist.php">Wishlist</a>
									<a class="dropdown-item" href="#">Change Password</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div></li>
								<li class="nav-item">
								</li>	
							</ul>
							<ul class="nav navbar-nav d-md-none">
							<li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Hi, 
								<?php echo $_SESSION["fname"]; ?></a>
								<div class="dropdown-menu pull-left">
									<a class="dropdown-item" href="#">Wishlist</a>
									<a class="dropdown-item" href="#">Change Password</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div></li>
								<li class="nav-item">
								</li>	
							</ul>
							
	</nav>





	<div class="card bg-light text-black mt-5">
					<div class="card-header text-center bg-dark text-white">My Wishlist</div>
					<div class="card-body container" style="font-size: 2vw;">
						<div class="row"> 
							<?php 

$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
							$uid=$_SESSION["id"];

							$conn = new mysqli($servername, $username, $password, $db);
					// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							} 
							$product_query="SELECT * FROM products INNER JOIN wishlist on products.product_id=wishlist.product_id WHERE wishlist.user_id='$uid'";
							$result = $conn->query($product_query);

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {
									$product_id= $row['product_id'];
									$product_cat= $row['product_cat'];
									$product_brand= $row['product_brand'];
									$product_title= $row['product_title'];
									$product_price= $row['product_price'];
									$product_image= $row['product_image'];





									echo " 
									<div class='col-md-3 col-sm-6 col-xs-12 mt-4'>
									<div class='card'>
									<div class='card-header text-center' style='font-size:1.5vw;'>$product_title</div>
									<div class='card-body d-none d-md-block'><img src='images/$product_image' style='width:150px;height:300px' class='ml-4'><form method='POST' action='' ><button class='btn btn-sm float-right ' style='background:transparent;' name='wish' onclick='document.getElementById('first').style.color='red';
										' ><i class='fa fa-heart-o ml-2' title='Click to add to wishlist' id='first'></i></button></form></div>
									<div class='card-body d-md-none'><img src='images/$product_image' style='width:150px;height:300px' class='ml-5'></div>
									<div class='card-footer'><span class='mt-md-2' style='font-size:0.8em;'>₹ $product_price.00</span><form method='POST' action='' class='float-right'><button class='btn btn-danger' name='add' value='$product_id'>AddToCart</button></form></div>
									</div></div> 
									";



								}
							}
							$conn->close();
							?>
						</div>
					</div>
					<div class="card-footer text-center bg-dark text-white">&copy; UrStore-2018</div>
				</div>

</body>
</head>
</html>