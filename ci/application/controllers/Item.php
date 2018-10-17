<?php
class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    /* 一覧表示 */
    public function index()
    {
        $data['items'] = $this->ItemModel->getItems();
        $data['popular_items'] = $this->ItemModel->getPopularItems();
        $data['title'] = 'はてな匿名ダイアリー';
        $data['user'] = $this->session->userdata();

        $this->load->view('templates/header', $data);
        $this->load->view('items/index', $data);
        $this->load->view('templates/footer');
    }

    /* 1件表示 */
    public function view($id = null)
    {
        $data['item'] = $this->ItemModel->getItems($id);
        $data['popular_items'] = $this->ItemModel->getPopularItems();
        $data['all_items'] = $this->ItemModel->getAllItems();
        $data['user'] = $this->session->userdata();

        if (empty($data['item'])) {
            // show_404();
            $this->load->view('templates/header', $data);
            $this->load->view('items/page_not_found');
            $this->load->view('templates/footer');
        } else{
            $data['title'] = $data['item']['title'];
            $this->load->view('templates/header', $data);
            $this->load->view('items/view', $data);
            $this->load->view('templates/footer');
        }
    }

    public function create()
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = '日記を書く - ' . $save = $this->session->userdata("email") . 'の日記';
        $data['user'] = $this->session->userdata();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('items/create', $data);
        }
        if ($this->form_validation->run() === true) {
            $ticket = $this->input->post('ticket');
            $save = $this->session->userdata("ticket");
            //ブラウザの戻る対策
            unset($_SESSION['ticket']);
            if($ticket === $save) {
                $this->ItemModel->insertItem();
                $ticket = md5(uniqid(rand(), true));
                $this->session->set_userdata('ticket', $ticket);
                $this->load->view('items/success_create');
            }
            else{
                die('不正なアクセスです');
            }
        }
    }

    public function reply()
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = '日記を書く - ' . $save = $this->session->userdata("email") . 'の日記';
        $data['user'] = $this->session->userdata();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('items/reply');
        }
        if ($this->form_validation->run() === true) {
            $ticket = $this->input->post('ticket');
            $save = $this->session->userdata("ticket");
            //ブラウザの戻る対策
            unset($_SESSION['ticket']);
            if($ticket === $save) {
                $this->ItemModel->addReplyNumber();
                $this->ItemModel->insertItem();
                $ticket = md5(uniqid(rand(), true));
                $this->session->set_userdata('ticket', $ticket);
                $this->load->view('items/success_create');
            }
            else{
                die('不正なアクセスです');
            }
        }
    }

    public function delete()
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $this->ItemModel->deleteItem();
        $this->load->view('items/delete');
    }

    public function edit($id = null)
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $data['title'] = '日記を編集する';
        $data['user'] = $this->session->userdata();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $id = $_REQUEST['id'];
        $data['item'] = $this->ItemModel->getItems($id);
        if (empty($data['item'])) {
            show_404();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('items/edit', $data);
    }

    public function update()
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        $this->ItemModel->updateItem();
        $this->load->view('items/success_update');
    }
    public function mention()
    {
        $id = $_REQUEST['mention_id'];
        $data['item'] = $this->ItemModel->getMentionItem($id);
        $this->load->view('items/mention', $data);
    }

    public function mydiary()
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $member_id = $this->session->userdata('member_id');
        $data['items'] = $this->ItemModel->getMyItems($member_id);
        $data['popular_items'] = $this->ItemModel->getPopularItems();
        $data['title'] = $this->session->userdata('email') . 'の日記';
        $data['user'] = $this->session->userdata();

        $this->load->view('templates/header', $data);
        $this->load->view('items/mydiary', $data);
        $this->load->view('templates/footer');
    }

    public function confirm()
    {
        if ($this->session->userdata("is_logged_in")==0) {
            $this->load->view('members/login');
            return;
        }
        $data['popular_items'] = $this->ItemModel->getPopularItems();
        $data['title'] = $this->session->userdata('email') . 'の日記';
        $data['email'] = $this->session->userdata('email');
        $data['user'] = $this->session->userdata();
        
        $this->load->view('templates/header', $data);
        $this->load->view('items/confirm');
        $this->load->view('templates/footer');

    }
}
