<?php
	require('config/config.php'); 
	require('config/db.php'); 

	function checkDataPresent($field){
		if(filter_has_var(INPUT_POST, $field)){
			if($field === "name"){
				global $name; 
				$name = htmlspecialchars($_POST['name']);
			} else if($field === "phoneNumber"){
				global $phoneNumber; 
				$phoneNumber = htmlspecialchars($_POST['phoneNumber']); 
			} else if($field === "email"){
				global $email; 
				$email = htmlspecialchars($_POST['email']); 
			} else if($field === "address"){
				global $address; 
				$address = htmlspecialchars($_POST['address']); 
			} else if($field === "postal"){
				global $postal; 
				$postal = htmlspecialchars($_POST['postal']); 
			} else if($field === "message"){
				global $message; 
				$message = htmlspecialchars($_POST['message']); 
			}
		}
	}

	// input assigning
	checkDataPresent("name"); 
	checkDataPresent("phoneNumber"); 
	checkDataPresent("email"); 
	checkDataPresent("address"); 
	checkDataPresent("postal"); 
	checkDataPresent("message");

	// Email back-end Validation
	if(isset($email)){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			global $bufferStatus; 
			$bufferStatus = "Invalid Email. Please try again !"; 
		} else {
			global $message; 
			global $messageClient; 
			global $toClient; 
			// Message for mail() function
			$messageMail = "<p>Customer Name: " . $name . "\r\n</p>";
			$messageMail .= "<p>Customer Phone Number: " . $phoneNumber . "\r\n</p>"; 
			$messageMail .= "<p>Customer Email: " . $email . "\r\n</p>";
			$messageMail .= "<p>Customer Address: " . $address . "\r\n</p>";
			$messageMail .= "<p>Customer Postal Code: " . $postal . "\r\n</p>";
			$messageMail .= "<p>Message: " . $message . "\r\n</p>";
			$messageClient = "<p>Dear potential Customer, </p>";
			$messageClient .= "<p>&emsp; We have received your contact form via thenewroofing.ca. Thank you for considering our service !\r\n</p>";
			$messageClient .= "<p>&emsp; We will contact you shortly within 48 hours. \r\n</p>";
			$messageClient .= "<p>Regards, \r\n</p><br>"; 
			$messageClient .= "<h4>New Roofing Team</h4>"; 
			$messageClient .= "<strong>Email: Newroofing7@gmail.com</strong><br>";
			$messageClient .= "<strong>Phone Numer: +1 416-710-5010</strong>";
			$toClient = $email; 
		}
	}

	// Parameters for function mail() under in html
	$to = "newroofing7@gmail.com";
	$subject = "Potential customer from thenewroofing.ca"; 
	$subjectClient = "Thank you for considering our roofing service"; 
	// Headers have to keep its format
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: thenewroofing.ca <trevTrinh@gmail.com>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
	
	$headersClient =  'MIME-Version: 1.0' . "\r\n"; 
	$headersClient .= 'From: thenewroofing.ca <Newroofing7@gmail.com>' . "\r\n";
	$headersClient .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to The New Roofing Company</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="css/fixed.css" />
	<script src="https://kit.fontawesome.com/7c8280f6c7.js" crossorigin="anonymous"></script>
  </head>
  
  <!---->
  <body data-spy="scroll" data-target="#navbarResponsive">
    <!--Start Home Section-->
    <div id="home">
		<div class="fixed-top">
			<p class="text-white text-center bg-danger"> <i class="fas fa-phone-square"></i>&nbsp; &nbsp;+1 416-710-5010 &emsp; <i class="fas fa-envelope-square"></i>&nbsp; &nbsp; Newroofing7@gmail.com</p>
		</div>
	  <!--Start of Navigation-->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class="navbar-brand">
          <img src="img/nuno.PNG" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="cf collapse navbar-collapse" id="navbarResponsive">
          <ul class="cf navbar-nav ml-auto">
            <li class="nav-item">
              <a href="#" class="nav-link"></a>
            </li>

            <li class="nav-item">
              <a href="#home" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
              <a href="#about" class="nav-link">About Us</a>
            </li>

            <li class="nav-item">
              <a href="#gallery" class="nav-link">Gallery</a>
            </li>

            <li class="nav-item">
              <a href="#contact" class="nav-link">Contact</a>
            </li>

            <li class="nav-item">
              <a href="#clients" class="nav-link">Services</a>
			</li>
			
			<li class="nav-item">
				<a href="#area" class="nav-link">Area Covered</a>
			  </li>
          </ul>
        </div>
      </nav>
      <!--End of Navigation-->

      <!--Start Landing Page Section
			home-inner and home-wrap defined
		in the fixed.css file
		These classes are responsible for
		scorlling image-->
      <div class="landing">
        <div class="home-wrap">
          <div class="home-inner"></div>
        </div>
      </div>

      <div class="caption text-center cf">
        <h1>Your #1 Choice for Roofing and Repairs in Toronto, Mississauga, Oakville and the GTA</h1>
        <h3></h3>
		<a href="#clients" class="btn btn-danger btn-lg">SERVICES</a>
		<a href="#about" class="btn btn-danger btn-lg">ABOUT US</a>
		<a href="#contact" class="btn btn-success btn-lg">CONTACT US NOW</a>
      </div>
      <!--End Landing Page Section-->
    </div>
    <!--End Home Section-->

    <!--Start About Us Section-->
    <div id="about" class="offset">
		<div class="col-12 narrow text-center">
		  <div class="row">
			  <div class="col-xl-7">
				  <h2 class="text-center">The New Roofing Company</h2>
				  <br>
				  <h2 class="text-md-left text-danger">Toronto Roofer is a locally owned and operated roofing contractor based out of Toronto.
