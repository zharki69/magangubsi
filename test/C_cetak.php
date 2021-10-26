<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Array_;
Carbon::setLocale('id');

class C_cetak extends CI_Controller
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
    public function hrf020($view = NULL, $no_file = NULL)
    {
        
        $this->orientation_page = 'p';
        //$data_k32['fmt'] = new NumberFormatter('id-ID', NumberFormatter::CURRENCY);
        $this->load->model('test/M_test');
        $data['qrcode'] = 'logo';
        $id = 123;
        $name = $id;
        $kondisi = array('id' => $id);
        $isi = $this->M_test->get_all($kondisi);
        $data = array (
            'nama_pelatihan' => $isi[0]->nama_pelatihan,
            'tanggal_pelatihan_awal' => $isi[0]->tanggal_pelatihan_awal,
            'tanggal_pelatihan_akhir' => $isi[0]->tanggal_pelatihan_akhir,

        );
        $pdf = tcpdf();
        ob_start();
        $watermark = false;
        $set_margin = array(1, 1, 1, 1);
        $pdf = tcpdf(strtoupper($view) . 'Evaluasi Penyelenggaraan (HRF-020)' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, '', false, '2.0', true, 'IGNORED');
        $pdf->setCellPadding('0.05');
        
        $nama_file = "Evaluasi Penyelenggara";
        $html_view = $this->load->view('tabel', $data, TRUE);
        $html = htmlspecialchars_decode($html_view);
        $pdf->writeHTML($html, true, false, true, false, '');


        // ---------------------------------------------------------
        //Close and output PDF document
        ob_end_clean();
        $pdf->Output(strtoupper($nama_file) . '.pdf', 'I');
        // $this->load->view('tempelate_pdf/k32', $data_k32, );
    }
    public function data()
    {
        $this->load->model('test/M_test');

    }
}