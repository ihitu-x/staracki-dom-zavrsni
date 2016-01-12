<?php


class Vrsta_model extends CI_Model {

	public function getVrsta() {
		$this->db->select('*');
		$this->db->from('VRSTA_OPERACIJE');
		$query = $this->db->get();
		return $query->result_array();
		
	
	}

}