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
class Digitalisasi_ban_model extends CI_Model
{

    public $table = 'digitalisasi_ban';
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
            $this->db->or_like('no_ban', $q);
            $this->db->or_like('tanggal_ban', $q);
            $this->db->or_like('no_sph', $q);
            $this->db->or_like('no_dpbj', $q);
            $this->db->or_like('tempat_negosiasi', $q);
            $this->db->or_like('pelaksana_internal', $q);
            $this->db->or_like('pelaksana_eksternal', $q);
            $this->db->or_like('harga_negosiasi', $q);
            $this->db->or_like('masa_berlaku', $q);
            $this->db->or_like('jumlah_hari', $q);
            $this->db->or_like('jumlah_bulan', $q);
            $this->db->or_like('jumlah_tahun', $q);
            $this->db->or_like('prakiraan_tanggal', $q);
            $this->db->or_like('cara_penyerahan', $q);
            $this->db->or_like('garansi', $q);
            $this->db->or_like('cara_pembayaran', $q);
            $this->db->or_like('tahapan_pembayaran', $q);
            $this->db->or_like('catatan_tambahan', $q);
            $this->db->or_like('tempelate', $q);
            $this->db->or_like('timestamp', $q);
            $this->db->or_like('create_by', $q);
            $this->db->or_like('modify', $q);
            $this->db->or_like('modify_by', $q);
            $this->db->or_like('status', $q);
            $this->db->or_like('keterangan', $q);
            $this->db->or_like('revisi_sistem', $q);
            $this->db->or_like('delete_at', $q);
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
            $this->db->or_like('no_ban', $q);
            $this->db->or_like('tanggal_ban', $q);
            $this->db->or_like('no_sph', $q);
            $this->db->or_like('no_dpbj', $q);
            $this->db->or_like('tempat_negosiasi', $q);
            $this->db->or_like('pelaksana_internal', $q);
            $this->db->or_like('pelaksana_eksternal', $q);
            $this->db->or_like('harga_negosiasi', $q);
            $this->db->or_like('masa_berlaku', $q);
            $this->db->or_like('jumlah_hari', $q);
            $this->db->or_like('jumlah_bulan', $q);
            $this->db->or_like('jumlah_tahun', $q);
            $this->db->or_like('prakiraan_tanggal', $q);
            $this->db->or_like('cara_penyerahan', $q);
            $this->db->or_like('garansi', $q);
            $this->db->or_like('cara_pembayaran', $q);
            $this->db->or_like('tahapan_pembayaran', $q);
            $this->db->or_like('catatan_tambahan', $q);
            $this->db->or_like('tempelate', $q);
            $this->db->or_like('timestamp', $q);
            $this->db->or_like('create_by', $q);
            $this->db->or_like('modify', $q);
            $this->db->or_like('modify_by', $q);
            $this->db->or_like('status', $q);
            $this->db->or_like('keterangan', $q);
            $this->db->or_like('revisi_sistem', $q);
            $this->db->or_like('delete_at', $q);
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

/* End of file Digitalisasi_ban_model.php */
/* Location: ./application/models/Digitalisasi_ban_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2021-05-31 03:27:55 */
/* http://hisyambsa.github.io */