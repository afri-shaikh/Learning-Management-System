<!DOCTYPE html>
<html>
<head>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />

<div id="bodyright">


	<h3>Contact Us Page</h3>
		
		<div id="con">
		
			
		
		


		<?php 
	//echo add_cat();
	
		include("inc/db.php");
		session_start();
		$contact=$con->prepare("select * from contact where con_id='".$_SESSION['user']['con_id']."'");
		$contact->setFetchMode(PDO:: FETCH_ASSOC);
		$contact->execute();
		$row=$contact->fetch();
		echo"
		<form method='post' enctype='multipart/form-data'>
			
				<table>
				
					";?>
					<tr>
						<td>Update Photo</td>
						<td><img src='../imgs/userdp/<?php echo"".$row['photo']."";?>' id='blah' title="below select and change the image"><input type='file' name="pro_img1" onchange='readURL(this);' style="width:85px;padding-left:0px;height:20px;padding-top:-10%;margin-left:12%;" /></td>
					</tr>
					<script>
					 function readURL(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#blah')
										.attr('src', e.target.result)
										.width(150)
										.height(150);
								};

								reader.readAsDataURL(input.files[0]);
							}
						}
					</script>
					<?php echo"<tr>
						<td>Update Contact No.</td>
						<td><input type='tel' name='phn' value='".$row['phn']."'></td>
					</tr>
					<tr>
						<td>Update Email</td>
						<td><input type='email' name='email' value='".$row['email']."'></td>
					</tr>
						<tr>
						<td>Update Username</td>
						<td><input type='text' name='uname' value='".$row['username']."'></td>
					</tr>
					<tr>
						<td>Update About You</td>
						<td><input type='text' name='about' value='".$row['about']."'></td>
					</tr>
					<tr>
						<td>Update Office Address Line 1</td>
						<td><input type='text' name='add1' value='".$row['add1']."'></td>
					</tr>
					
					<tr>
						<td>Update Office Address Line 2</td>
						<td><input type='text' name='add2' value='".$row['add2']."'></td>
					</tr>
					
					<tr>
						<td>http://youtube.com/</td>
						<td><input type='text' name='yt' value='".$row['yt']."'></td>
					</tr>
					<tr>
						<td>http://facebook.com/</td>
						<td><input type='text' name='fb' value='".$row['fb']."'></td>
					</tr>
					<tr>
						<td>http://plus.google.com/</td>
						<td><input type='text' name='gp' value='".$row['gp']."'></td>
					</tr>
					<tr>
						<td>http://twitter.com/</td>
						<td><input type='text' name='tw' value='".$row['tw']."'></td>
					</tr>
					<tr>
						<td>http://linkedin.com/</td>
						<td><input type='text' name='ln' value='".$row['link']."'></td>
					</tr>
					
				</table>
				
					
					<center><button name='update_contact'>Update Information</button></center>
				
			</form>
	
		";
		
		if(isset($_POST['update_contact']))
		{
			$phn=$_POST['phn'];
			$email=$_POST['email'];
			$add1=$_POST['add1'];
			$add2=$_POST['add2'];
			$yt=$_POST['yt'];
			$fb=$_POST['fb'];
			$gp=$_POST['gp'];
			$tw=$_POST['tw'];
			$ln=$_POST['ln'];
			$about=$_POST['about'];
			$username=$_POST['uname'];
			if($_FILES['pro_img1']['tmp_name']=="")
			{
				
			}
			else
			{
				$pro_img1=$_FILES['pro_img1']['name'];
				$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
				move_uploaded_file($pro_img1_tmp,"../imgs/userdp/$pro_img1");	
			
				$up_img1=$con->prepare("update contact set photo='$pro_img1' where con_id='".$_SESSION['user']['con_id']."'");
			
				$up_img1->execute();
			
			}
			
			$contact_insert=$con->prepare("update contact set username='$username',about='$about',phn='$phn',email='$email',add1='$add1',add2='$add2',yt='$yt',fb='$fb',gp='$gp',tw='$tw',link='$ln' where con_id='".$_SESSION['user']['con_id']."'");
			if($contact_insert->execute())
			{
				echo"<script>alert('Contact Information Updated Successfully')</script>";
								echo"<script>window.open('index.php?contact','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Contact Information Updated Successfully')</script>";
								echo"<script>window.open('index.php?contact','_self')</script>";
							
			}
		}
		
	
		?>
				</div>
		
</div>