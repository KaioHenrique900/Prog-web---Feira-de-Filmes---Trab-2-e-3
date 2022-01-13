<html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">

<script src="jquery-3.5.1.min.js"></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->

<head>
	<title>Feira de Filmes</title>
</head>
<style>	
</style>

<?php
	session_start();

	$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");
	
	if (isset($_POST['home'])){
		header('Location: home.php');
	}

	if (isset($_POST['cadastro'])){
		header('Location: cadastro.php');
	}

	if (isset($_POST['consulta'])){
		header('Location: consulta.php');
	}

	if (isset($_POST['sobre'])){
		header('Location: sobre.php');
	}


?>

<body>
	<div class="header" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<nav class="header_toolbar">
			<ul>
				<li><a href="home.php" name="home">Home</a></li>
				<li class="dropdown">
					<button class="dropbtn">Cadastrar</button>
					<div class="dropdown-content">
					  	<a href="cadastrar_filme.php">Filme</a>
					  	<a href="cadastrar_diretor.php">Diretor</a>
					  	<a href="cadastrar_cinema.php">Cinema</a>
					  	<a href="cadastrar_estudio.php">Estúdio</a>
					</div>
				</li>
				<li class="dropdown">
					<button class="dropbtn">Consultar</button>
					<div class="dropdown-content">
					  	<a href="consultar_usuario.php">Usuários</a>
					  	<a href="consultar_filme.php">Filmes</a>
					  	<a href="consultar_diretor.php">Diretores</a>
					  	<a href="consultar_cinema.php">Cinemas</a>
					  	<a href="consultar_estudio.php">Estúdios</a>
					</div></li>
				<li><a href="sobre.php" name="sobre">Sobre</a></li>
				<li><a href="index.php" name="sobre">Sair</a></li>
			</ul>
		</nav>
		<nav class="header_name_user">
			<b><span id="Username" name="Username">
				<?php
					$id = $_SESSION['id_usuario'];
					$query = mysqli_query($connect, "SELECT nome from usuarios where id=$id");
					$dados=mysqli_fetch_array($query);
					echo $dados['nome'];
					mysqli_close($connect);
					
					session_unset(); //limpar a sessão
				?>
			</span></b>
		</nav>
	</div>

	<div class="header_content">
		<figure><img class="logo" src="imagens/logo.png"></figure>
	</div>