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
class Rekrutmen_setup_posisi_model extends CI_Model
{

    public $table = 'rekrutmen_setup_posisi';
    public $id = 'id_setup_posisi';
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
        $this->db->like('id_setup_posisi', $q);
        $this->db->or_like('nama_setup_posisi', $q);
        $this->db->or_like('batch_setup_posisi', $q);
        $this->db->or_like('kode_posisi_setup_posisi', $q);
        $this->db->or_like('isActive_setup_posisi', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('last_modified', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_setup_posisi', $q);
        $this->db->or_like('nama_setup_posisi', $q);
        $this->db->or_like('batch_setup_posisi', $q);
        $this->db->or_like('kode_posisi_setup_posisi', $q);
        $this->db->or_like('isActive_setup_posisi', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('last_modified', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
}

/* End of file Rekrutmen_setup_posisi_model.php */
/* Location: ./application/models/Rekrutmen_setup_posisi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-08-27 01:16:40 */
/* http://hisyam.ismul.com.com */