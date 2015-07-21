<?php 

	if (!isset($_SESSION['user'])) {
		Alert::Create("You are not logged in.");
		header("Location: /login");
	}

?>

<div class="mdl-layout__drawer">

	<div class="drawer-padding">

		<div class="drawer-back">
			<button class="mdl-button mdl-js-button mdl-button--icon">
				<i class="material-icons">arrow_back</i>
			</button>
		</div>

		<div class="account-details">
			<div class="account-image">
				Account Image
			</div>

			<div class="name-age">
				<?php 
					if (isset($_SESSION['user'])) {
						echo array_key_exists('FirstName', $_SESSION['user']) ? $_SESSION['user']['FirstName'] : "";
						echo " ";
						echo array_key_exists('LastName', $_SESSION['user']) && sizeof($_SESSION['user']['LastName']) > 0 ? $_SESSION['user']['LastName'][0] : "";
						echo ".";
						echo array_key_exists('Age', $_SESSION['user']) ? $_SESSION['user']['Age'] : "";
					}
				?>
			</div>
			<div class="phone-number">
				<?php
					if (isset($_SESSION['user'])) {
						echo array_key_exists('Phone', $_SESSION['user']) ? $_SESSION['user']['Phone'] : "";
					}
				?>
			</div>
			<div class="email-address">
				<?php 
					if (isset($_SESSION['user'])) {
						echo array_key_exists('Email', $_SESSION['user']) ? $_SESSION['user']['Email'] : "";
					}
				?>
			</div>
		</div>
	</div>

  <nav class="mdl-navigation">
    <a class="mdl-navigation__link" href="">Link</a>
    <a class="mdl-navigation__link" href="">Link</a>
    <a class="mdl-navigation__link" href="">Link</a>
    <a class="mdl-navigation__link" href="">Link</a>
  </nav>
</div>