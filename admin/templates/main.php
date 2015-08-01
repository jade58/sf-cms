<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->
  <link href="templates/css/bootstrap.css" rel="stylesheet">
  <link href="templates/css/style.css" rel="stylesheet">
  <link href="templates/css/xcharts.css" rel="stylesheet">
  <link href="templates/css/xcharts.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Дата', 'Регистрации', 'Оплаты'],
      ['23.07',  10,      1],
      ['24.07',  12,      1],
      ['25.07',  5,       0],
      ['26.07',  10,       0],
      ['27.07',  5,       2],
      ['28.07',  3,       0],
      ['29.07',  5,       0],
      ['30.07',  7,      3]

      ]);

    var options = {
      title: 'Регистрации и оплаты',
      hAxis: {title: 'Дата',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
  </script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <div class="content">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Управление сайтом</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
              </ul>
            </div>
          </div>
        </nav>
        <div class="row">
          <div class="col-md-3">
            <div class="well">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="index.php?page=main">Главная</a></li>
                <li><a href="index.php?page=sitepage">Страницы сайта</a></li>
                <li><a href="index.php?page=commerce">Управление комерцией</a></li>
                <li><a href="index.php?page=materials ">Материалы сайта</a></li>
                <li><a href="index.php?page=users">Пользователи</a></li>
                <li><a href="index.php?page=setting">Настройки сайта</a></li>
              </li>
            </ul>
          </div>
        </div>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="templates/js/bootstrap.min.js"></script>
<script src="templates/js/xcharts.js"></script>
<script src="templates/js/xcharts.min.js"></script>
</body>
</html>