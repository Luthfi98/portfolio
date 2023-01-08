<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
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

}
