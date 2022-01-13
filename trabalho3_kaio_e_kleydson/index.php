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

	if (isset($_POST["buttonEntrar"])){
		$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");
		$erros=array();
		$login = mysqli_escape_string($connect, $_POST['login']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		$senha = md5($senha);
		if(empty($login) or empty($senha)){
			$erros[] = "Os campos login e senha devem ser preenchidos";
		}
		else{
			$resultado = mysqli_query($connect, "SELECT id,login FROM usuarios WHERE login= '$login' AND senha='$senha'");

			if (mysqli_num_rows($resultado) > 0){
				$dados=mysqli_fetch_array($resultado);
				$_SESSION['logado']= true;
				$_SESSION['id_usuario']= $dados['id'];
				//comenado que redireciona para página 16home.php - deve criar essa página
				header('Location: home.php');		
			}
			else{
				$erros[]="Usuário ou senha incorretos";
			}
		}
		mysqli_close($connect);
	}

	if (isset($_POST["buttonCadastro"])){
		header('Location: cadastrar_usuario.php');
	}
?>

<body style="text-align: center; background-color: #E0473F;">
	<div class="divLogin">
		<img class="logoLogin" src="imagens/logo1.png">
		<h3>Fazer Login</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input class="inputLogin" name="login" type="text" placeholder="Usuário">
			<input class="inputLogin" name="senha" type="password" placeholder="Senha">
			<button class="buttonEntrar" name="buttonEntrar" type="submit">Entrar</button>
			<p>Ainda não se cadastrou? <button name="buttonCadastro" class="btnLoginCadastro">Se cadastre</button></p>
		</form>	
		<div>
			<?php
				if(!empty($erros)):
					foreach($erros as $erro):
						echo '<div class="erro">'.$erro.'</div>';
					endforeach;
				endif;
			?>
		</div>
	</div>
</body>

</html>