<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <title><?php print $title ?></title>
		<link rel="stylesheet" href="static/css/style.css"/>
		<link rel="icon" href="static/logo_MW.png">
		<!--<link rel="stylesheet" href="static/css/jquery-ui.css"/>-->
		
	</head>
	
	<body>
		<header>
			
			<a id="destroysession" href="index.php?page=destroy_session"><!--<img id="iconedeconnexion" src="static/iconedeconnexion.jpg" alt="deconnexion"/>-->Quitter Woodadmin</a>
			<div id="img">
				<?php $redirection_image = empty($_SESSION)?"index.php":"index.php?page=portail_admin";?>
				<a href=<?php echo($redirection_image)?>><img id="logo" src="static/logo_MW.png" alt="MobilWood"/></a>
			</div>

        
			<div id="nav">
				<?php print $nav ?>
			</div>
			
		</header>
        
        <div id="content">
            <?php print $content ?>
        </div>
	</body>

    <script src='static/js/jquery-3.2.1.js'></script>
	<script src='static/js/jquery-ui.js'></script>
	<script src='static/js/woodadmin.js'></script>

	
</html>

