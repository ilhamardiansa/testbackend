<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_model extends CI_Model {
	public function chart_database()
	{
		return $this->db->get('penyewaan')->result();
	}
}
