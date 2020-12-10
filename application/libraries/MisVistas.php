<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

class MisVistas {

	private $CI;
 
	public function __construct()
	{
		$this->CI = get_instance();
	} 
	

   	/*Gestiona las diferentes views que debe mostrar*/
	public function vista($param1 = null,$param2 = null){
		//Cargo las vistas comunes
		$this->CI->load->view('common/_head');
		$this->CI->load->view('common/_navlist',$this->cargarmenu());

		if(isset($param1)){
			switch ($param1) {
				case "producto":
					if(isset($param2)){
						$this->CI->load->view('productos',$this->cargarproductos($param2)); 
					}else{
						$this->CI->load->view('productos',$this->cargarproductos());
					}
					break;
				case "login":
					$this->CI->load->view('login');
					break;
				case "registro":
					$this->CI->load->view('registro');
					break;
				case "admin":
					$this->CI->load->view('admin');
					break;
				case "perfil":
					if (isset($_SESSION["rol"])) {
						$this->CI->load->view('productos',$this->cargarproductos()); //Falta por hacer
					}else{
						$this->CI->load->view('login');
					}
					break;
				case "pedidos":
					if (isset($_SESSION["rol"])) {
						$this->CI->load->view('productos',$this->cargarproductos()); //Falta por hacer
					}else{
						$this->load->view('login');
					}
					break;	
				default: //cargar vista productos
					$this->CI->load->view('productos',$this->cargarproductos());
			}
		}else{
			$this->CI->load->view('productos',$this->cargarproductos());
		}
		$this->CI->load->view('common/_footer');
	}

   	/*----Compruebo el estado de la session---*/ 
	public function session(){
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
	private function cargarmenu(){
		
		$datos_navlist = array();
		$this->CI->load->model('Categorias');
		$mod_categorias = new Categorias();

		$datos_navlist['Categorias'] = $mod_categorias->read();
		if (isset($datos_navlist['Categorias'])) {
			for ($i=0; $i<count($datos_navlist['Categorias']); $i++) {
				$datos_navlist['Categorias'][$i]['Subcategorias'] = $mod_categorias->read_Subcategoria($datos_navlist['Categorias'][$i]['categoria_id']);
			}
		}	
		return $datos_navlist;
	}

	/*----Cagos la lista de productos----*/
	private function cargarproductos($param1 = null){
		$datos_productos = array();
		$this->CI->load->model('Productos');
		$mod_productos = new Productos();

		if(isset($param1)){
			$datos_categorias = array();
			$datosProductosTemp = array();
			$this->CI->load->model('Categorias');
			$mod_categorias = new Categorias();
			
			/*Busco si tengo algun producto en la categoria seleccionada*/
			$productos_categoria = $mod_productos->read_Categoria($param1);
			if(isset($productos_categoria))
				$datosProductosTemp +=$productos_categoria;
	
			/*Calculo si tiene categorias descendientes y sus productos*/
			$datos_categorias = $mod_categorias->calcular_descendencia($param1);
			if(isset($datos_categorias))
			foreach($datos_categorias as $categoria){
				$productos_categoria = $mod_productos->read_Categoria($categoria["categoria_id"]);
			    if(isset($productos_categoria))
					array_merge($datosProductosTemp, $productos_categoria);
			}

			if(isset($datosProductosTemp))
			$datos_productos['Productos'] = $datosProductosTemp;
		}else{
			$datos_productos['Productos'] = $mod_productos->read_all();
		}
		return $datos_productos; 	
	}
}

?>