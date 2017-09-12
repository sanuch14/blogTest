<?php
require_once '../constants/Constants.php';
require_once '../pageParts/PagePart.php';

include 'DataBase.php';

DataBase::addArticle($_POST['category_id'],$_POST['title'],$_POST['description'],
	$_POST['content'],$_POST['picture_preview'],$_POST['picture']);

//echo json_encode(array('user_id' => '0'));
//exit();

header ('Location: /index.php');  // перенаправление на нужную страницу
exit();    // прерываем работу скрипта, чтобы забыл о прошлом

?>