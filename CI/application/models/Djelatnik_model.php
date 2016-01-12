<?php


class Djelatnik_model extends CI_Model {

	function validateAdmin() {
	
		$this->db->where('prezime_djelatnika', $this->input->post('username'));
		$this->db->where('lozinka', $this->input->post('password'));
		$query = $this->db->get('DJELATNIK');
	
	
		if($query->num_rows() == 1) {
			return TRUE;
		}
	
	}
	
	function getDjelatnik() {
	
			$query = $this->db->get('DJELATNIK');
			return $query->result_array();
			
	}
	
	function setDjelatnik($data) {
	
		$query = $this->db->insert('DJELATNIK', $data);
		return $query;	
	}
	
	public function deleteDjelatnik() {
		
		$this->db->where('sifra_djelatnika', $this->uri->segment(3));
		$this->db->delete('DJELATNIK');
	}
}