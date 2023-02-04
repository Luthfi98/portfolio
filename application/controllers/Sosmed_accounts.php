<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmed_accounts extends CI_Controller {

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

		$sosmed = SosmedAccount::with('sosmed')->get();
		// var_dump($sosmed->toArray());die;
		$data = [
			'title' => 'Akun Sosial Media',
			'breadcrumb' => 'List Akun Sosial Media',
			'sosmed'  => $sosmed,
		];
		$this->template->load('templates/cms','cms/sosmed_accounts/index', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$sosmed = SosmedAccount::find($id);
		if (!$sosmed) {
			danger('Data akun sosial media tidak ditemukan');
			redirect(base_url('sosmed_accounts'),'refresh');
		}

		$data = [
			'title' 		=> 'Akun Sosial Media',
			'breadcrumb' 	=> 'Detail Data Akun Sosial Media',
			'sosmed' 		=> $sosmed,
		];


		$this->template->load('templates/cms','cms/sosmed_accounts/show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Akun Sosial Media',
			'breadcrumb' => 'Tambah Data Akun Sosial Media',
			'sosmed' => Sosmed::all()
		];

		$this->template->load('templates/cms','cms/sosmed_accounts/create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data akun sosial media tidak ditemukan');
			redirect('sosmed_accounts/create','refresh');
		}

		$this->form_validation->set_rules('sosmed_id', 'Nama sosial media', 'trim|required', messageError());
		$this->form_validation->set_rules('name', 'Nama akun sosial media', 'trim|required', messageError());
		$this->form_validation->set_rules('link', 'link akun sosial media', 'trim|required|valid_url', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$sosmed = new SosmedAccount;
			$sosmed->sosmed_id = $request['sosmed_id'];
			$sosmed->name = $request['name'];
			$sosmed->link = $request['link'];
			$sosmed->save();

			success('Berhasil menambahkan data sosial media');
			redirect(base_url('sosmed_accounts'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('sosmed_accounts/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$account = SosmedAccount::find($id);
		if (!$account) {
			danger('Data akun sosial media tidak ditemukan');
			redirect(base_url('sosmed_accounts'),'refresh');
		}
		$data = [
			'title' => 'Akun Sosial Media',
			'breadcrumb' => 'Ubah Data Akun Sosial Media',
			'account' => $account,
			'sosmed' => Sosmed::all()
		];

		$this->template->load('templates/cms','cms/sosmed_accounts/edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$sosmed = SosmedAccount::find($id);

		if (!$sosmed) {
			danger('Data akun sosial media tidak ditemukan');
			redirect(base_url('sosmed_accounts'), 'refresh');
		}

		if (!$request) {
			redirect('sosmed_accounts/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('sosmed_id', 'Nama sosial media', 'trim|required', messageError());
		$this->form_validation->set_rules('name', 'Nama akun sosial media', 'trim|required', messageError());
		$this->form_validation->set_rules('link', 'link akun sosial media', 'trim|required|valid_url', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {

			$sosmed->sosmed_id = $request['sosmed_id'];
			$sosmed->name = $request['name'];
			$sosmed->link = $request['link'];
			$sosmed->save();

			success('Berhasil memperbarui data sosial media');
			redirect(base_url('sosmed_accounts'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('sosmed_accounts/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$sosmed = SosmedAccount::find($id);
		if (!$sosmed) {

			danger('Data akun sosial media tidak ditemukan');
			redirect(base_url('sosmed_accounts'),'refresh');
		}

		$sosmed->delete();

		success('Berhasil menghapus data sosial media');
		redirect(base_url('sosmed_accounts'),'refresh');
	}
}
