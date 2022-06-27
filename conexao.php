<?php
//Definindo as variáveis e estabelecendo a conexão com o banco de dados
/*
$servidor = "127.0.0.1:3307";
$usuario = "root";
$senha = "C@rlos3268";
$dbname = "inffus3";
*/

//Definindo as variáveis e estabelecendo a conexão com o banco de dados
$servidor = "mysql.inffus.com";
$usuario = "desafioinffus_user";
$senha = "reg5FJ?(ld5Q";
$dbname = "desafioinffus_db";

//Variável de conexão com validação, caso a conexão de errado ele irá exibir um erro.
$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conexao) {
  die("Houve um erro" . mysqli_connect_error());
}
