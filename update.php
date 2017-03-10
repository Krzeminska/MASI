<?php 
  session_start();

  if((!isset($_SESSION['login'])))
  {
      header('Location: login.php');
      exit();
  }
?>
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

    <style>
      .error
      {
        margin-top: 10px;
        margin-bottom: 10px;
      }
      .err
      {
        color:red;
        margin-top: 10px;
        margin-bottom: 10px;
      }
      .change
      {
        color:green;
        margin-top: 10px;
        margin-bottom: 10px;
      }
    </style>
 
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
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> UpData<br><small class="hidden-sm-down">to update state of e-storehouse</small></a>
        </div>

        <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Witaj ".$_SESSION['user']."!"; ?></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Moje konto</a></li>
                  <li><a href="logout.php">Wyloguj</a></li>
                </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      
      <div class="page-header">
        <h1>Witaj <?php echo $_SESSION['user']; ?>! <small>To jest platforma pozwalająca na dodawanie lub usuwanie elementów z e-magazynu.</small></h1>
      </div>

    <span class="footer"></span>
    </div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>