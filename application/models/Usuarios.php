<?php

class Usuarios extends CI_Model {

    public $usuario_nombre;
    public $usuario_apellidos;
    public $usuario_password;
    public $usuario_date;
    public $usuario_email;
    public $usuario_activo;
    public $usuario_usergroup;


    public function login($usuario_email, $usuario_password){   
        if($this->read($usuario_email)){
            if(isset($this->usuario_activo) && isset($this->usuario_password))
            if($this->usuario_activo == 1){
                if (password_verify( $usuario_password , $this->usuario_password )){
                    return true;
                }
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
            if($this->usuario_nombre == "")                
                return false;
            if($this->usuario_apellidos == "")
                return false;
                        
            if($this->usuario_password ==""){
                return false;
            }else{
                $this->usuario_password = password_hash($this->usuario_password, PASSWORD_DEFAULT);
            }
            if($this->usuario_email =="")
                return false;
        
            $this->usuario_activo = true;
            $this->usuario_usergroup = 1;
   
            $data  =  array ( 
                'usuario_nombre'  =>  $this->usuario_nombre , 
                'usuario_apellidos'  =>  $this->usuario_apellidos , 
                'usuario_password'  =>  $this->usuario_password,
                'usuario_email'  => $this->usuario_email, 
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
           $this->usuario_nombre = $row->usuario_nombre;
           $this->usuario_apellidos = $row->usuario_apellidos;
           $this->usuario_password = $row->usuario_password;
           $this->usuario_date = $row->usuario_date;
           $this->usuario_email = $row->usuario_email;
           $this->usuario_activo = $row->usuario_activo;
           $this->usuario_usergroup = $row->usuario_usergroup;
           return true;
        }
        return false;
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
    public function update(){
        //$this->db->update('Usuarios', $this, array('Usuarios' => $this->user));
    }

    public function delete() {
        $this->db->delete('Usuarios', array('user' => $this->usuario_user));
    }

}
?>