<?php 

	class getURL{

		private $db;
		public $return = null;
		public function __construct()
		{
			$this->db = new Base;
			//$this->getURL("asjiasd");
		}

		public function getURL($shortCode){
		if (strlen($shortCode) <= 8) {
				
			$query = 'SELECT large_url FROM url WHERE short_url="'.$shortCode.'"';
			$this->db->query($query);
			$result = $this->db->registros();
			if (!$result == []) {

			$result = $result[0];
			$result = $result->large_url;
				return $result;
				$this->db = null;
			}
			else {
				return "model-no";
				$this->db = null;
			}				
		}
		else {
			return "model-no";
			$this->db = null;
		}
	}
		public function lastJoin($shorCode){
			$query = 'UPDATE url SET last_join="'.date('Y-m-d').'" WHERE `short_url`="'.$shorCode.'"';
			$this->db->query($query);
			echo $query;
			$this->db->execute();
			$this->db = null;
		}

	}

