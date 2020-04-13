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
        $data['data_user'] = $this->session->userdata('logged_in');
        $data['data_work'] = $this->my_project_model->show_work_to_do($data);
        //var_dump($data);
        //echo "<br>";
        //echo $data["data_user"]["id"];
        $this->load->view('user/user_view',$data);
    }
    public function update_infor()
	{
        $data['data_user_update'] = $this->session->userdata('logged_in');
        //var_dump($data);
        $this->load->view('user/update_infor',$data);
    }
    public function update_pass()
	{
        $data['data_password_update'] = $this->session->userdata('logged_in');
        $this->load->view('user/update_pass',$data);
    }
    public function add_work()
	{
        $data['data_work'] = $this->session->userdata('logged_in');
        //var_dump($data);
        $data['data_show'] = $this->my_project_model->show_work();
        $this->load->view('user/work_record',$data);
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
                     'password' =>$result['password'],
                     'name' => $result['name'],
                     'email' => $result['email'],
                     'create_at' => $result['create_at'],
                     'update_at' => $result['update_at']
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
       redirect('my_project_con', 'refresh');
     }
     // update user //
     public function updatesave(){
        $this->my_project_model->updatesave();
        redirect('my_project_con/login_view');
    }
    // update pass //
    public function updatesave2(){
        $this->my_project_model->updatesave2();
        redirect('my_project_con/login_view');

    }
    // insert work record //
	public function insert_work()
	{
		$data_work=array(
			'title' => $this->input->post('title'),
			'date_alert	'=>$this->input->post('date_alert'),
			'time_alert'=>$this->input->post('time_alert'),
			'location'=>$this->input->post('location'),
			'date_add'=>$this->input->post('date_add'),
			'id_user'=>$this->input->post('id_user')
		);
		
		$this->my_project_model->insert_work($data_work); //เรียกใช้ function insert_register // function insert_register ใช้คำสั่ง insert ข้อมูลเข้าฐานข้อมูล แล้วเรียก array data_user นำข้อมูลที่ส่งมาจาก form มาใส่	
        echo '<script> alert("เพิ่มข้อมูลของท่านเรียบร้อยแล้ว");</script>';
        redirect('my_project_con/add_work');
    }
    // Del Work To Do //
    public function delete($list){          //รับค่า username
        $this->my_project_model->delete($list);   

        redirect('my_project_con/add_work');
    }
     // update to do //
     public function update_to_do(){
        $this->my_project_model->update_to_do();
        redirect('my_project_con/add_work');
    }    

}

	

