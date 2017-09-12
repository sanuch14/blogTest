<?php
	require_once '../constants/Constants.php';
	require_once '../pageParts/PagePart.php';
	include 'DataBase.php';

	$tmp = DataBase::checkUser($_POST['login'], $_POST['password']);
	if(count($tmp)==7){
		echo json_encode($tmp);
		exit();
	}else{
		echo json_encode(array('user_id' => '-1'));
		exit();
	}
?>