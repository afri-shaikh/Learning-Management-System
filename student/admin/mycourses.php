<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin | Home</title>
	<style>
	#mycourse{width:90%;height:400px;background:#EEEBEB;margin:auto;margin-top:2%;border-radius:4px;}
	
	#mycourse h1{padding:1%;padding-left:2%;color:#353333;font-size:23px;padding-bottom:0px;}
	#mycourse h2{padding:1%;padding-left:2%;color:#353333;font-size:20px;padding-bottom:0px;}
	
	#mycourse table{padding:1%;padding-left:2%;color:#353333;width:60%;}
		#mycourse table tr td{height:40px;border-bottom:2px solid #8A2929;}
	#mycourse table tr td a{text-decoration:none;}

	</style>
	</head>
	<body>
		
	
<div id="bodyright">
		<div id="mycourse">
			<h1>My Courses</h1>
				<h2>Current Courses</h2>
		
			<table>
			<?php
				include("inc/db.php");
				$get_cat=$con->prepare("select *from order_details where con_id='".$_COOKIE['userid']."' and status='send' and admin_approve='approved'");
				$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$get_cat->execute();
				while($row=$get_cat->fetch()):
					$get_cat1=$con->prepare("select *from courses where c_id='".$row['c_id']."'");
					$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat1->execute();
					$row1=$get_cat1->fetch();
						echo"<tr>
								<td><a href='../../course.php?c_id=".$row['c_id']."'>".$row1['c_name']." </a></td>
								
								<td><a href='course_index.php?c_id=".$row['c_id']."'>Progress</a></td>
						
							</tr>";
				
				
				
				endwhile;
					
			
			
			?>
			</table>
		</div>


</div>
</body>
</html>
