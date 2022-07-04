<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('query');
		$this->load->model('chart_model');
	}

	public function index()
	{
		$data['title'] = 'Admin Dashboard';
		$data['tampil'] = $this->db->get('penyewaan')->num_rows();
		$query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM penyewaan WHERE YEAR(created_at) = '" . date('Y') . "'
		GROUP BY YEAR(created_at),MONTH(created_at)");
		$record = $query->result();
		$data = [];
   
		foreach($record as $row) {
			  $data['label'][] = $row->month_name;
			  $data['data'][] = (int) $row->count;
		}
		$data['chart_data'] = json_encode($data);   
		$this->load->view('layout/header', $data);
		$this->load->view('admin/index');
		$this->load->view('layout/footer');
	}

	public function kendaraan(){
		$data['title'] = 'Data Kendaraan';
		$data['kendaraan'] = $this->db->get('kendaraan')->result();
		$this->load->view('layout/header', $data);
		$this->load->view('page/kendaraan');
		$this->load->view('layout/footer');
	}

	public function addkendaraan(){
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
		$this->form_validation->set_rules('plat', 'Plat', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Data Kendaraan';

		$this->load->view('layout/header', $data);
		$this->load->view('page/add/kendaraan');
		$this->load->view('layout/footer');
		}else{
			$data = [
				'jenis_kendaraan' => htmlspecialchars($this->input->post('jenis', TRUE)),
				'merk_kendaraan' => htmlspecialchars($this->input->post('merk', TRUE)),
				'plat' => htmlspecialchars($this->input->post('plat', TRUE)),
			];
			$data2 = [
				'tipe' => 'Tambah Data Kendaraan'
			];
			$this->query->tambah($data2, 'log');
			$this->query->tambah($data, 'kendaraan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah!
	   </div>');
	  redirect('/admin/kendaraan');
		}
	}

	public function editkendaraan($id){
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
		$this->form_validation->set_rules('plat', 'Plat', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Data Kendaraan';
		$data['kendaraan'] = $this->db->get_where('kendaraan', ['id' => $id])->result();

		$this->load->view('layout/header', $data);
		$this->load->view('page/edit/kendaraan');
		$this->load->view('layout/footer');
		}else{
			$id = $this->input->post('id');
			$data = [
				'jenis_kendaraan' => htmlspecialchars($this->input->post('jenis', TRUE)),
				'merk_kendaraan' => htmlspecialchars($this->input->post('merk', TRUE)),
				'plat' => htmlspecialchars($this->input->post('plat', TRUE)),
			];
			$data2 = [
				'tipe' => "Update Data Kendaraan dengan id : $id"
			];
			$this->query->tambah($data2, 'log');
			$this->query->update($data, 'kendaraan', $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil diubah!
	   </div>');
	  redirect('/admin/kendaraan');
		}
	}

	public function deletekendaraan($id){
		$data2 = [
			'tipe' => "Delete Data Kendaraan dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->delete($id, 'kendaraan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus !
	   </div>');
	  redirect('/admin/kendaraan');
	}

	public function driver(){
		$data['title'] = 'Data driver';
		$data['driver'] = $this->db->get('driver')->result();
		$this->load->view('layout/header', $data);
		$this->load->view('page/driver');
		$this->load->view('layout/footer');
	}

	public function adddriver(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Data driver';

		$this->load->view('layout/header', $data);
		$this->load->view('page/add/driver');
		$this->load->view('layout/footer');
		}else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', TRUE))
			];
			$data2 = [
				'tipe' => "Tambah Data Driver"
			];
			$this->query->tambah($data2, 'log');
			$this->query->tambah($data, 'driver');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah!
	   </div>');
	  redirect('/admin/driver');
		}
	}

	public function editdriver($id){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Data driver';
		$data['driver'] = $this->db->get_where('driver', ['id' => $id])->result();

		$this->load->view('layout/header', $data);
		$this->load->view('page/edit/driver');
		$this->load->view('layout/footer');
		}else{
			$id = $this->input->post('id');
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', TRUE))
			];
			$data2 = [
				'tipe' => "Update Data Driver dengan id : $id"
			];
			$this->query->tambah($data2, 'log');
			$this->query->update($data, 'driver', $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil diubah!
	   </div>');
	  redirect('/admin/driver');
		}
	}

	public function deletedriver($id){
		$data2 = [
			'tipe' => "Delete Data Driver dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->delete($id, 'driver');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus !
	   </div>');
	  redirect('/admin/barang');
	}

	public function barang(){
		$data['title'] = 'Data barang';
		$data['barang'] = $this->db->get('barang')->result();
		$this->load->view('layout/header', $data);
		$this->load->view('page/barang');
		$this->load->view('layout/footer');
	}

	public function addbarang(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Data barang';

		$this->load->view('layout/header', $data);
		$this->load->view('page/add/barang');
		$this->load->view('layout/footer');
		}else{
			$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama', TRUE)),
				'deskripsi' => htmlspecialchars($this->input->post('deskripsi', TRUE))
			];
			$data2 = [
				'tipe' => "Tambah Data Barang"
			];
			$this->query->tambah($data, 'barang');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah!
	   </div>');
	  redirect('/admin/barang');
		}
	}

	public function editbarang($id){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Data Barang';
		$data['barang'] = $this->db->get_where('barang', ['id' => $id])->result();

		$this->load->view('layout/header', $data);
		$this->load->view('page/edit/barang');
		$this->load->view('layout/footer');
		}else{
			$id = $this->input->post('id');
			$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama', TRUE)),
				'deskripsi' => htmlspecialchars($this->input->post('deskripsi', TRUE))
			];
			$data2 = [
				'tipe' => "Update Data Driver dengan id : $id"
			];
			$this->query->tambah($data2, 'log');
			$this->query->update($data, 'barang', $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil diubah!
	   </div>');
	  redirect('/admin/barang');
		}
	}


	public function deletebarang($id){
		$data2 = [
			'tipe' => "Delete Data Barang dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->delete($id, 'barang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus !
	   </div>');
	  redirect('/admin/barang');
	}

	public function sewa(){
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('driver', 'Driver', 'trim|required');
		$this->form_validation->set_rules('barang', 'Barang', 'trim|required');
		$this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if($this->form_validation->run() == false){
		$data['title'] = 'Sewa';
		$data['kendaraan'] = $this->db->get('kendaraan')->result();
		$data['driver'] = $this->db->get('driver')->result();
		$data['barang'] = $this->db->get('barang')->result();
		$data['kofirmasi'] = $this->db->get_where('penyewaan', ['status' => 'pending'])->result();

		$this->load->view('layout/header', $data);
		$this->load->view('page/add/sewa');
		$this->load->view('layout/footer');
		}else{
			$penyewa = $this->input->post('nama', TRUE);
			$data = [
				'jenis_kendaraan' => htmlspecialchars($this->input->post('jenis', TRUE)),
				'driver' => htmlspecialchars($this->input->post('driver', TRUE)),
				'barang' => htmlspecialchars($this->input->post('barang', TRUE)),
				'durasi' => htmlspecialchars($this->input->post('durasi', TRUE)),
				'nama_penyewa' => htmlspecialchars($this->input->post('nama', TRUE)),
				'status' => 'pending'
			];
			$data2 = [
				'tipe' => "Berhasil Menyewa $penyewa"
			];
			$this->query->tambah($data2, 'log');
			$this->query->tambah($data, 'penyewaan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah!
	   </div>');
	  redirect('/admin/sewa');
		}
	}

	public function konfirmasisewa($id){
		$data = [
			'status' => 'menunggu disetujui'
		];
		$data2 = [
			'tipe' => "Berhasil Input data Sewa dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->update($data, 'penyewaan', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Silakan Menunggu Konfirmasi Dari Staff !
	   </div>');
	  redirect('/admin/sewa');
	}

	public function deletesewa($id){
		$data2 = [
			'tipe' => "Delete Data Sewa dengan id : $id"
		];
		$this->query->tambah($data2, 'log');
		$this->query->delete($id, 'penyewaan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus !
	   </div>');
	  redirect('/admin/sewa');
	}

	public function historisewa(){
		$data['title'] = 'Histori Sewa';
		$data['histori'] = $this->db->get('penyewaan')->result();
		$this->load->view('layout/header', $data);
		$this->load->view('page/histori');
		$this->load->view('layout/footer');
	}

	public function chart(){
		$data = $this->chart_model->chart_database();
		echo json_encode($data);
	}

	public function excel() {
	$data['title'] = 'Laporan Excel';
	$data['histori'] = $this->db->get('penyewaan')->result();
	$this->load->view('excel/excel', $data);
    }
}
