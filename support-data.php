<?php

  session_start();

  require_once "SQLconnect.php";

  $conn = @new mysqli($host, $db_user, $db_pass, $db_name);

  if($conn->connect_errno!=0)
  {
    echo "Error: ".$conn->connect_errno;
  }
  else
  {
    if(isset($_POST['ftitle']) && isset($_POST['ftitle2']) && isset($_POST['fcomp'])){
      $T = $_POST['ftitle'];
      $C = $_POST['fcomp'];
      $url = $_POST['furl'];
      $id = $_SESSION['id'];
      $TT = $_POST['ftitle2'];

      $sql = "INSERT INTO `data` (`Id`, `Work`, `Composer`, `Comment`, `URL`, `Id_User`) VALUES (NULL, '$T', '$C', '$TT', '$url', '$id');";
    }
      

    if(@$conn->query($sql))
    { 
        $_SESSION['type']=10;
        unset($_SESSION['Err']);
    }
    else
      $_SESSION['Err'] ='<span style="color:red">Wypełnij wszystkie pola żeby dodać element!</span>';
    if($_SESSION['perm']==0)
        header('Location: offer-admin.php');
    $conn->close();
  }
?>