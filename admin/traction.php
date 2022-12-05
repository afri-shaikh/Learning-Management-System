<div id="bodyright">

		<?php	include("inc/db.php");
		
		
	
		if(!isset($_GET['viewcourse'])&&!isset($_GET['view_details'])){ ?>
	<h3>Verify Transaction Id</h3>
		
		<div id="add">
			<table cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Date of buy</th>
						<th>View course</th>
					</tr>
					<?php include("inc/db.php");
	
		$get_cat=$con->prepare("select group_number,date from order_details where status='send' and admin_approve!='approved' and admin_approve!='not_approve' group by group_number");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$getroc=$get_cat->rowCount();
		if($getroc==0)
		{
			echo"<tr>
				<td colspan='4'>No Course available</td>
			</tr>";
		}
		else{
		$i=1;
		while($row=$get_cat->fetch()):
			
			echo"<tr >
					<td>".$i++."</td>
					<td>".$row['date']."</td>
					<td><a style='margin-right:10px;' href='index.php?verify&view_details=".$row['group_number']."' title='View Course Details'><i class='far fa-eye'></i>   View</a>
					</td></tr>";
			
		endwhile;
		}
		 ?>
			</table>
		</div>
		<h3 style="width:50%;margin:auto;background:#100e17;border-radius:4px;">View Approved List</h3>
	
		<div id="add">
			<table cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Date of buy</th>
						<th>Status</th>
						<th>View course</th>
					</tr>
					<?php 


		$get_cat=$con->prepare("select group_number,date,status,admin_approve from order_details where admin_approve='approved' and status='send' group by group_number");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$getroc=$get_cat->rowCount();
		if($getroc==0)
		{
			echo"<tr>
				<td colspan='4'>No Course available</td>
			</tr>";
		}
		else{
		$i=1;
		while($row=$get_cat->fetch()):
			if($row['admin_approve']=='approved')
			{
				$c='approved';
			}
			else
			{
				$c='pending';
			}
			echo"<tr >
					<td>".$i++."</td>
					<td>".$row['date']."</td>
					
					<td>  $c
					</td>
					<td><a href='index.php?verify&view_details=".$row['group_number']."&approve'>View</td>
					</tr>";
			
		endwhile;
		}
		
		
	
	
?>
			</table>
		</div>
		<h3 style="width:50%;margin:auto;background:#100e17;border-radius:4px;">View Rejected List</h3>
	
		<div id="add">
			<table cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Date of buy</th>
						<th>Status</th>
						<th>View course</th>
					</tr>
					<?php 


		$get_cat=$con->prepare("select group_number,date,status,admin_approve from order_details where admin_approve='not_approve' and status='send' group by group_number");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$getroc=$get_cat->rowCount();
		if($getroc==0)
		{
			echo"<tr>
				<td colspan='4'>No Course available</td>
			</tr>";
		}
		else{
		$i=1;
		while($row=$get_cat->fetch()):
			if($row['admin_approve']=='approved')
			{
				$c='approved';
			}
			else
			{
				$c='Reject';
			}
			echo"<tr >
					<td>".$i++."</td>
					<td>".$row['date']."</td>
					
					<td>  $c
					</td>
					<td><a href='index.php?verify&view_details=".$row['group_number']."&reject'>View</td>
					</tr>";
			
		endwhile;
		}
		
		
	
	
?>
			</table>
		</div>
		
</div>

		<?php 
	}
		
				if(isset($_GET['view_details'])){
			?>
	<h3>View Transaction Details</h3>
		
		<div id="add">
			<table cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Course Name</th>
						<th>Amount</th>
					</tr><?php
					$a=1;$total_amount=0;
						$get_cat=$con->prepare("select *from order_details where group_number='".$_GET['view_details']."'");
						$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
						$get_cat->execute();
						while($row=$get_cat->fetch()):
							$get_cat1=$con->prepare("select *from courses where c_id='".$row['c_id']."'");
							$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
							$get_cat1->execute();
							$row1=$get_cat1->fetch();
									$total_amount +=$row1['c_price'];
								echo"
									<tr>
										<td>".$a++."</td>
										<td>".$row1['c_name']."</td>
										<td>".$row1['c_price']."</td>
						
									</tr>
					
					
									";
			
			
			endwhile;
			$get_cat11=$con->prepare("select *from transaction where group_number='".$_GET['view_details']."'");
							$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
							$get_cat11->execute();
							$row11=$get_cat11->fetch();
							
		?>
		
		</table>
				</div>
						<div id="pay_from">
							<form method="post">
							<input type="number" step="0.01" name="totalamount" id="total" style="margin-left:50%;display:none;" value="<?php echo"$total_amount";?>" />
								<table>
									<tr>
										<td>Name of Account Holder:</td>
										<td><input type="text" name="ahname" value="<?php echo"".$row11['ac_name']."";?>" required placeholder="Enter name Here..."></td>
									</tr>
									<tr>
										<td>Transaction Id:</td>
										<td><input type="text" name="transac_id" value="<?php echo"".$row11['transac_id']."";?>" required placeholder="Enter Transaction id Here..."></td>
									</tr>
								
								<tr>
										<td>Pay Amount:</td>
										<td><input type="number" step="0.01" name="pay_amount" value="<?php echo"".$row11['pay_amount']."";?>" required id="pay_amount" max="<?php echo"$total_amount";?>" min="<?php echo"$total_amount";?>"placeholder="Enter Pay Amount Here..."></td>
									</tr>
								
								<tr>
										<td>Date of Payment:</td>
										<td><input type="date" name="date_of_pay" value="<?php echo"".$row11['date_of_pay']."";?>" required /></td>
									</tr>
									
									
									
								<tr>		<?php if(isset($_GET['approve'])) {
									
									?><td><input type="submit" name="reject" value="Reject" required /></td>
									
								<?php } if(isset($_GET['reject']))
								{ ?>
											<td><input type="submit" name="approve" value="Approve" required /></td>
								<?php } ?>	
							</tr>	<?php if(!isset($_GET['approve'])&&!isset($_GET['reject'])) {
									
									?>
									<tr>		<td><input type="submit" name="reject" value="Reject" required /></td>
									
								
											<td><input type="submit" name="approve" value="Approve" required /></td>
							<?php } ?>	
									</tr>
								</table>

							</form>
							<script type="text/javascript">
							
							function sum()
							{
							//var totalmount=document.getElementById('pay_amount');
								//var totalpay=document.getElementById('total');
								//var result1 = parseFloat("totalmount");
								//var result2 = parseFloat("totalpay");
     
							//	if(result1>result2)
							//	{
									//alert('hfhfghgfhg');
							//	}
							}
							
							
							</script>
						</div>
		
		
		<?php

			if(isset($_POST['approve']))
			{
				$query=$con->prepare("update order_details set admin_approve='approved' where group_number='".$_GET['view_details']."'");
				
				$query->execute();
				echo"<script>alert('Course Active Successfully')</script>";
				echo"<script>window.open('index.php?verify','_self')</script>";
			
				
			}
			if(isset($_POST['reject']))
			{
				$query=$con->prepare("update order_details set admin_approve='not_approve' where group_number='".$_GET['view_details']."'");
				
				$query->execute();
				echo"<script>alert('Course Active Successfully')</script>";
				echo"<script>window.open('index.php?verify','_self')</script>";
			
				
			}



		} ?>