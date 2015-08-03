<?php
$page_info = page_action('null','null','null','info',$_GET['items']);
?>
<form class="form-horizontal" method="post">
	<fieldset>

		<legend><?php echo $page_info['name']; ?> - редактирование</legend>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Название</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="page_name" value="<?php echo $page_info['name']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">URL</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="url" value="<?php echo $page_info['url']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="textArea" class="col-lg-2 control-label">Содержимое</label>
			<div class="col-lg-10">
				<textarea class="form-control" rows="15" id="textArea" name="content"><?php echo $page_info['content']; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<input type="submit" class="btn btn-primary" name="send" value="Сохранить изменения">
			</div>
		</div>
	</fieldset>
</form>
