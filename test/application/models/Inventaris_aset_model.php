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
class Inventaris_aset_model extends CI_Model
{

    public $table = 'inventaris_aset';
    public $id = 'id_inventaris_aset';
    public $delete_at = 'delete_at_inventaris_aset';
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
            $this->db->like('id_inventaris_aset', $q);
            $this->db->or_like('nama_inventaris_aset', $q);
            $this->db->or_like('tipe_inventaris_aset', $q);
            $this->db->or_like('nomor_seri_inventaris_aset', $q);
            $this->db->or_like('harga_inventaris_aset', $q);
            $this->db->or_like('tanggal_pembelian_inventaris_aset', $q);
            $this->db->or_like('nama_karyawan_inventaris_aset', $q);
            $this->db->or_like('nip_karyawan_inventaris_aset', $q);
            $this->db->or_like('unit_kerja_inventaris_aset', $q);
            $this->db->or_like('masa_habis_pakai_inventaris_aset', $q);
            $this->db->or_like('posisi_inventaris_aset', $q);
            $this->db->or_like('update_by_inventaris_aset', $q);
            $this->db->or_like('last_scan_at_inventaris_aset', $q);
            $this->db->or_like('last_ip_inventaris_aset', $q);
            $this->db->or_like('last_scan_by_inventaris_aset', $q);
            $this->db->or_like('create_at_inventaris_aset', $q);
            $this->db->or_like('update_at_inventaris_aset', $q);
            $this->db->or_like('delete_at_inventaris_aset', $q);
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
            $this->db->like('id_inventaris_aset', $q);
            $this->db->or_like('nama_inventaris_aset', $q);
            $this->db->or_like('tipe_inventaris_aset', $q);
            $this->db->or_like('nomor_seri_inventaris_aset', $q);
            $this->db->or_like('harga_inventaris_aset', $q);
            $this->db->or_like('tanggal_pembelian_inventaris_aset', $q);
            $this->db->or_like('nama_karyawan_inventaris_aset', $q);
            $this->db->or_like('nip_karyawan_inventaris_aset', $q);
            $this->db->or_like('unit_kerja_inventaris_aset', $q);
            $this->db->or_like('masa_habis_pakai_inventaris_aset', $q);
            $this->db->or_like('posisi_inventaris_aset', $q);
            $this->db->or_like('update_by_inventaris_aset', $q);
            $this->db->or_like('last_scan_at_inventaris_aset', $q);
            $this->db->or_like('last_ip_inventaris_aset', $q);
            $this->db->or_like('last_scan_by_inventaris_aset', $q);
            $this->db->or_like('create_at_inventaris_aset', $q);
            $this->db->or_like('update_at_inventaris_aset', $q);
            $this->db->or_like('delete_at_inventaris_aset', $q);
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

/* End of file Inventaris_aset_model.php */
/* Location: ./application/models/Inventaris_aset_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-11-27 13:34:17 */
/* http://hisyambsa.github.io */