<!DOCTYPE html>
<html lang="en" >
<head>
	<?php include 'assets/includes/headers.php'; ?>
	<title>Ketoshred GH</title>
	
</head>
<body data-anm=".anm">
	<div class="container-fluid result-body">
		<div class="content">
			<div class="row">
				<div class="col-md-3 logo-area">
					<div>
						<a href="index.php"><img src="assets/img/logo.jpg" class="img-fluid"></a>
					</div>
				</div>
			</div>
			<div class="container">
				<h2>Contact KetoShred</h2>
				<div class="row contact-section">
					<div class="col-md-9" align="center">
						<p id="form-error-section"><span class="fa fa-info-circle"></span><span id="form-error"></span></p>
						<form class="row contact-form" method="POST">
							<div class="form-group col-md-6">
								<input type="text" id="contact_full_name" class="form-control" placeholder="Full Name">
							</div>
							<div class="form-group col-md-6">
								<input type="text" id="contact_email" class="form-control" placeholder="Email Address">
							</div>
							<div class="form-group col-md-6">
								<select class="form-control" id="contact_option">
									<option class="option">Select Complain</option>
									<option class="option">I did not receive my diet plan</option>
									<option class="option">Contact Support</option>
								</select>
							</div>
							<div class="form-group col-md-12">
								<textarea rows="10" class="form-control" placeholder="Enter your message..." id="contact_message"></textarea>
								<button type="submit" class="btn contact_button">Send Message</button>
							</div>
						</form>
					</div>
					<div class="col-md-3">
						<h4>Follow Us On:</h4>
						<ul class="contact_with_socail">
							<li><a href="#"><i class="fab fa-sm fa-google-plus-g icon"></i></a></li>
							<li><a href="#"><i class="fab fa-sm fa-facebook-f icon"></i></a></li>
							<li><a target="_blank" href=""><i class="fab fa-sm fa-instagram icon"></i></a></li>
							<li><a target="_blank" href=""><i class="fab fa-sm fa-twitter icon"></i></a></li>
							<li><a target="_blank" href=""><i class="fab fa-sm fa-youtube icon"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<p align="center" class="copyright">Copyright &copy <?= date('Y'); ?> KetoShred GH. All rights reserved</p>
		</div>
	</div>
	<script src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/anm.min.js"></script>
</body>
</html>