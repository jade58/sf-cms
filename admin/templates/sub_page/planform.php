<?php

$get_array = price_action('getinfo', 'null', 'null', 'null', $_GET['items']);

if (isset($_POST['send']))
{
		$plan_name = $_POST['plan_name'];
		$plan_num = $_POST['plan_num'];
		$plan_price = $_POST['plan_price'];

		price_action('update',$plan_name,$plan_price,$plan_num,$_GET['items']); //обновляем страницу
}
?>
	<form class="form-horizontal" method="post">
			<fieldset>
				<legend>Редактирование тарифного плана</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Название тарифа</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="plan_name" value="<?php echo $get_array['name']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Кол-во прогнозов</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="plan_num" value="<?php echo $get_array['num_b']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Цена</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="plan_price" value="<?php echo $get_array['price'] ?>">
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
