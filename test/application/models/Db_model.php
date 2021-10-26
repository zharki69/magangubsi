<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Db_model extends CI_Model
{

    // public $table = 'setup_posisi';
    // public $id = 'id_setup_posisi';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($table, $kondisi = NULL)
    {
        if ($kondisi != NULL) {
            $i = 0;
            foreach ($kondisi as $item) // loop column 
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket.
                    $this->db->where($kondisi); // looping where
                }
                if (count($kondisi) - 1 == $i) { //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }
        }
        // $this->db->order_by($this->id, $this->order);
        return $this->db->get($table)->result();
    }
    // get all
    function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    // get all
    // update data
    function update_where($table, $kondisi, $data)
    {
        if ($kondisi != NULL) {
            $i = 0;
            foreach ($kondisi as $item) // loop column 
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket.
                    $this->db->where($kondisi); // looping where
                }
                if (count($kondisi) - 1 == $i) { //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }
            return $this->db->update($this->table, $data);
        }
        return false;
    }
}

/* End of file Db_model.php */
