<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Array_;
Carbon::setLocale('id');

class C_todo extends CI_Controller
{
    public $html_view = '';
    public  $orientation_page = 'p';
    public $pdf_unit = 'cm';
    public $pdf_page_format = 'A4';
    public $font_size = '9';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('tcpdf');
        $this->load->library('my_extend_tcpdf');
        
    }
    public function k32_done($view = NULL, $no_file = NULL)
    {
        $this->orientation_page = 'l';
        $data_k32['fmt'] = new NumberFormatter('id-ID', NumberFormatter::CURRENCY);
        $this->load->model('test/M_test');
        $id = 18742;
        $name = $id;
        $kondisi = array('nomor_digitalisasi_form_k32' => $name,);
        $row_k32 = $this->M_test->get_all($kondisi);
                    $data_k32 = array(
                'nama_file' => 'PD ' . date('d-m-Y', strtotime($row_k32[0]->tanggal_berangkat_digitalisasi_form_k32)) . ' s.d ' . date('d-m-Y', strtotime($row_k32[0]->tanggal_pulang_digitalisasi_form_k32)) . ' a.n ' . $row_k32[0]->nama_digitalisasi_form_k32,

                'qrcode' => "logo",
                'id_digitalisasi_form_k32' => $row_k32[0]->id_digitalisasi_form_k32,
                'uuid_digitalisasi_form_k32' => $row_k32[0]->uuid_digitalisasi_form_k32,
                'kategori_digitalisasi_form_k32' => $row_k32[0]->kategori_digitalisasi_form_k32,
                'nomor_digitalisasi_form_k32' => $row_k32[0]->nomor_digitalisasi_form_k32,
                'tanggal_pengajuan_digitalisasi_form_k32' => "test",
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
                'fmt' => new NumberFormatter('id-ID', NumberFormatter::CURRENCY)
            );
        $pdf = tcpdf();
        $watermark = false;
        $set_margin = array(1, 1, 1, 1);
        $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $row_k32[0]->uuid_digitalisasi_form_k32, false, '2.0', true, 'IGNORED');
        $pdf->setCellPadding('0.05');
        
        $nama_file = "test";
        $html_view = $this->load->view('test', $data_k32, TRUE);
        $html = htmlspecialchars_decode($html_view);
        $pdf->writeHTML($html, true, false, true, false, '');


        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->Output(strtoupper($nama_file) . '.pdf', 'I');
        // $this->load->view('tempelate_pdf/k32', $data_k32, );
    }
    public function index()
    {
        $this->load->model('test/M_test');
        $id = 18742;
        $name = $id;
        $kondisi = array('nomor_digitalisasi_form_k32' => $name,);
        $row_k32 = $this->M_test->get_all($kondisi);
                    $data_k32 = array(
                'nama_file' => 'PD ' . date('d-m-Y', strtotime($row_k32[0]->tanggal_berangkat_digitalisasi_form_k32)) . ' s.d ' . date('d-m-Y', strtotime($row_k32[0]->tanggal_pulang_digitalisasi_form_k32)) . ' a.n ' . $row_k32[0]->nama_digitalisasi_form_k32,

                'qrcode' => "logo",
                'id_digitalisasi_form_k32' => $row_k32[0]->id_digitalisasi_form_k32,
                'uuid_digitalisasi_form_k32' => $row_k32[0]->uuid_digitalisasi_form_k32,
                'kategori_digitalisasi_form_k32' => $row_k32[0]->kategori_digitalisasi_form_k32,
                'nomor_digitalisasi_form_k32' => $row_k32[0]->nomor_digitalisasi_form_k32,
                'tanggal_pengajuan_digitalisasi_form_k32' => "test",
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
                'fmt' => new NumberFormatter('id-ID', NumberFormatter::CURRENCY)
            );
            
        $this->load->view('test', $data_k32);
        
    }
    
    public function generate_test($view = NULL, $no_file = NULL)
    {
        $pdf = tcpdf();
        $watermark = false;
        $set_margin = array(1, 1, 1, 1);
        $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $data->uuid, false, '2.0', true, 'IGNORED');
        $pdf->setCellPadding('0.05');


        // echo ($html);
        // die;
        // // add a page
        // $pdf->AddPage();

        $nama_file = "test";
        $html_view = $this->load->view('test', '', TRUE);
        $html = htmlspecialchars_decode($html_view);
        $pdf->writeHTML($html, true, false, true, false, '');


        // ---------------------------------------------------------
        //Close and output PDF document
        ob_clean();
        $pdf->Output(strtoupper($nama_file) . '.pdf', 'I');

    }
    public function generate_pdf($view = NULL, $no_file = NULL)
    {
        // error_reporting(E_ALL & ~E_NOTICE);
        // $nama_file = 'download';
        // $image_location = $_SERVER['DOCUMENT_ROOT'] .  $this->config->item('envi') . '/gambar/logo_16-9.png';
        if ($view == 'k31')
        {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'p';
            $this->font_size = '11';
            $watermark = false;

            $this->db->where('nomor_digitalisasi_form_k31', $no_file);
            $data = $this->db->get('digitalisasi_form_k31')->row();
            if ($data->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }
            $set_margin = array(1, 1, 1, 1);
            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $data->uuid, false, '2.0', true, 'IGNORED');
            $pdf->setCellPadding('0.05');

            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 3, 0.8, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            $this->load->model('Digitalisasi_dpbj_model');


            $kondisi = array('digitalisasi_dpbj.no_dpbj' => $no_file,);
            $row = $this->Digitalisasi_dpbj_model->get_all($kondisi)->result();
            $row = $row[0];

            $data_akun = $this->db->get('keu_akun');

            $this->load->model('Digitalisasi_dpbj_detail_model');
            $this->db->where('no_dpbj', $no_file);
            $detail_dpbj = $this->db->get('detail_dpbj_join')->result();
            if ($row->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create($row->uuid, $row->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';
                $pdf->Image($image, 22, 1.3, 2.7, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            if ($row) {
                $data = array(
                    'id_digitalisasi_form_k31'=> $row->id_digitalisasi_form_k31,
                    'uuid_digitalisasi_form_k31'=> $row->uuid_digitalisasi_form_k31,
                    'kategori_digitalisasi_form_k31'=> $row->kategori_digitalisasi_form_k31,
                    'nomor_digitalisasi_form_k31'=> $row->nomor_digitalisasi_form_k31,
                    'nomor_k32_digitalisasi_form_k31'=> $row->nomor_k32_digitalisasi_form_k31,
                    'nomor_lumpsum_k1_digitalisasi_form_k31'=> $row->nomor_lumpsum_k1_digitalisasi_form_k31,
                    'nomor_uang_muka_k1_digitalisasi_form_k31'=> $row->nomor_uang_muka_k1_digitalisasi_form_k31,
                    'tanggal_digitalisasi_form_k31'=> $row->tanggal_digitalisasi_form_k31,
                    'dari_digitalisasi_form_k31'=> $row->dari_digitalisasi_form_k31,
                    'lokasi_tujuan_digitalisasi_form_k31'=> $row->lokasi_tujuan_digitalisasi_form_k31,
                    'tanggal_berangkat_digitalisasi_form_k31'=> $row->tanggal_berangkat_digitalisasi_form_k31,
                    'tanggal_pulang_digitalisasi_form_k31'=> $row->tanggal_pulang_digitalisasi_form_k31,
                    'jumlah_hari_digitalisasi_form_k31'=> $row->jumlah_hari_digitalisasi_form_k31,
                    'nama_digitalisasi_form_k31'=> $row->nama_digitalisasi_form_k31,
                    'jabatan_digitalisasi_form_k31'=> $row->jabatan_digitalisasi_form_k31,
                    'gol_digitalisasi_form_k31'=> $row->gol_digitalisasi_form_k31,
                    'uang_harian_digitalisasi_form_k31'=> $row->uang_harian_digitalisasi_form_k31,
                    'total_diterima_digitalisasi_form_k31'=> $row->total_diterima_digitalisasi_form_k31,
                    'diketahui_digitalisasi_form_k31'=> $row->diketahui_digitalisasi_form_k31,
                    'diketahui_timestamp_digitalisasi_form_k31'=> $row->diketahui_timestamp_digitalisasi_form_k31,
                    'uang_muka_digitalisasi_form_k31'=> $row->uang_muka_digitalisasi_form_k31,
                    'detail_uang_muka_digitalisasi_form_k31'=> $row->detail_uang_muka_digitalisasi_form_k31,
                    'revisi_sistem_digitalisasi_form_k31'=> $row->revisi_sistem_digitalisasi_form_k31,
                    'delete_at_digitalisasi_form_k31'=> $row->delete_at_digitalisasi_form_k31,

                    'data_kode_akun' => $data_akun->result(),
                    'detail_dpbj' => $detail_dpbj,
                );
            }

            $html_view = $this->load->view('tempelate_pdf/dpbj', $data, true);
            $nama_file = 'dpbj-' . $row->no_dpbj;

        }

















        else if($view == 'k32')
        {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'p';
            $this->font_size = '11';
            $watermark = false;

            $this->db->where('nomor_digitalisasi_form_k32', $no_file);
            $data = $this->db->get('digitalisasi_form_k32')->row();
            if ($data->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }
            $set_margin = array(1, 1, 1, 1);
            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $data->uuid, false, '2.0', true, 'IGNORED');
            $pdf->setCellPadding('0.05');

            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 3, 0.8, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            $this->load->model('Digitalisasi_dpbj_model');


            $kondisi = array('digitalisasi_dpbj.no_dpbj' => $no_file,);
            $row = $this->Digitalisasi_dpbj_model->get_all($kondisi)->result();
            $row = $row[0];

            $data_akun = $this->db->get('keu_akun');

            $this->load->model('Digitalisasi_dpbj_detail_model');
            $this->db->where('no_dpbj', $no_file);
            $detail_dpbj = $this->db->get('detail_dpbj_join')->result();
            if ($row->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create($row->uuid, $row->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';
                $pdf->Image($image, 22, 1.3, 2.7, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            if ($row) {
                $data = array(
                    'id_digitalisasi_form_k32' => $row->id_digitalisasi_form_k32,
                    'uuid_digitalisasi_form_k32' => $row->uuid_digitalisasi_form_k32,
                    'kategori_digitalisasi_form_k32' => $row->kategori_digitalisasi_form_k32,
                    'nomor_digitalisasi_form_k32' => $row->nomor_digitalisasi_form_k32,
                    'tanggal_pengajuan_digitalisasi_form_k32' => $row->tanggal_pengajuan_digitalisasi_form_k32,
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
                    'req_tiket_digitalisasi_form_k32' => $row->req_tiket_digitalisasi_form_k32,
                    'req_akomodir_tiket_digitalisasi_form_k32' => $row->req_akomodir_tiket_digitalisasi_form_k32,
                    'req_penginapan_digitalisasi_form_k32' => $row->req_penginapan_digitalisasi_form_k32,
                    'req_akomodir_penginapan_digitalisasi_form_k32' => $row->req_akomodir_penginapan_digitalisasi_form_k32,
                    'req_transport_lokal_digitalisasi_form_k32' => $row->req_transport_lokal_digitalisasi_form_k32,
                    'req_akomodir_transport_lokal_digitalisasi_form_k32' => $row->req_akomodir_transport_lokal_digitalisasi_form_k32,
                    'catatan_digitalisasi_form_k32' => $row->catatan_digitalisasi_form_k32,
                    'uang_muka_digitalisasi_form_k32' => $row->uang_muka_digitalisasi_form_k32,
                    'detail_uang_muka_digitalisasi_form_k32' => $row->detail_uang_muka_digitalisasi_form_k32,
                    'diajukan_digitalisasi_form_k32' => $row->diajukan_digitalisasi_form_k32,
                    'diajukan_timestamp_digitalisasi_form_k32' => $row->diajukan_timestamp_digitalisasi_form_k32,
                    'disetujui_digitalisasi_form_k32' => $row->disetujui_digitalisasi_form_k32,
                    'disetujui_timestamp_digitalisasi_form_k32' => $row->disetujui_timestamp_digitalisasi_form_k32,
                    'timestamp_digitalisasi_form_k32' => $row->timestamp_digitalisasi_form_k32,
                    'modify_digitalisasi_form_k32' => $row->modify_digitalisasi_form_k32,
                    'modify_by_digitalisasi_form_k32' => $row->modify_by_digitalisasi_form_k32,
                    'status_digitalisasi_form_k32' => $row->status_digitalisasi_form_k32,
                    'create_digitalisasi_form_k32' => $row->create_digitalisasi_form_k32,
                    'keterangan_digitalisasi_form_k32' => $row->keterangan_digitalisasi_form_k32,
                    'revisi_sistem_digitalisasi_form_k32' => $row->revisi_sistem_digitalisasi_form_k32,
                    'delete_at_digitalisasi_form_k32' => $row->delete_at_digitalisasi_form_k32,

                    'data_kode_akun' => $data_akun->result(),
                    'detail_dpbj' => $detail_dpbj,
                );
            }

            $html_view = $this->load->view('tempelate_pdf/dpbj', $data, true);
            $nama_file = 'dpbj-' . $row->no_dpbj;

        }
        else if($view == 'k1')
        {

        }
        else if($view == 'lembur')
        {
            
        }

    }








            public function get_eval($html)
    {
        $html = str_replace('<!--CODE', '<?php', $html);
        $html = str_replace("CODE-->", "?>", $html);

ob_start();
eval("?>" . $html . "<?php ");
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }
}