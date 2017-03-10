<?php 
  session_start();

  if(isset($_POST['passwd']) && isset($_POST['passwd1']) && isset($_POST['passwd2']))
  {
    //udana walidacja
    $ok=true;
    //zmiana hasla
    $passwd = $_POST['passwd'];
    $passwd1 = $_POST['passwd1'];
    $passwd2 = $_POST['passwd2'];
    //długość
    if((strlen($passwd1)<6) || (strlen($passwd1)>10))
    {
      $ok=false;
      $_SESSION['Err_passwd']="Hasło musi zawierać 6-10 znaków!";
    }
    //długość
    if($passwd1!=$passwd2)
    {
      $ok=false;
      $_SESSION['Err_passwd']="Hasła muszą być indentyczne!";
    }

    $hash = password_hash($passwd1, PASSWORD_DEFAULT);
            
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
          if(isset($_POST['passwd']) && isset($_POST['passwd1']) && isset($_POST['passwd2']))
          {
            $row = $result->fetch_assoc();
            if(password_verify($passwd, $row['Password']))
            {
              //odpowiednia Query do zmiany hasła:
              if($ok==true)
              {
                if($conn->query("UPDATE user SET `Password` = '$hash' WHERE `id`='$id'"))
                {
                  $_SESSION['Err_change'] = 'Twoje hasło zostało zmienione.';
                  unset($_SESSION['Err_passwd']);
                }
                else {
                  throw new Exception($conn->error);
                }
              }
            }
            else
            {
              $ok=false;
              $_SESSION['Err_change']='<span style="color:red">Blad. Nieprawidlowe hasło!</span>';
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