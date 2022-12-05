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
	
		$get_cat=$con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$i=1;
		while($row=$get_cat->fetch()):
			
			echo"<tr >
					<td>".$i++."</td>
					<td>".$row['cat_icon']."  ".$row['cat_name']."</td>
					<td><a style='margin-right:10px;' href='index.php?cat&edit_cat=".$row['cat_id']."' title='Edit'><i class='far fa-edit'></i></a>
					<a style='color:#f00;' href='index.php?cat&del_cat=".$row['cat_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
				</tr>";
			
		endwhile;
		
		if(isset($_GET['del_cat']))
		{
			$id=$_GET['del_cat'];
			$del=$con->prepare("delete from cat where cat_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Category Deleted Successfully')</script>";
				echo"<script>window.open('index.php?cat','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Category Not Deleted Successfully')</script>";
				echo"<script>window.open('index.php?cat','_self')</script>";
							
				
			}
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
	function select_sub_Cat()
	{
		include("inc/db.php");
		$get_cat=$con->prepare("select * from sub_cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			
			echo"<option value='".$row['sub_cat_id']."'>".$row['sub_cat_name']."</option>";
			
		endwhile;
	}
	function select_lang()
	{
		include("inc/db.php");
		$get_cat=$con->prepare("select * from lang");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			
			echo"<option value='".$row['lang_id']."'>".$row['lang_name']."</option>";
			
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

			 $get_c=$con->prepare("select * from term");
				$get_c->setFetchMode(PDO:: FETCH_ASSOC);
				$get_c->execute();
				$i=1;
			while($row=$get_c->fetch()):
			echo"<tr>
					<td>".$i++."</td>
					<td>".$row['term']."</td>
					<td>".$row['for_whome']."</td>
					<td><a style='margin-right:10px;' href='index.php?terms&edit_term=".$row['t_id']."' title='Edit'><i class='far fa-edit'></i></a>
					<a style='color:#f00;' href='index.php?terms&del_term=".$row['t_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
				</tr>";
			
		endwhile;
		if(isset($_GET['del_term']))
		{
			$id=$_GET['del_term'];
			$del=$con->prepare("delete from term where t_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Term Deleted Successfully')</script>";
				echo"<script>window.open('index.php?terms','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Term Not Deleted Successfully')</script>";
				echo"<script>window.open('index.php?terms','_self')</script>";
							
				
			}
		}
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
	
	
	
	function add_course()
	{
		include("inc/db.php");
		if(isset($_POST['add_course']))
		{
			session_start();
			$c_name=$_POST['c_name'];
			$c_details=$_POST['c_details'];
			$c_learn=$_POST['c_learn'];
			$cat_id=$_POST['cat_id'];
			$sub_cat_id=$_POST['sub_cat_id'];
			$lang_id=$_POST['lang_id'];
			$c_level=$_POST['c_level'];
			$c_price=$_POST['c_price'];
			$c_offer=$_POST['c_offer'];
			$c_s_date=$_POST['c_s_date'];
			$c_duration=$_POST['c_duration'];
			$c_photo=$_FILES['c_photo']['name'];
			$c_photo_tmp=$_FILES['c_photo']['tmp_name'];
			move_uploaded_file($c_photo_tmp,"imgs/$c_photo");
			
			
			$add_course=$con->prepare("insert into courses(c_name,c_details,c_learn,cat_id,sub_cat_id,lang_id,c_level,c_price,c_offer,con_id,start_date,c_photo,c_duration)values('$c_name','$c_details','$c_learn','$cat_id','$sub_cat_id','$lang_id','$c_level','$c_price','$c_offer','".$_SESSION['user']['con_id']."','$c_s_date','$c_photo','$c_duration')");
			
			if($add_course->execute())
			{
				echo"<script>alert('Course Added Successfully')</script>";
				echo"<script>window.open('index.php?add_course','_self')</script>";
			
			}
			else
			{
				echo"<script>alert('course Not Added Successfully')</script>";
				echo"<script>window.open('index.php?add_course','_self')</script>";
			
			}
		}
	}
	
	
	function view_course()
	{
		include("inc/db.php");

		$get_lang=$con->prepare("select * from courses where con_id='".$_COOKIE['userid']."'");
		$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
		$get_lang->execute();
		$i=1;
		while($row=$get_lang->fetch()):
			$cat_id=$row['cat_id'];
			$sub_cat_id=$row['sub_cat_id'];
			$lang=$row['lang_id'];
			
			$get_c=$con->prepare("select * from cat where cat_id='$cat_id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			
			$get_c1=$con->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id'");
			$get_c1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c1->execute();
			$row_cat1=$get_c1->fetch();
			
			$get_c11=$con->prepare("select * from lang where lang_id='$lang'");
			$get_c11->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c11->execute();
			$row_cat11=$get_c11->fetch();
			
			echo"<tr >
					<td>".$i++."</td>
					<td><a style='margin-right:10px;' href='index.php?add_course&edit_course=".$row['c_id']."' title='Edit'><i class='far fa-edit'></i></a>
					<a style='color:#f00;' href='index.php?add_course&del_course=".$row['c_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
					
					<td><a href='index.php?lecture' style='color:#f00;'>Lecture</a></td>
					<td>".$row['c_name']."</td>
					
					
					<td>".$row_cat['cat_name']."(".$row['cat_id'].")</td>
					
					<td>".$row_cat1['sub_cat_name']."(".$row['sub_cat_id'].")</td>
					
					<td>".$row_cat11['lang_name']."(".$row['lang_id'].")</td>
					
					<td><img src='imgs/".$row['c_photo']."'></td>
					
					<td>".$row['c_duration']." month</td>
					
					<td>".$row['start_date']."</td>
					
					<td>".$row['c_level']."</td>
					
					<td>Rs. ".$row['c_price']."</td>
					
					<td>".$row['c_offer']."%</td>
					
					
					
				
				</tr>";
			
		endwhile;
		
		if(isset($_GET['del_course']))
		{
			$id=$_GET['del_course'];
			$del=$con->prepare("delete from courses where c_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Course Deleted Successfully')</script>";
				echo"<script>window.open('index.php?add_course','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Course Not Deleted Successfully')</script>";
				echo"<script>window.open('index.php?add_course','_self')</script>";
							
				
			}
		}
		
	}
	
	
	function othercourses()
	{
		include("inc/db.php");

		$get_lang=$con->prepare("select * from courses where con_id!='".$_COOKIE['userid']."'");
		$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
		$get_lang->execute();
		$i=1;
		while($row=$get_lang->fetch()):
			$cat_id=$row['cat_id'];
			$sub_cat_id=$row['sub_cat_id'];
			$lang=$row['lang_id'];
			
			$get_c=$con->prepare("select * from cat where cat_id='$cat_id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			
			$get_c1=$con->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id'");
			$get_c1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c1->execute();
			$row_cat1=$get_c1->fetch();
			
			$get_c11=$con->prepare("select * from lang where lang_id='$lang'");
			$get_c11->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c11->execute();
			$row_cat11=$get_c11->fetch();
			
			echo"<tr >
					<td>".$i++."</td>
					
					<td>".$row['c_name']."</td>
					
					
					<td>".$row_cat['cat_name']."(".$row['cat_id'].")</td>
					
					<td>".$row_cat1['sub_cat_name']."(".$row['sub_cat_id'].")</td>
					
					<td>".$row_cat11['lang_name']."(".$row['lang_id'].")</td>
					
					<td><img src='imgs/".$row['c_photo']."'></td>
					
					<td>".$row['c_duration']." month</td>
					
					<td>".$row['start_date']."</td>
					
					<td>".$row['c_level']."</td>
					
					<td>Rs. ".$row['c_price']."</td>
					
					<td>".$row['c_offer']."%</td>
					
					
					
				
				</tr>";
			
		endwhile;
	}
	
	
	
	
	
	
	
	
	
	
function edit_course()
	{
		include("inc/db.php");
		
		
		
		if(isset($_GET['edit_course']))
		{
			$id=$_GET['edit_course'];
			$get_cat=$con->prepare("select * from courses where c_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			$cat_id=$row['cat_id'];
			$sub_cat_id=$row['sub_cat_id'];
			$lang=$row['lang_id'];
			
			$get_c=$con->prepare("select * from cat where cat_id='$cat_id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			
			$get_c1=$con->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id'");
			$get_c1->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c1->execute();
			$row_cat1=$get_c1->fetch();
			
			$get_c11=$con->prepare("select * from lang where lang_id='$lang'");
			$get_c11->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c11->execute();
			$row_cat11=$get_c11->fetch();
			
			echo"
					<h3>Edit Course</h3>
						<form id='edit_form' method='post' enctype='multipart/form-data'>
							<input type='text' name='c_name' value='".$row['c_name']."' placeholder='Enter Course Name' />
							<textarea name='c_details' placeholder='Enter Course Details'>".$row['c_details']."</textarea>	
							<input type='text' name='c_learn' value='".$row['c_learn']."' placeholder='Enter What will learn after the course' />
				
							<select name='cat_id'>
								<option value='".$row['cat_id']."'>".$row_cat['cat_name']."</option>
								"; echo select_cat();echo"
							</select>
				
							<select name='sub_cat_id'>
								<option value='".$row['sub_cat_id']."'>".$row_cat1['sub_cat_name']."</option>
								"; echo select_sub_cat();echo"
							</select>
							<select name='lang_id'>
								<option value='".$row['lang_id']."'>".$row_cat11['lang_name']."</option>
								"; echo select_lang();echo"
							</select>
							<input type='file' name='c_photo' value='".$row['c_photo']."' />
							<select name='c_duration'>
					
								<option value='".$row['c_duration']."'>".$row['c_duration']." month</option>
								<option value='3'>3 month</option>
								<option value='6'>6 month</option>
								<option value='9'>9 month</option>
							
							</select>
				";?>
							<input type="date" value="<?php echo"".$row['start_date']."";?>" name="c_s_date" title="Course Starting Date" />
							<?php echo"
							<input type='text' name='c_level' value='".$row['c_level']."' placeholder='Enter Course Level' />
							
							<input type='number' name='c_price' value='".$row['c_price']."' placeholder='Enter Course Price' />
							
							<input type='number' maxlength='2' value='".$row['c_offer']."' name='c_offer' placeholder='Enter Course offer Percentage' />
							
								
								<center><button name='edit_course'>Update Course</button></center>
							
								
					</form>";
					if(isset($_POST['edit_course']))
					{
						
						$c_name=$_POST['c_name'];
						$c_details=$_POST['c_details'];
						$c_learn=$_POST['c_learn'];
						$cat_id=$_POST['cat_id'];
						$sub_cat_id=$_POST['sub_cat_id'];
						$lang_id=$_POST['lang_id'];
						$c_level=$_POST['c_level'];
						$c_price=$_POST['c_price'];
						$c_offer=$_POST['c_offer'];
						$c_s_date=$_POST['c_s_date'];
						$c_duration=$_POST['c_duration'];
						
						
						
						
						
						
						if($_FILES['c_photo']['tmp_name']=="")
						{
							
						}
						else
						{
							$c_photo=$_FILES['c_photo']['name'];
							$c_photo_tmp=$_FILES['c_photo']['tmp_name'];
							move_uploaded_file($c_photo_tmp,"imgs/$c_photo");	
						
							$up_img1=$con->prepare("update courses set c_photo='$c_photo' where c_id='$id'");
						
							$up_img1->execute();
						
						}
						
						
						
							$add_cat=$con->prepare("update courses set c_name='$c_name',c_details='$c_details',c_learn='$c_learn',c_level='$c_level',c_price='$c_price',c_offer='$c_offer',cat_id='$cat_id',sub_cat_id='$sub_cat_id',lang_id='$lang_id',start_date='$c_s_date',c_duration='$c_duration' where c_id='$id'");
						
							if($add_cat->execute())
							{
								echo"<script>alert('Course Updated Successfully')</script>";
								echo"<script>window.open('index.php?add_course','_self')</script>";
							
							}
							else
							{
								echo"<script>alert('Course Not Updated Successfully')</script>";
								echo"<script>window.open('index.php?add_course','_self')</script>";
							
							}	
						
					}
			
			
		}
	}
	
	
	
	
	function add_lecture()
	{
		include("inc/db.php");
		if(isset($_POST['add_lecture']))
		{
			session_start();
			$l_name=$_POST['l_name'];
			$l_no=$_POST['l_no'];
			$l_details=$_POST['l_details'];
			$c_id=$_POST['c_id'];
			
			
			$add_course=$con->prepare("insert into lectures(l_name,l_details,l_no,con_id,c_id)values('$l_name','$l_details','$l_no','".$_COOKIE['userid']."','$c_id')");
			
			if($add_course->execute())
			{
				echo"<script>alert('Lecture Added Successfully')</script>";
				echo"<script>window.open('index.php?lecture','_self')</script>";
			
			}
			else
			{
				echo"<script>alert('Lecture Not Added Successfully')</script>";
				echo"<script>window.open('index.php?lecture','_self')</script>";
			
			}
		}
	}
	
	function view_lecture()
	{
		include("inc/db.php");

		
			$get_c=$con->prepare("select * from courses where con_id='".$_COOKIE['userid']."'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			
			
			while($row=$get_c->fetch()):
			echo"<tr><td colspan='8' style='padding:0px;background:none;color:#067CB7;font-weight:bold;font-size:18px;border:1px solid #606060;'>".$row['c_name']."</td></tr>";
			$c_id=$row['c_id'];
			$i=1;
			$get_lang=$con->prepare("select * from lectures where c_id='$c_id'");
			$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
			$get_lang->execute();
			$rowcountlec=$get_lang->rowCount();
			
			if($rowcountlec<=0)
				{
					echo"<tr><td colspan='8'> No Lecture Available</td></tr>";
				}
				else
				{
					while($row_cat=$get_lang->fetch()):
					$get_lang1=$con->prepare("select * from upload_lec_matrial where lecture_id='".$row_cat['lecture_id']."'");
					$get_lang1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_lang1->execute();
					$rowcountlec1=$get_lang1->rowCount();
					
					$get_c1=$con->prepare("select * from assignment_questions where lecture_id='".$row_cat['lecture_id']."'");
					$get_c1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_c1->execute();
					$rowcountlec2=$get_c1->rowCount();
					echo"<tr >
						<td>".$i++."</td>
						<td><a style='margin-right:10px;' href='index.php?lecture&edit_lecture=".$row_cat['lecture_id']."' title='Edit'><i class='far fa-edit'></i></a>
						<a style='color:#f00;' href='index.php?lecture&del_lecture=".$row_cat['lecture_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
						
						
						<td>".$row_cat['l_name']."</td>
						
						
						<td>".$row_cat['l_no']."</td>
						
						<td title='".$row_cat['l_details']."'>hover&view</td>
						
						<td><a style='color:#2974B2;font-size:15px;' href='index.php?lecture&upload_assignment=".$row_cat['lecture_id']."' title='Delete'><i class='fas fa-upload'></i> ($rowcountlec2 Q)</a></td>
						
						<td><a style='color:#2974B2;font-size:15px;' href='index.php?lecture&upload_lec_metrials=".$row_cat['lecture_id']."' title='Delete'><i class='fas fa-upload'></i> ($rowcountlec1)</a></td>
						<td><a style='color:#2974B2;font-size:15px;' href='index.php?lecture&view_result=".$row_cat['lecture_id']."' title='Delete'>View</a></td>
						
						</tr>";
						endwhile;
				}
				
			
		
		endwhile;
		
		if(isset($_GET['del_lecture']))
		{
			$id=$_GET['del_lecture'];
			$del=$con->prepare("delete from lectures where lecture_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Lecture Deleted Successfully')</script>";
				echo"<script>window.open('index.php?lecture','_self')</script>";
							
			}
			else
			{
				echo"<script>alert('Lecture Not Deleted Successfully')</script>";
				echo"<script>window.open('index.php?lecture','_self')</script>";
							
				
			}
		}
		
	}
	
	
	function edit_lecture()
	{
		include("inc/db.php");
		
		
		
		if(isset($_GET['edit_lecture']))
		{
			$id=$_GET['edit_lecture'];
			$get_cat=$con->prepare("select * from lectures where lecture_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			$cat_id=$row['c_id'];
			
			
			$get_c=$con->prepare("select * from courses where c_id='$cat_id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			echo"
					<h3>Edit Course</h3>
						<form id='edit_form' method='post' enctype='multipart/form-data'>
							<select name='c_id'>
								<option value='".$row_cat['c_id']."'>".$row_cat['c_name']."</option>
								"; echo select_name();echo"
							</select>
						<input type='text' name='l_name' value='".$row['l_name']."' placeholder='Enter Lecture Name' />
						<input type='number' name='l_no' value='".$row['l_no']."' placeholder='Enter Lecture No' />
						<textarea name='l_details' placeholder='Enter Lectures Details'>".$row['l_details']."</textarea>	
							
								
								<center><button name='edit_lecture'>Update Lecture</button></center>
							
								
					</form>";
					if(isset($_POST['edit_lecture']))
					{
						
						$l_name=$_POST['l_name'];
						$l_no=$_POST['l_no'];
						$l_details=$_POST['l_details'];
						$c_id=$_POST['c_id'];
						$add_cat=$con->prepare("update lectures set l_name='$l_name',l_no='$l_no',l_details='$l_details',c_id='$c_id' where lecture_id='$id'");
						
							if($add_cat->execute())
							{
								echo"<script>alert('Lecture Updated Successfully')</script>";
								echo"<script>window.open('index.php?lecture','_self')</script>";
							
							}
							else
							{
								echo"<script>alert('Lecture Not Updated Successfully')</script>";
								echo"<script>window.open('index.php?lecture','_self')</script>";
							
							}	
						
					}
			
			
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	function select_name()
	{
				include("inc/db.php");
				$get_lang=$con->prepare("select * from courses where con_id='".$_COOKIE['userid']."'");
				$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
				$get_lang->execute();
				
				while($row=$get_lang->fetch()):
					echo"<option value='".$row['c_id']."'>".$row['c_name']."</option>";
				endwhile;
	
	}
	
	
	
	
?>
