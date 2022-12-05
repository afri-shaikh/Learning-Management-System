<div id="bodyleft">
	
	<h3>Categories Management</h3>
	
	<ul>
		<li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
		<li><a href="index.php?cat"><i class="fas fa-th"></i>View Categories</a></li>
		<li><a href="index.php?sub_cat"><i class="fas fa-stream"></i>View Sub Categories</a></li>
		<li><a href="index.php?lang"><i class="fas fa-american-sign-language-interpreting"></i>View Languages</a></li>
		<li><a href="index.php?add_course"><i class="fas fa-american-sign-language-interpreting"></i>View Courses</a></li>
		<li><a href="index.php?lecture"><i class="fas fa-american-sign-language-interpreting"></i>View lecture</a></li>
	</ul>
	
	<h3>Course Management</h3>
	
	<ul>
		<li><a href="index.php?add_course"><i class="fas fa-american-sign-language-interpreting"></i>View Courses</a></li>
		<li><a href="index.php?lecture"><i class="fas fa-american-sign-language-interpreting"></i>View lecture</a></li>
	
	</ul>
	
	<h3>User Management</h3>
	
	<ul>
		<li><a href="index.php?viewallstudent"><i class="fas fa-users"></i>View All Students</a></li>
		<li><a href="index.php?viewallteacher"><i class="fas fa-users-cog"></i>View All Teachers</a></li>
		
	</ul>
	
	<h3>Payment Management</h3>
	
	<ul>
		<li><a href="#"><i class="far fa-credit-card"></i>Complete Payment</a></li>
		
	</ul>
	
	<h3>Pages Management</h3>
	
	<ul>
		<li><a href="index.php?terms"><i class="far fa-grin-squint-tears"></i>Terms & Conditions page</a></li>
		<li><a href="index.php?contact"><i class="fas fa-phone-volume"></i>Contact Us Page</a></li>
		<li><a href="index.php?faqs"><i class="fas fa-question-circle"></i>FAQs Page</a></li>
		<li style="visibility:hidden;"><a href="#"><i class="fas fa-pen-fancy"></i>Edit Slider</a></li>
	</ul>
	
	
	
	
</div>
<?php

	if(isset($_GET['cat']))
	{
		include("cat.php");
	}
	if(isset($_GET['lang']))
	{
		include("lang.php");
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
	if(isset($_GET['add_course']))
	{
		include("add_course.php");
	}
	if(isset($_GET['lecture']))
	{
		include("lecture.php");
	}
	if(isset($_GET['upload_lec_metrials']))
	{
		include("upload_lec_metrials.php");
	}
	
	if(isset($_GET['viewallteacher']))
	{
		include("viewallteacher.php");
	}
	if(isset($_GET['viewallstudent']))
	{
		include("viewallstudent.php");
	}


?>