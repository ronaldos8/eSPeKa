<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('generalmodel');
	}

	public function index()
	{
		$this->load->view('login2');
	}

	function auth()
	{
		$_POST['password'] = md5($_POST['password']);
		$row = $this->generalmodel->getWhere('akun', $_POST)->row();

		if ($row != NULL) {
			$array = array(
				'log' => TRUE,
				'id_log' => $row->ID_akun,
				'nama_log' => $row->nama
			);
			
			$this->session->set_userdata( $array );

			redirect(site_url('home'),'refresh');
		}else {
			$status = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Terjadi kesalahan!</h4>Username atau Password salah.</div>";
			$this->session->set_flashdata('status', $status);
			redirect(site_url('login'),'refresh');
		}
	}

	function out()
	{
		session_destroy();
		redirect(site_url('login'),'refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */