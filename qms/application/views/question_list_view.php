<!--<div class="container">-->
<div class="row">
	<div class="col-md-10">
		<h1>All Questions</h1>
	</div>

	<div class="col-md-2">
		<a href="<?php echo base_url()?>index.php/question/add_new_question" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px">Add question</a>
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div><!--end of div row-->
<div class="row">
	<div class="col-md-12">
	    <table class="table table-hover">
		<thead>
			
				<th>#</th>
				<th>Question</th>
				<th>choice 1</th>
				<th>choice 2</th>
				<th>choice 3</th>
				<th>Answer</th>
				<th></th>
			
		</thead>
			<tbody>
				<?php

					foreach( $questions as $row ) {
						/*$ans_array = array($row->choice1, $row->choice2, $row->choice3, $row->answer);
						shuffle($ans_array);*/
				?>
				
				<tr>
					<th><?php echo $row->quiz_id; ?></th>
					<td class="col-md-2"><?php echo $row->question; ?></td>
					<td class="col-md-2"><?php echo $row->choice1; ?></td>
					<td class="col-md-2"><?php echo $row->choice2; ?></td>
					<td class="col-md-2"><?php echo $row->choice3; ?>
					<td class="col-md-2"><?php echo $row->answer; ?></td>
					<td class="col-md-2"><a href="<?php echo site_url('question/edit/'.$row->quiz_id); ?>" class="btn btn-default">edit</a> <a href="<?php echo site_url('question/delete/'.$row->quiz_id); ?>" class="btn btn-default" onClick="return confirm('Are you sure you want to delete?')">delete</a></td>
				</tr>

				<?php } ?>
				
			</tbody>
		</table>

		<?php //echo $this->pagination->create_links(); ?>

	</div><!-- end of div col-md-8-->


</div>
<!--</div><!--end of div container-->