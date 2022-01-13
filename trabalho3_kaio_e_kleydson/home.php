<?php
	include 'header.php';
?>

<style>

</style>

	<article>

		<h1>Filmes Cadastrados Recentemente</h1>
		<div class="filme_content">
			<img class="capa_filme" src="imagens/o_pequenino.jpg">
			<div class="titulo_filme">O Pequenino (2006)</div>
		</div>

		<div class="filme_content">
			<img class="capa_filme" src="imagens/karate_kid.jpg">
			<div class="titulo_filme">Karatê Kid (1984)</div>
		</div>

		<div class="filme_content">
			<img class="capa_filme" src="imagens/django_livre.jpg">
			<div class="titulo_filme">Django Livre (2012)</div>
		</div>

		<div class="filme_content">
			<img class="capa_filme" src="imagens/tmep.jpg">
			<div class="titulo_filme">Todo Mundo... (2000)</div>
		</div>

		<div class="filme_content">
			<img class="capa_filme" src="imagens/shrek.jpg">
			<div class="titulo_filme">Shrek (2001)</div>
		</div>

		<div class="filme_content">
			<img class="capa_filme" src="imagens/halloween.jpg">
			<div class="titulo_filme">Halloween (1978)</div>
		</div>

		<div class="filme_content">
			<img class="capa_filme" src="imagens/efes.jpg">
			<div class="titulo_filme">Entre Facas e... (2019)</div>
		</div><br>

		<!-- Cadastro-->
		<div class="content1">
			<h1>Cadastre seu filme favorito</h1>
			<p>Clicando <a href="cadastrar_filme.php" style="text-decoration: none; color: tomato;">aqui</a> você pode cadastrar um filme, inserindo informações relevantes sobre o mesmo.</p>
		
			<h1>Cadastre seu diretor favorito</h1>
			<p>Clique <a href="cadastrar_diretor.php" style="text-decoration: none; color: tomato;">aqui</a> para poder cadastrar um diretor que gosta.</p>
		
			<h1>Cadastre seu cinema favorito</h1>
			<p>Clicando <a href="cadastrar_cinema.php" style="text-decoration: none; color: tomato;">aqui</a> você pode cadastrar um cinema.</p>

		
			<h1>Cadastre seu estúdio favorito</h1>
			<p>Clique <a href="cadastrar_estudio.php" style="text-decoration: none; color: tomato;">aqui</a> para poder cadastrar um estúdio que gosta.</p>
		</div>

		<!-- Consulta-->
		<div class="content2">
			<h1>Consulte os filmes cadastrados</h1>
			<p><a href="consulta.php" style="text-decoration: none; color: tomato;">Aqui</a> são mostradas as informações dos filmes que já foram cadastrados</p>
		
			<h1>Consulte os diretores cadastrados</h1>
			<p><a href="consultar_diretor.php" style="text-decoration: none; color: tomato;">Aqui</a> são mostradas as informações dos deiretores que já foram cadastrados</p>
		
			<h1>Consulte os cinemas cadastrados</h1>
			<p><a href="consultar_cinema.php" style="text-decoration: none; color: tomato;">Aqui</a> são mostradas as informações dos cinemas que já foram cadastrados</p>
		
			<h1>Consulte os estúdios cadastrados</h1>
			<p><a href="consultar_estudio.php" style="text-decoration: none; color: tomato;">Aqui</a> são mostradas as informações dos estúdios que já foram cadastrados</p>
		</div>

	</article>

<?php
	include 'footer.php';
?>