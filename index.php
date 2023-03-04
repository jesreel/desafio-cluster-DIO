<html>

<head>
<title>Projeto Docker</title>
</head>
<body>

<?php


//Mostrar versão do PHP
echo "Versao Atual do PHP: ".phpversion()."<br><br>";


// Incluindo a conexão
include("conexao.php");


// Identificando o SO de acesso
if(strpos($_SERVER['HTTP_USER_AGENT'],"Windows")) {
	$so = "Windows";
}
elseif(strpos($_SERVER['HTTP_USER_AGENT'],"Linux")) {
	$so = "Linux";
}
else {
	$so = "Outros";
}



//dados para o insert
$dados = [
	'id'		=> null,
	'datahora'	=> date("d/m/Y H:i:s"),
	'host'		=> $_SERVER['REMOTE_ADDR'],
	'so'		=> $so
];

$sql = "INSERT INTO acessos(id, datahora, host, so) VALUES (:id, :datahora, :host, :so)";



//Transação
try {
	
	$pdo->beginTransaction();
		$insert = $pdo->prepare($sql);
		$insert->execute($dados);
	$pdo->commit();
	
	echo "Dados Salvos com Sucesso!<br>";
	
}
catch(PDOExceptio $e) {
	
	$pdo->rollback();
	$erro = $e->getMessage();
	
	echo $erro;
}

?>
</body>
</html>
