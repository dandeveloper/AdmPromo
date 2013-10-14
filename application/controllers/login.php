<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('home');
    }

    public function validar() {
        $this->load->model('usuarios_model');
        $usuario = $this->input->post('login');
        $senha = $this->input->post('senha');
        $validar = $this->usuarios_model->validar_login($usuario, $senha);
        if (!$validar) {
            $this->session->set_flashdata('validarerro', 'Não foi Possível Efetuar o Login!');
            redirect(base_url('index.php/login'));            
        } else {
            $newdata = array(
                'usuario' => $usuario,
                'senha' => $senha,
                'logado' => TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url('index.php/inscritos'));
        }
    }

    public function logoff() {
        $this->session->sess_destroy();
        redirect(base_url('index.php/login'));
    }

}