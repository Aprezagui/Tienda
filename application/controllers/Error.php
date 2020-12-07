<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
    public function index(){
        echo "controlador de error:";
		$message = "error o algo parecido";
		$this->load->view('error_404',$message);

    }

}


?>