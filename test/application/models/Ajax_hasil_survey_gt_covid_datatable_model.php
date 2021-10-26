<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_hasil_survey_gt_covid_datatable_model extends CI_Model
{
    var $table = 'hasil_survey_gt_covid';
    var $column_order = array('id_hasil_survey_gt_covid', 'tanggal_survey_gt_covid', 'nama_survey_gt_covid', 'nip_survey_gt_covid', 'unit_kerja_survey_gt_covid', 'posisi_survey_gt_covid', 'region_survey_gt_covid', 'in_charge_company', 'mode_kerja_survey_gt_covid', 'lokasi_survey_gt_covid', 'kondisi_kesehatan_survey_gt_covid', 'demam_survey_gt_covid', 'batuk_survey_gt_covid', 'pilek_survey_gt_covid', 'bersin_survey_gt_covid', 'pegal_pegal_survey_gt_covid', 'lainnya_survey_gt_covid', 'geo_lokasi_survey_gt_covid', 'gps_survey_gt_covid', 'gps_akurasi_survey_gt_covid', 'gps_ketinggian_survey_gt_covid', 'create_timestamp_survey_gt_covid', 'modify_timestamp_survey_gt_covid'); //set column field database for datatable orderable
    var $column_search = array('id_hasil_survey_gt_covid', 'tanggal_survey_gt_covid', 'nama_survey_gt_covid', 'nip_survey_gt_covid', 'unit_kerja_survey_gt_covid', 'posisi_survey_gt_covid', 'region_survey_gt_covid', 'in_charge_company', 'mode_kerja_survey_gt_covid', 'lokasi_survey_gt_covid', 'kondisi_kesehatan_survey_gt_covid', 'demam_survey_gt_covid', 'batuk_survey_gt_covid', 'pilek_survey_gt_covid', 'bersin_survey_gt_covid', 'pegal_pegal_survey_gt_covid', 'lainnya_survey_gt_covid', 'geo_lokasi_survey_gt_covid', 'gps_survey_gt_covid', 'gps_akurasi_survey_gt_covid', 'gps_ketinggian_survey_gt_covid', 'create_timestamp_survey_gt_covid', 'modify_timestamp_survey_gt_covid'); //set column field database for datatable searchable 
    var $order = array('id_hasil_survey_gt_covid' => 'asc'); // default order 

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


    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
