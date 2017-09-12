<?php
	setcookie('name',$_COOKIE['name'], time()-1, '/');
	setcookie('privileges', $_COOKIE['privileges'], time()-1, '/');
	setcookie('id', $_COOKIE['id'], time()-1 , '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cookie</title>
</head>
<body>
<script type="text/javascript">
	document.location.href = "/";
</script>
</body>
</html>
