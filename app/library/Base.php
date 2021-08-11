<?php 
		//Conection to DataBase With PDO
		class Base{

			private $host = DB_HOST;
			private $user = DB_USUARIO;
			private $password = DB_PASSWORD;
			private $db = DB_BASEDEDATOS;

			private $dbh;
			private $stmt;
			private $error;

			public function __construct()
			{
			//Config conection
				$dsn = "mysql:host=".$this->host.";dbname=".$this->db;
				$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
				try {
					$this->dbh = new PDO($dsn,$this->user,$this->password,$options);
					$this->dbh->exec('set names utf8');

									} 
				catch (PDOException $e) 
				{
				$this->error = $e->getMessage();
				echo $this->error;		
				}
			}
			public function query($sql){
				$this->stmt = $this->dbh->prepare($sql);
			}
 			// se ejecuta
 			
			public function execute(){
				$this->stmt->execute();

			}

			//Obtener registros
			Public function registros(){
				$this->execute();
				return $this->stmt->fetchAll(PDO::FETCH_OBJ);
			}
			Public function registro(){
				$this->execute();
				return $this->stmt->fetch(PDO::FETCH_OBJ);
			}
			Public function rowCount(){
				$this->execute();
				return $this->stmt->rowCount();
			}
		}



