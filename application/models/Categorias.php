<?php

class Categorias extends CI_Model {

    public $categoria_id;
    public $categoria_nombre;
    public $categoria_activo;


    public function existe($categoria_nombre){
        $this->db->where('categoria_nombre',$categoria_nombre);
        $query=$this->db->get('Categoria');
             
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function read(){
        $query = $this->db->get_where('Categorias',array("categoria_activo" => "1"));
        $query = $this->db->get('Categorias');
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        return null;
    }

    public function create(){
        if(!$this->existe($this->categoria_nombre)){
            if($this->usuario_nombre != ""){
                return false;
            }
            if($this->db->insert('Categoria',$this)){
                return true;
            } 
                
        }
        return false;
    }

    public function update(){
        $this->db->update('Categoria', $this, array('Categoria' => $this->$categoria_nombre));
    }

    public function delete() {
        $this->db->delete('Categoria', array('Categoria' => $this-$categoria_nombre));
    }

}
