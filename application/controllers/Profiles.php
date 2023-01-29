<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends CI_Controller {

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
		$profile = Profile::first();
		$data = [
			'title' => 'Data Diri',
			'breadcrumb' => 'Data Diri',
			'profile' => $profile
		];

		$this->template->load('templates/cms','cms/profile', $data,FALSE);
	}

	public function save()
	{
		$request = $this->input->post();
		$id = $request['id'];
		$id = $id ? encrypt_decrypt('decrypt', $id) : null; 
		unset($request['id']);
		$updateOrCreate = Profile::updateOrCreate(
			['id' => $id],$request
		);

		success('Berhasil memperbarui data profile');
		redirect(base_url('profiles'));
	}

}

/* End of file Profiles.php */
/* Location: ./application/controllers/Profiles.php */ ?>