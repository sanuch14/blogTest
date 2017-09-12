<?php
	require_once '../constants/Constants.php';
	require_once 'PagePart.php';
	include '../dbService/DataBase.php';

	$tmp=DataBase::getArticleRating($_POST['id']);
	$tmp++;
	DataBase::setArticleRating($_POST['id'],$tmp);

	echo Constants::RATING.$tmp;
?>