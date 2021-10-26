<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemberitahuan_model extends CI_Model
{

    // public $variable;

    public function __construct()
    {
        parent::__construct();
    }

    public function my_notif($user = 1)
    {
        // $sql = 	"SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE d.id_pegawai= ? or e.id_pegawai = ? or f.id_pegawai= ?";

        $sql = "SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE b.id_pegawai_pedin_1 = " . $user . " AND a.waktu_finish IS NULL";
        $query = $this->db->query($sql, array($user, $user, $user));

        return $query->result();
    }

    public function wait_notif($user = 1)
    {

        $sql =     "SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE (e.id_pegawai= " . $user . " AND a.tanggal_acc_k3_2_pengajuan IS NULL) OR (f.id_pegawai = " . $user . " AND a.tanggal_acc_k3_2_penyetujuan IS NULL)";

        $query = $this->db->query($sql, array($user, $user, $user));

        return $query->result();
    }
    public function wait_notif_count($user = 1)
    {
        $sql =     "SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE (e.id_pegawai= " . $user . " AND a.tanggal_acc_k3_2_pengajuan IS NULL) OR (f.id_pegawai = " . $user . " AND a.tanggal_acc_k3_2_penyetujuan IS NULL)";

        $query = $this->db->query($sql, array($user, $user, $user));
        // var_dump($sql);
        return $query->num_rows();
    }

    public function wait_notif_count_user($user = 1)
    {
        $sql =     "SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE (e.id_pegawai= " . $user . " AND a.tanggal_acc_k3_2_pengajuan IS NULL) OR (f.id_pegawai = " . $user . " AND a.tanggal_acc_k3_2_penyetujuan IS NULL) OR a.tanggal_acc_k3_1 IS NULL";

        $query = $this->db->query($sql, array($user, $user, $user));
        // var_dump($sql);
        return $query->num_rows();
    }





    public function wait_sdm_notif($user = 1)
    {
        $sql =     "SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE (a.tanggal_acc_k3_2_pengajuan IS NULL) OR (a.tanggal_acc_k3_2_penyetujuan IS NULL) OR (a.tanggal_acc_k3_1 IS NULL)";


        $query = $this->db->query($sql, array($user, $user, $user));

        return $query->result();
    }

    public function finish_notif($user = 1)
    {
        $sql =     "SELECT a.*,b.*,c.*,d.id_pegawai AS id_perjalanan_SQL,d.nama AS nama_perjalanan_SQL,e.id_pegawai as id_pengajuan_SQL,e.nama AS nama_pengajuan_SQL,f.id_pegawai AS id_penyetuju_SQL,f.nama AS nama_penyetuju_SQL FROM lti_detail_transaksi_pedin a JOIN lti_transaksi_pedin b on a.id_detail_tra_pedin = b.id_tra_pedin JOIN lti_master_pedin c ON b.id_pegawai_pedin_1 = c.id_pegawai_master_pedin JOIN lti_pegawai d ON c.id_pegawai_master_pedin = d.id_pegawai JOIN lti_pegawai e ON e.id_pegawai = c.id_pegawai_pengajuan JOIN lti_pegawai f on f.id_pegawai = c.id_pegawai_penyetuju WHERE (d.id_pegawai= ? or e.id_pegawai = ? or f.id_pegawai= ?) and (a.tanggal_acc_k3_2_pengajuan IS NOT NULL AND a.tanggal_acc_k3_2_penyetujuan IS NOT NULL)";
        $query = $this->db->query($sql, array($user, $user, $user));

        return $query->result();
    }
}

/* End of file pemberitahuan_model.php */
/* Location: ./application/models/pemberitahuan_model.php */
