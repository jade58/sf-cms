    <ul class="nav nav-pills">
    	<li class="active"><a href="index.php?page=addscr">+ Добавить скриншот</a></li>
    </ul>
    <br>
    <table class="table table-striped table-hover ">
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Скриншот</th>
    			<th>Описание</th>
    			<th>Действие</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<?php foreach (scr_action($options = array('method' => 'get')) as $row) { ?>
    			<td><?php echo $row['id']; ?></td>
    			<td><a href="<?php echo $row['img_url']; ?>"><img src="<?php echo $row['img_url']; ?>"  width="100" height="100"></a></td>
    			<td><?php echo $row['description']; ?></td>
    			<td>Удалить / Редактировать</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table> 