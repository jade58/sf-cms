<?php
if (isset($_GET['method']))
{
  guar_proc('null',$_GET['method'],$_GET['id']);
}
?>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Текст</th>
      <th>Действие</th>
    </tr>
  </thead>
  <tbody>
    <?php $guar_array = get_guar('all'); ?>
    <?php foreach ($guar_array as $row) { ?>
    <tr class="info">
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['guar']; ?></td>
      <td><a href="index.php?page=edit&items=guar&method=del&id=<?php echo $row['id']; ?>">Удалить / <a href="index.php?page=edit&items=guaredit&id=<?php echo $row['id']; ?>">Редакитровать</td>
    </tr>
    <?php } ?>
  </tbody>
</table> 
<a href="index.php?page=addguar"><button class="btn btn-primary">+ Добавить</button></a>

