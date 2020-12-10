<?php

class Subcategorias extends CI_Model {

    public $subcategoria_id;
    public $subcategoria_idcategoria;
    public $subcategoria_nombre;
    public $subcategoria_activo; 


    public function existe($subcategoria_nombre){
        $this->db->where('subcategoria_nombre',$subcategoria_nombre);
        $query=$this->db->get('Subcategoria');
             
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function read(){
        $query = $this->db->get_where('Subcategoria',array("subcategoria_activo" => "1"));
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        return null;
    }

    public function read_idcategoria($subcategoria_idcategoria){
        $query = $this->db->get_where('Subcategoria',array("subcategoria_activo" => "1","subcategoria_idcategoria" => $subcategoria_idcategoria));
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        return null;
    }

    public function create(){
        if(!$this->existe($this->subcategoria_nombre)){
            if($this->subcategoria_nombre != ""){
                return false;
            }
            if($this->db->insert('Subcategoria',$this)){
                return true;
            } 
                
        }
        return false;
    }

    public function update(){
        $this->db->update('Subcategoria', $this, array('Subcategoria' => $this->subcategoria_nombre));
    }

    public function delete() {
        $this->db->delete('Subcategoria', array('Subcategoria' => $this->subcategoria_nombre));
    }

}
