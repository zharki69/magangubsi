<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Digitalisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->library('libqrcode');
    }

    public function header_digitalisasi()
    {
        echo $this->load->view('inc/header_digitalisasi', '', true);
    }
    public function footer_digitalisasi()
    {
        echo $this->load->view('inc/footer_digitalisasi', '', true);
    }
    public function inventaris_aset($id)
    {
        $this->load->model('Inventaris_aset_model');
        $kondisi = array('qr_inventaris_aset' => $id,);

        $data = $this->Inventaris_aset_model->get_all($kondisi);

        $row = $this->Inventaris_aset_model->get_by_id($data[0]->id_inventaris_aset);
        if ($row) {
            $data = array(
                'id_inventaris_aset' => $row->id_inventaris_aset,
                'qr_inventaris_aset' => $row->qr_inventaris_aset,
                'nama_inventaris_aset' => $row->nama_inventaris_aset,
                'tipe_inventaris_aset' => $row->tipe_inventaris_aset,
                'nomor_seri_inventaris_aset' => $row->nomor_seri_inventaris_aset,
                'harga_inventaris_aset' => $row->harga_inventaris_aset,
                'tanggal_pembelian_inventaris_aset' => $row->tanggal_pembelian_inventaris_aset,
                'nama_karyawan_inventaris_aset' => $row->nama_karyawan_inventaris_aset,
                'nip_karyawan_inventaris_aset' => $row->nip_karyawan_inventaris_aset,
                'unit_kerja_inventaris_aset' => $row->unit_kerja_inventaris_aset,
                'masa_habis_pakai_inventaris_aset' => $row->masa_habis_pakai_inventaris_aset,
                'posisi_inventaris_aset' => $row->posisi_inventaris_aset,
                'update_by_inventaris_aset' => $row->update_by_inventaris_aset,
                'last_scan_at_inventaris_aset' => date('Y-m-d H:i:s'),
                'last_ip_inventaris_aset' => $this->input->ip_address(),
                'last_scan_by_inventaris_aset' => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->first_name : 'PUBLIC',
                'create_at_inventaris_aset' => $row->create_at_inventaris_aset,
                'update_at_inventaris_aset' => $row->update_at_inventaris_aset,
            );
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if ($this->Inventaris_aset_model->update($row->id_inventaris_aset, $data)) {

                    $data_header = array(
                        'header' => $row->qr_inventaris_aset,
                    );
                    $this->load->view('inc/header_digitalisasi', $data_header);
                    $this->load->view('c_inventaris_aset/inventaris_aset_read', $data);
                    $data_footer = array(
                        'footer' => 'DIVISI SDM & UMUM',
                    );
                    $this->load->view('inc/footer_digitalisasi', $data_footer);
                } else {
                    show_error('Gagal Membuka');
                }
            } else {
                $this->load->view('c_inventaris_aset/inventaris_aset_read', $data);
            }
        } else {
            show_error('Data tidak ditemukan', '500', 'KESALAHAN SISTEM');
        }
    }
    public function cetak($get_value = NULL)
    {
        $link = base_url() . 'digitalisasi/inventaris_aset/';


        $code = ($get_value != NULL) ? $get_value : $this->input->post('code');

        $data = $link . $code;
        $create = $this->libqrcode->create($data, $code, $code, '20', '600', '200');

        $envi = (ENVIRONMENT == 'development') ? '/' . $this->config->item('development_folder') : '';

        // A few settings
        $image = $_SERVER['DOCUMENT_ROOT'] . $envi . '/application/libraries/qrcode/assets/' . $code . '.png';
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));
        $image_download = file_get_contents($image);
        // Format the image SRC: data:{mime};base64,{data};
        $src_qr = 'data:' . mime_content_type($image) . ';base64,' . $imageData;


        $this->load->helper('download');
        force_download($code . '.png', $image_download);
        if (file_exists(APPPATH . 'libraries/qrcode/assets/' . $code . '.png')) {
            unlink(APPPATH . 'libraries/qrcode/assets/' . $code . '.png');
        }
    }

    public function lembur($id)
    {
        $this->load->model('Digitalisasi_form_lembur_model');

        $html_content = '';
        $name = $id; // 

        $kondisi = array('uuid_digitalisasi_form_lembur' => $id,);
        $row = $this->Digitalisasi_form_lembur_model->get_all($kondisi);

        if ($row) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array(
                    'qrcode' => $name,
                    'id_digitalisasi_form_lembur' => $row[0]->id_digitalisasi_form_lembur,
                    'uuid_digitalisasi_form_lembur' => $row[0]->uuid_digitalisasi_form_lembur,
                    'nama_digitalisasi_form_lembur' => $row[0]->nama_digitalisasi_form_lembur,
                    'unit_kerja_digitalisasi_form_lembur' => $row[0]->unit_kerja_digitalisasi_form_lembur,
                    'tanggal_pengajuan_digitalisasi_form_lembur' => date('d M Y', strtotime($row[0]->tanggal_pengajuan_digitalisasi_form_lembur)),
                    // 'hari_lembur_digitalisasi_form_lembur' => date_format($tanggal_lembur, 'l'),
                    'tanggal_lembur_digitalisasi_form_lembur' => date('l, d M Y', strtotime($row[0]->tanggal_lembur_digitalisasi_form_lembur)),
                    'alasan_digitalisasi_form_lembur' => $row[0]->alasan_digitalisasi_form_lembur,
                    'mulai_jam_digitalisasi_form_lembur' => date('H : i', strtotime($row[0]->mulai_jam_digitalisasi_form_lembur)),
                    'selesai_jam_digitalisasi_form_lembur' => date('H : i', strtotime($row[0]->selesai_jam_digitalisasi_form_lembur)),
                    'total_jam_digitalisasi_form_lembur' => date('H : i', strtotime($row[0]->total_jam_digitalisasi_form_lembur)),
                    'diajukan_timestamp_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->diajukan_timestamp_digitalisasi_form_lembur)),
                    'diajukan_digitalisasi_form_lembur' => $row[0]->diajukan_digitalisasi_form_lembur,
                    'diajukan_timestamp_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->diajukan_timestamp_digitalisasi_form_lembur)),
                    'disetujui_digitalisasi_form_lembur' => $row[0]->disetujui_digitalisasi_form_lembur,
                    'disetujui_timestamp_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->disetujui_timestamp_digitalisasi_form_lembur)),
                    'diverifikasi_digitalisasi_form_lembur' => $row[0]->diverifikasi_digitalisasi_form_lembur,
                    'diverifikasi_timestamp_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->diverifikasi_timestamp_digitalisasi_form_lembur)),
                    'diketahui_digitalisasi_form_lembur' => $row[0]->diketahui_digitalisasi_form_lembur,
                    'diketahui_timestamp_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->diketahui_timestamp_digitalisasi_form_lembur)),
                    'timestamp_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->timestamp_digitalisasi_form_lembur)),
                    'modify_by_digitalisasi_form_lembur' => $row[0]->modify_by_digitalisasi_form_lembur,
                    'modify_digitalisasi_form_lembur' => date('d M Y-H:i:s', strtotime($row[0]->modify_digitalisasi_form_lembur)),
                    'revisi_sistem_digitalisasi_form_lembur' => $row[0]->revisi_sistem_digitalisasi_form_lembur,
                );
                // $html_content .= $this->load->view('tempelate_pdf/lembur', $data, true);
                $this->load->view('c_digitalisasi_form_lembur/digitalisasi_form_lembur_read', $data);
                return;
            } else {
                $uuid = $row[0]->uuid_digitalisasi_form_lembur;
                $this->libqrcode->create($uuid, $name);


                $tanggal_pengajuan = date_create($row[0]->tanggal_pengajuan_digitalisasi_form_lembur);
                $tanggal_lembur = date_create($row[0]->tanggal_lembur_digitalisasi_form_lembur);
                $mulai_lembur = date_create($row[0]->mulai_jam_digitalisasi_form_lembur);
                $selesai_lembur = date_create($row[0]->selesai_jam_digitalisasi_form_lembur);
                $total_lembur = date_create($row[0]->total_jam_digitalisasi_form_lembur);

                $diajukan_timestamp_digitalisasi_form_lembur = date_create($row[0]->diajukan_timestamp_digitalisasi_form_lembur);
                $disetujui_timestamp_digitalisasi_form_lembur = date_create($row[0]->disetujui_timestamp_digitalisasi_form_lembur);
                $diverifikasi_timestamp_digitalisasi_form_lembur = date_create($row[0]->diverifikasi_timestamp_digitalisasi_form_lembur);
                $diketahui_timestamp_digitalisasi_form_lembur = date_create($row[0]->diketahui_timestamp_digitalisasi_form_lembur);


                $data = array(
                    'nama_file' => $row[0]->nama_digitalisasi_form_lembur . ' ' . date_format($tanggal_lembur, 'Y-m-d'),

                    'qrcode' => $name,
                    'id_digitalisasi_form_lembur' => $row[0]->id_digitalisasi_form_lembur,
                    'uuid_digitalisasi_form_lembur' => $row[0]->uuid_digitalisasi_form_lembur,
                    'nama_digitalisasi_form_lembur' => $row[0]->nama_digitalisasi_form_lembur,
                    'unit_kerja_digitalisasi_form_lembur' => $row[0]->unit_kerja_digitalisasi_form_lembur,
                    'tanggal_pengajuan_digitalisasi_form_lembur' => date_format($tanggal_pengajuan, 'd M Y'),
                    'hari_lembur_digitalisasi_form_lembur' => date_format($tanggal_lembur, 'l'),
                    'tanggal_lembur_digitalisasi_form_lembur' => date_format($tanggal_lembur, 'd M Y'),
                    'alasan_digitalisasi_form_lembur' => $row[0]->alasan_digitalisasi_form_lembur,
                    'mulai_jam_digitalisasi_form_lembur' => date_format($mulai_lembur, "H : i"),
                    'selesai_jam_digitalisasi_form_lembur' => date_format($selesai_lembur, "H : i"),
                    'total_jam_digitalisasi_form_lembur' => date_format($total_lembur, "H : i"),
                    'diajukan_digitalisasi_form_lembur' => $row[0]->diajukan_digitalisasi_form_lembur,
                    'diajukan_timestamp_digitalisasi_form_lembur' => date_format($diajukan_timestamp_digitalisasi_form_lembur, "d M Y-H:i:s"),
                    'disetujui_digitalisasi_form_lembur' => $row[0]->disetujui_digitalisasi_form_lembur,
                    'disetujui_timestamp_digitalisasi_form_lembur' => date_format($disetujui_timestamp_digitalisasi_form_lembur, "d M Y-H:i:s"),
                    'diverifikasi_digitalisasi_form_lembur' => $row[0]->diverifikasi_digitalisasi_form_lembur,
                    'diverifikasi_timestamp_digitalisasi_form_lembur' => date_format($diverifikasi_timestamp_digitalisasi_form_lembur, "d M Y-H:i:s"),
                    'diketahui_digitalisasi_form_lembur' => $row[0]->diketahui_digitalisasi_form_lembur,
                    'diketahui_timestamp_digitalisasi_form_lembur' => date_format($diketahui_timestamp_digitalisasi_form_lembur, "d M Y-H:i:s"),
                    'timestamp_digitalisasi_form_lembur' => $row[0]->timestamp_digitalisasi_form_lembur,
                    'modify_digitalisasi_form_lembur' => $row[0]->modify_digitalisasi_form_lembur,
                    'modify_by_digitalisasi_form_lembur' => $row[0]->modify_by_digitalisasi_form_lembur,
                    'revisi_sistem_digitalisasi_form_lembur' => $row[0]->revisi_sistem_digitalisasi_form_lembur,
                );
                $html_content .= $this->load->view('tempelate_pdf/lembur', $data, true);

                if ($this->ion_auth->user()->row()->first_name == 'Dessy Wulandari Kusuma Wardani') {
                    $id = $row[0]->id_digitalisasi_form_lembur;
                    $acc_diverifikasi = array(
                        'is_download_digitalisasi_form_lembur' => 1,
                    );
                    $this->load->model('Digitalisasi_form_lembur_model');

                    if ($this->Digitalisasi_form_lembur_model->update($id, $acc_diverifikasi) == FALSE) {
                        'ERROR SYSTEM';
                    }
                }

                // echo $html_content;
                $this->pdf->generate($html_content, $uuid, true, 'A4', 'landscape');
                if (file_exists(APPPATH . 'libraries/qrcode/assets/' . $name . '.png')) {
                    unlink(APPPATH . 'libraries/qrcode/assets/' . $name . '.png');
                }
            }
        } else {
            show_error('Data tidak ditemukan', '500', 'KESALAHAN SISTEM');
        }
    }

    public function perjalanan_dinas($id)
    {
        $this->load->model('Digitalisasi_form_k32_model');
        $this->load->model('Digitalisasi_form_k31_model');
        $this->load->model('Digitalisasi_form_k1_model');
        $generate_file = array();
        $orientations = array();

        $html_content = '';
        $name = base64_decode($id); // 

        $kondisi = array('nomor_digitalisasi_form_k32' => $name,);
        $row_k32 = $this->Digitalisasi_form_k32_model->get_all_join($kondisi);

        if ($row_k32) {
            $qrcode = $id;
            $uuid = $row_k32[0]->uuid_digitalisasi_form_k32;
            if (!$uuid) {
                $qrcode = false;
            } else {
                $this->libqrcode->create($uuid, $qrcode);
            }

            $tanggal_pengajuan = date_create($row_k32[0]->tanggal_pengajuan_digitalisasi_form_k32);

            $data_k32 = array(
                'nama_file' => 'PD ' . date('d-m-Y', strtotime($row_k32[0]->tanggal_berangkat_digitalisasi_form_k32)) . ' s.d ' . date('d-m-Y', strtotime($row_k32[0]->tanggal_pulang_digitalisasi_form_k32)) . ' a.n ' . $row_k32[0]->nama_digitalisasi_form_k32,

                'qrcode' => $qrcode,
                'id_digitalisasi_form_k32' => $row_k32[0]->id_digitalisasi_form_k32,
                'uuid_digitalisasi_form_k32' => $row_k32[0]->uuid_digitalisasi_form_k32,
                'kategori_digitalisasi_form_k32' => $row_k32[0]->kategori_digitalisasi_form_k32,
                'nomor_digitalisasi_form_k32' => $row_k32[0]->nomor_digitalisasi_form_k32,
                'tanggal_pengajuan_digitalisasi_form_k32' => date_format($tanggal_pengajuan, 'd F Y'),
                'kebutuhan_digitalisasi_form_k32' => $row_k32[0]->kebutuhan_digitalisasi_form_k32,
                'kode_proyek_digitalisasi_form_k32' => $row_k32[0]->kode_proyek_digitalisasi_form_k32,
                'nama_proyek_digitalisasi_form_k32' => $row_k32[0]->nama_proyek_digitalisasi_form_k32,
                'keperluan_digitalisasi_form_k32' => $row_k32[0]->keperluan_digitalisasi_form_k32,
                'nama_digitalisasi_form_k32' => $row_k32[0]->nama_digitalisasi_form_k32,
                'nip_digitalisasi_form_k32' => $row_k32[0]->nip_digitalisasi_form_k32,
                'gol_digitalisasi_form_k32' => $row_k32[0]->gol_digitalisasi_form_k32,
                'jabatan_digitalisasi_form_k32' => $row_k32[0]->jabatan_digitalisasi_form_k32,
                'unit_kerja_digitalisasi_form_k32' => $row_k32[0]->unit_kerja_digitalisasi_form_k32,
                'tanggal_berangkat_digitalisasi_form_k32' => $row_k32[0]->tanggal_berangkat_digitalisasi_form_k32,
                'tanggal_pulang_digitalisasi_form_k32' => $row_k32[0]->tanggal_pulang_digitalisasi_form_k32,
                'dari_digitalisasi_form_k32' => $row_k32[0]->dari_digitalisasi_form_k32,
                'lokasi_tujuan_digitalisasi_form_k32' => $row_k32[0]->lokasi_tujuan_digitalisasi_form_k32,
                'cara_pembayaran_digitalisasi_form_k32' => $row_k32[0]->cara_pembayaran_digitalisasi_form_k32,
                'catatan_digitalisasi_form_k32' => $row_k32[0]->catatan_digitalisasi_form_k32,
                'uang_muka_digitalisasi_form_k32' => $row_k32[0]->uang_muka_digitalisasi_form_k32,
                'detail_uang_muka_digitalisasi_form_k32' => $row_k32[0]->detail_uang_muka_digitalisasi_form_k32,
                'req_tiket_digitalisasi_form_k32' => $row_k32[0]->req_tiket_digitalisasi_form_k32,
                'req_penginapan_digitalisasi_form_k32' => $row_k32[0]->req_penginapan_digitalisasi_form_k32,
                'req_transport_lokal_digitalisasi_form_k32' => $row_k32[0]->req_transport_lokal_digitalisasi_form_k32,
                'diajukan_digitalisasi_form_k32' => $row_k32[0]->diajukan_digitalisasi_form_k32,
                'diajukan_timestamp_digitalisasi_form_k32' => ($row_k32[0]->diajukan_timestamp_digitalisasi_form_k32) ? date('d M Y-H:i:s', strtotime($row_k32[0]->diajukan_timestamp_digitalisasi_form_k32)) : 'void',
                'disetujui_digitalisasi_form_k32' => $row_k32[0]->disetujui_digitalisasi_form_k32,
                'disetujui_timestamp_digitalisasi_form_k32' => ($row_k32[0]->disetujui_timestamp_digitalisasi_form_k32) ? date('d M Y-H:i:s', strtotime($row_k32[0]->disetujui_timestamp_digitalisasi_form_k32)) : 'void',
                'timestamp_digitalisasi_form_k32' => $row_k32[0]->timestamp_digitalisasi_form_k32,
                'modify_digitalisasi_form_k32' => $row_k32[0]->modify_digitalisasi_form_k32,
                'modify_by_digitalisasi_form_k32' => $row_k32[0]->modify_by_digitalisasi_form_k32,
                'status_digitalisasi_form_k32' => $row_k32[0]->status_digitalisasi_form_k32,
                'revisi_sistem_digitalisasi_form_k32' => $row_k32[0]->revisi_sistem_digitalisasi_form_k32,
            );
            $html_content .= $this->load->view('tempelate_pdf/k32', $data_k32, true);
            array_push($generate_file, $html_content);
            array_push($orientations, 'landscape');


            $html_content = '';
            $kondisi = array('nomor_digitalisasi_form_k32' => $name,);
            $row_k31 = $this->Digitalisasi_form_k32_model->get_all_join($kondisi);
            if ($row_k31) {
                $qrcode = $id;
                $uuid = $row_k31[0]->uuid_digitalisasi_form_k31;
                if (!$uuid) {
                    $qrcode = false;
                } else {
                    $this->libqrcode->create($uuid, $qrcode);
                }

                $tanggal_form = date_create($row_k31[0]->tanggal_digitalisasi_form_k31);
                $tanggal_berangkat = date_create($row_k31[0]->tanggal_berangkat_digitalisasi_form_k31);
                $tanggal_pulang = date_create($row_k31[0]->tanggal_pulang_digitalisasi_form_k31);


                $data_k31 = array(
                    'qrcode' => $qrcode,
                    'id_digitalisasi_form_k31' => $row_k31[0]->id_digitalisasi_form_k31,
                    'uuid_digitalisasi_form_k31' => $row_k31[0]->uuid_digitalisasi_form_k31,
                    'kategori_digitalisasi_form_k31' => $row_k31[0]->kategori_digitalisasi_form_k31,
                    'nomor_digitalisasi_form_k31' => $row_k31[0]->nomor_digitalisasi_form_k31,
                    'tanggal_digitalisasi_form_k31' => date_format($tanggal_form, 'd F Y'),
                    'dari_digitalisasi_form_k31' => $row_k31[0]->dari_digitalisasi_form_k31,
                    'lokasi_tujuan_digitalisasi_form_k31' => $row_k31[0]->lokasi_tujuan_digitalisasi_form_k31,
                    'tanggal_berangkat_digitalisasi_form_k31' => date_format($tanggal_berangkat, 'd F Y'),
                    'tanggal_pulang_digitalisasi_form_k31' => date_format($tanggal_pulang, 'd F Y'),
                    'jumlah_hari_digitalisasi_form_k31' => $row_k31[0]->jumlah_hari_digitalisasi_form_k31,
                    'nomor_k32_digitalisasi_form_k31' => $row_k31[0]->nomor_k32_digitalisasi_form_k31,
                    'nama_digitalisasi_form_k31' => $row_k31[0]->nama_digitalisasi_form_k31,
                    'jabatan_digitalisasi_form_k31' => $row_k31[0]->jabatan_digitalisasi_form_k31,
                    'gol_digitalisasi_form_k31' => $row_k31[0]->gol_digitalisasi_form_k31,
                    'uang_harian_digitalisasi_form_k31' => $row_k31[0]->uang_harian_digitalisasi_form_k31,
                    'total_diterima_digitalisasi_form_k31' => $row_k31[0]->total_diterima_digitalisasi_form_k31,
                    'diketahui_digitalisasi_form_k31' => $row_k31[0]->diketahui_digitalisasi_form_k31,
                    'diketahui_timestamp_digitalisasi_form_k31' => ($row_k31[0]->diketahui_timestamp_digitalisasi_form_k31) ? date('d M Y-H:i:s', strtotime($row_k31[0]->diketahui_timestamp_digitalisasi_form_k31)) : 'void',

                    'uang_muka_digitalisasi_form_k31' => $row_k31[0]->uang_muka_digitalisasi_form_k31,
                    'detail_uang_muka_digitalisasi_form_k31' => $row_k31[0]->detail_uang_muka_digitalisasi_form_k31,
                    'revisi_sistem_digitalisasi_form_k31' => $row_k31[0]->revisi_sistem_digitalisasi_form_k31,
                );
                $html_content .= $this->load->view('tempelate_pdf/k31', $data_k31, true);
            }
            if ($this->ion_auth->user()->row()->unit_kerja == 'Divisi Keuangan & Akuntansi') {
                array_push($generate_file, $html_content);
                array_push($orientations, 'landscape');
            }

            // echo $html_content;
            // die;
            $this->load->helper('terbilang');
            $html_content = '';

            $kondisi = array('nomor_digitalisasi_form_k31' => $row_k31[0]->nomor_digitalisasi_form_k31,);

            $row_k1_lumpsum = $this->Digitalisasi_form_k32_model->get_all_join($kondisi, false);

            if ($row_k1_lumpsum) {
                $qrcode = $id;
                $uuid = $row_k1_lumpsum[0]->uuid_digitalisasi_form_k1;
                if (!$uuid) {
                    $qrcode = false;
                } else {
                    $this->libqrcode->create($uuid, $qrcode);
                }

                $data_k1_lumpsum = array(
                    'qrcode' => $qrcode,
                    'id_digitalisasi_form_k1' => $row_k1_lumpsum[0]->id_digitalisasi_form_k1,
                    'uuid_digitalisasi_form_k1' => $row_k1_lumpsum[0]->uuid_digitalisasi_form_k1,
                    'nomor_digitalisasi_form_k1' => $row_k1_lumpsum[0]->nomor_digitalisasi_form_k1,
                    'no_kas_digitalisasi_form_k1' => ucfirst($row_k1_lumpsum[0]->no_kas_digitalisasi_form_k1),
                    'no_rekening_digitalisasi_form_k1' => $row_k1_lumpsum[0]->no_rekening_digitalisasi_form_k1,
                    'no_cek_giro_digitalisasi_form_k1' => $row_k1_lumpsum[0]->no_cek_giro_digitalisasi_form_k1,
                    'no_kasir_digitalisasi_form_k1' => $row_k1_lumpsum[0]->no_kasir_digitalisasi_form_k1,
                    'dibayarkan_kepada_digitalisasi_form_k1' => $row_k1_lumpsum[0]->dibayarkan_kepada_digitalisasi_form_k1,
                    'uang_sejumlah_digitalisasi_form_k1' => $row_k1_lumpsum[0]->uang_sejumlah_digitalisasi_form_k1,
                    'untuk_pengeluaran_digitalisasi_form_k1' => $row_k1_lumpsum[0]->untuk_pengeluaran_digitalisasi_form_k1,
                    'verifikasi_anggaran_digitalisasi_form_k1' => $row_k1_lumpsum[0]->verifikasi_anggaran_digitalisasi_form_k1,
                    'verifikasi_anggaran_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->verifikasi_anggaran_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->verifikasi_anggaran_timestamp_digitalisasi_form_k1)) : 'void',
                    'kadiv_keuangan_digitalisasi_form_k1' => $row_k1_lumpsum[0]->kadiv_keuangan_digitalisasi_form_k1,
                    'kadiv_keuangan_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->kadiv_keuangan_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->kadiv_keuangan_timestamp_digitalisasi_form_k1)) : 'void',
                    'dirkeu_digitalisasi_form_k1' => $row_k1_lumpsum[0]->dirkeu_digitalisasi_form_k1,
                    'dirkeu_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->dirkeu_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->dirkeu_timestamp_digitalisasi_form_k1)) : 'void',
                    'dirut_digitalisasi_form_k1' => $row_k1_lumpsum[0]->dirut_digitalisasi_form_k1,
                    'dirut_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->dirut_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->dirut_timestamp_digitalisasi_form_k1)) : 'void',
                    'akuntansi_bayar_digitalisasi_form_k1' => $row_k1_lumpsum[0]->akuntansi_bayar_digitalisasi_form_k1,
                    'akuntansi_bayar_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->akuntansi_bayar_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->akuntansi_bayar_timestamp_digitalisasi_form_k1)) : 'void',
                    'pejalan_dinas_digitalisasi_form_k1' => $row_k1_lumpsum[0]->pejalan_dinas_digitalisasi_form_k1,
                    'pejalan_dinas_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->pejalan_dinas_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->pejalan_dinas_timestamp_digitalisasi_form_k1)) : 'void',
                    'akuntansi_verifikasi_digitalisasi_form_k1' => $row_k1_lumpsum[0]->akuntansi_verifikasi_digitalisasi_form_k1,
                    'akuntansi_verifikasi_timestamp_digitalisasi_form_k1' => ($row_k1_lumpsum[0]->akuntansi_verifikasi_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_lumpsum[0]->akuntansi_verifikasi_timestamp_digitalisasi_form_k1)) : 'void',
                    'kode_rekening_debet_digitalisasi_form_k1' => $row_k1_lumpsum[0]->kode_rekening_debet_digitalisasi_form_k1,
                    'kode_rekening_kredit_digitalisasi_form_k1' => $row_k1_lumpsum[0]->kode_rekening_kredit_digitalisasi_form_k1,
                    'kode_kegiatan_digitalisasi_form_k1' => $row_k1_lumpsum[0]->kode_kegiatan_digitalisasi_form_k1,
                    'debet_digitalisasi_form_k1' => $row_k1_lumpsum[0]->debet_digitalisasi_form_k1,
                    'kredit_digitalisasi_form_k1' => $row_k1_lumpsum[0]->kredit_digitalisasi_form_k1,
                    'catatan_digitalisasi_form_k1' => $row_k1_lumpsum[0]->catatan_digitalisasi_form_k1,
                    'no_verifikasi_digitalisasi_form_k1' => $row_k1_lumpsum[0]->no_verifikasi_digitalisasi_form_k1,
                    'revisi_sistem_digitalisasi_form_k1' => $row_k31[0]->revisi_sistem_digitalisasi_form_k1,

                );
                $html_content .= $this->load->view('tempelate_pdf/k1', $data_k1_lumpsum, true);
                array_push($generate_file, $html_content);
                array_push($orientations, 'portrait');
            }

            $html_content = '';
            if ($row_k1_lumpsum[0]->nomor_uang_muka_k1_digitalisasi_form_k31) {
                $row_k1_um = $this->Digitalisasi_form_k32_model->get_all_join($kondisi, false, $row_k1_lumpsum[0]->nomor_uang_muka_k1_digitalisasi_form_k31);
                if ($row_k1_um and $row_k1_um[0]->status_digitalisasi_form_k1 == 'selesai') {
                    $qrcode = $id;
                    $uuid = $row_k1_lumpsum[0]->uuid_digitalisasi_form_k1;
                    if (!$uuid) {
                        $qrcode = false;
                    } else {
                        $this->libqrcode->create($uuid, $qrcode);
                    }

                    $data_k1_um = array(
                        'qrcode' => $qrcode,
                        'id_digitalisasi_form_k1' => $row_k1_um[0]->id_digitalisasi_form_k1,
                        'uuid_digitalisasi_form_k1' => $row_k1_um[0]->uuid_digitalisasi_form_k1,
                        'nomor_digitalisasi_form_k1' => $row_k1_um[0]->nomor_digitalisasi_form_k1,
                        'no_kas_digitalisasi_form_k1' => ucfirst($row_k1_um[0]->no_kas_digitalisasi_form_k1),
                        'no_rekening_digitalisasi_form_k1' => $row_k1_um[0]->no_rekening_digitalisasi_form_k1,
                        'no_cek_giro_digitalisasi_form_k1' => $row_k1_um[0]->no_cek_giro_digitalisasi_form_k1,
                        'no_kasir_digitalisasi_form_k1' => $row_k1_um[0]->no_kasir_digitalisasi_form_k1,
                        'dibayarkan_kepada_digitalisasi_form_k1' => $row_k1_um[0]->dibayarkan_kepada_digitalisasi_form_k1,
                        'uang_sejumlah_digitalisasi_form_k1' => $row_k1_um[0]->uang_sejumlah_digitalisasi_form_k1,
                        'untuk_pengeluaran_digitalisasi_form_k1' => $row_k1_um[0]->untuk_pengeluaran_digitalisasi_form_k1,
                        'verifikasi_anggaran_digitalisasi_form_k1' => $row_k1_um[0]->verifikasi_anggaran_digitalisasi_form_k1,
                        'verifikasi_anggaran_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->verifikasi_anggaran_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->verifikasi_anggaran_timestamp_digitalisasi_form_k1)) : 'void',
                        'kadiv_keuangan_digitalisasi_form_k1' => $row_k1_um[0]->kadiv_keuangan_digitalisasi_form_k1,
                        'kadiv_keuangan_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->kadiv_keuangan_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->kadiv_keuangan_timestamp_digitalisasi_form_k1)) : 'void',
                        'dirkeu_digitalisasi_form_k1' => $row_k1_um[0]->dirkeu_digitalisasi_form_k1,
                        'dirkeu_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->dirkeu_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->dirkeu_timestamp_digitalisasi_form_k1)) : 'void',
                        'dirut_digitalisasi_form_k1' => $row_k1_um[0]->dirut_digitalisasi_form_k1,
                        'dirut_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->dirut_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->dirut_timestamp_digitalisasi_form_k1)) : 'void',
                        'akuntansi_bayar_digitalisasi_form_k1' => $row_k1_um[0]->akuntansi_bayar_digitalisasi_form_k1,
                        'akuntansi_bayar_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->akuntansi_bayar_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->akuntansi_bayar_timestamp_digitalisasi_form_k1)) : 'void',
                        'pejalan_dinas_digitalisasi_form_k1' => $row_k1_um[0]->pejalan_dinas_digitalisasi_form_k1,
                        'pejalan_dinas_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->pejalan_dinas_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->pejalan_dinas_timestamp_digitalisasi_form_k1)) : 'void',
                        'akuntansi_verifikasi_digitalisasi_form_k1' => $row_k1_um[0]->akuntansi_verifikasi_digitalisasi_form_k1,
                        'akuntansi_verifikasi_timestamp_digitalisasi_form_k1' => ($row_k1_um[0]->akuntansi_verifikasi_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row_k1_um[0]->akuntansi_verifikasi_timestamp_digitalisasi_form_k1)) : 'void',
                        'kode_rekening_debet_digitalisasi_form_k1' => $row_k1_um[0]->kode_rekening_debet_digitalisasi_form_k1,
                        'kode_rekening_kredit_digitalisasi_form_k1' => $row_k1_um[0]->kode_rekening_kredit_digitalisasi_form_k1,
                        'kode_kegiatan_digitalisasi_form_k1' => $row_k1_um[0]->kode_kegiatan_digitalisasi_form_k1,
                        'debet_digitalisasi_form_k1' => $row_k1_um[0]->debet_digitalisasi_form_k1,
                        'kredit_digitalisasi_form_k1' => $row_k1_um[0]->kredit_digitalisasi_form_k1,
                        'catatan_digitalisasi_form_k1' => $row_k1_um[0]->catatan_digitalisasi_form_k1,
                        'no_verifikasi_digitalisasi_form_k1' => $row_k1_um[0]->no_verifikasi_digitalisasi_form_k1,
                        'revisi_sistem_digitalisasi_form_k1' => $row_k1_um[0]->revisi_sistem_digitalisasi_form_k1,

                    );

                    $html_content .= $this->load->view('tempelate_pdf/k1', $data_k1_um, true);
                    array_push($generate_file, $html_content);
                    array_push($orientations, 'portrait');
                }
            }

            $this->pdf->generate_by_file($generate_file, $data_k32['nama_file'], true, 'A4', $orientations);
            if (file_exists(APPPATH . 'libraries/qrcode/assets/' . $id . '.png')) {
                unlink(APPPATH . 'libraries/qrcode/assets/' . $id . '.png');
            }
        } else {
            show_error('Data tidak ditemukan', '500', 'KESALAHAN SISTEM');
        }
    }


    public function k32($id)
    {
        $this->load->model('Digitalisasi_form_k32_model');


        $html_content = '';
        $name = $id; // 


        $kondisi = array('uuid_digitalisasi_form_k32' => $id,);
        $row = $this->Digitalisasi_form_k32_model->get_all($kondisi);

        if ($row) {
            $row = $row[0];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array(
                    'id_digitalisasi_form_k32' => $row->id_digitalisasi_form_k32,
                    'uuid_digitalisasi_form_k32' => $row->uuid_digitalisasi_form_k32,
                    'kategori_digitalisasi_form_k32' => $row->kategori_digitalisasi_form_k32,
                    'nomor_digitalisasi_form_k32' => $row->nomor_digitalisasi_form_k32,
                    'tanggal_pengajuan_digitalisasi_form_k32' => date('d M Y', strtotime($row->tanggal_pengajuan_digitalisasi_form_k32)),
                    'kebutuhan_digitalisasi_form_k32' => $row->kebutuhan_digitalisasi_form_k32,
                    'kode_proyek_digitalisasi_form_k32' => $row->kode_proyek_digitalisasi_form_k32,
                    'nama_proyek_digitalisasi_form_k32' => $row->nama_proyek_digitalisasi_form_k32,
                    'nama_digitalisasi_form_k32' => $row->nama_digitalisasi_form_k32,
                    'nip_digitalisasi_form_k32' => $row->nip_digitalisasi_form_k32,
                    'gol_digitalisasi_form_k32' => $row->gol_digitalisasi_form_k32,
                    'jabatan_digitalisasi_form_k32' => $row->jabatan_digitalisasi_form_k32,
                    'unit_kerja_digitalisasi_form_k32' => $row->unit_kerja_digitalisasi_form_k32,
                    'tanggal_berangkat_digitalisasi_form_k32' => date('d M Y', strtotime($row->tanggal_berangkat_digitalisasi_form_k32)),
                    'tanggal_pulang_digitalisasi_form_k32' => date('d M Y', strtotime($row->tanggal_pulang_digitalisasi_form_k32)),
                    'dari_digitalisasi_form_k32' => $row->dari_digitalisasi_form_k32,
                    'lokasi_tujuan_digitalisasi_form_k32' => $row->lokasi_tujuan_digitalisasi_form_k32,
                    'cara_pembayaran_digitalisasi_form_k32' => $row->cara_pembayaran_digitalisasi_form_k32,
                    'catatan_digitalisasi_form_k32' => $row->catatan_digitalisasi_form_k32,
                    'req_tiket_digitalisasi_form_k32' => $row->req_tiket_digitalisasi_form_k32,
                    'req_penginapan_digitalisasi_form_k32' => $row->req_penginapan_digitalisasi_form_k32,
                    'req_transport_lokal_digitalisasi_form_k32' => $row->req_transport_lokal_digitalisasi_form_k32,
                    'diajukan_digitalisasi_form_k32' => $row->diajukan_digitalisasi_form_k32,
                    'diajukan_timestamp_digitalisasi_form_k32' => date('d M Y-H:i:s', strtotime($row->diajukan_timestamp_digitalisasi_form_k32)),
                    'disetujui_digitalisasi_form_k32' => $row->disetujui_digitalisasi_form_k32,
                    'disetujui_timestamp_digitalisasi_form_k32' => date('d M Y-H:i:s', strtotime($row->disetujui_timestamp_digitalisasi_form_k32)),
                    'timestamp_digitalisasi_form_k32' => date('d M Y-H:i:s', strtotime($row->timestamp_digitalisasi_form_k32)),
                    'modify_digitalisasi_form_k32' => date('d M Y-H:i:s', strtotime($row->modify_digitalisasi_form_k32)),
                    'modify_by_digitalisasi_form_k32' => $row->modify_by_digitalisasi_form_k32,
                    'status_digitalisasi_form_k32' => $row->status_digitalisasi_form_k32,
                    'revisi_sistem_digitalisasi_form_k32' => $row->revisi_sistem_digitalisasi_form_k32,
                );
                $this->load->view('c_digitalisasi_form_k32/digitalisasi_form_k32_read', $data);
            } else {
                $uuid = $row->uuid_digitalisasi_form_k32;
                $this->libqrcode->create($uuid, $name);

                $tanggal_pengajuan = date_create($row->tanggal_pengajuan_digitalisasi_form_k32);

                $data = array(
                    'nama_file' => $row->nomor_digitalisasi_form_k32 . '|' . $row->nama_digitalisasi_form_k32,

                    'qrcode' => $name,
                    'id_digitalisasi_form_k32' => $row->id_digitalisasi_form_k32,
                    'uuid_digitalisasi_form_k32' => $row->uuid_digitalisasi_form_k32,
                    'kategori_digitalisasi_form_k32' => $row->kategori_digitalisasi_form_k32,
                    'nomor_digitalisasi_form_k32' => $row->nomor_digitalisasi_form_k32,
                    'tanggal_pengajuan_digitalisasi_form_k32' => date_format($tanggal_pengajuan, 'd F Y'),
                    'kebutuhan_digitalisasi_form_k32' => $row->kebutuhan_digitalisasi_form_k32,
                    'kode_proyek_digitalisasi_form_k32' => $row->kode_proyek_digitalisasi_form_k32,
                    'nama_proyek_digitalisasi_form_k32' => $row->nama_proyek_digitalisasi_form_k32,
                    'keperluan_digitalisasi_form_k32' => $row->keperluan_digitalisasi_form_k32,
                    'nama_digitalisasi_form_k32' => $row->nama_digitalisasi_form_k32,
                    'nip_digitalisasi_form_k32' => $row->nip_digitalisasi_form_k32,
                    'gol_digitalisasi_form_k32' => $row->gol_digitalisasi_form_k32,
                    'jabatan_digitalisasi_form_k32' => $row->jabatan_digitalisasi_form_k32,
                    'unit_kerja_digitalisasi_form_k32' => $row->unit_kerja_digitalisasi_form_k32,
                    'tanggal_berangkat_digitalisasi_form_k32' => $row->tanggal_berangkat_digitalisasi_form_k32,
                    'tanggal_pulang_digitalisasi_form_k32' => $row->tanggal_pulang_digitalisasi_form_k32,
                    'dari_digitalisasi_form_k32' => $row->dari_digitalisasi_form_k32,
                    'lokasi_tujuan_digitalisasi_form_k32' => $row->lokasi_tujuan_digitalisasi_form_k32,
                    'cara_pembayaran_digitalisasi_form_k32' => $row->cara_pembayaran_digitalisasi_form_k32,
                    'catatan_digitalisasi_form_k32' => $row->catatan_digitalisasi_form_k32,
                    'uang_muka_digitalisasi_form_k32' => $row->uang_muka_digitalisasi_form_k32,
                    'detail_uang_muka_digitalisasi_form_k32' => $row->detail_uang_muka_digitalisasi_form_k32,
                    'req_tiket_digitalisasi_form_k32' => $row->req_tiket_digitalisasi_form_k32,
                    'req_penginapan_digitalisasi_form_k32' => $row->req_penginapan_digitalisasi_form_k32,
                    'req_transport_lokal_digitalisasi_form_k32' => $row->req_transport_lokal_digitalisasi_form_k32,
                    'diajukan_digitalisasi_form_k32' => $row->diajukan_digitalisasi_form_k32,
                    'diajukan_timestamp_digitalisasi_form_k32' => ($row->diajukan_timestamp_digitalisasi_form_k32) ? date('d M Y-H:i:s', strtotime($row->diajukan_timestamp_digitalisasi_form_k32)) : 'void',
                    'disetujui_digitalisasi_form_k32' => $row->disetujui_digitalisasi_form_k32,
                    'disetujui_timestamp_digitalisasi_form_k32' => ($row->disetujui_timestamp_digitalisasi_form_k32) ? date('d M Y-H:i:s', strtotime($row->disetujui_timestamp_digitalisasi_form_k32)) : 'void',
                    'timestamp_digitalisasi_form_k32' => $row->timestamp_digitalisasi_form_k32,
                    'modify_digitalisasi_form_k32' => $row->modify_digitalisasi_form_k32,
                    'modify_by_digitalisasi_form_k32' => $row->modify_by_digitalisasi_form_k32,
                    'status_digitalisasi_form_k32' => $row->status_digitalisasi_form_k32,
                    'revisi_sistem_digitalisasi_form_k32' => $row->revisi_sistem_digitalisasi_form_k32,
                );
                $html_content .= $this->load->view('tempelate_pdf/k32', $data, true);
                // echo $html_content;
                $this->pdf->generate($html_content, $uuid, true, 'A4', 'landscape');

                if (file_exists(APPPATH . 'libraries/qrcode/assets/' . $name . '.png')) {
                    unlink(APPPATH . 'libraries/qrcode/assets/' . $name . '.png');
                }
            }
        } else {
            show_error('Data tidak ditemukan', '500', 'KESALAHAN SISTEM');
        }
    }
    public function k31($id)
    {
        $this->load->model('Digitalisasi_form_k31_model');


        $html_content = '';
        $name = $id; // 


        $kondisi = array('uuid_digitalisasi_form_k31' => $id,);
        $row = $this->Digitalisasi_form_k31_model->get_all($kondisi);
        if ($row) {
            $row = $row[0];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array(
                    'id_digitalisasi_form_k31' => $row->id_digitalisasi_form_k31,
                    'uuid_digitalisasi_form_k31' => $row->uuid_digitalisasi_form_k31,
                    'kategori_digitalisasi_form_k31' => $row->kategori_digitalisasi_form_k31,
                    'nomor_digitalisasi_form_k31' => $row->nomor_digitalisasi_form_k31,
                    'tanggal_digitalisasi_form_k31' => date('d M Y', strtotime($row->tanggal_digitalisasi_form_k31)),
                    'dari_digitalisasi_form_k31' => $row->dari_digitalisasi_form_k31,
                    'lokasi_tujuan_digitalisasi_form_k31' => $row->lokasi_tujuan_digitalisasi_form_k31,
                    'tanggal_berangkat_digitalisasi_form_k31' => date('d M Y', strtotime($row->tanggal_berangkat_digitalisasi_form_k31)),
                    'tanggal_pulang_digitalisasi_form_k31' => date('d M Y', strtotime($row->tanggal_pulang_digitalisasi_form_k31)),
                    'jumlah_hari_digitalisasi_form_k31' => $row->jumlah_hari_digitalisasi_form_k31,
                    'nomor_k32_digitalisasi_form_k31' => $row->nomor_k32_digitalisasi_form_k31,
                    'nama_digitalisasi_form_k31' => $row->nama_digitalisasi_form_k31,
                    'jabatan_digitalisasi_form_k31' => $row->jabatan_digitalisasi_form_k31,
                    'gol_digitalisasi_form_k31' => $row->gol_digitalisasi_form_k31,
                    'uang_harian_digitalisasi_form_k31' => "Rp " . number_format($row->uang_harian_digitalisasi_form_k31, 0, ',', '.'),
                    'total_diterima_digitalisasi_form_k31' => "Rp " . number_format($row->total_diterima_digitalisasi_form_k31, 0, ',', '.'),
                    'diketahui_digitalisasi_form_k31' => $row->diketahui_digitalisasi_form_k31,
                    'diketahui_timestamp_digitalisasi_form_k31' => date('d M Y H:i:s', strtotime($row->diketahui_timestamp_digitalisasi_form_k31)),
                    'revisi_sistem_digitalisasi_form_k31' => $row->revisi_sistem_digitalisasi_form_k31,
                );
                $this->load->view('c_digitalisasi_form_k31/digitalisasi_form_k31_read', $data);
            } else {
                $uuid = $row[0]->uuid_digitalisasi_form_k31;
                $this->libqrcode->create($uuid, $name);


                $tanggal_form = date_create($row[0]->tanggal_digitalisasi_form_k31);
                $tanggal_berangkat = date_create($row[0]->tanggal_berangkat_digitalisasi_form_k31);
                $tanggal_pulang = date_create($row[0]->tanggal_pulang_digitalisasi_form_k31);



                $data = array(
                    'nama_file' => $row[0]->nomor_digitalisasi_form_k31 . '|' . $row[0]->nama_digitalisasi_form_k31,

                    'qrcode' => $name,
                    'id_digitalisasi_form_k31' => $row[0]->id_digitalisasi_form_k31,
                    'uuid_digitalisasi_form_k31' => $row[0]->uuid_digitalisasi_form_k31,
                    'kategori_digitalisasi_form_k31' => $row[0]->kategori_digitalisasi_form_k31,
                    'nomor_digitalisasi_form_k31' => $row[0]->nomor_digitalisasi_form_k31,
                    'tanggal_digitalisasi_form_k31' => date_format($tanggal_form, 'd F Y'),
                    'dari_digitalisasi_form_k31' => $row[0]->dari_digitalisasi_form_k31,
                    'lokasi_tujuan_digitalisasi_form_k31' => $row[0]->lokasi_tujuan_digitalisasi_form_k31,
                    'tanggal_berangkat_digitalisasi_form_k31' => date_format($tanggal_berangkat, 'd F Y'),
                    'tanggal_pulang_digitalisasi_form_k31' => date_format($tanggal_pulang, 'd F Y'),
                    'jumlah_hari_digitalisasi_form_k31' => $row[0]->jumlah_hari_digitalisasi_form_k31,
                    'nomor_k32_digitalisasi_form_k31' => $row[0]->nomor_k32_digitalisasi_form_k31,
                    'nama_digitalisasi_form_k31' => $row[0]->nama_digitalisasi_form_k31,
                    'jabatan_digitalisasi_form_k31' => $row[0]->jabatan_digitalisasi_form_k31,
                    'gol_digitalisasi_form_k31' => $row[0]->gol_digitalisasi_form_k31,
                    'uang_harian_digitalisasi_form_k31' => $row[0]->uang_harian_digitalisasi_form_k31,
                    'total_diterima_digitalisasi_form_k31' => $row[0]->total_diterima_digitalisasi_form_k31,
                    'diketahui_digitalisasi_form_k31' => $row[0]->diketahui_digitalisasi_form_k31,
                    'diketahui_timestamp_digitalisasi_form_k31' => ($row[0]->diketahui_timestamp_digitalisasi_form_k31) ? date('d M Y-H:i:s', strtotime($row[0]->diketahui_timestamp_digitalisasi_form_k31)) : 'void',

                    'uang_muka_digitalisasi_form_k31' => $row[0]->uang_muka_digitalisasi_form_k31,
                    'detail_uang_muka_digitalisasi_form_k31' => $row[0]->detail_uang_muka_digitalisasi_form_k31,
                    'revisi_sistem_digitalisasi_form_k31' => $row[0]->revisi_sistem_digitalisasi_form_k31,
                );
                $html_content .= $this->load->view('tempelate_pdf/k31', $data, true);
                // echo $html_content;
                $this->pdf->generate($html_content, $uuid, true, 'A4', 'landscape');
                if (file_exists(APPPATH . 'libraries/qrcode/assets/' . $name . '.png')) {
                    unlink(APPPATH . 'libraries/qrcode/assets/' . $name . '.png');
                }
            }
        } else {
            show_error('Data tidak ditemukan', '500', 'KESALAHAN SISTEM');
        }
    }
    public function k1($id)
    {
        // yang belum fungsi akuntansi

        $this->load->model('Digitalisasi_form_k1_model');


        $this->load->helper('terbilang');

        $html_content = '';
        $name = $id; // 

        $kondisi = array('uuid_digitalisasi_form_k1' => $id,);
        $row = $this->Digitalisasi_form_k1_model->get_all($kondisi);
        // var_dump($row);
        // die;
        if ($row) {
            $row = $row[0];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array(
                    'id_digitalisasi_form_k1' => $row->id_digitalisasi_form_k1,
                    'uuid_digitalisasi_form_k1' => $row->uuid_digitalisasi_form_k1,
                    'nomor_digitalisasi_form_k1' => $row->nomor_digitalisasi_form_k1,
                    'no_kas_digitalisasi_form_k1' => $row->no_kas_digitalisasi_form_k1,
                    'no_rekening_digitalisasi_form_k1' => $row->no_rekening_digitalisasi_form_k1,
                    'no_cek_giro_digitalisasi_form_k1' => $row->no_cek_giro_digitalisasi_form_k1,
                    'no_kasir_digitalisasi_form_k1' => $row->no_kasir_digitalisasi_form_k1,
                    'dibayarkan_kepada_digitalisasi_form_k1' => $row->dibayarkan_kepada_digitalisasi_form_k1,
                    'uang_sejumlah_digitalisasi_form_k1' => $row->uang_sejumlah_digitalisasi_form_k1,
                    'untuk_pengeluaran_digitalisasi_form_k1' => $row->untuk_pengeluaran_digitalisasi_form_k1,
                    'verifikasi_anggaran_digitalisasi_form_k1' => $row->verifikasi_anggaran_digitalisasi_form_k1,
                    'verifikasi_anggaran_timestamp_digitalisasi_form_k1' => ($row->verifikasi_anggaran_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->verifikasi_anggaran_timestamp_digitalisasi_form_k1)) : 'void',
                    'kadiv_keuangan_digitalisasi_form_k1' => $row->kadiv_keuangan_digitalisasi_form_k1,
                    'kadiv_keuangan_timestamp_digitalisasi_form_k1' => ($row->kadiv_keuangan_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->kadiv_keuangan_timestamp_digitalisasi_form_k1)) : 'void',
                    'dirkeu_digitalisasi_form_k1' => $row->dirkeu_digitalisasi_form_k1,
                    'dirkeu_timestamp_digitalisasi_form_k1' => ($row->dirkeu_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->dirkeu_timestamp_digitalisasi_form_k1)) : 'void',
                    'dirut_digitalisasi_form_k1' => $row->dirut_digitalisasi_form_k1,
                    'dirut_timestamp_digitalisasi_form_k1' => ($row->dirut_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->dirut_timestamp_digitalisasi_form_k1)) : 'void',
                    'akuntansi_bayar_digitalisasi_form_k1' => $row->akuntansi_bayar_digitalisasi_form_k1,
                    'akuntansi_bayar_timestamp_digitalisasi_form_k1' => ($row->akuntansi_bayar_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->akuntansi_bayar_timestamp_digitalisasi_form_k1)) : 'void',
                    'pejalan_dinas_digitalisasi_form_k1' => $row->pejalan_dinas_digitalisasi_form_k1,
                    'pejalan_dinas_timestamp_digitalisasi_form_k1' => ($row->pejalan_dinas_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->pejalan_dinas_timestamp_digitalisasi_form_k1)) : 'void',
                    'akuntansi_verifikasi_digitalisasi_form_k1' => $row->akuntansi_verifikasi_digitalisasi_form_k1,
                    'akuntansi_verifikasi_timestamp_digitalisasi_form_k1' => ($row->akuntansi_verifikasi_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->akuntansi_verifikasi_timestamp_digitalisasi_form_k1)) : 'void',
                    'kode_rekening_debet_digitalisasi_form_k1' => $row->kode_rekening_debet_digitalisasi_form_k1,
                    'kode_rekening_kredit_digitalisasi_form_k1' => $row->kode_rekening_kredit_digitalisasi_form_k1,
                    'kode_kegiatan_digitalisasi_form_k1' => $row->kode_kegiatan_digitalisasi_form_k1, 'debet_digitalisasi_form_k1' => "Rp " . number_format($row->debet_digitalisasi_form_k1, 0, ',', '.'),
                    'kredit_digitalisasi_form_k1' => "Rp " . number_format($row->kredit_digitalisasi_form_k1, 0, ',', '.'),
                    'catatan_digitalisasi_form_k1' => $row->catatan_digitalisasi_form_k1,
                    'no_verifikasi_digitalisasi_form_k1' => $row->no_verifikasi_digitalisasi_form_k1,
                    'revisi_sistem_digitalisasi_form_k1' => $row->revisi_sistem_digitalisasi_form_k1,
                );
                $this->load->view('c_digitalisasi_form_k1/digitalisasi_form_k1_read', $data);
            } else {

                $uuid = $row->uuid_digitalisasi_form_k1;
                $this->libqrcode->create($uuid, $name);

                $data = array(
                    'nama_file' => $row->nomor_digitalisasi_form_k1 . '|' . $row->pejalan_dinas_digitalisasi_form_k1,

                    'qrcode' => $name,
                    'id_digitalisasi_form_k1' => $row->id_digitalisasi_form_k1,
                    'uuid_digitalisasi_form_k1' => $row->uuid_digitalisasi_form_k1,
                    'nomor_digitalisasi_form_k1' => $row->nomor_digitalisasi_form_k1,
                    'no_kas_digitalisasi_form_k1' => $row->no_kas_digitalisasi_form_k1,
                    'no_rekening_digitalisasi_form_k1' => $row->no_rekening_digitalisasi_form_k1,
                    'no_cek_giro_digitalisasi_form_k1' => $row->no_cek_giro_digitalisasi_form_k1,
                    'no_kasir_digitalisasi_form_k1' => $row->no_kasir_digitalisasi_form_k1,
                    'dibayarkan_kepada_digitalisasi_form_k1' => $row->dibayarkan_kepada_digitalisasi_form_k1,
                    'uang_sejumlah_digitalisasi_form_k1' => $row->uang_sejumlah_digitalisasi_form_k1,
                    'untuk_pengeluaran_digitalisasi_form_k1' => $row->untuk_pengeluaran_digitalisasi_form_k1,
                    'verifikasi_anggaran_digitalisasi_form_k1' => $row->verifikasi_anggaran_digitalisasi_form_k1,
                    'verifikasi_anggaran_timestamp_digitalisasi_form_k1' => ($row->verifikasi_anggaran_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->verifikasi_anggaran_timestamp_digitalisasi_form_k1)) : 'void',
                    'kadiv_keuangan_digitalisasi_form_k1' => $row->kadiv_keuangan_digitalisasi_form_k1,
                    'kadiv_keuangan_timestamp_digitalisasi_form_k1' => ($row->kadiv_keuangan_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->kadiv_keuangan_timestamp_digitalisasi_form_k1)) : 'void',
                    'dirkeu_digitalisasi_form_k1' => $row->dirkeu_digitalisasi_form_k1,
                    'dirkeu_timestamp_digitalisasi_form_k1' => ($row->dirkeu_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->dirkeu_timestamp_digitalisasi_form_k1)) : 'void',
                    'dirut_digitalisasi_form_k1' => $row->dirut_digitalisasi_form_k1,
                    'dirut_timestamp_digitalisasi_form_k1' => ($row->dirut_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->dirut_timestamp_digitalisasi_form_k1)) : 'void',
                    'akuntansi_bayar_digitalisasi_form_k1' => $row->akuntansi_bayar_digitalisasi_form_k1,
                    'akuntansi_bayar_timestamp_digitalisasi_form_k1' => ($row->akuntansi_bayar_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->akuntansi_bayar_timestamp_digitalisasi_form_k1)) : 'void',
                    'pejalan_dinas_digitalisasi_form_k1' => $row->pejalan_dinas_digitalisasi_form_k1,
                    'pejalan_dinas_timestamp_digitalisasi_form_k1' => ($row->pejalan_dinas_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->pejalan_dinas_timestamp_digitalisasi_form_k1)) : 'void',
                    'akuntansi_verifikasi_digitalisasi_form_k1' => $row->akuntansi_verifikasi_digitalisasi_form_k1,
                    'akuntansi_verifikasi_timestamp_digitalisasi_form_k1' => ($row->akuntansi_verifikasi_timestamp_digitalisasi_form_k1) ? date('d M Y-H:i:s', strtotime($row->akuntansi_verifikasi_timestamp_digitalisasi_form_k1)) : 'void',
                    'kode_rekening_debet_digitalisasi_form_k1' => $row->kode_rekening_debet_digitalisasi_form_k1,
                    'kode_rekening_kredit_digitalisasi_form_k1' => $row->kode_rekening_kredit_digitalisasi_form_k1,
                    'kode_kegiatan_digitalisasi_form_k1' => $row->kode_kegiatan_digitalisasi_form_k1,
                    'debet_digitalisasi_form_k1' => $row->debet_digitalisasi_form_k1,
                    'kredit_digitalisasi_form_k1' => $row->kredit_digitalisasi_form_k1,
                    'catatan_digitalisasi_form_k1' => $row->catatan_digitalisasi_form_k1,
                    'no_verifikasi_digitalisasi_form_k1' => $row->no_verifikasi_digitalisasi_form_k1,
                    'revisi_sistem_digitalisasi_form_k1' => $row->revisi_sistem_digitalisasi_form_k1,
                );
                $html_content .= $this->load->view('tempelate_pdf/k1', $data, true);
                // echo $html_content;
                $this->pdf->generate($html_content, $uuid, true, 'A4', 'portrait');
                if (file_exists(APPPATH . 'libraries/qrcode/assets/' . $name . '.png')) {
                    unlink(APPPATH . 'libraries/qrcode/assets/' . $name . '.png');
                }
            }
        } else {
            show_error('Data tidak ditemukan', '500', 'KESALAHAN SISTEM / ID ditemukan');
        }
    }
    // /home/lentelkoco/public_html/apps_trial/application/views/tempelate_pdf/img/logo.png
    // /home/lentelkoco/public_html/apps_trial/application/views/tempelate_pdf/img
}

/* End of file Digitalisasi.php */
