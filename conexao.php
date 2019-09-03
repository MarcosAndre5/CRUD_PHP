<?php
	$nomeServidor = "10.9.100.177";
	$dadosConexao = array("Database"=>"teste", "UID"=>"hiarley", "PWD"=>"123456", "CharacterSet"=>"UTF-8");
	$conectar = sqlsrv_connect($nomeServidor, $dadosConexao);
?>