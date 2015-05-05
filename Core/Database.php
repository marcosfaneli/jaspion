<?php
	class database{
		protected $db;

		public function __construct(){
			$this->db = new PDO('mysql:host=localhost;dbname=default;','root','');
		}

		/*
			Funções básicas de CRUD
			Variável option define como sera o filtro do where com os seguintes valores
			Opções: equal -> usa "=" na clausula WHERE
				    like  -> usa "LIKE" na clausula WHERE
		*/
		protected function Read($table, array $where, $option = 'equal'){
			$sql = "SELECT * FROM ".$table;
			if(isset($where){
				foreach ($where as $index => $value) {
					if (strlen($str)) {
						$str = $str.' AND ';
					}
					switch ($option) {
						case 'equal':
							$str = $index.' = '.$value;
							break;
						case 'like':
							$str = $index.' LIKE "%'.$value.'%"';
							break;
						default:
							$str = $index.' = '.$value;
							break;
					}
				}
				$sql = $sql.' '.$str;
			}
			print($sql);
		}

		protected function Insert(){
			
		}

		protected function Update(){
			
		}

		protected function Delete(){
			
		}
	}
?>