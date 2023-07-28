<?php

require APPPATH . 'libraries/REST_Controller.php';

class Productos extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        // En caso de recuperar un producto especifico
        if (!empty($id)) {
            $data = $this->db->get_where("producto", ['id_producto'=>$id])->row_array();
        }
        // recuperar todos los producto
        else{
            $data = $this->db->get("producto")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("producto", $input);
        $this->response(['Producto agregado'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("producto", $input, array("id_producto" => $id));
        $this->response(['Producto actualizado'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("producto", array("id_producto" => $id));
        $this->response(['Producto eliminado'], REST_Controller::HTTP_OK);
    }

}