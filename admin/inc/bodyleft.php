<div id="bodyleft">
	
	<h3>Categories Management</h3>
	
	<ul>
		<li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
				<li><a href="index.php?verify"><i class="fas fa-home"></i>Verify Trasaction Id</a></li>

	<li><a href="index.php?cat"><i class="fas fa-th"></i>View Categories</a></li>
		<li><a href="index.php?sub_cat"><i class="fas fa-stream"></i>View Sub Categories</a></li>
		<li><a href="index.php?lang"><i class="fas fa-american-sign-language-interpreting"></i>View Languages</a></li>
		
	</ul>
	
	
	
	
	
	<h3>Pages Management</h3>
	
	<ul>
		<li><a href="index.php?terms"><i class="far fa-grin-squint-tears"></i>Terms & Conditions page</a></li>
		<li><a href="index.php?contact"><i class="fas fa-phone-volume"></i>Contact Us Page</a></li>
		<li><a href="index.php?about"><i class="fas fa-book-dead"></i>About Us Page</a></li>
		<li><a href="index.php?faqs"><i class="fas fa-question-circle"></i>FAQs Page</a></li>
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
	if(isset($_GET['verify']))
	{
		include("traction.php");
	}

?>