Our 1st priority is securing your family’s roof.</h2>
				  <br> 
				  <div class="row">
					  <div class="column-sm-6">
						<h4 class="text-center text-danger">+1 416-710-5010</h4>
					  </div>
					  <div class="column-sm-6">
						<h4 class="text-center text-danger">Newroofing7@gmail.com</h4>
					  </div>
				  </div> 
				  <br>
				  <p class="text-left text-muted">Toronto Roofer offers a number of roofing services to address the needs of residents in the local area.</p>
				  <p class="text-left text-muted">New roof installation done right is important in ensuring that your roof will last for years to come and will withstand the many types of weather we experience here in the Toronto area.</p>

			  </div>
			  <div class="col-xl-5">
				<img src="img/roof.jpg" alt="..." class="img-fluid img-thumbnail rounded">
				
				<p class="text-left text-muted">Whether you need emergency roof repair in Toronto, or new roofing in Mississauga or anywhere in the GTA. We have the skills and expertise to get you the best roof over your head. We’ve been operating since our first roof repair in 2009 and continue to be the preferred roofing company for personal and commercial roofing needs. </p>
			  </div>
		  </div>
		  
		  <div class="row cf">
			  <div class="col-md-6">
				<a href="#contact" class="btn btn-outline-success">CONTACT US NOW</a>
			  </div>
			  <div class="col-md-6">
				<a href="#clients" class="btn btn-outline-danger">OUR SERVICES</a>
			  </div>
		  </div>
	  </div>
	  <hr class="w-75 p-3">
    <!--End About us Section-->

    <!--Start GALLERY Section-->
    <div id="gallery" class="offset">
		<div class="jumbotron">
			<div class="col-12 text-center">
				<h3 class="heading">OUR PREVIOUS PROJECTS </h3>
				<div class="heading-underline"></div>
			</div>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner">
				  <div class="carousel-item active">
					<img src="img/slide1.jpg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
					<img src="img/slide2.jpg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
					<img src="img/slide3.jpg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
					<img src="img/slide4.jpg" class="d-block w-100" alt="...">
				  </div>
				  <div class="carousel-item">
					<img src="img/slide5.jpg" class="d-block w-100" alt="...">
				  </div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			  <hr class="w-75 p-3">
		</div> <!--End of jumbotron-->
	</div> <!--End of GALLERY-->
    <!--End GALLERY Section-->

    <!--Start Contact Section-->
    <div id="contact" class="offset">
		<div class="fixed-background">
			<div class="row dark text-center">
				<div class="col-md-6">

				</div>
				<div class="col-md-4">
					<h3 class="heading">Contact Us Today!</h3>
					<div class="heading-underline"></div>
					<?php 
						if(isset($bufferStatus)){
							echo "<span class='badge badge-pill badge-danger'>" . $bufferStatus . "</span>";
						} else if (isset($email) && (!isset($bufferStatus))){
							echo "<span class='badge badge-pill badge-success'> Message Sent Sucessfully!</span>"; 
							mail($to, $subject, $messageMail, $headers);
							mail($toClient, $subjectClient, $messageClient, $headersClient);

							$query = "INSERT INTO customers(name, phoneNumber, email, address, postal, message) VALUES('$name', '$phoneNumber', '$email', '$address', '$postal', '$message')"; 		
							if(mysqli_query($conn, $query)){
								header('Location'. ROOT_URL. ''); 
							} else {
								echo "Error". mysqli_error($conn); 
							}
						}
					?>
				</div>

				<div class="row justify-content-center form">
					<div class="col-md-3 cf">
						<h4>
							For your convenience, you can request quotes by calling <span class="text-danger"> +1 416-710-5010 </span> or email: <span class="text-danger">Newroofing7@gmail.com </span>
							 or through our online request form and we will arrange to meet you at your location to provide you with a free estimate.
						</h4>
						<br>
						<a href="#clients" class="btn btn-outline-success">SEE OUR SERVICES</a>
						<br> <br>
						<a href="#area" id="btnService" class="btn btn-outline-success">SEE OUR AREA COVERED</a>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-5">
						<form class="mx-auto" id="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>#contact">
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputName">Name *</label>
								<input required type="name" name="name" class="form-control" id="inputEmail4">
							  </div>
							  <div class="form-group col-md-6">
								<label for="inputEmail">Phone Number *</label>
								<input required type="phone" name="phoneNumber" class="form-control" id="inputPhoneNumber" placeholder="888-888-8888">
							  </div>
							</div>
							<div class="form-group">
							  <label for="inputEmail">Email*</label>
							  <input required type="email" name="email" class="form-control" id="inputEmail" placeholder="example@gmail.com">
							</div>
						
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputCity">Address *</label>
								<input required type="text" name="address" class="form-control" id="inputAddress" placeholder="123 Main Street">
							  </div>
							  
							  <div class="form-group col-md-6">
								<label for="inputZip">Postal Code *</label>
								<input required type="text" name="postal" class="form-control" id="inputZip">
							  </div>

							  <div class="form-group col-md-12">
								<label for="exampleFormControlTextarea1">Message *</label>
								<textarea required class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
							  </div>

							</div>
							<div class="form-group">
							  <div class="form-check">
							</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit Form</button>
						  </form>
					</div>
				</div>


			</div> <!--End of row dark-->

			<div class="fixed-wrap">
				<div class="fixed">

				</div>
			</div>
		</div> <!--End of Fixed-background-->
	</div>
    <!--End Contact Section-->

    <!--Start Service Section-->
    <div id="clients" class="offset">
		<div class="jumbotron">
			<div class="col-12 text-center">
				<h3 class="heading">Our Services</h3>
				<div class="heading-underline"></div>
			</div>

			<div class="container justify-content-md-center">
				<div class="row" id="service-1">
					<div class="col-md service-block">
						<img src="img/computers.jpg" alt="">
						<h4>Residental Roofing</h4>
						<p class="hoverText">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>

					<div class="col-md service-block">
						<img src="img/row-1-2.jpg" alt="">
						<h4>Commercial Roofing</h4>
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>

					<div class="col-md service-block">
						<img src="img/flat-roof.jpg" alt="">
						<h4>Flat Roof</h4>
						<p class="hoverText">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>
				</div>
	
				<div class="row justify-content-md-center">
					<div class="col-md service-block">
						<img src="img/row-1-3.jpg" alt="">
						<h4>Metal Roofing</h4>
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>
					<div class="col-md service-block">
						<img src="img/row-2-1.jpg" alt="">
						<h4>Siding</h4>
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>
					<div class="col-md service-block">
						<img src="img/row-2-2.jpg" alt="">
						<h4>Eavestroughs</h4>	
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>	
					</div>
				</div>

				<div class="row justify-content-md-center" id="service-2">
					<div class="col-md service-block">
						<img src="img/skylight.jpg" alt="">
						<h4>Skylight</h4>
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>
					<div class="col-md service-block">
						<img src="img/roof-repairs.jpg" alt="">
						<h4>Roof Repairs</h4>
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>
					<div class="col-md service-block">
						<img src="img/soffit.png" alt="">
						<h4>Soffits</h4>
						<p class="hoverText text-center">
							Service Listing 
						</p>
						<ul class="serviceListing">
							<li>Service 1</li>
							<li>Service 2</li>
							<li>Service 3</li>
							<li>Service 4</li>
						</ul>
					</div>
				</div>	
			</div> <!--End of container-->
		</div> <!--End jumbo tron-->
	</div>
	<!--End Service Section-->
	
	<div id="area" class="offset">
		<div class="container">
			<div class="col-12 text-center">
				<h3 class="heading">Our Areas Served</h3>
				<div class="heading-underline"></div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<img src="img/map.jpg" alt="">
				</div>
				<div class="col-md-4">
					<ul>
						<li>Downtown Toronto</li>
						<li>North York</li>
						<li>Markham</li>
						<li>Mississauga</li>
						<li>Brampton</li>
						<li>Oakville</li>
						<li>Vaughan</li>
						<li>Scarborough</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

    <!--Start Contact Section-->
    <div id="footer" class="offset">
		<footer>
			<div class="row justify-content-center cf">
				<div class="col-md-1">
					<a href="#home" class="btn nav-link">HOME</a>
				</div>
				<div class="col-md-1">
					<a href="#about" class="btn nav-link">ABOUT US</a>
				</div>
				<div class="col-md-1">
					<a href="#gallery" class="btn nav-link">GALLERY</a>
				</div>
				<div class="col-md-1.5">
					<a href="#contact" class="btn nav-link">CONTACT US</a>
				</div>
				<div class="col-md-1">
					<a href="#clients" class="btn nav-link">SERVICES</a>
				</div>
				<div class="col-md-1">
					<a href="#area" class="btn nav-link">AREA COVERD</a>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-5 text-center">
					<img src="img/nuno.PNG">
					<p>We get your Roof Done Right !</p>
					<strong>Contact Info</strong>
					<p class="text-white text-center">+1 416-710-5010 <br> Newroofing7@gmail.com</p>

				</div>

				<hr class="socket">
				&copy; The New Roofing Company.
			</div>
			
			<div class="row justify-content-center cf">
				<div class="col-md-2">
					<a href="#home" class="btn nav-link btn-outline-secondary">BACK TO TOP</a>
				</div>
			</div>
		</footer>
	</div>
    <!--End Contact Section-->

    <!--- Script Source Files -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
	<script src="js/main.js"></script>
    <!--- End of Script Source Files -->
  </body>
</html>