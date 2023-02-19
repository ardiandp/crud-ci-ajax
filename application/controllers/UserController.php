<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modeluser');
	}

	public function index()
	{
		$data['title']="Daftar User";
		$this->load->view('v_user', $data, FALSE);
	}

	public function data_user()
	{
		$data=$this->Modeluser->user_list();
		echo json_encode($data);
	}

	public function get_user()
	{
		$username=$this->input->get('username');
		$data=$this->Modeluser->get_user_by_id($username);
		echo json_encode($data);
	}

	public function simpan_user()
	{
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$data=$this->Modeluser->simpan_user($username,$email,$password);
		echo json_encode($data);
	}

	public function update_user()
	{
		$username=$this->input->post('username');
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$data=$this->Modeluser->update_user($username,$email,$password);
		echo json_encode($data);
	}

	public function hapus_user()
	{
		$username=$this->input->post('username');
		$data=$this->Modeluser->hapus_user($username);
		echo json_encode($data);
	}

}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */