<div class="col-md-9">
    <h3><p>Управление комерцией </p></h3>
  <div class="well">
    <ul class="nav nav-pills">
      <li class="active"><a href="index.php?page=addplan">+ Добавить услугу</a></li>
    </ul>
  </div>
</div>

<div class="col-md-9">
  <div class="well">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th>Действие</th>
        </tr>
      </thead>
      <tbody>
        <?php $price_array = price_action('get','null','null','null','null'); ?>
        <?php foreach ($price_array as $row) { ?>
        <tr class="info">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><a href="index.php?page=edit&type=plan&items=<?php echo $row['id']; ?>">Редактировать / Удалить</td>
        </tr>
        <?php } ?>
      </tbody>
    </table> 
  </div>
</div>