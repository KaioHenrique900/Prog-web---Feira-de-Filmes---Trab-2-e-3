<?php
//Iniciar  Sessão
session_start();
$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

if(isset($_POST['btn-deletar'])):
	$id=mysqli_escape_string($connect,$_POST['id']);
	
	$sql="DELETE FROM filmes WHERE  id=$id";
	
	if(mysqli_query($connect,$sql)):
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: ../consultar_filme.php');
	else:
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: ../consultar_filme.php');
	endif;
endif;	

mysqli_close($connect);

?>