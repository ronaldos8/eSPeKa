<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('generalmodel');
		$this->load->library('cek');
	}

	public function index($rdr = FALSE)
	{
		$data['v_pengaturan'] = 'active';
		$data['title'] = 'Pengaturan';

		$r = $this->generalmodel->getAll('kriteria');
		$data['kriteria'] = $r->result();

		$r = $this->generalmodel->getAll('jasa_pengiriman');
		$data['jasa'] = $r->result();

		$jumlah_jasa = $this->db->count_all_results('jasa_pengiriman');
		
		$kriteria_complete = array();
		foreach ($data['kriteria'] as $value) {
			$this->db->where('ID_kriteria', $value->ID_kriteria);
			$r = $this->db->count_all_results('rank_perkriteria');
			if ($jumlah_jasa == $r) {
				$kriteria_complete[] = $value->ID_kriteria;
			}
		}
		

		$data['kriteria_complete'] = $kriteria_complete;

		if ($rdr == FALSE) {
			$this->template->show('pengaturan', $data);
		}else {
			return count($kriteria_complete);
		}
	}

	function setkriteria($id_kriteria)
	{
		$data['v_pengaturan'] = 'active';
		$data['title'] = 'Pengaturan';

		$r = $this->generalmodel->getAll('jasa_pengiriman');
		$data['jasa'] = $r->result_array();

		$where['ID_kriteria'] = $id_kriteria;
		$r = $this->generalmodel->getWhere('kriteria', $where);
		$data['kriteria'] = $r->row();

		$data['n'] = count($data['jasa']);

		$data['ID_kriteria'] = $id_kriteria;

		$this->template->show('set_jasa_kriteria', $data);
	}

	function rankkriteria()
	{
		$data['ID_kriteria'] = $_POST['ID_kriteria'];
		unset($_POST['ID_kriteria']);

		$matriks = $this->pangkatmatriks($_POST['matriks']);
		$jumlah_total_nilai = $this->totalnilai($matriks);

		$tmp = $this->generalmodel->getAll('kriteria')->result();
		$jumlah_kriteria = count($tmp);

		$wh['ID_kriteria'] = $data['ID_kriteria'];
		$cek = $this->generalmodel->getWhere('rank_perkriteria', $wh);
		$cek = $cek->result();
		$jumlah_kriteria_ada = count($cek);
		
		if ($jumlah_kriteria_ada >= $jumlah_kriteria) {
			$r = $this->generalmodel->delete('rank_perkriteria', $wh);
		}
		
		foreach ($matriks as $key => $value) {
			$total_nilai = 0;
			foreach ($value as $key2 => $value2) {
				if (!is_array($value2)) {
					$total_nilai += $value2;
				}
			}
			if ($key > 0) {
				$data['ID_jasa'] = $key;
				$data['nilai'] = $total_nilai / $jumlah_total_nilai;
				$r = $this->generalmodel->insert('rank_perkriteria', $data);
			}
		}
		if ($r > 0) {
			$jumlah_kriteria = $this->db->count_all_results('kriteria');
			$jumlah_kriteria_selesai = $this->index(TRUE);
			if ($jumlah_kriteria == $jumlah_kriteria_selesai) {
				unset($_SESSION['jasa_baru']);
			}
			$status = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Berhasil!</h4>Data Jasa Pengiriman Berhasil Disimpan.</div>";
		}else {
			$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Data Jasa Pengiriman Gagal Disimpan.Silahkan Coba Lagi</div>";
		}
		$this->session->set_flashdata('status', $status);
		$id = $data['ID_kriteria'];
		redirect(site_url("pengaturan/setkriteria/$id"),'refresh');
	}

	private function totalnilai($matriks)
	{
		$jumlah_total_nilai = 0;
		foreach ($matriks as $key => $value) {
			$total_nilai = 0;
			foreach ($value as $key2 => $value2) {
				if (!is_array($value2)) {
					$total_nilai += round($value2);
				}
			}
			$jumlah_total_nilai += $total_nilai;
		}
		return $jumlah_total_nilai;
	}

	private function pangkatmatriks($matriks)
	{
		$m[][] = array();
		$n = array_sum(array_map("count", $matriks));
		foreach ($matriks as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$tmp = 0;
				foreach ($value as $key3 => $value3) {
					$tmp += $matriks[$key][$key3] * $matriks[$key3][$key2];
				}
				$m[$key][$key2] = $tmp;
			}
		}
		return $m;

	}

	function lihat()
	{
		$data['v_pengaturan'] = 'active';
		$data['title'] = 'Ranking Jasa Pengiriman Berdasarkan Kriteria';

		$data['kriteria'] = $this->generalmodel->getAll('kriteria')->result();

		foreach ($data['kriteria'] as $value) {
			$table['jasa_pengiriman'] = "jasa_pengiriman.ID_jasa = rank_perkriteria.ID_jasa";
			$table['kriteria'] = "kriteria.ID_kriteria = rank_perkriteria.ID_kriteria";
			$this->db->where('rank_perkriteria.ID_kriteria', $value->ID_kriteria);
			$this->db->order_by('rank_perkriteria.nilai', 'desc');
			$r = $this->generalmodel->getJoin('rank_perkriteria', $table);
			$data['rank_kriteria'][$value->ID_kriteria] = $r->result_array();
		}

		$this->template->show('show_rank_jasa', $data);
	}

}

/* End of file pengaturan.php */
/* Location: ./application/controllers/pengaturan.php */