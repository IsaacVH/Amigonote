<?php 
	include("web/settings/config.php");
	$request = explode("/", $_SERVER['REQUEST_URI']);
	$pagename = $request[1];

	$page = $pages[$pagename];
	if($page == null) {
		$page = ["header" => true, "title" => "Home", "css" => "/web/css/home.css"];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $config['site-title'] . " • " . $page['title']; ?></title>
		<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="/web/lib/mdl/material.min.css">
		<link rel="stylesheet" href="/web/css/main.css">
		<?php 
			if($page['css'] != null) {
				echo '<link rel="stylesheet" href="'.$page['css'].'">';
			}
		?>
		<script src="/web/lib/mdl/material.min.js"></script>
		<?php
			if($pages['js'] != null) {
				echo '<script src="'.$page['js'].'"></script>';
			}
		?>
	</head>

	<?php 
		if($page['header'] !== null && $page['header'] == false)
			$backgroundImage = true;
		else 
			$backgroundImage = false;
	?>
	<!-- <body /*<?php echo $backgroundImage ? 'style="background-image: url(\'/web/assets/log-sign.jpg\');"' : ''; ?> > -->
	<body>
		<!-- Always shows a header, even in smaller screens. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
			<?php
				if ($page['header'] !== null && $page['header'] == false) {
					// Do nothing
				} else {
					include("web/layouts/header.php");
					include("web/layouts/drawer_menu.php");
				}
			?>
					<main class="mdl-layout__content">

				<!-- <div class="page-content"> -->
					<?php 
						// the 12 strips the subdirectory my app is running in
						include("web/pages/" . $pagename . ".php");
					?>
				<!-- </div> -->
			</main>
		</div>
	</body>
</html>