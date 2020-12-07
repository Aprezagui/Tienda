<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	

	public function index()	{
		session_start();
		$admin = false;


		//Compruebo si tengo el perfil de adminitrador cualquier otro
		if (isset($_SESSION["rol"])) {
			if($_SESSION["rol"]=="ADMINISTRADOR"){
				$admin = true;	
	  		}
		}

		$datos_navlist = array();
		$this->load->model('Categorias');
		$mod_categorias = new Categorias();
		$datos_navlist['Categorias'] = $mod_categorias->read();

		//Cargo las vistas comunes
		$this->load->view('common/_head');
		$this->load->view('common/_navlist',$datos_navlist);

		//$this->load->view('common/_aside');

		$this->load->view('index');

		$this->load->view('common/_footer');

		//$datos = array();

		//$this->load->model('Usuarios');

		//$usuarios = new Usuarios();

		//$datos['Usuarios'] = $usuarios->existe("user");
		//$this->load->view('index');
	}

}
?>