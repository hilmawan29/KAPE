<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {
	public function select_all() {
		$query = "SELECT `patient`.*, `employee`. `name`, `employee`. `department`  
				  FROM `patient` JOIN `employee`
				  ON `employee`.`id` = `patient`.`employee_id`  
				 ";
				 return $this->db->query($query)->result_array(); 
	}

	public function insert($data){
		return $this->db->insert('patient',$data);
	}

	public function get_by_id($id) {
		$query = "SELECT `patient`. `id`,`patient`. `check_in`, `patient`. `check_out`, `patient`. `diagnosis`, `patient`. `drugs`, `patient`. `conclusion`, `patient`. `employee_id`
				  FROM `patient` WHERE `id` = $id
				 ";
				 return $this->db->query($query)->row_array();
	}
}