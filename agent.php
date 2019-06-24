<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="images/icon.jpg" />
<meta charset="utf-8">
<title>Urstore | Agent</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		if(isset($_POST["addpr"])){
	// Checking For Blank Fields..
		if($_POST["procat"]==""||$_POST["price"]==""||$_POST["probr"]==""||$_POST["proim"]==""||$_POST["proname"]==""||$_POST["sub"]==""){
			echo "<script>
			$(window).load(function(){
				$('#1').modal('show');
				});
				</script>";
			}
			else{
				$procat=$_POST['procat'];
				$probr=$_POST['probr'];
				$proim=$_POST['proim'];
				$proname=$_POST['proname'];
				$sub=$_POST['sub'];
				$price=$_POST['price'];

				$servername="localhost";
							$username="kashish1612";
							$password="85207410";
							$db ="urstore1212";
				$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_image,sub_cat_id) VALUES ('$procat','$probr','$proname','$price','$proim','$sub')";

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


				if(isset($_FILES['file'])){
			$filename=$_FILES['file']['name'];
			$filesize=$_FILES['file']['size'];
			$filetmp=$_FILES['file']['tmp_name'];
			$filetype=$_FILES['file']['type'];
			$fileext=strtolower(end(explode('.',$_FILES['file']['name'])));
			$extension=array("png","jpg","jpeg");

			if(in_array($fileext, $extension)){
				move_uploaded_file($filetmp, "images/".$filename);

			}
			else{
				
				echo "<script>
						$(window).load(function(){
							$('#4').modal('show');
							});
							</script>";
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
								<p>Product Added Successfully</p>
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

				<div id="4" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content bg-danger">
							<div class="modal-header">
								<h4 class="modal-title">Error while Uploading Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>Insert a PNG,JPG or JPEG</p>
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
									Agent Dashboard (Welcome <?php echo $_SESSION["fname"]; ?>)</a>
							</li>
						</ul>
					</div> 

	</nav>

	<div class="jumbotron" style="width: 100%;height: 565px;">
		<div class="row container" style="margin-top:200px">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 col-xs-12" >
				<button class="btn btn-info" data-toggle='modal' data-target='#change'>Add Product</button>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>

	<div class="modal fade" id="change">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Add Product</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST"  enctype="multipart/form-data">

									<div class="form-group">

										<label>Enter Product Category</label>
										<input type="text" class="form-control" placeholder="Enter Category" name="procat">

									</div>

									<div class="form-group">

										<label>Enter Product Brand</label>
										<input type="text" class="form-control" placeholder="Enter Brand" name="probr">

									</div>


									<div class="form-group">

										<label>Enter Product Name</label>
										<input type="text" class="form-control" placeholder="Enter Name" name="proname">

									</div>


									<div class="form-group">
										<label>Enter Product price</label>
										<input type="numbers" class="form-control" placeholder="Enter price" name="price">
									</div>

									<div class="form-group">

										<label>Enter Image name</label>
										<input type="text" class="form-control" placeholder="Enter Image name" name="proim">

									</div>

									<div class="form-group">

										<label>Add Image</label>
										<input type="file" class="form-control" placeholder="Add file" name="file">

									</div>


									<div class="form-group">

										<label>Enter Product Sub category</label>
										<input type="text" class="form-control" placeholder="Enter sub category" name="sub">

									</div>

									<br><button type="submit" class="btn btn-primary" name="addpr">Submit</button>
								</form>
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