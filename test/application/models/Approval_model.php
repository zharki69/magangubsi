<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Approval_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function badge()
    {

        if (isset($this->ion_auth->user()->row()->first_name)) {

            $this->load->model('Digitalisasi_form_lembur_model');
            $this->load->model('Digitalisasi_form_k32_model');


            $approval_disetujui = array(
                'uuid_digitalisasi_form_lembur' => NULL,
                'disetujui_timestamp_digitalisasi_form_lembur' => NULL,
                'disetujui_digitalisasi_form_lembur' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_lembur' => 'proses',
            );
            $approval_diverifikasi = array(
                'uuid_digitalisasi_form_lembur' => NULL,
                'disetujui_timestamp_digitalisasi_form_lembur !=' => NULL,
                'diverifikasi_timestamp_digitalisasi_form_lembur' => NULL,
                'diverifikasi_digitalisasi_form_lembur' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_lembur' => 'proses',
            );
            $approval_diketahui = array(
                'uuid_digitalisasi_form_lembur' => NULL,
                'diverifikasi_timestamp_digitalisasi_form_lembur !=' => NULL,
                'diketahui_timestamp_digitalisasi_form_lembur' => NULL,
                'diketahui_digitalisasi_form_lembur' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_lembur' => 'proses',
            );

            $count_lembur = array(
                $c_digitalisasi_form_lembur_approval_disetujui = $this->Digitalisasi_form_lembur_model->get_all_row($approval_disetujui),
                $c_digitalisasi_form_lembur_approval_diverifikasi = $this->Digitalisasi_form_lembur_model->get_all_row($approval_diverifikasi),
                $c_digitalisasi_form_lembur_approval_diketahui = $this->Digitalisasi_form_lembur_model->get_all_row($approval_diketahui),
            );



            $approval_atasan_1 = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'diajukan_timestamp_digitalisasi_form_k32' => NULL,
                'diajukan_digitalisasi_form_k32' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );

            $approval_atasan_2 = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'diajukan_timestamp_digitalisasi_form_k32 !=' => NULL,
                'disetujui_timestamp_digitalisasi_form_k32' => NULL,
                'disetujui_digitalisasi_form_k32' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );
            $approval_kadiv_sdmu = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'disetujui_timestamp_digitalisasi_form_k32 !=' => NULL,
                'diketahui_timestamp_digitalisasi_form_k31' => NULL,
                'diketahui_digitalisasi_form_k31' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );

            $approval_anggaran_akuntansi = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'diketahui_timestamp_digitalisasi_form_k31 !=' => NULL,
                'lumpsum.verifikasi_anggaran_timestamp_digitalisasi_form_k1' => NULL,
                'lumpsum.verifikasi_anggaran_digitalisasi_form_k1' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );
            $approval_kadiv_keuangan = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'lumpsum.verifikasi_anggaran_timestamp_digitalisasi_form_k1 !=' => NULL,
                'lumpsum.kadiv_keuangan_timestamp_digitalisasi_form_k1' => NULL,
                'lumpsum.kadiv_keuangan_digitalisasi_form_k1' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );
            $approval_pembayaran_verifikasi_keuangan = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'lumpsum.kadiv_keuangan_timestamp_digitalisasi_form_k1 !=' => NULL,
                'lumpsum.akuntansi_bayar_timestamp_digitalisasi_form_k1' => NULL,
                'lumpsum.akuntansi_bayar_digitalisasi_form_k1' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );
            $approval_pejalan_dinas = array(
                'uuid_digitalisasi_form_k32' => NULL,
                'lumpsum.akuntansi_bayar_timestamp_digitalisasi_form_k1 !=' => NULL,
                'lumpsum.pejalan_dinas_timestamp_digitalisasi_form_k1' => NULL,
                'lumpsum.pejalan_dinas_digitalisasi_form_k1' => $this->ion_auth->user()->row()->first_name,
                'status_digitalisasi_form_k32' => 'proses',
            );
            if ($this->ion_auth->user()->row()->first_name == 'Aidah') {
                $approval_verifikasi_akuntansi = array(
                    'uuid_digitalisasi_form_k32' => NULL,
                    'lumpsum.pejalan_dinas_timestamp_digitalisasi_form_k1 !=' => NULL,
                    'lumpsum.akuntansi_verifikasi_timestamp_digitalisasi_form_k1' => NULL,
                    // 'lumpsum.akuntansi_verifikasi_digitalisasi_form_k1' => $this->ion_auth->user()->row()->first_name,
                    'status_digitalisasi_form_k32' => 'proses',
                );
            } else {
                $approval_verifikasi_akuntansi = array(
                    'uuid_digitalisasi_form_k32' => NULL,
                    'lumpsum.pejalan_dinas_timestamp_digitalisasi_form_k1 !=' => NULL,
                    'lumpsum.akuntansi_verifikasi_timestamp_digitalisasi_form_k1' => NULL,
                    'lumpsum.akuntansi_verifikasi_digitalisasi_form_k1' => $this->ion_auth->user()->row()->first_name,
                    'status_digitalisasi_form_k32' => 'proses',
                );
            }




            $count_perjalanan_dinas = array(

                $c_digitalisasi_form_k32_approval_atasan_1 = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_atasan_1),
                $c_digitalisasi_form_k32_approval_atasan_2 = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_atasan_2),
                $c_digitalisasi_form_k32_approval_kadiv_sdmu = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_kadiv_sdmu),
                // die;
                $c_digitalisasi_form_k32_approval_anggaran_akuntansi = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_anggaran_akuntansi),
                $c_digitalisasi_form_k32_approval_kadiv_keuangan = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_kadiv_keuangan),
                $c_digitalisasi_form_k32_approval_pembayaran_verifikasi_keuangan = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_pembayaran_verifikasi_keuangan),
                $c_digitalisasi_form_k32_approval_pejalan_dinas = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_pejalan_dinas),

                $c_digitalisasi_form_k32_approval_verifikasi_akuntansi = $this->Digitalisasi_form_k32_model->get_all_join_row($approval_verifikasi_akuntansi),

            );


            $table = 'pmalp_supplier';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_supplier = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_material';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_material = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_material_sub_kelompok';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_material_sub_kelompok = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_material_kelompok';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_material_kelompok = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_material_kategori';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_material_kategori = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_barang';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_barang = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_jasa';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_jasa = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));


            $table = 'pmalp_master_konsultan';
            $query = "SELECT * FROM $table WHERE (($table.approve_1_by = ? AND $table.approve_1_timestamp is NULL) OR ($table.approve_1_timestamp is NOT NULL AND $table.approve_2_by = ? AND $table.approve_2_timestamp is NULL)) AND ($table.approve_status = 'waiting' AND $table.delete_at IS NULL)";
            $data_master_konsultan = $this->db->query($query, array($this->ion_auth->user()->row()->first_name, $this->ion_auth->user()->row()->first_name));

            $count_pmalp = array(
                $data_supplier->num_rows(),
                $data_master_material->num_rows(),
                $data_master_material_sub_kelompok->num_rows(),
                $data_master_material_kelompok->num_rows(),
                $data_master_material_kategori->num_rows(),
                $data_master_barang->num_rows(),
                $data_master_jasa->num_rows(),
                $data_master_konsultan->num_rows(),
            );


            $count = array_merge($count_lembur, $count_perjalanan_dinas, $count_pmalp);

            return array_sum($count);
        }
    }
}

/* End of file Approval_model.php */
