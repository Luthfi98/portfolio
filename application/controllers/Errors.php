<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function error403()
	{
		$data = [
			'title' => '403 Access Denied',
		];
		$this->template->load('templates/cms', 'errors/403', $data);
	}

	public function error404()
	{
		$data = [
			'title' => '404 Page Not Found',
		];
		if ($this->session->userdata('user_session')) {
			if (!isLogin()) {
				danger("Anda belum login, silahkan login terlebih dahulu");
				redirect('login');
			}
			$this->template->load('templates/cms', 'errors/404', $data);
		}else{
			$this->template->load('templates/landing', 'errors/404-landing', $data);
		}
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */