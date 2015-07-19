<?php 
	require_once("web/settings/config.php");

	$request = explode("/", $_SERVER['REQUEST_URI']);
	$pagename = $request[1];

	$page = null;

	if($pagename !== "") {
		$page = $pages[$pagename];
	}

	if($pagename != "login" && $pagename != "signup" && !isset($_SESSION['user'])) {
		header("Location: /login");
	} else if($page == null) {
		header("Location: /contacts");
	}

	$_SESSION["alert"] = ["has-alert" => true, "text" => "This is a test alert"];
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
		<script src="/web/lib/jquery/jquery-2.1.4.min.js"></script>
		<?php
			if($page['js'] != null) {
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
		<?php if ($_SESSION["alert"]["has-alert"]) { include("web/layouts/alert.php"); }  ?>
		<!-- The drawer is always open in large screens. The header is always shown, even in small screens. -->
		<div class="demo-layout">
		  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
			<?php
				if ($page['header'] !== null && $page['header'] == false) {
					// Do nothing
				} else {
					include("web/layouts/header.php");
				}

				if ($page['menu'] !== null && $page['menu'] == false) {
					// Do nothing
				} else {
					include("web/layouts/drawer.php");
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