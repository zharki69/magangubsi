<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Array_;
Carbon::setLocale('id');

class C_lapor extends CI_Controller
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
    public function hrf021($view = NULL, $no_file = NULL)
    {
        
        $this->orientation_page = 'P';
        //$data_eval['fmt'] = new NumberFormatter('id-ID', NumberFormatter::CURRENCY);
        $this->load->model('test/M_lapor');
        $data['qrcode'] = 'logo';
        $id = 123;
        $name = $id;
        $dtabel = array('id' => $id);
        $row = $this->M_lapor->get_all($dtabel);
        $row = $row[0];
        if ($row) {
        $data = array(
            'id'=> $row->id,
            'evaluasi_penyelenggaraan_pelatihan_id'=> $row->evaluasi_penyelenggaraan_pelatihan_id,
            'uuid'=> $row->uuid,
            'nama_peserta'=> $row->nama_peserta,
            'divisi_peserta'=> $row->divisi_peserta,
            'jabatan_peserta'=> $row->jabatan_peserta,
            'jenis_pelatihan'=> $row->jenis_pelatihan,
            'tempat_pelatihan'=> $row->tempat_pelatihan,
            'tanggal_pelatihan_awal'=> $row->tanggal_pelatihan_awal,
            'tanggal_pelatihan_akhir'=> $row->tanggal_pelatihan_akhir,
            'durasi'=> $row->durasi,
            'nama_pemateri'=> $row->nama_pemateri,
            'nama_pelatihan'=> $row->nama_pelatihan,
            'ringkasan_materi'=> $row->ringkasan_materi,
            'manfaat_kesesuaian'=> $row->manfaat_kesesuaian,
            'kekurangan'=> $row->kekurangan,
            'kelebihan'=> $row->kelebihan,
            'kritik'=> $row->kritik,
            'saran'=> $row->saran,
            'dokumentasi'=> $row->dokumentasi,
            'copy_sertifikat'=> $row->copy_sertifikat,
            'copy_materi'=> $row->copy_materi,
            'approve_1_nama'=> $row->approve_1_nama,
            'approve_1_image'=> $row->approve_1_image,
            'approve_1_timestamp'=> $row->approve_1_timestamp,
            'approve_2_nama'=> $row->approve_2_nama,
            'approve_2_image'=> $row->approve_2_image,
            'approve_2_timestamp'=> $row->approve_2_timestamp,
            'approve_3_nama'=> $row->approve_3_nama,
            'approve_3_image'=> $row->approve_3_image,
            'approve_3_timestamp'=> $row->approve_3_timestamp,
            'timestamp'=> $row->timestamp,
            'create_by'=> $row->create_by,
            'modify'=> $row->modify,
            'modify_by'=> $row->modify_by,
            'status'=> $row->status,
            'keterangan'=> $row->keterangan,
            'revisi_sistem'=> $row->revisi_sistem,
            'delete_at'=> $row->delete_at,
            
        );
    }

        $pdf = tcpdf();
        ob_start();
        $watermark = false;
        $set_margin = array(1, 1, 1, 1);
        $pdf = tcpdf(strtoupper($view) . 'Laporan Hasil Pelatihan (HRF-021)' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, '', false, '2.0', true, 'IGNORED');
        $pdf->setCellPadding('0.05');
        
        $nama_file = "HRF-021";
        $html_view = $this->load->view('V_hrf021', $data, TRUE);
        $html = htmlspecialchars_decode($html_view);
        $pdf->writeHTML($html, true, false, true, false, '');


        // ---------------------------------------------------------
        //Close and output PDF document
        ob_end_clean();
        $pdf->Output(strtoupper($nama_file) . '.pdf', 'I');
        // $this->load->view('tempelate_pdf);
    }
}