<?php
  session_start();
  include "koneksi/connect.php";

  if (isset($_POST['username'])&&($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysql_query("select * from admin where username = '$username' AND password = '$password'")or die("SQL Error:".mysql_error());
    $result = mysql_num_rows($sql);
    $data = mysql_fetch_array($sql);

    if ($result == 1) {
      $_SESSION['username'] = $data['username'];
      $_SESSION['password'] = $data['password'];
      header("Location:index.php");
    }else {
      header("Location:login.php");
    }
  }  
?>