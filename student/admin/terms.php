<div id="bodyright">

		<?php	if(isset($_GET['edit_term'])){

			echo edit_term();
		}
		
		else
			{ ?>
	<h3>View All T&C</h3>
		
		<div id="add">
			<table style="width:60%;" cellspacing="0">
					<tr>
						<th>Sr No.</th>
						<th>Terms</th>
						<th>Terms For</th>
						</tr>
					<?php echo view_term(); ?>
			</table>
		</div>
		
</div>

		<?php
		}?>