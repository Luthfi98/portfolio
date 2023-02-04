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
			'skill'  => Skill::count(),
			'experience'  => Experience::count(),
			'project'  => Project::count(),
			'user'  => User::count(),
			'day'  => Visitor::whereDate('date', date("Y-m-d"))->count(),
			'month' => Visitor::whereMonth('date', date('m'))->count(),
			'year' => Visitor::whereYear('date', date('Y'))->count(),
			'logs' => AccessLog::limit(10)->get()
		];
		$this->template->load('templates/cms','cms/dashboard', $data,FALSE);
	}

}
