<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmeds extends CI_Controller {

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

		$sosmed = Sosmed::all();
		// var_dump($sosmed->toArray());die;
		$data = [
			'title' => 'Sosial Media',
			'breadcrumb' => 'List Sosial Media',
			'sosmed'  => $sosmed,
		];
		$this->template->load('templates/cms','cms/sosmeds/index', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$sosmed = Sosmed::find($id);
		if (!$sosmed) {
			danger('Data sosial media tidak ditemukan');
			redirect(base_url('sosmeds'),'refresh');
		}

		$data = [
			'title' 		=> 'Sosial Media',
			'breadcrumb' 	=> 'Detail Data Sosial Media',
			'sosmed' 		=> $sosmed,
		];


		$this->template->load('templates/cms','cms/sosmeds/show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Sosial Media',
			'breadcrumb' => 'Tambah Data Sosial Media'
		];

		$this->template->load('templates/cms','cms/sosmeds/create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data sosial media tidak ditemukan');
			redirect('sosmeds/create','refresh');
		}

		$this->form_validation->set_rules('name', 'Nama sosial media', 'trim|required', messageError());
		$this->form_validation->set_rules('icon', 'Icon sosial media', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$sosmed = new Sosmed;
			$sosmed->name = $request['name'];
			$sosmed->icon = $request['icon'];
			$sosmed->save();

			success('Berhasil menambahkan data sosial media');
			redirect(base_url('sosmeds'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('sosmeds/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$sosmed = Sosmed::find($id);
		if (!$sosmed) {
			danger('Data sosial media tidak ditemukan');
			redirect(base_url('sosmeds'),'refresh');
		}
		$data = [
			'title' => 'Sosial Media',
			'breadcrumb' => 'Ubah Data Sosial Media',
			'sosmed' => $sosmed,
		];

		$this->template->load('templates/cms','cms/sosmeds/edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$sosmed = Sosmed::find($id);

		if (!$sosmed) {
			danger('Data sosial media tidak ditemukan');
			redirect(base_url('sosmeds'), 'refresh');
		}

		if (!$request) {
			redirect('sosmeds/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('name', 'Nama sosial media', 'trim|required', messageError());
		$this->form_validation->set_rules('icon', 'Icon sosial media', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {

			$sosmed->name = $request['name'];
			$sosmed->icon = $request['icon'];
			$sosmed->save();

			success('Berhasil memperbarui data sosial media');
			redirect(base_url('sosmeds'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('sosmeds/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$sosmed = Sosmed::find($id);
		if (!$sosmed) {

			danger('Data sosial media tidak ditemukan');
			redirect(base_url('sosmeds'),'refresh');
		}

		$sosmed->delete();

		success('Berhasil menghapus data sosial media');
		redirect(base_url('sosmeds'),'refresh');
	}
}
