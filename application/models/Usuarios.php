<?php

class Usuarios extends CI_Model {

    public $usuario_nombre;
    public $usuario_apellidos;
    public $usuario_password;
    public $usuario_date;
    public $usuario_email;
    public $usuario_activo;
    public $usuario_usergroup;


    public function login($usuario_email, $password){   
        if($this->existe($usuario_email)){
            $this->read($usuario_email);
            if($this->activo == true){
                if (password_verify ( $password , $this->password )){
                    return true;
                }
            }
        }   
            return false;
    }

    public function existe($usuario_email){
        $this->db->where('usuario_email',$usuario_email);
        $query=$this->db->get('Usuarios');
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function create(){
        if(!$this->existe($this->usuario_email)){
            if($this->usuario_nombre != ""){
                return false;
            }
            if($this->usuario_apellidos != ""){
                return false;
            }
            
            if($this->usuario_password !=""){
                return false;
            }else{
                $usuario_password = password_hash($this->usuario_password, PASSWORD_DEFAULT);
            }
            if($this->usuario_email !=""){
                return false;
            }
            $usuario_activo = true;
            $usuario_usergroup = 0;
        
            if($this->db->insert('Usuario',$this)){
                return true;
            }
        } 
            return false;
    }

    public function insert(){
        $this->db->insert('Usuario',$this);
    }

    public function read($usuario_email){
        $this->db->where('usuario_email',$usuario_email);
        $query=$this->db->get('Usuarios');
        $row = $query->row();
        if ($query->num_rows() == 1){
           $this->usuario_nombre = $row->usuario_nombre;
           $this->usuario_apellidos = $row->usuario_apellidos;
           $this->usuario_password = $row->usuario_password;
           $this->usuario_date = $row->usuario_date;
           $this->usuario_email = $row->usuario_email;
           $this->usuario_activo = $row->usuario_activo;
           $this->usuario_usergroup = $row->usuario_usergroup;
        }
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