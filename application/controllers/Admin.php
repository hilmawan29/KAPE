<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller { 
	public function __construct() {
		parent :: __construct();
		is_logged_in();
		$this->load->model('User_model', 'user');
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Employee_model', 'employee');
    	$this->load->model('Patient_model', 'patient');
	}

	public function index() {
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

		public function role() {
		$data['title'] = 'Role';
		$data['user'] = $this->user->getUserData();
        $data['role'] = $this->admin->getUserRoleAll();
        $this->form_validation->set_rules('role', 'Role Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $role_name = $this->input->post('role');
            $data = [
                'role' => $role_name
            ];
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);
            if ($user_role->num_rows() < 1) {
                $this->db->insert('user_role', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Added!</div>');
                redirect('admin/role');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role is exist!</div>');
                redirect('admin/role');
            }
        }
	}

		public function roleAccess($role_id) {
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

		public function changeaccess() {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
    }

    public function editrole($role_id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->admin->getUserRoleById($role_id);;

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $role_name = $this->input->post('role');
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);
            if ($user_role->num_rows() < 1) {
                $this->db->set('role', $role_name);
                $this->db->where('id', $role_id);
                $this->db->update('user_role');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Role Success!</div>');
                redirect('admin/role/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role name is exist or same!</div>');
                redirect('admin/editrole/' . $role_id);
            }
        }
    }

    public function deleterole($role_id)
    {
        $role = $this->admin->getUserRoleById($role_id);

        $this->db->delete('user_role', ['id' => $role_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $role['role'] . ' role is deleted!</div>');
        redirect('admin/role');
    }

    public function inputData() {
    	$data['title'] = 'Visitor Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['employees'] = $this->employee->select_all();
        $start_date = $this->input->get('start_date', TRUE);
        $end_date = $this->input->get('end_date', TRUE);
        if ($start_date == '' && $end_date == '') {
            $data['patients'] = $this->patient->select_all();    
        }else{
		  $data['patients'] = $this->patient->select_all_by_date($start_date, $end_date);
        }
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/input-data', $data);
		$this->load->view('templates/footer');
	}

	public function add_data() {
		$data['title'] = 'Add Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('check_in', 'Check in', 'required');
		$this->form_validation->set_rules('check_out', 'Check out', 'required');
		$this->form_validation->set_rules('employee_id', 'Employee', 'required');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('drugs', 'Drugs', 'required');
		$this->form_validation->set_rules('conclusion', 'Conclusion', 'required');
		if ($this->form_validation->run() == FALSE) {
			// $data['subMenu'] = $this->menu->getSubMenu();
			// $data['menu'] = $this->db->get('user_menu')->result_array();
			redirect('admin/inputData');
	
		}else{
			$data = [
				'check_in' => $this->input->post('check_in'),
				'check_out' => $this->input->post('check_out'),
				'employee_id' => $this->input->post('employee_id'),
				'diagnosis' => $this->input->post('diagnosis'),
				'drugs' => $this->input->post('drugs'),
				'conclusion' => $this->input->post('conclusion')
			];
			$this->patient->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New data added!</div>');
			redirect('admin/inputData');
		}
	}

	public function get_employee() {
		$nik = $this->input->post('nik');
		$data = $this->employee->get_data_by_nik($nik);
		echo json_encode($data);
	}

	public function editpat($patient_id)
    {
        $data['title'] = 'Edit Data Patient';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $this->patient->get_by_id($patient_id);

        $this->form_validation->set_rules('check_in', 'Check in', 'required');
		$this->form_validation->set_rules('check_out', 'Check out', 'required');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
		$this->form_validation->set_rules('drugs', 'Drugs', 'required');
		$this->form_validation->set_rules('conclusion', 'Conclusion', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-patient', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $patient_name = $this->input->post('title');
            $data_pat = [
                'check_in' => $this->input->post('check_in'),
                'check_out' => $this->input->post('check_out'),
                'diagnosis' => $this->input->post('diagnosis'),
                'drugs' => $this->input->post('drugs'),
                'conclusion' => $this->input->post('conclusion')

            ];
            $this->db->set($data_pat);
            $this->db->where('id', $patient_id);
            $this->db->update('patient');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Patient Data Success!</div>');
            redirect('admin/inputData');
        }
    }
    public function deletepat($patient_id)
    {
        $patientt = $this->patient->get_by_id($patient_id);

        $this->db->delete('patient', ['id' => $patient_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Patient data is deleted!</div>');
        redirect('admin/inputData');
    }

    public function detailpat($patient_id) {
        $get_data = $this->patient->get_by_id($patient_id);
        $data['title'] = 'Detail Patient';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['patient'] = $get_data;
        $data['employee'] = $this->employee->get_data_by_id($get_data['employee_id']);

        $this->form_validation->set_rules('check_in', 'Check in', 'required');
        $this->form_validation->set_rules('check_out', 'Check out', 'required');
        $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
        $this->form_validation->set_rules('drugs', 'Drugs', 'required');
        $this->form_validation->set_rules('conclusion', 'Conclusion', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail-patient', $data);
        $this->load->view('templates/footer');
    }

    public function add_employee() {
        $data['title'] = 'Add Employee';
        $data['user'] = $this->user->getUserData();
        $data['employee'] = $this->employee->select_all();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required|is_unique[employee.nik]');
       
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/employee', $data);
            $this->load->view('templates/footer', $data);
        } else {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10024;
        $config['max_height']           = 10024;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            // die($this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .$this->upload->display_errors().'</div>');
            redirect('admin/add_employee');
        } else {
            $uploaded_data = $this->upload->data();
            $name = $this->input->post('name'); 
            $foto = $uploaded_data['file_name'];
            $department = $this->input->post('department');
            $age = $this->input->post('age');
            $nik = $this->input->post('nik');            
            $data = [
                'foto' => $foto,
                'name' => $name,
                'department' => $department,
                'age' => $age,
                'nik' => $nik
            ];
            $this->db->insert('employee', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Added!</div>');
            redirect('admin/add_employee');
        }
    }
    }

    public function editemployee($employee_id)
    {
        $get_data = $this->employee->EditEmployee($employee_id);
        $data['title'] = 'Edit Employee';
        $data['user'] = $this->user->getUserData();
        $data['employee'] = $get_data;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-employee', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 10024;
            $config['max_height']           = 10024;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto') && $_FILES['foto']['name'] != '') {
            // die($this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .$this->upload->display_errors().'</div>');
            redirect('admin/add_employee');
        } else {
            $uploaded_data = $this->upload->data();
            $employee_name = $this->input->post('title');
            $name = $this->input->post('name');
            if($_FILES['foto']['name'] != ''){
                $foto = $uploaded_data['file_name'];                
            }else{
                $foto = $get_data['foto'];
            }
            $department = $this->input->post('department');
            $age = $this->input->post('age');
            $nik = $this->input->post('nik');            
            $data = [
                'foto' => $foto,
                'name' => $name,
                'department' => $department,
                'age' => $age,
                'nik' => $nik
            ];
            $this->db->set($data);
            $this->db->where('id', $employee_id);
            $this->db->update('employee');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Employee Data Success!</div>');
            redirect('admin/add_employee');
        }
        }
    }

    public function deleteEmployee($employee_id) {
        $employee = $this->employee->EditEmployee($employee_id);

        $this->db->delete('employee', ['id' => $employee_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Employee data is deleted!</div>');
        redirect('admin/add_employee');
    }
}