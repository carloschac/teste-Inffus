<?php
//Iniciamos a sessão
session_start();

//Importamos o arquivo de conexão
include('conexao.php');




//Definimos as variáveis com os valores preenchidos no formulário
//mysqli_real_escape_string: Função para limparmos a string e previnirmos o SQL Inject
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$confirmaSenha = mysqli_real_escape_string($conexao, trim($_POST['confirmaSenha']));
$observacoes = mysqli_real_escape_string($conexao, trim($_POST['observacoes']));


$sql = "select count(*) as total from cadastros where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

//Validamos se o e-mail já está cadastrado no banco de dados, caso esteja um erro irá aparecer.
if ($row['total'] == 1) {
  $_SESSION['usuario_existe'] = true;
  echo "Erro, este e-mail já está cadastrado. <a href='cadastro.html'>Clique aqui</a> para voltar a página de cadastro";
  exit;
}

//Montamos uma query que irá enviar os dados para o banco de dados
$sql = "INSERT INTO cadastros(nome, email, senha, confirmaSenha, data_cadastro, observacoes) 
VALUES ('$nome', '$email',md5('{$senha}'),md5('{$confirmaSenha}'), NOW(), '$observacoes')";

//Validamos a sessão caso tenha ocorrido tudo certo com o cadastro
if ($conexao->query($sql) === TRUE) {
  $_SESSION['status_cadastro'] = true;
  echo "Usuário cadastrado com sucesso, suas credênciais de acesso são";
  echo "<p>Login:</p>", $email;
  echo "<p>Senha:</p>", $senha;
  echo "<br>";
  echo "Para realizar o login <a href='login.html'>Clique aqui</a>";
}

//Encerramos a conexão
$conexao->close();
