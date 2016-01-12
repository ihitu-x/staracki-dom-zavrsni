<?php


class Kalendar_model extends CI_Model {

	var $conf;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->conf = array(
			'start_day' 		=> 'monday',
			'show_next_prev' 	=> TRUE,
			'next_prev_url'		=> base_url() . 'index.php/kalendar/prikaz'
		);
		
		$this->conf['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered kalendar">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th class="text-center"><a href="{previous_url}"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> </a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}" class="text-center">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th class="text-center"><a href="{next_url}"><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> </a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_start_today}<td class="day">{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
        	<div class="day_num">{day}</div>
        {/cal_cell_content}
        {cal_cell_content_today}
        	<div class="day_num highlight">{day}</div>
        {/cal_cell_content_today}

        {cal_cell_no_content}
        	<div class="day_num">{day}</div>
        {/cal_cell_no_content}
        {cal_cell_no_content_today}
        	<div class="day_num highlight">{day}</div>
        {/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
        
';
		
		
	}
	
	public function getCalendarData($year, $month, $day) {
		
		$datum = $year.'-'.$month.'-'.$day;
		
		$this->db->select('k.ime, k.prezime, o.naziv_operacije, o.vrsta, sifra_onk, datum, vrijeme, izvrsenost');
		$this->db->from('OPERACIJA_NAD_KORISNIKOM n');
		$this->db->join('KORISNIK k', 'n.sifra_korisnika = k.sifra_korisnika');
		$this->db->join('OPERACIJA o', 'n.sifra_operacije = o.sifra_operacije');
		$this->db->where('datum', $datum);
		$query = $this->db->get();
		
		if($query -> num_rows() > 0) {
			
			foreach($query->result() as $row) {
				
				$data[] = $row;
			}
			
			return $data;
		}
		
	}

	public function generate($year, $month) {
	
		$cal_data = $this->load->library('calendar', $this->conf);
		
		return $this->calendar->generate($year, $month);
	}
	
	

}































































