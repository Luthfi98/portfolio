<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

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

		$skill = Skill::all();
		// var_dump($skill->toArray());die;
		$data = [
			'title' => 'Pengalaman',
			'breadcrumb' => 'List Pengalaman',
			'skill'  => $skill,
		];
		$this->template->load('templates/cms','cms/skill', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$skill = Skill::find($id);
		if (!$skill) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('skills'),'refresh');
		}

		$data = [
			'title' 		=> 'Pengalaman',
			'breadcrumb' 	=> 'Detail Data Pengalaman',
			'skill' 		=> $skill,
		];


		$this->template->load('templates/cms','cms/skill-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Pengalaman',
			'breadcrumb' => 'Tambah Data Pengalaman',
			'level' => Skill::groupBy('level')->get(['level'])
		];

		$this->template->load('templates/cms','cms/skill-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data pengalaman tidak ditemukan');
			redirect('skills/create','refresh');
		}

		$this->form_validation->set_rules('name', 'Nama Kemampuan', 'trim|required', messageError());
		$this->form_validation->set_rules('percentage', 'Persentase', 'trim|required', messageError());
		$this->form_validation->set_rules('level', 'Level', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$skill = new Skill;
			$skill->name = $request['name'];
			$skill->percentage = $request['percentage'];
			$skill->level = $request['level'];
			$skill->save();

			success('Berhasil menambahkan data pengalaman');
			redirect(base_url('skills'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('skills/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$skill = Skill::find($id);
		if (!$skill) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('skills'),'refresh');
		}
		$data = [
			'title' => 'Pengalaman',
			'breadcrumb' => 'Ubah Data Pengalaman',
			'skill' => $skill,
			'level' => Skill::groupBy('level')->get(['level'])
			
		];

		$this->template->load('templates/cms','cms/skill-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$skill = Skill::find($id);

		if (!$skill) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('skills'), 'refresh');
		}

		if (!$request) {
			redirect('skills/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('name', 'Nama Kemampuan', 'trim|required', messageError());
		$this->form_validation->set_rules('percentage', 'Persentase', 'trim|required', messageError());
		$this->form_validation->set_rules('level', 'Level', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {

			$skill->name = $request['name'];
			$skill->percentage = $request['percentage'];
			$skill->level = $request['level'];
			$skill->save();

			success('Berhasil memperbarui data pengalaman');
			redirect(base_url('skills'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('skills/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$skill = Skill::find($id);
		if (!$skill) {

			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('skills'),'refresh');
		}

		$skill->delete();

		success('Berhasil menghapus data pengalaman');
		redirect(base_url('skills'),'refresh');
	}
}
