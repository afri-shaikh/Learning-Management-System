<!doctype html>
<html>
	<head>
		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#bodyright12{width:82%;height:600px;background:#fff;float:left;overflow-y:auto;overflow-x:auto;}

#bodyright12 h3{margin-bottom:2%;color:#fff;text-align:center;font-size:15px;background:#74889e;height:35px;line-height:35px;font-weight:normal;}


#bodyright12 ul li:hover{transform: scale(1.1);}

#bodyright12 ul{width:100%;height:auto;padding-bottom:5%;background:#fff;font-family: 'Vibur', cursive;}

#bodyright12 ul li{transition:all 0.5s ease-in-out;float:left;width:22.6%;height:400px;border-radius:4px;padding:1%;background:#fff;margin-bottom:10px;}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: 'Vibur', cursive;
  padding-left:5px;
  padding-right:5px;
  padding-bottom:5px;
  
}

.title {
  color: #000;
  font-size: 18px;
  white-space: nowrap;
  overflow:hidden;
  opacity:0.8;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
   opacity: 0.7;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
  margin-left:10px;
  

}

button:hover, a:hover {
  opacity: 1;
}
.card p{margin-top:5px;}
.card img{width:180px;height:180px;border-radius:100px;margin-top:5px;transition:all 0.4s ease-in-out;}
.card img:hover{border-radius:4px;width:200px;}
</style>
		
	</head>
	<body>
<div id="bodyright12">

<h3>View All Teachers</h3>
<ul>

<?php

		include("inc/db.php");
		$get_lang=$con->prepare("select * from contact where role='Teacher'");
		$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
		$get_lang->execute();
		$i=1;
		while($row=$get_lang->fetch()):
		

?>
<li>		
<div class="card">
  <img src="../../imgs/userdp/<?php echo"".$row['photo']."";?>"  alt="<?php echo"".$row['username']."";?>" style="">
  <p class="title" title="<?php echo"".$row['about']."";?>" style="font-family: 'Vibur', cursive;"><?php echo"".$row['about']."";?></p>
  <p style="font-family: 'Vibur', cursive;"><?php echo"".$row['email']."";?></p>
   <p style="font-family: 'Vibur', cursive;"><?php echo"".$row['phn']."";?></p>
 
  <div style="margin: 10px 0;">
    <a href="https://www.youtube.com/<?php echo"".$row['yt']."";?>" style="color:#c4302b;"><i class="fa fa-youtube"></i></a> 
    <a href="https://www.twitter.com/<?php echo"".$row['tw']."";?>" style="color:#55ACEE;"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.linkedin.com/<?php echo"".$row['link']."";?>" style="color:#0077B5;"><i class="fa fa-linkedin"></i></a>  
    <a href="https://www.facebook.com/<?php echo"".$row['fb']."";?>"  style="color:#3B5998;"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button style="font-family: 'Vibur', cursive;"><?php echo"".$row['username']."";?></button></p>
</div>

</li>

<?php
	endwhile;
?>

</ul>


</div>


