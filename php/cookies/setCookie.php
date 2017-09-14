<?php
	setcookie('name',$_GET['name'], time()+600,'/');
	setcookie('privileges',$_GET['privileges'], time()+600, '/');
	setcookie('id',$_GET['id'], time()+600, '/');
	echo 'hi';
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
