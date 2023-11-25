<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebooks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if (!isLogin()) {
		// 	danger("Anda belum login, silahkan login terlebih dahulu");
		// 	redirect('login');
		// }
		$this->load->model('Phonebook');
	}

	public function index()
	{

		$phonebook = Phonebook::all();
		// var_dump($phonebook->toArray());die;
		$data = [
			'title' => 'Buku Telepon',
			'breadcrumb' => 'List Buku Telepon',
			'phonebook'  => $phonebook,
		];
		$this->template->load('templates/landing','landing/phonebooks/index', $data,FALSE);
	}
	
	public function create()
	{
		$data = [
			'title' => 'Buku Telepon',
			'breadcrumb' => 'Tambah Data Buku Telepon',
			'group' => Phonebook::groupBy('group')->get(['group'])
		];

		$this->template->load('templates/landing','landing/phonebooks/create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data Buku Telepon tidak ditemukan');
			redirect('phonebooks/create','refresh');
		}

		$this->form_validation->set_rules('name', 'Nama', 'trim|required', messageError());
		$this->form_validation->set_rules('number', 'Nomer Telepon', 'trim|required|numeric|min_length[10]|max_length[15]|is_unique[phonebooks.number]', messageError());
		$this->form_validation->set_rules('group', 'Grup', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$phonebook = new Phonebook;
			$phonebook->name = $request['name'];
			$phonebook->number = $request['number'];
			$phonebook->group = $request['group'];
			$phonebook->save();

			success('Berhasil menambahkan data Buku Telepon');
			redirect(base_url('phonebooks'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('phonebooks/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$phonebook = Phonebook::find($id);
		if (!$phonebook) {
			danger('Data Buku Telepon tidak ditemukan');
			redirect(base_url('phonebooks'),'refresh');
		}
		$data = [
			'title' => 'Buku Telepon',
			'breadcrumb' => 'Ubah Data Buku Telepon',
			'phonebook' => $phonebook,
			'group' => Phonebook::groupBy('group')->get(['group'])
			
		];

		$this->template->load('templates/landing','landing/phonebooks/edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$phonebook = Phonebook::find($id);

		if (!$phonebook) {
			danger('Data Buku Telepon tidak ditemukan');
			redirect(base_url('phonebooks'), 'refresh');
		}

		if (!$request) {
			redirect('phonebooks/edit/'.$id,'refresh');
		}

		$is_unique = '';
		if ($phonebook->number != $request['number']) {
			$is_unique = '|is_unique[phonebooks.number]';
		} 

		$this->form_validation->set_rules('name', 'Nama', 'trim|required', messageError());
		$this->form_validation->set_rules('number', 'Nomer Telepon', 'trim|required|numeric|min_length[10]|max_length[15]'.$is_unique, messageError());
		$this->form_validation->set_rules('group', 'Grup', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {

			$phonebook->name = $request['name'];
			$phonebook->number = $request['number'];
			$phonebook->group = $request['group'];
			$phonebook->save();

			success('Berhasil memperbarui data Buku Telepon');
			redirect(base_url('phonebooks'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('phonebooks/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$phonebook = Phonebook::find($id);
		if (!$phonebook) {

			danger('Data Buku Telepon tidak ditemukan');
			redirect(base_url('phonebooks'),'refresh');
		}

		$phonebook->delete();

		success('Berhasil menghapus data Buku Telepon');
		redirect(base_url('phonebooks'),'refresh');
	}
}
