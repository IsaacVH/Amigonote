<?php
	$page['title'] = 'Log In';
?>

<script>
	function submitUserLogin() {
		$("#loginForm").submit();
	}

	function goToSignUp() {
		window.location.href = "/signup";
	}
</script>

<div id="login-content">
	<h2>Log In</h2>
	<div class="form-box blue-border">
		<!-- Simple Textfield -->
		<form id="loginForm" action="web/functions/login-user.php?returnUrl=/login">
			<div class="mdl-textfield mdl-js-textfield textfield-demo">
				<input class="mdl-textfield__input" type="email" id="email" name="email"/>
				<label class="mdl-textfield__label" for="email">Email</label>
			</div>
			<br />
			<div class="mdl-textfield mdl-js-textfield textfield-demo">
				<input class="mdl-textfield__input" type="password" id="password" name="password"/>
				<label class="mdl-textfield__label" for="password">Password</label>
			</div>
		</form>
	</div>
	<div class="login-buttons">
		<button class="sign-up-button" onclick="goToSignUp()">Sign Up</button>
		<button class="log-in-button" onclick="submitUserLogin()">Log In</button>
	</div>
</div>
