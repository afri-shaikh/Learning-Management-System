<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Student | Home</title>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"/>
	
		<link rel="stylesheet" href="css/style.css" />
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400i" rel="stylesheet">
		<style>
		
		#header{background:#a90909;}
		
		#head123 h1{height:40px;line-height:40px;font-size:20px;background:#EEEBEB;color:#353333;padding-left:20px;}
		
		#bodyleft1{width:18%;height:auto;margin:3%;background:#EEEBEB;padding-bottom:30px;font-family: 'Josefin Sans', sans-serif;border-radius:4px;float:left;}
		#bodyleft1 h2{width:85%;font-size:20px;text-align:left;height:40px;line-height:40px;margin-left:20px;border-bottom:1px solid #ccc;}
		#bodyleft1 details{border:none;width:85%;font-size:20px;text-align:left;margin-left:20px;border-bottom:1px solid #ccc;}
		#bodyleft1 details summary{height:40px;border:none;line-height:40px;padding-left:10px;}
		#bodyleft1 details a{display:block;transition:all 0.3s ease-in-out;height:30px;line-height:30px;font-family: 'Josefin Sans', sans-serif;text-decoration:none;padding-left:10px;color:#100e17;}
		#bodyleft1 details a:hover{color:blue;padding-left:20px;border-left:5px solid #000;}
		#bodyleft1 details a i{margin-right:5px;height:30px;width:17px;}
		
		

