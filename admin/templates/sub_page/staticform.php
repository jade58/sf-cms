<?php

$page_info = page_action($options = array(
'id' => $_GET['items'],
'method' => 'info' ));

if (isset($_POST['send']))
{
	$name = mysql_escape_string(htmlspecialchars(strip_tags($_POST['page_name'])));
	$content = mysql_escape_string(htmlspecialchars(strip_tags($_POST['content'])));
	$url = mysql_escape_string(htmlspecialchars(strip_tags($_POST['url'])));

	page_action($options = array('name' => $name,
	'content' => $content,
	'url' => $url,
	'method' => 'edit',
	'id' => $page_info['id'] ));
}

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
				<?php echo msg_handler($_GET['msg']); ?>
			</div>
		</div>
	</fieldset>
</form>
