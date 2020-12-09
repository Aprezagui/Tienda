<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	

	public function index()	{
		$this->session();
		$admin = false;


		//Compruebo si tengo el perfil de adminitrador cualquier otro
		if (isset($_SESSION["rol"])) {
			if($_SESSION["rol"]=="ADMINISTRADOR"){
				$admin = true;	
	  		}
		}


		//Cagos los datos del menu
		$datos_navlist = array();
		$this->load->model('Categorias');
		$mod_categorias = new Categorias();
		$datos_navlist['Categorias'] = $mod_categorias->read();

		//Cargo las vistas comunes
		$this->load->view('common/_head');
		$this->load->view('common/_navlist',$datos_navlist);

		//cargar vista productos
		$datos_productos = array();
		$this->load->model('Productos');
		$mod_productos = new Productos();
		$datos_productos['Productos'] = $mod_productos->read_all();


		$this->load->view('productos',$datos_productos);
	

		$this->load->view('common/_footer');

	}

	    //Compruebo el estado de la session 
		private function session(){
			switch (session_status()) {
				case PHP_SESSION_DISABLED:
					$this->logout();
					break;
				case PHP_SESSION_NONE:
					session_start();
					return true;
					break;
				case PHP_SESSION_ACTIVE:
					return true;
			}
			return false;
		}

}
?>