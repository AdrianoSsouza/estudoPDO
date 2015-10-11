<?php 

include('Class/DB.class.php');
	$db = new DB("mysql:host=localhost;dbname=biblioteca" ,"root","");
$startaction = "";
	$acao = '';
	$msg = '';

	if (isset($_GET['acao'])) {
		$startaction = 1;
		$acao = $_GET['acao'];
	}


if ($startaction == 1) {	
	switch ($acao){
	case 'cadastrofunc':
		$tabela = 'leitores';
		$c['nome'] 			= mysql_real_escape_string($_POST['nome']);
		$c['endereco']  	= mysql_real_escape_string($_POST['endereco']);
		$c['cidade']  		= mysql_real_escape_string($_POST['cidade']);
		$c['estado']  		= mysql_real_escape_string($_POST['estado']);
		$c['telefone']  	= mysql_real_escape_string($_POST['telefone']);
		$c['email']  		= mysql_real_escape_string($_POST['email']);
		$c['cpf']  			= mysql_real_escape_string($_POST['cpf']);
		$c['cat_leitor']  	= mysql_real_escape_string($_POST['cat_leitor']);
		$c['data']  		= mysql_real_escape_string($_POST['date_nasc']);
		$exec = $db -> insert($tabela,$c);
		
	
	break;
case 'pesquisa':
	
	

	}

}	/*

// imostrando

	$results = $con -> query("SELECT * FROM autor");

	foreach ($results->fetchAll() as $result) {
		echo $result["nome"]."<br>";
	}
// inserindo
 $query = "INSERT INTO autor (nome) VALUES('Rick Riordan')" ;
 $stmt 	= $con-> prepare($query);
 $stmt-> execute();
// atualizando
 $query = "UPDATE autor SET nome = 'exemplo' WHERE id=5";
 $stmt 	= $con-> prepare($query);
 $stmt	-> execute();

$query = "DELETE FROM autor WHERE id=5";

$stmt = $con-> prepare($query);
$stmt -> execute();
*/




























