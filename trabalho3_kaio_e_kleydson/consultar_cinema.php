<?php
	include 'header.php';
?>

<style>

</style>

	<article class="article3">
		<h1>Consultar Cinemas</h1>
		<form class="formBusca" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input class="input_busca" type="text" name="cinema" placeholder="Buscar Cinemas"><button class="btnSearch" type="submit" name="btnBuscar">Buscar</button><button class="btnSAll" type="submit" name="btnBuscarAll">Buscar Todos</button>
		</form>

		<div class="div_cadastro">
			
				<?php

					$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

					if(isset($_POST['btn-deletar'])){
						$id=mysqli_escape_string($connect,$_POST['id']);
						
						$sql="DELETE FROM cinema WHERE id=$id";
						
						if(mysqli_query($connect,$sql)){
							$_SESSION['mensagem'] = "Excluido com sucesso!";
						}
						else{
							$_SESSION['mensagem'] = "Erro ao excluir!";
						}
					}

					if (isset($_POST['btnBuscar'])){
						$erros = Array();

						if(isset($_POST['cinema'])){
							$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");
							$nome = mysqli_escape_string($connect, $_POST['cinema']);
							$nome = strtolower($nome);

							$result = mysqli_query($connect, "SELECT nome, endereco, numSalas, capacidadeSala, id from cinema where LOWER(nome)='$nome'");
							if (mysqli_num_rows($result) > 0){ 

								echo "<table>
									<tr>
										<th>Nome</th>
										<th>Endereço</th>
										<th>Nº de Salas</th>
										<th>Capacidade por Sala</th>
										<th>Ações</th>
									</tr>";
								while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td>
								    <td>"?>
								    <button class="btn-icon"><i class='material-icons rounded-icon-edit'>edit</i></button><button class="btn-icon" onclick="document.getElementById('modal').style.display='block'"><i class='material-icons rounded-icon-delete'>delete</i></button>
								    <?php "</td></tr>";  
								}
								echo "</table>";	
							}

							else{
								$erros[] = "Usuario não encontrado";
							}

							mysqli_close($connect);

						}

						else{
							$erros[] = "Campo Buscar Cinema deve ser preesncido";
						}

					}

					if (isset($_POST['btnBuscarAll'])){
						$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

						$result = mysqli_query($connect, "SELECT nome, endereco, numSalas, capacidadeSala, id from cinema");
							if (mysqli_num_rows($result) > 0){ 

								echo "<table>
									<tr>
										<th>Nome</th>
										<th>Endereço</th>
										<th>Nº de Salas</th>
										<th>Capacidade por Sala</th>
									</tr>";
								while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>"?>
								    <a href="editar_cinema.php?id=<?php echo $row[4];?>"><button class="btn-icon" name="btn-edit"><i class='material-icons rounded-icon-edit'>edit</i></button></a><button class="btn-icon" onclick="document.getElementById('modal<?php echo $row[4];?>').style.display='block'"><i class='material-icons rounded-icon-delete'>delete</i></button>
								    <?php "</td></tr>";  

								    ?>

										<div id="modal<?php echo $row[4];?>" class="modal">
										  <span onclick="document.getElementById('modal<?php echo $row[4];?>').style.display='none'" class="close" title="Close Modal">×</span>
										  <form class="modal-content" action="consultar_cinema.php" method="POST">
										    <div class="container">
										      <h2>Atenção</h2>
										      <p>Deseja mesmo exculir esse cinema?</p>
										    
										      <div class="clearfix">
										      	<input name="id" style="display: none" value="<?php echo $row[4];?>">
										        <button type="button" onclick="document.getElementById('modal<?php echo $row[4];?>').style.display='none'" class="cancelbtn btnModalBox">Cancelar</button>
										        <button type="submit" name="btn-deletar" onclick="document.getElementById('modal<?php echo $row[4];?>').style.display='none'" class="deletebtn btnModalBox">Deletar</button>
										      </div>
										    </div>
										  </form>
										</div>

										<script>
										// Get the modal
										var modal = document.getElementById('modal<?php echo $row[4];?>');

										// When the user clicks anywhere outside of the modal, close it
										window.onclick = function(event) {
										  if (event.target == modal) {
										    modal.style.display = "none";
										  }
										}
										</script>
								    <?php
								}	
							}

							else{
								$erros[] = "Nenhum cinema com esse nome foi encontrado";
							}
					}
					mysqli_close($connect);
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