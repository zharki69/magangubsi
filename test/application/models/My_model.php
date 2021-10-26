<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function from_until_date($table, $field, $first_date, $second_date, $limit = 10, $weekend = '', $holiday = '')
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
        }
        if ($second_date != null) {
            $this->db->where($table . '.' . $field . '<=', $second_date);
        }
        $this->db->limit($limit);

        return $this->db->get($table)->result();
    }
    public function from_until_date_count($table, $field, $first_date, $second_date, $limit = 10, $weekend = '', $holiday = '')
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
        }
        if ($second_date != null) {
            $this->db->where($table . '.' . $field . '<=', $second_date);
        }
        $this->db->limit($limit);

        return $this->db->count_all_results($table);
    }

    public function data_jumlah_unit_kerja()
    {
        // SELECT users.unit_kerja, COUNT(`unit_kerja`) AS 'Unit Kerja' from users WHERE users.region !='admin' AND users.active =1 GROUP BY unit_kerja

        $this->db->select(" users.unit_kerja ,count('unit_kerja') as jumlah_unit_kerja");
        $this->db->where('users.region !=', 'admin');
        $this->db->where('users.active', '1');
        $this->db->group_by('unit_kerja');

        return $this->db->get('users')->result();
    }

    public function data_unit_kerja()
    {
        $this->db->select('unit_kerja');
        $this->db->where('users.region !=', 'admin');
        $this->db->where('users.active', '1');
        $this->db->group_by('unit_kerja');
        return $this->db->get('users')->result();
    }
}
/* End of file My_model.php */
