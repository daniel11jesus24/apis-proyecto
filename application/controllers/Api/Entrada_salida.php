<?php

require APPPATH . 'libraries/REST_Controller.php';

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
        $this->response(['Entrada_salida agregada'], REST_Controller::HTTP_OK);
    }
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update("entrada_salida", $input, array("IdEntrada" => $id));
        $this->response(['Entrada_salida actualizada'], REST_Controller::HTTP_OK);
    }
    public function index_delete($id)
    {
        $this->db->delete("entrada_salida", array("IdEntrada" => $id));
        $this->response(['Entrada_salida eliminada'], REST_Controller::HTTP_OK);
    }

}