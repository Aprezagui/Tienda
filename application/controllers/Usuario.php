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

    // public function login(){} 

    // public function inscripcion(){}

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
    
    // public function perfil(){
    }

    // public function pedidos(){
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