<?php
if (isset($_POST['send']))
{
	if (!empty($_POST['content']))
	{
		$content = $_POST['content'];

		add_guar($content); //Добавляем гарантию
	}
}
?>
<div class="col-md-9">
	<div class="well">
		<form class="form-horizontal" method="post">
			<fieldset>
				<legend>Добавление новой гарантии</legend>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">Тект гарантии</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="8" id="textArea" name="content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input type="submit" class="btn btn-primary" name="send" value="Добавить">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>