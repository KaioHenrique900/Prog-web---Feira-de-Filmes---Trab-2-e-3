<?php

//Header
include_once 'header.php';

$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

//Select com o id que veio da URL
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$resultado = mysqli_query($connect, "SELECT * FROM estudio WHERE id = $id");
	$dados = mysqli_fetch_array($resultado);
} 
if(isset($_POST['atualizar'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$sede = $_POST['sede'];
	$datInaug = $_POST['datInaug'];

	$sql="UPDATE estudio SET nome='$nome', sede='$sede', datInaug='$datInaug' WHERE id=$id";
	if(mysqli_query($connect,$sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: consultar_estudio.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location:consultar_estudio.php');
	endif;
}
 ?>

	<article class="article1">
		<h1>Editar Estúdio</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				
				<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
				<input type="text" name="nome" placeholder="Nome" value="<?php echo $dados['nome']; ?>">
				<input type="text" name="sede" placeholder="Sede" value="<?php echo $dados['sede']; ?>">
				<label>Data de Fundação: </label><input type="date" name="datInaug" placeholder="Data de Fundação" value="<?php echo $dados['datInaug']; ?>"><br>
				
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

     
 
