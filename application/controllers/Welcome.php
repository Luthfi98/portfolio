<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		countVisitor();
		$this->output->cache(1440);
	}

	public function index()
	{
		$experience = Experience::orderBy('start_at', 'DESC')->get();
		$skill = Skill::get();
		$project = Project::limit(6)->get();
		$data = [
			'title' => 'Home',
			'experience' => $experience,
			'skill' => $skill,
			'project' => $project,
			'type' => Project::groupBy('type')->get(['type'])
		];
		$this->template->load('templates/landing','landing/home', $data,FALSE);
	}

	function project($slug)
	{
		$project = Project::where('slug', $slug)->first();
		$projects = Project::where('id', '!=', $project->id)->limit(3)->get();
		$type = Project::groupBy('type')->get(['type']);
		$data = [
			'title' => $project->title,
			'project' => $project,
			'projects' => $projects,
			'type' => $type
		];
		$this->template->load('templates/landing','landing/project-detail', $data,FALSE);
	}

	public function cv()
	{
		$this->load->library('Pdf');
		
		$experience = Experience::orderBy('start_at', 'DESC')->get();
		$skill = Skill::get();
		$project = Project::get();
		$education = Education::get();
		$sosmed = SosmedAccount::with('sosmed')->get();
		$data = [
			'title' => 'Curiculum Vitae Luthfi Ihdalhusnayain',
			'experience' => $experience,
			'skill' => $skill,
			'project' => $project,
			'education' => $education,
			'sosmed' => $sosmed
		];

		$html = $this->load->view('cv-pdf', $data, true);
		$this->pdf->createPDF($html, $data['title'], false, 'A4', 'potrait');
	}

}
