<?php
class DataBase
{
	private static $connection = null;

	private function __construct(){
		$this->connect();
	}

	private static function getLink(){
		if(is_null(self::$connection)){
			new self();
		}
		return self::$connection;
	}

	private function connect(){
		try{
			self::$connection = new PDO('mysql:
				host='.Constants::HOST.';
				port='.Constants::PORT.';
				dbname='.Constants::DATABASE.';',
				Constants::USERNAME,
				Constants::PASSWORD);
			self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch (PDOException $e){
			die('Ууупсс... Щось не так із базою даних...');
		}
	}

	public static function getData(string $query){
		$conn = self::getLink();
		$tmp = $conn->prepare($query);
		$tmp->execute();
		return $tmp;
	}

	public static function checkUser(string $login, string $password){
		$tmp= self::getData("
			SELECT * FROM users WHERE login='$login' AND password='$password';");
		$tmp=$tmp->fetch(PDO::FETCH_ASSOC);
		return $tmp;
	}

	public static function checkLogin(string $login){
		$tmp= self::getData("
			SELECT count(login) as users FROM users WHERE login='$login';");
		$tmp=$tmp->fetch(PDO::FETCH_ASSOC);
		return (int)$tmp['users'];
	}

	public static function getArticle(string $id){
		$tmp = self::getData("
			SELECT article_id, articles.category_id, title, content, picture,
				rating, views, date_of_creating, categories.category_name
			from articles INNER JOIN categories
				 ON articles.article_id=".$id." AND categories.category_id = articles.category_id;
		");
		$tmp=$tmp->fetch(PDO::FETCH_ASSOC);
		return $tmp;
	}

	public static function getArticlesDescription(int $startIndex, int $number){
		$tmp = self::getData("
			SELECT article_id, articles.category_id, title, description, picture_preview, views,
				date_of_creating, categories.category_name FROM articles
			INNER JOIN categories ON articles.category_id=categories.category_id 
				ORDER BY article_id DESC LIMIT ".$startIndex.",".$number.";");
		return $tmp;
	}

	public static function getCategoryName(string $id){
		$tmp = self::getData("SELECT category_name FROM categories WHERE category_id=".$id.";");
		$tmp = $tmp->fetch(PDO::FETCH_ASSOC);
		return $tmp;
	}

	public static function countCategories(){
		$tmp = self::getData("
			SELECT categories.category_name, categories.category_id, count(articles.title) as numb_of_articles
				from categories LEFT OUTER JOIN articles
			ON categories.category_id = articles.category_id
				GROUP BY categories.category_name;");
		return $tmp;
	}

	public static function getCategoryType(string $id, int $startIndex, int $number){
		$tmp = self::getData('
			SELECT article_id, title, description, picture_preview, views,
			  date_of_creating FROM articles WHERE category_id='.$id.'
			ORDER BY article_id DESC LIMIT '.$startIndex.','.$number.';');
		return $tmp;
	}

	public static function countArticlesWithId(string $id){
		$tmp = self::getData("
			SELECT COUNT(title) as number FROM articles WHERE category_id=$id;");
		$tmp = $tmp->fetch(PDO::FETCH_ASSOC);
		return (int)$tmp['number'];
	}

	public static function setArticleView(string $id){
		$tmp = self::getData("
			SELECT views FROM articles WHERE article_id=$id;");
		$tmp = $tmp->fetch(PDO::FETCH_ASSOC);
		$views = (int)$tmp['views']+1;
		self::getData("
			UPDATE articles SET views=$views WHERE article_id=$id;");

	}

	public static function addNewUser(string $login, string $password, string $name, string $last_name){
		self::getData("
		insert into users (login, password, name, last_name) 
			values ('$login', '$password', '$name', '$last_name');");
	}

	public static function addArticle(string $category_id, string $title, string $description, string $content,
		string $picture_preview, string $picture){

		self::getData("
			insert into articles (category_id, title, description, content, picture_preview, picture) 
			values ('$category_id','$title','$description','$content','$picture_preview','$picture' );");
	}

	public static function getArticleRating(string $id){
		$tmp = self::getData("
			SELECT rating FROM articles WHERE article_id=$id");
		$tmp = $tmp->fetch(PDO::FETCH_ASSOC);
		return (int)$tmp['rating'];

	}
	public static function setArticleRating(string $id, int $rating){
		self::getData("
			UPDATE articles SET rating=$rating WHERE article_id=$id;");
	}
}
?>