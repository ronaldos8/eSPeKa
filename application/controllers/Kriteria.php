<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('generalmodel');
		$this->load->library('template');
		$this->load->library('cek');
	}

	public function index()
	{
		$data['title'] = "Kriteria";
		$data['v_kriteria'] = 'active';

		$data['kriteria'] = $this->generalmodel->getAll('kriteria')->result();

		$this->template->show('kriteria', $data);
	}

	function proses()
	{
		$r = $this->generalmodel->insert('kriteria', $_POST);
		if ($r > 0) {
			$status = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Berhasil!</h4>
                Data Kriteria Pengiriman Berhasil Disimpan.
              </div>";
		}else {
			$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Data Kriteria Pengiriman Gagal Disimpan.Silahkan Coba Lagi</div>";
		}
		$this->session->set_flashdata('status', $status);
		redirect(site_url('kriteria'),'refresh');
	}

	function hapus($ID_jasa = NULL)
	{
		if ($ID_jasa != NULL) {
			$wh['ID_kriteria'] = $ID_jasa;
			$r = $this->generalmodel->delete('rank_perkriteria', $wh);
			$r = $this->generalmodel->delete('rank_kriteria', $wh);
			$r = $this->generalmodel->delete('kriteria', $wh);
			if ($r > 0) {
				$status = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Berhasil!</h4>
                Data Jasa Pengiriman Berhasil Dihapus.
              </div>";
			}else {
				$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Data Jasa Pengiriman Gagal Dihapus.Silahkan Coba Lagi</div>";
			}
			$this->session->set_flashdata('status', $status);
			redirect(site_url('jasa'),'refresh');
		}
	}

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */