<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="shortcut icon" href="images/icon.jpg" />
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>

li.dropdown:hover .dropdown-menu{
	display: block;
}
.nav-link{
	color: white;   
}
.navbar-brand{
	color: white;
}
.carousel-inner img {
	width: 100%;
	height: 300px;
}
</style>
<title>UrStore | Home</title>
</head>
<body>
	<?php
 
		if(isset($_POST["add"])){

				$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$pid=$_POST['add'];
				$uid=$_SESSION["id"];

				$sql = "INSERT INTO cart (product_id,user_id) VALUES ('$pid','$uid')";

				

				if ($conn->query($sql) === TRUE) {
					echo "<script>
					$(window).load(function(){
						$('#myModal1').modal('show');
						});
						</script>";

					}
				}




		if(isset($_POST["wish"])){

				$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$pid=$_POST['wish'];
				$uid=$_SESSION["id"];

				$sql = "INSERT INTO wishlist (product_id,user_id) VALUES ('$pid','$uid')";

				

				if ($conn->query($sql) === TRUE) {
					echo "<script>
					$(window).load(function(){
						$('#myModal2').modal('show');
						});
						</script>";

					}
				}


?>
<?php


	if(isset($_POST["submit"])){
	// Checking For Blank Fields..
		if($_POST["fname"]==""||$_POST["email1"]==""||$_POST["lname"]==""||$_POST["pswd"]==""||$_POST["address"]==""||$_POST["mob"]==""){
			echo "<script>
			$(window).load(function(){
				$('#myModal').modal('show');
				});
				</script>";
			}
			else{
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$address=$_POST['address'];
				$pswd=($_POST['pswd']);
				$email=$_POST['email1'];
				$mob=$_POST['mob'];

				$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "INSERT INTO user_info (fname,lname,email,password,mobile,address)
				VALUES ('$fname', '$lname', '$email', '$pswd', '$mob', '$address')";

				if ($conn->query($sql) === TRUE) {
					echo "<script>
					$(window).load(function(){
						$('#myModal1').modal('show');
						});
						</script>";

					} else {
						echo "<script>
						$(window).load(function(){
							$('#myModal2').modal('show');
							});
							</script>";
						}

						$conn->close();
					}
				}


	if(isset($_POST["login1"])){
		if($_POST["email2"]==""||$_POST["pswd2"]==""){
			echo "<script>
						$(window).load(function(){
							$('#myloginmodal').modal('show');
							});
							</script>";
		}
		else {	
				$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
				$conn=new mysqli($servername,$username,$password,$dbname);

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$stmt = $conn->prepare("SELECT user_id,fname FROM user_info WHERE email=? AND password=?");
				$stmt->bind_param("ss", $email, $password);
				$email=$_POST['email2'];
				$password=($_POST['pswd2']);
				$stmt->execute();
				$stmt->store_result();    
				$stmt->bind_result($id,$fname);
				if($stmt->num_rows == 1) {
				    while ($stmt->fetch()) {
				    	$_SESSION["id"]=$id;
						$_SESSION["fname"]=$fname;	
				       
				      

				    }


		}

	}
}

if(isset($_POST["agent1"])){
		if($_POST["emai"]==""||$_POST["psw"]==""){
			echo "<script>
						$(window).load(function(){
							$('#myloginmodal').modal('show');
							});
							</script>";
		}
		else {	
				$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
				$conn=new mysqli($servername,$username,$password,$dbname);

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$stmt = $conn->prepare("SELECT user_id,fname FROM agent WHERE email=? AND password=?");
				$stmt->bind_param("ss", $email, $password);
				$email=$_POST['emai'];
				$password=($_POST['psw']);
				$stmt->execute();
				$stmt->store_result();    
				$stmt->bind_result($id,$fname);
				if($stmt->num_rows == 1) {
				    while ($stmt->fetch()) {
				    	$_SESSION["id"]=$id;
						$_SESSION["fname"]=$fname;	
						header("Location: agent.php");


				       
				      

				    }

		}
		else{
			echo "<script>
						$(window).load(function(){
							$('#adminfailed').modal('show');
							});
							</script>";
				}
		}

	}

if(isset($_POST["admin"])){
		if($_POST["email3"]==""||$_POST["pswd3"]==""){
			echo "<script>
						$(window).load(function(){
							$('#myloginmodal').modal('show');
							});
							</script>";
		}
		else {	
				$email=$_POST["email3"];
				$pswd=$_POST["pswd3"];

				if($email=="admin@urstore.com" && $pswd=="admin"){
						header("Location: admin.php");
				}
				else{
					echo "<script>
						$(window).load(function(){
							$('#adminfailed').modal('show');
							});
							</script>";
				}

}
}


