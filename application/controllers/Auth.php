<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$request = $this->input->post();
		if ($request) {
			$this->cekLogin($request);
		}else{
			$data['title'] ="Login";
			$this->load->view('login', $data);
		}
	}

	private function cekLogin($request)
	{
		$username = $request['username'];
		$password = $request['password'];

		$user = User::where('username', $username)->first();
		// dd(password_hash('admin', PASSWORD_DEFAULT));
		if ($user) {
			if (password_verify($password, $user->password)) {
				$session = [
					encrypt_decrypt('encrypt', 'id') => encrypt_decrypt('encrypt',$user->id),
					'session' => uniqid().date("ymdhis").$user->id
				];
				// var_dump($user->toArray(), $session);die;

				$this->session->set_userdata('user_session',$session);
				redirect('dashboard','refresh');
				
			}else{
				danger('Username dan Password tidak sesuai');
				redirect('login','refresh');	
			}
		}else{
			danger('Username dan Password tidak sesuai');
			redirect('login','refresh');
		}

	}

	function logout()
	{
		$this->session->sess_destroy();
		success('Anda telah keluar');
		// var_dump($this->session->flashdata());die;
		redirect('login');
	}

	function account()
	{
		if (!isLogin()) {
			danger("Anda belum login, silahkan login terlebih dahulu");
			redirect('login');
		}
		$user = user();
		$data = [
			'title' => 'Profile',
			'breadcrumb' => 'Profile',
			'user'  => $user,
		];

		$this->template->load('templates/cms','cms/accounts', $data,FALSE);
	}

	function updateProfile()
	{
		if (!isLogin()) {
			danger("Anda belum login, silahkan login terlebih dahulu");
			redirect('login');
		}
		
		$request = $this->input->post();
		$user = user();

		if ($request['password'] || $request['old'] || $request['conf']) {
			if (!password_verify($request['old'], $user->password)) {
				danger('Password lama tidak sesuai');
				redirect('account');
				exit();
			}
			if ($request['password'] != $request['conf']) {
				danger('Konfirmasi password tidak sesuai');
				redirect('account');
				exit();
			}

			if ($request['password'] == '' || $request['old'] == '' || $request['conf'] == '') {
				danger('Password gagal diubah');
				redirect('account');
				exit();
			}

			$user->password = password_hash($request['password'], PASSWORD_DEFAULT);
		}else{
			if ($request['fullname'] == '' || $request['username'] == '') {
				danger('Data account gagal diubah');
				redirect('account');
				exit();
			}
			$cekUsername =  User::where('id', '!=',$user->id)->where('username', $request['username'])->first();
			if ($cekUsername) {
				danger('Username sudah tidak tersedia');
				redirect('account');
				exit();	
			}

			$user->fullname = $request['fullname'];
			$user->username = $request['username'];
		}

		$user->save();
		success('Data account berhasil diperbarui');
		redirect('account');	
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */ ?>