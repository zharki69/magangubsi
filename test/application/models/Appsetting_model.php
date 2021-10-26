<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Appsetting_model extends CI_Model
{

    public function __construct()
    {
    }

    public function get_setting()
    {
        // $this->db->set_dbprefix('rekrutmen_');
        // $this->db->dbprefix('appsetting');
        $query = $this->db->get_where('rekrutmen_appsetting', array('batch_appsetting' => 5));
        return $query->row();
    }

    public function get_all_appsetting()
    {
        $this->db->select('rekrutmen_appsetting.*');
        $this->db->from('rekrutmen_appsetting');
        $query = $this->db->get();

        $result_array = $query->result_array();
        if ($result_array === false) {
            return false;
        } else {
            return $result_array;
        }
    }

    public function get_appsetting_by_id($id)
    {
        $query = $this->db->get_where('appsetting', array('id' => $id));
        return $query->row_array();
    }

    public function update_appsetting()
    {
        if ($this->input->post('id') !== false && $this->input->post('tanggal_pembukaan') !== false && $this->input->post('tanggal_penutupan') !== false && $this->input->post('text_pengumuman') !== false) {
            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'tanggal_pembukaan' => $this->input->post('tanggal_pembukaan'),
                'tanggal_penutupan' => $this->input->post('tanggal_penutupan'),
                'text_pengumuman' => $this->input->post('text_pengumuman'),
                'status_rekrutmen' => $this->input->post('status_rekrutmen'),
                'last_modified' => date("Y-m-d h:i:sa")
            );

            // $this->db->where('id', $this->input->post('id'));
            // var_dump($this->input->post('id'));
            // die;
            return $this->db->update('appsetting', $data);
        } else {
            return false;
        }
    }
}
