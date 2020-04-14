<?php

class My_project_model extends CI_Model {
    // function insert User //
    public function insert_register($data){
        $this->db->insert('User',$data); //db ใช้เรียก database แล้วใช้คำสั่ง insert ในการเพิ่มข้อมูล
    }
    // login//
	public function check_user($username){
		$this->db->where('username',$username);
		$query = $this->db->get('User');
		$row = $query->num_rows();

		echo $this->db->last_query();
		echo "row =".  $row;
		if($row == 1){
			return true;
		}else{
			return false;
		}
	}
	// check login //
	public function check_login($username,$password){	
		$this->db->where("username",$username);
		$this->db->where('password',$password);

		$query = $this->db->get('User');
		$row = $query->num_rows();
		if($row == 1){
			return $query->row_array();
		}else{
			return false;
		}
	}
	// update user //
	public function updatesave(){
        $data = array(
            'name'  => $this->input->post('name'),
            'email' =>$this->input->post('email')
        );
        $this->db->where('id',$this->input->post('main_id'));
        $this->db->set($data);
        $this->db->update('User');
        return true;
    }
	// update pass //
	public function updatesave2(){
        $data = array(
            'password'  => $this->input->post('password')
        );
        $this->db->where('id',$this->input->post('main_id'));
        $this->db->set($data);
        $this->db->update('User');
        return true;
	}
    // function insert work //
    public function insert_work($data){
        $this->db->insert('to_do_tbl',$data); //db ใช้เรียก database แล้วใช้คำสั่ง insert ในการเพิ่มข้อมูล
	}	
	// show work //
	public function show_work($data){
		$query2 = $this->db->where('id_user',$data["data_user"]["id"]); 
        $query2 = $this->db->get('to_do_tbl'); //select * from user_db;
        $row2 = $query2->num_rows();
        if($row2 == 0){
            return false;
        }

        return $query2;

	}
	// show work to do //
	public function show_work_to_do($data){
		$date=date('Y-m-d');
		$query2 = $this->db->where('date_alert',$date); 
		$query2 = $this->db->where('id_user',$data["data_user"]["id"]); 
		$query2 = $this->db->get('to_do_tbl'); //select * from user_db;
        $row2 = $query2->num_rows();
        if($row2 == 0){
            return false;
        }

        return $query2;

	}
	// del work to do //
	public function delete($list){
        //delete 
        $this->db->where('list',$list); // where username = '$username'
        $this->db->delete('to_do_tbl');  // นำค่ามา delete

        return true;

	}
	// update to do //
	public function update_to_do(){
        $data = array(
			'title'  => $this->input->post('title'),
			'date_alert'  => $this->input->post('date_alert'),
            'time_alert'  => $this->input->post('time_alert'),
            'location'  => $this->input->post('location')
        );
        $this->db->where('list',$this->input->post('main_list'));
        $this->db->set($data);
        $this->db->update('to_do_tbl');
        return true;
	}
}

?>