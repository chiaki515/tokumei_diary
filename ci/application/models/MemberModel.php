<?php
class MemberModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insertMember()
    {
        $this->load->helper('url');
        $data = array(
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
        );
        return $this->db->insert('members', $data);
    }

    public function login()
    {
        $this->load->helper('url');
        $this->db->where("email", $this->input->post("email"));
        $this->db->where("password", $this->input->post("password"));
        $query = $this->db->get("members");

        if ($query->num_rows() == 1) {
            //ユーザーが存在した場合の処理
            $row = $query->row();
            $data = array(
            "email" => $row->email,
            "password" => $row->password,
            "member_id" => $row->id,
            "is_logged_in" => 1
            );
            $this->session->set_userdata($data);
            return true;
        } else {
            //ユーザーが存在しなかった場合の処理
            return false;
        }
    }
}
