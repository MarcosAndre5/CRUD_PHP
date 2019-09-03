<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>CRUD - PHP.</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<div id="tudo">
			<h1>Formulário de Cadastro.</h1>
			<div id="menu">
				<ul>
					<li><a href="index.html">HOME</a></li>
					<li><a href="criar.php">CRIAR</a></li>
					<li><a href="">LISTAR</a></li>
				</ul>
				<br/>
			</div>
			<table>
				<tr>
					<td><b>Nome</b></td>
					<td><b>Idade</b></td>
					<td><b>Cidade</b></td>
					<td><b>UF</td>
					<td><b>Email</td>
					<td><b>Ação</td>
					<td><b>Ação</td>
				</tr>
				<?php
					include("conexao.php");

					// LISTAGEM
					$comandoSelect = "SELECT * FROM usuario;";
					$select = sqlsrv_query($conectar, $comandoSelect);
					$i = 0;
					while($fila = sqlsrv_fetch_array($select)){
						$id = $fila['id'];
						$nome = $fila['nome'];
						$idade = $fila['idade'];
						$cidade = $fila['cidade'];
						$uf = $fila['uf'];
						$email = $fila['email'];
						$i++;
						echo "<tr>
							<td>$nome</td>
							<td>$idade</td>
							<td>$cidade</td>
							<td>$uf</td>
							<td>$email</td>
							<td><a href='listar.php?editar=$id'>Editar</a></td>
							<td><a href='listar.php?excluir=$id'>Excluir</a></td>
						</tr>";
					}
				?>
			</table>
			<?php
				// EDIÇÃO
				if(isset($_GET["editar"])){
					include("editar.php");
				}

				// DELETE
				if(isset($_GET["excluir"])){
					$excluir_id = $_GET["excluir"];

					$comandoExcluir = "DELETE FROM usuario WHERE id=$excluir_id;";

					$exluir = sqlsrv_query($conectar, $comandoExcluir);

					if($exluir){
						echo "<script>alert('O usuário foi removido!')</script>";
						echo "<script>window.open('listar.php', '_self')</script>";
					}
				}
			?>
		</div>
	</body>
</html>