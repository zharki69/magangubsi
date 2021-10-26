<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DataPelamar_model extends CI_Model
{

    public function __construct()
    {
    }

    public function get_all_pelamar()
    {
        $this->db->select('rekrutmen_data_pelamar.*');
        $this->db->from('rekrutmen_data_pelamar');
        $this->db->order_by('rekrutmen_data_pelamar.id_data_pelamar', 'ASC');
        $this->db->limit(10);

        $query = $this->db->get();

        $result_array = $query->result_array();
        if ($result_array === false) {
            return false;
        } else {
            return $result_array;
        }
    }

    public function get_all_pengalaman($id)
    {
        $this->db->select('rekrutmen_data_pengalamankerja.*');
        $this->db->from('rekrutmen_data_pengalamankerja');
        $this->db->where('rekrutmen_data_pengalamankerja.data_pelamar_id', $id);
        $this->db->order_by('rekrutmen_data_pengalamankerja.id', 'ASC');
        $query = $this->db->get();

        $result_array = $query->result_array();
        if ($result_array === false) {
            return false;
        } else {
            return $result_array;
        }
    }

    public function get_all_pendidikan($id)
    {
        $this->db->select('rekrutmen_data_pendidikan.*');
        $this->db->from('rekrutmen_data_pendidikan');
        $this->db->where('rekrutmen_data_pendidikan.data_pelamar_id', $id);
        $this->db->order_by('rekrutmen_data_pendidikan.id', 'ASC');
        $query = $this->db->get();

        $result_array = $query->result();
        if ($result_array === false) {
            return false;
        } else {
            return $result_array;
        }
    }

    public function get_all_sertifikasi($id)
    {
        $this->db->select('rekrutmen_data_sertifikasi.*');
        $this->db->from('rekrutmen_data_sertifikasi');
        $this->db->where('rekrutmen_data_sertifikasi.data_pelamar_id', $id);
        $this->db->order_by('rekrutmen_data_sertifikasi.id', 'ASC');
        $query = $this->db->get();

        $result_array = $query->result_array();
        if ($result_array === false) {
            return false;
        } else {
            return $result_array;
        }
    }

    public function get_pendidikan_by_id($id)
    {
        $query = $this->db->get_where('rekrutmen_data_pelamar', array('id' => $id));
        return $query->row_array();
    }

    public function check_noktp($noKTP)
    {
        $query = $this->db->get_where('rekrutmen_data_pelamar', array('no_ktp' => $noKTP));
        return $query->num_rows() > 0 ? true : false;
    }

    private function get_lastid()
    {
        $this->db->select('MAX(id) as lastID');
        $this->db->from('rekrutmen_data_pelamar');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $lastID = $query->result();
            return $lastID[0]->lastID;
        } else {
            return 0;
        }
    }

    private function create_noreg($lastID, $kode_posisi)
    {
        $nextID = $lastID + 1;
        $noreg = "000000" . $nextID;
        $noreg = substr($noreg, strlen($noreg) - 6, 6) . "-" . $kode_posisi;

        return $noreg;
    }

    public function get_data_by_ktp($noReg, $noKTP)
    {
        $filter = array('no_registrasi' => $noReg, 'no_ktp' => $noKTP, 'konfirmasi' => 0);

        $this->db->select('*');
        $this->db->from('rekrutmen_data_pelamar');
        $this->db->where($filter);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();
        } else {
            $result = null;
        }

        return $result;
    }

    public function update_konfirmasi($noReg, $noKTP)
    {
        date_default_timezone_set('Asia/Jakarta');
        $filter = array('no_registrasi' => $noReg, 'no_ktp' => $noKTP);

        $this->db->where($filter);
        $updated = array(
            'konfirmasi' => 1,
            'last_modified' => date("Y-m-d H:i:sa")
        );
        return $this->db->update('rekrutmen_data_pelamar', $updated);
    }

    public function insert_data($data)
    {
        date_default_timezone_set('Asia/Jakarta');

        $noreg = $this->create_noreg($this->get_lastid(), $data['kode_posisi']);
        $idPelamar = $this->get_lastid() + 1;
        $dataPelamar = array(
            'id' => $idPelamar,
            'no_registrasi' => $noreg,
            'kode_posisi' => $data['kode_posisi'],
            'no_ktp' => $data['no_ktp'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'umur' => $data['usia'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'status_perkawinan' => $data['status_perkawinan'],
            'foto_url' => $data['foto_url'],
            'cv_url' => $data['cv_url'],
            'no_handphone' => $data['no_handphone'],
            'email' => $data['email'],
            'domisili' => $data['domisili'],
            'alamat_asli' => $data['alamat_asli'],
            'status_pengalaman' => $data['status_pengalaman'],
            'pengalaman_kerja'  => $data['pengalaman_terakhir'],
            'pengalaman_lainnya' => $data['pekerjaan_lainnya'],
            'info_loker' => $data['info_loker'],
            'created_date' => date("Y-m-d H:i:sa")
        );

        $dataPendidikan = json_decode(stripslashes($data['data_pendidikan']));
        $insertDataPendidikan = array();
        if (count($dataPendidikan) > 0) {
            foreach ($dataPendidikan as $row) {
                $obj = array(
                    'universitas' => $row->universitas,
                    'jurusan' => $row->jurusan,
                    'jenjang' => $row->jenjang,
                    'no_ijazah' => $row->noIjazah,
                    'tahun_lulus' => $row->tahunLulus,
                    'ipk' => $row->ipk,
                    'data_pelamar_id' => $idPelamar,
                    'created_date' => date("Y-m-d H:i:sa")
                );
                array_push($insertDataPendidikan, $obj);
            }
        }

        $this->db->trans_begin();
        $this->db->insert('rekrutmen_data_pelamar', $dataPelamar);

        if (count($dataPendidikan) > 0) {
            $this->db->insert_batch('rekrutmen_data_pendidikan', $insertDataPendidikan);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $result = (object) ['status' => false, 'data' => $dataPelamar];
        } else {
            $this->db->trans_commit();
            $status = $this->send_email($dataPelamar);

            $result = (object) ['status' => $status, 'data' => $dataPelamar];
        }

        // $result = (object) [ 'status' => true, 'data' => $dataPelamar ];
        return $result;
    }

    private function send_email($dataPelamar)
    {
        $this->load->library('email');
        $this->load->library('encryption');

        $config['mailtype'] = "html";

        // $config = array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'smtp.mailtrap.io',
        //     'smtp_port' => 2525,
        //     'smtp_user' => '6d28b3d87ac286',
        //     'smtp_pass' => '63dee6fdbaefc7',
        //     'crlf' => "\r\n",
        //     'newline' => "\r\n",
        //     'mailtype' => 'html',
        //     'charset' => 'iso-8859-1',
        //     'wordwrap' => TRUE
        // );
        // 'protocol' => 'smtp',
        // 'smtp_host' => 'smtp.mailtrap.io',
        // 'smtp_port' => 2525,
        // 'smtp_user' => '6d28b3d87ac286',
        // 'smtp_pass' => '63dee6fdbaefc7',
        // 'crlf' => "\r\n",
        // 'newline' => "\r\n",
        // 'mailtype' => 'html',
        // 'charset' => 'iso-8859-1',
        // 'wordwrap' => TRUE



        // $config['protocol'] = "smtp";		
        // $config['smtp_host'] = 'mail.dishubkabbdg.web.id';
        // $config['smtp_user'] = 'admin@dishubkabbdg.web.id';
        // $config['smtp_pass'] = 'Dishub2018';
        // $config['smtp_port'] = '587';

        $explode = explode("-", $dataPelamar['tanggal_lahir']);
        $encodeParam = urlencode($this->encryption->encrypt($dataPelamar["no_registrasi"] . ";" . $dataPelamar["no_ktp"]));
        $message = '<html><body><div style="text-align:center;"><div><h3>Konfirmasi Rekrutmen PT. Len Telekomunikasi Indonesia</h3></div>';
        $message .= '<div><p class="card-text">Data Anda sudah tersimpan dalam sistem kami. Tahap selanjutnya akan diumumkan melalui e-mail pendaftar.</p>';
        $message .= '<table class="table table-solid" style="width:40%; margin-left:40%;"><tbody>';
        $message .= '<tr><th scope="row" style="width:35%; text-align:left;">No Registrasi</th><td style="width:3%;">:</td><td style="width:65%;  text-align:left;">' . $dataPelamar['no_registrasi'] . '</td></tr>';
        $message .= '<tr><th scope="row" style="width:35%; text-align:left;">No KTP</th><td>:</td><td style="text-align:left;">' . $dataPelamar['no_ktp'] . '</td></tr>';
        $message .= '<tr><th scope="row" style="width:35%; text-align:left;">Nama</th><td>:</td><td style="text-align:left;">' . $dataPelamar['nama'] . '</td></tr>';
        $message .= '<tr><th scope="row" style="width:35%; text-align:left;">Tempat, Tanggal lahir</th><td>:</td><td style="text-align:left;">' . $dataPelamar['tempat_lahir'] . ', ' . $explode[2] . "/" . $explode[1] . "/" . $explode[0] . '</td></tr>';
        $message .= '</tbody></table></div>';
        $message .= '<div><a href="' . base_url() . 'konfirmasi?r=' . $encodeParam . '"
                    style="display: inline-block; font-weight: 400; text-align: center; white-space: nowrap; vertical-align: middle;border: 1px solid transparent;
                        padding: 0.375rem 0.75rem;font-size: 1rem;line-height: 1.5;border-radius: 0.25rem;
                        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                        color: #fff; background-color: #007bff;border-color: #007bff; text-decoration:none; margin-top:10px;">
                Konfirmasi
                </a></div>';
        $message .= '</div></div></body></html>';

        $this->email->initialize($config);
        //$this->email->clear();
        $this->email->from('rekrutmen@len-telko.co.id', 'Rekrutmen PT. Len Telekomunikasi Indonesia (LTI)');
        // $this->email->from('admin@dishubkabbdg.web.id', 'Rekrutmen PT. Len Telekomunikasi Indonesia (LTI)');
        $this->email->to($dataPelamar['email']);

        $this->email->subject('[Konfirmasi] - Rekrutmen PT. Len Telekomunikasi Indonesia (LTI)');
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_pelamar_by_pendidikan()
    {
        $this->db->select('rekrutmen_data_pelamar.*, data_pendidikan.*');
        $this->db->from('rekrutmen_data_pelamar');
        $this->db->join('rekrutmen_data_pendidikan', 'data_pelamar.id = data_pendidikan.data_pelamar_id');
        $this->db->order_by('rekrutmen_data_pelamar.id', 'ASC');
        $query = $this->db->get();

        $result_array = $query->result_array();
        if ($result_array === false) {
            return false;
        } else {
            return $result_array;
        }
    }
}
