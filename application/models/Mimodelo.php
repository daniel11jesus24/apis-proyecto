<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mimodelo extends CI_Model {

    // Constructor
    public function __construct() {
        $this->load->database();
    }    

    public function getEntrada_salida($id=false) {
        // select * from Entrada_salida;
        if ($id!=false) {
            $this->db->where('IdEntrada', $id);
        }
        $resultado = $this->db->get('entrada_salida');
        if ($resultado->num_rows()>0)
            return $resultado;
        else
            return false;
    }

    public function addEntrada_salida($valores) {
        // insert into Entrada_salida values (...);
        $this->db->insert('entrada_salida', $valores);
    }

    public function lessEntrada_salida($id) {
        // delete
        $this->db->where('IdEntrada', $id);
        $this->db->delete('entrada_salida');
    }

    public function updateEntrada_salida($id, $data) {
        //actualizar
        $this->db->where('IdEntrada', $id);
        $this->db->update('entrada_salida', $data);
    }

}