<?php
	include 'header.php';
?>
<style>

</style>

	<article class="article3">
		<h1>Consultar Usuários</h1>
		<form class="formBusca" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input class="input_busca" type="text" name="usuario" placeholder="Buscar Usuarios"><button class="btnSearch" type="submit" name="btnBuscar">Buscar</button><button class="btnSAll" type="submit" name="btnBuscarAll">Buscar Todos</button>
		</form>

		<div class="div_cadastro">
			
				<?php
					$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

					if(isset($_POST['btn-deletar'])){
						$id=mysqli_escape_string($connect,$_POST['id']);
						
						$sql="DELETE FROM usuarios WHERE id=$id";
						
						if(mysqli_query($connect,$sql)){
							$_SESSION['mensagem'] = "Excluido com sucesso!";
						}
						else{
							$_SESSION['mensagem'] = "Erro ao excluir!";
						}
					}

					if (isset($_POST['btnBuscar'])){
						$erros = Array();

						if($_POST['usuario'] != ""){
							$nome = mysqli_escape_string($connect, $_POST['usuario']);
							$nome = strtolower($nome);

							$result = mysqli_query($connect, "SELECT nome, login, senha, id from usuarios where LOWER(nome)='$nome'");
							if (mysqli_num_rows($result) > 0){ 

								echo "<table>
									<tr>
										<th>Nome</th>
										<th>Email</th>
										<th>Senha</th>
										<th>Ações</th>
									</tr>";
								while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>"
								    ?><a href="editar_usuario.php?id=<?php echo $row[3];?>"><button class="btn-icon" name="btn-edit"><i class='material-icons rounded-icon-edit'>edit</i></button></a><button class="btn-icon" onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='block'"><i class='material-icons rounded-icon-delete'>delete</i></button>
								    <?php "</td></tr>"; 

								    ?>
									<div id="modal<?php echo $row[3];?>" class="modal">
										  <span onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='none'" class="close" title="Close Modal">×</span>
										  <form class="modal-content" action="consultar_usuario.php" method="POST">
										    <div class="container">
										      <h2>Atenção</h2>
										      <p>Deseja mesmo exculir esse usuário?</p>
										    
										      <div class="clearfix">
										      	<input name="id" style="display: none" value="<?php echo $row[3];?>">
										        <button type="button" onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='none'" class="cancelbtn btnModalBox">Cancelar</button>
										        <button type="submit" name="btn-deletar" onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='none'" class="deletebtn btnModalBox">Deletar</button>
										      </div>
										    </div>
										  </form>
										</div>

										<script>
										// Get the modal
										var modal = document.getElementById('modal<?php echo $row[3];?>');

										// When the user clicks anywhere outside of the modal, close it
										window.onclick = function(event) {
										  if (event.target == modal) {
										    modal.style.display = "none";
										  }
										}
										</script>
								<?php
								}
								echo "</table>";	
							}

							else{
								$erros[] = "<li>Usuario não encontrado</li>";
							}


						}

						else{
							$erros[] = "<li>Campo Buscar Usuario deve ser preenchido</li>";
						}

					}

					if (isset($_POST['btnBuscarAll'])){
						$connect = mysqli_connect("localhost", "root", "Senha1234", "sistemalogin");

						$result = mysqli_query($connect, "SELECT nome, login, senha, id from usuarios");
							if (mysqli_num_rows($result) > 0){ 

								echo "<table>
									<tr>
										<th>Nome</th>
										<th>Email</th>
										<th>Senha</th>
										<th>Ações</th>
									</tr>";
								while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>"?>
								    <a href="editar_usuario.php?id=<?php echo $row[3];?>"><button class="btn-icon" name="btn-edit"><i class='material-icons rounded-icon-edit'>edit</i></button></a><button class="btn-icon" onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='block'"><i class='material-icons rounded-icon-delete'>delete</i></button>
								    <?php "</td></tr>"; 

								    ?>
									<div id="modal<?php echo $row[3];?>" class="modal">
										  <span onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='none'" class="close" title="Close Modal">×</span>
										  <form class="modal-content" action="consultar_usuario.php" method="POST">
										    <div class="container">
										      <h2>Atenção</h2>
										      <p>Deseja mesmo exculir esse usuário?</p>
										    
										      <div class="clearfix">
										      	<input name="id" style="display: none" value="<?php echo $row[3];?>">
										        <button type="button" onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='none'" class="cancelbtn btnModalBox">Cancelar</button>
										        <button type="submit" name="btn-deletar" onclick="document.getElementById('modal<?php echo $row[3];?>').style.display='none'" class="deletebtn btnModalBox">Deletar</button>
										      </div>
										    </div>
										  </form>
										</div>

										<script>
										// Get the modal
										var modal = document.getElementById('modal<?php echo $row[3];?>');

										// When the user clicks anywhere outside of the modal, close it
										window.onclick = function(event) {
										  if (event.target == modal) {
										    modal.style.display = "none";
										  }
										}
										</script>
								<?php
								}

								echo "</table>";	
							}

							else{
								$erros[] = "Nenhum usuario com esse nome foi encontrado";
							}
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
				mysqli_close($connect);
			?>
		</div>
		</div>
	</article>

<?php
	include 'footer.php';
?>