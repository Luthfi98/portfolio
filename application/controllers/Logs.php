<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

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
			'title' => 'Akses Log',
			'breadcrumb' => 'Akses Log',
			'logs' => AccessLog::orderBy('id', 'DESC')->all()
		];
		$this->template->load('templates/cms','cms/logs/index', $data,FALSE);
	}

}
