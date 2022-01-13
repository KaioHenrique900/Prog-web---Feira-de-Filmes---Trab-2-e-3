<html>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">

<header>
	<title>Feira de Filmes - Error</title>
</header>

<?php
if (isset($_REQUEST['toHome'])){
	header('Location: home.php');
}
?>

<body>

	<nav>
		
	</nav>

	<article class="article2">
		
		<h1>Desculpe! Por enquanto não possuimos nenhuma rede social.</h1><img style="height: 50px;" src="imagens/emoji_triste.png"><br><br>
		<form method="post">
			<button name="toHome" class="btnLoginCadastro">	Voltar à página inicial</button>
		</form>
	</article>


</body>

</html>