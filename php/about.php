<!DOCTYPE html>
<html lang="X-UA-Compatible">
<?php
	require_once 'constants/Constants.php';
	require_once 'pageParts/PagePart.php';
	include 'dbService/DataBase.php';

	$head = new PagePart();
	$head = $head->getHead(Constants::ABOUT);
	echo $head;
?>
<body>
	<?php include 'pageParts/header.php'; ?>
	<div class="container">
		<h1 class="title"><?php echo Constants::ABOUT;?></h1>
		<div class="container">
			<div class="row">
				<p><strong>Дата та місце народження:</strong> 15 листопада 1993 року, м. Монастирище Черкаська обл.</p>
				<p><strong>Сімейний стан:</strong> одружений, дітей немає.</p>
				<p><strong>Контактна інформація:</strong> адреса: смт. Тиврів, вул. Тиверська 71; моб.тел: +380639813558;</p>
				<p><strong>Освіта:</strong></p><!--Про освіту-->
				<p>2009 – 2013 р. Вінницький технічний коледж, кафедра радіотехніки, спеціальність – конструювання, виробництво та технічне обслуговування радіотехнічних пристроїв, диплом з відзнакою.</p>
				<p>2013 – 2015 р. Вінницький національний технічний університет, кафедра радіотехніки та телекомунікацій, спеціальність – радіотехніка, бакалавр. </p>
				<p>2015 – 2017 р.  Вінницький національний технічний університет, кафедра радіотехніки та телекомунікацій, спеціальність – радіотехніка, магістр.</p>
				<p><strong>Додаткові навички та інтереси:</strong> Знання Java, C, HTML/CSS, MySQL. Досвід роботи у Windows на рівні адміністратора, досвід роботи у Linux на рівні користувача. Розробляв на С під мікроконтролери (AVR, STM32). Знання англійської мови – Intermediate. Читання технічної документації без проблем. Посилання на сторінку із сертифікатами stepik.org: <a href="https://stepik.org/users/15229564/certificates">Ссилка</a>. Посилання на частину дипломного проекту на github (розроблено для МК STM32F042K6T6): <a href="https://github.com/sanuch14/STM32_CompositeHID_CDC">Ссилка</a>.</p>
			</div>
		</div>
	</div>
	<?php include 'pageParts/footer.php'; ?>
</body>
</html>
