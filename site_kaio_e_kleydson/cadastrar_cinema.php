<?php
	include 'header.php';
	//trim() limpa espaços no inicio e no fim de uma string
	if(isset($_POST['cadastrar'])){
		$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");
		$erros = Array();
		$nome = trim($_REQUEST['nome']);
		$endereco = trim($_REQUEST['endereco']);
		$nSalas = trim($_REQUEST['nSalas']);
		$cSala = trim($_REQUEST['cSala']);

		if(empty($nome) or empty($endereco) or empty($nSalas) or empty($cSala)){
			$erros[] = "<li>Todos os campos devem ser preenchidos</li>";
		}

		else{
			$nome = trim(filter_var($nome, FILTER_SANITIZE_STRING));

	    	$endereco = trim(filter_var($endereco, FILTER_SANITIZE_STRING));

	    	if(!filter_var($nSalas, FILTER_VALIDATE_INT)){
	    		$erros[] = '<li>O número de salas deve ser um número inteiro</li>';
	    	}

	    	if(!filter_var($cSala, FILTER_VALIDATE_INT)){
	    		$erros[] = '<li>A capacidade por sala deve ser um número inteiro</li>';
	    	}
		}
		
		if(count($erros) == 0){
			$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

			mysqli_query($connect, "INSERT INTO cinema(nome, endereco, numSalas, capacidadeSala) VALUES('$nome', '$endereco', $nSalas, $cSala)");

			mysqli_close($connect);
		}
		
	}

	elseif (isset($_POST['consultar'])){
		header('Location: consultar_cinema.php');
	}
?>

	<article class="article1">
		<h1>Cadastrar Novo Cinema</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input class="inputLogin" type="text" name="nome" placeholder="Nome">
				<input class="inputLogin" type="text" name="endereco" placeholder="Endereço">
				<input class="inputLogin" type="text" name="nSalas" placeholder="Nº de Salas">
				<input class="inputLogin" type="text" name="cSala" placeholder="Capacidade Máxima por Sala">

				<input type="submit" name="cadastrar" value="Cadastrar"><input type="submit" name="consultar" value="Consultar Cinemas">

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