<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyam.ismul.com ......... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
class Users_notifications_model extends CI_Model
{

    public $table = 'users_notifications';
    public $id = 'id_users_notifications';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($kondisi = NULL)
    {
        if ($kondisi != NULL) {
            $i = 0;
            foreach ($kondisi as $item) // loop column 
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket.
                    $this->db->where($kondisi); // looping where
                }
                if (count($kondisi) - 1 == $i) { //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }
        }
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_users_notifications', $q);
        $this->db->or_like('nama_users_notifications', $q);
        $this->db->or_like('nip_users_notifications', $q);
        $this->db->or_like('user_id_users_notifications', $q);
        $this->db->or_like('device_os_users_notifications', $q);
        $this->db->or_like('device_type_users_notifications', $q);
        $this->db->or_like('device_model_users_notifications', $q);
        $this->db->or_like('tags_users_notifications', $q);
        $this->db->or_like('create_at_users_notifications', $q);
        $this->db->or_like('last_active_users_notifications', $q);
        $this->db->or_like('badge_count_users_notifications', $q);
        $this->db->or_like('session_count_users_notifications', $q);
        $this->db->or_like('identifier_users_notifications', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_users_notifications', $q);
        $this->db->or_like('nama_users_notifications', $q);
        $this->db->or_like('nip_users_notifications', $q);
        $this->db->or_like('user_id_users_notifications', $q);
        $this->db->or_like('device_os_users_notifications', $q);
        $this->db->or_like('device_type_users_notifications', $q);
        $this->db->or_like('device_model_users_notifications', $q);
        $this->db->or_like('tags_users_notifications', $q);
        $this->db->or_like('create_at_users_notifications', $q);
        $this->db->or_like('last_active_users_notifications', $q);
        $this->db->or_like('badge_count_users_notifications', $q);
        $this->db->or_like('session_count_users_notifications', $q);
        $this->db->or_like('identifier_users_notifications', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // update data
    function update_where($user_id, $data)
    {
        $this->db->where('user_id_users_notifications', $user_id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}

/* End of file Users_notifications_model.php */
/* Location: ./application/models/Users_notifications_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-08-01 13:19:30 */
/* http://hisyam.ismul.com.com */