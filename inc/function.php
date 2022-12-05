<?php

	function head_link()
	{
		include("inc/db.php");
		
		$get_link=$con->prepare("select *from contact where con_id='3'");
		
		$get_link->setFetchMode(PDO:: FETCH_ASSOC);
		$get_link->execute();
		$row=$get_link->fetch();
		
		echo"
		<ul>
				<li><a href='https://www.facebook.com/".$row['fb']."' target='_blank'><i class='fab fa-facebook-f'></i></a></li>
				<li><a href='https://www.twitter.com/".$row['tw']."' target='_blank'><i class='fab fa-twitter'></i></a></li>
				<li><a href='https://www.google.com/".$row['gp']."' target='_blank'><i class='fab fa-google-plus-g'></i></a></li>
				<li><a href='https://www.youtube.com/".$row['yt']."' target='_blank'><i class='fab fa-youtube'></i></a></li>
				<li><a href='https://www.linkedin.com/".$row['link']."' target='_blank'><i class='fab fa-linkedin'></i></a></li>
		</ul>
		
		";
		
	}
	
	function cat_menu()
	{
		include("inc/db.php");
		
		$get_cat=$con->prepare("select *from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		
		while($row=$get_cat->fetch()):
		
			$get_cat1=$con->prepare("select *from courses where cat_id='".$row['cat_id']."'");
			$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat1->execute();
			$getcountrow=$get_cat1->rowCount();
			echo"
			<li><a href='cat_menu.php?id=".$row['cat_id']."'>".$row['cat_icon']." ".$row['cat_name']." ($getcountrow)</a></li>
	
			
			";
		
		endwhile;
		
	}
	
	
	function sub_cat_menu()
	{
		include("inc/db.php");
		
		$get_cat=$con->prepare("select *from sub_cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		
		
		while($row=$get_cat->fetch()):
			
			$get_cat1=$con->prepare("select *from cat where cat_id='".$row['cat_id']."'");
			$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat1->execute();
		
			$row1=$get_cat1->fetch();
			
			$get_cat11=$con->prepare("select *from courses where sub_cat_id='".$row['sub_cat_id']."'");
			$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat11->execute();
			$getcountrow=$get_cat11->rowCount();
			echo"
			<li><a href='cat_menu.php?sub_id=".$row['sub_cat_id']."'>".$row1['cat_icon']." ".$row['sub_cat_name']." ($getcountrow)</a></li>
	
			
			";
		
		endwhile;
		
	}
	
	
	function home_cat()
	{
		include("inc/db.php");
		$get_cat=$con->prepare("select *from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		
		while($row=$get_cat->fetch()):
			$get_cat1=$con->prepare("select *from courses where cat_id='".$row['cat_id']."'");
			$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat1->execute();
			$getcountrow=$get_cat1->rowCount();
			echo"
				<li>
					<a href='cat_menu.php?id=".$row['cat_id']."'>
						<center>
							".$row['cat_icon']."
							<h4>".$row['cat_name']."</h4>
							<p>$getcountrow</p>
						</center>
					</a>
			</li>
			
			";
		
		
		endwhile;
	}
	
	function cart()
	{
		include("inc/db.php");
		
		echo"<div id='wrap'>
		
				<div id='crumb'>
					<span><a href='index.php'><i class='fas fa-home'></i> Home</a></span> <b>></b>
					<span><i class='fas fa-cart-plus'></i> My Cart</span>
				</div>
				
				
			</div>";
		
	}
	function buy()
	{
		include("inc/db.php");
		
		echo"<div id='wrap'>
		<div id='crumb'>
					<span><a href='index.php'><i class='fas fa-home'></i> Home</a></span> <b>></b> <span><a href='cart.php'><i class='fas fa-cart-plus'></i> My Cart</a></span> <b>></b>
					<span><i class='fab fa-amazon-pay' style='font-size:15px;color:#000;'></i> Payment Details</span>
				</div>
				
				
			</div>";
		
	}
	
	
	function signup()
	{
		if(isset($_POST['s_signup']))
		{
			include("db.php");
			
			
			$role=$_POST['role'];
			$s_name=$_POST['s_name'];
			$s_email=$_POST['s_email'];
			$s_phn=$_POST['s_phn'];
			
			$s_pass1=$_POST['s_pass1'];
			
			$s_photo=$_FILES['s_photo']['name'];
			$s_photo_tmp=$_FILES['s_photo']['tmp_name'];
			
			
			$query=$con->prepare("select *from contact where email='$s_email'");
			
			$query->execute();
			$roc=$query->rowCount();
			if($roc>=1)
			{
				echo"<script>alert('!...Already Your Register...!')</script>";
				echo"<script>window.open('index.php','_self')</script>";
			}
			else
			{
			
				move_uploaded_file($s_photo_tmp,"imgs/userdp/$s_photo");	
				
				$query1=$con->prepare("insert into contact(role,username,email,phn,photo,password)values('$role','$s_name','$s_email','$s_phn','$s_photo','$s_pass1')");
				
				if($query1->execute())
				{
					echo"<script>alert('Please Check your email...Enter the code and verify...')</script>";
					header("Location:sendmailtonewuser.php?mail=$s_email");
				}
				else
				{
				
				
					echo"
					<script>alert('Register Successfully')</script>
					
					";
					echo"<script>window.open('index.php','_self')</script>";
				}
				
			}
			
			
	
			
		}
	}
	
	
	
	
	function validateactkey()
	{
		if(isset($_POST['Validate']))
		{
			include("db.php");
			$email=$_POST['s_email'];
			$actkey=$_POST['code'];
			
			$query=$con->prepare("select *from contact where email='$email' and actkey='$actkey'");
			$query->execute();
			$rowc=$query->rowCount();
			if($rowc==1)
			{
				$query1=$con->prepare("update contact set actkey='1' where email='$email'");
				$query1->execute();
				
				echo"<script>alert('!...Account Activated Please Login $actkey...!')</script>";
				echo"<script>window.open('index.php','_self')</script>";
			}
			else
			{
				echo"<script>alert('!...Invalid Activation Key Try again...!')</script>";
				echo"<script>window.open('verificationkey.php?mail=$email','_self')</script>";
			}

		}
		
		
	}
	
	
	function login()
	{
		if(isset($_POST['login']))
		{
			include("db.php");
			$u_email=$_POST['u_email'];
			$u_pass=$_POST['u_pass'];
			
			$query=$con->prepare("select *from contact where email='$u_email' and password='$u_pass'");
			
			if($query->execute())
			{
				$fetch_user_data=$query->fetch();
		
				session_start();
				$_SESSION['user']=array('email'=>$fetch_user_data['email'],'con_id'=>$fetch_user_data['con_id'],
				'role'=>$fetch_user_data['role']
				);
				
				
				$role=$_SESSION['user']['role'];
				$con_id=$_SESSION['user']['con_id'];
				
				setcookie('userrole',$role,time()+60*60*24*30);
				setcookie('userid',$con_id,time()+60*60*24*30);
				switch($role)
				{
					case 'Student':
								echo"<script>alert('!...Login Valid Enjoy Learning...!')</script>";
								echo"<script>window.open('index.php','_self')</script>";
					break;
					
					case 'Teacher':
								echo"<script>alert('!...Login Valid Enjoy Teaching...!')</script>";
								echo"<script>window.open('index.php','_self')</script>";
					break;
					
					case 'admin':
								
								echo"<script>alert('!...Login Valid Enjoy Maintaining...!')</script>";
								echo"<script>window.open('admin/index.php','_self')</script>";
								
								
					break;
					
					default:
					
						echo"<script>alert('sorry,username or password is not found...!')</script>";
					
					
				}
						
			}
			else
			{
				
				echo"<script>alert('!...Invalid Username and Password...!')</script>";
				echo"<script>window.open('index.php','_self')</script>";
			}
		}
		
		
	}

	
	
	
	
	
	
	
	
?>