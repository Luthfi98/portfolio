<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

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
		if($this->input->is_ajax_request()){
			$this->getData();
		}else{
			
			$data = [
				'title' => 'Akses Log',
				'breadcrumb' => 'Akses Log'
			];
			$this->template->load('templates/cms','cms/logs/index', $data,FALSE);
		}
	}

	private function getData()  {
		$this->load->model('DTmodel');
		$column_order = [null, 'ip','url', 'platform', 'created_at'];
		$column_search = ['ip','url', 'platform', 'created_at'];
		$order = ['created_at' => 'DESC'];

		$where = ['deleted_at' => null];
		$query = [
			'table' => 'access_logs',
			'select' => '*',
			'where' => $where,
			'join' => []
		];
		// var_dump($this->input->post('tipe'));
		$dataquery = $this->DTmodel->getDataTables($query, $column_order, $column_search, $order);
		$data = [];
		$no = @$_POST['start'];
		foreach ($dataquery as $value) {
			$no++;
			$row = [];
			$row[] = $no . ".";
			$row[] = $value->ip;
			$row[] = $value->url;
			$row[] = $value->platform;
			if ($value->created_at) {
				$date = date("Y-m-d", strtotime($value->created_at));
				$time = date("H:i:s", strtotime($value->created_at));
				$row[] = date_format_indo($date).'<br>'.$time ;
			}else{
				$row[] = '-';
			}
			$data[] = $row;
		}
		$output = [
			'draw' => @$_POST['draw'],
			'recordsTotal' => $this->DTmodel->countAll($query),
			'recordsFiltered' => $this->DTmodel->countFilters($query, $column_order, $column_search, $order),
			'data' => $data,
		];


		$this->output->set_output(json_encode($output));
	}

}
