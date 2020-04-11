<?php

class My_project_model extends CI_Model {
    // function insert User //
    public function insert_register($data){
        $this->db->insert('User',$data); //db ใช้เรียก database แล้วใช้คำสั่ง insert ในการเพิ่มข้อมูล
    }
    // function //

}

?>