<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyam.ismul.com ......... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
class M_test extends CI_Model

{
    public $table = 'digitalisasi_evaluasi_penyelenggaraan_pelatihan';
	public $id = '';
	public $delete_at = '';
	public $order = 'DESC';
	function __construct()
	{
		parent::__construct();
	}
    	function get_all($kondisi = NULL, $db_or_where = false)
	{
		if ($kondisi != NULL) {
			$i = 0;
			foreach ($kondisi as $item) // loop column 
			{
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket.
					if ($db_or_where == false) {
						$this->db->where($kondisi); // looping where
					} else {
						$this->db->or_where($kondisi); // looping where
					}
				}
				if (count($kondisi) - 1 == $i) { //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}
		}
		$this->db->order_by($this->id, $this->order);

		return $this->db->get($this->table)->result();
	}
}