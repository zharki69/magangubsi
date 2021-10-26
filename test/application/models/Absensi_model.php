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
class Absensi_model extends CI_Model
{

    public $table = 'absensi';
    public $id = 'id_absensi';
    public $order = 'ASC';

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
        $this->db->limit(10000);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // get all
    function get_where($table, $field, $first_date, $second_date, $limit = 10, $weekend = '', $holiday = '', $avg = '', $min = '', $max = '')
    {
        if ($weekend != '') {
            $ignore = array(1, 7);
            $this->db->where_not_in('DAYOFWEEK(tanggal_absensi)', $ignore);
        }
        if ($holiday != '') {
            $this->db->join('libur_indonesia', 'absensi.tanggal_absensi =  libur_indonesia.tanggal_libur_nasional_indonesia', 'left');
            $this->db->where('libur_indonesia.tanggal_libur_nasional_indonesia', NULL);
        }
        if ($first_date != null) {
            $this->db->where($table . '.' . $field . '>=', $first_date);
        } else {
            $this->db->where($table . '.' . $field . '>=', '2020-05-14'); // mulai tanggal GPS
        }
        if ($second_date != null) {
            $this->db->where($table . '.' . $field . '<=', $second_date);
        } else {
            // $this->db->where($table . '.' . $field . '<=', '2020-05-14');
        }

        // $this->db->order_by($this->id, $this->order);
        return $this->db->get('absensi')->result();
    }
    // get all
    function summary($table, $field, $first_date, $second_date, $limit = 10, $weekend = '', $holiday = '', $avg = '', $min = '', $max = '')
    {
        if ($weekend != '') {
            $ignore = array(1, 7);
            $this->db->where_not_in('DAYOFWEEK(tanggal_absensi)', $ignore);
        }
        if ($holiday != '') {
            $this->db->join('libur_indonesia', 'absensi.tanggal_absensi =  libur_indonesia.tanggal_libur_nasional_indonesia', 'left');
            $this->db->where('libur_indonesia.tanggal_libur_nasional_indonesia', NULL);
        }
        if ($first_date != null) {
            $this->db->where($table . '.' . $field . '>=', $first_date);
        } else {
            $this->db->where($table . '.' . $field . '>=', '2020-05-14');
        }
        if ($second_date != null) {
            $this->db->where($table . '.' . $field . '<=', $second_date);
        } else {
            // $this->db->where($table . '.' . $field . '<=', '2020-05-14');
        }
        if ($avg != '') {
            // $this->db->select_avg($avg, 'rata-rata_gps');
        }
        if ($min != '') {
            // $this->db->select_min($min, 'min_gps'); // type data int / float
            // $this->db->order_by('min_gps', 'ASC');
            // $this->db->limit($limit);
        }
        if ($max != '') {
            $this->db->select_max($max, 'max_gps'); //t type data int / float
            $this->db->order_by('max_gps', 'ASC');
            $this->db->limit($limit);
        }

        // $this->db->order_by($this->id, $this->order);
        return $this->db->get('absensi')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function last_row()
    {
        $last_row = $this->db->order_by($this->id, $this->order)
            ->limit(1)
            ->get($this->table)
            ->row();
        return $last_row;
    }
    function cek_nip_tanggal($nip = '')
    {
        $cek_nip_tanggal = $this->db->order_by($this->id, $this->order)
            ->limit(1)
            ->where('nip_absensi', $nip)
            ->where('tanggal_absensi', date('Y-m-d'))
            ->get($this->table)
            ->row();
        return $cek_nip_tanggal;
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

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}

/* End of file Absensi_model.php */
/* Location: ./application/models/Absensi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-03-20 16:19:59 */
/* http://hisyam.ismul.com.com */
