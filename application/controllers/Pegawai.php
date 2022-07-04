<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('query');
	}

	public function index()
	{
        $data['title'] = 'Dashboard Pegawai'; 

        $this->load->view('layout/header', $data);
        $this->load->view('index');
        $this->load->view('layout/footer');
	}

    public function konfirmasi(){
        $data['title'] = 'Konfirmasi Sewa';
		$data['penyewaan'] = $this->db->get_where('penyewaan', ['status' => 'menunggu disetujui'])->result();

        $this->load->view('layout/header', $data);
        $this->load->view('pegawai/konfirmasi');
        $this->load->view('layout/footer');
    }

    public function konfirmasisewa($id){
		$data = [
			'status' => 'proses'
		];
		$data2 = [
			'tipe' => "Berhasil Konfirmasi Sewa dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->update($data, 'penyewaan', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Berhasil Konfirmasi Sewa !
	   </div>');
	  redirect('/pegawai/konfirmasi');
	}

    public function historisewa(){
        $data['title'] = 'Histori Sewa';
		$data['histori'] = $this->db->get('penyewaan')->result();
		$this->load->view('layout/header', $data);
		$this->load->view('pegawai/histori');
		$this->load->view('layout/footer');
    }

    public function konfirmasiselesai($id){
        $data = [
			'status' => 'berhasil'
		];
		$data2 = [
			'tipe' => "Berhasil Konfirmasi Selesai Sewa dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->update($data, 'penyewaan', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Berhasil Konfirmasi Selesai Sewa !
	   </div>');
	  redirect('/pegawai/historisewa');
    }
}
