<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_absensi_datatable_model extends CI_Model
{

    var $table = 'absensi';
    var $column_order = array('id_absensi', 'nip_absensi', 'nama_absensi', 'unit_kerja_absensi', 'scan_masuk_absensi', 'scan_keluar_absensi', 'ip_masuk_absensi', 'ip_keluar_absensi', 'shareloc_masuk_absensi', 'shareloc_keluar_absensi', 'dokumen_pendukung_keluar_absensi', 'durasi_jam_absensi', 'durasi_menit_absensi', 'durasi_kurang_absensi', 'durasi_terlambat_absensi', 'total_menit_absensi', 'created_by_absensi', 'last_modifed_absensi'); //set column field database for datatable orderable
    var $column_search = array('id_absensi', 'nip_absensi', 'nama_absensi', 'unit_kerja_absensi', 'scan_masuk_absensi', 'scan_keluar_absensi', 'ip_masuk_absensi', 'ip_keluar_absensi', 'shareloc_masuk_absensi', 'shareloc_keluar_absensi', 'dokumen_pendukung_keluar_absensi', 'durasi_jam_absensi', 'durasi_menit_absensi', 'durasi_kurang_absensi', 'durasi_terlambat_absensi', 'total_menit_absensi', 'created_by_absensi', 'last_modifed_absensi'); //set column field database for datatable searchable 
    var $order = array('id_absensi' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    // get all
    function get_all()
    {
        // $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            // !empty($_POST['form_field_post_name'])

            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    function get_datatables($admin = false, $field = '', $start_date = '', $end_date = '', $weekend = '', $holiday = '')
    {
        // $group = array('admin_akses', 'view_akses', 'admin_absensi', 'view_absensi');
        if (!$admin) {
            $this->db->where('nip_absensi', $this->ion_auth->user()->row()->nip);
        }
        if ($weekend != '') {
            $ignore = array(1, 7);
            $this->db->where_not_in('DAYOFWEEK(tanggal_absensi)', $ignore);
        }
        if ($holiday != '') {
            $this->db->join('libur_indonesia', 'absensi.tanggal_absensi =  libur_indonesia.tanggal_libur_nasional_indonesia', 'left');
            $this->db->where('libur_indonesia.tanggal_libur_nasional_indonesia', NULL);
        }

        if ($start_date != '') {
            $this->db->where($field . '>=', $start_date);
        }
        if ($end_date != '') {
            $this->db->where($field . '<=', $end_date);
        }
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($admin = false, $field = '', $start_date = '', $end_date = '')
    {
        if (!$admin) {
            $this->db->where('nip_absensi', $this->ion_auth->user()->row()->nip);
        }
        $this->_get_datatables_query();
        if ($start_date != '') {
            $this->db->where($field . '>=', $start_date);
        }
        if ($end_date != '') {
            $this->db->where($field . '<=', $end_date);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($admin = false, $field = '', $start_date = '', $end_date = '')
    {
        if (!$admin) {
            $this->db->where('nip_absensi', $this->ion_auth->user()->row()->nip);
        }
        if ($start_date != '') {
            $this->db->where($field . '>=', $start_date);
        }
        if ($end_date != '') {
            $this->db->where($field . '<=', $end_date);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
