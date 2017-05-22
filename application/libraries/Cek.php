<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();

        if (!$this->ci->session->has_userdata('log')) {
        	redirect(site_url('login'),'refresh');
        }
	}

	

}

/* End of file cek.php */
/* Location: ./application/libraries/cek.php */
