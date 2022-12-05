<div id="bodyleft">
	
	<h3>Payment Management</h3>
	
	<ul>
		<li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
		<li><a href="index.php?cat"><i class="fas fa-th"></i>Send Trasaction id</a></li>
		<li><a href="index.php?mycourses"><i class="fas fa-stream"></i>My Courses</a></li>
		
	</ul>
	
	
	<h3>User Management</h3>
	
	<ul>
		<li><a href="index.php?viewallteacher"><i class="fas fa-users-cog"></i>View All Teachers</a></li>
		
	</ul>
	
	
	<h3>Pages Management</h3>
	
	<ul>
		<li><a href="index.php?terms"><i class="far fa-grin-squint-tears"></i>Terms & Conditions page</a></li>
		<li><a href="index.php?contact"><i class="fas fa-phone-volume"></i>Contact Us Page</a></li>
		
	</ul>
	
	
	
	
</div>
<?php

	if(isset($_GET['cat']))
	{
		include("cat.php");
	}
	if(isset($_GET['mycourses']))
	{
		include("mycourses.php");
	}
	if(isset($_GET['sub_cat']))
	{
		include("sub_cat.php");
	}
	if(isset($_GET['terms']))
	{
		include("terms.php");
	}
	if(isset($_GET['contact']))
	{
		include("contact.php");
	}
	if(isset($_GET['faqs']))
	{
		include("faqs.php");
	}
	if(isset($_GET['about']))
	{
		include("about.php");
	}
	if(isset($_GET['viewallteacher']))
	{
		include("viewallteacher.php");
	}
	

?>