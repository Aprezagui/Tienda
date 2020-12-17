<?php

class Categorias extends CI_Model {

    public $categoria_id;
    public $categoria_nombre;
    public $categoria_activo;
    public $categoria_idpadre;


    public function existe($categoria_nombre){
        $this->db->where('categoria_nombre',$categoria_nombre);
        $query=$this->db->get('Categoria');
             
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function get_nombre($categoria_id){
        $query = $this->db->get_where('Categorias',array("categoria_activo" => "1","categoria_id" => $categoria_id));
        $row = $query->row();
        if(isset($row)){
            return $row->categoria_nombre;
        }
        return null;
    
    }

    public function read(){
        $query = $this->db->get_where('Categorias',array("categoria_activo" => "1","categoria_idpadre" => "0"));
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        return null;
    }

    public function calcular_descendencia($categoria_id){
        $query = $this->db->get_where('Categorias',array("categoria_idpadre" => $categoria_id ,"categoria_activo" => "1"));
        if ($query->num_rows() > 0){
            $resul = $query->result_array();
            $array_resul = array();
            foreach($resul as $categoria){
                if(isset($categoria['categoria_idpadre'])){
                    $resul_temp = $this->calcular_descendencia($categoria['categoria_id']);
                    if(isset($resul_temp) && $resul_temp != null ){
                        $array_resul = array_merge($array_resul,$resul_temp);  
                    }
                    array_push($array_resul,$categoria);
                }
            }
            return $array_resul;
        }
        return null;          
    }

    public function read_Subcategoria($categoria_id){
        $query = $this->db->get_where('Categorias',array("categoria_activo" => "1","categoria_idpadre" => $categoria_id));
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
        $this->db->update('Categoria', $this, array('Categoria' => $this->categoria_nombre));
    }

    public function delete() {
        $this->db->delete('Categoria', array('Categoria' => $this-categoria_nombre));
    }

}
