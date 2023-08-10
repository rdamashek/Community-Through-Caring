<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


	}

	public function posts($name, $id)
	{

		$data['title'] = 'Needs';

		$data['needs'] = $this->db->where('type', 'need')->where('member_id', $id)->order_by('id', 'desc')->get('goals')->result_array();
		$data['offers'] = $this->db->where('type', 'offer')->where('member_id', $id)->order_by('id', 'desc')->get('goals')->result_array();

		if (@$_SESSION['user']['id'] > 0) {
			$data['fav'] = $this->db->select('goals.*')->where('fav.member_id', $_SESSION['user']['id'])->where('goals.type', 'need')->join('goals', 'fav.goal_id=goals.id')->order_by('id', 'desc')->get('fav')->result_array();
		}

		$data['user'] = $this->db->where('id', $id)->get('member')->result_array()[0];

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('needs_by_person', $data);
		$this->load->view('global/footer', $data);

	}

}
