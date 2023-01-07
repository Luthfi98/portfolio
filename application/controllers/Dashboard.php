<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isLogin()) {
			danger("Anda belum login, silahkan login terlebih dahulu");
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'breadcrumb' => 'Dashboard',
			'user'  => 0,
			'criteria'  => 0,
			'alternative'  => 0,
			'student'  => 0,
			'lists' => []
		];

		$this->template->load('templates/cms','cms/dashboard', $data,FALSE);
	}

}
