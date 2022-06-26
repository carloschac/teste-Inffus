<?php
$email = $_POST['email'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);
$connect = mysql_connect('127.0.0.1', 'root', 'C@rlos3268');
$db = mysql_select_db('inffus');
if (isset($entrar)) {

  $verifica = mysql_query("SELECT * FROM usuarios WHERE login =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
  if (mysql_num_rows($verifica) <= 0) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
    die();
  } else {
    setcookie("email", $email);
    header("Location:index.php");
  }
}
