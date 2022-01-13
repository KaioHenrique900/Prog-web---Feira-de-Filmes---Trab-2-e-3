<html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">

<style type="text/css">
	p{
		font-size: 13px;
		margin: 3px;
	}
</style>

<?php
	session_start();

	if (isset($_POST["buttonCadastrar"])){
		$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");
		$erros=array();

		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$nome = trim(filter_var($nome, FILTER_SANITIZE_STRING));

		$login = mysqli_escape_string($connect, $_POST['login']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		$cSenha = mysqli_escape_string($connect, $_POST['cSenha']);
		if(empty($login) or empty($senha) or empty($nome) or empty($cSenha)){
			$erros[] = "<li>Todos os campos devem ser preenchidos</li>";
		}
		else{
			if (!filter_var($login, FILTER_VALIDATE_EMAIL)){
				$erros[] = "<li>Insira um email válido</li>";
			}

			else{
				$resultado = mysqli_query($connect, "SELECT login from usuarios where login='$login'");

				if(mysqli_num_rows($resultado) > 0){
					$erros[] = "<li>Usuario já existente</li>";
				}
			}

			if (strlen($senha)<8){
				$erros[] = "<li>A senha precisa ter pelo menos 8 caracteres</li>";
			}

	
			if($senha != $cSenha){
				$erros[] = "<li>O campos Senha e Confirme sua Senha devem ser iguais</li>";
			}
		}

		if (count($erros) == 0){

					$senha = md5($senha);

					$query = mysqli_query($connect, "INSERT INTO usuarios(login, nome, senha) VALUES('$login', '$nome', '$senha')");
					$resultado = mysqli_query($connect, "SELECT id from usuarios where login = '$login'");
					$dados=mysqli_fetch_array($resultado);

					$_SESSION['logado']= true;
					$_SESSION['id_usuario']= $dados['id'];

					header('Location: home.php');
				
			}
		
		mysqli_close($connect);
	}

?>

<body style="text-align: center; background-color: #E0473F;">
	<div class="divLogin">
		<img class="logoLogin" src="imagens/logo1.png">
		<h3>Se Cadastrar</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input class="inputLogin" name="nome" type="text" placeholder="Nome">
			<input class="inputLogin" name="login" type="text" placeholder="Email">
			<input class="inputLogin" name="senha" type="password" placeholder="Senha">
			<input class="inputLogin" name="cSenha" type="password" placeholder="Confirme sua Senha">
			<button class="buttonEntrar" name="buttonCadastrar" type="submit">Cadastrar</button>
		</form>	
		<div>
			<?php
				if(!empty($erros)):
					foreach($erros as $erro):
						echo '<div class="erro">'.$erro.'</div><br>';
					endforeach;
				endif;
			?>
		</div>
	</div>
</body>

</html>