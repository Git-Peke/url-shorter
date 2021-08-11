<?php 
	class Controller{
		public function modelo($modelo){
		//cargar
		require_once "../app/models/" . $modelo . ".php";
		//instanciar
		return new $modelo();
		}

		public function view($vista, $datos = []){
		if (file_exists(RUTA_APP."view/" . $vista . ".php")) 
		{
			return "ok";
			require_once RUTA_APP."view/". $vista . ".php";			
		}
		else
		{
			return "no-ok";
		
		}
	}
	public function redirect($datos = []){
		require_once RUTA_APP."view/ots/redirect.php";	
	}
}