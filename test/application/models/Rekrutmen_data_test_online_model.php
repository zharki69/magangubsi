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
class Rekrutmen_data_test_online_model extends CI_Model
{

	public $table = 'rekrutmen_data_test_online';
	public $id = 'id_data_test_online';
	public $order = 'asc';

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
		$this->db->like('id_data_test_online', $q);
		$this->db->or_like('tanggal_data_test_online', $q);
		$this->db->or_like('nama_data_test_online', $q);
		$this->db->or_like('email_data_test_online', $q);
		$this->db->or_like('no_ktp_data_test_online', $q);
		$this->db->or_like('start_time_psikologi', $q);
		$this->db->or_like('end_time_psikologi', $q);
		$this->db->or_like('start_time_pilihan_ganda', $q);
		$this->db->or_like('end_time_pilihan_ganda', $q);
		$this->db->or_like('start_time_essay', $q);
		$this->db->or_like('end_time_essay', $q);
		$this->db->or_like('pertanyaan_1_psikologi', $q);
		$this->db->or_like('pertanyaan_2_psikologi', $q);
		$this->db->or_like('pertanyaan_3_psikologi', $q);
		$this->db->or_like('pertanyaan_4_psikologi', $q);
		$this->db->or_like('pertanyaan_5_psikologi', $q);
		$this->db->or_like('pertanyaan_6_psikologi', $q);
		$this->db->or_like('pertanyaan_7_psikologi', $q);
		$this->db->or_like('pertanyaan_8_psikologi', $q);
		$this->db->or_like('pertanyaan_9_psikologi', $q);
		$this->db->or_like('pertanyaan_10_psikologi', $q);
		$this->db->or_like('pertanyaan_11_psikologi', $q);
		$this->db->or_like('pertanyaan_12_psikologi', $q);
		$this->db->or_like('pertanyaan_13_psikologi', $q);
		$this->db->or_like('pertanyaan_14_psikologi', $q);
		$this->db->or_like('pertanyaan_15_psikologi', $q);
		$this->db->or_like('pertanyaan_16_psikologi', $q);
		$this->db->or_like('pertanyaan_17_psikologi', $q);
		$this->db->or_like('pertanyaan_18_psikologi', $q);
		$this->db->or_like('pertanyaan_19_psikologi', $q);
		$this->db->or_like('pertanyaan_20_psikologi', $q);
		$this->db->or_like('pertanyaan_21_psikologi', $q);
		$this->db->or_like('pertanyaan_22_psikologi', $q);
		$this->db->or_like('pertanyaan_23_psikologi', $q);
		$this->db->or_like('pertanyaan_24_psikologi', $q);
		$this->db->or_like('pertanyaan_25_psikologi', $q);
		$this->db->or_like('pertanyaan_26_psikologi', $q);
		$this->db->or_like('pertanyaan_27_psikologi', $q);
		$this->db->or_like('pertanyaan_28_psikologi', $q);
		$this->db->or_like('pertanyaan_29_psikologi', $q);
		$this->db->or_like('total_psikologi', $q);
		$this->db->or_like('klasifikasi_psikologi', $q);
		$this->db->or_like('keterangan_psikologi', $q);
		$this->db->or_like('pertanyaan_1_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_2_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_3_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_4_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_5_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_6_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_7_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_8_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_9_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_10_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_11_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_12_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_13_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_14_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_15_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_16_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_17_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_18_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_19_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_20_pilihan_ganda', $q);
		$this->db->or_like('total_pilihan_ganda', $q);
		$this->db->or_like('klasifikasi_pilihan_ganda', $q);
		$this->db->or_like('keterangan_pilihan_ganda', $q);
		$this->db->or_like('pertanyaan_essay', $q);
		$this->db->or_like('create_time_stamp_psikologi', $q);
		$this->db->or_like('modify_psikologi', $q);
		$this->db->or_like('create_time_stamp_pilihan_ganda', $q);
		$this->db->or_like('modify_pilihan_ganda', $q);
		$this->db->or_like('create_time_stamp_essay', $q);
		$this->db->or_like('modify_essay', $q);
		$this->db->or_like('create_at', $q);
		$this->db->or_like('update_at', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($kondisi = NULL, $limit, $start = 0, $q = NULL)
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
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	// insert data
	function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data, $kondisi = NULL)
	{
		if ($kondisi == NULL) {
			$this->db->where($this->id, $id);
		} else {
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
		return $this->db->update($this->table, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->delete($this->table);
	}
}

/* End of file Rekrutmen_data_test_online_model.php */
/* Location: ./application/models/Rekrutmen_data_test_online_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-08-23 04:13:24 */
/* http://hisyam.ismul.com.com */