<?php

//Header
include_once 'header.php';

$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

//Select com o id que veio da URL
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$resultado = mysqli_query($connect, "SELECT * FROM filmes WHERE id = $id");
	$dados = mysqli_fetch_array($resultado);
} 

if(isset($_POST['atualizar'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$datLanc = $_POST['datLanc'];
	$direcao = $_POST['direcao'];
	$sinopse = $_POST['sinopse'];

	$sql="UPDATE filmes SET nome='$nome', datLanc='$datLanc', direcao='$direcao', sinopse='$sinopse' WHERE id=$id";
	if(mysqli_query($connect,$sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: consultar_filme.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location:consultar_filme.php');
	endif;
}
 ?>

	<article class="article1">
		<h1>Editar Filme</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				
				<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
				<input type="text" name="nome" placeholder="Nome" value="<?php echo $dados['nome']; ?>">
				<label>Data de Lançamento:</label> <input type="date" name="datLanc" placeholder="Ano de Lançamento" value="<?php echo $dados['datLanc']; ?>">
				<input type="text" name="direcao" placeholder="Direção" value="<?php echo $dados['direcao']; ?>">
				<textarea class="sinopse" type="text" name="sinopse" placeholder="Sinopse"><?php echo $dados['sinopse']; ?></textarea>
				
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

     
 
