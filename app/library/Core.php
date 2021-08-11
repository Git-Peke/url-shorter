<?php

class Core
{
    /**
     * summary
     */
    protected $controlador = "POST";
    public function __construct()
    {
    	if (file_exists(RUTA_APP."controllers/".ucwords(strtolower($_SERVER['REQUEST_METHOD'])).".php")) {
    		$this->controlador = ucwords(strtolower($_SERVER['REQUEST_METHOD']));
    		require_once RUTA_APP."controllers/".$this->controlador.".php";
    		$this->controlador = new $this->controlador;

    	}
    	else {
    		echo '{ "error":"ilegal-method"}';
    		require_once RUTA_APP."controllers/Post.php";
    	}
    }
}