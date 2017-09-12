<script>
	$(document).ready(function()
	{
		$('#login').ajaxForm(
			{
				dataType: "json",
				success: function(data)
				{
					if(data.user_id == '-2'){
						$("#result").text("В поля введені не однакові паролі!");
					}else if(data.user_id == '-3') {
						$("#result").text("Користувач з таким логіном вже існує!");
					}else {
						document.location.href = "/php/cookies/setCookie.php?id="+data.user_id+"&name="+data.name+
							"&privileges="+data.privileges;
					}

				}
			});
	});
</script>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button class="close" type="button" data-dismiss="modal">
				<i class="glyphicon glyphicon-remove"></i>
			</button>
			<h4 class="modal-title">Реєстрація</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-12">
					<form id="login" action="/php/dbService/registration.php" method="post" role="form" >
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="h4">Введіть логін</label>
								<input type="text" class="form-control" name="login" placeholder="Введіть логін" required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="h4">Введіть пароль</label>
								<input type="password" class="form-control" name="password" placeholder="Введіть пароль" required>
							</div>
							<div class="form-group col-sm-6">
								<label class="h4">Повторіть пароль</label>
								<input type="password" class="form-control" name="repeatPassword" placeholder="Повторіть пароль" required>
							</div>
							<div class="form-group col-sm-6">
								<label class="h4">Введіть ім'я</label>
								<input type="text" class="form-control" name="name" placeholder="Введіть ім'я" required>
							</div>
							<div class="form-group col-sm-6">
								<label class="h4">Введіть прізвище</label>
								<input type="text" class="form-control" name="lastName" placeholder="Введіть прізвище" required>
							</div>
						</div>
						<div class="pull-right">
							<input class="btn btn-success" type="submit" value="OK"/>
							<button class="btn btn-danger" type="button" data-dismiss="modal">Відміна</button>
						</div>
						<div id="result"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>