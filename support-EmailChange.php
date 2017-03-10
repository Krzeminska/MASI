<?php 
  session_start();

  if(isset($_POST['mail']))
  {
    //udana walidacja
    $ok=true;
    require_once "SQLconnect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try
    {
      $conn = new mysqli($host, $db_user, $db_pass, $db_name);
      if($conn->connect_errno!=0)
      {
        throw new Exception(msqli_connect_errno());
      }
      else {
        //szukamy user'a
        $id = $_SESSION['id'];
        $result=$conn->query("SELECT * FROM user WHERE Id='$id'");

        if(!$result) throw new Exception($con->error);

        if($ok==true)
        {
          if(isset($_POST['mail']))
          {
            //dodajemy usera
            $email = $_POST['mail'];
            //odpowiednia Query do zmiany Emaila:
            if($conn->query("UPDATE user SET `Email` = '$email' WHERE `id`='$id'"))
            {
              $_SESSION['mail'] = $email;
            }
            else {
              throw new Exception($conn->error);
            }
          }
        }
        $conn->close();
      }
    }
    catch(Exception $e)
    {
      echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności.<br>Prosimy o rejestrację w innym terminie.</span>';
      //echo '<br>Info: '.$e;
    }
  }

  header('Location: account.php');
  exit();
?>