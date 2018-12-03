<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <title><?php print $title ?></title>
		<link rel="stylesheet" href="static/css/style.css"/>
		<link rel="stylesheet" href="static/jquery-ui.css"/>
		
	</head>
	
	<body>
		<header>
		
			<div id="img">	
				<a href="index.php"><img id="logo" src="static/logo_MW.png" alt="MobilWood"/></a>
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

