
<?php echo add_lecture(); ?>
<head>
<style>
#lec_upload{width:100%;height:380px;background:#fff;}
#lec_upload form table{width:90%;margin:auto;border:1px solid #fff;}

#lec_upload form table tr th,td{text-align:left;height:34px;}
#lec_upload form table tr td textarea{resize:none;border-radius:4px;width:500px;}

#lec_upload form table tr td select{height:34px;border-radius:4px;width:500px;}
#lec_upload form table tr td input[type="text"]{height:34px;width:500px;border-radius:4px;padding-left:5px;border:1px solid #ccc;}
#lec_upload form table tr td input[type="submit"]{transition:all 0.3s ease-in-out;padding:10px;width:200px;border-radius:4px;border:1px solid #000;background:none;margin-top:5px;}
#lec_upload form table tr td input[type="submit"]:hover{border-radius:100px;}
#already{width:100%;height:300px;background:#fff;margin-top:30px;}
#already table{width:90%;margin:auto;border:1px solid #fff;text-align:center;}
#already table tr th,td{padding-bottom:20px;}
#already table tr td{border-bottom:1px solid #ccc;padding-top:20px;text-align:center;}

#already1{width:180%;height:300px;background:#fff;margin-top:30px;}
#already1 table{width:150%;margin:auto;border:1px solid #fff;text-align:center;}
#already1 table tr th,td{padding-bottom:20px;}
#already1 table tr td{border-bottom:1px solid #ccc;padding-top:20px;text-align:center;}

#result{width:100%;padding:20px;}
#result table{width:50%;margin:auto;}
#result table tr td{text-align:center;}

