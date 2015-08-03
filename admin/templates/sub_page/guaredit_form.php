<?php

$guar_array = get_guar($_GET['id']);

if (isset($_POST['send']))
{
	if (!empty($_POST['content']))
	{
		$content = $_POST['content'];

		guar_proc($content,'upd',$_GET['id']); //Сохраняем гарантию
	}
}

?>

		<form class="form-horizontal" method="post">
			<fieldset>
				<legend>Редактирование</legend>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">Тект гарантии</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="8" id="textArea" name="content"><?php echo $guar_array['guar'] ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input type="submit" class="btn btn-primary" name="send" value="Сохранить">
					</div>
				</div>
			</fieldset>
		</form>

