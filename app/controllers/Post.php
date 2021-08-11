<?php 

class Post extends Controller
{
    public function __construct()
    {
    	if (isset($_POST['url'])) {
    	
            $this->model = $this->modelo("addURL");
            $this->model->checkURL($_POST['url']);

    	}
    	else {
    		echo 'ERROR';
    	}
    }

}