<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experiences extends CI_Controller {

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

		$experience = Experience::all();
		// var_dump($experience->toArray());die;
		$data = [
			'title' => 'Pengalaman',
			'breadcrumb' => 'List Pengalaman',
			'experience'  => $experience,
		];
		$this->template->load('templates/cms','cms/experience', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$experience = Experience::find($id);
		if (!$experience) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('experiences'),'refresh');
		}

		$data = [
			'title' 		=> 'Pengalaman',
			'breadcrumb' 	=> 'Detail Data Pengalaman',
			'experience' 		=> $experience,
		];


		$this->template->load('templates/cms','cms/experience-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Pengalaman',
			'breadcrumb' => 'Tambah Data Pengalaman',
		];

		$this->template->load('templates/cms','cms/experience-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data pengalaman tidak ditemukan');
			redirect('experiences/create','refresh');
		}

		$this->form_validation->set_rules('office', 'Nama Perusahaan', 'trim|required', messageError());
		$this->form_validation->set_rules('role', 'Posisi', 'trim|required', messageError());
		$this->form_validation->set_rules('start_at', 'Tanggal Mulai Bekerja', 'trim|required', messageError());
		$this->form_validation->set_rules('description', 'Keterangan', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$experience = new Experience;
			$experience->office = $request['office'];
			$experience->role = $request['role'];
			$experience->start_at = $request['start_at'];
			$experience->end_at = $request['end_at'];
			$experience->description = $request['description'];
			$experience->save();

			success('Berhasil menambahkan data pengalaman');
			redirect(base_url('experiences'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('experiences/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$experience = Experience::find($id);
		if (!$experience) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('experiences'),'refresh');
		}
		$data = [
			'title' => 'Pengalaman',
			'breadcrumb' => 'Ubah Data Pengalaman',
			'experience' => $experience
		];

		$this->template->load('templates/cms','cms/experience-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$experience = Experience::find($id);

		if (!$experience) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('experiences'), 'refresh');
		}

		if (!$request) {
			redirect('experiences/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('office', 'Nama Perusahaan', 'trim|required', messageError());
		$this->form_validation->set_rules('role', 'Posisi', 'trim|required', messageError());
		$this->form_validation->set_rules('start_at', 'Tanggal Mulai Bekerja', 'trim|required', messageError());
		$this->form_validation->set_rules('description', 'Keterangan', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {

			$experience->office = $request['office'];
			$experience->role = $request['role'];
			$experience->start_at = $request['start_at'];
			$experience->end_at = $request['end_at'];
			$experience->description = $request['description'];
			$experience->save();

			success('Berhasil memperbarui data pengalaman');
			redirect(base_url('experiences'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('experiences/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$experience = Experience::find($id);
		if (!$experience) {

			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('experiences'),'refresh');
		}

		$experience->delete();

		success('Berhasil menghapus data pengalaman');
		redirect(base_url('experiences'),'refresh');
	}
}
