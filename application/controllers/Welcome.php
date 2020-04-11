<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
		$this->load->model('my_project_model'); //เอาไฟล์ my_project_model มาจาก model ที่สร้างไว้

    }
	// view page //
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function register_view()
	{
		$this->load->view('register');
	}
	public function login_view()
	{
		$this->load->view('user/user_view');
	}
	// register user //
	public function register()
	{
		$data_user=array(
			'name' => $this->input->post('name'),
			'email'=>$this->input->post('email'),
			'picture'=>$this->input->post('picture'),
			'user'=>$this->input->post('username'),
			'pass'=>$this->input->post('password'),
			'create_at'=>$this->input->post('create_at')
		);
		
		$this->my_project_model->insert_register($data_user); //เรียกใช้ function insert_register // function insert_register ใช้คำสั่ง insert ข้อมูลเข้าฐานข้อมูล แล้วเรียก array data_user นำข้อมูลที่ส่งมาจาก form มาใส่	
		echo "<br>OK";		
	}
	// login //
	
}
