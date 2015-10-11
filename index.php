<?php include("includes/header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/stilo.css" />
	<title>Inicio</title>
</head>
<body>
	<?php 
		$dados = ("SELECT * FROM leitores");
		$results = $db -> all("categ_leitor");
	 ?>

	<strong>CADASTR-SE</strong>
    
	<div id="acomodar">
			<form action="index.php?acao=cadastrofunc" name="cadastro" method="post">
				<label for="nome">Nome</label><input type="text" name="nome" class="txt bradius">
				<label for="endereco">Endereço</label><input type="text" name="endereco" class="txt bradius">
				<label for="cidade">Cidade</label><input type="text" name="cidade" class="txt bradius">
				<label for="estado">Estado</label><input type="text" name="estado" class="txt bradius">
				<label for="telefone">Telefone</label><input type="text" name="telefone" class="txt bradius">
				<label for="email">Email</label><input type="text" name="email" class="txt bradius">
				<label for="cpf">Cpf</label><input type="text" name="cpf" class="txt bradius">
				<label for="cat_leitor">Categoria do Leitor</label><select name="cat_leitor" class="txt bradius">
				<option value="" >Selecione uma opção</option>
					
					<?php 
					foreach ($results as $result) {
							echo'<option value="'.$result["id"].'" >'.$result["nome"].'</option><br>';
						}
					
					?>
				<label for="data_nascimento">Data de Nascimento</label><input type="date" name="date_nasc" class="txt bradius">
				<input type="submit" value="cadastro" class="sb j_buttom">
			</form>
		</div>	
</body>
</html>