<?php

class My_project_model extends CI_Model {
    // function insert User //
    public function insert_register($data){
        $this->db->insert('User',$data); //db ใช้เรียก database แล้วใช้คำสั่ง insert ในการเพิ่มข้อมูล
    }
    // function login//
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
}

?>