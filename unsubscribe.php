<!DOCTYPE html>
<html lang="en" >
<head>
	<?php 
	include 'assets/includes/headers.php';
	include 'assets/includes/connect.php';
	 ?>
	<title>Ketoshred GH</title>
	
</head>
<body>
<div class="not-found-section">
	<div>
		<span class="fa fa-unlink not-found-section-icon"></span>
		<div class="not-found-section-text">
			<?php
			$output = '';
			if (isset($_GET['token'])) {
				$token = $_GET['token'];
				$unsubscribe_query = $conn->query("UPDATE client SET status = 1 WHERE token = '$token'") or die(mysqli_error($conn));
				if ($unsubscribe_query) {
					$output .= '<h1 id="unsubscribe">Unsubscribed!!!</h1>
					<h4>You have successfully been unsubscribed <a href="home">Go Home</a></h4>';
				}else{
					$output .= "
					<h1 class='not-found-section-text'>Ooops!!!</h1>
					<h4>An error occured while unsubscribing. If you haven't unsubscribed already, then try unsubscribing again later.</h4>";
				}
			}else{
				$output .= "
				<h1 class='not-found-section-text'>Ooops!!!</h1>
				<h4>An error occured while unsubscribing. If you haven't unsubscribed already, then try unsubscribing again later.</h4>";
			}
			echo $output;
			?>
		</div>
	</div>
</div>
</body>
</html>