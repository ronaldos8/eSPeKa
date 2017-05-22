<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->library('cek');
		$this->load->model('generalmodel');
	}

	public function index($chart = 'kriteria')
	{
		$data['title'] = "HOME";
		$data['v_beranda'] = 'active';

		$this->db->order_by('ID_jasa', 'asc');
		$jasa = $this->generalmodel->getAll('jasa_pengiriman', 8, 0);
		$jasa = $jasa->result();

		foreach ($jasa as $value) {
			$jasa2[$value->ID_jasa] = $value;
		}
		
		$data['jasa'] = $jasa2;
		$data['chart'] = $chart;

		$kriteria = $this->generalmodel->getAll('rank_perkriteria')->result();

		foreach ($kriteria as $value) {
			$tmp[$value->ID_jasa][$value->ID_kriteria] = $value->nilai;
		}

		$data['kriteria'] = $tmp;

		$data['data_kriteria'] = $this->generalmodel->getAll('kriteria')->result();
		$this->db->order_by('ID_pengiriman', 'desc');
		$data['pengiriman_terakhir'] = $this->generalmodel->getAll('pengiriman', 5, 0)->result();
		$ship = array();
		foreach ($data['pengiriman_terakhir'] as $value) {
			$this->db->where('ID_pengiriman', $value->ID_pengiriman);
			$r = $this->db->count_all_results('alternatif');
			$ship[$value->ID_pengiriman] = $r;
		}
		$data['ship'] = $ship;

		$data['jumlah_pengiriman'] = $this->db->count_all_results('pengiriman');
		$data['jumlah_alternatif'] = $this->db->count_all_results('alternatif');
		$data['jumlah_pengguna'] = $this->db->count_all_results('akun');
		$data['jumlah_jasa'] = $this->db->count_all_results('jasa_pengiriman');

		$this->template->show('home', $data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */