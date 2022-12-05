<div id="bodyright">

		<?php	if(isset($_GET['edit_lang'])){

			echo edit_lang();
		}
		
		else
			{ ?>
	<h3>View All Languages</h3>
		
		<div id="add">
		<details>
			<summary>Add Language</summary>
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="lang_name" placeholder="Enter Language Name" />
					
					<center><button name="add_lang">Add Language</button></center>
				
			</form>
		</details>
			<table cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Language Name</th>
						<th>Action</th>
					</tr>
					<?php echo view_lang(); ?>
			</table>
		</div>
		
</div>

		<?php 
	echo add_lang();
		}?>