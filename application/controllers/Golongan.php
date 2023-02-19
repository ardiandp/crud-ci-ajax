<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelgolongan');
	}

	public function golongan_tampil()
	{
		$data['gol']=$this->Modelgolongan->golongan_tampil()->result();
		echo json_encode($data);
	}



}

/* End of file Golongan.php */
/* Location: ./application/controllers/Golongan.php */