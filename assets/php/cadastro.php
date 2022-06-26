<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$confirmaSenha = MD5($_POST['confirmaSenha']);
$checkbox = ($_POST['checkbox']);

$connect = mysql_connect('127.0.0.1', 'root', 'C@rlos3268');

$db = mysql_select_db('inffus');
$query_select = "SELECT login FROM usuarios WHERE login = '$email'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);
$logarray = $array['email'];

if ($email == "" || $email == null) {
  echo "<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";
} else {
  if ($logarray == $login) {

    echo "<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
    die();
  } else {
    $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
    $insert = mysql_query($query, $connect);

    if ($insert) {
      echo "<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.html'</script>";
    } else {
      echo "<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
    }
  }
}
