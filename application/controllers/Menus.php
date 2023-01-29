<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

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

		$menu = Menu::with('parent')->get();
		$data = [
			'title' => 'Menu',
			'breadcrumb' => 'List Menu',
			'menu'  => $menu,
		];
		$this->template->load('templates/cms','cms/menus', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$menu = Menu::find($id);
		if (!$menu) {
			danger('Data menu tidak ditemukan');
			redirect(base_url('menus'),'refresh');
		}

		$data = [
			'title' 		=> 'Menu',
			'breadcrumb' 	=> 'Detail Data Menu',
			'menu' 		=> $menu,
		];


		$this->template->load('templates/cms','cms/menus-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Menu',
			'breadcrumb' => 'Tambah Data Menu',
			'parent' => Menu::get()
		];

		$this->template->load('templates/cms','cms/menus-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		// var_dump($request);die;
		if (!$request) {
			danger('Data menu tidak ditemukan');
			redirect('menus/create','refresh');
		}

		$this->form_validation->set_rules('title', 'Nama Menu', 'trim|required', messageError());
		$this->form_validation->set_rules('parent_id', 'Parent Menu', 'trim', messageError());
		$this->form_validation->set_rules('url', 'URL', 'trim|required', messageError());
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required', messageError());
		$this->form_validation->set_rules('sort', 'Urutan Menu', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');
		// var_dump($this->form_validation->run());die;
		if ($this->form_validation->run()) {
			$menu = new Menu;
			$menu->title = $request['title'];
			$menu->parent_id = $request['parent_id'] ? $request['parent_id'] : null ;
			$menu->url = $request['url'];
			$menu->icon = $request['icon'];
			$menu->sort = $request['sort'];
			$menu->save();

			success('Berhasil menambahkan data menu');
			redirect(base_url('menus'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('menus/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$menu = Menu::find($id);
		if (!$menu) {
			danger('Data menu tidak ditemukan');
			redirect(base_url('menus'),'refresh');
		}
		$data = [
			'title' => 'Menu',
			'breadcrumb' => 'Ubah Data Menu',
			'menu' => $menu,
			'parent' => Menu::get()

		];

		$this->template->load('templates/cms','cms/menus-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$menu = Menu::find($id);

		if (!$menu) {
			danger('Data menu tidak ditemukan');
			redirect(base_url('menus'), 'refresh');
		}

		if (!$request) {
			redirect('menus/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('title', 'Nama Menu', 'trim|required', messageError());
		$this->form_validation->set_rules('parent_id', 'Parent Menu', 'trim', messageError());
		$this->form_validation->set_rules('url', 'URL', 'trim|required', messageError());
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required', messageError());
		$this->form_validation->set_rules('sort', 'Urutan Menu', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$menu->title = $request['title'];
			$menu->parent_id = $request['parent_id'] ? $request['parent_id'] : null ;
			$menu->url = $request['url'];
			$menu->icon = $request['icon'];
			$menu->sort = $request['sort'];
			$menu->save();

			success('Berhasil memperbarui data menu');
			redirect(base_url('menus'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('menus/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$menu = Menu::find($id);
		if (!$menu) {

			danger('Data menu tidak ditemukan');
			redirect(base_url('menus'),'refresh');
		}

		$menu->delete();

		success('Berhasil menghapus data menu');
		redirect(base_url('menus'),'refresh');
	}

}
