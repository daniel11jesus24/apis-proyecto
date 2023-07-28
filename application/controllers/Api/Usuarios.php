<?php

require APPPATH . 'libraries/REST_Controller.php';

class Usuarios extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        // En caso de recuperar un categoria especifica
        if (!empty($id)) {
            $data = $this->db->get_where("usuarios", ['id_usuarios'=>$id])->row_array();
        }
        // recuperar todas las categorias
        else{
            $data = $this->db->get("usuarios")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("usuarios", $input);
        $this->response(['Usuarios agregada'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("Usuarios", $input, array("id_usuarios" => $id));
        $this->response(['Usuarios actualizada'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("usuarios", array("id_usuarios" => $id));
        $this->response(['Usuarios eliminada'], REST_Controller::HTTP_OK);
    }

}