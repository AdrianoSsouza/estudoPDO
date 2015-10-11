<?php 
	class DB extends PDO{


		public function all($table){

			return $this-> query("SELECT * FROM $table")->fetchAll();

		}

		public function find_by($table,$fild,$value){

			return $this-> query("SELECT * FROM $table WHERE $fild =$value")->fetch();
		}

		public function find($table,$id){

			return $this-> find_by($table, 'id', $id);
		}
		public function del($table,$id){

			return   $this-> prepare("DELETE FROM $table WHERE id = $id ")	
			-> execute();
			}

		public function insert($table,$dados = []){
			try{
				$query	= "INSERT INTO $table (:campos) VALUES (:value)";
				$stmt = $this-> prepare($query);	
				$campos			=	implode(',', array_keys($dados));
				$values			= 	"'".implode("' , '", array_values($dados))."'";
				
				return $stmt-> execute();
				if ($stmt->rowCount()>0) {
					echo"cadastrado";
				}else
					"erro ao cadastrar";
 	 		}catch(PDOException $e){
			     echo $e->getMessage();
			 }		
			//	return  $this-> prepare()


			//	$this	-> execute();
						
		}




	}



 ?>