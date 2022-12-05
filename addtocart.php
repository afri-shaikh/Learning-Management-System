<?php
		
		if(isset($_GET['course_id']))
		{
			session_start();
			
			$getrole=$_COOKIE['userrole'];
			
			if(!isset($_SESSION['user']))
			{
				echo"<script>alert('!...Please Login and Add Course into Cart...!')</script>";
				echo"<script>window.open('course.php?c_id=".$_GET['course_id']."','_self')</script>";
			}
			if($getrole=='Teacher')
			{
				echo"<script>alert('!...sorry your are teacher...!')</script>";
				echo"<script>window.open('course.php?c_id=".$_GET['course_id']."','_self')</script>";
			
			}
			else
			{
				$con_id=$_SESSION['user']['con_id'];
				include("inc/db.php");
				$get_cat1=$con->prepare("select *from cart where c_id='".$_GET['course_id']."' and con_id='$con_id'");
				$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
				$get_cat1->execute();
				
				$rowc=$get_cat1->rowCount();
				
				if($rowc >= 1)
				{
				
				
					echo"<script>alert('!...already course added...!')</script>";
					echo"<script>window.open('cart.php','_self')</script>";
				}
				else
				{
					$query1=$con->prepare("insert into cart(con_id,c_id,date)values('$con_id','".$_GET['course_id']."',Now())");
				
					if($query1->execute())
					{
						echo"<script>alert('!...Course added Successfully...!')</script>";
						echo"<script>window.open('cart.php','_self')</script>";
					}
					else
					{
						echo"<script>alert('!...Course con't added...!')</script>";
						echo"<script>window.open('course.php?c_id=".$_GET['course_id']."','_self')</script>";
			
					}
				}
			}
			
			
		}
		else
		{
			header("location:index.php");
		}















?>