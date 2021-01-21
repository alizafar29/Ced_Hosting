<?php
	require_once("Product.php");
	error_reporting(0);
	// session_start();
	// print_r($_SESSION);

	// if(($_SESSION["user_email"] != " ") && ($_SESSION["user_password"] != " ")){
	// 	$loginValue = "Logout";
	// }
	// if(($_SESSION["user_email"] == " ") && ($_SESSION["user_password"] == " ")){
	// 	$loginValue = "Login";
	// 	// session_unset();
	// }
	session_start();
	$count = 0;
			foreach($_SESSION["cart"] as $key => $value){
				$count++;

		}
	// echo $count;
?>

<!---header--->
<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<!-- <img class="img-thumbnail" src="images/ced_hosting.png" alt=""> -->
								<h1><a href="index.php"><span style="color: #e7663f">Ced</span><span style="color: #7277d5"> Hosting</span></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="services.php">Services</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
									<?php
                                    $product = new Product();
                                    $result = $product->getProductList();
                                    // print_r($result);
                                    foreach($result as $key => $value){
                                        foreach($value as $key1 => $value1){
                                            // print_r($value);
                                        }
							?>
							<li><a href="<?php echo $value[3]?>?id=<?php echo $value[0]?>"><?php echo $value[2]?></a></li>
                            <?php
                            }
                            ?>
										<!-- <li><a href="wordpresshosting.php">WordPress Hosting</a></li>
										<li><a href="windowshosting.php">Windows Hosting</a></li>
										<li><a href="cmshosting.php">CMS Hosting</a></li> -->
									</ul>			
                                </li>
                                <li><a href="pricing.php">Pricing</a></li>
								<li><a href="blog.php">Blog</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i><span class="badge badge-light"><?php echo $count ?></span></a></li>
								<li><a href="account.php">Signup</a></li>
								<li><a href="login.php">Login</a></li>
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->
