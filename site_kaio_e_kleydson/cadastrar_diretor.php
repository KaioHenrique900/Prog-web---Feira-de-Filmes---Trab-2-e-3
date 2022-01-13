<?php
	include 'header.php';

	if(isset($_POST['cadastrar'])){
		$erros = Array();
		$nome = trim($_REQUEST['nome']);
		$dNasc = trim($_REQUEST['dNasc']);
		$nac = trim($_REQUEST['nac']);

		if(empty($nome) or empty($dNasc) or empty($nac)){
			$erros[] = "<li>Todos os campos devem ser preenchidos</li>";
		}

		else{
			$nome = trim(filter_var($nome, FILTER_SANITIZE_STRING));

			$nac = trim(filter_var($nac, FILTER_SANITIZE_STRING));
			
		}

		if(count($erros) == 0){
			$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

			mysqli_query($connect, "INSERT INTO diretor(nome, datNasc, nacionalidade) VALUES('$nome', '$dNasc', '$nac')");

			mysqli_close($connect);
		}
		
	}

	elseif (isset($_POST['consultar'])){
		header('Location: consultar_diretor.php');
	}
?>

	<article class="article1">
		<h1>Cadastrar Novo Diretor</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				
				<input type="text" name="nome" placeholder="Nome">
				<input type="text" name="nac" placeholder="Nacionalidade">
				<label>Data de Nascimento:</label> <input type="date" name="dNasc"><br>
				
				<input type="submit" name="cadastrar" value="Cadastrar"><input type="submit" name="consultar" value="Consultar Diretores">

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

<?php
	include 'footer.php';
?>