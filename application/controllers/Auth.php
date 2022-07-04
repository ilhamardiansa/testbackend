<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
	}
	public function index()
	{
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }else{
           $email = $this->input->post('email');
           $password = $this->input->post('password');

           $user = $this->db->get_where('users', ['email' => $email])->row_array();

           if($user){
            if(password_verify($password, $user['password'])){
                $data = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                if($user['role'] == 'admin'){
                    redirect('admin');
                }elseif($user['role'] == 'pegawai'){
                    redirect('pegawai');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah !
                </div>');
                redirect('auth');
            }
           }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar !
            </div>');
            redirect('auth');
           }
        }
	}

    public function register(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password minimal 8 karakter'
        ]);

        if($this->form_validation->run() == false){
        $this->load->view('auth/header');
        $this->load->view('auth/register');
        $this->load->view('auth/footer');
        }else{
            $data = [
                'name' =>  htmlspecialchars($this->input->post('username'), TRUE),
                'email' =>  htmlspecialchars($this->input->post('email'), TRUE),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'pegawai'
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil di buat ! Silakan Login terlebih dahulu
          </div>');
            redirect('auth');
         }
        }

        public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Logout !
          </div>');
            redirect('auth');
        }
    
    }

