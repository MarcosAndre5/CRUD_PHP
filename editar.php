<?php
	include("conexao.php");

	if(isset($_GET["editar"])){
		$editar_id = $_GET["editar"];

		$comandoSelect = "SELECT * FROM usuario WHERE id=$editar_id;";

		$select = sqlsrv_query($conectar, $comandoSelect);

		$fila = sqlsrv_fetch_array($select);

		$nome = $fila['nome'];
		$idade = $fila['idade'];
		$cidade = $fila['cidade'];
		$uf = $fila['uf'];
		$email = $fila['email'];
	}
?>
<br/>
<form method="POST" action="">
	<label>Nome:</label>
	<input type="text" name="nome" value="<?php echo $nome; ?>" required/>
	<br/><br/>
	<label>Idade:</label>
	<input type="number" name="idade" value="<?php echo $idade; ?>" required/>
	<br/><br/>
	<label>Cidade:</label>
	<input type="text" name="cidade" value="<?php echo $cidade; ?>" required/>
	<br/><br/>
	<label>UF:</label>
	<input type="text" name="uf" value="<?php echo $uf; ?>" required/>
	<br/><br/>
	<label>Email:</label>
	<input type="text" name="email" value="<?php echo $email; ?>" required/>
	<br/><br/>
	<input type="submit" name="atualizarDados" value="Atualizar"/>
</form>

<?php
	if(isset($_POST["atualizarDados"])){
		$atualizarNome = $_POST["nome"];
		$atualizarIdade = $_POST["idade"];
		$atualizarCidade = $_POST["cidade"];
		$atualizarUf = $_POST["uf"];
		$atualizarEmail = $_POST["email"];

		$comandoUpdate = "UPDATE usuario SET nome='$atualizarNome', idade=$atualizarIdade, cidade='$atualizarCidade', uf='$atualizarUf', email='$atualizarEmail' WHERE id=$editar_id;";

		$update = sqlsrv_query($conectar, $comandoUpdate);

		if($update){
			echo "<script>alert('Dados Atualizados!')</script>";
			echo "<script>window.open('listar.php', '_self')</script>";
		}
	}
?>