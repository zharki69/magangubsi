<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Array_;

class Cetak extends CI_Controller
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
        Carbon::setLocale('id');
    }

    public function index()
    {
        show_404();
    }


    public function generate_pdf()
    {
        error_reporting(E_ALL & ~E_NOTICE);


        $no_file = ($this->input->post('no_file')) ? $this->input->post('no_file') : show_404();
        $html_view = ($this->input->post('html')) ? $this->input->post('html') : show_404();

        $jenis = ($this->input->post('jenis')) ? $this->input->post('jenis') : show_404();
        if ($jenis == 'spph') {
            $set_margin = array(2, 3, 2, 1);
            $watermark = true;
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, true, false, false, '2.0', false, 'PREVIEW', array('arial', 11,));
            // $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false);
            // $pdf->setCellHeightRatio(1.25);
        } elseif ($jenis == 'ban') {
            $watermark = true;
            $set_margin = array(2, 1, 2, 0.2);
            $this->font_size = 11;

            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, false, false, '2.0', false, false, array('arial', 11));
            // $pdf->setCellPadding('0.5');
            $pdf->setCellHeightRatio(1.25);
            // $pdf->setHtmlVSpace(array(
            //     'li' => array(
            //         'h' => 0.1, // margin in mm
            //     )
            // ));
        } elseif ($jenis == 'lpp') {
            $watermark = true;
            $set_margin = array(2, 1, 2, 0.2);

            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, false, false, '2.0', false, false, array('arial', 11));
            // $pdf->setCellPadding('0.5');
            $pdf->setCellHeightRatio(1);

            // $pdf->setHtmlVSpace(array(
            //     'li' => array(
            //         'h' => 0.1, // margin in mm
            //     )
            // ));
        } elseif ($jenis == 'po') {
            $watermark = true;
            $set_margin = array(1, 3, 1, 1);
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, false, false, '2.0', true, false, array('arial', 9));
            $pdf->setCellHeightRatio(1.25);
        } elseif ($jenis == 'spmk') {
            $this->orientation_page = 'p';
            $watermark = true;
            $kop_surat = true;
            $uuid = false;
            $set_margin = array(2, 3.5, 2, 3);
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, $kop_surat, $uuid, false, '2.0', true, false, array('arial', 10));

            $pdf->setCellHeightRatio(1.5);

            // kopsurat
        } elseif ($jenis == 'pks') {
            $this->font_size = 10;
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_pks', $file);
            $data = $this->db->get('digitalisasi_pks')->row();


            // $no_pks = $data->no_pks;
            // $tanggal_pks = $data->tanggal_pks;
            // $nama_supplier = $data->nama_supplier;
            // $alamat_supplier = $data->alamat_supplier;
            // $disetujui_nama = $data->disetujui_nama;
            // $jabatan = $data->jabatan;

            // $this->db->where('no_dpbj', $this->input->post('no_dpbj'));
            // $detail_dpbj = $this->db->get('digitalisasi_dpbj_detail');
            // $detail_dpbj = $detail_dpbj->result();

            // $html_view = $data->render_dokumen;


            $watermark = true;
            $kop_surat = false;
            $uuid = false;
            $set_margin = array(1, 3, 1, 1);
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, $kop_surat, $uuid, false, '2.0', false, false, false, array('arial', '10'));
            $pdf->setCellHeightRatio(1.25);
        } else {
            $watermark = true;
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, FALSE, $watermark, false);
        }

        $image_location = $_SERVER['DOCUMENT_ROOT'] .  $this->config->item('envi') . '/gambar/logo_16-9.png';


        $html = htmlspecialchars_decode($html_view);

        $html = $this->get_eval($html);

        $pdf->writeHTML($html, true, false, true, false, '');

        if ($jenis == 'spph') {
            // $pdf->Image($image_location, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
        } elseif ($jenis == 'ban') {
        } elseif ($jenis == 'po') {
            $pdf->Image($image_location, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
        } else {
        }


        // ---------------------------------------------------------
        //Close and output PDF document

        $pdf->Output($_SERVER['DOCUMENT_ROOT'] .  $this->config->item('envi') . '/temp/temp_' . $jenis . '.pdf', 'F');

        if ($this->input->is_ajax_request()) {
            $response = array(
                'document' => base_url('/temp/temp_' . $jenis . '.pdf'),
            );
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response));
        } else {
            redirect('/temp/temp_' . $jenis . '.pdf', 'refresh');
        }

        //============================================================+
        // END OF FILE
        //============================================================+
    }
    public function view_render($view = NULL, $no_file = NULL)
    {
        error_reporting(E_ALL & ~E_NOTICE);

        $logo_16_9_image = $_SERVER['DOCUMENT_ROOT'] .  $this->config->item('envi') . '/gambar/logo_16-9.png';



        if ($view == 'spph') {
            $this->db->where('no_spph', $no_file);
            $data = $this->db->get('digitalisasi_spph')->row();
            $html_view = $data->render_dokumen;
            $jenis = 'spph';

            $set_margin = array(2, 3, 2, 1);
            if ($data->status == 'batal') {
                $watermark = TRUE;
            } else {
                $watermark = FALSE;
            }

            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, TRUE, $data->uuid, false, '2.0', true, 'IGNORED', array('arial', '11'));
            // var_dump($pdf->getPageHeight() - 11);
            // die;



            $uuid = $data->uuid;
            $ttd_image = $data->ttd_image;
            $ttd_timestamp = $data->ttd_timestamp;
            $ttd_nama = $data->ttd_nama;
        } elseif ($view == 'ban') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_ban', $file);
            $data = $this->db->get('digitalisasi_ban')->row();
            $html_view = $data->render_dokumen;
            $jenis = 'ban';

            $set_margin = array(2, 1, 2, 0.2);
            $this->font_size = 11;

            if ($data->uuid) {
                $watermark = false;
            } else {
                $watermark = false;
            }
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false);
            $pdf->setCellHeightRatio(1.25);
            // uuid belum ada
        } elseif ($view == 'lpp') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_lpp', $file);
            $data = $this->db->get('digitalisasi_lpp')->row();
            $html_view = $data->render_dokumen;
            $jenis = 'lpp';


            $watermark = false;
            $set_margin = array(2, 1, 2, 0.2);

            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array('Hisyam'), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, false, false, '2.0', false, false, array('arial', 11));
            // $pdf->setCellPadding('0.5');
            $pdf->setCellHeightRatio(1);
        } elseif ($view == 'spmk') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_spmk', $file);
            $data = $this->db->get('digitalisasi_spmk')->row();
            $html_view = $data->render_dokumen;
            $jenis = 'spmk';

            $watermark = true;
            $kop_surat = true;
            $uuid = false;
            $set_margin = array(2, 3.5, 2, 3);

            if ($data->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }
            // $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, $kop_surat, $uuid, false, '2.0', true, 'IGNORED', array('arial', 10));
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, $kop_surat, $data->uuid, false, '2.0', true, 'IGNORED', array('arial', 10));

            
            $pdf->setCellHeightRatio(1.5);

            // $uuid = $data->uuid;


            if ($data->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create(base_url('digitalisasi/po/') . $data->uuid, $data->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $data->uuid . '.png';
                $pdf->Image($image, 16,3, 3.5, 3.5, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            $approve_1_nama = $data->approve_1_nama;
            $approve_1_image = $data->approve_1_image;
            $approve_1_timestamp = $data->approve_1_timestamp;
            $approve_2_nama = $data->approve_2_nama;
            $approve_2_image = $data->approve_2_image;
            $approve_2_timestamp = $data->approve_2_timestamp;
        } elseif ($view == 'pks') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_pks', $file);
            $data = $this->db->get('digitalisasi_pks')->row();


            // $no_pks = $data->no_pks;
            // $tanggal_pks = $data->tanggal_pks;
            // $nama_supplier = $data->nama_supplier;
            // $alamat_supplier = $data->alamat_supplier;
            // $disetujui_nama = $data->disetujui_nama;
            // $jabatan = $data->jabatan;

            // $this->db->where('no_dpbj', $this->input->post('no_dpbj'));
            // $detail_dpbj = $this->db->get('digitalisasi_dpbj_detail');
            // $detail_dpbj = $detail_dpbj->result();

            if ($data->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }
            $set_margin = array(1, 3, 1, 1);
            $html_view = $data->render_dokumen;
            $jenis = 'pks';
            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $data->uuid, false, '2.0', false, false, array('arial', 10));
        } elseif ($view == 'po') {
            $no_file = base64_decode($no_file);
            $this->db->where('no_po', $no_file);
            $data = $this->db->get('digitalisasi_po')->row();
            $html_view = $data->render_dokumen;
            $jenis = 'po';

            $set_margin = array(1, 3, 1, 1);
            if ($data->status == 'batal') {
                $watermark = TRUE;
            } else {
                $watermark = FALSE;
            }

            $pdf = tcpdf(strtoupper($jenis) . '-' . $no_file, strtoupper($jenis), array($data->ttd_nama), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $data->uuid, false, '2.0', true, 'IGNORED', array('arial', 9));

            if ($data->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create(base_url('digitalisasi/po/') . $data->uuid, $data->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $data->uuid . '.png';
                $pdf->Image($image, 16, 2, 3.5, 3.5, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            // untuk injeksi
            $uuid = $data->uuid;
            $approve_1_nama = $data->approve_1_nama;
            $approve_1_image = $data->approve_1_image;
            $approve_1_timestamp = $data->approve_1_timestamp;
            $approve_2_nama = $data->approve_2_nama;
            $approve_2_image = $data->approve_2_image;
            $approve_2_timestamp = $data->approve_2_timestamp;
        } else {
            show_error('dokumen tidak dapat dibuka, kesalahan sistem');
        }

        $html = htmlspecialchars_decode($html_view);



        $html = str_replace('<!--CODE', '<?php', $html);
        $html = str_replace("CODE-->", "?>", $html);

ob_start();
eval("?>" . $html . "<?php ");
        $html = ob_get_contents();
        ob_end_clean();


        // var_dump($uuid);
        // var_dump($ttd_image);
        // var_dump($ttd_timestamp);
        // var_dump($ttd_nama);
        // var_dump($html_view);
        // var_dump($html);
        // die;


        $pdf->writeHTML($html, true, false, true, false, '');
        // ---------------------------------------------------------
        //Close and output PDF document

        // if ($jenis == 'spph') {
        //     $logo_16_9_image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
        // };
        // $pdf->Image($logo_16_9_image, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);

        if ($jenis == 'spph') {
            // $pdf->Image($logo_16_9_image, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);

            if ($data->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create(base_url('digitalisasi/spph/' . $data->uuid), $data->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $data->uuid . '.png';

                if ($pdf->GetY() > 10) {
                    $pdf->Image($image, 3, $pdf->GetY() - 5, 2.7, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
                } elseif ($pdf->GetY() > 5) {
                    $pdf->Image($image, 3, $pdf->GetY() - 3, 2.7, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
                }
            }
        } elseif ($jenis == 'ban') {
        } elseif ($jenis == 'po') {
            $pdf->Image($logo_16_9_image, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
        } else {
        }
        // var_dump($pdf->getPageHeight());
        // var_dump($pdf->getPage());
        // var_dump($pdf->GetY());
        // var_dump($pdf->getBreakMargin());

        // echo $pdf->getPageHeight() - $pdf->GetY() - $pdf->getBreakMargin();
        // die;


        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/temp/temp_approve_' . $jenis . '.pdf', 'F');

        if ($this->input->is_ajax_request()) {
            $response = array(
                'document' => base_url('/temp/temp_approve_' . $jenis . '.pdf'),
            );
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response));
        } else {
            // Store the file name into variable
            // A few settings
            $file = '/temp/temp_approve_' . $jenis . '.pdf';
            $filepath = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . $file;
            // Header content type
            header("Content-type: application/pdf");
            readfile($filepath);
            unlink($filepath);
        }

        //============================================================+
        // END OF FILE
        //============================================================+
    }
    public function view_pdf($view = NULL, $no_file = NULL)
    {
        error_reporting(E_ALL & ~E_NOTICE);
        $nama_file = 'download';
        $image_location = $_SERVER['DOCUMENT_ROOT'] .  $this->config->item('envi') . '/gambar/logo_16-9.png';



        if ($view == 'dpbj') {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'l';
            $this->font_size = '11';
            $watermark = false;

            $this->db->where('no_dpbj', $no_file);
            $data = $this->db->get('digitalisasi_dpbj')->row();

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
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                    'no_dpbj' => $row->no_dpbj,
                    'kode_proyek' => $row->kode_proyek,
                    'tanggal_pengajuan' => Carbon::parse($row->tanggal_pengajuan)->isoFormat('dddd, D MMMM ggg'),
                    'tanggal_dibutuhkan' => Carbon::parse($row->tanggal_dibutuhkan)->isoFormat('dddd, D MMMM ggg'),
                    'yang_membuat' => $row->yang_membuat,
                    'unit_kerja' => $row->unit_kerja,
                    'kode_kegiatan' => $row->kode_kegiatan,
                    'jumlah' => $row->jumlah,
                    'termasuk_ppn' => $row->termasuk_ppn,
                    'jumlah_ppn' => $row->jumlah_ppn,
                    'yang_meminta_nama' => $row->yang_meminta_nama,
                    'yang_meminta_image' => $row->yang_meminta_image,
                    'yang_meminta_timestamp' => $row->yang_meminta_timestamp,
                    'ditandatangani' => Carbon::parse($row->timestamp)->isoFormat('D MMMM ggg'),
                    'yang_menyetujui_nama' => $row->yang_menyetujui_nama,
                    'yang_menyetujui_image' => $row->yang_menyetujui_image,
                    'yang_menyetujui_timestamp' => $row->yang_menyetujui_timestamp,
                    'file_tor' => $row->file_tor,
                    'timestamp' => $row->timestamp,
                    'create_by' => $row->create_by,
                    'modify' => $row->modify,
                    'modify_by' => $row->modify_by,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'revisi_sistem' => $row->revisi_sistem,
                    'delete_at_digitalisasi_dpbj' => $row->delete_at_digitalisasi_dpbj,

                    'data_kode_akun' => $data_akun->result(),
                    'detail_dpbj' => $detail_dpbj,
                );
            }

            $html_view = $this->load->view('tempelate_pdf/dpbj', $data, true);
            $nama_file = 'dpbj-' . $row->no_dpbj;
        } elseif ($view == 'ppl') {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'l';
            $this->font_size = '11';
            $set_margin = array(1, 2, 1, 1);
            $watermark = false;

            $this->db->where('id', $no_file);
            $row = $this->db->get('digitalisasi_ppl')->row();

            if ($row->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }

            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, $row->uuid, false, '2.0', true, 'IGNORED');
            $pdf->setCellPadding('0.1');


            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 3, 1.8, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            $this->load->model('Digitalisasi_dpbj_model');

            if ($row->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create($row->uuid, $row->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';
                $pdf->Image($image, 23, 3, 2.2, 2.2, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                    'no_dpbj' => $row->no_dpbj,
                    'no_ppl' => $row->no_ppl,
                    'render_dokumen' => $row->render_dokumen,
                    'deskripsi' => $row->deskripsi,
                    'jumlah' => $row->jumlah,
                    'satuan' => $row->satuan,
                    'alasan' => $row->alasan,
                    'keterangan_ppl' => $row->keterangan_ppl,
                    'pemohon_nama' => $row->pemohon_nama,
                    'pemohon_image' => $row->pemohon_image,
                    'pemohon_timestamp' => $row->pemohon_timestamp,
                    'disetujui_nama' => $row->disetujui_nama,
                    'disetujui_image' => $row->disetujui_image,
                    'disetujui_timestamp' => $row->disetujui_timestamp,
                    'timestamp' => $row->timestamp,
                    'create_by' => $row->create_by,
                    'modify' => $row->modify,
                    'modify_by' => $row->modify_by,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'revisi_sistem' => $row->revisi_sistem,
                );
            }

            $html_view = $this->load->view('tempelate_pdf/ppl', $data, true);
            $nama_file = $row->no_ppl;
        } else if ($view == 'dppb') {
            $no_file =  base64_decode($no_file);

            $this->load->model('Digitalisasi_dppb_model');

            $kondisi = array('digitalisasi_dppb.no_dppb' => $no_file,);
            $row = $this->Digitalisasi_dppb_model->get_all($kondisi)->result();
            $row = $row[0];


            $this->load->model('Digitalisasi_dppb_detail_model');
            $this->db->where('no_dppb', $no_file);
            if ($row->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }

            $set_margin = array(1, 2, 1, 1);
            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array('Hisyam'),  $this->orientation_page, 'cm', $this->pdf_page_format, $set_margin, $watermark, false, $row->uuid, false, '2.0', true, 'IGNORED');
            $pdf->setCellPadding('0.075');

            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);

            if ($row->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create($row->uuid, $row->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';
                $pdf->Image($image, 17, 1.1, 2.7, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            $detail_dppb = $this->db->get('detail_dppb_join')->result();

            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                    'no_dppb' => $row->no_dppb,
                    'tanggal_pengajuan' => $row->tanggal_pengajuan,
                    'tanggal_dibutuhkan' => $row->tanggal_dibutuhkan,
                    'nama_pemohon' => $row->nama_pemohon,
                    'unit_kerja' => $row->unit_kerja,
                    'regional' => $row->regional,
                    'proyek' => $row->proyek,
                    'approve_1_nama' => $row->approve_1_nama,
                    'approve_1_image' => $row->approve_1_image,
                    'approve_1_timestamp' => $row->approve_1_timestamp,
                    'approve_2_nama' => $row->approve_2_nama,
                    'approve_2_image' => $row->approve_2_image,
                    'approve_2_timestamp' => $row->approve_2_timestamp,
                    'approve_3_nama' => $row->approve_3_nama,
                    'approve_3_image' => $row->approve_3_image,
                    'approve_3_timestamp' => $row->approve_3_timestamp,
                    'approve_4_nama' => $row->approve_4_nama,
                    'approve_4_image' => $row->approve_4_image,
                    'approve_4_timestamp' => $row->approve_4_timestamp,
                    'approve_5_nama' => $row->approve_5_nama,
                    'approve_5_image' => $row->approve_5_image,
                    'approve_5_timestamp' => $row->approve_5_timestamp,
                    'timestamp' => $row->timestamp,
                    'create_by' => $row->create_by,
                    'modify' => $row->modify,
                    'modify_by' => $row->modify_by,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'revisi_sistem' => $row->revisi_sistem,
                    'delete_at_digitalisasi_dppb' => $row->delete_at_digitalisasi_dppb,

                    'penandatangan_nama' => $row->penandatangan_nama,
                    'penandatangan_jabatan' => $row->penandatangan_jabatan,
                    'penandatangan_nip' => $row->penandatangan_nip,

                    'detail_dppb' => $detail_dppb,
                );
            }
            $html_view = $this->load->view('tempelate_pdf/dppb', $data, true);
            $nama_file = 'DPPB-' . $row->no_dppb;
        } else if ($view == 'good_issue') {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'l';
            $this->font_size = '7';
            $width = 22;
            $height = 14;
            $pdf_page_format = array($width, $height);
            $set_margin = array(0.2, 0.2, 0.2, 0.2);


            $this->load->model('Digitalisasi_gi_model');


            $kondisi = array('digitalisasi_gi.no_gi' => $no_file,);
            $row = $this->Digitalisasi_gi_model->get_all($kondisi)->row();


            $this->load->model('Digitalisasi_dppb_detail_model');
            $this->db->where('no_gi', $no_file);
            $detail_gi = $this->db->get('digitalisasi_gi_detail')->result();

            // var_dump($row);
            // die;


            if ($row->status == 'batal') {
                $watermark = true;
            } else {
                $watermark = false;
            }

            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array('Hisyam'),  $this->orientation_page, 'cm', $pdf_page_format, $set_margin, $watermark, false, $row->uuid, false, '2.0', true, 'IGNORED', array('arial', 7));
            $pdf->setCellPadding('0.08');

            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 7.2, 0.3, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);



            if ($row->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create($row->uuid, $row->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';
                $pdf->Image($image, 18, 0.8, 1.8, 1.8, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                    'no_gi' => $row->no_gi,
                    'no_dppb' => $row->no_dppb,
                    'id_detail_dppb' => $row->id_detail_dppb,
                    'project_name' => $row->project_name,
                    'applied_by' => $row->applied_by,
                    'applicant_id' => $row->applicant_id,
                    'applicant_tel' => $row->applicant_tel,
                    'received_by' => $row->received_by,
                    'consignee_id' => $row->consignee_id,
                    'consignee_tel' => $row->consignee_tel,
                    'carrying_mode' => $row->carrying_mode,
                    'transportation_method' => $row->transportation_method,
                    'carrier' => $row->carrier,
                    'start_site' => $row->start_site,
                    'destination_wh' => $row->destination_wh,
                    'source_province' => $row->source_province,
                    'source_city' => $row->source_city,
                    'source_regional' => $row->source_regional,
                    'destination_province' => $row->destination_province,
                    'destination_city' => $row->destination_city,
                    'destination_regional' => $row->destination_regional,
                    'required_truck_type' => $row->required_truck_type,
                    'etd' => Carbon::parse($row->etd)->isoFormat('D MMMM ggg'),
                    'source_address' => $row->source_address,
                    'destination_wh_address' => $row->destination_wh_address,
                    'approve_1_nama' => $row->approve_1_nama,
                    'approve_1_image' => $row->approve_1_image,
                    'approve_1_timestamp' => $row->approve_1_timestamp,
                    'approve_2_nama' => $row->approve_2_nama,
                    'approve_2_image' => $row->approve_2_image,
                    'approve_2_timestamp' => $row->approve_2_timestamp,
                    'approve_3_nama' => $row->approve_3_nama,
                    'approve_3_image' => $row->approve_3_image,
                    'approve_3_timestamp' => $row->approve_3_timestamp,
                    'timestamp' => $row->timestamp,
                    'create_by' => $row->create_by,
                    'modify' => $row->modify,
                    'modify_by' => $row->modify_by,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'revisi_sistem' => $row->revisi_sistem,
                    'delete_at_digitalisasi_gi' => $row->delete_at_digitalisasi_gi,

                    'detail_dppb' => $detail_gi,
                );
            }

            // var_dump($data);
            // die;


            $html_view = $this->load->view('tempelate_pdf/good_issue', $data, true);
            $nama_file = 'good_issue-' . $row->no_gi;
        } else if ($view == 'delivery_note') {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'l';

            $width = 22;
            $height = 14;
            $pdf_page_format = array($width, $height);
            $set_margin = array(0.2, 1, 1, 0.2);

            // $this->load->model('Digitalisasi_dppb_model');
            // // $kondisi = array('digitalisasi_dppb.no_dppb' => $no_file,);
            // // $row = $this->Digitalisasi_dppb_model->get_all($kondisi)->row();
            // // $row = $row[0];

            // $this->load->model('Digitalisasi_dppb_detail_model');
            // $this->db->where('no_dppb', $no_file);
            // $detail_dppb = $this->db->get('detail_dppb_join')->result();

            $this->db->where('no_dn', $no_file);
            $row = $this->db->get('digitalisasi_dn')->row();



            $this->db->join('lokasi_gudang', "CONCAT(lokasi_gudang.kode_lokasi,' ',lokasi_gudang.lokasi)  = detail_dppb_join.lokasi_pengiriman");
            $this->db->where('no_gi', $row->no_gi);
            $detail_dppb = $this->db->get('detail_dppb_join')->result();




            if ($row->status != 'selesai') {
                $watermark = true;
                if ($row->status == 'proses') {
                    $watermark_text = '-DRAFT-';
                } elseif ($row->status == 'batal') {
                    $watermark_text = 'IGNORED';
                }
            } else {
                $watermark = false;
            }
            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array('Hisyam'),  $this->orientation_page, 'cm', $pdf_page_format, $set_margin, $watermark, false, 'HESOYAM', false, 2.0, FALSE, $watermark_text, array('arial', 9));



            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 1, 0.7, 2.56, 1.44, '', '', '', false, 300, '', false, false, 1, false, false, false);
            // $pdf->setCellPadding('4');


            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                    'no_dn' => $row->no_dn,
                    'no_gi' => $row->no_gi,
                    'no_dppb' => $row->no_dppb,
                    'no_detail_dppb' => $row->no_detail_dppb,
                    'project' => $row->project,
                    'koordinator' => $row->koordinator,
                    'project_name' => $row->project_name,
                    'creator' => $row->creator,
                    'applicant' => $row->applicant,
                    'carrier' => $row->carrier,
                    'consignee' => $row->consignee,
                    'outbound_date' => Carbon::parse($row->outbound_date)->isoFormat('D MMM ggg'),
                    'request_date' => Carbon::parse($row->request_date)->isoFormat('D MMM ggg'),
                    'driver' => $row->driver,
                    'vehicle_id' => $row->vehicle_id,
                    'consignee_telephone' => $row->consignee_telephone,
                    'destination_add' => $row->destination_add,
                    'remark' => $row->remark,
                    'file_dn_upload' => $row->file_dn_upload,
                    'timestamp' => $row->timestamp,
                    'create_by' => $row->create_by,
                    'modify' => $row->modify,
                    'modify_by' => $row->modify_by,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'revisi_sistem' => $row->revisi_sistem,
                    'delete_at_digitalisasi_dn' => $row->delete_at_digitalisasi_dn,
                    'detail_dppb' => $detail_dppb,
                );
            }

            $html_view = $this->load->view('tempelate_pdf/delivery_note', $data, true);
            $nama_file = 'delivery_note ' . $row->no_dn;
        } elseif ($view == 'spph') {

            $no_file =  base64_decode($no_file);
            $this->db->where('no_spph', $no_file);
            $data = $this->db->get('digitalisasi_spph')->row();
            $html_view = $data->render_dokumen;


            $set_margin = array(2, 3, 2, 1);

            $watermark = false;


            if (is_null($data->status == 'batal')) {
                $watermark = true;
            }
            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, true, false, false, '2.0', TRUE, 'IGNORED', array('arial', 11,));
            // $pdf->Image($image_location, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);
            $nama_file = 'spph-' . $no_file;
        } elseif ($view == 'po') {

            $no_file =  base64_decode($no_file);
            $this->db->where('no_po', $no_file);
            $data = $this->db->get('digitalisasi_po')->row();
            $html_view = $data->render_dokumen;


            $this->font_size = '10';
            // $this->orientation_page = 'l';
            $set_margin = array(1, 3, 1, 1);
            $watermark = false;

            if ($data->status == 'false') {
                $watermark = true;
            }


            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array(), $this->orientation_page, $this->pdf_unit, $this->pdf_page_format, $set_margin, $watermark, false, false, false, '2.0,', true, 'IGNORED', array('arial', 11));
            $pdf->Image($image_location, 1, 0.5, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);

            // if ($data->uuid) {
            //     $this->load->library('libqrcode');
            //     $this->libqrcode->create(base_url('digitalisasi/po') . $data->uuid, $data->uuid);
            //     $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $data->uuid . '.png';
            //     $pdf->Image($image, 16, 0.8, 3.5, 3.5, '', '', '', false, 300, '', false, false, 1, false, false, false);
            // }
            $nama_file = 'po-' . $no_file;
        } else if ($view == 'good_receipt') {
            $no_file =  base64_decode($no_file);
            $this->orientation_page = 'l';
            $this->font_size = '7';
            $width = 22;
            $height = 14;
            $pdf_page_format = array($width, $height);
            $set_margin = array(0.2, 0.2, 0.2, 0.2);


            $this->load->model('Digitalisasi_gr_model');


            $kondisi = array('digitalisasi_gr.no_gr' => $no_file,);
            $row = $this->Digitalisasi_gr_model->get_all($kondisi)->result();
            $row = $row[0];



            $this->load->model('Digitalisasi_dppb_detail_model');
            $this->db->where('no_gr', $no_file);
            $detail_dppb = $this->db->get('detail_dppb_join')->result();



            if ($row->status != 'selesai') {
                $watermark = true;
                if ($row->status == 'proses') {
                    $watermark_text = '-DRAFT-';
                } elseif ($row->status == 'batal') {
                    $watermark_text = 'IGNORED';
                }
            } else {
                $watermark = false;
            }

            $pdf = tcpdf(strtoupper($view) . '-' . $no_file, strtoupper($view), array('Hisyam'),  $this->orientation_page, 'cm', $pdf_page_format, $set_margin, $watermark, false, $row->uuid, false, '2.0', true, $watermark_text, array('arial', 7));
            $pdf->setCellPadding('0.08');

            $image_location = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/gambar/logo_16-9.png';
            $pdf->Image($image_location, 7.2, 0.3, 4.8, 2.7, '', '', '', false, 300, '', false, false, 1, false, false, false);



            if ($row->uuid) {
                $this->load->library('libqrcode');
                $this->libqrcode->create($row->uuid, $row->uuid);
                $image = $_SERVER['DOCUMENT_ROOT'] . $this->config->item('envi') . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';
                $pdf->Image($image, 18, 0.8, 1.8, 1.8, '', '', '', false, 300, '', false, false, 1, false, false, false);
            }

            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                    'no_gr' => $row->no_gr,
                    'no_gi' => $row->no_gi,
                    'po_spmk' => $row->po_spmk,
                    'no_po_spmk' => $row->no_po_spmk,
                    'metode_pengadaan' => $row->metode_pengadaan,
                    'no_dppb' => $row->no_dppb,
                    'id_detail_dppb' => $row->id_detail_dppb,
                    'project_name' => $row->project_name,
                    'applied_by' => $row->applied_by,
                    'applicant_id' => $row->applicant_id,
                    'applicant_tel' => $row->applicant_tel,
                    'received_by' => $row->received_by,
                    'consignee_type' => $row->consignee_type,
                    'consignee_id' => $row->consignee_id,
                    'consignee_tel' => $row->consignee_tel,
                    'carrying_mode' => $row->carrying_mode,
                    'transportation_method' => $row->transportation_method,
                    'carrier' => $row->carrier,
                    'start_site' => $row->start_site,
                    'destination_wh' => $row->destination_wh,
                    'source_province' => $row->source_province,
                    'source_city' => $row->source_city,
                    'source_regional' => $row->source_regional,
                    'destination_province' => $row->destination_province,
                    'destination_city' => $row->destination_city,
                    'destination_regional' => $row->destination_regional,
                    'required_truck_type' => $row->required_truck_type,
                    'etd' => $row->etd,
                    'source_address' => $row->source_address,
                    'destination_wh_address' => $row->destination_wh_address,
                    'approve_1_nama' => $row->approve_1_nama,
                    'approve_1_image' => $row->approve_1_image,
                    'approve_1_timestamp' => $row->approve_1_timestamp,
                    'approve_2_nama' => $row->approve_2_nama,
                    'approve_2_image' => $row->approve_2_image,
                    'approve_2_timestamp' => $row->approve_2_timestamp,
                    'approve_3_nama' => $row->approve_3_nama,
                    'approve_3_image' => $row->approve_3_image,
                    'approve_3_timestamp' => $row->approve_3_timestamp,
                    'timestamp' => $row->timestamp,
                    'create_by' => $row->create_by,
                    'modify' => $row->modify,
                    'modify_by' => $row->modify_by,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'revisi_sistem' => $row->revisi_sistem,
                    'delete_at' => $row->delete_at,

                    'detail_dppb' => $detail_dppb,
                );
            }

            // var_dump($data);
            // die;


            $html_view = $this->load->view('tempelate_pdf/good_receipt', $data, true);
            $nama_file = 'good_receipt-' . $row->no_gr;
        } elseif ($view == 'ban') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_ban', $file);
            $data = $this->db->get('digitalisasi_ban')->row();
            $html_view = $data->render_dokumen;
            $nama_file = 'ban-' . $file;
        } elseif ($view == 'lpp') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_lpp', $file);
            $data = $this->db->get('digitalisasi_lpp')->row();
            $html_view = $data->render_dokumen;
            $nama_file = 'lpp-' . $file;
        } elseif ($view == 'spmk') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_spmk', $file);
            $data = $this->db->get('digitalisasi_spmk')->row();
            $html_view = $data->render_dokumen;
            $nama_file = 'spmk-' . $file;
        } elseif ($view == 'pks') {
            $file = base64_decode(strtr(urldecode($no_file), '-_^', '+/='));
            $this->db->where('no_pks', $file);
            $data = $this->db->get('digitalisasi_pks')->row();
            $html_view = $data->render_dokumen;
            $nama_file = 'pks-' . $file;
        } else {
            show_error('dokumen tidak dapat dibuka, kesalahan sistem');
        }



        $html = htmlspecialchars_decode($html_view);


        // echo ($html);
        // die;
        // // add a page
        // $pdf->AddPage();


        $html = $this->get_eval($html);

        $pdf->writeHTML($html, true, false, true, false, '');


        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->Output(strtoupper($nama_file) . '.pdf', 'I');


        $filepath = FCPATH . '/application/libraries/qrcode/assets/' . $row->uuid . '.png';

        // Header content type
        header("Content-type: application/pdf");
        readfile($filepath);
        unlink($filepath);

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function cv_karyawan()
    {
        $this->load->helper('tcpdf');
        $pdf = tcpdf('coba', 'subjeck', array('Hisyam', 'agri'));
        $style = array(
            'border' => false,
            'vpadding' => '1',
            'hpadding' => '1',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1, // height of a single module in points
            // 'position' => 'R' // height of a single module in points
        );
        $pdf->Image(base_url('gambar/logo.png'), 11, 4, 1, 1, 'PNG');
        $pdf->Image(base_url('gambar/logo.png'), 9, 4, 1, 1, 'PNG');
        $pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 1, 1, 3, 3, $style, 'T');
        // define active area for signature appearance
        $pdf->setSignatureAppearance(11, 4, 1, 1);
        $pdf->setSignatureAppearance(8, 4, 1, 1);


        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        // *** set an empty signature appearance ***
        $pdf->addEmptySignatureAppearance(8, 4, 1, 1);
        $html = $this->load->view('cetak/form_test', $pdf, TRUE);
        $pdf->writeHTML($html, true, false, true, false, '');
        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->Output('', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+

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

    public function client_pdf()
    {
        $this->load->view('pdf/client');
    }
}

/* End of file Cetak.php */