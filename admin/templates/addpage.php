<?php
if (isset($_POST['send']))
{
	if ((!empty($_POST['page_name'])) and (!empty($_POST['url'])))
	{
		$page_name = $_POST['page_name'];
		$page_url = $_POST['url'];
		$content = $_POST['content'];

		page_action($page_name,$page_url,$content,'create','null'); //Создаём страницу
	}
}
?>
<div class="col-md-9">
	<div class="well">
		<form class="form-horizontal" method="post">
			<fieldset>
				<legend>Создание новой страницы</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Название</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="page_name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">URL</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="url">
					</div>
				</div>
				<div class="form-group">
					<label for="textArea" class="col-lg-2 control-label">Содержимое</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="15" id="textArea" name="content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<input type="submit" class="btn btn-primary" name="send" value="Создать">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>