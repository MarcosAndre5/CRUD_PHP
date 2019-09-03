<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>CRUD - PHP.</title>
		<style type="text/css">
			h1 { text-align: center; }
			body {
				padding:0px;
				margin:0px;
			}
			#menu ul {
				padding:0px;
				margin:0px;
				float: left;
				width: 100%;
				background-color:#EDEDED;
				list-style:none;
				font:100% Tahoma;
			}
			#menu ul li { display: inline; }
			#menu ul li a {
				background-color:#EDEDED;
				color: #333;
				text-decoration: none;
				border-bottom:3px solid #EDEDED;
				padding: 2px 10px;
				float:left;
			}
			#menu ul li a:hover {
				background-color:#D6D6D6;
				color: #6D6D6D;
				border-bottom:3px solid #EA0000;
			}
		</style>
	</head>
	<body>
		<h1>Formulário de Cadastro.</h1>
		<div id="menu">
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="criar.html">CRIAR</a></li>
				<li><a href="">LISTAR</a></li>
				<li><a href="">ATUALIZAR</a></li>
				<li><a href="">DELETAR</a></li>
			</ul>
			<br/>
		</div>
		<table>
			<tr>
				<td>Nome</td>
				<td>Idade</td>
				<td>Cidade</td>
				<td>UF</td>
				<td>Email</td>
			</tr>
			<?php
				$comandoSelect = "SELECT * FROM usuario";

				$select = sqlsrv_query($con, $comandoSelect);

				$i = 0;

				while($fila = sqlsrv_fetch_array($select)){
					$nome = $fila['nome'];
					$idade = $fila['idade'];
					$cidade = $fila['cidade'];
					$uf = $fila['uf'];
					$email = $fila['email'];
					$i++;
				}
			?>
			<tr>
				<td><?php echo $nome; ?></td>
				<td><?php echo $idade; ?></td>
				<td><?php echo $cidade; ?></td>
				<td><?php echo $uf; ?></td>
				<td><?php echo $email; ?></td>
			</tr>
		</table>
		<br/>
	</body>
</html>