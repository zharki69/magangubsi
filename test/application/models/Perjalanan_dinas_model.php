<?php
//Perjalanan_dinas_model.php

use GroceryCrud\Core\Model;
use GroceryCrud\Core\Model\ModelFieldType;

class Perjalanan_dinas_model extends Model
{
    protected $ci;
    protected $db;

    function __construct($databaseConfig)
    {
        $this->setDatabaseConnection($databaseConfig);

        $this->ci = &get_instance();
        $this->db = $this->ci->db;
    }

    public function getFieldTypes($tableName)
    // $nomor_digitalisasi_form_k31->dataType = 'varchar';
    {

        $fieldTypes = parent::getFieldTypes($tableName);
        $nomor_digitalisasi_form_k31 = new ModelFieldType();
        $fieldTypes['nomor_digitalisasi_form_k31'] = $nomor_digitalisasi_form_k31;

        $diketahui_digitalisasi_form_k31 = new ModelFieldType();
        $fieldTypes['diketahui_digitalisasi_form_k31'] = $diketahui_digitalisasi_form_k31;
        $diketahui_timestamp_digitalisasi_form_k31 = new ModelFieldType();
        $fieldTypes['diketahui_timestamp_digitalisasi_form_k31'] = $diketahui_timestamp_digitalisasi_form_k31;

        $verifikasi_anggaran_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['verifikasi_anggaran_digitalisasi_form_k1'] = $verifikasi_anggaran_digitalisasi_form_k1;
        $verifikasi_anggaran_timestamp_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['verifikasi_anggaran_timestamp_digitalisasi_form_k1'] = $verifikasi_anggaran_timestamp_digitalisasi_form_k1;

        $kadiv_keuangan_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['kadiv_keuangan_digitalisasi_form_k1'] = $kadiv_keuangan_digitalisasi_form_k1;
        $kadiv_keuangan_timestamp_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['kadiv_keuangan_timestamp_digitalisasi_form_k1'] = $kadiv_keuangan_timestamp_digitalisasi_form_k1;

        $dirkeu_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['dirkeu_digitalisasi_form_k1'] = $dirkeu_digitalisasi_form_k1;
        $dirut_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['dirut_digitalisasi_form_k1'] = $dirut_digitalisasi_form_k1;

        $akuntansi_bayar_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['akuntansi_bayar_digitalisasi_form_k1'] = $akuntansi_bayar_digitalisasi_form_k1;
        $akuntansi_bayar_timestamp_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['akuntansi_bayar_timestamp_digitalisasi_form_k1'] = $akuntansi_bayar_timestamp_digitalisasi_form_k1;

        $pejalan_dinas_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['pejalan_dinas_digitalisasi_form_k1'] = $pejalan_dinas_digitalisasi_form_k1;
        $pejalan_dinas_timestamp_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['pejalan_dinas_timestamp_digitalisasi_form_k1'] = $pejalan_dinas_timestamp_digitalisasi_form_k1;

        $akuntansi_verifikasi_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['akuntansi_verifikasi_digitalisasi_form_k1'] = $akuntansi_verifikasi_digitalisasi_form_k1;
        $akuntansi_verifikasi_as_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['akuntansi_verifikasi_as_digitalisasi_form_k1'] = $akuntansi_verifikasi_as_digitalisasi_form_k1;
        $akuntansi_verifikasi_timestamp_digitalisasi_form_k1 = new ModelFieldType();
        $fieldTypes['akuntansi_verifikasi_timestamp_digitalisasi_form_k1'] = $akuntansi_verifikasi_timestamp_digitalisasi_form_k1;



        return $fieldTypes;
    }

    // public function getOne($id)
    // {
    //     $customer = parent::getOne($id);

    //     $this->db->select('COUNT(*) as count_orders');
    //     $this->db->where('id_digitalisasi_form_k32', $id);
    //     $customer['count_orders'] = $this->db->get($this->tableName)->row()->count_orders;

    //     return $customer;
    // }

    protected function _getQueryModelObject()
    {
        $order_by = $this->orderBy;
        $sorting = $this->sorting;

        $this->db->select('digitalisasi_form_k32.*, digitalisasi_form_k31.*,lumpsum.*');

        $this->db->join('digitalisasi_form_k31', 'digitalisasi_form_k31.nomor_k32_digitalisasi_form_k31 = digitalisasi_form_k32.nomor_digitalisasi_form_k32');
        $this->db->join('digitalisasi_form_k1 as lumpsum', 'lumpsum.nomor_digitalisasi_form_k1 = digitalisasi_form_k31.nomor_lumpsum_k1_digitalisasi_form_k31');



        if ($order_by !== null) {
            $this->db->order_by($order_by . " " . $sorting);
        }

        // if (!empty($this->_filters)) {
        //     foreach ($this->_filters as $filter_name => $filter_value) {
        //         if ($filter_name !== 'fullname') {
        //             if (is_array($filter_value)) {
        //                 foreach ($filter_value as $value) {
        //                     $this->db->like($filter_name, $value);
        //                 }
        //             } else {
        //                 $this->db->like($filter_name, $filter_value);
        //             }
        //         } else {
        //             if (is_array($filter_value)) {
        //                 foreach ($filter_value as $value) {
        //                     $this->db->like('CONCAT(customerName, \' \' ,contactLastName)', $value);
        //                 }
        //             } else {
        //                 $this->db->like('CONCAT(customerName, \' \' ,contactLastName)', $filter_value);
        //             }
        //         }
        //     }
        // }

        if (!empty($this->_filters_or)) {
            foreach ($this->_filters_or as $filter_name => $filter_value) {
                $this->db->or_like($filter_name, $filter_value);
            }
        }

        $this->db->limit($this->limit, ($this->limit * ($this->page - 1)));
        return $this->db->get($this->tableName);
    }

    public function getList()
    {
        return $this->_getQueryModelObject()->result_array();
    }

    public function getTotalItems()
    {
        if (!empty($this->_filters)) {
            return $this->_getQueryModelObject()->num_rows();
        }

        // If we don't have any filtering it is faster to have the default total items
        // In case this is more complicated you can add your own code here
        return parent::getTotalItems();
    }
}
