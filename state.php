<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UpData</title>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <link rel="icon" type="image/png" href="images/logo.png">
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <nav class="navbar" role="navigation">
      <div class="container-fluid">
        <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Rozwiń nawigację</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> UpData<br><small class="hidden-sm-down">to update state of e-storehouses</small></a>
        </div>

        <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a class="btn btn-info btn-lg" href="update.php"><span class="glyphicon glyphicon-log-in"></span> Logowanie</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      
      <div class="page-header">
        <h1 style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span><br>Witaj Kliencie!<br><small>Poniżej znajduje się wykaz wszystkich produktów w magazynie.</small></h1>
      </div>


      <div class="row">
      <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
      <table class="table">
          <thead class="thead-inverse"><tr><th><span class="glyphicon glyphicon-barcode"></span> Kod kreskowy</th><th>Nazwa produktu</th><th>Ilość</th></tr></thead>
              <?php

              require_once "SQLconnect.php";

              $conn = @new mysqli($host, $db_user, $db_pass, $db_name);

              if($conn->connect_errno!=0)
              {
                echo "Error: ".$conn->connect_errno;
              }
              else
              {

                $sql = "SELECT * FROM data";

                if($result = @$conn->query($sql))
                {
                  $number_of_rows = $result->num_rows;
                  for($i=0; $i<$number_of_rows; $i++)
                  {
                    $row = $result->fetch_assoc();
                      $KKreskowy = $row['Kod'];
                      $Name = $row['Name'];
                      $Counter = $row['Count'];
echo<<<END
  <tr>
    <th>$KKreskowy</th>
    <th>$Name</th>
    <th>$Counter</th>
  </tr>
END;
                  }
                  $result->close();
                }
                $conn->close();
              }
            ?>
              
      </table>
      </div></div>

    <span class="footer"></span>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>