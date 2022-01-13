<?php

//Header
include_once 'header.php';

$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

//Select com o id que veio da URL
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$resultado = mysqli_query($connect, "SELECT * FROM diretor WHERE id = $id");
	$dados = mysqli_fetch_array($resultado);
}
if(isset($_POST['atualizar'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$nacionalidade = $_POST['nacionalidade'];
	$datNasc = $_POST['datNasc'];

	$sql="UPDATE diretor SET nome='$nome', nacionalidade='$nacionalidade', datNasc='$datNasc' WHERE id=$id";
	if(mysqli_query($connect,$sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: consultar_diretor.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location:consultar_diretor.php');
	endif;
}
 ?>

	<article class="article1">
		<h1>Editar Diretor</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				
				<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
				<input type="text" name="nome" placeholder="Nome" value="<?php echo $dados['nome']; ?>">
				<input type="text" name="nacionalidade" placeholder="Sede" value="<?php echo $dados['nacionalidade']; ?>">
				<label>Data de Nascimento: </label><input type="date" name="datNasc" placeholder="Data de Nascimento" value="<?php echo $dados['datNasc']; ?>"><br>
				
				<input type="submit" name="atualizar" value="Atualizar"><input type="submit" name="consultar" value="Consultar Filmes">

				<?php
					if(!empty($erros)):
						foreach($erros as $erro):
							echo '<div class="erro">'.$erro.'</div><br>';
						endforeach;
					endif;

				?>
			</form>
		</div>

	</article>



<?php include_once 'footer.php';?>

     
 
