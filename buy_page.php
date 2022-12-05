<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>E Learning | Cart</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"/>
	</head>
	<body>
		<?php

			include("inc/header.php");
			echo buy();?>
			
			<div id='cart'>
			
				<form method="post" enctype="multipart/form-data">
				
					<p Style="line-height:40px;"> The admin bank account details send to your mail id and payment details also attached.  Pay amount of admin account. copy the transection id send to the admin.  The admin verify the transection id and active the course to your profile.</p>
					
					<a href="send_mail_to_buy_account.php?amount=<?php echo"".$_GET['amount']."";?>">Submit to Buy</a>
				</form>
				
			</div><br clear='all' />
			
			
			
			
			
			
			
			<?php
			include("inc/footer.php");
		?>
	</body>
</html>
