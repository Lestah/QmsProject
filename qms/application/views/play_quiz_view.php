<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="text-center"><strong>Choose the correct answer</strong></h2>
		</div>
	</div><!--end of row-->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
			<form method="post" action="<?php echo base_url(); ?>index.php/score/display_score">
				<?php 
			    	foreach( $questions as $row ) {			
			    		$ans_array = array($row->choice1, $row->choice2, $row->choice3, $row->answer);
						shuffle($ans_array); 
				?>

			  <fieldset class="form-group">
			    <legend>Question</legend>
			    <div class="form-check">
			      	<h4><strong><?php echo $row->quiz_id;?>. <?php echo $row->question; ?></strong></h4>
			      	<label class="form-check-label">
			        <input type="radio" class="form-check-input" name="quizid<?php echo $row->quiz_id; ?>" value="<?php echo $ans_array[0]; ?>" required> A &nbsp;&nbsp;&nbsp;<?php echo $ans_array[0]; ?> 
			      	</label>
			    </div>
			    <div class="form-check">
			    <label class="form-check-label">
			    	<input type="radio" class="form-check-input" name="quizid<?php echo $row->quiz_id; ?>" value="<?php echo $ans_array[1]; ?>"> B &nbsp;&nbsp;&nbsp;<?php echo $ans_array[1]; ?>
			        <!--<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">-->
			      </label>
			    </div>
			    <div class="form-check">
			    <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="quizid<?php echo $row->quiz_id; ?>" value="<?php echo $ans_array[2]; ?>"> C &nbsp;&nbsp;&nbsp;<?php echo $ans_array[2]; ?>
			        <!--<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3">-->
			      </label>
			    </div>
			    <div class="form-check">
			    <label class="form-check-label">
			    	<input type="radio" class="form-check-input" name="quizid<?php echo $row->quiz_id; ?>" value="<?php echo $ans_array[3]; ?>"> D &nbsp;&nbsp;&nbsp;<?php echo $ans_array[3]; ?>
			        <!--<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3">-->
			      </label>
			    </div>

			     <!--closing of forloop-->
			  </fieldset>
			  <?php } ?>

			  <?php //echo $this->pagination->create_links(); ?>

			  
			  <button type="submit" class="btn btn-primary pull-right btn-lg">Submit</button>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			</form>


		</div><!--end of column-->

	</div><!--end of row-->


</div>