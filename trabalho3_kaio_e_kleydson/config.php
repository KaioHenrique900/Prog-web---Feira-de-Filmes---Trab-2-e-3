<?php
//ConexÃ£o com banco de dados
$servername = "localhost"; //endereÃ§o do servidor
$username="root";
$password="Senha1234";
$db_name="sistemalogin";

//pdo - somente orientado objeto
$connect =mysqli_connect($servername,$username,$password,$db_name);

//codifica com o caracteres ao manipular dados do banco de dados
//mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
	echo "Falha na conexÃ£o: ". mysqli_connect_error();
endif;
?>