<!DOCTYPE html>
<html lang="en" >
<head>
	<?php 
    include 'assets/includes/headers.php';
    $token = '1892c7e0af1d74c7a1f07e578708d31339fa2c68';
     ?>
	<title>Ketoshred GH</title>
	
</head>
<body>
	<div class="container" style="height: 50vh; background-color: red;">
	</div>
	<div class="container" align="center" style="width: 100%; transform: translate(50%, 20%);">

    <h2>KetoShred GH</h2>

    <h4>Proper Diet Plan specially made for you</h4>
    <div class="content">
    <button style="background: rgb(37, 29, 58);border-color: transparent;padding: 10px 15px;border-radius: 5px;"><a href="<?=urlencode($token)?>" style="color: #fff; text-decoration: none;">Get your Diet Plan Here</a></button>
    <h5 style="font-size: 20px;">Hello there,</h5>
    <p style="padding: 4px 19%;">Thank you for taking the KetoShred test. <br><br>
    The KetoShred team kept your details and has prepared a diet plan specially for you, with all the benefits at a discounted price. Dont let this slide. Get your plan Now!!<br><br>
    <button style="background: rgb(37, 29, 58);border-color: transparent;padding: 10px 15px;border-radius: 5px;"><a href="<?=urlencode($token)?>" style="color: #fff; text-decoration: none;">Get your Diet Plan Here</a></button>

    <br><br>
    Best,
    KetoShred Team 
    </p>
    <p style="padding: 4px 19%; background-color: #ccc;">Note: You have received this email because you left your email address at <a href="">KetoShred</a>. If you find this information irrelevant or you do not recall doing anything of that sort, Please <a href="unsubscribe.php?token=<?=urlencode($token)?>">unsubscribe here</a></p>
    </div>
	<script src="assets/js/script.js"></script>
</body>
</html>