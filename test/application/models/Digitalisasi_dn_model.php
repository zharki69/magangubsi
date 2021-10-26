<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyambsa.github.io ...... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
class Digitalisasi_dn_model extends CI_Model
{

    public $table = 'digitalisasi_dn';
    public $id = 'id';
    public $delete_at = 'delete_at';
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
        $this->db->where($this->delete_at, NULL);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_all_trash($kondisi = NULL)
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
        $this->db->where($this->delete_at, NULL);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->delete_at, NULL);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL, $kondisi = NULL)
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
        } else {
            $this->db->group_start(); // open bracket.
            $this->db->like('id', $q);
            $this->db->or_like('uuid', $q);
            $this->db->or_like('no_dn', $q);
            $this->db->or_like('no_gi', $q);
            $this->db->or_like('no_dppb', $q);
            $this->db->or_like('no_detail_dppb', $q);
            $this->db->or_like('project', $q);
            $this->db->or_like('koordinator', $q);
            $this->db->or_like('project_name', $q);
            $this->db->or_like('creator', $q);
            $this->db->or_like('applicant', $q);
            $this->db->or_like('carrier', $q);
            $this->db->or_like('consignee', $q);
            $this->db->or_like('outbound_date', $q);
            $this->db->or_like('request_date', $q);
            $this->db->or_like('driver', $q);
            $this->db->or_like('vehicle_id', $q);
            $this->db->or_like('consignee_telephone', $q);
            $this->db->or_like('destination_add', $q);
            $this->db->or_like('remark', $q);
            $this->db->or_like('file_dn_upload', $q);
            $this->db->or_like('timestamp', $q);
            $this->db->or_like('create_by', $q);
            $this->db->or_like('modify', $q);
            $this->db->or_like('modify_by', $q);
            $this->db->or_like('status', $q);
            $this->db->or_like('keterangan', $q);
            $this->db->or_like('revisi_sistem', $q);
            $this->db->or_like('delete_at_digitalisasi_dn', $q);
            $this->db->group_end(); //close bracket

            $this->db->where($this->delete_at, NULL);

            $this->db->from($this->table);

            return $this->db->count_all_results();
        }
    }
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $kondisi = NULL)
    {
        $this->db->order_by($this->id, $this->order);
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
        } else {
            $this->db->group_start(); // open bracket.
            $this->db->like('id', $q);
            $this->db->or_like('uuid', $q);
            $this->db->or_like('no_dn', $q);
            $this->db->or_like('no_gi', $q);
            $this->db->or_like('no_dppb', $q);
            $this->db->or_like('no_detail_dppb', $q);
            $this->db->or_like('project', $q);
            $this->db->or_like('koordinator', $q);
            $this->db->or_like('project_name', $q);
            $this->db->or_like('creator', $q);
            $this->db->or_like('applicant', $q);
            $this->db->or_like('carrier', $q);
            $this->db->or_like('consignee', $q);
            $this->db->or_like('outbound_date', $q);
            $this->db->or_like('request_date', $q);
            $this->db->or_like('driver', $q);
            $this->db->or_like('vehicle_id', $q);
            $this->db->or_like('consignee_telephone', $q);
            $this->db->or_like('destination_add', $q);
            $this->db->or_like('remark', $q);
            $this->db->or_like('file_dn_upload', $q);
            $this->db->or_like('timestamp', $q);
            $this->db->or_like('create_by', $q);
            $this->db->or_like('modify', $q);
            $this->db->or_like('modify_by', $q);
            $this->db->or_like('status', $q);
            $this->db->or_like('keterangan', $q);
            $this->db->or_like('revisi_sistem', $q);
            $this->db->or_like('delete_at_digitalisasi_dn', $q);
            $this->db->group_end(); //close bracket 
        }
        $this->db->limit($limit, $start);

        $this->db->where($this->delete_at, NULL);
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
    // update data
    function update_where($kondisi, $data)
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
            return $this->db->update($this->table, $data);
        }
        return false;
    }

    // soft delete
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $data = array(
            $this->delete_at => strtotime('now')
        );
        return $this->db->update($this->table, $data);
    }

    // force delete data
    function delete_trash($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
}

/* End of file Digitalisasi_dn_model.php */
/* Location: ./application/models/Digitalisasi_dn_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2021-07-12 10:53:06 */
/* http://hisyambsa.github.io */