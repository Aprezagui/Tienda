<?php

class Usuarios extends CI_Model {

    public $usuario_id;
    public $usuario_nombre;
    public $usuario_apellidos;
    public $usuario_password;
    public $usuario_date;
    public $usuario_email;
    public $usuario_telefono;
    public $usuario_activo;
    public $usuario_usergroup;


    public function login($usuario_email, $usuario_password){   
        if($this->read($usuario_email)){
            if(isset($this->usuario_activo) && isset($this->usuario_password))
            if($this->usuario_activo == 1){
                if(password_verify( $usuario_password , $this->usuario_password ))
                    return true;
                
                if($usuario_password == $this->usuario_password) /*Contraseña en claro... PRUEBAS */ 
                return true;
            }
        }   
            return false;
    }

    public function existe($usuario_email){
        $query = $this->db->get_where('Usuarios',array("usuario_email" => $usuario_email));
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function create(){
        if(!$this->existe($this->usuario_email)){
            if(isset($this->usuario_nombre) && $this->usuario_nombre == "")                
                return false;
            if(isset($this->usuario_apellidos) && $this->usuario_apellidos == "")
                return false;           
            if(isset($this->usuario_password) && $this->usuario_password ==""){
                return false;
            }else{
                $this->usuario_password = password_hash($this->usuario_password, PASSWORD_DEFAULT);
            }
            if(isset($this->usuario_email) && $this->usuario_email =="")
                return false;
        
            $this->usuario_activo = true;
            $this->usuario_usergroup = 1;
   
            $data  =  array ( 
                'usuario_nombre'  =>  $this->usuario_nombre , 
                'usuario_apellidos'  =>  $this->usuario_apellidos , 
                'usuario_password'  =>  $this->usuario_password,
                'usuario_email'  => $this->usuario_email, 
                'usuario_telefono' => $this->usuario_telefono,
                'usuario_activo'    => $this->usuario_activo,
                'usuario_usergroup' => $this->usuario_usergroup
            ); 

            if($this->db->insert('Usuarios',$data))
                return true;
        } 
            return false;
    }


    public function read($usuario_email){
        $query = $this->db->get_where('Usuarios',array("usuario_activo" => "1", 'usuario_email' =>$usuario_email));

        $row = $query->row();
        if ($query->num_rows() == 1){ 
           $this->usuario_id = $row->usuario_id;
           $this->usuario_nombre = $row->usuario_nombre;
           $this->usuario_apellidos = $row->usuario_apellidos;
           $this->usuario_password = $row->usuario_password;
           $this->usuario_date = $row->usuario_date;
           $this->usuario_email = $row->usuario_email;
           $this->usuario_telefono = $row->usuario_telefono;
           $this->usuario_activo = $row->usuario_activo;
           $this->usuario_usergroup = $row->usuario_usergroup;
           return true;
        }
        return false;
    }

    public function get_usuario($usuario_email){
        if(isset($usuario_email)){
            $query = $this->db->get_where('Usuarios',array('usuario_email' => $usuario_email));
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
        }
        return null;
    }

    public function get_id($usuario_email){
        if(isset($usuario_email)){
            $this-> read($usuario_email);
            return $this->usuario_id;
        }
        return null;
    }

    public function rol(){
        switch ($this->usuario_usergroup) {
            case 2:
                return "ADMINISTRADOR";
                break;
            default:
                return "CLIENTE";
                break;
    }

    }
    public function update($usuario_email){
        if(isset($usuario_email))
        $this->db->update('Usuarios', $this, array('usuario_email' => $usuario_email));
    }

    public function delete() {
        $this->db->delete('Usuarios', array('usuario_email' => $this->usuario_email));
    }

}
?>