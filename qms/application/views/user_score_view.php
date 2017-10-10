<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-center">User Score</h1>
			<table class="table table-striped">
				<thead>
			
					<th>Id</th>
					<th>Username</th>
					<th>Score</th>
			
				</thead>
					<tbody>
						<?php foreach( $score as $row ) {?>
							<tr>
								<th><strong><?php echo $row->id; ?></strong></th>
								<td><?php echo $row->username; ?></td>
								<td><?php echo $row->score; ?></td>
							</tr>
						<?php } ?>
					</tbody>	
			</table>
			
		</div>
	</div><!--end of row-->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-align">Set Prize for the user who got perfect score</h1>
			<?php
				/*$attributes = array('class' => 'form');
				echo form_open('Questions/add_question', $attributes);
				echo form_fieldset('Set Prize');
					$options = array(
						'High Five!!!' => 'high five',
						'jacket' => 'Bigyan ng Jacket yan',
						'1 hollow block' => '1 hollow block',
						'Angels Burger GC' => 'angels burger GC',
						);
				echo form_dropdown('prize', $options, 'high five');	
				echo form_fieldset_close();
				echo form_submit('submit', 'set prize'); 
				echo form_close();*/
			?>
			<?php ?>
			
			<form method="post" action="">
			  <div class="form-group">
			    <label for="prize">Choose prizes below</label>
			    <select class="form-control" name="prize">
			      <option>high five!</option>
			      <option>bigyan ng jacket yan</option>
			      <option>1 hollow block</option>
			      <option>Angel's Burger GC</option>
			    </select>
			  </div>
  
  				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			
		</div>
	</div>
</div>