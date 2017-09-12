<script>
	$(document).ready(function()
	{
		$('#login').ajaxForm(
			{
				dataType: "json",
				success: function(data)
				{
					if(data.user_id == '-1'){
						$("#result").text("Помилка при введенні логіну або пароля!");
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
			<h4 class="modal-title">Авторизація</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-12">
					<form id="login" action="/php/dbService/checkIfUserExist.php" method="post" role="form" >
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="h4">Логін</label>
								<input type="text" name="login" class="form-control" placeholder="Введіть логін" required>
							</div>
							<div class="form-group col-sm-6">
								<label class="h4">Пароль</label>
								<input type="password" name="password" class="form-control" placeholder="Введіть пароль" required>
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
			<a href="#" onclick="registration()">Реєстрація</a>
		</div>
	</div>
</div>