<?php

class Direcciones extends CI_Model {

    public $direccion_id;
    public $direccion_usuarioid;
    public $direccion_direccion;

    public function get_direccion($direccion_usuarioid){
        if(isset($direccion_usuarioid)){
            $query = $this->db->get_where('Direcciones',array('direccion_usuarioid' => $direccion_usuarioid));
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
        }
        return null;
    }

    public function create(){
        if(isset($this->direccion_usuarioid) && $this->direccion_usuarioid == "")
            return false;
        if(isset( $this->direccion_direccion) &&  $this->direccion_direccion == "")
            return false;

        $data  =  array ( 
            'direccion_usuarioid'  =>  $this->direccion_usuarioid , 
            'direccion_direccion'  =>  $this->direccion_direccion , 
        ); 

        if($this->db->insert('Direcciones',$data))
            return true;
        return false;    
    }
    
    public function read($direccion_id){
        if(isset($direccion_id)){
            $query = $this->db->get_where('Direcciones',array('direccion_id' =>$direccion_id));
            $row = $query->row();
            if ($query->num_rows() == 1){ 
            $this->direccion_id = $row->direccion_id;
            $this->direccion_usuarioid = $row->direccion_usuarioid;
            $this->direccion_direccion = $row->direccion_direccion;
        
            return true;
            }
        }
        return false;
    }

    public function update(){
        $this->db->update('Direcciones', $this, array('direccion_id' => $this->direccion_id));
    }
    
    public function delete() {
        $this->db->delete('Direcciones', array('direccion_id' => $this->direccion_id));
    }    

}
?>