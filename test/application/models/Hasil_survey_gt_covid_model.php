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
class Hasil_survey_gt_covid_model extends CI_Model
{

    public $table = 'hasil_survey_gt_covid';
    public $id = 'id_hasil_survey_gt_covid';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function data_user_belum_survey($not = 'NOT')
    {
        $query = $this->db->query("SELECT users.unit_kerja, users.first_name, users.job_level, users.region from users WHERE users.region !='admin' AND users.active =1 and users.first_name $not IN(SELECT hasil_survey_gt_covid.nama_survey_gt_covid FROM hasil_survey_gt_covid WHERE hasil_survey_gt_covid.tanggal_survey_gt_covid = CURRENT_DATE)  ORDER by unit_kerja, region, first_name");
        return $query->result();
    }
    function data_user_belum_survey_by_unit_kerja($unit_kerja, $not = 'NOT')
    {
        $query = $this->db->query("SELECT users.unit_kerja, users.first_name, users.job_level, users.region from users WHERE users.unit_kerja = '$unit_kerja' AND users.region !='admin' AND users.active =1 and users.first_name $not IN(SELECT hasil_survey_gt_covid.nama_survey_gt_covid FROM hasil_survey_gt_covid WHERE  hasil_survey_gt_covid.tanggal_survey_gt_covid = CURRENT_DATE)  ORDER by unit_kerja, region, first_name");
        // var_dump("SELECT users.unit_kerja, users.first_name, users.region from users WHERE users.unit_kerja = '$unit_kerja' AND users.region !='admin' AND users.active =1 and users.first_name NOT IN(SELECT hasil_survey_gt_covid.nama_survey_gt_covid FROM hasil_survey_gt_covid WHERE  hasil_survey_gt_covid.tanggal_survey_gt_covid = CURRENT_DATE)  ORDER by unit_kerja, region, first_name");
        return $query->result();
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
        $this->db->limit(2500);

        return $this->db->get($this->table)->result();
    }

    // get all
    function get_where($table, $field, $first_date, $second_date, $limit = 10, $weekend = '', $holiday = '', $avg = '', $min = '', $max = '')
    {
        if ($weekend != '') {
            $ignore = array(1, 7);
            $this->db->where_not_in('DAYOFWEEK(tanggal_survey_gt_covid )', $ignore);
        }
        if ($holiday != '') {
            $this->db->join('libur_indonesia', 'hasil_survey_gt_covid.tanggal_survey_gt_covid  =  libur_indonesia.tanggal_libur_nasional_indonesia', 'left');
            $this->db->where('libur_indonesia.tanggal_libur_nasional_indonesia', NULL);
        }
        if ($first_date != null) {
            $this->db->where($table . '.' . $field . '>=', $first_date);
        } else {
            $this->db->where($table . '.' . $field . '>=', '2020-05-20'); // mulai tanggal GPS
        }
        if ($second_date != null) {
            $this->db->where($table . '.' . $field . '<=', $second_date);
        } else {
            // $this->db->where($table . '.' . $field . '<=', '2020-05-14');
        }

        // $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //  cek nama tanggal * sudah survey harian
    function cek_nama_tanggal($nama = '')
    {
        $cek_nama_tanggal = $this->db->order_by($this->id, $this->order)
            ->limit(1)
            ->where('nama_survey_gt_covid', $nama)
            ->where('tanggal_survey_gt_covid', date('Y-m-d'))
            ->get($this->table)
            ->row();
        return $cek_nama_tanggal;
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

/* End of file Hasil_survey_gt_covid_model.php */
/* Location: ./application/models/Hasil_survey_gt_covid_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-03-31 12:41:09 */
/* http://hisyam.ismul.com.com */
