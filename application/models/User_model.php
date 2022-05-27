<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Users Data
    public function getUserData()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }
    public function getUserDataById($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }

    public function getUserDataAll()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    // Login
    public function userCheckLogin($username)
    {
        $this->db->where("email =  '$username' or username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }
    public function getUserNotAdmin()
    {
       $query = $this->db->get_where('user', ['role_id' => '2']);
        return $query->result_array();
    }
    public function getUserAdmin()
    {
       $query = $this->db->get_where('user', ['role_id' => '1']);
        return $query->result_array();
    }
}