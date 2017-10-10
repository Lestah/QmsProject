<div class="content">
	<div class="row">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php echo validation_errors(); ?>
				<h2><strong>Question</strong></h2>
				<form method="post" action="add_new_question">
					<label>Add new question below</label>
					<textarea name="question" rows="4" cols="30" class="form-control"></textarea>
					<h4>Add choices</h4>
					<label>choice 1</label>
					<input type="text" name="choice1" placeholder="type choice 1 here" class="form-control">
					<label>choice 2</label>
					<input type="text" name="choice2" placeholder="type choice 2 here" class="form-control">
					<label>choice 3</label>
					<input type="text" name="choice3" placeholder="type choice 3 here" class="form-control">
					<label>answer to the question</label>
					<input type="text" name="answer" placeholder="type your answer here" class="form-control">
					<!--<input type="submit" name="add_question_btn" value="Add" class="btn btn-success btn-lg btn-block" style="margin-top: 20px">-->
					<div class="row">
						<div class="col-sm-6">
							<input type="submit" name="add_question_btn" value="add" class="btn btn-success btn-lg btn-block" style="margin-top: 20px">
						</div>
						<div class="col-sm-6">
							<a href="<?php echo base_url(); ?>index.php/question/get_question_list" class="btn btn-success btn-lg btn-block" style="margin-top: 20px">view</a>;
						</div>
					</div>
				</form>

		<?php

		//$attributes = array('class' => 'form');
		/*echo form_open('Question/add_new_question');//$attributes);
		echo validation_errors();
		echo form_label('Post Question', 'question');
		echo form_textarea('question');
		echo form_label('input choice 1');
		echo form_input('choice1');
		echo form_label('input choice 2');
		echo form_input('choice2');
		echo form_label('input choice 3');
		echo form_input('choice3');
		echo form_label('input answer');
		echo form_input('answer'); 
		echo form_submit('add', 'Add');
		echo form_close();*/

		?>
		</div>		
	</div>
</div>