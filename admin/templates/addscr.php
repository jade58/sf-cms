<?php
if (isset($_POST['send']))
{
	if (!empty($_POST['url']))
	{
		$img_url = $_POST['url'];
		$date_bet = $_POST['date_bet'];
		$des = $_POST['des'];

		scr_action($options = array(
		'method' => 'add',
		'img_url' => $img_url,
		'date_bet' => $date_bet,
		'description' => $des )); //Создаём страницу
	} else {
		$msg = 'Заполните URL';
	}
}

?>
<div class="col-md-9">
	<div class="well">
		<form class="form-horizontal" method="post">
			<fieldset>
				<legend>Добавление скриншота</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">URL скриншота</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="url">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Дата</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="date_bet" value="<?php echo date('Y.m.d'); ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">Описание</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="textArea" name="des"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input type="submit" class="btn btn-primary" name="send" value="Добавить">
						<?php echo msg_handler($_GET['msg']); if (!empty($msg)) { echo $msg; } ?>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>