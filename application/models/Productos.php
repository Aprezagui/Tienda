<?php

class Productos extends CI_Model {

    public $producto_id;
    public $producto_nombre;
    public $producto_descricion; 
    public $producto_precio;
    public $producto_stock;
    public $producto_descuento;
    public $producto_activo;
    public $producto_img;
    public $producto_categoria;

    public function existe($producto_id){
        $this->db->where('producto_id',$producto_id);
        $query=$this->db->get('Productos');
             
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function insert(){
        $this->db->insert('Productos',$this);
    }

    public function read($producto_id){
        $query = $this->db->get_where('Productos',$producto_id);
        $row = $query->row();
        if ($query->num_rows() == 1){
            $this->producto_id = $row->producto_id; 
            $this->producto_nombre = $row->producto_nombre;
            $this->producto_descricion = $row->producto_descricion; 
            $this->producto_precio = $row->producto_precio;
            $this->producto_stock = $row->producto_stock;
            $this->producto_descuento = $row->producto_descuento;
            $this->producto_activo = $row->producto_activo;
            $this->producto_img = $row->producto_img;
            $this->producto_categoria = $row->producto_categoria;
        }
    }

    public function read_Categoria($producto_categoria){
        if(isset($producto_categoria)){
            $query = $this->db->get_where('Productos',array("producto_activo" => "1","producto_categoria" =>$producto_categoria));
            if ($query->num_rows() > 0){
                return $query->result_array();
            }
        }
        return null;
    }


    public function read_all(){
        $query = $this->db->get_where('Productos',array("producto_activo" => "1"));
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        return null;
    }


    public function update(){
        //$this->db->update('Productos', $this, array('Productos' => $this->user));
    }

    public function delete() {
        $this->db->delete('Productos', array('producto_id' => $this->producto_id));
    }

}
?>