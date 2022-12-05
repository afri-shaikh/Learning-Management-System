<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>E Learning | Course</title>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"/>
	</head>
	<body>
		<?php
			include("inc/header.php");
			include("inc/db.php");
			$get_cat1=$con->prepare("select *from courses where c_id='".$_GET['c_id']."'");
			$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat1->execute();
			
			$row1=$get_cat1->fetch();
			
			
			$percentage = $row1['c_offer'];
			$totalWidth = $row1['c_price'];

			$new_width = ($percentage / 100) * $totalWidth;
			
			$current_price=$totalWidth-$new_width;
			
			
			$get_cat12=$con->prepare("select *from cat where cat_id='".$row1['cat_id']."'");
			$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat12->execute();
		
			$row12=$get_cat12->fetch();
			
			$get_cat11=$con->prepare("select *from sub_cat where sub_cat_id='".$row1['sub_cat_id']."'");
			$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat11->execute();
			$getcountrow=$get_cat11->fetch();
			
			$get_cat13=$con->prepare("select *from contact where con_id='".$row1['con_id']."'");
			$get_cat13->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat13->execute();
			$getcountrow1=$get_cat13->fetch();
			
			$get_cat14=$con->prepare("select *from lang where lang_id='".$row1['lang_id']."'");
			$get_cat14->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat14->execute();
			$getcountrow11=$get_cat14->fetch();
			
			$get_cat15=$con->prepare("select *from lectures where c_id='".$row1['c_id']."'");
			$get_cat15->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat15->execute();
			$getcountrowlectures=$get_cat15->rowCount();
			
			
			echo"<div id='wrap'>
		
				<div id='crumb'>
					<span><a href='index.php'><i class='fas fa-home'></i> Home</a></span> <b>></b><span><a href='cat_menu.php?id=".$row1['cat_id']."'>".$row12['cat_icon']." ".$row12['cat_name']."</a></span>
					<b>></b><span><a href='cat_menu.php?sub_id=".$row1['sub_cat_id']."'>".$row12['cat_icon']." ".$getcountrow['sub_cat_name']."</a></span><b>></b><span><i class='fab fa-css3-alt'></i> ".$row1['c_name']."</span>
				</div><br clear='all' />
				
				
			</div>";
			
			?>
			<div id="course_details">
				
			<img src="teacher/admin/imgs/<?php echo"".$row1['c_photo']."";?>" />
				<div id="course_details_table">
					<h1 title=""><?php echo"".$row1['c_name']."";?></h1>
					<table>
					<tr>
					<td>Instructor</td>
					<td  style="color:#74889e;font-weight:normal;padding-right:100px;"><?php echo"".$getcountrow1['username']."";?></td>
					
					</tr>
					
					<tr>
					<td>Enroll By</td>
					<td style="color:#74889e;font-weight:normal;padding-right:100px;" >9 Students(!)</td>
				
					</tr>
					
					<tr>
					<td>Level</td>
					<td style="color:#74889e;font-weight:normal;padding-right:100px;" ><?php echo"".$row1['c_level']."";?></td>
					
					</tr>
					
					<tr>
					<td>Language</td>
					<td style="color:#74889e;font-weight:normal;padding-right:100px;" ><?php echo"".$getcountrow11['lang_name']."";?></td>
					
					</tr>
					
					<tr>
					<td>Lectures</td>
					<td style="color:#74889e;font-weight:normal;padding-right:100px;"><?php echo"$getcountrowlectures";?></td>
					
					</tr>
					</table>
					
					<h1 style="margin-top:-5%;"></h1>
					<h2>Price : Rs. <?php echo $current_price;?> <del>RS. <?php echo"".$row1['c_price']."";?></del><b><?php echo"".$row1['c_offer']."";?>%</b> Saving Rs. <?php echo $new_width;?></h2>
					<h3><a href="addtocart.php?course_id=<?php echo"".$_GET['c_id']."";?>"><i class="fas fa-cart-plus"></i> ADD TO CART</a><a href="#"><i class="fas fa-dollar-sign"></i> BUY NOW</a></h3>
				</div>
				<h3><a href="#" target="_blank" style="background:#3B5998;"><i class="fab fa-facebook-f"></i> Share</a><a href="#" target="_blank" style="background:#DD4B39;"><i class="fab fa-google-plus-g"></i>  Share</a><a href="#" target="_blank" style="background:#4099ff;"><i class="fab fa-twitter"></i> Tweet</a><a href="#" target="_blank" style="background:#25D366;"><i class="fab fa-whatsapp"></i> Share</a></h3>
				
			</div><br clear='all' />
			
			<div id="course_details1">
					<h3>Course Details</h3>
					<p><?php echo"".$row1['c_details']."";?><br><span style="color:yellow;font-weight:bold;font-size:20px;background:#fb9351;">Course contains Videos,ppt,pdf and assignment.</span></p>
						<h3 style="padding-top:1%;">What Will I Learn ?</h3>
						<p style="height:1px;"><?php echo"".$row1['c_learn']."";?></p>
					<h3 style="padding-top:1%;">Before Starting</h3>
						<p style="height:1px;">Basic knowledge about css and html javascript.(!)</p>
						<h3 style="padding-top:1%;">Instructor</h3>
						<img src="imgs/userdp/<?php echo"".$getcountrow1['photo']."";?>" title="<?php echo"".$getcountrow1['username']."";?>" />
						
							<div id="personal_info">
								<p style="height:1px;"><?php echo"".$getcountrow1['about']."";?></p>
								<h3><a href="https://www.facebook.com/<?php echo"".$getcountrow1['fb']."";?>" target="_blank" style="background:#3B5998;"><i class="fab fa-facebook-f"></i></a><a href="https://plus.google.com/<?php echo"".$getcountrow1['gp']."";?>" target="_blank" style="background:#DD4B39;"><i class="fab fa-google-plus-g"></i></a><a href="#" target="_blank" style="background:#4099ff;"><i class="fab fa-twitter"></i></a><a href="#" target="_blank" style="background:#25D366;"><i class="fab fa-whatsapp"></i></a><a href="https://www.youtube.com/channel/<?php echo"".$getcountrow1['yt']."";?>" target="_blank" style="background:#c4302b;"><i class="fab fa-youtube"></i></a></h3>
							
							</div>
						<h3 style="padding-top:3%;">Curriculum</h3>
						<div id="lecture">
						
						<?php

							$lec=1;
							while($rowlecture=$get_cat15->fetch()):
							
							
							echo"<details open>
								<summary>
									Lecture ".$lec++.": ".$rowlecture['l_name']."
								</summary>
								<textarea name='l_details' readonly placeholder='Enter Lectures Details'>".$rowlecture['l_details']."</textarea>	
						
							</details>";
							endwhile;
							?>		
				</div>
				</div><br clear='all' />
			
				<div id="related_course">
						<h3 style="padding-top:3%;">Related Courses</h3>
						<?php
							$get_cat16=$con->prepare("select *from courses where cat_id='".$row1['cat_id']."' and c_id!='".$_GET['c_id']."'");
							$get_cat16->setFetchMode(PDO:: FETCH_ASSOC);
							$get_cat16->execute();
							
							while($getcountrow12=$get_cat16->fetch()):
							$get_cat144=$con->prepare("select *from lang where lang_id='".$getcountrow12['lang_id']."'");
							$get_cat144->setFetchMode(PDO:: FETCH_ASSOC);
							$get_cat144->execute();
							$getcountrow114=$get_cat144->fetch();
			
								echo"
								<div id='related_course1'>
									<a href='course.php?c_id=".$getcountrow12['c_id']."' title='price: Rs ".$getcountrow12['c_price'].",language:".$getcountrow114['lang_name']."'><img src='teacher/admin/imgs/".$getcountrow12['c_photo']."' />
										<p>".$getcountrow12['c_name']."</p>
									</a>
								</div>	";
							
							endwhile;
						
							
						?>
						
				</div><br clear='all' />
			
			<?php
			
			include("inc/footer.php");
		?>
	</body>
</html>
