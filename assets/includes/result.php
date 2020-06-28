<!DOCTYPE html>
<html lang="en" >
<head>
	<?php include 'headers.php'; ?>
	<title>Ketoshred GH</title>
	
</head>
<body data-anm=".anm">

	<!-- <div class="container-fluid index-body result-body" style="margin-bottom: -5%;padding-bottom: 0;"> -->
		<?php
		include 'connect.php';
		require '../../../vendor/autoload.php';
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;
		$output = '';
		if (isset($_POST['submit_btn'])) {
			$age = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['age_metric']));
			$height_feet = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['height_feet']));
			$height_inches = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['height_inches']));
			$height_cm = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['height_cm']));
			$weight_kgs = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['weight_kgs']));
			$weight_lbs = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['weight_lbs']));
			$lose_lb = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['lose_lb']));
			$lose_kg = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['lose_kg']));
			$email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email_imperial']));
			$gender = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['gender']));
			$no_meat = (isset($_POST['no_meat'])?htmlspecialchars($_POST['no_meat']):'');
			$physical_activity = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['physical_activity']));
			$proteins = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['proteins']));
			$dairy_product = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['dairy_product']));
			$veggies = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['veggies']));
			if (empty($height_inches)) {
				$height_inches = 0;
			}

			$height_inches = $height_feet * 12 + $height_inches;

			$double_height_inches = $height_inches ** 2;

	//Calculate BMI
			$BMI = round(($weight_lbs / $double_height_inches) * 703, 1);
			if ($BMI > 50) {
				$BMI = '50+';
			}
			if ($BMI <= 18.5) {
				$bmi_comment = 'Underweight';
			}
			if ($BMI >= 18.5 && $BMI <= 24.99) {
				$bmi_comment = 'Normal weight';
			}
			if ($BMI >= 25.00 && $BMI <= 29.99) {
				$bmi_comment = 'Overweight';
			}
			if ($BMI >= 30.00 && $BMI <= 34.99) {
				$bmi_comment = 'Obese (Class 1)';
			}
			if ($BMI >= 35.00 && $BMI <= 39.99) {
				$bmi_comment = 'Obese (Class 2)';
			}
			if ($BMI >= 40.00) {
				$bmi_comment = 'Mobid Obesity';
			}


			if ($gender == 'male') {
				$metabolic_rate = 66 + (6.3 * $weight_lbs) + (12.9 * $height_inches) - (6.8 * $age);
				$IBW = 50 + (0.91 * ($height_cm - 152.4));
			}else{
				$metabolic_rate = 655 + (4.3 * $weight_lbs) + (4.7 * $height_inches) - (4.7 * $age);
				$IBW = 45.5 + (0.91 * ($height_cm - 152.4));
				
			}

			$activity = $metabolic_rate * $physical_activity;

			$daily_calories = round($metabolic_rate + $activity);
            //Calculate water 

			$water = $weight_lbs / 2.2;
			if ($age < 30) {
				$water = $water * 40;
			}
			if ($age >= 30 && $age <= 55) {
				$water = $water * 35;
			}

			if ($age > 55) {
				$water = $water * 30;
			}

			$overall_water = round($water / 28.3, 2);
			$liter = round($overall_water / 33.8, 2);

			$gallon = round($liter * 0.264172);
			$cup_water = $overall_water / 8;
			$token = sha1(rand(0, 50000));
			
			if ($lose_lb > $weight_lbs) {
				$derive_weight = $lose_lb - $weight_lbs;
				$weight_loss_month = round($derive_weight / 10, 0);
				if ($weight_loss_month == 0) {
					$weight_loss_month = 2;
				}
				$days = 28 * $weight_loss_month;

				//Daily lost weight
				$daily_lost_weight = round($derive_weight / $days, 2);


				//Calories lost per day
				$calories_less = round($daily_lost_weight * 3500,0);

				$calories_less = $calories_less + 500;

				//Calories lost per week
				$week_calories_less = $calories_less  * 7;

				//Calories lost per month
				$month_calories_less = $week_calories_less * 4;

				//weekly lost weight
				$week_weight_less_lb = $week_calories_less / 3500;

				//Monthly lost weight
				$month_calories_less_lb = $week_weight_less_lb * 4;

				$chart_data = ($week_weight_less_lb * 4) * 0.454;

				//Weight lost in four months
				$month_calories_less_lb = $month_calories_less_lb * 4;

				//Total weight lost in 4 months
				$total_lbs_months = round($weight_lbs + $month_calories_less_lb, 0);

				//Total weight lost in kgs
				$total_kgs_months = round($total_lbs_months * 0.454,0);

				//Monthly weight lost in kgs
				$monthly_weight_division = $total_kgs_months / 4;


				//Weight loss dates for the next 4 months
				$date_time = strtotime('+4 Months');
				$estimate_month = date('F, Y', $date_time);


				if ($calories_less < 1200) {
					$calories_less = mt_rand(1400, 1600);
				}

				$calories_daily = $daily_calories + 500;
				if ($calories_daily > 4000) {
					$calories_daily = mt_rand(2500, 3200);
				}

			}else{

				$derive_weight = $weight_lbs - $lose_lb;
				$weight_loss_month = round($derive_weight / 10, 0);
				if ($weight_loss_month == 0) {
					$weight_loss_month = 2;
				}
				$days = 28 * $weight_loss_month;

				//Daily lost weight
				$daily_lost_weight = round($derive_weight / $days, 2);

				//Calories lost per day
				$calories_less = round($daily_lost_weight * 3500,0);

				//Calories lost per week
				$week_calories_less = $calories_less  * 7;

				//Calories lost per month
				$month_calories_less = $week_calories_less * 4;

				//weekly lost weight
				$week_weight_less_lb = $week_calories_less / 3500;

				//Monthly lost weight
				$month_calories_less_lb = $week_weight_less_lb * 4;

				$chart_data = ($week_weight_less_lb * 4) * 0.454;

				//Weight lost in four months
				$month_calories_less_lb = $month_calories_less_lb * 4;

				//Total weight lost in 4 months
				$total_lbs_months = round($weight_lbs - $month_calories_less_lb, 0);

				//Total weight lost in kgs
				$total_kgs_months = round($total_lbs_months * 0.454,0);

				//Monthly weight lost in kgs
				$monthly_weight_division = $total_kgs_months / 4;


				//Weight loss dates for the next 4 months
				$date_time = strtotime('+4 Months');
				$estimate_month = date('F, Y', $date_time);


				if ($calories_less < 1200) {
					$calories_less = mt_rand(1400, 1600);
				}

				$calories_daily = $daily_calories - 500;
				if ($calories_daily > 4000) {
					$calories_daily = mt_rand(2500, 3200);
				}
			}

			$db_height = $height_feet.' ft, '.$height_inches.' inches : '.$height_cm.' cm';
			$db_weight = $weight_lbs.' lbs : '.$weight_kgs.' kgs';
			$db_target_weight = $lose_lb.' lbs : '.$lose_kg.' kgs';
			$add_data = $conn->query("INSERT INTO client(age, email, token, gender, height, weight, target_weight,activity, proteins, veggies, dairy_products) VALUES ('$age', '$email', '$token', '$gender', '$db_height', '$db_weight', '$db_target_weight', '$physical_activity', '$proteins', '$veggies', '$dairy_product' )") or die (mysqli_error($conn));
			if ($add_data) {
				$mail = new PHPMailer(true);                        // Passing `true` enables exceptions
				try {
					$mail->SMTPDebug = SMTP::DEBUG_SERVER;
					$mail->isSMTP();  
					$mail->Host       = 'mail.nakroteck.site';
					$mail->SMTPAuth   = true;    
					$mail->Username   = 'support@ghbrain.com';
					$mail->Password   = 'GodOverMoney0548';
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					$mail->Port       = 587;
					$mail->SMTPDebug  = false;

    //Recipients
					$mail->setFrom('support@ghbrain.com', 'GHbrain');
					$mail->addAddress($email, '');
					$mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your KetoShred Diet Plan is ready!!!';
    $mail->Body    = '<div class="container" align="center" style="width: 100%; transform: translate(50%, 20%);">

    <h2>KetoShred GH</h2>

    <h4>Proper Diet Plan specially made for you</h4>
    <div class="content">
    <button style="background: rgb(37, 29, 58);border-color: transparent;padding: 10px 15px;border-radius: 5px;"><a href="www.ketroshred.com/final.php?result=<?= '.urlencode($token).'?>" style="color: #fff; text-decoration: none;">Get your Diet Plan Here</a></button>
    <h5 style="font-size: 20px;">Hello there,</h5>
    <p style="padding: 4px 19%;">Thank you for taking the KetoShred test. <br><br>
    The KetoShred team kept your details and has prepared a diet plan specially for you, with all the benefits at a discounted price. Dont let this slide. Get your plan Now!!<br><br>
    <button style="background: rgb(37, 29, 58);border-color: transparent;padding: 10px 15px;border-radius: 5px;"><a href="www.ketroshred.com/final.php?result=<?= '.urlencode($token).'?>" style="color: #fff; text-decoration: none;">Get your Diet Plan Here</a></button>

    <br><br>
    Best,
    KetoShred Team 
    </p>
    <p style="padding: 4px 19%; background-color: #ccc;">Note: You have received this email because you left your email address at <a href="">KetoShred</a>. If you find this information irrelevant or you do not recall doing anything of that sort, Please <a href="unsubscribe.php?token=<?='.urlencode($token).'?>">unsubscribe here</a></p>
    </div>';
    $mail->AltBody = 'The KetoShred team kept your details and has prepared a diet plan specially for you, with all the benefits at a discounted price. Dont let this slide. Get your plan Now!!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
}

?> 
<div class="content">
	<div class="row">
		<div class="col-md-3 logo-area">
			<div>
				<img src="assets/img/logo.jpg" class="img-fluid">
			</div>
		</div>
		<div class="col-md-9" align="right">
			<div class="contact-icon" >
				<p><span class="fa fa-envelope fa-3x"></span></p>
			</div>
		</div>
	</div>
	<div class="container result-container">
		<div class="row result-intro">
			<div class="col-md-7">
				<h1>Your KetoShred Diet Plan is Ready!!!</h1>
			</div>
		</div>
		<div class="row result-summary">
			<div class="col-md-5">
				<h1>Your Profile Summary</h1>
			</div>
			<div class="col-md-7">
				<div class="row">
					<div class="col-6 col-md-3">
						<div>
							<span class="fa fa-lg fa-transgender stat-icon"></span>
							<h2><?= ucfirst($gender); ?></h2>
							<h5>Gender</h5>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div>
							<span class="fa fa-lg fa-birthday-cake stat-icon"></span>
							<h2><?= $age; ?></h2>
							<h5>Age</h5>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div>
							<span class="fa fa-lg fa-ruler-vertical stat-icon"></span>
							<h2><?= $height_cm; ?></h2>
							<h5>Height <small>(cm)</small></h5>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<div>
							<span class="fa fa-lg fa-weight stat-icon"></span>
							<h2><?= $weight_kgs; ?></h2>
							<h5>Weight <small>(kgs)</small></h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 bmi">
				<div class="result-summary-content" align="center">
					<h2>Your BMI</h2>
					<div id="bmi-slider"></div>
					<p id="recommended-calorie">Your weight is: <span><?= $bmi_comment; ?></span></p>

				</div>
			</div>
			<div class="col-md-6 achievable-weight">
				<div class="result-summary-content" >
					<h4>Based on your data, you can be</h4>
					<h2><?= $total_kgs_months; ?> kgs</h2>
					<p>by <?= $estimate_month; ?></p>
					<canvas id="canvas"></canvas>
				</div>
			</div>
			<div class="col-md-6 daily-calories">
				<div  class="result-summary-content">
					<h2>Calorie Intake</h2>
					<div id="handle1" style="background-color: transparent;"></div>
					<p id="recommended-calorie">Recommended Calories: <br> <span><?= $calories_less .' - '. $calories_daily; ?> calories</span></p>
				</div>
			</div>
			<div class="col-md-6 metabolic-age">
				<div id="chart1" class="result-summary-content">
					<h2>KetoShred Diet</h2>
					<div class="chart-detail-div">
						<canvas id="chart-area"></canvas></div>
						<div class="chart-detail">
							<span>Fat: 40%.</span>
							<span>Protein: 40%.</span>
							<span>Carbs: 40%.</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 daily-water">
					<div class="result-summary-content" >
						<h2>Daily Water Intake</h2>
						<img src="assets/img/water.png" class="img-fluid">
						<!-- <h2><?= $liter; ?></h2> -->
						<p id="recommended-calorie">Recommended Water Intake: <br>
							<span><?= (($liter > 5)?$gallon:$liter) ?> ltrs per day</span></p>
						</div>
					</div>
					<div class="col-md-12 what-you-get">
						<div class="row">
							<div class="col-md-5">
								<h1>What we have prepared for you</h1>
							</div>
							<div class="col-md-7">
								<ul>
									<li>
										<p><span class="fa fa-check fa-sm"></span>Menus personalized according to your need sna preferences</p>
									</li>
									<li>
										<p><span class="fa fa-check fa-sm"></span>Portion sizes have been calculated specifically for you</p>
									</li>
									<li>
										<p><span class="fa fa-check fa-sm"></span>1-on-1 access to a registered dietitian</p>
									</li>
									<li>
										<p><span class="fa fa-check fa-sm"></span>3 main means + snacks for craving control</p>
									</li>
									<li>
										<p><span class="fa fa-check fa-sm"></span>Easy recipes for meal preparation</p>
									</li>
								</ul>
							</div>
						</div>
						<p align="center"><button class="btn buy-button"><a href="">I am ready to start my diet plan</a></button></p>
					</div>
				</div>
					</div>
				</div>
			<p align="center" class="copyright"> Copyright &copy <?= date('Y'); ?> KetoShred GH. All rights reserved</p>
			<!-- </div> -->
			<script src="assets/js/script.js"></script>
			<script type="text/javascript" src="assets/js/anm.min.js"></script>
			<script type="text/javascript">
				var config = {
					type: 'line',
					data: {
						labels: [<?php 
							// echo "data: ['4','24', '64'],"; 
							for ($i=0; $i <= 4; $i++) { 
								$d = strtotime('+'.$i.' Months');
								echo '"'.date('F', $d).'",';
							}
							?>],
							datasets: [{
								label: 'Data Plan',
								backgroundColor: 'rgba(255, 206, 86, 0.7)',
								borderColor: 'rgba(255, 206, 86, 0.7)',
								data: [
								<?php 
							// echo "data: ['4','24', '64'],";
								for ($i=0; $i <= $total_kgs_months; $i = $i + $monthly_weight_division) {
									echo '"'.$i.'",';
								}

								?>
								],
								fill: false,
							}]
						},
						options: {
							responsive: true,
							circular: true,
							title: {
								display: false,
								text: 'Chart.js Line Chart'
							},
							tooltips: {
								mode: 'index',
								intersect: false,
							},
							hover: {
								mode: 'nearest',
								intersect: true
							},
							scales: {
								yAxes: [{
									ticks: {
										max: <?= $total_kgs_months; ?>,
										min: 0,
										stepSize: 14,
										padding: 10
									}
								}]
							}
						}
					};

					var ctx = document.getElementById('canvas').getContext('2d');
					window.myLine = new Chart(ctx, config);

					var ctx = document.getElementById("chart-area");
					var myChart = new Chart(ctx, {
						type: 'pie',
						data: {
							labels: ['Fat', 'Carbs', 'Protein'],
							datasets: [{
								label: '# of Nutrients',
								data: [75, 10, 15],
								backgroundColor: [
								'rgba(255, 99, 132, 0.5)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)'
								],
								borderColor: [
								'rgba(255,99,132,1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)'
								],
								borderWidth: 1
							}]
						},
						options: {
							cutoutPercentage: 40,
							responsive: true

						}
					});
					$("#handle1").roundSlider({
						width: 6,
						radius: 120,
						value: "<?= $calories_less; ?>,<?= $calories_daily; ?>",
						lineCap: "square",
						svgMode: true,
						rangeColor: '#e38612',
						sliderType: "range",
						min: 1000,
						readOnly: true,
						max: 5000,
						circleShape: "half-top"
					});
					$("#bmi-slider").roundSlider({
						width: 8,
						radius: 120,
						svgMode: true,
						value: "<?= $BMI; ?>",
						lineCap: "square",
						min: '15',
						max: 50,
						readOnly: true,
						circleShape: "half-top"
					});
				</script>
			</body>
			</html>