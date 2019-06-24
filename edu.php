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

<title>UrStore</title>
</head>
<body>
<nav class="navbar bg-dark navbar-dark navbar-expand-md fixed-top">
					<a class="navbar-brand" href="#">UrStore</a>



					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="nav navbar-nav mr-auto ">
							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Electronics
								</a>
								<div class="dropdown-menu ml-md-2">
									<a class="dropdown-item" href="#">Mobile</a>
									<a class="dropdown-item" href="#">Laptops</a>
									<a class="dropdown-item" href="#">Mobile Accessories</a>
								</div>
							</li>


							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Men
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Clothing</a>
									<a class="dropdown-item" href="#">Footwear</a>
								</div>
							</li>

							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Women
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Clothing</a>
									<a class="dropdown-item" href="#">Footwear</a>
								</div>
							</li>

							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Kid
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Clothing</a>
									<a class="dropdown-item" href="#">Footwear</a>
								</div>
							</li>

							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Book Store
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Educational</a>
									<a class="dropdown-item" href="#">Novels</a>
								</div>
							</li>
							<li class="nav-item ml-md-5">
								<form class="form-inline" action="/action_page.php">
									<input class="form-control" type="text" placeholder="Search">
									<button class="btn btn-warning" type="submit">Search</button>
								</form>
							</li>
						</ul>
						
						<ul class="nav navbar-nav">

						</ul>
						?>
					</div> 
				</nav>
				<div id="demo" class="carousel slide mt-5" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
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



				<div class="card bg-light text-black" >
					<div class="card-header text-center bg-dark text-white">Deals of the Day!</div>
					<div class="card-body container" style="font-size: 2vw;">
						<div class="row"> 
							<?php 


							$servername="localhost";
							$username="root";
							$password="";
							$db ="project";


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





									echo " 
									<div class='col-md-3 col-sm-6 col-xs-12 mt-4'>
									<div class='card'>
									<div class='card-header text-center' style='font-size:1.5vw;'>$product_title</div>
									<div class='card-body d-none d-md-block'><img src='images/$product_image' style='width:150px;height:300px' class='ml-4'><form method='POST' action='' ><button class='btn btn-sm float-right ' style='background:transparent;' name='wish' onclick='document.getElementById('first').style.color='red';
										' ><i class='fa fa-heart-o ml-2' title='Click to add to wishlist' id='first'></i></button></form></div>
									<div class='card-body d-md-none'><img src='images/$product_image' style='width:150px;height:300px' class='ml-5'></div>
									<div class='card-footer'><span class='mt-md-2' style='font-size:0.8em;'>₹ $product_price.00</span><form method='POST' action='' class='float-right'><button class='btn btn-danger' name='add' >AddToCart</button></form></div>
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
			</html>