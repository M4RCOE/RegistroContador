<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {


	public function index()
	{
		if($this->session->has_userdata('user')){
			$data['users_servicio'] = $this->users_servicio_model->obtener_users();
			$this->load->view('layout/header');
			$this->load->view('body',$data);
			$this->load->view('layout/footer');
		}else{
			$this->load->view('login_view');
		}
	}

	public function guarda_contador(){
		if(! $this->session->has_userdata('user')){
            redirect('user_controller/login');
        }
		$datos = array(
			'nombre' => $this->input->post('nombre'),
			'fecha' => $this->input->post('fecha'),
			'tiempo' => $this->input->post('tiempo')
		);
		$this->contador_model->guarda_contador($datos);
		redirect('controlador/index');
	}

	public function guarda_contador2(){
		if(! $this->session->has_userdata('user')){
            redirect('user_controller/login');
        }
		$datos = array(
			'nombre' => $_POST['nombre'],
        	'tiempo' => $_POST['tiempo'],
        	'fecha' => $_POST['fecha'],
        	'tiempoinicial' => $_POST['tiempoinicial'],
        	'tiempofinal' => $_POST['tiempofinal']
		);
		$this->contador_model->guarda_contador($datos);
	}


}
