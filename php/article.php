<!DOCTYPE html>
<html lang="X-UA-Compatible">
<?php
	require_once 'constants/Constants.php';
	require_once 'pageParts/PagePart.php';
	include 'dbService/DataBase.php';

	DataBase::setArticleView($_GET['id']);
	$row = DataBase::getArticle($_GET['id']);

	$head = new PagePart();
	$head = $head->getHead($row['title']);
	echo $head;
?>
<body>
<?php include 'pageParts/header.php'; ?>
<div class="container">
	<h1 class="title"><?php echo $row['title']?></h1>
	<div class="row">
		<div class="col-sm-12">
			<div class="thumbnail">
				<img src=<?php echo '"'.$row['picture'].'" alt="'.$row['title'].'"';?>>
				<div class="caption">
					<p>
						<?php echo $row['content'];?>
					</p>
					<hr>
					<div class="col-sm-10">
						Дата публікації: <?php echo $row['date_of_creating'];?><br>
						Категорія:
						<a href="/php/category.php?id=<?php echo $row['category_id'];?>">
							<?php echo $row['category_name'];?>
						</a>
					</div>
					<div class="col-sm-2">
						<span class="glyphicon glyphicon-eye-open">
							<?php echo $row['views'];?>
						</span>
					</div>
					<?php

					if(count($_COOKIE)){?>
						<div class="btn-group">
							<button onclick="thumbsUp(<?php echo $_GET['id']?>)" class="btn btn-default"><i class="glyphicon glyphicon-thumbs-up thumbs-up"></i></button>
							<button onclick="thumbsDown(<?php echo $_GET['id']?>)" class="btn btn-default"><i class="glyphicon glyphicon-thumbs-down thumbs-down"></i></button>
						</div>
					<?php
					}
					?>

					<span id="rating"><?php echo Constants::RATING.$row['rating'];?></span>
				</div>
			</div>
		</div>
	</div>
	<?php include 'pageParts/comments.php'?>
</div>
<?php include 'pageParts/footer.php'; ?>
</body>
</html>
