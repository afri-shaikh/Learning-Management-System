<?php

	if(isset($_GET['cart_id']))
	{			
				include("inc/db.php");
				$query1=$con->prepare("delete from cart where cart_id='".$_GET['cart_id']."'");
				
				if($query1->execute())
				{
					echo"<script>alert('Course Removed Successfully')</script>";
					echo"<script>window.open('cart.php','_self')</script>";
				}
				else
				{
				
				
					echo"
					<script>alert('Course Not Removed Successfully')</script>
					
					";
					echo"<script>window.open('cart.php','_self')</script>";
				}
		
		
	}












?>