<!DOCTYPE html>
<html lang="X-UA-Compatible">
<?php

require_once 'constants/Constants.php';
require_once 'pageParts/PagePart.php';
include 'dbService/DataBase.php';

$head = new PagePart();
$categoryName = DataBase::getCategoryName($_GET['id']);

echo $head->getHead(Constants::CATEGORY.$categoryName['category_name']);

$numberOfArticles=DataBase::countArticlesWithId($_GET['id']);
$numberOfPages = ceil($numberOfArticles/10)+1;
$currentPage = ((int)$_GET['begin']+10)/10;
?>

<body>
<?php include 'pageParts/header.php'; ?>
<div class="container">
	<h1 class="title"><?php echo Constants::MAIN;?></h1>

	<div class="row">
		<?php
		$data = DataBase::getCategoryType($_GET['id'], 0, 10);
		while($row=$data->fetch(PDO::FETCH_ASSOC)){ ?>
			<div class="col-sm-6 col-xs-12">
				<div class="thumbnail">
					<img src=<?php echo '"'.$row['picture_preview'].'" alt="'.$row['title'].'"';?>>
					<div class="caption">
						<h3>
							<a href="/php/article.php?id=<?php echo $row['article_id'];?>">
								<?php echo $row['title'];?>
							</a>
						</h3>
						<p>
							<?php echo $row['description'];?>
						</p>
						<hr>
						<div class="col-sm-10">
							Дата публікації: <?php echo $row['date_of_creating'];?><br>
							Категорія:
							<a href="/php/category.php?id=<?php echo $_GET['id'];?>">
								<?php echo $categoryName['category_name'];?>
							</a>
						</div>
						<div class="col-sm-2">
								<span class="glyphicon glyphicon-eye-open">
									<?php echo $row['views'];?>
								</span>
						</div>
						<div class="text-center">
							<a href="/php/article.php?id=<?php echo $_GET['id'];?>" class="btn btn-success">
								Докладніше <span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<nav class="text-center">
		<ul class="pagination">
			<?php
			for($i = 1; $i<$numberOfPages; $i++){ ?>
				<li <?php if($i==$currentPage) echo 'class="active"';?>>
					<a href="/php/categoryPagination.php?begin=<?php echo ($i-1)*10;?>&id=<?php echo $_GET['id'];?>"><?php echo $i;?></a>
				</li>
				<?php
			}
			?>
		</ul>
	</nav>
</div>
<?php include 'pageParts/footer.php'; ?>
</body>
</html>