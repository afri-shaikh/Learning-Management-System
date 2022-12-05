<div id="top_course">
	
	<h2>Top Courses</h2>
	<ul>
	<?php include("inc/db.php");
		
		$get_cat=$con->prepare("select *from courses");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		
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
		?>
	
		
		
	</ul><br clear='all'/>
	
	
</div>