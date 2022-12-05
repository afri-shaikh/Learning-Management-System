<?php echo add_course(); ?>
<div id="bodyright">

		<?php	if(isset($_GET['edit_course'])){

			echo edit_course();
			
		}
		
		else
			{ ?>
	<h3>View All Courses</h3>
		
		<div id="add1">
		<details>
			<summary>Add Course</summary>
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="c_name" placeholder="Enter Course Name" />
				<textarea name="c_details" placeholder="Enter Course Details"></textarea>	
				<input type="text" name="c_learn" placeholder="Enter What will learn after the course" />
				
				<select name="cat_id">
					<option value="">Select Category</option>
					<?php echo select_cat();?>
				</select>
				
				<select name="sub_cat_id">
					<option value="">Select Sub Category</option>
					<?php echo select_sub_cat();?>
				</select>
				<select name="lang_id">
					<option value="">Select Language</option>
					<?php echo select_lang();?>
				</select>
				<input type="file" name="c_photo" />
				<select name="c_duration">
					
					<option value="">Select duration</option>
					<option value="3">3 month</option>
					<option value="6">6 month</option>
					<option value="9">9 month</option>
				
				</select>
				
				<input type="date" name="c_s_date" min="<?php echo date("Y-m-d");?>" title="Course Starting Date" />
				<input type="text" name="c_level" placeholder="Enter Course Level" />
				
				<input type="number" name="c_price" placeholder="Enter Course Price" />
				
				<input type="number" maxlength="2" pattern="[0-9]{2}" name="c_offer" placeholder="Enter Course offer Percentage" />
				
					
					<center><button name="add_course">Add Course</button></center>
				
			</form>
		</details>
		
			<table cellspacing="0">
			 <caption >Your Contain Courses</caption>
					<tr>
						<th>Sr No.</th>
						<th>Action</th>
						<th>View Lecture</th>
						<th>Course Name</th>
						
						<th>Cat id</th>
						<th>Sub cat id</th>
						<th>Lang id</th>
						<th>Photo</th>
						<th>Duration</th>
						<th>Start Date</th>
						<th>Level</th>
						<th>Price</th>
						<th>Offer</th>
						
						
					</tr>
					<?php echo view_course(); ?>
			</table>
			<table cellspacing="0">
			 <caption >Other Courses</caption>
					<tr>
						<th>Sr No.</th>
						
						<th>Course Name</th>
						
						<th>Cat id</th>
						<th>Sub cat id</th>
						<th>Lang id</th>
						<th>Photo</th>
						<th>Duration</th>
						<th>Start Date</th>
						<th>Level</th>
						<th>Price</th>
						<th>Offer</th>
						
						
					</tr>
					<?php echo othercourses(); ?>
			</table>
			
		</div>
		
</div>

		<?php 
	
		}?>