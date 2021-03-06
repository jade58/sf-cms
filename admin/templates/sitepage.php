<?php
if (isset($_GET['method']))
{
  page_action($options = array('method' => 'del', 'id' => $_GET['items']));
}
?>
<div class="col-md-9">
    <h3><p>Управление страницами сайта</p></h3>
  <div class="well">
    <ul class="nav nav-pills">
      <li class="active"><a href="index.php?page=addpage">+ Добавить страницу</a></li>
    </ul>
  </div>
</div>

<div class="col-md-9">
  <div class="well">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>ID</th>
          <th>Заголовок</th>
          <th>Создатель</th>
          <th>URL</th>
          <th>Дата</th>
          <th>Действие</th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
          <td>0</td>
          <td>Главная</td>
          <td>root</td>
          <td>/</td>
          <td>/</td>
          <td><a href="index.php?page=edit&type=page&items=main">Редактировать</td>
        </tr>
        <tr class="info">
          <td>0</td>
          <td>Скриншоты</td>
          <td>root</td>
          <td>/</td>
          <td>/</td>
          <td><a href="index.php?page=edit&type=page&items=scr">Редактировать</td>
        </tr>
        <tr class="info">
          <td>0</td>
          <td>Гарантии</td>
          <td>root</td>
          <td>/</td>
          <td>/</td>
          <td><a href="index.php?page=edit&type=page&items=guar">Редактировать</td>
        </tr>
        <?php foreach (page_action($options = array('method' => 'list')) as $row) { ?>
        <tr class="success">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['creator']; ?></td>
          <td><a href="/index.php?page=<?php echo $row['url']; ?>">index.php?page=<?php echo $row['url']; ?></a></td>
          <td><?php echo $row['datecreate']; ?></td>
          <td><a href="index.php?page=edit&type=page&items=<?php echo $row['id']; ?>">Редактировать</a> / <a href="index.php?page=sitepage&method=del&items=<?php echo $row['id']; ?>">Удалить</td>
        <?php } ?>
        </tr>
      </tbody>
    </table> 
  </div>
</div>