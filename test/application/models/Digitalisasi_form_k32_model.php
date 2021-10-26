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
class Digitalisasi_form_k32_model extends CI_Model
{

	public $table = 'digitalisasi_form_k32';
	public $id = 'id_digitalisasi_form_k32';
	public $delete_at = 'delete_at_digitalisasi_form_k32';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all($kondisi = NULL, $db_or_where = false)
	{
		if ($kondisi != NULL) {
			$i = 0;
			foreach ($kondisi as $item) // loop column 
			{
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket.
					if ($db_or_where == false) {
						$this->db->where($kondisi); // looping where
					} else {
						$this->db->or_where($kondisi); // looping where
					}
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
	// get all
	function get_all_join($kondisi = NULL, $db_or_where = false, $k1 = false)
	{
		if ($kondisi != NULL) {
			$i = 0;
			foreach ($kondisi as $item) // loop column 
			{
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket.
					if ($db_or_where == false) {
						$this->db->where($kondisi); // looping where
					} else {
						$this->db->or_where($kondisi); // looping where
					}
				}
				if (count($kondisi) - 1 == $i) { //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}
		}
		$this->db->order_by($this->id, $this->order);
		$this->db->join('digitalisasi_form_k31', 'digitalisasi_form_k31.nomor_k32_digitalisasi_form_k31 = digitalisasi_form_k32.nomor_digitalisasi_form_k32');
		if ($k1) {
			$this->db->join('digitalisasi_form_k1 as lumpsum', 'lumpsum.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_lumpsum_k1_digitalisasi_form_k31');
			$this->db->join('digitalisasi_form_k1 as uang_muka', 'uang_muka.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_uang_muka_k1_digitalisasi_form_k31');
		} else {
			$this->db->join('digitalisasi_form_k1 as lumpsum', 'lumpsum.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_lumpsum_k1_digitalisasi_form_k31');
		}

		return $this->db->get($this->table)->result();
	}
	// get all
	function get_all_join_row($kondisi = NULL, $db_or_where = false, $k1 = false)
	{
		if ($kondisi != NULL) {
			$i = 0;
			foreach ($kondisi as $item) // loop column 
			{
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket.
					if ($db_or_where == false) {
						$this->db->where($kondisi); // looping where
					} else {
						$this->db->or_where($kondisi); // looping where
					}
				}
				if (count($kondisi) - 1 == $i) { //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}
		}
		$this->db->order_by($this->id, $this->order);
		$this->db->join('digitalisasi_form_k31', 'digitalisasi_form_k31.nomor_k32_digitalisasi_form_k31 = digitalisasi_form_k32.nomor_digitalisasi_form_k32');
		if ($k1) {
			$this->db->join('digitalisasi_form_k1 as lumpsum', 'lumpsum.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_lumpsum_k1_digitalisasi_form_k31');
			$this->db->join('digitalisasi_form_k1 as uang_muka', 'uang_muka.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_uang_muka_k1_digitalisasi_form_k31');
		} else {
			$this->db->join('digitalisasi_form_k1 as lumpsum', 'lumpsum.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_lumpsum_k1_digitalisasi_form_k31');
		}

		return $this->db->get($this->table)->num_rows();
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
		$this->db->like('id_digitalisasi_form_k32', $q);
		$this->db->or_like('uuid_digitalisasi_form_k32', $q);
		$this->db->or_like('kategori_digitalisasi_form_k32', $q);
		$this->db->or_like('nomor_digitalisasi_form_k32', $q);
		$this->db->or_like('tanggal_pengajuan_digitalisasi_form_k32', $q);
		$this->db->or_like('kebutuhan_digitalisasi_form_k32', $q);
		$this->db->or_like('kode_proyek_digitalisasi_form_k32', $q);
		$this->db->or_like('nama_proyek_digitalisasi_form_k32', $q);
		$this->db->or_like('nama_digitalisasi_form_k32', $q);
		$this->db->or_like('nip_digitalisasi_form_k32', $q);
		$this->db->or_like('gol_digitalisasi_form_k32', $q);
		$this->db->or_like('jabatan_digitalisasi_form_k32', $q);
		$this->db->or_like('unit_kerja_digitalisasi_form_k32', $q);
		$this->db->or_like('tanggal_berangkat_digitalisasi_form_k32', $q);
		$this->db->or_like('tanggal_pulang_digitalisasi_form_k32', $q);
		$this->db->or_like('dari_digitalisasi_form_k32', $q);
		$this->db->or_like('lokasi_tujuan_digitalisasi_form_k32', $q);
		$this->db->or_like('cara_pembayaran_digitalisasi_form_k32', $q);
		$this->db->or_like('catatan_digitalisasi_form_k32', $q);
		$this->db->or_like('req_tiket_digitalisasi_form_k32', $q);
		$this->db->or_like('req_penginapan_digitalisasi_form_k32', $q);
		$this->db->or_like('req_transport_lokal_digitalisasi_form_k32', $q);
		$this->db->or_like('diajukan_digitalisasi_form_k32', $q);
		$this->db->or_like('diajukan_timestamp_digitalisasi_form_k32', $q);
		$this->db->or_like('disetujui_digitalisasi_form_k32', $q);
		$this->db->or_like('disetujui_timestamp_digitalisasi_form_k32', $q);
		$this->db->or_like('timestamp_digitalisasi_form_k32', $q);
		$this->db->or_like('modify_digitalisasi_form_k32', $q);
		$this->db->or_like('modify_by_digitalisasi_form_k32', $q);
		$this->db->or_like('status_digitalisasi_form_k32', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('id_digitalisasi_form_k32', $q);
		$this->db->or_like('uuid_digitalisasi_form_k32', $q);
		$this->db->or_like('kategori_digitalisasi_form_k32', $q);
		$this->db->or_like('nomor_digitalisasi_form_k32', $q);
		$this->db->or_like('tanggal_pengajuan_digitalisasi_form_k32', $q);
		$this->db->or_like('kebutuhan_digitalisasi_form_k32', $q);
		$this->db->or_like('kode_proyek_digitalisasi_form_k32', $q);
		$this->db->or_like('nama_proyek_digitalisasi_form_k32', $q);
		$this->db->or_like('nama_digitalisasi_form_k32', $q);
		$this->db->or_like('nip_digitalisasi_form_k32', $q);
		$this->db->or_like('gol_digitalisasi_form_k32', $q);
		$this->db->or_like('jabatan_digitalisasi_form_k32', $q);
		$this->db->or_like('unit_kerja_digitalisasi_form_k32', $q);
		$this->db->or_like('tanggal_berangkat_digitalisasi_form_k32', $q);
		$this->db->or_like('tanggal_pulang_digitalisasi_form_k32', $q);
		$this->db->or_like('dari_digitalisasi_form_k32', $q);
		$this->db->or_like('lokasi_tujuan_digitalisasi_form_k32', $q);
		$this->db->or_like('cara_pembayaran_digitalisasi_form_k32', $q);
		$this->db->or_like('catatan_digitalisasi_form_k32', $q);
		$this->db->or_like('req_tiket_digitalisasi_form_k32', $q);
		$this->db->or_like('req_penginapan_digitalisasi_form_k32', $q);
		$this->db->or_like('req_transport_lokal_digitalisasi_form_k32', $q);
		$this->db->or_like('diajukan_digitalisasi_form_k32', $q);
		$this->db->or_like('diajukan_timestamp_digitalisasi_form_k32', $q);
		$this->db->or_like('disetujui_digitalisasi_form_k32', $q);
		$this->db->or_like('disetujui_timestamp_digitalisasi_form_k32', $q);
		$this->db->or_like('timestamp_digitalisasi_form_k32', $q);
		$this->db->or_like('modify_digitalisasi_form_k32', $q);
		$this->db->or_like('modify_by_digitalisasi_form_k32', $q);
		$this->db->or_like('status_digitalisasi_form_k32', $q);
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// update data where
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

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
}

/* End of file Digitalisasi_form_k32_model.php */
/* Location: ./application/models/Digitalisasi_form_k32_model.php */
/* Please DO NOT modify this information : */
/* Generated by Hisyam 2020-07-22 12:49:57 */
/* http://hisyam.ismul.com.com */