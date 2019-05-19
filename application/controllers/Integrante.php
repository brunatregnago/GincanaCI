<?php

/**
 * @author b
 * 09/05/2019
 */
defined('BASEPATH')OR exit('No direct script access allowed');

class Integrante extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->LoginModel->verificaLogin();
        $this->load->model('IntegranteModel');
    }

    public function index() {
        $this->listaIntegrante();
    }

    public function listaIntegrante() {
        $data['integrante'] = $this->IntegranteModel->getAll();
        $this->load->view('Header');
        $this->load->view('ListaIntegrante', $data);
        $this->load->view('Footer');
    }

    public function cadastro() {
        $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('data_nascimento', 'data_nascimento', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->model('EquipeModel');
            $data['equipe'] = $this->EquipeModel->getAll();
            $this->load->view('Header');
            $this->load->view('FormIntegrante', $data);
            $this->load->view('Footer');
        } else {

            $data = array(
                'id_equipe' => $this->input->post('id_equipe'),
                'nome' => $this->input->post('nome'),
                'data_nascimento' => $this->input->post('data_nascimento'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf')
            );

            if ($this->IntegranteModel->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Integrante cadastrado.');
                redirect('Integrante/listaIntegrante');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar integrante.');
                redirect('Integrante/cadastro');
            }
        }
    }

    public function update($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('data_nascimento', 'data_nascimento', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->model('EquipeModel');
                $data['equipe'] = $this->EquipeModel->getAll();
                $data['integrante'] = $this->IntegranteModel->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormIntegrante', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'equipe' => $this->input->post('equipe'),
                    'nome' => $this->input->post('nome'),
                    'data_nascimento' => $this->input->post('data_nascimento'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf')
                );

                if ($this->IntegranteModel->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Integrante alterado.');
                    redirect('Integrante/listaIntegrante');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar integrante.');
                    redirect('Integrante/listaIntegrante');
                }
            }
        }
    }

    public function delete($id) {
        if ($id > 0) {
            if ($this->IntegranteModel->delete($id > 0)) {
                $this->session->set_flashdata('mensagem', 'Integrante deletado.');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar integrante.');
            }
        }
        redirect('Integrante/listaIntegrante');
    }

}
