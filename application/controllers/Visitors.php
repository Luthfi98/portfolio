<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends CI_Controller {

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
				'title' => 'Pengunjung Website',
				'breadcrumb' => 'Pengunjung Website',
			];
			$this->template->load('templates/cms','cms/visitors/index', $data,FALSE);
		}
	}

	private function getData()  {
		$this->load->model('DTmodel');
		$column_order = [null, 'ip','date', 'hits', 'online'];
		$column_search = ['ip','date', 'hits', 'online'];
		$order = ['created_at' => 'DESC'];

		$where = ['deleted_at' => null];
		$query = [
			'table' => 'visitors',
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
			$row[] = date_format_indo($value->date);
			$row[] = $value->hits;
			if ($value->online) {
				$date = date("Y-m-d", $value->online);
				$time = date("H:i:s", $value->online);
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
