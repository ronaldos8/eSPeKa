<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('generalmodel');
		$this->load->library('template');
		$this->load->library('cek');
	}

	public function index()
	{
		
	}

	function q()
	{
		if (isset($_GET['s']) && $_GET['s'] != '') {
			$q = $_GET['s'];
			$this->db->where('ID_pengiriman', $q);
			$this->db->or_like('tujuan', $q);
			$r = $this->generalmodel->getAll('pengiriman');
			$data['pengiriman'] = $r->result();

			$this->db->like('nama_jasa', $q);
			$data['jasa'] = $this->generalmodel->getAll('jasa_pengiriman')->result();

			$data['title'] = $q;
			$data['v_pengiriman'] = 'active';

			$this->template->show('cari', $data);
		}else {
			
		}
	}

}

/* End of file cari.php */
/* Location: ./application/controllers/cari.php */