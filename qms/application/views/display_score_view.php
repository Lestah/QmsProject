<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="text-center"><strong>Choose the correct answer</strong></h2>
		</div>
	</div><!--end of row-->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<?php 

		 $array1 = array();
		 $array2 = array(); 
		 $array3 = array(); 
		 $array4 = array(); 
		 $array5 = array(); 
		 $array6 = array(); 
		 $array7 = array(); 
		 $array8 = array(); 

		 ?>

		<?php

		 	foreach($checks as $checkans) {
			 array_push($array1, $checkans); 
			}

		?>

		<?php

			foreach($results as $res) {
			 array_push($array2, $res->answer);
				  array_push($array3, $res->quiz_id);
				  array_push($array4, $res->question);
				  array_push($array5, $res->choice1);
				  array_push($array6, $res->choice2);
				  array_push($array7, $res->choice3);
				  array_push($array8, $res->answer);
			} 

		?>
		
			<form method="post" action="thanks">
				<?php 

			    for($x=0; $x < $total_question; $x++) {

				?>

			  <fieldset class="form-group">
			    <legend>Question</legend>
			    <div class="form-check">
			      	<h4><strong><?php echo $array3[$x];?>. <?php echo $array4[$x]; ?></strong></h4>

			      	<?php if ($array2[$x] != $array1[$x]) { ?>

			      		<p><span style="background-color: #FF9C9E"><?php echo $array1[$x]; ?></span></p>
						<p><span style="background-color: #ADFFB4"><?php echo $array2[$x]; ?></span></p>

						<?php } else { ?>

							<p><span style="background-color: #ADFFB4"><?=$array1[$x] ?></span></p>
							
							<?php

							$score += 1; 

					} ?> <!--end of else -->
				<?php //} ?> <!--end of forloop -->
				
     
			  </fieldset>
			  <?php } ?><!--closing of forloop-->

			  <h4>Your Score: </h2>
				<h2><?php echo $score; ?>/<?php echo $total_question; ?></h1>
				<input type="hidden" name="score" value="<?php echo $score; ?>">
				<input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">

				<?php if ($score == $total_question) { ?>
					<h2>You got a perfect score<h2>
					<h2>Your prize is <?php //echo $prize; ?></h2>
				<?php }?>

			  
			  <button type="submit" class="btn btn-primary pull-right btn-lg">Submit Score</button>
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