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
class Entrada_salida extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function index_get($id = 0)
    {
        // En caso de recuperar una Entrada_salida especifica
        if (!empty($id)) {
            $data = $this->db->get_where("entrada_salida", ['IdEntrada' => $id])->row_array();
        }
        // recuperar todas las entrada_salida
        else {
            $data = $this->db->get("entrada_salida")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert("entrada_salida", $input);
        $this->response(['Entrada/salida agregada'], REST_Controller::HTTP_OK);
    }
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update("entrada_salida", $input, array("IdEntrada" => $id));
        $this->response(['Entrada/salida actualizada'], REST_Controller::HTTP_OK);
    }
    public function index_delete($id)
    {
        $this->db->delete("entrada_salida", array("IdEntrada" => $id));
        $this->response(['Entrada/salida eliminada'], REST_Controller::HTTP_OK);
    }

}