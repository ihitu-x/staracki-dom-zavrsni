<?php


class Sobe_model extends CI_Model {

	public function getSobe() {
		$this->db->select('*');
		$this->db->from('SOBE');
		$this->db->where('broj_zauzetih_kreveta < broj_kreveta');
		$query = $this->db->get();
		return $query->result_array();
		
	
	}
	
	public function promjenaSobe($id) {
		$this->db->select('*');
		$this->db->from('SOBE');
		$this->db->where('broj_zauzetih_kreveta < broj_kreveta AND sifra_sobe !='.$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function dodajKrevet($id) {
		
		$sql = "UPDATE `SOBE` SET `broj_zauzetih_kreveta`= broj_zauzetih_kreveta + 1 WHERE sifra_sobe = ".$id."";
		$this->db->query($sql);
	}

}