<?php

require APPPATH . 'libraries/REST_Controller.php';


// Permitir el acceso desde cualquier origen (*)
header("Access-Control-Allow-Origin: *");

// Permitir las siguientes cabeceras HTTP
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// Permitir las siguientes solicitudes HTTP
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
class Productos extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        // En caso de recuperar un producto especifico
        if (!empty($id)) {
            $data = $this->db->get_where("productos", ['IdProducto'=>$id])->row_array();
        }
        // recuperar todos los producto
        else{
            $data = $this->db->get("productos")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("productos", $input);
        $this->response(['Producto agregado'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("productos", $input, array("IdProducto" => $id));
        $this->response(['Producto actualizado'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("productos", array("IdProducto" => $id));
        $this->response(['Producto eliminado'], REST_Controller::HTTP_OK);
    }

}