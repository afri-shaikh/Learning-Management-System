<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>E Learning | Verification</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"/>
	</head>
	<body>
		<?php

			include("inc/header.php");
		?>	
 
		<div id="verifybox">
		<form method="post" enctype="multipart/form-data">
		<center>
				<h3><i class="fas fa-user-check"></i> </h3>
				<h4>Verification</h4>
			</center>
			<div id="input_f1">
				
				<i class="fas fa-envelope"></i> 
				<input type="email" name="s_email" placeholder="Enter Your Email" readonly value="<?php echo"".$_GET['mail']."";?>"/>
			
			</div>
			<div id="input_f1">
				
				<i class="fas fa-key"></i>
				<input type="number" name="code" maxlength="4" pattern="[0-9]{4}" placeholder="Enter Your Active Key"/>
				
			
			</div>
				<center><button name="Validate">Validate</button></center>
		</form>
		</div>
		
	</body>
</html>
<?php 
		echo validateactkey();
?>
