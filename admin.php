<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="images/icon.jpg" />
<meta charset="utf-8">
<title>Urstore | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		if(isset($_POST["chngprice"])){
	// Checking For Blank Fields..
		if($_POST["proid"]==""||$_POST["price"]==""){
			echo "<script>
			$(window).load(function(){
				$('#1').modal('show');
				});
				</script>";
			}
			else{
				$proid=$_POST['proid'];
				$price=$_POST['price'];

				$servername = "localhost";
				$username = "kashish1612";
				$password = "85207410";
				
				$dbname = "urstore1212";

// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "UPDATE products SET product_price='$price' WHERE product_id=$proid;";

				if ($conn->query($sql) === TRUE) {
					echo "<script>
					$(window).load(function(){
						$('#2').modal('show');
						});
						</script>";

					} else {
						echo "<script>
						$(window).load(function(){
							$('#3').modal('show');
							});
							</script>";
						}

						$conn->close();
					}
				}


				
	?>

	<div id="1" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-danger">
							<div class="modal-header">
								<h4 class="modal-title text-white">Error while Updating</h4>
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

				<div id="2" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-success">
							<div class="modal-header">
								<h4 class="modal-title">Success</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Price Changed</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

					<div id="3" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-danger">
							<div class="modal-header">
								<h4 class="modal-title">Error while Connecting</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Check product id or try again after some time</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>


	<nav class="navbar bg-primary navbar-dark navbar-expand-md fixed-top">
		<a class="navbar-brand" href="index.php">Urstore</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="nav navbar-nav mr-auto ">
							<li class="nav-item dropdown ml-md-2">
								<a class="nav-link" href="">
									Admin Dashboard</a>
							</li>
						</ul>
					</div> 

	</nav>

	<div class="jumbotron" style="width: 100%;height: 565px;">
		<div class="row container" style="margin-top:200px">
			<div class="col-md-4 col-xs-12" >
				<button class="btn btn-info" data-toggle='modal' data-target='#change'>Change Product Price</button>
			</div>
			<div class="col-md-4 col-xs-12">
				<button class="btn btn-info" data-toggle='modal' data-target='#user'>See user list</button>
			</div>
			<div class="col-md-4 col-xs-12">
				<button class="btn btn-info" data-toggle='modal' data-target='#agent'>See agent list</button>
			</div>
		</div>
	</div>

	<div class="modal fade" id="change">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Change Product Price</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST">

									<div class="form-group">

										<label>Enter Product Id</label>
										<input type="text" class="form-control" placeholder="Enter Id" name="proid">

									</div>


									<div class="form-group">
										<label>Enter new price</label>
										<input type="numbers" class="form-control" placeholder="Enter price" name="price">
									</div>

									<br><button type="submit" class="btn btn-primary" name="chngprice">Submit</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>



				<div class="modal fade" id="user">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content" style="width: 1200px">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">User Info</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<div class="table-responsive jumbotron bg-light mt-4">          
	  <table class="table table-hover table-bordered">
	    <thead>
	      <tr>
	      	<th>User Id</th>
	      	<th>Name</th>
	      	<th>Email</th>
	      	<th>Password</th>
	      	<th>Contact</th>
	      </tr>
	    </thead>
	    <tbody>
	     
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
							$product_query="SELECT * FROM USER_INFO";

							$result = $conn->query($product_query);

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {
									$uid=$row['USER_ID'];
									$fname=$row['FNAME'];
									$lname=$row['LNAME'];
									$email=$row['EMAIL'];
									$pwd=$row['PASSWORD'];
									$mobile=$row['MOBILE'];

									echo "
									 <tr>
									 <td>$uid</td>
									<td>$fname $lname</td>
									<td>$email</td>
									<td>$pwd</td>
									<td>$mobile</td>

	      							</tr>	

									";
	}
							}
							$conn->close();
							?>




	    
	      	</tbody>
	  </table> 
	</div>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>
	
</body>
</html>