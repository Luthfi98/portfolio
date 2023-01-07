<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

		$users = User::all();
		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'List Pengguna',
			'users'  => $users,
		];

		$this->template->load('templates/cms','cms/users', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		if (!$users) {
			danger('Data pengguna tidak ditemukan');
			redirect('users','refresh');
		}

		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'Detail Data Pengguna',
			'user' => $users
		];

		$this->template->load('templates/cms','cms/users-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'Tambah Data Pengguna',
		];

		$this->template->load('templates/cms','cms/users-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		if (!$request) {
			danger('Data pengguna tidak ditemukan');
			redirect('users/create','refresh');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', messageError());
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]', messageError());
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required', messageError());
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', messageError());
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'trim|required|matches[password]', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$users = new User;
			$users->fullname = $request['fullname'];
			$users->username = $request['username'];
			$users->email = $request['email'];
			$users->password = password_hash($request['password'], PASSWORD_DEFAULT);
			$users->save();

			success('Berhasil menambahkan data pengguna');
			redirect('users');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			$this->create();
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		if (!$users) {
			danger('Data pengguna tidak ditemukan');
			redirect('users','refresh');
		}

		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'Ubah Data Pengguna',
			'users' => $users
		];

		$this->template->load('templates/cms','cms/users-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		// var_dump($request);die;

		if (!$users) {
			danger('Data pengguna tidak ditemukan');
			redirect('users', 'refresh');
		}

		if (!$request) {
			danger('Data yang dimasukkan tidak valid');
			redirect('users/edit/'.$id,'refresh');
		}


		$is_unique = '';
		$is_unique_email = '';

		if($users->username != $request['username']){
			$is_unique = '|is_unique[users.username]';
			$is_unique_email = '|is_unique[users.email]';
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required'.$is_unique, messageError());
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required'.$is_unique, messageError());
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required', messageError());
		$this->form_validation->set_rules('password', 'Password', 'trim|', messageError());
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'trim|matches[password]', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			// $users = new User;
			$users->fullname = $request['fullname'];
			$users->username = $request['username'];
			$users->email = $request['email'];
			if ($request['password']) {
				$users->password = password_hash($request['password'], PASSWORD_DEFAULT);
			}
			$users->save();
			success('Berhasil memperbarui data pengguna');
			redirect('users');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			$this->edit(encrypt_decrypt('encrypt',$id));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		if (!$users) {
			danger('Data pengguna tidak ditemukan');
			redirect('users','refresh');
		}

		$users->delete();
		redirect('users','refresh');
	}


}
