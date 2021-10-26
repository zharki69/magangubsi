<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Array_;
Carbon::setLocale('id');

class C_eval extends CI_Controller
{
    public $html_view = '';
    public  $orientation_page = 'P';
    public $pdf_unit = 'cm';
    public $pdf_page_format = 'A4';
    public $font_size = '9';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('tcpdf');
        $this->load->library('my_extend_tcpdf');
        
    }
    public function hrf020($view = NULL, $no_file = NULL)
    {
        
        $this->orientation_page = 'P';
        //$data_eval['fmt'] = new NumberFormatter('id-ID', NumberFormatter::CURRENCY);
        $this->load->model('test/M_test');
        $data['qrcode'] = 'logo';
        $id = 123;
        $name = $id;
        $dtabel = array('id' => $id);
        $row = $this->M_test->get_all($dtabel);
        $row = $row[0];
        if ($row) {
        $data = array(
            'id' => $row->id,
            'uuid' => $row->uuid,
            'nama_peserta' => $row->nama_peserta,
            'nama_pelatihan' => $row->nama_pelatihan,
            'tanggal_pelatihan_awal' => $row->tanggal_pelatihan_awal,
            'tanggal_pelatihan_akhir' => $row->tanggal_pelatihan_akhir,
            'nama_pemateri' => $row->nama_pemateri,
            'nilai_1' => $row->nilai_1,
            'nilai_2' => $row->nilai_2,
            'nilai_3' => $row->nilai_3,
            'nilai_4' => $row->nilai_4,
            'nilai_5' => $row->nilai_5,
            'nilai_6' => $row->nilai_6,
            'nilai_7' => $row->nilai_7,
            'nilai_8' => $row->nilai_8,
            'nilai_9' => $row->nilai_9,
            'nilai_10' => $row->nilai_10,
            'nilai_11' => $row->nilai_11,
            'nilai_12' => $row->nilai_12,
            'nilai_13' => $row->nilai_13,
            'nilai_14' => $row->nilai_14,
            'nilai_15' => $row->nilai_15,
            'nilai_16' => $row->nilai_16,
            'nilai_17' => $row->nilai_17,
            'nilai_18' => $row->nilai_18,
            'nilai_19' => $row->nilai_19,
            'nilai_20' => $row->nilai_20,
            'nilai_21' => $row->nilai_21,
            'komentar' => $row->komentar,
            'timestamp' => $row->timestamp,
            'create_by' => $row->create_by,
            'modify' => $row->modify,
            'modify_by' => $row->modify_by,
            'status' => $row->status,
            'keterangan' => $row->keterangan,
            'revrow_sistem' => $row->revisi_sistem,
            'delete_at' => $row->delete_at,
            'STP' => 'Sangat Tidak Puas',
            'TP' => 'Tidak Puas',
            'CP' => 'Cukup Puas',
            'P' => 'Puas',
            'SP' => 'Sangat Puas',
            'Y' => 'Ya',
            'T' => 'Tidak',
            
        );
    }

        $pdf = tcpdf();
        ob_start();
        $watermark = false;
        $set_margin = array(1, 1, 1, 1);
        $pdf = tcpdf(strtoupper($view) . 'Evaluasi Umum Penyelenggaraan Pelatihan (HRF-020)' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, '', false, '2.0', true, 'IGNORED');
        $pdf->setCellPadding('0.05');
        
        $nama_file = "HRF-020";
        $html_view = $this->load->view('test', $data, TRUE);
        $html = htmlspecialchars_decode($html_view);
        $pdf->writeHTML($html, true, false, true, false, '');


        // ---------------------------------------------------------
        //Close and output PDF document
        ob_end_clean();
        $pdf->Output(strtoupper($nama_file) . '.pdf', 'I');
        // $this->load->view('tempelate_pdf);
    }
}