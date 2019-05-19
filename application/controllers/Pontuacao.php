<?php

defined('BASEPATH')OR exit('No direct script access allowed');

class Pontuacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->LoginModel->verificaLogin();
        
        $this->load->model('PontuacaoModel');
    }

    public function index() {
        $this->listaPontuacao();
    }

    public function listaPontuacao() {
        $data['pontuacao'] = $this->PontuacaoModel->getAll();
        $this->load->view('Header');
        $this->load->view('ListaPontuacao', $data);
        $this->load->view('Footer');
    }

    public function cadastro() {
        $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
        $this->form_validation->set_rules('id_prova', 'id_prova', 'required');
        $this->form_validation->set_rules('pontos', 'pontos', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->model('EquipeModel');
            $data['equipe'] = $this->EquipeModel->getAll();
            
            $this->load->model('ProvaModel');
            $data['provas'] = $this->ProvaModel->getAll();
            
            $this->load->view('Header');
            $this->load->view('FormPontuacao', $data);
            $this->load->view('Footer');
        } else {

            $data = array(
                'id_equipe' => $this->input->post('id_equipe'),
                'id_prova' => $this->input->post('id_prova'),
                'pontos' => $this->input->post('pontos')
            );

            if ($this->PontuacaoModel->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Pontuação cadastrada.');
                redirect('Pontuacao/listaPontuacao');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar pontuação');
                redirect('Pontuação/cadastro');
            }
        }

        echo validation_errors();
    }

    public function update($id) {
        if ($id > 0) {

            if ($this->form_validation->run() == false) {
                $this->load->model('EquipeModel');
                $data['id_equipe'] = $this->EquipeModel->getAll();
                
                $this->load->model('ProvaModel');
                $data['id_prova'] = $this->ProvaModel->getAll();
                
                $data['pontuacao'] = $this->PontuacaoModel->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormPontuacao', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'id_equipe' => $this->input->post('id_equipe'),
                    'id_prova' => $this->input->post('id_prova'),
                    'pontos' => $this->input->post('pontos')
                );

                if ($this->PontuacaoModel->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Pontuação alterada com sucesso.');
                    redirect('Pontuacao/listaPontuacao');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar pontuação.');
                    redirect('Pontuacao/update/' . $id);
                }
            }
        }
    }

    public function delete($id) {
        if ($id > 0) {
            if ($this->PontuacaoModel->delete($id > 0)) {
                $this->session->set_flashdata('mensagem', 'Pontuaçao apagada.');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao apagar pontuação.');
            }
        }
        redirect('Pontuacao/listaPontuacao');
    }

}
