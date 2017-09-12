<?php
class PagePart
{

	public function getHead(string $pageName){
		$head =
			"<head>
				<meta charset=\"utf-8\">
				<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
				<title>$pageName</title>
			
				<!-- Bootstrap -->
				<link href=\"/css/style.css\" rel=\"stylesheet\">
			
				<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
				<script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
				<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
				<![endif]-->
			</head>";
		return $head;
	}
}
?>