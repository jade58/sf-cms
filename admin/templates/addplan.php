<?php
if (isset($_POST['send']))
{
		$plan_name = $_POST['plan_name'];
		$plan_num = $_POST['plan_num'];
		$plan_price = $_POST['plan_price'];

		price_action('add',$plan_name,$plan_price,$plan_num,'null'); //Создаём страницу
}
?>
<div class="col-md-9">
	<div class="well">
		<form class="form-horizontal" method="post">
			<fieldset>
				<legend>Создание новой страницы</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Название тарифа</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="plan_name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Кол-во прогнозов</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="plan_num">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Цена</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="plan_price">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input type="submit" class="btn btn-primary" name="send" value="Создать">
						<?php echo msg_handler($_GET['msg']); //Вывод ошибок?>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>