#bodyleft1 details summary::-webkit-details-marker{font-size:0px}
		#bodyright1{width:72%;height:auto;margin-top:3%;background:#EEEBEB;padding-bottom:30px;font-family: 'Love Ya Like A Sister', cursive;border-radius:4px;float:left;}
		#bodyright1 h3{width:80%;font-size:20px;text-align:left;height:40px;line-height:40px;margin-left:20px;border-bottom:1px solid #ccc;}
		#bodyright1 table{width:80%;margin-left:20px;border-collapse:collapse;}
		
		#bodyright1 table tr td{height:40px;line-height:40px;padding-left:5px;border-bottom:2px solid #ccc;}
		
		
		#bodyright11{width:72%;height:auto;margin-top:3%;background:#EEEBEB;padding-bottom:30px;font-family: 'Patrick Hand', cursive;border-radius:4px;float:left;}
		#bodyright11 h3{width:80%;font-size:20px;text-align:left;height:40px;line-height:40px;margin-left:20px;}
		
		#alertdate{width:100%;height:80px;}
		
		#question{width:100%;height:auto;margin-bottom:20%;}
		
		#question table{width:100%;height:auto;}
		#question table tr td{height:30px;}
		#question table tr td input[type="radio"]{margin-right:10px;margin-top:5px;}
		#question table tr td label{margin-left:5px;}
		#question table tr td label b{margin-right:5px;font-weight:normal;}
		
		.checkbox input:checked + label{
		color: #16B67F;
										}
		#question form p{margin-left:20px;margin-top:10px;color:#00529B;}
		#question form p i{height:30px;color:#00529B;}
		#question form input[type="submit"]{    font-family: "open sans",arial,sans-serif;font-size: 13px; font-weight: 600; line-height: 1.54;box-shadow: 0 1px 1px rgba(0,0,0,.2);transition:all 0.5s ease-in-out;padding:10px 20px 10px 20px;margin-left:20px;margin-top:10px;border-radius:4px;border:1px solid #ccc;color:#fff;background:#555;}
		#question form input[type="submit"]:hover{padding:10px 30px 10px 30px;border-radius:4px;border-left:10px solid #ccc;background:#fff;color:#555;}
		
		</style>
	</head>
	<body>
		<?php include("inc/header.php"); 
			include("inc/db.php");
					$get_cat123=$con->prepare("select *from courses where c_id='".$_GET['c_id']."'");
					$get_cat123->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat123->execute();
					$rowgetcourse=$get_cat123->fetch();
					
		
		?>
		<div id="head123">	<h1>Courses <i class="fas fa-chevron-circle-right"></i> <?php echo"".$rowgetcourse['c_name']."";?> <a href='course_index.php?c_id=<?php echo"".$_GET['c_id']."";?>' style="float:right;margin-right:50px;text-decoration:none;color:#555;">Progress</a> <a href='index.php' style="float:right;margin-right:20px;text-decoration:none;color:#555;">Profile</a><a href='index.php?mycourses' style="float:right;margin-right:20px;text-decoration:none;color:#555;">My Courses</a> </h1></div>
			
		<div id="bodyleft1">
			<h2>Course Outline</h2>
			
				<?php 
					
					$get_cat1=$con->prepare("select *from lectures where c_id='".$_GET['c_id']."' order by l_no asc");
					$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat1->execute();
					$i=1;
					while($row1=$get_cat1->fetch()):
					if(isset($_GET['assignment']))
					{
						$getvalue=$_GET['assignment'];
					}
					else if(isset($_GET['lec_details']))
					{
						$getvalue=$_GET['lec_details'];
					}
					else if(isset($_GET['video']))
					{
						$getvalue=$_GET['video'];
					}
					else if(isset($_GET['pdf']))
					{
						$getvalue=$_GET['pdf'];
					}
					else
					{
						$getvalue=0;
					
					}
					if($getvalue==$row1['lecture_id'])	
					{
						echo"
							<details open>
								<summary>Week ".$i++."</summary>
								<a href='course_index.php?c_id=".$_GET['c_id']."&lec_details=".$row1['lecture_id']."'><i class='far fa-clipboard'></i> Lecture Details</a>
								<a href='course_index.php?c_id=".$_GET['c_id']."&video=".$row1['lecture_id']."'><i class='far fa-play-circle'></i> Video</a>
								<a href='course_index.php?c_id=".$_GET['c_id']."&pdf=".$row1['lecture_id']."'><i class='far fa-file-pdf'></i> Pdf</a>
								<a href='course_index.php?c_id=".$_GET['c_id']."&assignment=".$row1['lecture_id']."'><i class='far fa-grin-squint-tears'></i> Assignemt</a>
								
								
								
							</details>
						
						
						";
					}
					else
					{
						echo"
							<details>
								<summary>Week ".$i++."</summary>
								<a href='course_index.php?c_id=".$_GET['c_id']."&lec_details=".$row1['lecture_id']."'><i class='far fa-clipboard'></i> Lecture Details</a>
								<a href='course_index.php?c_id=".$_GET['c_id']."&video=".$row1['lecture_id']."'><i class='far fa-play-circle'></i> Video</a>
								<a href='course_index.php?c_id=".$_GET['c_id']."&pdf=".$row1['lecture_id']."'><i class='far fa-file-pdf'></i> Pdf</a>
								<a href='course_index.php?c_id=".$_GET['c_id']."&assignment=".$row1['lecture_id']."'><i class='far fa-grin-squint-tears'></i> Assignemt</a>
								
							
								
								
							</details>
						
						
						";
					}
					
					endwhile;
					
			?>
			
		</div>
		
		<?php 
				if(isset($_GET['assignment']))
				{
					$getshowornot=1;
					include("inc/db.php");
									$get_cat12=$con->prepare("select *from lectures where lecture_id='".$_GET['assignment']."'");
									$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
									$get_cat12->execute();
									$row12=$get_cat12->fetch();
									
									$getdate=date("Y-m-d");
									$dStart = new DateTime($getdate);
									$dEnd  = new DateTime($row12['due_date']);
									$dDiff = $dStart->diff($dEnd);
									$sym=$dDiff->format('%R');
									$getfinal=$dDiff->days;

									$getorginal="$sym"."$getfinal";
									if($getorginal>0)
										{
											$getduedate="Due date for this assignment:<b style='color:red;'>".$row12['due_date'].",  23:59 IST.</b>";
										}
										else
										{
											$getduedate="The due date for submitting this assignment has passed.  Due Date <b style='color:red;'>".$row12['due_date'].",  23:59 IST.</b>";
											$getshowornot=$getshowornot+1;
										} 
										$querycheck21=$con->prepare("select *from last_submit where lecture_id='".$_GET['assignment']."' and con_id='".$_COOKIE['userid']."'");
								$querycheck21->execute();
								$rowfetcdate=$querycheck21->fetch();
								$rowcheck21=$querycheck21->rowCount();
								if($rowcheck21==1)
								{
									$subdate="Assignment submitted on <b style='color:red;'>".$rowfetcdate['date_of_submit']." IST.</b>";
								}
								else
								{
									$subdate="As per our records you have not submitted this assignment.";
								}
									
				?>
					<div id="bodyright11">
						<h3>Assignment <?php echo"".$row12['l_no']."";?></h3>
						<div id="alertdate">
							<h3 style="font-size:15px;"><?php echo"$getduedate";?></h3>
							<h3 style="font-size:15px;"><?php echo"$subdate";?></h3>
						</div>
						
						<div id="question" class="checkbox">
							<form method="post" enctype="multipart/form-data">
								<table>
								<?php
								
									$get_cat1=$con->prepare("select *from assignment_questions where lecture_id='".$_GET['assignment']."'");
									$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
									$get_cat1->execute();
									$i=1;$id=1;$for=1;$qestion_name=1;
									while($row1=$get_cat1->fetch()):
										$get_cat11=$con->prepare("select *from assignment_answer where question_id='".$row1['question_id']."' and con_id='".$_COOKIE['userid']."'");
										$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
										$get_cat11->execute();
										$row11=$get_cat11->fetch();
										$rowc=$get_cat11->rowCount();
										$checkrow=1;
										if($rowc==1)
										{
											if($row11['answer']==$row1['option_1'])
											{
												echo"
													<tr>
														<td style='width:10px;padding-left:20px;'>".$i++.")</td>
														<td style='width:800px;padding-left:10px;'>".$row1['question']."</td>
														<td style='width:150px;text-align:center;'>1 point</td>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' checked name='".$qestion_name."' value='".$row1['option_1']."' ><label for='3".$for++."' ><b>a)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_2']."' ><label for='3".$for++."' ><b>b)</b>".$row1['option_2']."</label></td>
														<td></td>
														
													</tr><tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_3']."' ><label for='3".$for++."' ><b>c)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name++."' value='".$row1['option_4']."' ><label for='3".$for++."' ><b>d)</b>".$row1['option_1']."</label></td>
													
												
												";
												
												$checkrow=$checkrow+1;
											}
											if($row11['answer']==$row1['option_2'])
											{
												echo"
													<tr>
														<td style='width:10px;padding-left:20px;'>".$i++.")</td>
														<td style='width:800px;padding-left:10px;'>".$row1['question']."</td>
														<td style='width:150px;text-align:center;'>1 point</td>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_1']."' ><label for='3".$for++."' ><b>a)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' checked name='".$qestion_name."' value='".$row1['option_2']."' ><label for='3".$for++."' ><b>b)</b>".$row1['option_2']."</label></td>
														<td></td>
														
													</tr><tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_3']."' ><label for='3".$for++."' ><b>c)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name++."' value='".$row1['option_4']."' ><label for='3".$for++."' ><b>d)</b>".$row1['option_1']."</label></td>
												
												";
												$checkrow=$checkrow+1;
											}
											
											if($row11['answer']==$row1['option_3'])
											{
												echo"
													<tr>
														<td style='width:10px;padding-left:20px;'>".$i++.")</td>
														<td style='width:800px;padding-left:10px;'>".$row1['question']."</td>
														<td style='width:150px;text-align:center;'>1 point</td>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_1']."' ><label for='3".$for++."' ><b>a)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_2']."' ><label for='3".$for++."' ><b>b)</b>".$row1['option_2']."</label></td>
														<td></td>
														
													</tr><tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' checked name='".$qestion_name."' value='".$row1['option_3']."' ><label for='3".$for++."' ><b>c)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name++."' value='".$row1['option_4']."' ><label for='3".$for++."' ><b>d)</b>".$row1['option_1']."</label></td>
												
												";
												$checkrow=$checkrow+1;
											}
											if($row11['answer']==$row1['option_4'])
											{
												echo"
													<tr>
														<td style='width:10px;padding-left:20px;'>".$i++.")</td>
														<td style='width:800px;padding-left:10px;'>".$row1['question']."</td>
														<td style='width:150px;text-align:center;'>1 point</td>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_1']."' ><label for='3".$for++."' ><b>a)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_2']."' ><label for='3".$for++."' ><b>b)</b>".$row1['option_2']."</label></td>
														<td></td>
														
													</tr><tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' name='".$qestion_name."' value='".$row1['option_3']."' ><label for='3".$for++."' ><b>c)</b>".$row1['option_1']."</label></td>
														<td></td>
														
													</tr>
													</tr>
													<tr>
														<td></td>
														<td><input type='radio' id='3".$id++."' checked name='".$qestion_name++."' value='".$row1['option_4']."' ><label for='3".$for++."' ><b>d)</b>".$row1['option_1']."</label></td>
												
												";
												$checkrow=$checkrow+1;
											}
										}
										if($checkrow==1)
										{
								
									
									
								
								?>
								<tr>
									<td style="width:10px;padding-left:20px;"><?php echo"".$i++."";?>)</td>
									<td style="width:800px;padding-left:10px;"><?php echo"".$row1['question']."";?></td>
									<td style="width:150px;text-align:center;">1 point</td>
									</tr>
									<tr>
									<td></td>
									<td><input type="radio" id="3<?php echo"".$id++."";?>" name="<?php echo"".$qestion_name."";?>" value="<?php echo"".$row1['option_1']."";?>" ><label for="3<?php echo"".$for++."";?>" ><b>a)</b><?php echo"".$row1['option_1']."";?></label></td>
									<td></td>
									
									</tr>
									<tr>
									<td></td>
									<td><input type="radio" id="3<?php echo"".$id++."";?>" name="<?php echo"".$qestion_name."";?>" value="<?php echo"".$row1['option_2']."";?>" ><label for="3<?php echo"".$for++."";?>"><b>b)</b><?php echo"".$row1['option_2']."";?></label></td>
									<td></td>
									
									</tr>
									<tr>
									<td></td>
									<td><input type="radio" id="3<?php echo"".$id++."";?>" name="<?php echo"".$qestion_name."";?>" value="<?php echo"".$row1['option_3']."";?>" ><label for="3<?php echo"".$for++."";?>"><b>c)</b><?php echo"".$row1['option_3']."";?></label></td>
									<td></td>
									
									</tr>
									<tr>
									<td></td>
									<td><input type="radio" id="3<?php echo"".$id++."";?>" name="<?php echo"".$qestion_name++."";?>" value="<?php echo"".$row1['option_4']."";?>" ><label for="3<?php echo"".$for++."";?>"><b>d)</b><?php echo"".$row1['option_4']."";?></label></td>
									
									<?php
										}
										?>
										<td><input type="text" style="display:none;" value="<?php echo"".$row1['question_id']."";?>" name="<?php echo"".$qestion_name."";?>" /></td>
									
									</tr>
									<?php
									if($getshowornot!=1)
									{
										if($row11['answer']==$row1['answer'])
										{
											$anserst="Yes, the answer is Correct.";
											$socre="Score: 1";
	
										}
										else{
											$anserst="<b style='color:red;'>No, the answer is Incorrect.</b>";
											$socre="<b style='color:red;'>Score: 0</b>";

										}
										
										if($row1['answer']==$row1['option_1'])
										{
											$answeroption="a)";
										}
										if($row1['answer']==$row1['option_4'])
										{
											$answeroption="d)";
										}if($row1['answer']==$row1['option_3'])
										{
											$answeroption="c)";
										}if($row1['answer']==$row1['option_2'])
										{
											$answeroption="b)";
										}
										
								?>
										<tr>
									<td></td>
									<td style="color:green;"><?php echo"$anserst <br> $socre";?><br>Accepted Answers:<br><?php echo"$answeroption ".$row1['answer']."";?></td>
									<td></td>
									
									</tr>
									
								<?php
									}
									$qestion_name++;
										endwhile;
									
									?>
								</table>
								<?php
								
									if($getshowornot==1)
									{
								?>
								<p><i class="fas fa-info-circle"></i> You may submit any number of times before the due date. The final submission will be considered for grading.</p>
								<input type="submit" name="submit_answer" value="Submit Answer" title="before check your answer to submit" />
									<?php } 
											else
											{
												echo"
													<input type='submit' style='margin-left:30%;background:#FF0000;' name='pdf' value='Generate Pdf' onclick='window.print()' />
												
												";
											}
									?>
							</form>
						</div>


					</div>
				<?php
						if(isset($_POST['submit_answer']))
						{
							$l=1;
							for($a=1;$a<$i;$a++)
							{
								$getop=$l++;
								$getoption=$_POST[$getop];
								$getquestion=$l++;
								$getquestionno=$_POST[$getquestion];
								$querycheck=$con->prepare("select *from assignment_answer where question_id='$getquestionno' and con_id='".$_COOKIE['userid']."'");
								$querycheck->execute();
								$rowcheck=$querycheck->rowCount();
								if($rowcheck==1)
								{ 
									if($getoption!='')
									{
										$queryupdate=$con->prepare("update assignment_answer set answer='$getoption' where question_id='$getquestionno' and con_id='".$_COOKIE['userid']."'");
										$queryupdate->execute();
									}
								}
								else
								{
								
									if($getoption!='')
									{
										$query=$con->prepare("insert into assignment_answer(question_id,answer,con_id)values('$getquestionno','$getoption','".$_COOKIE['userid']."')");								
										$query->execute();
									}
								}
							}
								if($rowcheck21==1)
								{ 
									
										$queryupdate=$con->prepare("update last_submit set date_of_submit=Now() where lecture_id='".$_GET['assignment']."' and con_id='".$_COOKIE['userid']."'");
										$queryupdate->execute();
									
								}
								else
								{
								
									if($getoption!='')
									{
										$query=$con->prepare("insert into last_submit(date_of_submit,lecture_id,con_id)values(Now(),'".$_GET['assignment']."','".$_COOKIE['userid']."')");								
										$query->execute();
									}
								}
							
								echo"<script>alert('$getoption $getquestionno Assignemt Submit Successfully')</script>";
								echo"<script>window.open('course_index.php?c_id=6&assignment=".$_GET['assignment']."','_self')</script>";
		
							}
				
				}
				else if(isset($_GET['lec_details']))
				{
						include("inc/db.php");
						$get_cat12=$con->prepare("select *from lectures where lecture_id='".$_GET['lec_details']."'");
						$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
						$get_cat12->execute();
						$row12=$get_cat12->fetch();

					
					
					echo"<div id='bodyright1' style='padding-left:1%;padding-top:1%;'>
					
						<h1 style='font-size:20px;'>  Lecture Number - <b style='color:red;'>Week - ".$row12['l_no']."</b></h1>
						<h2 style='font-size:20px;'>Lecture Name: <b style='color:red;'>".$row12['l_name']."</b></h2>
						<h2 style='font-size:20px;'>Lecture Details:</h2>
						<br>
						<textarea readonly style='font-size:15px;resize:none;width:70%;height:170px;background:none;border:none;margin-left:3%;'>".$row12['l_details']."</textarea>
					
					</div>
					";
				}
				
				
				else if(isset($_GET['video']))
				{
						include("inc/db.php");
						$get_cat2=$con->prepare("select *from lectures where lecture_id='".$_GET['video']."'");
						$get_cat2->setFetchMode(PDO:: FETCH_ASSOC);
						$get_cat2->execute();
						$row2=$get_cat2->fetch();

						$get_cat12=$con->prepare("select *from upload_lec_matrial where lecture_id='".$_GET['video']."'");
						$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
						$get_cat12->execute();
						$getnoofvide=$get_cat12->rowCount();
						echo"<div id='bodyright1' style='padding-left:1%;padding-top:1%;'>
							<h1 style='font-size:20px;'>  Lecture Number - <b style='color:red;'>Week - ".$row2['l_no']."</b></h1>
						<h2 style='font-size:20px;'>Lecture Name: <b style='color:red;'>".$row2['l_name']."</b></h2>
						<h2 style='font-size:20px;'>Lecture Videos: <b style='color:red;'>$getnoofvide</b></h2>
						
							<table>
					";
					
						while($row12=$get_cat12->fetch()):
							
							echo"
								<tr>
									
									<td style='width:400px;padding:5%;'>
									<video width='800' controls>
										<source src='../../teacher/admin/video/".$row12['lec_video']."' type='video/mp4'>
									</video>
									</td>
								</tr>
					
							
							";
					
					
						endwhile;
						echo"</table></div>
								";
					
					
				}
				
				
				else if(isset($_GET['pdf']))
				{
						include("inc/db.php");
						$get_cat2=$con->prepare("select *from lectures where lecture_id='".$_GET['pdf']."'");
						$get_cat2->setFetchMode(PDO:: FETCH_ASSOC);
						$get_cat2->execute();
						$row2=$get_cat2->fetch();

						$get_cat12=$con->prepare("select *from upload_lec_matrial where lecture_id='".$_GET['pdf']."'");
						$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
						$get_cat12->execute();
						$getnoofvide=$get_cat12->rowCount();
						echo"<div id='bodyright1' style='padding-left:1%;padding-top:1%;'>
							<h1 style='font-size:20px;'>  Lecture Number - <b style='color:red;'>Week - ".$row2['l_no']."</b></h1>
						<h2 style='font-size:20px;'>Lecture Name: <b style='color:red;'>".$row2['l_name']."</b></h2>
						<h2 style='font-size:20px;'>Lecture Pdf: <b style='color:red;'>$getnoofvide</b></h2>
						
							<table>
					";
					
						while($row12=$get_cat12->fetch()):
							
							echo"
								<tr>
									
										<td><a href='../../teacher/admin/pdf/".$row12['lec_pdf']."' target='_blank'>".$row12['lec_pdf']."</a></td>
								</tr>
					
							
							";
					
					
						endwhile;
						echo"</table></div>
								";
					
					
				}
				else
				{
		
		?>
		<div id="bodyright1">
		<?php
			include("inc/db.php");
			$get_cat12=$con->prepare("select *from contact where con_id='".$_COOKIE['userid']."'");
			$get_cat12->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat12->execute();
			$row12=$get_cat12->fetch();

			echo"
		
			<h3>".$row12['username']."</h3>
			<table>
			<tr>
					<td>Date of Enroll </td>
					<td>22/3/2019</td>
				</tr>
				
				<tr>
					<td>Email </td>
					<td>".$row12['email']."</td>
				</tr>
				<tr>
					<td>Name </td>
					<td>".$row12['username']."</td>
				</tr>
			
			<tr>
					<td colspan='2'>Assesment Scores </td>
					
				</tr>
			";
				$get_cat=$con->prepare("select *from lectures where c_id='".$_GET['c_id']."' order by l_no asc");
				$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
				$get_cat->execute();
				
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
										$a=0;
										$get_cat1=$con->prepare("select *from assignment_questions where lecture_id='".$row['lecture_id']."'");
										$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
										$get_cat1->execute();
										$noofquestion=$get_cat1->rowCount();
										while($row1=$get_cat1->fetch()):
												$get_cat11=$con->prepare("select *from assignment_answer where question_id='".$row1['question_id']."' and con_id='".$_COOKIE['userid']."'");
												$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
												$get_cat11->execute();
											
												$row11=$get_cat11->fetch();
												
												if($row1['answer']==$row11['answer'])
												{
													$a=$a+1;
												}
									
												
										endwhile;
										
										if(!empty($a)&&!empty($noofquestion))
										{
										$total=$a/$noofquestion*100;
										}
										else
										{
											$total=0;
										}
								echo"<tr>
										<td>Assignemt ".$row['l_no']."</td>
										<td>$total</td>
									</tr>
							";
						}
				endwhile;
				
			
			
			echo"
			</table>";
			?>
		</div>
		
		
		
		
		<?php 
				}
		?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</body>
</html>
