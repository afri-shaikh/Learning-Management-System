<?php
	function add_lang()
	{
		include("inc/db.php");
		if(isset($_POST['add_lang']))
		{
			$lang_name=$_POST['lang_name'];
			
			
			$check=$con->prepare("select * from lang where lang_name='$lang_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			
			if($count==1)
			{
				echo"<script>alert('Language Already Added')</script>";
						echo"<script>window.open('index.php?lang','_self')</script>";
					
			}
			else{
					$add_cat=$con->prepare("insert into lang(lang_name)values('$lang_name')");
					
					if($add_cat->execute())
					{
						echo"<script>alert('Language Added Successfully')</script>";
						echo"<script>window.open('index.php?lang','_self')</script>";
					
					}
					else
					{
						echo"<script>alert('Language Not Added Successfully')</script>";
						echo"<script>window.open('index.php?lang','_self')</script>";
					
					}
			}
		}
	}
	
	function edit_lang()
	{
		include("inc/db.php");
		
		
		
		if(isset($_GET['edit_lang']))
		{
			$id=$_GET['edit_lang'];
			$get_cat=$con->prepare("select * from lang where lang_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			echo"
					<h3>Edit Language</h3>
						<form id='edit_form' method='post' enctype='multipart/form-data'>
						<input type='text' value='".$row['lang_name']."' name='lang_name' placeholder='Enter Language Name' />
						
						<center><button name='edit_lang'>Edit Language</button></center>
					
					</form>";
					if(isset($_POST['edit_lang']))
					{
						$cat_name=$_POST['lang_name'];
						
						$check=$con->prepare("select * from lang where lang_name='$cat_name'");
						$check->setFetchMode(PDO:: FETCH_ASSOC);
						$check->execute();
						$count=$check->rowCount();
			
						if($count==1)
						{
							echo"<script>alert('Language Already Added')</script>";
									echo"<script>window.open('index.php?lang','_self')</script>";
								
						}
						else
						{
						
							$add_cat=$con->prepare("update lang set lang_name='$cat_name' where lang_id='$id'");
						
							if($add_cat->execute())
							{
								echo"<script>alert('Language Updated Successfully')</script>";
								echo"<script>window.open('index.php?lang','_self')</script>";
							
							}
							else
							{
								echo"<script>alert('Language Not Updated Successfully')</script>";
								echo"<script>window.open('index.php?lang','_self')</script>";
							
							}	
						}
					}
			
			
		}
	}
	
	
	function view_lang()
	{
		include("inc/db.php");
	
		$get_lang=$con->prepare("select * from lang");
		$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
		$get_lang->execute();
		$i=1;
		while($row=$get_lang->fetch()):
			
			echo"<tr >
					<td>".$i++."</td>
					<td>".$row['lang_name']."</td>
					<td><a style='margin-right:10px;' href='index.php?lang&edit_lang=".$row['lang_id']."' title='Edit'><i class='far fa-edit'></i></a>
					<a style='color:#f00;' href='index.php?lang&del_lang=".$row['lang_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
				</tr>";
			
		endwhile;
		
		if(isset($_GET['del_lang']))
		{
			$id=$_GET['del_lang'];
			$del=$con->prepare("delete from lang where lang_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Language Deleted Successfully')</script>";
				echo"<script>window.open('index.php?lang','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Language Not Deleted Successfully')</script>";
				echo"<script>window.open('index.php?lang','_self')</script>";
							
				
			}
		}
		
	}
	
	
	
	
	
	
	
	function add_cat()
	{
		include("inc/db.php");
		if(isset($_POST['add_cat']))
		{
			$cat_name=$_POST['cat_name'];
			$cat_icon=$_POST['cat_icon'];
			
			$check=$con->prepare("select *from cat where cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			
			if($count==1)
			{
				echo"<script>alert('Category Already Added')</script>";
						echo"<script>window.open('index.php?cat','_self')</script>";
					
			}
			else
			{
					$check1=$con->prepare("insert into cat(cat_name,cat_icon)values('$cat_name','$cat_icon')");
					
					if($check1->execute())
					{
						echo"<script>alert('Category Added Successfully')</script>";
						echo"<script>window.open('index.php?cat','_self')</script>";
					
					}
					else
					{
						echo"<script>alert('Category Not Added Successfully')</script>";
						echo"<script>window.open('index.php?cat','_self')</script>";
					
					}
			}
		}
	}
	
	function view_cat()
	{
		include("inc/db.php");
	
		$get_cat=$con->prepare("select group_number,date from order_details where con_id='".$_COOKIE['userid']."' and status!='send' group by group_number");
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
					<td><a style='margin-right:10px;' href='index.php?cat&viewcourse=".$row['group_number']."' title='View Course Details'><i class='far fa-eye'></i>   View</a>
					</td></tr>";
			
		endwhile;
		}
		
		
	}
	function view_cat1()
	{
		include("inc/db.php");
	
		$get_cat=$con->prepare("select group_number,date,status,admin_approve from order_details where con_id='".$_COOKIE['userid']."' and status='send' group by group_number");
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
					<td><a href='index.php?cat&view_details=".$row['group_number']."'>View</td>
					</tr>";
			
		endwhile;
		}
		
		
	}
	
	function edit_cat()
	{
		include("inc/db.php");
		
		
		
		if(isset($_GET['edit_cat']))
		{
			$id=$_GET['edit_cat'];
			$get_cat=$con->prepare("select * from cat where cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			echo"
					<h3>Edit Category</h3>
						<form id='edit_form' method='post' enctype='multipart/form-data'>
						<input type='text' value='".$row['cat_name']."' name='cat_name' placeholder='Enter Category Name Here' />
						<input type='text' value='".$row['cat_icon']."' name='cat_icon' placeholder='Enter Category Icon Code Here' />
						
						<center><button name='edit_cat'>Edit Category</button></center>
					
					</form>";
					if(isset($_POST['edit_cat']))
					{
						$cat_name=$_POST['cat_name'];
						$cat_icon=$_POST['cat_icon'];
						$check=$con->prepare("select * from cat where cat_name='$cat_name' and cat_icon='$cat_icon'");
						$check->setFetchMode(PDO:: FETCH_ASSOC);
						$check->execute();
						$count=$check->rowCount();
			
						if($count==1)
						{
							echo"<script>alert('Category Already Added')</script>";
									echo"<script>window.open('index.php?cat','_self')</script>";
								
						}
						else
						{
						
							$add_cat=$con->prepare("update cat set cat_name='$cat_name',cat_icon='$cat_icon' where cat_id='$id'");
						
							if($add_cat->execute())
							{
								echo"<script>alert('Category Updated Successfully')</script>";
								echo"<script>window.open('index.php?cat','_self')</script>";
							
							}
							else
							{
								echo"<script>alert('Category Not Updated Successfully')</script>";
								echo"<script>window.open('index.php?cat','_self')</script>";
							
							}	
						}
					}
			
			
		}
	}
	
	
	
	
	
	function add_sub_cat()
	{
		include("inc/db.php");
		if(isset($_POST['add_sub_cat']))
		{
			$cat_name=$_POST['sub_cat_name'];
			$cat_id=$_POST['cat_id'];
			
			$check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			
			if($count==1)
			{
				echo"<script>alert('Sub Category Already Added')</script>";
						echo"<script>window.open('index.php?sub_cat','_self')</script>";
					
			}
			else{
					$add_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id)values('$cat_name','$cat_id')");
					
					if($add_cat->execute())
					{
						echo"<script>alert('Sub Category Added Successfully')</script>";
						echo"<script>window.open('index.php?sub_cat','_self')</script>";
					
					}
					else
					{
						echo"<script>alert('Sub Category Not Added Successfully')</script>";
						echo"<script>window.open('index.php?sub_cat','_self')</script>";
					
					}
			}
		}
	}
	function view_sub_cat()
	{
		include("inc/db.php");
	
		$get_cat=$con->prepare("select * from sub_cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$i=1;
		while($row=$get_cat->fetch()):
			
			$id=$row['cat_id'];
			 $get_c=$con->prepare("select * from cat where cat_id='$id'");
				$get_c->setFetchMode(PDO:: FETCH_ASSOC);
				$get_c->execute();
				
				$row_cat=$get_c->fetch();
			echo"<tr >
					<td>".$i++."</td>
					<td>".$row['sub_cat_name']."</td>
					<td>".$row_cat['cat_name']."</td>
					<td><a style='margin-right:10px;' href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."' title='Edit'><i class='far fa-edit'></i></a>
					<a style='color:#f00;' href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
				</tr>";
			
		endwhile;
		if(isset($_GET['del_sub_cat']))
		{
			$id=$_GET['del_sub_cat'];
			$del=$con->prepare("delete from sub_cat where sub_cat_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Sub Category Deleted Successfully')</script>";
				echo"<script>window.open('index.php?sub_cat','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Sub Category Not Deleted Successfully')</script>";
				echo"<script>window.open('index.php?sub_cat','_self')</script>";
							
				
			}
		}
	}
	
	function edit_sub_cat()
	{
		include("inc/db.php");
		
		
		
		if(isset($_GET['edit_sub_cat']))
		{
			$id=$_GET['edit_sub_cat'];
			$get_cat=$con->prepare("select * from sub_cat where sub_cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			$cat_id=$row['cat_id'];
			$get_c=$con->prepare("select * from cat where cat_id='$cat_id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			
			echo"
					<h3>Edit Sub Category</h3>
						<form id='edit_form' method='post' enctype='multipart/form-data'>
						<select name='cat_id'>
						<option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>
						"; echo select_cat();echo"
						</select>
						<input type='text' value='".$row['sub_cat_name']."' name='sub_cat_name' placeholder='Enter Category Name' />
						
						<center><button name='edit_sub_cat'>Edit Sub Category</button></center>
					
					</form>";
					if(isset($_POST['edit_sub_cat']))
					{
						$cat_name=$_POST['sub_cat_name'];
						$cat_id=$_POST['cat_id'];
						$check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name' and cat_id='$cat_id'");
						$check->setFetchMode(PDO:: FETCH_ASSOC);
						$check->execute();
						$count=$check->rowCount();
			
						if($count==1)
						{
							echo"<script>alert('Sub Category Already Added')</script>";
									echo"<script>window.open('index.php?sub_cat','_self')</script>";
								
						}
						else
						{
						
							$add_cat=$con->prepare("update sub_cat set sub_cat_name='$cat_name',cat_id='$cat_id' where sub_cat_id='$id'");
						
							if($add_cat->execute())
							{
								echo"<script>alert('Sub Category Updated Successfully')</script>";
								echo"<script>window.open('index.php?sub_cat','_self')</script>";
							
							}
							else
							{
								echo"<script>alert('Sub Category Not Updated Successfully')</script>";
								echo"<script>window.open('index.php?sub_cat','_self')</script>";
							
							}	
						}
					}
			
			
		}
	}
	
	
	
	
	
	
	
	function select_Cat()
	{
		include("inc/db.php");
		$get_cat=$con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			
			echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
			
		endwhile;
	}
	
	
	function add_term()
	{
		include("inc/db.php");
		if(isset($_POST['add_term']))
		{
			$cat_name=$_POST['term'];
			$cat_id=$_POST['for_whome'];
			
			$check=$con->prepare("select *from term where term='$cat_name' and for_whome='$cat_id'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			
			if($count==1)
			{
				echo"<script>alert('Term Already Added')</script>";
						echo"<script>window.open('index.php?terms','_self')</script>";
					
			}
			else{
					$add_cat=$con->prepare("insert into term(term,for_whome)values('$cat_name','$cat_id')");
					
					if($add_cat->execute())
					{
						echo"<script>alert('Term Added Successfully')</script>";
						echo"<script>window.open('index.php?terms','_self')</script>";
					
					}
					else
					{
						echo"<script>alert('Term Not Added Successfully')</script>";
						echo"<script>window.open('index.php?terms','_self')</script>";
					
					}
			}
		}
	}
	
	
	function view_term()
	{
		include("inc/db.php");

			 $get_c=$con->prepare("select * from term where for_whome='Student'");
				$get_c->setFetchMode(PDO:: FETCH_ASSOC);
				$get_c->execute();
				$i=1;
			while($row=$get_c->fetch()):
			echo"<tr>
					<td>".$i++."</td>
					<td>".$row['term']."</td>
					<td>".$row['for_whome']."</td>
					</tr>";
			
		endwhile;
		
	}
	
	
	function edit_term()
	{
		include("inc/db.php");
		
		
		
		if(isset($_GET['edit_term']))
		{
			$id=$_GET['edit_term'];
			$get_cat=$con->prepare("select * from term where t_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();

			
			echo"
					<h3>Edit T&C</h3>
						<form id='edit_form' method='post' enctype='multipart/form-data'>
						<select name='for_whome'>
						<option value='".$row['for_whome']."'>".$row['for_whome']."</option>
						"; echo select_term();echo"
						</select>
						<input type='text' value='".$row['term']."' name='term' placeholder='Enter Term Name' />
						
						<center><button name='edit_term'>Edit T&C</button></center>
					
					</form>";
					if(isset($_POST['edit_term']))
					{
						$cat_name=$_POST['term'];
						$cat_id=$_POST['for_whome'];
						$check=$con->prepare("select * from term where term='$cat_name' and for_whome='$cat_id'");
						$check->setFetchMode(PDO:: FETCH_ASSOC);
						$check->execute();
						$count=$check->rowCount();
			
						if($count==1)
						{
							echo"<script>alert('Term Already Added')</script>";
									echo"<script>window.open('index.php?terms','_self')</script>";
								
						}
						else
						{
						
							$add_cat=$con->prepare("update term set term='$cat_name',for_whome='$cat_id' where t_id='$id'");
						
							if($add_cat->execute())
							{
								echo"<script>alert('Term Updated Successfully')</script>";
								echo"<script>window.open('index.php?terms','_self')</script>";
							
							}
							else
							{
								echo"<script>alert('Term Not Updated Successfully')</script>";
								echo"<script>window.open('index.php?terms','_self')</script>";
							
							}	
						}
					}
			
			
		}
	}
	function select_term()
	{
		include("inc/db.php");
		$get_cat=$con->prepare("select * from term");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			
			echo"<option value='".$row['for_whome']."'>".$row['for_whome']."</option>";
			
		endwhile;
	}
	
	function contact()
	{
		include("inc/db.php");
		session_start();
		$contact=$con->prepare("select * from contact where con_id='".$_SESSION['user']['con_id']."'");
		$contact->setFetchMode(PDO:: FETCH_ASSOC);
		$contact->execute();
		$row=$contact->fetch();
		echo"
		<form method='post' enctype='multipart/form-data'>
			
				<table>
				
					";?>
					<tr>
						<td>Update Photo</td>
						<td><img src='../../imgs/userdp/<?php echo"".$row['photo']."";?>' id='blah' title="below select and change the image"><input type='file' name="pro_img1" onchange='readURL(this);' style="width:85px;padding-left:0px;height:20px;padding-top:-10%;margin-left:12%;" /></td>
					</tr>
					<script>
					 function readURL(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#blah')
										.attr('src', e.target.result)
										.width(150)
										.height(150);
								};

								reader.readAsDataURL(input.files[0]);
							}
						}
					</script>
					<?php echo"<tr>
						<td>Update Contact No.</td>
						<td><input type='tel' name='phn' value='".$row['phn']."'></td>
					</tr>
					<tr>
						<td>Update Email</td>
						<td><input type='email' name='email' value='".$row['email']."'></td>
					</tr>
						<tr>
						<td>Update Username</td>
						<td><input type='text' name='uname' value='".$row['username']."'></td>
					</tr>
					<tr>
						<td>Update About You</td>
						<td><input type='text' name='about' value='".$row['about']."'></td>
					</tr>
					<tr>
						<td>Update Office Address Line 1</td>
						<td><input type='text' name='add1' value='".$row['add1']."'></td>
					</tr>
					
					<tr>
						<td>Update Office Address Line 2</td>
						<td><input type='text' name='add2' value='".$row['add2']."'></td>
					</tr>
					
					<tr>
						<td>http://youtube.com/</td>
						<td><input type='text' name='yt' value='".$row['yt']."'></td>
					</tr>
					<tr>
						<td>http://facebook.com/</td>
						<td><input type='text' name='fb' value='".$row['fb']."'></td>
					</tr>
					<tr>
						<td>http://plus.google.com/</td>
						<td><input type='text' name='gp' value='".$row['gp']."'></td>
					</tr>
					<tr>
						<td>http://twitter.com/</td>
						<td><input type='text' name='tw' value='".$row['tw']."'></td>
					</tr>
					<tr>
						<td>http://linkedin.com/</td>
						<td><input type='text' name='ln' value='".$row['link']."'></td>
					</tr>
					
				</table>
				
					
					<center><button name='update_contact'>Update Information</button></center>
				
			</form>
	
		";
		
		if(isset($_POST['update_contact']))
		{
			$phn=$_POST['phn'];
			$email=$_POST['email'];
			$add1=$_POST['add1'];
			$add2=$_POST['add2'];
			$yt=$_POST['yt'];
			$fb=$_POST['fb'];
			$gp=$_POST['gp'];
			$tw=$_POST['tw'];
			$ln=$_POST['ln'];
			$about=$_POST['about'];
			$username=$_POST['uname'];
			if($_FILES['pro_img1']['tmp_name']=="")
			{
				
			}
			else
			{
				$pro_img1=$_FILES['pro_img1']['name'];
				$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
				move_uploaded_file($pro_img1_tmp,"../../imgs/userdp/$pro_img1");	
			
				$up_img1=$con->prepare("update contact set photo='$pro_img1' where con_id='".$_SESSION['user']['con_id']."'");
			
				$up_img1->execute();
			
			}
			
			$contact_insert=$con->prepare("update contact set username='$username',about='$about',phn='$phn',email='$email',add1='$add1',add2='$add2',yt='$yt',fb='$fb',gp='$gp',tw='$tw',link='$ln' where con_id='".$_SESSION['user']['con_id']."'");
			if($contact_insert->execute())
			{
				echo"<script>alert('Contact Information Updated Successfully')</script>";
								echo"<script>window.open('index.php?contact','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Contact Information Updated Successfully')</script>";
								echo"<script>window.open('index.php?contact','_self')</script>";
							
			}
		}
		
	}
	
			
	
	
	
	function add_faqs()
	{
		include("inc/db.php");
		if(isset($_POST['add_faqs']))
		{
			$cat_name=$_POST['qsn'];
			$ans=$_POST['ans'];
			
			$check=$con->prepare("select * from faqs where qsn='$cat_name' and ans='$ans'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			
			if($count==1)
			{
				echo"<script>alert('Qestion Already Added')</script>";
						echo"<script>window.open('index.php?faqs','_self')</script>";
					
			}
			else{
					$add_cat=$con->prepare("insert into faqs(qsn,ans)values('$cat_name','$ans')");
					
					if($add_cat->execute())
					{
						echo"<script>alert('Qestion Added Successfully')</script>";
						echo"<script>window.open('index.php?faqs','_self')</script>";
					
					}
					else
					{
						echo"<script>alert('Qestion Not Added Successfully')</script>";
						echo"<script>window.open('index.php?faqs','_self')</script>";
					
					}
			}
		}
	}
	
	
	
	function view_faqs()
	{
		include("inc/db.php");
		
		 $get_faqs=$con->prepare("select * from faqs");
				$get_faqs->setFetchMode(PDO:: FETCH_ASSOC);
				$get_faqs->execute();
				$i=1;
			while($row=$get_faqs->fetch()):
				echo"<details>
					<summary>".$row['qsn']."</summary>
					<form method='post' enctype='multipart/form-data'>
						<input type='text' value='".$row['qsn']."' name='up_qsn' placeholder='Enter Qestion Name' />
						
						<input type='hidden' name='id' value='".$row['q_id']."' />
						
						<textarea name='up_ans' placeholder='Enter Answer Here'>".$row['ans']."</textarea>	
							<center><button name='up_faqs'>Updated FAQs</button></center>
						
					</form>
				</details><br />";
		
		
			endwhile;
		if(isset($_POST['up_faqs']))
		{
			$up_qsn=$_POST['up_qsn'];
			$up_ans=$_POST['up_ans'];
			$id=$_POST['id'];
			
			
			
			$updatessn=$con->prepare("update faqs set qsn='$up_qsn',ans='$up_ans' where q_id='$id'");
			
			if($updatessn->execute())
			{
				echo"<script>alert('Qestion Updated Successfully')</script>";
				echo"<script>window.open('index.php?faqs','_self')</script>";
			
			}
			else
			{
				echo"<script>alert('Qestion Not Updated Successfully')</script>";
				echo"<script>window.open('index.php?faqs','_self')</script>";
			
			}
			
		}
		
	}
	
	
	
	function about()
	{
		include("inc/db.php");
		 $get_faqs=$con->prepare("select * from about");
				$get_faqs->setFetchMode(PDO:: FETCH_ASSOC);
				$get_faqs->execute();
				
			$row=$get_faqs->fetch();
		echo"
		
		<form method='post'>
			
			<textarea name='about'>".$row['about']."</textarea>
			<button name='up_about'>Save</button>
		</form>";
		if(isset($_POST['up_about']))
		{
			$up_qsn=$_POST['about'];
			$updatessn=$con->prepare("update about set about='$up_qsn' where a_id='1'");
			
			if($updatessn->execute())
			{
				echo"<script>alert('About Us Updated Successfully')</script>";
				echo"<script>window.open('index.php?about','_self')</script>";
			
			}
			else
			{
				echo"<script>alert('About Us Not Updated Successfully')</script>";
				echo"<script>window.open('index.php?about','_self')</script>";
			
			}
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>