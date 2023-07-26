<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mimodelo');
        $this->load->helper('url');
    }

    public function bienvenida()
	{
		$this->load->view('Productos/bienvenida_view');
	}

    public function listaEntrada_salida() {
        
        $entrada_salida = $this->Mimodelo->getEntrada_salida();

        $data = array(
            'entrada_salida'    =>  $entrada_salida,
        );

        $this->load->view('Productos/entrada_salida_view', $data);

    }

    public function insertarEntrada_salida() {
        $valores = array(
            'Fecha_entrada'    => $this->input->post('Fecha_entrada'),
            'Fecha_salida' => $this->input->post('Fecha_salida'),
            'IdProducto'   =>   $this->input->post('IdProducto'),
        );
        $this->Mimodelo->addEntrada_salida($valores);
    }

    public function insertar_entrada_salida() {
        $this->load->view('Productos/insertar_entrada_salida_view');
    }

    public function eliminarentrada_salida() {
        $id = $this->uri->segment(2);
        $this->Mimodelo->lessentrada_salida($id);
        redirect(base_url('index.php/Productos/listaEntrada_salida'));
    }

    public function actualizarentrada_salida() {
        $id = $this->uri->segment(2);
        $entrada_salida = $this->Mimodelo->getEntrada_salida($id);
        $entrada_salida = ( $entrada_salida!=false ) ?  $entrada_salida->row(0) : false; 
        $data = array(
            'entrada_salida' =>  $entrada_salida,
        );

        $this->load->view('Productos/actualizar_entrada_salida_view', $data);
    }

}