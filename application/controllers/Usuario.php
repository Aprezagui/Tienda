<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index()	{
        session_start();
        $this->load->model('Usuarios');
        $usuario = new Usuarios();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (isset($email) && isset($password) && !empty($email) && !empty($password)) { 
            
            if($usuario->login($user,$password)) {
                $_SESSION["rol"] = $usuario->rol();
                redirect('/','refresh');   
            }else{
                $this->logout();
                
            }
        }
    }  

    public function login()	{
        session_start();
        $this->load->model('Usuarios');
        $usuario = new Usuarios();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (isset($email) && isset($password) && !empty($email) && !empty($password)) { 
            
            if($usuario->login($user,$password)) {
                $_SESSION["rol"] = $usuario->rol();
                redirect('/','refresh');   
            }else{
                $this->logout();
                
            }
        }
    } 

    public function registry(){
        $this->load->model('Usuarios');
        $usuario = new Usuarios(); 


        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (isset($email) && isset($password) && !empty($email) && !empty($password))
            if (isset($nombre) && isset($apellidos) && !empty($nombre) && !empty($apellids)){
                $usuario->usuario_nombre = $this->nombre;
                $usuario->usuario_apellidos = $this->apellidos;
                $usuario->usuario_email = $this->email;
                $usuario->usuario_nombre = $this->password;

                if($usuario->create()){
                    login();
                }
            }

    }
    
    public function logout(){
        session_start();

        session_unset();
        session_destroy();
        session_write_close();
        redirect('/','refresh');
    }
}
?>