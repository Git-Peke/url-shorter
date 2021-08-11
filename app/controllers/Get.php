<?php 

class Get extends Controller
{
    protected $viewActual = "inicio";
    public function __construct()
    {
        if (isset($_GET['url'])) {
        $this->viewActual = $_GET['url'];
        $status = $this->view($this->viewActual);  

            if ($status !== "ok")
            {
                $this->model = $this->modelo("getURL");
                if ($this->model->getURL($_GET['url']) !== "model-no")
                {


                    $datos = $this->model->getURL($_GET['url']);
                    $datos = [
                        'url' => $datos];
                    $this->redirect($datos);
                    $this->model->lastJoin($_GET['url']);

                }
                else{
                    require_once RUTA_APP."view/404.php";
                }
                
            
            } 
            
        }
        else {
        require_once RUTA_APP."view/inicio.php";
        }
    }
}