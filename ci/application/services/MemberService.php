<?php
class MemberService {
  public function __construct() {
    parent::__construct();
    $this->load->model('ItemModel');
    $this->load->helper('url_helper');
  }

  public function saveUserData(){
    $query = $this->MemberModel->login();

    if($query->num_rows() == 1){
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
		}else{
      //ユーザーが存在しなかった場合の処理
			return false;
    }
  }
}
