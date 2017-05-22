<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('generalmodel');
		$this->load->library('cek');
	}

	public function index()
	{
		$data['title'] = "Jasa Pengiriman";
		$data['v_jasa'] = 'active';

		$data['jasa'] = $this->generalmodel->getAll('jasa_pengiriman')->result();

		$this->template->show('jasa', $data);
	}

	function proses()
	{
		$r = $this->generalmodel->insert('jasa_pengiriman', $_POST);
		if ($r > 0) {
			$array = array(
				'jasa_baru' => 1
			);
			$this->session->set_userdata( $array );

			$status = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Berhasil!</h4>
                Data Jasa Pengiriman Berhasil Disimpan.
              </div>";
		}else {
			$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Data Jasa Pengiriman Gagal Disimpan.Silahkan Coba Lagi</div>";
		}
		$this->session->set_flashdata('status', $status);
		redirect(site_url('jasa'),'refresh');
	}

	function hapus($ID_jasa = NULL)
	{
		if ($ID_jasa != NULL) {
			$wh['ID_jasa'] = $ID_jasa;
			$r = $this->generalmodel->delete('alternatif', $wh);
			$r = $this->generalmodel->delete('rank_alternatif', $wh);
			$r = $this->generalmodel->delete('rank_perkriteria', $wh);
			$r = $this->generalmodel->delete('jasa_pengiriman', $wh);
			if ($r > 0) {
				$array = array(
					'jasa_baru' => 1
				);
				$this->session->set_userdata( $array );
				
				$status = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Berhasil!</h4>
                Data Jasa Pengiriman Berhasil Dihapus. Setelah melakukan penghapusan jasa pengiriman, bobot penilaian akan berubah. <b>Silahkan atur ulang penilaian di menu Pengaturan</b>
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

/* End of file jasa.php */
/* Location: ./application/controllers/jasa.php */