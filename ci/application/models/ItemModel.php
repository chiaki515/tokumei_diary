<?php
class ItemModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getItems($id = false)
    {
        if ($id === false) {
            //５件ずつ表示
            if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            } else {
                $page = 1;
            }
            $start = 5 * ($page - 1);
            $this->db->from('items')->order_by('updated_at', 'DESC');
            $this->db->limit(5, $start);
            $query = $this->db->get();

            return $query->result();
        }

        //特定の記事を取得
        $query = $this->db->get_where('items', array('id' => $id));
        return $query->row_array();
    }

    public function getAllItems()
    {
        $query = $this->db->get('items');
        return $query->result();
    }

    public function insertItem()
    {
        if ($this->input->post('post_id')) {
            $post_id = $this->input->post('post_id');
            $original = 0;
        } else {
            $post_id = 0;
            $original = 1;
        }
        // $id=date("mdHis");
        $data = array(
          'title' => $this->input->post('title'),
          'message' => $this->input->post('message'),
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
          'member_id' => $this->session->userdata('member_id'),
          'post_id' => $post_id,
          'original' => $original
        );
        return $this->db->insert('items', $data);
    }

    public function deleteItem()
    {
        if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        $this->db->delete('items', array('id' => $id));
    }

    public function updateItem()
    {
        $id = $this->input->post('id');
        $data = array(
        'title' => $this->input->post('title'),
        'message' => $this->input->post('message'),
        'updated_at' => date("Y-m-d H:i:s"),
        );
        $this->db->where('id', $id);
        $this->db->update('items', $data);
    }

    public function getPopularItems()
    {
        $this->db->from('items')->where('original', 1)->order_by('reply', 'DESC')->limit(5);
        $query = $this->db->get();

        return $query->result();
    }

    public function addReplyNumber()
    {
        $id = $this->input->post('post_id');
        $reply = $this->input->post('reply');
        $data = array(
        'reply' => $reply + 1
        );
        $this->db->where('id', $id);
        $this->db->update('items', $data);
    }

    public function getMentionItem($id)
    {
        //言及先の記事を取得
        // $id = $this->input->post('mention_id');
        $query = $this->db->get_where('items', array('id' => $id));
        return $query->row_array();
    }

    public function getMyItems($member_id)
    {
        //５件ずつ表示
        if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else {
            $page = 1;
        }
        $start = 5 * ($page - 1);
        $this->db->from('items')->where('member_id', $member_id)->order_by('updated_at', 'DESC');
        $this->db->limit(5, $start);
        $query = $this->db->get();

        return $query->result();
    }
}
