<?php
require_once('../Class/DB.class.php');
$db = new DB("mysql:host=localhost;dbname=biblioteca",'root','');


switch ($_POST["acao"]){
	case 'cadastro':
		$tabela = 'leitores';
		$c['nome'];
		$c['endereco'];
		$c['cidade'];
		$c['estado'];
		$c['telefone'];
		$c['email'];
		$c['cpf'];
		$c['cat_leitor'];
		$c['date_nasc'];


		break;
	
	default:

		break;
}

/*
sleep(1);

switch($_POST['acao']){
	case 'cadastro':
		
		$c['nome'] 		= mysql_real_escape_string($_POST['nome']);
		$c['sobrenome'] = mysql_real_escape_string($_POST['sobrenome']);
		$c['email'] 	= mysql_real_escape_string($_POST['email']);
		$c['telefone'] 	= mysql_real_escape_string($_POST['telefone']);
		$c['code'] 		= mysql_real_escape_string($_POST['senha']);
		
		if(in_array('',$c)){
			echo '1';	
		}else{
			$c['senha'] = md5($c['code']);
			$c['data_cadastro'] = date('Y-m-d H:i:s');
			
			$campos = implode(',',array_keys($c));
			$values = "'".implode("', '",array_values($c))."'";		
			$qr = "INSERT INTO mod6_clientes (".$campos.") VALUES (".$values.")";
			$st = mysql_query($qr) or die ('2');
			if(!empty($st)){
				echo $c['nome'].' '.$c['sobrenome'];
			}else{
				echo '2';	
			}
		}		
	break;
	
	case 'ler':
		$offset = $_POST['offset'];
		$limit	= $_POST['limit'];
		$qr = "SELECT * FROM mod6_clientes ORDER BY nome ASC LIMIT $offset,$limit";
		$ex = mysql_query($qr) or die(mysql_error());
		if(mysql_num_rows($ex) >= 1){
			while($res = mysql_fetch_assoc($ex)):
				echo '<li class="j_'.$res['id'].'">';
					echo '<h3>'.$res['nome'].' '.$res['sobrenome'].'</h3>';
					echo '<div class="contatos">';
						echo '<div class="email"><a href="mailto:'.$res['email'].'">'.$res['email'].'</a></div>';
						echo '<div class="telefone">'.$res['telefone'].'</div>';
					echo '</div><!-- /contatos -->';
					
					echo '<div class="manage">';
						echo '<div id="'.$res['id'].'" class="btnaction edit j_edit"><img src="img/edit.png" alt="Editar" title="Editar" /></div>';
						echo '<div id="'.$res['id'].'" class="btnaction delete j_delete"><img src="img/delete.png" alt="Excluir" title="Excluir" /></div>';
					echo '</div><!-- /manage -->';
				echo '</li>';
			endwhile;
		}else{
			echo '3';	
		}
		
	break;
	
	case 'deletar':
		$delid = $_POST['del'];
		$qr = "DELETE from mod6_clientes WHERE id = $delid";
		$ex = mysql_query($qr);
	break;
	
	case 'consulta':
		$idforedit = $_POST['editid'];
		$qr = "SELECT * FROM mod6_clientes WHERE id = $idforedit";
		$ex = mysql_query($qr);
		$st = mysql_fetch_assoc($ex);
		echo json_encode($st);
	break;
	
	case 'editar':
		$editid = $_POST['id'];
		$u['nome'] 		= mysql_real_escape_string($_POST['nome']);
		$u['sobrenome'] = mysql_real_escape_string($_POST['sobrenome']);
		$u['email'] 	= mysql_real_escape_string($_POST['email']);
		$u['telefone'] 	= mysql_real_escape_string($_POST['telefone']);
		$u['code'] 		= mysql_real_escape_string($_POST['code']);
		$u['senha']		= md5($u['code']);
		
		foreach($u as $key => $value){
			$updates[] = "$key = '$value'";
		}
		
		$updates = implode(', ',$updates);	
		$qr = "UPDATE mod6_clientes SET $updates WHERE id = $editid";
		$st = mysql_query($qr);
		
		unset($u['senha']);
		echo json_encode($u);		
	break;
	
	default:
		echo '2';	
}*/

