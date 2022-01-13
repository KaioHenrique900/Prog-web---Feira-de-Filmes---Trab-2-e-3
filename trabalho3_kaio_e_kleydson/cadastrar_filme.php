<?php
	include 'header.php';

	if(isset($_POST['cadastrar'])){
		$erros = Array();
		$nome = trim($_REQUEST['nome']);
		$datLanc = trim($_REQUEST['datLanc']);
		$direcao = trim($_REQUEST['direcao']);
		$sinopse = trim($_REQUEST['sinopse']);
		$capa = $_FILES['capa'];
		$uploaddir = 'C:\Users\Kaio\Desktop\USBWebserver v8.6\root\site_kaio_e_kleydson\imagens\ ';

		if(empty($nome) or empty($datLanc) or empty($direcao) or empty($sinopse)){
			$erros[] = "<li>Todos os campos devem ser preenchidos</li>";
		}

		else{
			$uploadfile = $uploaddir . basename($_FILES['capa']['name']);
			move_uploaded_file($_FILES['capa']['tmp_name'], $uploadfile);

			$nome = trim(filter_var($nome, FILTER_SANITIZE_STRING));

			$direcao = trim(filter_var($direcao, FILTER_SANITIZE_STRING));

	    	$sinpse = trim(filter_var($sinopse, FILTER_SANITIZE_STRING));
		}
		
		if(count($erros) == 0){
			$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

			mysqli_query($connect, "INSERT INTO filmes(nome, datLanc, direcao, sinopse) VALUES('$nome', '$datLanc', '$direcao', '$sinopse')");

			mysqli_close($connect);
		}
	}

	elseif (isset($_POST['consultar'])){
		header('Location: consultar_filme.php');
	}
?>

	<article class="article1">
		<h1>Cadastrar Filme</h1>
		<div class="div_cadastro">
			<form class="form_cadastro" enctype="multipart/form-data"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				
				<input type="text" name="nome" placeholder="Nome">
				<label>Data de Lançamento:</label> <input type="date" name="datLanc" placeholder="Ano de Lançamento">
				<input type="text" name="direcao" placeholder="Direção">
				<textarea class="sinopse" type="text" name="sinopse" placeholder="Sinopse"></textarea>

				<div style="border: solid 1px darkred; padding: 5px">
					Selecione uma capa:<br>
					<input type="file" name="capa">
				</div>
				
				<input type="submit" name="cadastrar" value="Cadastrar"><input type="submit" name="consultar" value="Consultar Filmes">

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