<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/icon.jpg" />

	<title>UrStore | Cart</title>
	<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
	<?php
	if(isset($_POST["action"])){
	$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";

							$conn = new mysqli($servername, $username, $password, $db);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							} 
							$pid=$_POST["action"];
							$uid=$_SESSION["id"];


							$sql="DELETE FROM cart WHERE product_id='$pid' AND user_id='$uid'";
							

								if ($conn->query($sql) === TRUE) {
								if($conn->affected_rows > 0){

						$sql1="SELECT product_price FROM products WHERE product_id='$pid'";

							$result = $conn->query($sql1);

							if ($result->num_rows ==1) {

								while($row = $result->fetch_assoc()){
									$product_price=$row['product_price'];
									$_SESSION["total"] = 	$_SESSION["total"] - $product_price ;
								}


					}
				}


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
								<p>Item removed from cart successfully.</p>
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
									<a class="dropdown-item" href="#">Wishlist</a>
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
									<a class="dropdown-item" href="wishlist.php">Wishlist</a>
									<a class="dropdown-item" href="#">Change Password</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div></li>
								<li class="nav-item">
								</li>	
							</ul>
							
	</nav>





	<div class="jumbotron bg-dark" style="height: 20px">
		<h3 class="text-center text-white">My Cart</h3>
	</div>


	<div class="table-responsive jumbotron bg-light mt-4">          
	  <table class="table table-hover table-bordered">
	    <thead>
	      <tr>
	      	<th>Action</th>
	      	<th>Product Preview</th>
	        <th>Product name</th>
	        <th>Price</th>
	      </tr>
	    </thead>
	    <tbody>
	     
	      	<?php 


							$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
							$uid=$_SESSION["id"];
							$total=0;


							$conn = new mysqli($servername, $username, $password, $db);
					// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							} 
							$product_query="SELECT * FROM products INNER JOIN cart on products.product_id=cart.product_id WHERE cart.user_id='$uid'";
;
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
									 <tr>
									<td><form action='' method='POST'><button class='btn btn-sm bg-danger' type='submit' name='action' value='$product_id'><i class='fa fa-remove'></i></button></form></td>
									<td><img src='images/$product_image' style='height:50px;width:30px' /></td>
									<td>$product_title</td>
									<td>₹ $product_price.00</td>

	      							</tr>	

									";


									$total=$total + $product_price;
								
									$_SESSION["total"]=$total;


	}
							}
							$conn->close();
							?>




	    
	      <tr>
	      	<td></td>
	      	<td>
	      	</td>
	      	<td style="font-size: 1.5em;">Total</td>
	      	<td style="font-size: 1.5em;" >₹ <?php echo $_SESSION['total']; ?>.00</td>
	      	</tr>
	      	</tbody>
	  </table> 
	     	   
    </div>









	</body>
</html>