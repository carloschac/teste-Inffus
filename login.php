<?php
session_start();
include('conexao.php');

//Validamos se os campos foram preenchidos para ser impossível pular direto para o painel
if (empty($_POST['email']) || empty($_POST['senha'])) {
  header('Location: painel.php');
  exit();
}

//Definimos as váriaveis que irão receber os valores vindos do formulário de login
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//Montamos a query que irá verificar se os cadastros existem no banco.
$query = "select * from cadastros where email = '{$email}' and senha = md5('{$senha}')";
//Resultado da query
$result = mysqli_query($conexao, $query);
//Retorno da query que criou mais uma Row
$row = mysqli_num_rows($result);

//Se a row foi criada então deu tudo certo e fomos autenticados
if ($row == 1) {
  $_SESSION['email'] = $email;
  header('Location: painel.php');
  exit();
}
//Caso contrário erro na autenticação
else {
  $_SESSION['nao_autenticado'] = true;
  echo "Erro de autenticação";
}
