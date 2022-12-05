<div id="bodyright">
<?php	if(isset($_GET['edit_sub_cat'])){

			echo edit_sub_cat();
		}
		
		else
			{ ?>
	<h3>View All Sub Categories</h3>
		
		<div id="add">
		<details>
			<summary>Add Sub Category</summary>
			<form method="post" enctype="multipart/form-data">
				
				<select name="cat_id">
					<option value="">Select Category</option>
					<?php echo select_cat();?>
				</select>
				
					<input type="text" name="sub_cat_name" placeholder="Enter Sub Category Name" />
					
					<center><button name="add_sub_cat">Add Sub Category</button></center>
				
			</form>
		</details>
		<table cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Sub Category Name</th>
						<th>Main Category Name</th>
						<th>Action</th>
					</tr>
					<?php echo view_sub_cat(); ?>
			</table>
			
		</div>
			<?php }?>
</div>

<?php 
	echo add_sub_cat();
?>