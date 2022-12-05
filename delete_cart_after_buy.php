	<?php
include("inc/db.php");
		$query=$con->prepare("select *from contact where con_id='".$_COOKIE['userid']."'");
		
		$query->execute();
		$row=$query->fetch();
		$query12=$con->prepare("select *from group_number where group_number_id='1'");
		
		$query12->execute();
		$row12=$query12->fetch();
	
	
			$query1=$con->prepare("select *from cart where con_id='".$row['con_id']."'");
				
				$query1->execute();
				while($row1=$query1->fetch()):
				$query11=$con->prepare("insert into order_details(c_id,con_id,date,group_number)value('".$row1['c_id']."','".$row1['con_id']."',Now(),'".$row12['buy_group']."')");
				$query11->execute();
				endwhile;
				
				$getupno=$row12['buy_group']+1;
				
				$query122=$con->prepare("update group_number set buy_group='$getupno' where group_number_id='1'");
		
		$query122->execute();
		
				
				
				
			$query1=$con->prepare("delete from cart where con_id='".$row['con_id']."'");
				
			$query1->execute();
				
					echo"<script>window.open('index.php','_self')</script>";
				
		
		
	












?>