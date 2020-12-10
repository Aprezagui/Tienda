<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	/*Gestiona las diferentes views que debe mostrar*/
	// public function vista($param1 = null){
	// 	//$this->load->helper('url');
	// 	//Cargo las vistas comunes
	// 	$this->load->view('common/_head');
	// 	$this->load->view('common/_navlist',$this->cargarmenu());

	// 	if(isset($param1)){
	// 		switch ($param1) {
	// 			case "login":
	// 				$this->load->view('login');
	// 				break;
	// 			case "registro":
	// 				$this->load->view('registro');
	// 				break;
	// 			case "admin":
	// 				$this->load->view('admin');
	// 				break;
	// 			case "perfil":
	// 				if (isset($_SESSION["rol"])) {
	// 					$this->load->view('productos',$this->cargarproductos()); //Falta por hacer
	// 				}else{
	// 					$this->load->view('login');
	// 				}
	// 				break;
	// 			case "pedidos":
	// 				if (isset($_SESSION["rol"])) {
	// 					$this->load->view('productos',$this->cargarproductos()); //Falta por hacer
	// 				}else{
	// 					$this->load->view('login');
	// 				}
	// 				break;	
	// 			default: //cargar vista productos
	// 				$this->load->view('productos',$this->cargarproductos());
	// 		}
	// 	}else{
	// 		$this->load->view('productos',$this->cargarproductos());
	// 	}
	// 	$this->load->view('common/_footer');
	// }	
	public function producto($param1 = null){
		$misvistas = $this->load->library('MisVistas');
		if(isset($misvistas)){
			//echo "Funcion Productos: parametro1 =".$param1;
			$this->misvistas->vista('producto',$param1);
		}
	}

	public function index()	{
		
		$misvistas = $this->load->library('MisVistas');
		if(isset($misvistas)){
			$this->misvistas->session();
		}

		//$this->session();
		//$admin = false;
		//Compruebo si tengo el perfil de adminitrador cualquier otro
		//if (isset($_SESSION["rol"])) {
		//	if($_SESSION["rol"]=="ADMINISTRADOR"){
		//		$admin = true;	
	  	//	}
		//}

		//$misvistas = $this->load->library('MisVistas');
		$this->misvistas->vista();

		//$this->vista();

		//$datos_navlist = array();
		//$this->load->model('Categorias');
		//$mod_categorias = new Categorias();
		//$mod_categorias->calcular_descendencia(1);


	}

	/*----Compruebo el estado de la session---*/ 
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

	/*----Cagos los campos del menu----*/
	// private function cargarmenu(){
		
	// 	$datos_navlist = array();
	// 	$this->load->model('Categorias');
	// 	$mod_categorias = new Categorias();
		
	// 	$datos_navlist['Categorias'] = $mod_categorias->read();
	// 	if (isset($datos_navlist['Categorias'])) {
	// 		for ($i=0; $i<count($datos_navlist['Categorias']); $i++) {
	// 			$datos_navlist['Categorias'][$i]['Subcategorias'] = $mod_categorias->read_Subcategoria($datos_navlist['Categorias'][$i]['categoria_id']);
	// 		}
	// 	}	
	// 	return $datos_navlist;
	// }

	/*----Cagos la lista de productos----*/
	// private function cargarproductos(){
	// 	$datos_productos = array();
	// 	$this->load->model('Productos');
	// 	$mod_productos = new Productos();
	// 	$datos_productos['Productos'] = $mod_productos->read_all();
	// 	return $datos_productos; 	
	// }

}
?>