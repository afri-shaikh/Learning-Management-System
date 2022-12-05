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
			echo cart();?>
			
			<div id='cart'>
			
				<form method="post" enctype="multipart/form-data">
				
					<?php
							if(!isset($_SESSION['user']))
							{
								echo"<div id='cart1'><h4>Please Login <i class='fas fa-sign-in-alt'></i> ....<a href='index.php'>Continue Shopping <i class='fas fa-cart-plus'></i></a></h4>
										<center><img src='cart2.png' /></center>
										</div>
								
								";
							}
							else
							{
								?><table>
									<tr>
										<th style="padding-left:25px;">Name</th>
										
										<th>Instructor</th>
										<th>Lectures</th>
										<th>Language</th>
										<th>Price (Rs)</th>
									</tr>
								
									<?php
										$con_id=$_SESSION['user']['con_id'];
										include("inc/db.php");
										$gettotalprice=0;
										$get_cat1=$con->prepare("select *from cart where con_id='$con_id'");
										$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
										$get_cat1->execute();
										
										$rowc=$get_cat1->rowCount();
										
										
											
											
											while($rowget=$get_cat1->fetch()):
												$get_cat11=$con->prepare("select *from courses where c_id='".$rowget['c_id']."'");
												$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat11->execute();
												
												$row1=$get_cat11->fetch();
												$percentage = $row1['c_offer'];
												$totalWidth = $row1['c_price'];

												$new_width = ($percentage / 100) * $totalWidth;
			
												$current_price=$totalWidth-$new_width;
			
												$get_cat13=$con->prepare("select *from contact where con_id='".$row1['con_id']."'");
												$get_cat13->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat13->execute();
												$getcountrow1=$get_cat13->fetch();
												
												$get_cat14=$con->prepare("select *from lang where lang_id='".$row1['lang_id']."'");
												$get_cat14->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat14->execute();
												$getcountrow11=$get_cat14->fetch();
												$get_cat15=$con->prepare("select *from lectures where c_id='".$rowget['c_id']."'");
												$get_cat15->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat15->execute();
												$getcountrowlectures=$get_cat15->rowCount();
			
												
												
												$gettotalprice=$gettotalprice+$current_price;
											echo"
												<tr>
													<td ><img src='teacher/admin/imgs/".$row1['c_photo']."'>
													<p><a href='course.php?c_id=".$row1['c_id']."'>".$row1['c_name']."</a></p><br><a href='delete_cart.php?cart_id=".$rowget['cart_id']."' title='delete'><i class='fas fa-trash-alt'> Remove</i></a></td>
													<td>".$getcountrow1['username']."</td>
													<td>$getcountrowlectures</td>
													<td>".$getcountrow11['lang_name']."</td>
													<td style='padding-left:20px;'>$current_price</td>
										
												</tr>
											
											";
											
											endwhile;
										
											if($rowc>=1)
											{		
												
											}
									
									?>
									<tr>
										<td colspan="3"><h3><a href="index.php"> Keep Shopping</a><a href="buy_page.php?amount=<?php echo"$gettotalprice";?>"> Checkout</a></h3></td>
										
										<td style="text-align:center;">Amount payable : </td>
										
										<td>Rs. <?php echo"$gettotalprice";?></td>
									
									</tr>
					<?php   } ?>
					</table>
				
				</form>
				
			</div><br clear='all' />
			
			
			
			
			
			
			
			<?php
			include("inc/footer.php");
		?>
	</body>
</html>
