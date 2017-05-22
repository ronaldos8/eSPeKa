<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function show($content, $data)
	{
		$data['__header'] = $this->ci->load->view('template/header', $data, TRUE);
		if (is_array($content)) {
			foreach ($content as $value) {
				$data['__content'][] = $this->ci->load->view($value, $data, TRUE);
			}
		}else $data['__content'] = $this->ci->load->view($content, $data, TRUE);

		$data['__footer'] = $this->ci->load->view('template/footer', $data, TRUE);

		$this->ci->load->view('template/main', $data, FALSE);
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
