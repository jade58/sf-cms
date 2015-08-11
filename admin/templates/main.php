 <div class="col-md-5">
         <div class="panel panel-default">
          <div class="panel-heading">Последние зарегистрированные пользователи</div>
          <div class="panel-body">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>Логин</th>
                  <th>ID</th>
                  <th>Дата</th>
                  <th>Действие</th>
                </tr>
              </thead>
              <tbody>
                <?php $users_array = get_users() ?>
                <?php foreach ($users_array as $row) { ?>
                   <tr>
                     <td><?php echo $row['login'] ?></td>
                     <td><?php echo $row['id'] ?></td>
                     <td>01.08</td>
                     <td><a href="index.php?funcrion=user_block&id=<?php echo $row['id']; ?>">Заблокировать</a> / <a href="index.php?funcrion=user_delet&id=<?php echo $row['id']; ?>">Удалить</a></td>
                   </tr>
                <?php } ?>
              </tbody>
            </table> 
          </div>
        </div>

      </div>
      <div class="col-md-4">
       <div class="panel panel-default">
        <div class="panel-heading">Последние покупки</div>
        <div class="panel-body">
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Логин</th>
                <th>Товар</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>hunter14</td>
                <td>3 прогноза</td>
              </tr>
              <tr>
                <td>2</td>
                <td>jade12</td>
                <td>7 прогнозов</td>
              </tr>
              <tr>
                <td>3</td>
                <td>born2kill228</td>
                <td>3 прогноза</td>
              </tr>
            </tbody>
          </table> 
        </div>
      </div>

    </div>
    <div class="col-md-9">
     <div class="panel panel-default">
      <div class="panel-heading">Статистика</div>
      <div class="panel-body">
        <center><div id="chart_div" style="width: 900px; height: 500px;"></div></center>
      </div>
    </div>
  </div>
</div>