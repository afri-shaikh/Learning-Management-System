<div id="bodyright_catmenu">
		<?php 	
				include("inc/db.php");
				
				if(isset($_GET['id']))
				{
					$get_cat1=$con->prepare("select *from cat where cat_id='".$_GET['id']."'");
					$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat1->execute();
					
					$row1=$get_cat1->fetch();
				}
				if(isset($_GET['sub_id']))
				{
					$get_cat1=$con->prepare("select *from sub_cat where sub_cat_id='".$_GET['sub_id']."'");
					$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat1->execute();
					
					$row1=$get_cat1->fetch();
					
					$get_cat11=$con->prepare("select *from cat where cat_id='".$row1['cat_id']."'");
					$get_cat11->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat11->execute();
					
					$row11=$get_cat11->fetch();
				}
		?>
			<div id="wrap">
		
				<div id="crumb1">
				<?php
				if(isset($_GET['id']))
				{?>
					<span><a href="index.php"><i class="fas fa-home"></i> Home</a></span> <b>></b><span><?php echo"".$row1['cat_icon']." ".$row1['cat_name']."";?></span>
					
				<?php }?>
				<?php
				if(isset($_GET['sub_id']))
				{?>
					<span><a href="index.php"> <i class="fas fa-home"></i> Home</a></span> <b>></b><span><a href="cat_menu.php?id=<?php echo"".$row11['cat_id']."";?>"><?php echo"".$row11['cat_icon']." ".$row11['cat_name']."";?></a></span> <b>></b><span><?php echo"".$row11['cat_icon']." ".$row1['sub_cat_name']."";?></span>
					
				<?php }?>
				</div>
			</div>
			
			<h1><?php 
						if(isset($_GET['id']))
						{
							echo"".$row1['cat_name'].""; 
						}
						if(isset($_GET['sub_id']))
						{
							echo"".$row1['sub_cat_name'].""; 
						}
			?></h1>
			
			
			
			<br clear="all">
			<div id="top_course1">
	
	
	<ul>
	<?php 
		if(isset($_GET['id']))
		{
			$get_cat=$con->prepare("select *from courses where cat_id='".$row1['cat_id']."'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$rowc=$get_cat->rowCount();
		}	
		
		if(isset($_GET['sub_id']))
		{
			$get_cat=$con->prepare("select *from courses where sub_cat_id='".$row1['sub_cat_id']."'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$rowc=$get_cat->rowCount();
		}
		while($row=$get_cat->fetch()):
					$id=$row['con_id'];
					$get_cat1=$con->prepare("select *from contact where con_id='$id'");
					$get_cat1->setFetchMode(PDO:: FETCH_ASSOC);
					$get_cat1->execute();
					$row1=$get_cat1->fetch();
			echo"
					
			<li>
		
					<a href='course.php?c_id=".$row['c_id']."'>
					<img src='teacher/admin/imgs/".$row['c_photo']."'>
					<h3>".$row['c_name']."</h3>
					<h4>Price:Rs. ".$row['c_price']."</h4>
					<h5>Teacher Name : ".$row1['username']."</h5>
					<p>".$row['c_offer']."% Off</p>
					</a>
			</li>
	
			
			";
		
		endwhile;
		
		if($rowc==0)
		{
			echo"<h1 style='width:100%;height:50px;line-height:50px;text-align:center;margin-top:2%;'>No Course Available</h1>
			
			<img src='8.png' style='width:60%;height:300px;margin-left:20%;background:none;'>
			
			";
		}
		
		?>
	
		
		
	</ul><br clear='all'/>
	
	
</div>
				

</div><br clear='all'/>
	