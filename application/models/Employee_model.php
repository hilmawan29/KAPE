<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
	public function select_all() {
		$query = "SELECT `employee`. `id`,`employee`. `name`, `employee`. `department`, `employee`. `age`, `employee`. `nik`, `employee`. `foto`
				  FROM `employee` 
				 ";
				 return $this->db->query($query)->result_array(); 
	}

	public function get_data_by_nik($nik) {
		$query = "SELECT `employee`. `id`,`employee`. `name`, `employee`. `department`, `employee`. `age`, `employee`. `nik`
				  FROM `employee` WHERE `nik` = $nik
				 ";
				 return $this->db->query($query)->row();
	}

	public function EditEmployee($employee_id){
        return $this->db->get_where('employee', ['id' => $employee_id])->row_array();
    }

    public function get_data_by_id($id) {
		$query = "SELECT `employee`. `id`,`employee`. `name`, `employee`. `department`, `employee`. `age`, `employee`. `nik`, `employee`. `foto`
				  FROM `employee` WHERE `id` = $id
				 ";
				 return $this->db->query($query)->row();
	}
}