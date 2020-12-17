<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index($param1=null){
        $misvistas = $this->load->library('MisVistas');
		if(isset($misvistas)){
			$this->misvistas->vista($param1);
		}
    }

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
                $_SESSION["user_email"]= $usuario->usuario_email;

                redirect('/','refresh');   
            }else{
                $this->logout();
                
            }
        }
    }

    public function chekdireccion(){
        $this->session();
        $this->load->model('Direcciones');
        $direccion = new Direcciones(); 
        $misvistas = $this->load->library('MisVistas');
        $this->load->model('Usuarios');
        $usuario = new Usuarios(); 

        //Valido los datos del formulario
        $this->form_validation->set_rules('calle', 'Calle', 'required|min_length[3]|max_length[60]|callback_form_alpha_dash_space');
        $this->form_validation->set_rules('numero', 'Numero', 'required|min_length[1]|numeric|is_natural');
        $this->form_validation->set_rules('localidad', 'Localidad', 'required|min_length[3]|max_length[60]|callback_form_alpha_dash_space');
        $this->form_validation->set_rules('provincia', 'Provincia', 'required|min_length[3]|max_length[60]|callback_form_alpha_dash_space');
        $this->form_validation->set_rules('cPostal', 'Codigo Postal', 'required|exact_length[5]|numeric|is_natural');
     
        //Si no supero la validacion vuelvo al formulario de registro
        if ($this->form_validation->run() == true) {
            $calle = $this->input->post('calle');
            $numero = $this->input->post('numero');
            $localidad = $this->input->post('localidad');
            $provincia = $this->input->post('provincia');
            $cPostal = $this->input->post('cPostal');

            if (isset($calle,$localidad,$provincia,$cPostal,$numero))
                if (!empty($calle) && !empty($localidad) && !empty($provincia) && !empty($cPostal) && !empty($numero)){
                    $direccion->direccion_usuarioid = $usuario->get_id($_SESSION["user_email"]);
                    $direccion->direccion_direccion = "C\\".$calle ." Nº" .$numero. " ". $localidad ." (". $provincia .") C.P:". $cPostal;

                    if($direccion->create()){
                        redirect('/miperfil','refresh');
                    }
                }
        }
 
        if(isset($misvistas)) {
            $this->misvistas->vista('direccion');
        }
    }

    public function delete_direccion($param1 = null){
        $this->session();
        $misvistas = $this->load->library('MisVistas');
        $this->load->model('Usuarios');
        $usuario = new Usuarios();
        $this->load->model('Direcciones');
        $direccion = new Direcciones(); 

        if(isset($param1) && isset($_SESSION["user_email"])){
            $usuario->read($_SESSION["user_email"]);
            if($usuario->existe($_SESSION["user_email"])){
                /*Compruebo que la direccion coresponde con el usuario logeado*/
                if($direccion->read($param1) && ($usuario->usuario_id==$direccion->direccion_usuarioid)){
                    $direccion->delete();
                    redirect('/miperfil','refresh');
                }
            }    
        }
        if(isset($misvistas))
            $this->misvistas->vista('login');
    }

    public function chekinscripcion(){
        $this->session();
        $this->load->model('Usuarios');
        $usuario = new Usuarios(); 
        $misvistas = $this->load->library('MisVistas');

        //Valido los datos del formulario
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[30]|callback_form_alpha_dash_space');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|min_length[3]|max_length[60]|callback_form_alpha_dash_space');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[pass2]|callback_form_validate_passwd');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|min_length[9]|max_length[12]|numeric');
        $this->form_validation->set_rules('pass2', 'Confirmar Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.usuario_email]');

        //Si no supero la validacion vuelvo al formulario de registro
        if ($this->form_validation->run() == true) {
            $nombre = $this->input->post('nombre');
            $apellidos = $this->input->post('apellidos');
            $email = $this->input->post('email');
            $telefono = $this->input->post('telefono');
            $password = $this->input->post('password');

            if (isset($email,$password,$nombre,$apellidos,$telefono))
                if (!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($password)){
                    $usuario->usuario_nombre = $nombre;
                    $usuario->usuario_apellidos = $apellidos;
                    $usuario->usuario_email = $email;
                    $usuario->usuario_password = $password;
                    $usuario->usuario_telefono = $telefono;
                                
                    if($usuario->create()){
                        $_SESSION["rol"] = $usuario->rol();
                        $_SESSION["user_name"]= $nombre;
                        $_SESSION["user_email"]= $email;
                        redirect('/','refresh');  
                    }
                }
        }
        if(isset($misvistas)) {
            $this->misvistas->vista('registro');
        }  
    }
    
    public function usuarioUpdate() {
        $this->session();
        if (isset($_SESSION["user_email"])) {
            $misvistas = $this->load->library('MisVistas');
			/*Cargo los datos del usuario*/
			$this->load->model('Usuarios');
			$usuario = new Usuarios();
            $usuario->read($_SESSION["user_email"]);

    
            //Valido los datos del formulario
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[30]|callback_form_alpha_dash_space');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|min_length[3]|max_length[60]|callback_form_alpha_dash_space');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|min_length[9]|max_length[12]|numeric');
            $email = $this->input->post('email');
            if(isset($email) && !empty($email) && $email!=$_SESSION["user_email"]) //Si el usuario cambia su email, valido el nuevo email
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.usuario_email]');

            $password = $this->input->post('password');
            if(isset($password) && !empty($password)){ //Si el usuario ha introducido una contraseña, se valida la contraseña.   
                $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[pass2]|callback_form_validate_passwd');    
                $this->form_validation->set_rules('pass2', 'Confirmar contraseña', 'required');   
            }


            //Si supero la validacion vuelvo al formulario de perfil
            if ($this->form_validation->run() == TRUE) {
                $nombre = $this->input->post('nombre');
                $apellidos = $this->input->post('apellidos');
                $email = $this->input->post('email');
                $telefono = $this->input->post('telefono');
                $password = $this->input->post('password');
    
                if (isset($email,$nombre,$apellidos,$telefono))
                    if (!empty($nombre) && !empty($apellidos) && !empty($email)){
                        $usuario->usuario_nombre = $nombre;
                        $usuario->usuario_apellidos = $apellidos;
                        $usuario->usuario_email = $email;
                        $usuario->usuario_telefono = $telefono;
                        if(isset($password) && !empty($password)) //Si el usuario cambia la contraseña, creo el hash de la nueva contraseña.
                        $usuario->usuario_password = password_hash($password, PASSWORD_DEFAULT);
                          
                        //Si todo a salido bien, actualizo los datos del usuario
                        $usuario->update($_SESSION["user_email"]);
                        
                        $_SESSION["user_email"]=$email;
                        $_SESSION["user_name"]= $nombre;  
                    }
                    
            }   
            if(isset($misvistas))
                    $this->misvistas->vista('perfil');   
        }  
    }
    

    // public function pedidos(){
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

    public function form_validate_passwd($password) {
        $regex = '(?=.*\d)'; //Debe de terner un numero
        //$regex = '(?=.*[a-z])'; //Debe tener una letra minuscula
        //$regex .= '(?=.*[A-Z])'; //Debe tener una letra mayuscula
        //$regex .= '(?=.*[?¿!¡.,$%&"+:;-_*])'; //Debe tener un caracter especial
        $regex .= '(?!.*\s)'; //No se permite espacios en blanco
        // No backslash, apostrophe or quote chars are allowed
        $regex .= '(?!.*[\\\\\'"])';
    
        if (preg_match('/^' . $regex . '.*$/', $password)) {
            return TRUE;
        }
        return FALSE;
    }

    public function form_alpha_dash_space($str) { 
        return (! preg_match('/^[a-zA-Z\sñ]+$/', $str)) ? FALSE : TRUE; 
    } 
}
?>