</style>
</head>
<div id="bodyright">

		<?php	if(isset($_GET['edit_lecture'])){

			echo edit_lecture();
			
		}
		else if(isset($_GET['upload_lec_metrials']))
		{
			include("inc/db.php");
			$get_c=$con->prepare("select * from lectures where lecture_id='".$_GET['upload_lec_metrials']."'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			
			
			$row=$get_c->fetch();
			
			?><h3>Upload Lecture Metrials</h3>
	
				<div id="lec_upload">
					<form method="post" enctype="multipart/form-data">
						<table>
						<tr>
						<th>Lecture Name</th>
						<td style="width:20px;">:</td>
						<td><?php echo"".$row['l_name']."";?></td>
						</tr>
						<tr>
						<th>Lecture No:</th>
						<td style="width:20px;">:</td>
						<td><?php echo"".$row['l_no']."";?></td>
						</tr>
						<tr>
						<th>Lecture Details:</th>
						<td style="width:20px;">:</td>
						<td title="<?php echo"".$row['l_details']."";?>">hover & View</td>
						</tr>
							<tr>
						<th colspan="3"></th>
						</tr>
					
							<tr>
						<th>Upload Video:</th>
						<td style="width:20px;">:</td>
						<td><input type="file" name="lec_video"></td>
						</tr>
						<tr>
						<th>Upload PDF or other file:</th>
						<td style="width:20px;">:</td>
						<td><input type="file" name="lec_pdf"></td>
						</tr>
					<tr>
						<td colspan="3" style="text-align:center;"><input type="submit" name="upload_metrials" value="Upload"></td>
						</tr>
					
						</table>
					</form>
				</div>
				<hr />
				<h3>Already Upload on this Lectures</h3>
		<div id="already">			
			<table>
				<tr>
				<th>Sr. No</th>
				<th>Video</th>
				<th>PDF or Other</th>
				</tr>
				<?php
				
				$get_c1=$con->prepare("select * from upload_lec_matrial where lecture_id='".$_GET['upload_lec_metrials']."'");
				$get_c1->setFetchMode(PDO:: FETCH_ASSOC);
				$get_c1->execute();
			
			$a=1;
			
				while($row1=$get_c1->fetch()):
				
				echo"
					<tr>
					<td>".$a++."</td>
					<td style='width:400px;'>
					<video width='400' controls>
						<source src='video/".$row1['lec_video']."' type='video/mp4'>
					</video>
					</td>
					<td><a href='pdf/".$row1['lec_pdf']."' target='_blank'>".$row1['lec_pdf']."</a></td>
					</tr>
					
				
				";
				
				
				
				endwhile;
			
				
				
				
				
				?>
				<table>
			</div>
		
		<?php 
		if(isset($_POST['upload_metrials']))
		{
			if($_FILES['lec_video']['tmp_name']=="" && $_FILES['lec_pdf']['tmp_name']=="")
						{
							
						}
						else
						{
							$c_photo=$_FILES['lec_video']['name'];
							$c_photo_tmp=$_FILES['lec_video']['tmp_name'];
							move_uploaded_file($c_photo_tmp,"video/$c_photo");	
						
						$c_photo1=$_FILES['lec_pdf']['name'];
							$c_photo_tmp1=$_FILES['lec_pdf']['tmp_name'];
							move_uploaded_file($c_photo_tmp1,"pdf/$c_photo1");	
						
							$up_img1=$con->prepare("insert into upload_lec_matrial(lecture_id,lec_video,lec_pdf)values('".$_GET['upload_lec_metrials']."','$c_photo','$c_photo1')");
						
							$up_img1->execute();
						
						}
						
			
			
			echo"<script>alert('dfdfdfd')</script>";
			echo"<script>window.open('index.php?lecture','_self')</script>";
			
		}
		}
		else if(isset($_GET['upload_assignment']))
		{
			include("inc/db.php");
			$get_c=$con->prepare("select * from lectures where lecture_id='".$_GET['upload_assignment']."'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			
			
			$row=$get_c->fetch();
			
			?><h3>Upload Assignments Questions</h3>
	
				<div id="lec_upload">
					<form method="post" enctype="multipart/form-data">
						<table>
						<tr>
						<th>Lecture Name</th>
						<td style="width:20px;">:</td>
						<td><?php echo"".$row['l_name']."";?></td>
						</tr>
						<tr>
						<th>Lecture No:</th>
						<td style="width:20px;">:</td>
						<td><?php echo"".$row['l_no']."";?></td>
						<td></td>
						
						</tr>
						<tr>
						<th>Lecture Details:</th>
						<td style="width:20px;">:</td>
						<td title="<?php echo"".$row['l_details']."";?>">hover & View</td>
						<td></td>
						</tr>
							<tr>
						<th>Due Date:</th>
						<td style="width:20px;">:</td>
						<td><input type="date" name="due_date" value="<?php echo"".$row['due_date']."";?>"></td>
							<td style="text-align:center;"><input type="submit" name="upload_date" value="Update"></td>
					
						</tr>
						
					
						<tr>
						<th>Upload File:</th>
						<td style="width:20px;">:</td>
						<td><input type="file" name="a_questions"></td>
						<td style="text-align:center;"><input type="submit" name="upload_metrials" value="Upload"></td>
						
						</tr>
							
						</table>
					</form>
				</div>
				<hr />
				<h3>Already Upload on this Lectures</h3>
		<div id="already1">			
			<table>
				<tr>
				<th>Sr. No</th>
				<th>Question</th>
				<th>Option 1</th>
				<th>Option 2</th>
				
				<th>Option 3</th>
				
				<th>Option 4</th>
				<th>Answer</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
				<?php
				
				$get_c1=$con->prepare("select * from assignment_questions where lecture_id='".$_GET['upload_assignment']."'");
				$get_c1->setFetchMode(PDO:: FETCH_ASSOC);
				$get_c1->execute();
			
			$a=1;
			
				while($row1=$get_c1->fetch()):
				
				echo"
					<tr>
					<td>".$a++."</td>
					<td>".$row1['question']."</td>
					<td>".$row1['option_1']."</td>
					<td>".$row1['option_2']."</td>
					<td>".$row1['option_3']."</td>
					<td>".$row1['option_4']."</td>
					<td>".$row1['answer']."</td>
					<td><a href='index.php?lecture&edit_question=".$row1['question_id']."&lecture_id=".$_GET['upload_assignment']."'>Edit</a></td>
					<td><a href='index.php?lecture&delete=".$row1['question_id']."&lecture_id=".$_GET['upload_assignment']."'>Delete</a></td>
					
					</tr>
					
				
				";
				
				
				
				endwhile;
			
				
				
				
				
				?>
				<table>
			</div>
		
		<?php 
		if(isset($_POST['upload_metrials']))
		{
			if($_FILES['a_questions']['tmp_name']=="")
						{
							
						}
						else
						{
							$getval=$_GET['upload_assignment'];
							$connect=mysqli_connect("localhost","root","","elearning");
								if($_FILES['a_questions']['name'])
								{
									$filename=explode('.',$_FILES['a_questions']['name']);
									if($filename[1]=='csv')
									{
										$handle=fopen($_FILES['a_questions']['tmp_name'],"r");
										while($data=fgetcsv($handle))
										{
											$item1=mysqli_real_escape_string($connect,$data[0]);
											$item2=mysqli_real_escape_string($connect,$data[1]);
											$item3=mysqli_real_escape_string($connect,$data[2]);
											$item4=mysqli_real_escape_string($connect,$data[3]);
											$item5=mysqli_real_escape_string($connect,$data[4]);
											$item6=mysqli_real_escape_string($connect,$data[5]);
											
											
											$query="INSERT into assignment_questions(question,option_1,option_2,option_3,option_4,answer,lecture_id)values('$item1','$item2','$item3','$item4','$item5','$item6','$getval')";
											
											mysqli_query($connect,$query);
										}
										fclose($handle);
										echo"insserted";
									}
								}
						
						}
						
			
			
			echo"<script>alert('Assignment Question Stored')</script>";
			echo"<script>window.open('index.php?lecture&upload_assignment=".$_GET['upload_assignment']."','_self')</script>";
			
		}
		
		if(isset($_POST['upload_date']))
		{
			$query=$con->prepare("update lectures set due_date='".$_POST['due_date']."' where lecture_id='".$_GET['upload_assignment']."'");
			$query->execute();
			echo"<script>alert('Due Date Stored')</script>";
			echo"<script>window.open('index.php?lecture&upload_assignment=".$_GET['upload_assignment']."','_self')</script>";
		}
		
			
		}
		else if(isset($_GET['edit_question']))
		{
			include("inc/db.php");
			$get_c=$con->prepare("select * from assignment_questions where question_id='".$_GET['edit_question']."'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			
			
			$row=$get_c->fetch();
			
			?>
			<h3>Edit Question Here</h3>
			<div id="lec_upload">
					<form method="post" enctype="multipart/form-data">
						<table>
						<tr>
						<th>Question</th>
						<td style="width:20px;">:</td>
						<td><textarea name="question" placeholder="Enter the Question Here"><?php echo"".$row['question'].""; ?></textarea></td>
						</tr>
						<tr>
						<th>Option1:</th>
						<td style="width:20px;">:</td>
						<td><input type="text" name="option1" value="<?php echo"".$row['option_1'].""; ?>" required placeholder="Enter the option Here"></td>
						</tr>
						<tr>
						<th>Option2:</th>
						<td style="width:20px;">:</td>
						<td><input type="text" name="option2" value="<?php echo"".$row['option_2'].""; ?>" required placeholder="Enter the option Here"></td>
						</tr>
						<tr>
						<th>Option3:</th>
						<td style="width:20px;">:</td>
						<td><input type="text" name="option3" value="<?php echo"".$row['option_3'].""; ?>" required placeholder="Enter the option Here"></td>
						</tr>
						<tr>
						<th>Option4:</th>
						<td style="width:20px;">:</td>
						<td><input type="text" name="option4" value="<?php echo"".$row['option_4'].""; ?>" required placeholder="Enter the option Here"></td>
						</tr>
						<tr>
						<th>Answer:</th>
						<td style="width:20px;">:</td>
						<td>
							<input type="text" name="answer" value="<?php echo"".$row['answer'].""; ?>" required placeholder="Enter the Answer Here">
						
						</td>
						</tr>
							<tr>
						<td colspan="3" style="text-align:center;"><input type="submit" name="upload_assignment" value="Update"></td>
						</tr>
					
						</table>
					</form>
				</div>
				
		<?php 
				if(isset($_POST['upload_assignment']))
				{
					$question=$_POST['question'];
					$option1=$_POST['option1'];
					$option2=$_POST['option2'];
					
					$option3=$_POST['option3'];
					
					$option4=$_POST['option4'];
					
					$answer=$_POST['answer'];
					$query=$con->prepare("update assignment_questions set question='$question',option_1='$option1',option_2='$option2',option_3='$option3',option_4='$option4',answer='$answer' where question_id='".$_GET['edit_question']."'");
					$query->execute();
					echo"<script>alert('Assignment Question updated')</script>";
					echo"<script>window.open('index.php?lecture&upload_assignment=".$_GET['lecture_id']."','_self')</script>";
		
				
				}
		
		
		}
		
		else if(isset($_GET['delete']))
		{
					include("inc/db.php");
					$query=$con->prepare("delete from assignment_questions where question_id='".$_GET['delete']."'");
					$query->execute();
					echo"<script>alert('Assignment Question Deleted')</script>";
					echo"<script>window.open('index.php?lecture&upload_assignment=".$_GET['lecture_id']."','_self')</script>";
		
		}
		else if(isset($_GET['view_result']))
		{
		include("inc/db.php");
			$get_c=$con->prepare("select * from lectures where lecture_id='".$_GET['view_result']."'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			
			
			$row=$get_c->fetch();
			
			?><h3>View Results Lecture</h3>
	
				<div id="lec_upload" style="height:200px;">
					<form method="post" enctype="multipart/form-data">
						<table>
						<tr>
						<th>Lecture Name</th>
						<td style="width:20px;">:</td>
						<td><?php echo"".$row['l_name']."";?></td>
						</tr>
						<tr>
						<th>Lecture No:</th>
						<td style="width:20px;">:</td>
						<td><?php echo"".$row['l_no']."";?></td>
						</tr>
						<tr>
						<th>Lecture Details:</th>
						<td style="width:20px;">:</td>
						<td title="<?php echo"".$row['l_details']."";?>">hover & View</td>
						</tr>
							<tr>
						<th colspan="3"></th>
						</tr>
					</table>
					</form>
				</div>
				<hr />
				<div id="result">
				<table>
				<tr>
					<th>Sr.No</th>
					<th>Student Name</th>
					<th>Mark</th>
				
				</tr>
				<?php
				
				$get_cat=$con->prepare("select *from lectures where lecture_id='".$_GET['view_result']."'");
				$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$get_cat->execute();
				$srial=1;$greatthan75=0;$greatthan50to75=0;$less50=0;
				while($row=$get_cat->fetch()):
						$getdate=date("Y-m-d");
						$dStart = new DateTime($getdate);
						$dEnd  = new DateTime($row['due_date']);
						$dDiff = $dStart->diff($dEnd);
						$sym=$dDiff->format('%R');
						$getfinal=$dDiff->days;

						$getorginal="$sym"."$getfinal";
						if($getorginal>0)
						{
						}
						else
						{
										
										$get_cat1=$con->prepare("select *from order_details where c_id='".$row['c_id']."'");
										$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
										$get_cat1->execute();
									
										//$noofquestion=$get_cat1->rowCount();
										while($row1=$get_cat1->fetch()):
										$get_cat12=$con->prepare("select *from assignment_questions where lecture_id='".$row['lecture_id']."'");
										$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
										$get_cat12->execute();
										$noofquestion=$get_cat12->rowCount();
											$a=0;
										while($row12=$get_cat12->fetch()):
										
												$get_cat11=$con->prepare("select *from assignment_answer where question_id='".$row12['question_id']."' and con_id='".$row1['con_id']."'");
												$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat11->execute();
											
												$row11=$get_cat11->fetch();
												
												if($row12['answer']==$row11['answer'])
												{
													$a=$a+1;
												}
												
												$get_cat151=$con->prepare("select *from contact where con_id='".$row1['con_id']."'");
												$get_cat151->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat151->execute();
											
												$row151=$get_cat151->fetch();
												
										endwhile;	
													$total=$a/$noofquestion*100;
													if($total>=75)
													{
														$greatthan75=$greatthan75+1;
													}
													else if(($total>=50) && ($total<75))
													{
														$greatthan50to75=$greatthan50to75+1;
													}
													else
													{
														$less50=$less50+1;
													}
										
													echo"<tr>
															<td>".$srial++."</td>
															<td>".$row151['username']."</td>
															<td>$total</td>
														</tr>
												";										
										endwhile;
										
										
						}
				endwhile;
				
					echo"<tr>
															<td>Greater than 75 - $greatthan75</td>
															<td>Between 50-75  - $greatthan50to75</td>
															<td>Lessthan 50 - $less50</td>
														</tr>
												";	
				
				
				
				
				
				
				
				
				
				
				
				?>
				
				</table>
				</div>
			<?php
		}
		else
			{ ?>
	<h3>View All Lectures && Add Lectures</h3>
		
		<div id="add1">
		<details>
			<summary>Add Lectures</summary>
			<form method="post" enctype="multipart/form-data">
			<select name="c_id">
					<option value="">Select Category</option>
			<?php echo select_name();?>
				</select>
				<input type="text" name="l_name" placeholder="Enter Lecture Name" />
				<input type="number" name="l_no" placeholder="Enter Lecture No" />
				<textarea name="l_details" placeholder="Enter Lectures Details"></textarea>	
					<center><button name="add_lecture">Add Lecture</button></center>
				
			</form>
		</details>
		
			<table cellspacing="0" style="width:100%;">
			
					<tr>
						<th>Sr No.</th>
						<th>Action</th>
						<th>L_name</th>
						<th>L_NO</th>
						
						<th>L_Details</th>
						
						<th>Upload Assignments</th>
						
						<th>Upload Metrials</th>
						<th>Results</th>
						
						
						
					</tr>
					<?php echo view_lecture(); ?>
			</table>
			
			
		</div>
		
</div>

		<?php 
	
		}?>