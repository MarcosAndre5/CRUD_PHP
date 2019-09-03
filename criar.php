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
					<li><a href="">CRIAR</a></li>
					<li><a href="listar.php">LISTAR</a></li>
				</ul>
				<br/>
			</div>
			<br/>
			<form method="POST" action="criar.php">
				<label>Nome:</label>
				<input type="text" name="nome" placeholder="Digite seu nome" required/>
				<br/><br/>
				<label>Idade:</label>
				<input type="number" name="idade" placeholder="Digite sua idade" min="0" required/>
				<br/><br/>
				<label>Cidade:</label>
				<input type="text" name="cidade" placeholder="Digite sua cidade" required/>
				<br/><br/>
				<label>UF:</label>
				<input type="text" name="uf" placeholder="Digite sua UF" required/>
				<br/><br/>
				<label>Email:</label>
				<input type="text" name="email" placeholder="Digite seu Email" required/>
				<br/><br/>
				<input type="submit" name="enviarDados" value="Cadastrar"/>
			</form>
			<?php
				include("conexao.php");

				// CREATE
				if(isset($_POST["enviarDados"])){
					$nome = $_POST["nome"];
					$idade = $_POST["idade"];
					$cidade = $_POST["cidade"];
					$uf = $_POST["uf"];
					$email = $_POST["email"];

					$comandoInserir = "INSERT INTO usuario(nome, idade, cidade, uf, email) VALUES ('$nome', $idade, '$cidade', '$uf', '$email');";

					$inserir = sqlsrv_query($conectar, $comandoInserir);

					if($inserir){
						echo "<script>alert('Usuário Cadastrado!')</script>";
						echo "<script>window.open('criar.php', '_self')</script>";
					}
				}
			?>
		</div>
	</body>
</html>