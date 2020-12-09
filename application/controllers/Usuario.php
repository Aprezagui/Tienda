<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function cheklogin(){
        $this->session();
        $this->load->model('Usuarios');
        $usuario = new Usuarios();
       

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (isset($email) && isset($password) && !empty($email) && !empty($password)) { 
            
            if($usuario->login($email,$password)) {
                $_SESSION["rol"] = $usuario->rol();
                $_SESSION["user_name"]= $usuario->usuario_nombre;
                redirect('/','refresh');   
            }else{
                $this->logout();
                
            }
        }
    }

    public function login()	{
        $this->session();

        //Carga las vistas principales y login
		$datos_navlist = array();
		$this->load->model('Categorias');
		$mod_categorias = new Categorias();
		$datos_navlist['Categorias'] = $mod_categorias->read();
    	$this->load->view('common/_head');
		$this->load->view('common/_navlist',$datos_navlist);
		$this->load->view('login');
		$this->load->view('common/_footer');

    } 

    public function inscripcion(){
        $this->session();

        //Carga las vistas principales
		$datos_navlist = array();
		$this->load->model('Categorias');
		$mod_categorias = new Categorias();
		$datos_navlist['Categorias'] = $mod_categorias->read();
    	$this->load->view('common/_head');
        $this->load->view('common/_navlist',$datos_navlist);
        //Cargo vista Inscripcion
		$this->load->view('registro');
		$this->load->view('common/_footer');
    }

    public function chekinscripcion(){
        $this->session();
        $this->load->model('Usuarios');
        $usuario = new Usuarios(); 

        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        
        if (isset($email) && isset($password) && !empty($email) && !empty($password))
            
            if (isset($nombre) && isset($apellidos) && !empty($nombre) && !empty($apellidos)){
                $usuario->usuario_nombre = $nombre;
                $usuario->usuario_apellidos = $apellidos;
                $usuario->usuario_email = $email;
                $usuario->usuario_password = $password;
                             
                if($usuario->create()){
                    $_SESSION["rol"] = $usuario->rol();
                    $_SESSION["user_name"]= $nombre;
                    redirect('/','refresh');  
                }
            }
    }
    
    public function perfil(){
        $this->session();

        if (isset($_SESSION["rol"])) {
            echo "sesion iniciada";
        }else{
            $this->login();
        }
    }

    public function pedidos(){
        $this->session();

        if (isset($_SESSION["rol"])) {
            echo "sesion iniciada";
        }else{
            $this->login();
        }
    }

    public function logout(){
        $this->session();

        session_unset();
        session_destroy();
        session_write_close();
        redirect('/','refresh');
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