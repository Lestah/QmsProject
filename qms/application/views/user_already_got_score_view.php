<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-center"><strong>Hi <?php echo $this->session->userdata('username'); ?></strong></h1>
			<h1 class="text-center"><strong>You already took the quiz</strong></h1>
			<h1 class="text-center"><strong>Your Score is <?php echo $this->session->userdata('score'); ?></strong></h1>
			<h1 class="text-center"><strong>Please logout</strong></h1>
		</div>
	</div>
</div>