<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_project_con extends CI_Controller {

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
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'create_at'=>$this->input->post('create_at')
		);
		
		$this->my_project_model->insert_register($data_user); //เรียกใช้ function insert_register // function insert_register ใช้คำสั่ง insert ข้อมูลเข้าฐานข้อมูล แล้วเรียก array data_user นำข้อมูลที่ส่งมาจาก form มาใส่	
        echo '<script> alert("เพิ่มข้อมูลของท่านเรียบร้อยแล้ว");</script>';
        redirect('my_project_con');
	}
    // login //
    public function login(){

        $data = $this->session->userdata('logged_in');
    if($data['id'] != NULL && $data != ''){
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL='.site_url('my_project_con/login_view').'">';
                    exit();
    }else{
            $this->load->view('welcome_message');
            }






    }

    public function check(){
        //set 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

                if ($this->form_validation->run() == FALSE)
                {
            $this->load->view('welcome_message');
                }
                else
                {
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL='.site_url('my_project_con/login_view').'">';
                    exit();
                }

    }

    public function check_database($password){
        //input usernmae
        $username = $this->input->post('username');
        //query  data check 
        $result  = $this->my_project_model->check_login($username,$password);
        if($result){
            $sess_array = array();

                   $sess_array = array(
                     'id' => $result['id'],
                     'username' =>$result['username'],
                     'name' => $result['name']
                 );

                 $this->session->set_userdata('logged_in', $sess_array);

            return TRUE;
        }else{

             $this->form_validation->set_message('check_database', 'ไมพบ username และ password ในระบบ');
            return false;

        }
    }

    public function logout()
     {
       $this->session->unset_userdata('logged_in');
       session_destroy();
       redirect('login', 'refresh');
     }


}

	

