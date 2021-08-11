<?php 
	class addURL{

		private $db;
		public function __construct()
		{
			$this->db = new Base;

		}
		public function randomNumberByte($length = 6) {
    			$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    			$charactersLength = strlen($characters);
    			$randomString = '';
    			for ($i = 0; $i < $length; $i++) {
        		$randomString .= $characters[rand(0, $charactersLength - 1)];
    			}
    		return $randomString;
		}
		public function checkURL($largeCode){
			$query = 'SELECT short_url FROM url WHERE large_url="'.$largeCode.'"';
			$this->db->query($query);
			$result = $this->db->registros();
			if (!$result == []) {
			$result = $result[0];
			$result = $result->short_url;
			echo $result;
			}
			else{
				$this->addURL($largeCode);
			}
		}

		
		public function addURL($largeCode){
			if (isset($largeCode)) {	
			$shortCode = $this->randomNumberByte();
			$query = 'INSERT INTO url(short_url,large_url) VALUES ("'.$shortCode.'","'.$largeCode.'")';
			$this->db->query($query);
			$this->db->execute();
			$this->db = null;
			echo $shortCode;
			}
			else {
				echo 'ERROR';
			}
		}
		


	}


	/*
INSERT INTO url(short_url,large_url) VALUES ('[value-1]','[value-2]')
*/