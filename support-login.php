<?php

  session_start();

  if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
  {
    header('Location: login.php');
    exit();
  }

  require_once "SQLconnect.php";

  $conn = @new mysqli($host, $db_user, $db_pass, $db_name);

  if($conn->connect_errno!=0)
  {
    echo "Error: ".$conn->connect_errno;
  }
  else
  {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    //$sql = "SELECT * FROM user WHERE Login='$login' AND Password='$haslo'";

    if($result = @$conn->query(sprintf("SELECT * FROM user WHERE Login='%s'",
      mysqli_real_escape_string($conn,$login))))
    {
      $number_of_users = $result->num_rows;
      if($number_of_users>0)
      {
        $row = $result->fetch_assoc();
        if(password_verify($haslo, $row['Password']))
        {
          $_SESSION['login']=true;
        
          $_SESSION['id'] = $row['Id'];
          $_SESSION['user'] = $row['Login'];
          $_SESSION['perm'] = $row['Permission'];
          $_SESSION['mail'] = $row['Email'];

          unset($_SESSION['Err']);  
          $result->close();
          header('Location: update.php');
        }
        else
        {
          $_SESSION['Err']='<span style="color:red">Blad logowania. Nieprawidlowe hasło!</span>';
          header('Location: login.php');
        }
      }
      else
      {
        $_SESSION['Err']='<span style="color:red">Blad logowania. Nieprawidlowy login!</span>';
        header('Location: login.php');
      }

    }
    $conn->close();
  }
?>