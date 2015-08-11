<?php
if (isset($_GET['method']))
{
  page_action('null','null','null','del',$_GET['items']);
}
?>
<div class="col-md-9">
    <h3><p>Управление материалами сайта</p></h3>
</div>

<div class="col-md-9">
  <div class="well">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Страница</th>
          <th>Материалов</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
          <td>Скриншоты выигрышей</td>
          <td>10</td>
          <td><a href="index.php?page=manager&items=scr">Управление</td>
        </tr>
      </tbody>
    </table> 
  </div>
</div>