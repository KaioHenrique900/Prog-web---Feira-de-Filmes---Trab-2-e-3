<?php
	include 'header.php';

	if(isset($_POST['cadastrar'])){
		$erros = Array();

		$dataI = trim($_REQUEST['dataI']);
		$nome = trim($_REQUEST['nome']);
		$ender = trim($_REQUEST['endereco']);

		if(empty($nome) or empty($ender) or empty($dataI)){
			$erros[] = "<li>Todos os campos devem ser preenchidos</li>";
		}

		else{
			$nome = trim(filter_var($nome, FILTER_SANITIZE_STRING));

	    	$ender = trim(filter_var($ender, FILTER_SANITIZE_STRING));
			
		}
		if(count($erros) == 0){
			$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

			mysqli_query($connect, "INSERT INTO estudio(nome, datInaug, sede) VALUES('$nome', '$dataI', '$ender')");

			mysqli_close($connect);
		}
		
	}

	elseif (isset($_POST['consultar'])){
		header('Location: consultar_estudio.php');
	}
?>

	<article class="article1">
		<h1>Cadastrar Novo Estúdio</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
				<input type="text" name="nome" placeholder="Nome">
				<input type="text" name="endereco" placeholder="Sede">
				Data de Fundação: <input type="date" name="dataI" placeholder="Data de Fundação"><br>
				<input type="submit" name="cadastrar" value="Cadastrar"><input type="submit" name="consultar" value="Consultar Estúdios">
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