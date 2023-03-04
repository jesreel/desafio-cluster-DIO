<?php

	date_default_timezone_set("America/Sao_Paulo");	
		
	$db = 'mysql:host=185.215.145.100;port=3306;dbname=projetodocker';
	$usuario = 'root';
	$senha = '#passxyz#';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	
	
	try {
	
		$pdo = new PDO($db, $usuario, $senha, $options);		
			
	} 
	catch (PDOException $e) {
		
		echo 'ERRO DE CONEXÃO: '.$e->getMessage();		
	
	}
