<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Educations extends CI_Controller {

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

		$education = Education::all();
		// var_dump($education->toArray());die;
		$data = [
			'title' => 'Riwayat Pendidikan',
			'breadcrumb' => 'List Riwayat Pendidikan',
			'education'  => $education,
		];
		$this->template->load('templates/cms','cms/educations', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$education = Education::find($id);
		if (!$education) {
			danger('Data riwayat pendidikan tidak ditemukan');
			redirect(base_url('educations'),'refresh');
		}

		$data = [
			'title' 		=> 'Riwayat Pendidikan',
			'breadcrumb' 	=> 'Detail Data Riwayat Pendidikan',
			'education' 		=> $education,
		];


		$this->template->load('templates/cms','cms/educations-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Riwayat Pendidikan',
			'breadcrumb' => 'Tambah Data Riwayat Pendidikan',
		];

		$this->template->load('templates/cms','cms/educations-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data riwayat pendidikan tidak ditemukan');
			redirect('educations/create','refresh');
		}

		$this->form_validation->set_rules('name', 'Nama Universitas / Sekolah', 'trim|required', messageError());
		$this->form_validation->set_rules('level', 'Tingkat Pendidikan', 'trim|required', messageError());
		$this->form_validation->set_rules('major', 'Jurusan', 'trim|required', messageError());
		$this->form_validation->set_rules('title', 'Gelar', 'trim', messageError());
		$this->form_validation->set_rules('ipk', 'IPK', 'trim', messageError());
		$this->form_validation->set_rules('in', 'Tanggal Masuk', 'trim|required', messageError());
		$this->form_validation->set_rules('out', 'Tanggal Lulus', 'trim', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$education = new Education;
			$education->name = $request['name'];
			$education->level = $request['level'];
			$education->major = $request['major'];
			$education->title = $request['title'];
			$education->in = $request['in'];
			$education->ipk = $request['ipk'];
			$education->out = $request['out'];
			$education->save();

			success('Berhasil menambahkan data riwayat pendidikan');
			redirect(base_url('educations'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('educations/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$education = Education::find($id);
		if (!$education) {
			danger('Data riwayat pendidikan tidak ditemukan');
			redirect(base_url('educations'),'refresh');
		}
		$data = [
			'title' => 'Riwayat Pendidikan',
			'breadcrumb' => 'Ubah Data Riwayat Pendidikan',
			'education' => $education
		];

		$this->template->load('templates/cms','cms/educations-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$education = Education::find($id);

		if (!$education) {
			danger('Data riwayat pendidikan tidak ditemukan');
			redirect(base_url('educations'), 'refresh');
		}

		if (!$request) {
			redirect('educations/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('name', 'Nama Universitas / Sekolah', 'trim|required', messageError());
		$this->form_validation->set_rules('level', 'Tingkat Pendidikan', 'trim|required', messageError());
		$this->form_validation->set_rules('major', 'Jurusan', 'trim|required', messageError());
		$this->form_validation->set_rules('title', 'Gelar', 'trim', messageError());
		$this->form_validation->set_rules('ipk', 'IPK', 'trim', messageError());
		$this->form_validation->set_rules('in', 'Tanggal Masuk', 'trim|required', messageError());
		$this->form_validation->set_rules('out', 'Tanggal Lulus', 'trim', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {

			$education->name = $request['name'];
			$education->level = $request['level'];
			$education->major = $request['major'];
			$education->title = $request['title'];
			$education->in = $request['in'];
			$education->ipk = $request['ipk'];
			$education->out = $request['out'];
			$education->save();

			success('Berhasil memperbarui data riwayat pendidikan');
			redirect(base_url('educations'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('educations/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$education = Education::find($id);
		if (!$education) {

			danger('Data riwayat pendidikan tidak ditemukan');
			redirect(base_url('educations'),'refresh');
		}

		$education->delete();

		success('Berhasil menghapus data riwayat pendidikan');
		redirect(base_url('educations'),'refresh');
	}
}
