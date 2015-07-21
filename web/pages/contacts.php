<?php
	$page['title'] = 'Contacts';
?>

<div>
	<div>
		Current User: 
		<?php 
			if(isset($_SESSION['user'])) { 
				echo $_SESSION['user']['FirstName'];
			} else { 
				echo "none";
			}


			require_once("/web/operations/contact.php");
		?>
	</div>
	<div></div>
</div>
