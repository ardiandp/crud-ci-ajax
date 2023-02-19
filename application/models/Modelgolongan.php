<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelgolongan extends CI_Model {

	function golongan_tampil()
	{
		return $this->db->get('databarang_golongan');
	}

}

/* End of file Modelgolongan.php */
/* Location: ./application/models/Modelgolongan.php */