<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function cargar_archivo() {

        $mi_archivo = $this->input->post('mi_archivo');;
        $config['upload_path'] = "img/Pru/";
        $config['file_name'] = "nombre_archivo";
        //$config['overwrite'] = FALSE; 
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        echo "Mi archivo:" . $mi_archivo;
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
    }
}
?>