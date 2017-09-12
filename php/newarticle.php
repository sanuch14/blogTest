<!DOCTYPE html>
<html lang="X-UA-Compatible">
<?php
require_once 'constants/Constants.php';
require_once 'pageParts/PagePart.php';
include 'dbService/DataBase.php';

$head = new PagePart();
$head = $head->getHead(Constants::NEW_ARTICLE);
echo $head;
?>
<body>
<script src="/ckeditor/ckeditor.js"></script>

<?php include 'pageParts/header.php'; ?>
<script type="text/javascript">
	$(document).ready(function()
	{
		alert(1);
		$('#article').ajaxForm(
			{
				dataType: "json",
				success: function(data)
				{
					alert(1);
					if(data.user_id == '0'){
						$("#result").text("Новий запис успішно додано!");
					}
				}
			});
	});
</script>

<div class="container">
	<h1 class="title"><?php echo Constants::NEW_ARTICLE;?></h1>
	<div class="row">
		<div class="col-sm-12">
			<form id="article" action="/php/dbService/createArticle.php" method="post" role="form" >
				<span>
					Категорія:
				</span>
				<select name="category_id" class="selectpicker">
					<?php
						$tmp = DataBase::countCategories();

						while($row_tmp=$tmp->fetch(PDO::FETCH_ASSOC)){ ?>
							<option value="<?php echo $row_tmp['category_id']; ?>">
								<?php echo $row_tmp['category_name'].' ';?>
							</option>
					<?php
						}
					?>
				</select>
				<div class="row">
					<div class="form-group col-sm-12">
						<label class="h4">Введіть назву</label>
						<input type="text" class="form-control" name="title" placeholder="Введіть Назву" required>
						<label class="h4">Введіть короткий опис</label>
						<textarea class="form-control" rows="3" name="description" placeholder="Введіть короткий опис"></textarea>
						<label class="h4">Введіть посилання на картинку попереднього переглялу</label>
						<input type="text" class="form-control" name="picture_preview" placeholder="Введіть посилання на картинку попереднього переглялу" required>
						<label class="h4">Введіть посилання на основну картинку</label>
						<input type="text" class="form-control" name="picture" placeholder="Введіть посилання на основну картинку" required>
						<label class="h4">Введіть основний текст статті</label>
						<textarea name="content"></textarea>
						<script>
							CKEDITOR.replace("content");
						</script>
					</div>
				</div>
				<div class="pull-right down-btn">
					<input class="btn btn-success" type="submit" value="OK"/>
					<a href="/" class="btn btn-danger" type="button">Відміна</a>
				</div>
				<div id="result"></div>
			</form>
		</div>

	</div>
</div>
<?php include 'pageParts/footer.php'; ?>

</body>
</html>
