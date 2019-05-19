<?php

defined('BASEPATH')OR exit('No direct script access allowed');

class Equipe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->LoginModel->verificaLogin();
        $this->load->model('EquipeModel');
    }

    public function index() {
        $this->listaEquipe();
    }

    public function listaEquipe() {
        
        $data['equipe'] = $this->EquipeModel->getAll();

        $this->load->view('Header');
        $this->load->view('ListaEquipe', $data);
        $this->load->view('Footer');
    }

    public function cadastro() {
        $this->form_validation->set_rules('nome', 'nome', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormEquipe');
            $this->load->view('Footer');
        } else {

            $data = array(
                'nome' => $this->input->post('nome')
            );

            if ($this->EquipeModel->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Equipe cadastrada.');
                redirect('Equipe/listaEquipe');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar equipe.');
            }
        }
    }

    public function update($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');

            if ($this->form_validation->run() == false) {
                $data['equipe'] = $this->EquipeModel->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome')
                );
                if ($this->EquipeModel->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Equipe alterada.');
                    redirect('Equipe/listaEquipe');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar equipe.');
                    redirect('Equipe/update/' . $id);
                }
            }
        }
    }

    public function delete($id){
        if($id > 0){
            if ($this->EquipeModel->delete($id > 0)){
                $this->session->set_flashdata('mensagem', 'Equipe excluída.');
            }else{
                $this->session->set_flashdata('mensagem', 'Falha ao excluir equipe.');
            }
        }
        redirect('Equipe/listaEquipe');
    }
}
