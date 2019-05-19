<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index() {
        $this->load->view('Login');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Login');
        } else {
            //busca no banco de dados, através do Model, saber se existe
            //o usuario com este email e senha recebidos por post            
            $usuario = $this->LoginModel->getUsuario(
                    $this->input->post('email'), $this->input->post('senha')
            );
            //valida se retornou algum registro, quer dizer que o usuário
            //é existente
            if ($usuario) {
                //montamos um array com as informações do usuário logado
                $data = array(
                    'idUsuario' => $usuario->id,
                    'email' => $usuario->email,
                    'logado' => TRUE
                );
                //mandamos o codeigniter salvar na sessão os dados do usuário
                //perceba que o método set_userdata é diferente do método
                //set_flashdata, pois ele salva dados permanentes enquanto
                //durar a sessão.
                $this->session->set_userdata($data);
                //abre a pagina principal do sistema
                redirect($this->config->base_url());
            } else {
                $this->session->set_flashdata('mensagem', 'Usuário e Senha incorretos!');
                //redireciona obrigando o login...
                redirect($this->config->base_url() . 'Usuario');
            }
        }
    }

    public function cadastro() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('FormUsuario');
        } else {

            $data = array(
                'email' => $this->input->post('email'),
                'senha' => sha1($this->input->post('senha') . 'brunaSENAC')
            );

            if ($this->LoginModel->insert($data)) {
                redirect('Usuario/login');
            } else {
                redirect('Usuario/cadastro');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('senha', 'senha', 'required');

            if ($this->form_validation->run() == false) {
                $data['login'] = $this->UsuarioModel->getOne($id);
                $this->load->view('FormUsuario', $data);
            } else {
                $data = array(
                    'email' => $this->input->post('email'),
                    'senha' => sha1($this->input->post('senha' . 'brunaSENAC'))
                );
                if ($this->loginModel->insert($data)) {
                    redirect('Usuario');
                } else {
                    redirect('Usuario/cadastro');
                }
            }
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            if ($this->UsuarioModel->delete($id)) {
                $this->session->set_flashdata('mensagem', 'deletado.');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar.');
            }
        }
        redirect('Usuario');
    }

    /**
     * Método responsável por fazer o logout do sistema
     * destruindo a sessão do usuário
     */
    public function sair() {
        //apaga todo conteúdo da sessão do usuário
        $this->session->sess_destroy();
        redirect($this->config->base_url());
    }

}
