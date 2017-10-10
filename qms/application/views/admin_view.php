<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin-Page</title>
  
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
      <!--<link rel="stylesheet" href="<?php echo base_url(); ?>less/style.less">-->

</head>

<body>

  <div class="wrapper">
	<div class="container">
		<h1>Sign-in to take the quiz</h1>
		
		<?php

			$attributes = array('class' => 'form');
			echo form_open('login/signin_validation', $attributes);

			echo validation_errors();

		?>

			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" id="login-button">Sign-in</button>

		<?php echo form_close(); ?>


	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!--<script src="<?php echo base_url(); ?>js/index.js"></script>-->

</body>
</html>
