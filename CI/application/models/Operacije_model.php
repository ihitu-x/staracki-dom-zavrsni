<?php

class Operacije_model extends CI_Model {

	public function getOperacije($vrsta = null) {
	
		if(!isset($vrsta)) {
		
			$this->db->select('o.sifra_operacije, o.naziv_operacije');
			$this->db->from('OPERACIJA o');
			$this->db->join('VRSTA_OPERACIJE v', 'v.sifra_vrste_operacije = o.vrsta');
			$query = $this->db->get();
			
		} else {
		
			$this->db->select('o.sifra_operacije, o.naziv_operacije');
			$this->db->from('OPERACIJA o');
			$this->db->join('VRSTA_OPERACIJE v', 'v.sifra_vrste_operacije = o.vrsta');
			$this->db->where('v.naziv', $vrsta);
			$query = $this->db->get();
		}
			
			if($query -> num_rows() > 0) {
			
				foreach($query->result() as $row) {
				
					$data[] = $row;
				}
			
				return $data;
			}
	}
	
	public function setOperacija($data) {
		
		$query = $this->db->insert('OPERACIJA', $data);
		return $query;
	}

}
