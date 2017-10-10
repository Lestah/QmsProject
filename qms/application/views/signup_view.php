<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login-Page</title>
  
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>less/style.less">

</head>

<body>

  <div class="wrapper">
	<div class="container">

		<h1>Register a Username and Password</h1>
		
		<?php

		$attributes = array('class' => 'form');
		echo form_open('register/create_user', $attributes);
		echo validation_errors();

		if(isset($account_created)) { echo "$account_created"; } 

		echo form_input('username', set_value('username', 'Username'));
		echo form_password('password', '', 'placeholder="Password"');

		echo form_password('confirm_password', '', 'placeholder="Confirm-Password"');

		if(isset($account_created)) {
			echo anchor('login/signin', 'Click Here to Login Page');
		} else { ?>
		<button type="submit" id="login-button">Submit</button>
		<?php } ?>

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
