<?php
	class database extends General{
		protected $db;
		protected $table;

		public function __construct(){
			$this->db = new PDO('mysql:host=localhost;dbname=default;','root','');
		}

		public function SqlValue($value){
        	if (!is_numeric($value)) {
        		return '"'.$value.'"';
        	}else{
        		return $value;
        	}
        }

		/*
			Funções básicas de CRUD
			Variável option define como sera o filtro do where com os seguintes valores
			Opções: equal -> usa "=" na clausula WHERE
				    like  -> usa "LIKE" na clausula WHERE
		*/

		public function opensql($sql){
			$qry = $this->db->query($sql);
			$qry->setFetchMode(PDO::FETCH_ASSOC);
			return $qry->fetch(PDO::FETCH_ASSOC);
		}

		public function read($table, array $where = null, $option = 'equal', array $fields = null){

			try{
				$strFields = (count($fields) > 0 ? implode($fields, ', ') : '*');

				$sql = 'SELECT '.$strFields.' FROM '.$table;

				if(count($where) > 0){				
					$str = '';
					foreach ($where as $index => $value) {
						if (strlen($str)) {
							$str = $str.' AND ';
						}
						switch ($option) {
							case 'equal':
								$str = $index.' = '.$this->SqlValue($value);
								break;
							case 'like':
								$str = $index.' LIKE '.$this->SqlValue('%'.$value.'%');
								break;
							default:
								$str = $index.' = '.$this->SqlValue($value);
								break;
						}
					}
					$sql = $sql.' '.$str;
				}

				if(strlen($sql) > 0){
					$qry = $this->db->query($sql);
					$qry->setFetchMode(PDO::FETCH_ASSOC);
					return $qry->fetchAll();
				}
			}catch(Exception $e){
				return $e->getMessage();
			}
		}

		public function insert(){
			
		}

		public function update(){
			
		}

		public function delete(){
			
		}
	}
?>