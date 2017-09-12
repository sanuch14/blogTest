<?php
	require_once '../constants/Constants.php';
	require_once '../pageParts/PagePart.php';

	if($_POST['password']!=$_POST['repeatPassword']){
		echo json_encode(array('user_id'=>'-2'));
		exit();
	}

	include 'DataBase.php';
	$tmp = DataBase::checkLogin($_POST['login']);
	if($tmp){
		echo json_encode(array('user_id' => '-3'));
		exit();
	}else{
		DataBase::addNewUser($_POST['login'],$_POST['password'],$_POST['name'],$_POST['lastName']);
		$tmp = DataBase::checkUser($_POST['login'], $_POST['password']);
		if(count($tmp)==7) {
			echo json_encode($tmp);
			exit();
		}else{
			echo json_encode(array('user_id' => '-4'));
			exit();
		}
	}
?>