if(isset($_POST["add1"]) || isset($_POST["wish1"])){

	echo "<script>
			$(window).load(function(){
				$('#myModal5').modal('show');
				});
				</script>";
}

				?>
				<div id="adminfailed" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-danger">
							<div class="modal-header">
								<h4 class="modal-title text-white">Error while Logging in.</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body text-white">
								<p>Incorrect credentials</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<div id="myloginmodal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-danger">
							<div class="modal-header">
								<h4 class="modal-title text-white">Error while Logging in.</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body text-white">
								<p>Please fill out all the details</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

				<div id="myModal5" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-warning">
							<div class="modal-header">
								<h4 class="modal-title">Warning</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Please login or SignUp first!</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>



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




				<div id="myModal2" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Success</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Product added to wishlist successfully.</p>
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
						<ul class="nav navbar-nav mr-auto ">
							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link" href="electronics.php">
									Electronics <span class="fa fa-caret-down"></span>
								</a>
								<div class="dropdown-menu ml-md-2">
									<a class="dropdown-item" href="mobiles.php">Mobile</a>
									<a class="dropdown-item" href="laptops.php">Laptops</a>
									<a class="dropdown-item" href="mobileacc.php">Mobile Accessories</a>
								</div>
							</li>


						
							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link" href="book.php">
									Book Store <span class="fa fa-caret-down"></span>
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="edu1.php">Educational</a>
									<a class="dropdown-item" href="novels.php">Novels</a>
								</div>
							</li>
							
						</ul>
						
						<ul class="nav navbar-nav">
							<?php
							if(isset($_SESSION["id"])){

								echo "<li class='nav-item dropdown' ><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Hi, ";
									echo $_SESSION["fname"] ;
									echo "</a>
								<div class='dropdown-menu'>
									<a class='dropdown-item' href='wishlist.php'>Wishlist</a>
									<a class='dropdown-item' href='cpwd.php'>Change Password</a>
									<a class='dropdown-item' href='logout.php'>Logout</a>
								</div></li>";
								echo "<li class='nav-item'><a class='nav-link' href='cart.php'><i class='fa fa-shopping-cart'></i> Cart <span class='badge badge-warning'>";
								$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
							$uid=$_SESSION["id"];

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							} 

							$sql="SELECT * FROM cart WHERE user_id=?";
							$result=$conn->prepare($sql);
							$result->bind_param("i",$uid);
							$result->execute();
							$result->store_result(); 
							$count=$result->num_rows;
							echo "$count </span></a></li> ";
							}

							else{
								echo "<li class='nav-item' data-toggle='modal' data-target='#agent'><a class='nav-link' href='#'>Agent</a></li>
								<li class='nav-item' data-toggle='modal' data-target='#admin'><a class='nav-link' href='#'>Admin</a></li>
								<li class='nav-item'><a class='nav-link' href='#'><i class='fa fa-shopping-cart'></i> Cart <span class='badge badge-warning'></span></a></li> 
							<li class='nav-item' data-toggle='modal' data-target='#signup'><a class='nav-link' href='#'><i class='fa fa-user'></i> Sign Up</a></li>
							<li class='nav-item' data-toggle='modal' data-target='#login'><a class='nav-link' href='#'><i class='fa fa-sign-in'></i> Login</a></li>";
							}

							?>
						</ul>


						
					</div> 
				</nav>
					<div id="demo" class="carousel slide mt-5" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
						<li data-target="#demo" data-slide-to="3"></li>
					</ul>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="images/c9.jpg" alt="puma">
						</div>
						<div class="carousel-item">
							<img src="images/c8.jpg" alt="wrangler">
						</div>
						<div class="carousel-item">
							<img src="images/c6.jpg" alt="deals">
						</div>
						<div class="carousel-item">
							<img src="images/c7.jpg" alt="New York">
						</div>
					</div>
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>

				<div class="modal fade" id="signup">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Sign Up</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST">
									<div class="form-group">

										<label>First Name:</label>
										<input type="text" class="form-control" placeholder="Enter Firstname" name="fname">

									</div>
									<div class="form-group">

										<label>Last Name:</label>
										<input type="text" class="form-control" placeholder="Enter Lastname" name="lname">

									</div>
									<div class="form-group">

										<label>Email:</label>
										<input type="email" class="form-control" placeholder="Enter email" name="email1">

									</div>


									<div class="form-group">
										<label for="pwd">Password:</label>
										<input type="password" class="form-control" placeholder="Enter password" name="pswd">
									</div>

									<div class="form-group">
										<label>Mobile:</label>
										<input type="number" class="form-control" placeholder="Enter mobile number" name="mob">
									</div>

									<div class="form-group">
										<label>Address:</label>
										<textarea class="form-control" rows="5" name="address" placeholder="Enter Address"></textarea>
									</div>
									<br><button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>




				<div class="modal fade" id="login">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Login</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST">

									<div class="form-group">

										<label>Email:</label>
										<input type="email" class="form-control" placeholder="Enter email" name="email2">

									</div>


									<div class="form-group">
										<label>Password:</label>
										<input type="password" class="form-control" placeholder="Enter password" name="pswd2">
									</div>

									<br><button type="submit" class="btn btn-primary" name="login1">Submit</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>

				<div class="modal fade" id="admin">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Login(Admin)</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST">

									<div class="form-group">

										<label>Email:</label>
										<input type="email" class="form-control" placeholder="Enter email" name="email3">

									</div>


									<div class="form-group">
										<label>Password:</label>
										<input type="password" class="form-control" placeholder="Enter password" name="pswd3">
									</div>

									<br><button type="submit" class="btn btn-primary" name="admin">Submit</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>

				<div class="modal fade" id="agent">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Login(Agent)</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST">

									<div class="form-group">

										<label>Email:</label>
										<input type="email" class="form-control" placeholder="Enter email" name="emai">

									</div>


									<div class="form-group">
										<label>Password:</label>
										<input type="password" class="form-control" placeholder="Enter password" name="psw">
									</div>

									<br><button type="submit" class="btn btn-primary" name="agent1">Submit</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>


				<div class="card bg-light text-black" >
					<div class="card-header text-center bg-dark text-white">Deals of the Day!</div>
					<div class="card-body container" style="font-size: 2vw;">
						<div class="row"> 
							<?php 


							$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";

							$conn = new mysqli($servername, $username, $password, $db);
					// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							} 
							$product_query="SELECT * FROM products ORDER BY RAND() LIMIT 0,28";
							$result = $conn->query($product_query);

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {
									$product_id= $row['product_id'];
									$product_cat= $row['product_cat'];
									$product_brand= $row['product_brand'];
									$product_title= $row['product_title'];
									$product_price= $row['product_price'];
									$product_image= $row['product_image'];



									if(isset($_SESSION["id"])){

									echo " 
									<div class='col-md-3 col-sm-6 col-xs-12 mt-4'>
									<div class='card'>
									<div class='card-header text-center' style='font-size:1.5vw;'>$product_title</div>
									<div class='card-body d-none d-md-block'><img src='images/$product_image' style='width:150px;height:300px' class='ml-4'><form method='POST' action='' ><button class='btn btn-sm float-right ' style='background:transparent;' name='wish' value='$product_id'><i class='fa fa-heart ml-2' title='Click to add to wishlist'></i></button></form></div>
									<div class='card-body d-md-none'><img src='images/$product_image' style='width:150px;height:300px' class='ml-5'></div>
									<div class='card-footer'><span class='mt-md-2' style='font-size:0.8em;'>₹ $product_price.00</span><form method='POST' action='' class='float-right'><button class='btn btn-info' name='add' value='$product_id'>AddToCart</button></form></div>
									</div></div> 
									";

								}
								else{

									echo " 
									<div class='col-md-3 col-sm-6 col-xs-12 mt-4'>
									<div class='card'>
									<div class='card-header text-center' style='font-size:1.5vw;'>$product_title</div>
									<div class='card-body d-none d-md-block'><img src='images/$product_image' style='width:150px;height:300px' class='ml-4'><form method='POST' action='' ><button class='btn btn-sm float-right ' style='background:transparent;' name='wish1'><i class='fa fa-heart-o ml-2' title='Click to add to wishlist' id='first'></i></button></form></div>
									<div class='card-body d-md-none'><img src='images/$product_image' style='width:150px;height:300px' class='ml-5'></div>
									<div class='card-footer'><span class='mt-md-2' style='font-size:0.8em;'>₹ $product_price.00</span><form method='POST' action='' class='float-right'><button class='btn btn-danger' name='add1' >AddToCart</button></form></div>
									</div></div> 
									";
								}

								}
							}
							$conn->close();
							?>
						</div>
					</div>
					<div class="card-footer text-center bg-dark text-white">&copy; UrStore-2018</div>
				</div>

			</body>
			</html>