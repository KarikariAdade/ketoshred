<!DOCTYPE html>
<html lang="en" >
<head>
	<?php include 'assets/includes/headers.php'; ?>
	<title>Ketoshred GH</title>
	
</head>
<body data-anm=".anm">
	<div class="container-fluid index-body">
		<div class="content">
			<div class="row">
				<div class="col-md-3 logo-area">
					<div>
						<img src="assets/img/logo.jpg" class="img-fluid">
					</div>
				</div>
				<div class="col-md-9" align="right">
					<div class="contact-icon">
						<p><a href="contact.php"><span class="fa fa-envelope fa-3x"></span></a></p>
					</div>
				</div>
			</div>
			<div class="container overflow-hidden">
				<div class="multisteps-form">
					<div class="row">
						<div class="col-12 col-lg-12 m-auto">
							<form class="multisteps-form__form" method="post">
								<?php 
								include 'assets/includes/gender-section.php';
								include 'assets/includes/veggies-section.php';
								include 'assets/includes/proteins-section.php';
								include 'assets/includes/dairy-products.php';
								include 'assets/includes/physical-activity.php';
								include 'assets/includes/measurement-section.php';
								?>
								
							</div>
						</form>
					</div>
				</div>
				<?php include 'assets/includes/form-nav.php'; ?>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/anm.min.js"></script>
</body>
</html>