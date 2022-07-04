<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Model {
	public function delete($id, $table)
	{
		return $this->db->delete($table, ['id' => $id]);
	}

	public function tambah($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function update($data, $table, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}
}
