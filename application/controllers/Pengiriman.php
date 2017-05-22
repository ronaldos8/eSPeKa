<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('generalmodel');
		$this->load->library('cek');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['v_pengiriman'] = 'active';
		$data['title'] = "Pengiriman";
		$this->template->show('form_pengiriman', $data);
	}

	function proses()
	{
		$r = $this->generalmodel->insert('pengiriman', $_POST);
		if ($r > 0) {
			$status = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Berhasil!</h4>Data Pengiriman Berhasil Disimpan.Silahkan isi Kriteria Pengiriman</div>";
			$this->session->set_flashdata('status', $status);
			redirect(site_url("pengiriman/setkriteria/$r"),'refresh');
		}else {
			$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Data Pengiriman Gagal Disimpan.Silahkan Coba Lagi</div>";
			$this->session->set_flashdata('status', $status);
			redirect(site_url('pengiriman'),'refresh');
		}
	}

	function setkriteria($id_pengiriman)
	{
		$data['v_pengiriman'] = 'active';
		$data['title'] = "Set Kriteriaia";

		$wh['ID_pengiriman'] = $id_pengiriman;
		$cekdata = $this->generalmodel->getWhere("rank_kriteria", $wh);
		
		if ($cekdata->num_rows() < 1) {
			//data kriteria
			$this->db->order_by('ID_kriteria', 'asc');
			$r = $this->generalmodel->getAll('kriteria');
			$data['kriteria'] = $r->result_array();
			$data['n'] = count($data['kriteria']);
			$data['data_sudah_ada'] = 0;
		}else{
			$data['data_sudah_ada'] = 1;
		}

		$data['id_pengiriman'] = $id_pengiriman;

		$this->template->show('set_kriteria', $data);
	}

	function rankkriteria()
	{
		$data['ID_pengiriman'] = $_POST['ID_pengiriman'];
		unset($_POST['ID_pengiriman']);

		$matriks = $this->pangkatmatriks($_POST['matriks']);
		$jumlah_total_nilai = $this->totalnilai($matriks);

		foreach ($matriks as $key => $value) {
			$total_nilai = 0;
			foreach ($value as $key2 => $value2) {
				if (!is_array($value2)) {
					$total_nilai += $value2;
				}
			}
			if ($key > 0) {
				$data['ID_kriteria'] = $key;
				$data['nilai'] = $total_nilai / $jumlah_total_nilai;
				$this->generalmodel->insert('rank_kriteria', $data);
			}
		}
		$id = $data['ID_pengiriman'];
		redirect(site_url("pengiriman/showrankkriteria/$id"),'refresh');
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

	function showrankkriteria($id_pengiriman)
	{
		$join['rank_kriteria'] = "kriteria.ID_kriteria = rank_kriteria.ID_kriteria";
		$this->db->order_by('nilai', 'desc');
		$this->db->where('rank_kriteria.ID_pengiriman', $id_pengiriman);
		$d = $this->generalmodel->getJoin('kriteria', $join);
		$data['kriteria'] = $d->result();

		$data['title'] = "Ranking Kriteria";
		$data['v_pengiriman'] = "active";

		$data['ID_pengiriman'] = $id_pengiriman;
		$this->template->show('show_kriteria', $data);
	}

	function lihat($id_pengiriman = NULL, $offset = 0)
	{
		if ($id_pengiriman == NULL || !is_numeric($id_pengiriman)) {
			$data['title'] = "Daftar Pengiriman Barang";
			$data['v_pengiriman'] = "active";

			$r = $this->generalmodel->getAll('pengiriman');
			$numrow = $r->num_rows();
			$this->db->order_by('ID_pengiriman', 'desc');
			$r = $this->generalmodel->getAll('pengiriman', 10, $offset);
			$data['pengiriman'] = $r->result();

			/*----------------- PAGINATION PAGE-----------------------------------------------*/
			// pagination
			$config['base_url'] = site_url("pengiriman/lihat/index/");
			$config['total_rows'] = $numrow;
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] = "</ul>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag_close'] = "</li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = "</li>";
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = "</li>";
			$config['cur_tag_open'] = "<li class='active'><a><b>";
			$config['cur_tag_close'] = "</b></a></li>";
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			/*----------------- PAGINATION PAGE-----------------------------------------------*/

			$data['no'] = $offset+1;

			$this->template->show('show_data_pengiriman', $data);
		}else {
			$where['ID_pengiriman'] = $id_pengiriman;
			$data['pengiriman'] = $this->generalmodel->getWhere('pengiriman', $where)->row();

			$table['jasa_pengiriman'] = "jasa_pengiriman.ID_jasa = rank_alternatif.ID_jasa";
			$this->db->where('rank_alternatif.ID_pengiriman', $id_pengiriman);
			$this->db->order_by('rank_alternatif.nilai', 'desc');
			$data['rank_alternatif'] = $this->generalmodel->getJoin('rank_alternatif', $table)->result();

			$table['jasa_pengiriman'] = "jasa_pengiriman.ID_jasa = alternatif.ID_jasa";
			$this->db->where('alternatif.ID_pengiriman', $id_pengiriman);
			$data['alternatif'] = $this->generalmodel->getJoin('alternatif', $table)->row();

			if ($data['alternatif'] != NULL) {
				$max = $this->generalmodel->getKriteriaUnggul($data['alternatif']->ID_jasa);
				
				$tableX['kriteria'] = "kriteria.ID_kriteria = rank_perkriteria.ID_kriteria";
				$this->db->where('rank_perkriteria.ID_jasa', $data['alternatif']->ID_jasa);
				$this->db->where('rank_perkriteria.nilai', $max);
				$data['keunggulan'] = $this->generalmodel->getJoin('rank_perkriteria', $tableX)->row();
			}

			$tb['kriteria'] = 'kriteria.ID_kriteria = rank_kriteria.ID_kriteria';
			$this->db->where('rank_kriteria.ID_pengiriman', $id_pengiriman);
			$this->db->order_by('rank_kriteria.nilai', 'desc');
			$data['rank_kriteria'] = $this->generalmodel->getJoin('rank_kriteria', $tb)->result();

			$data['title'] = "Detail Pengiriman";
			$data['v_pengiriman'] = 'active';

			$this->template->show('detail_pengiriman', $data);
		}
	}

	function showrankjasa($id_pengiriman, $rdr = FALSE)
	{
		$data['jasa'] = $this->generalmodel->getAll('jasa_pengiriman')->result_array();
		$this->db->order_by('ID_kriteria', 'asc');
		$data['kriteria'] = $this->generalmodel->getAll('kriteria')->result_array();
		$data['n_jasa'] = count($data['jasa']);
		$data['n_kriteria'] = count($data['kriteria']);
		$m[][] = array();
		$err = 0;
		foreach ($data['jasa'] as $value) {
			foreach ($data['kriteria'] as $value2) {
				$wh['ID_jasa'] = $value['ID_jasa'];
				$wh['ID_kriteria'] = $value2['ID_kriteria'];
				$r = $this->generalmodel->getWhere('rank_perkriteria', $wh)->row();
				if ($r != NULL) {
					$m[$value['ID_jasa']][$value2['ID_kriteria']] = $r->nilai;
				}else {
					$m[$value['ID_jasa']][$value2['ID_kriteria']] = 0;
					$err++;
				}
			}
		}
		$data['nilai'] = $m;
		$data['error'] = $err;

		$data['title'] = 'Rangking Jasa Pengiriman';
		$data['v_pengiriman'] = 'active';
		$data['ID_pengiriman'] = $id_pengiriman;

		if ($rdr == FALSE) {
			$this->template->show('show_pengiriman_perkriteria', $data);
		}else {
			return $err;
		}
	}

	function hasil($id_pengiriman)
	{
		$wh2['ID_pengiriman'] = $id_pengiriman;
		$cekdata = $this->generalmodel->getWhere("rank_alternatif", $wh2);
		
		if ($cekdata->num_rows() > 0) {
			redirect(site_url("pengiriman/showalternatif/$id_pengiriman"),'refresh');
		}

		$err = $this->showrankjasa($id_pengiriman, TRUE);
		if ($err > 0) {
			$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Data penilaian setiap jasa pengiriman belum lengkap sehingga tidak bisa dilakukan perhitungan.</div>";
			$this->session->set_flashdata('status', $status);
			redirect(site_url('pengaturan'),'refresh');
		}
		$data['jasa'] = $this->generalmodel->getAll('jasa_pengiriman')->result_array();
		$this->db->order_by('ID_kriteria', 'asc');
		$data['kriteria'] = $this->generalmodel->getAll('kriteria')->result_array();
		
		$m[][] = array();
		foreach ($data['jasa'] as $value) {
			foreach ($data['kriteria'] as $value2) {
				$wh['ID_jasa'] = $value['ID_jasa'];
				$wh['ID_kriteria'] = $value2['ID_kriteria'];
				$r = $this->generalmodel->getWhere('rank_perkriteria', $wh)->row();
				$m[$value['ID_jasa']][$value2['ID_kriteria']] = $r->nilai;
			}
		}
		$data['nilai'] = $m;

		$where['ID_pengiriman'] = $id_pengiriman;
		$this->db->order_by('ID_kriteria', 'asc');
		$kriteria = $this->generalmodel->getWhere('rank_kriteria', $where)->result_array();

		$x=0;
		foreach ($m as $key => $value) {
			$c = 0;
			$tmp = 0;
			foreach ($value as $value2) {
				if (!is_array($value2)) {
					$tmp += round($value2*$kriteria[$c]['nilai'], 2);
					$c++;
				}
			}
			$where['ID_jasa'] = $key;
			$where['nilai'] = $tmp;
			if ($c != 0) {
				$r = $this->generalmodel->insert('rank_alternatif', $where);
			}
		}
		if ($r > 0) {
			redirect(site_url("pengiriman/showalternatif/$id_pengiriman"),'refresh');
		}
	}

	function showalternatif($id_pengiriman)
	{
		$data['title'] = 'Rangking Alternatif';
		$data['v_pengiriman'] = 'active';

		$wh['ID_pengiriman'] = $id_pengiriman;
		$cekdata = $this->generalmodel->getWhere("alternatif", $wh);
		
		if ($cekdata->num_rows() > 0) {
			$data['data_sudah_ada'] = $cekdata->num_rows();
		}else {
			$table['jasa_pengiriman'] = "jasa_pengiriman.ID_jasa = rank_alternatif.ID_jasa";
			$table['pengiriman'] = "pengiriman.ID_pengiriman = rank_alternatif.ID_pengiriman";
			$this->db->order_by('nilai', 'desc');
			$this->db->where('rank_alternatif.ID_pengiriman', $id_pengiriman);
			$data['alternatif'] = $this->generalmodel->getJoin('rank_alternatif', $table)->result();
			$data['data_sudah_ada'] = 0;
		}

		$data['ID_pengiriman'] = $id_pengiriman;

		$this->template->show('show_alternatif', $data);
	}

	function pilih($id_jasa, $id_pengiriman, $nilai)
	{
		$data['ID_jasa'] = $id_jasa;
		$data['ID_pengiriman'] = $id_pengiriman;
		$data['nilai'] = $nilai;

		$r = $this->generalmodel->insert('alternatif', $data);
		if ($r > 0) {
			redirect(site_url('pengiriman/sukses'),'refresh');
		}else echo "Terjadi kesalahan. Silahkan coba lagi.";
	}

	function sukses()
	{
		$data['title'] = 'Rangking Alternatif';
		$data['v_pengiriman'] = 'active';

		$this->template->show('sukses', $data);
	}

}

/* End of file pengiriman.php */
/* Location: ./application/controllers/pengiriman.php */