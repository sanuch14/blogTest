<header>
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
					<span class="sr-only">Відкрити навігацію</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Блог</a>
			</div>
			<div class="collapse navbar-collapse" id="responsive-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Категорії<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$tmp = DataBase::countCategories();

								while($row_tmp=$tmp->fetch(PDO::FETCH_ASSOC)){ ?>
									<li>
										<a href="/php/category.php?id=<?php echo $row_tmp['category_id']; ?>">
											<?php echo $row_tmp['category_name'].' ';?>
											<span class="badge">
												<?php echo $row_tmp['numb_of_articles'].' ';?>
											</span>
										</a>
									</li>

								<?php
								}
							?>
						</ul>
					</li>
					<li><a href="/php/about.php">Про автора</a></li>
					<?php
						if(isset($_COOKIE['privileges'])){
							if($_COOKIE['privileges']=="admin" ){
								echo "<li><a href=\"/php/newarticle.php\">Створити статтю</a></li>";
							}
						}
					?>
				</ul>
				<div class="navbar-form navbar-right">
					<?php
						$tmp;
						if(!isset($_COOKIE['name'])){
							$tmp = "<button id=\"logBtn\" type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#form\">
										<span class=\"glyphicon glyphicon-log-in\"></span>  Авторизація
									</button>";
						}else{
							$tmp = "
									<span href='#' class='welcome'>Привіт, ".$_COOKIE['name']."!</span>
									<a href='/php/cookies/removeCookie.php' type=\"button\" class=\"btn btn-primary\">
										<span class=\"glyphicon glyphicon-log-out\"></span>  Вихід
									</a>";
						}
						echo $tmp;
					?>
				</div>
			</div>
		</div>
	</div>
</header>
