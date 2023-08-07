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
class Categorias extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($IdCategoria=0){
        // En caso de recuperar un categoria especifica
        if (!empty($IdCategoria)) {
            $data = $this->db->get_where("categorias", ['IdCategoria'=>$IdCategoria])->row_array();
        }
        // recuperar todas las categorias
        else{
            $data = $this->db->get("categorias")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("categorias", $input);
        $this->response(['Categoria agregada'], REST_Controller::HTTP_OK);
    }

    public function index_put($IdCategoria){
        $input = $this->put();
        $this->db->update("categorias", $input, array("IdCategoria" => $IdCategoria));
        $this->response(['Categoria actualizada'], REST_Controller::HTTP_OK);
    }

    public function index_delete($IdCategoria){
        $this->db->delete("categorias", array("IdCategoria" => $IdCategoria));
        $this->response(['Categoria eliminada'], REST_Controller::HTTP_OK);
    }

}