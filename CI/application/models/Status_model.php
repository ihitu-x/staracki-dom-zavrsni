<?php


class Status_model extends CI_Model {

	public function getStatus() {
		$this->db->select('*');
		$this->db->from('STATUS');
		$query = $this->db->get();
		return $query->result_array();
		
	
	}

}