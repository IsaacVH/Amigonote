<?php
	$page['title'] = 'Sign Up';
?>


<script>
	function submitUserSignup() {
		$("#signupForm").submit();
	}

	function goToLogin() {
		window.location.href = "/login";
	}
</script>

<div id="signup-content">
	<h2>SIGN UP</h2>
	<div class="form-box blue-border">
		<!-- Simple Textfield -->
		<form id="signupForm" action="/web/functions/create-user.php">
			<div class="mdl-textfield mdl-js-textfield textfield-demo">
				<input class="mdl-textfield__input" type="text" id="firstname" name="firstname"/>
				<label class="mdl-textfield__label" for="firstname">First Name</label>
			</div>
			<br />
			<div class="mdl-textfield mdl-js-textfield textfield-demo">
				<input class="mdl-textfield__input" type="text" id="lastname" name="lastname"/>
				<label class="mdl-textfield__label" for="lastname">Last Name</label>
			</div>
			<br />
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
		<button class="sign-up-button" onclick="submitUserSignup()">Sign Up</button>
		<button class="log-in-button" onclick="goToLogin()">Log In</button>
	</div>
</div>
