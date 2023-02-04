<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends CI_Controller {

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
			'title' => 'Pengunjung Website',
			'breadcrumb' => 'Pengunjung Website',
			'visitor' => Visitor::all()
		];
		$this->template->load('templates/cms','cms/visitors/index', $data,FALSE);
	}

}
