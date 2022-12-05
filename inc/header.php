<?php include("inc/function.php"); ?>
<?php echo signup();
		echo login();
session_start();
?>
<div id="header">

	 <div id="up_head">
		<div id="link">
				<?php echo head_link(); ?>
		</div>
		
		<div id="date">
			<p><?php echo date('l,d F Y');?></p>
			
		</div>
		
		<div id="slog">
			<p>India's No.1 E Learning Website</p>
		</div>
	 </div>

	 <div id="title">
		<h2><a href="index.php">E Learning</a></h2>
	 </div>
	 
	 <div id="menu">
		 <h2><i class="fas fa-bars"></i></h2>
		 
		 	<?php

			include("inc/cat_menu.php"); 
			
			?>
		 
	 </div>
	 <div id="head_search">
		<form method="post" enctype="multipart/form-data">
		
		<input type="search" name="query" placeholder="Search Courses From Here" />
		
		<button name="search"><i class="fas fa-search"></i></button>
		</form>
	</div>
	 
	 <div id="head_cart">
	 <?php
	 
		if(isset($_COOKIE['userid']))	
		{
			$rowc1=$_COOKIE['userid'];
			
			include("inc/db.php");
			
			$get_cat1=$con->prepare("select *from cart where con_id='$rowc1'");
			$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat1->execute();
			
			$rowc=$get_cat1->rowCount();
		}
		else
		{
			$rowc=0;
		}
	 
	 ?>
			<a href="cart.php"><i class="fas fa-shopping-cart"></i> <span><?php echo"$rowc";?></span></a>
	</div>
	
	<div id="head_login">
	<?php 
		
		if(!isset($_SESSION['user']))
		{
	
	?>
		<h4><i class="fas fa-user"></i> Login</h4>
		
		<form method="post">
			<center>
				<h3><i class="fas fa-user"></i> </h3>
				<h4>Login</h4>
			</center>
			<div id="input_f">
				
				<i class="fas fa-envelope"></i> 
				<input type="text" name="u_email" placeholder="Enter User Email"/>
			
			</div>
			<div id="input_f">
				
				<i class="fas fa-lock"></i> 
				<input type="password" name="u_pass" placeholder="Enter User Password"/>
			
			</div>
			<h5>Forget Password ?</h5><br clear="all"/>
			
			<center><button name="login">Login</button></center>
		</form>
		<?php } 
				else
				{
					echo"<h4><a href='logout.php'><i class='fas fa-sign-out-alt'></i> Logout</a></h4>";
				}
		?>
	</div>
	
	<?php if((!isset($_GET['mail'])))
			{
				if(!isset($_SESSION['user']))
		{
	
				
		?>
	<div id="head_signup">
	<h4><i class="fas fa-user-plus"></i> Signup</h4>
	
		
		<form method="post" enctype="multipart/form-data">
			<center>
				<h3><i class="fas fa-user-plus"></i> </h3>
				<h4>Signup</h4>
			</center>
			<div id="input_f">
				
				<i class="fas fa-user-graduate"></i> 
				<select name="role" title="click and Select Role" required>
					<option value="">!...select any one...!</option>
					<option value="Teacher">Teacher</option>
					<option value="Student">Student</option>
				
				
				</select>
			
			</div>
			
			<div id="input_f">
				
				<i class="fas fa-user"></i> 
				<input type="text" name="s_name" placeholder="Enter Your Name"/>
			
			</div>
			<div id="input_f">
				
				<i class="fas fa-envelope"></i> 
				<input type="email" name="s_email" placeholder="Enter Your Email"/>
			
			</div>
			<div id="input_f">
				
				<i class="fas fa-phone"></i> 
				<input type="text" name="s_phn" placeholder="Enter Your Phone No."/>
			
			</div>
			<div id="input_f">
				
				<i class="fas fa-camera"></i>
				<input type="file" name="s_photo" />
			
			</div>
			
			<div id="input_f">
				
				<i class="fas fa-lock"></i> 
				<input type="password" name="s_pass1" placeholder="Enter Your Password"/>
			
			</div>
			<?php /*<div id="input_f">
				
				<i class="fas fa-lock"></i> 
				<input type="password" name="s_pass2" placeholder="Re-Enter Your Password"/>
			
			</div>*/?>
		
			
			<center><button name="s_signup">Signup</button></center>
		</form>
	</div>
			<?php }
			else{?>
					<?php 
						if(isset($_GET['mail']))
						{?>
							<div id="head_signup">
								<h4><i class="fas fa-user-check"></i>  Verification</h4>
				
							</div>
				
					<?php } ?>
					<?php 	
						if($_SESSION['user']['role']=='Teacher')
					{?>
				<div id="head_signup">
						<h4><a href="teacher/admin/index.php"><i class="far fa-user-circle"></i>  Profile</a></h4>
							</div>
					<?php } ?>
					<?php 	
						if($_SESSION['user']['role']=='Student')
						{
					?>
							<div id="head_signup">
								<h4><a href="student/admin/index.php"><i class="far fa-user-circle"></i>  Profile</a></h4>
							</div>
					<?php
						}
						?>


					<?php
					}
			
			}	?>
			
			
		
</div>
