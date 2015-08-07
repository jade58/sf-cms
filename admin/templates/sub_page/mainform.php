<?php
if (isset($_POST['send']))
{
	$wtext = $_POST['welcome_text'];
	$des = $_POST['descriptions'];

	main_update($options = array('wtext' => $wtext, 'des' => $des));
}

?>
<form class="form-horizontal" method="post">
	<fieldset>
		<legend>Редактирование главной страницы сайта</legend>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Приветсвие</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="welcome_text" value="<?php echo $welcome_text; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="textArea" class="col-lg-2 control-label">Описание сайта</label>
			<div class="col-lg-10">
				<textarea class="form-control" rows="6" id="textArea" name="descriptions"><?php echo $description; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="textArea" class="col-lg-2 control-label">Прочее</label>
			<div class="col-lg-10">
				<textarea class="form-control" rows="6" id="textArea" name="other_text"></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<input type="submit" class="btn btn-primary" name="send" value="Применить">
				<?php echo msg_handler($_GET['msg']); ?>
			</div>
		</div>
	</fieldset>
</form>
