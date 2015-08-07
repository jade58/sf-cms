<?php
if (isset($_POST['send']))
{
	scr_update($options = array('page_name' => $_POST['page_name']));
}
?>
<form class="form-horizontal" method="post">
	<fieldset>
		<legend><?php echo $scr_text; ?> - редактирование</legend>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Название</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="page_name" value="<?php echo $scr_text; ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<input type="submit" class="btn btn-primary" name="send" value="Сохранить изменения">
			</div>
		</div>
	</fieldset>
</form>
