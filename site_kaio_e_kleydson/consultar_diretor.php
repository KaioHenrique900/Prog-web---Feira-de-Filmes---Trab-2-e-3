<?php
	include 'header.php';
?>

<style>
</style>

	<article class="article3">
		<h1>Consultar Diretores</h1>
		<form class="formBusca" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input class="input_busca" type="text" name="diretor" placeholder="Buscar Diretores"><button class="btnSearch" type="submit" name="btnBuscar">Buscar</button><button class="btnSAll" type="submit" name="btnBuscarAll">Buscar Todos</button>
		</form>

		<div class="div_cadastro">
			
				<?php
					if (isset($_POST['btnBuscar'])){
						$erros = Array();

						if($_POST['diretor'] != ""){
							$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");
							$nome = mysqli_escape_string($connect, $_POST['diretor']);
							$nome = strtolower($nome);

							$result = mysqli_query($connect, "SELECT nome, datNasc, nacionalidade from diretor where LOWER(nome)='$nome'");
							if (mysqli_num_rows($result) > 0){ 

								echo "<table>
									<tr>
										<th>Nome</th>
										<th>Data de Nascimento</th>
										<th>Nacionalidade</th>
									</tr>";
								while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";  
								}
								echo "</table>";	
							}

							else{
								$erros[] = "<li>Nenhum diretor com esse nome foi encontrado</li>";
							}

							mysqli_close($connect);

						}

						else{
							$erros[] = "<li>Campo Buscar Filme deve ser preenchido</li>";
						}

					}

					if (isset($_POST['btnBuscarAll'])){
						$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

						$result = mysqli_query($connect, "SELECT nome, datNasc, nacionalidade from diretor");
							if (mysqli_num_rows($result) > 0){ 

								echo "<table>
									<tr>
										<th>Nome</th>
										<th>Data de Nascimento</th>
										<th>Nacionalidade</th>
									</tr>";
								while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";  
								}
								echo "</table>";	
							}

							else{
								$erros[] = "Nenhum diretor com esse nome foi encontrado";
							}
						mysqli_close($connect);
					}
				?>
				
				
			</table>
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
	</article>

<?php
	include 'footer.php';
?>