<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

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

		$project = Project::all();
		// var_dump($project->toArray());die;
		$data = [
			'title' => 'Projek',
			'breadcrumb' => 'List Projek',
			'project'  => $project,
		];
		$this->template->load('templates/cms','cms/project', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$project = Project::find($id);
		if (!$project) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('projects'),'refresh');
		}

		$data = [
			'title' 		=> 'Projek',
			'breadcrumb' 	=> 'Detail Data Projek',
			'project' 		=> $project,
		];


		$this->template->load('templates/cms','cms/project-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Projek',
			'breadcrumb' => 'Tambah Data Projek',
			'type' => Project::groupBy('type')->get(['type'])
		];

		$this->template->load('templates/cms','cms/project-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data pengalaman tidak ditemukan');
			redirect('projects/create','refresh');
		}

		$this->form_validation->set_rules('title', 'Nama Projek', 'trim|required', messageError());
		$this->form_validation->set_rules('type', 'Tipe Projek', 'trim|required', messageError());
		$this->form_validation->set_rules('description', 'Keterangan', 'trim|required', messageError());
		if ($_FILES['image']['name'] != '') {
			$this->form_validation->set_rules('image', 'Gambar', 'trim|callback_upload_image', messageError());
		}
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$project = new Project;
			$project->title = $request['title'];
			$project->type = $request['type'];
			$project->slug = url_title($request['title'], 'dash', 'true');
			$project->description = $request['description'];
			if ($_FILES['image']['name'] != '') {
				$project->image = $this->session->userdata('image');
				$this->session->unset_userdata('image');
			}
			$project->save();

			success('Berhasil menambahkan data pengalaman');
			redirect(base_url('projects'));
		} else {
			$error = getErrorValidation();
			$error['image'] = strip_tags(form_error('image'));

			if (form_error('image') && $_FILES['image']['name']) {
				unlink($this->session->userdata('image'));
			}
			$this->session->set_flashdata('error', $error);
			redirect(base_url('projects/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$project = Project::find($id);
		if (!$project) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('projects'),'refresh');
		}
		$data = [
			'title' => 'Projek',
			'breadcrumb' => 'Ubah Data Projek',
			'project' => $project,
			'type' => Project::groupBy('type')->get(['type'])
		];

		$this->template->load('templates/cms','cms/project-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$project = Project::find($id);

		if (!$project) {
			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('projects'), 'refresh');
		}

		if (!$request) {
			redirect('projects/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('title', 'Nama Projek', 'trim|required', messageError());
		$this->form_validation->set_rules('type', 'Tipe Projek', 'trim|required', messageError());
		$this->form_validation->set_rules('description', 'Keterangan', 'trim|required', messageError());
		if ($_FILES['image']['name'] != '') {
			$this->form_validation->set_rules('image', 'Gambar', 'trim|callback_upload_image', messageError());
		}
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$project->title = $request['title'];
			$project->type = $request['type'];
			$project->slug = url_title($request['title'], 'dash', 'true');
			$project->description = $request['description'];
			if ($_FILES['image']['name'] != '') {
				$project->image = $this->session->userdata('image');
				$this->session->unset_userdata('image');
			}
			$project->save();

			success('Berhasil memperbarui data pengalaman');
			redirect(base_url('projects'));
		} else {
			$error = getErrorValidation();
			$error['image'] = strip_tags(form_error('image'));

			if (form_error('image') && $_FILES['image']['name']) {
				unlink($this->session->userdata('image'));
			}
			$this->session->set_flashdata('error', $error);
			redirect(base_url('projects/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$project = Project::find($id);
		if (!$project) {

			danger('Data pengalaman tidak ditemukan');
			redirect(base_url('projects'),'refresh');
		}

		$project->delete();

		success('Berhasil menghapus data pengalaman');
		redirect(base_url('projects'),'refresh');
	}

	function upload_image()
	{
		$path = 'uploads/projects/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}
		$path = '/uploads/projects/';
		$config['upload_path'] = '.'.$path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = uniqid().'-'.date('y-m-d').'-'.$_FILES['image']['name'];
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('image')){
			$this->form_validation->set_message('upload_image', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode('.', $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			if ($ext != 'webp') {
				$webp = covertToWebp('.'.$path, $this->upload->data('file_name'));
			}
			$file = $this->session->set_userdata('image', $path.$webp);
			return TRUE;
		}
	}
}
