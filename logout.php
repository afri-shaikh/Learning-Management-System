<?php




session_start();


session_destroy(); 

	setcookie('userrole','',time()-60);
	setcookie('userid','',time()-60);
header("location:index.php");


?>