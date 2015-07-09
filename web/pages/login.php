<?php
	$page['title'] = 'Log In';
?>

<div id="login-content">
	<h2>Log In</h2>
	<div class="form-box blue-border">
		<!-- Simple Textfield -->
		<form action="#">
			<div class="mdl-textfield mdl-js-textfield textfield-demo">
				<input class="mdl-textfield__input" type="email" id="email" />
				<label class="mdl-textfield__label" for="email">Email</label>
			</div>
			<br />
			<div class="mdl-textfield mdl-js-textfield textfield-demo">
				<input class="mdl-textfield__input" type="password" id="password" />
				<label class="mdl-textfield__label" for="password">Password</label>
			</div>
		</form>
	</div>
	<div class="login-buttons">
		<button class="sign-up-button">Sign Up</button>
		<button class="log-in-button">Log In</button>
	</div>
</div>
