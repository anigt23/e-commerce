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
		if(isset($_POST["submit"])){
			if($_POST["old"]=="" || $_POST["new"]==""){
				echo "<script>
				$(window).load(function(){
				$('#myModal').modal('show');
				});
				</script>";
			}
			else{
				
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
						
				$stmt = $conn->prepare("UPDATE user_info SET password=? WHERE user_id=? AND password=?");
				$stmt->bind_param("sis", $new,$id,$old);
				$new=$_POST["new"];
				$id=$_SESSION["id"];
				$old=$_POST["old"];
				$stmt->execute();
				$stmt->store_result();    
				if($stmt->num_rows == 1) {
							echo "<script>
				$(window).load(function(){
				$('#myModal1').modal('show');
				});
				</script>";
							}
							else{
								echo "<script>
				$(window).load(function(){
				$('#myModal2').modal('show');
				});
				</script>";
							}



										$conn->close();
					}
				}
				
	?>


	<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Error</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Please fill out all the Fields</p>
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
								<p>Password changed successfully.</p>
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
								<h4 class="modal-title">Error</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Invalid Credentials</p>
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
									<a class="dropdown-item" href="wishlist.php">Wishlist</a>
									<a class="dropdown-item" href="#">Change Password</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div></li>
								<li class="nav-item">
								</li>	
							</ul>
							
	</nav>
	<div class="jumbotron mt-5">
		<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<form action="" method="POST">
									<div class="form-group">

										<label>Old Passwor:</label>
										<input type="password" class="form-control" placeholder="Enter old password" name="old">

									</div>
									<div class="form-group">

										<label>New Password:</label>
										<input type="password" class="form-control" placeholder="Enter new password" name="new">

									</div>
									<br><button type="submit" class="btn btn-primary" name="submit">Change</button>
				</form>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	</div>

</body>
</html>