<style>
    td {
        border: 1px solid black;
    }
</style>
<div class="tg-wrap">
    <table style="table-layout: fixed; width: 100%;">
        <tbody>
            <tr>
                <td style="border: none;" width="90">&nbsp; </td>
                <td style="border: none;" width="100">&nbsp; </td>
                <td style="border: none;" width="100">&nbsp; </td>
                <td style="border: none;" width="65">&nbsp; </td>
                <td style="border: none;" width="50">&nbsp; </td>
                <td style="border: none;" width="90">&nbsp; </td>
                <td style="border: none;" width="30">&nbsp; </td>
                <td style="border: none;" width="70">&nbsp; </td>
                <td style="border: none;" width="30">&nbsp; </td>
                <td style="border: none;" width="50">&nbsp; </td>
            </tr>
            <tr>
                <td style="line-height: 10px;" colspan="2"><b>PT Len Telekomunikasi Indonesia<br>Menara MTH M Floor Suite-02<br>Jl. Letjen MT Haryono Kav.23 Jakarta 12820 <br>Tlpn: +62 21 2283 3872 / +62 81 1953 0600<br>Email: kontak@len-telko.co.id</b><br></td>
                <td style="font-size: 16px;text-align:center; line-height:50%;" colspan="6"><br><br><br><b>GOOD ISSUE</b> <br><br><span style="font-size: 11px;"><?= $uuid ?></span></td>
            </tr>
            <tr>
                <td>GI NO</td>
                <td><?= $no_gi ?></td>
                <td>Project Name:</td>
                <td colspan="2"><?= ucwords($project_name) ?></td>
                <td>DPPB No:</td>
                <td colspan="2"><?= $no_dppb ?></td>
            </tr>
            <tr>
                <td>Applied by</td>
                <td><?= $applied_by ?></td>
                <td>Applicant ID:</td>
                <td colspan="2"><?= $applicant_id ?></td>
                <td>Applicant's Tel.</td>
                <td colspan="2"><?= $applicant_tel ?></td>
            </tr>
            <tr>
                <td>Received By</td>
                <td><?= $received_by ?></td>
                <td>Consignee's ID</td>
                <td colspan="2"><?= $consignee_id ?></td>
                <td>Consignee's Tel</td>
                <td colspan="2"><?= $consignee_tel ?></td>
            </tr>
            <tr>
                <td>Carrying Mode</td>
                <td><?= $carrying_mode ?></td>
                <td>Transportation Method</td>
                <td colspan="2"><?= $transportation_method ?></td>
                <td>Carrier:</td>
                <td colspan="2"><?= $carrier ?></td>
            </tr>
            <tr>
                <td>Start Site</td>
                <td><?= $start_site ?></td>
                <td>Destination Warehouse</td>
                <td colspan="5"><?= $destination_wh ?></td>
            </tr>
            <tr>
                <td>Source Province</td>
                <td><?= $source_province ?></td>
                <td>Source City</td>
                <td colspan="2"><?= $source_city ?></td>
                <td>Source Regional</td>
                <td colspan="2"><?= $source_regional ?></td>
            </tr>
            <tr>
                <td>Destination Province</td>
                <td><?= $destination_province ?></td>
                <td>Destination City</td>
                <td colspan="2"><?= $destination_city ?></td>
                <td>Destination Regional</td>
                <td colspan="2"><?= $destination_regional ?></td>
            </tr>
            <tr>
                <td>Required Truck Type</td>
                <td colspan="2"><?= $required_truck_type ?></td>
                <td colspan="2">ETD</td>
                <td colspan="3"><?= $etd ?></td>
            </tr>
            <tr>
                <td>Source Address:</td>
                <td colspan="7"><?= $source_address ?></td>
            </tr>
            <tr>
                <td>Destination WH Address:</td>
                <td colspan="7"><?= $destination_wh_address ?></td>
            </tr>
            <tr>
                <td colspan="8"></td>
            </tr>

        </tbody>
        <tr style="text-align: center;">
            <td>NO</td>
            <td colspan="2">Description Material</td>
            <td>Order Qty</td>
            <td>Uom</td>
            <td>Material Code</td>
            <td>Stock</td>
            <td>Information</td>
        </tr>

        <?php
        $start = 0;
        foreach ($detail_dppb as $c_digitalisasi_dppb_detail) { ?>
            <tr style="text-align: center;">
                <td><?php echo ++$start ?></td>
                <td colspan="2"><?php echo $c_digitalisasi_dppb_detail->nama_material ?></td>
                <td><?php echo $c_digitalisasi_dppb_detail->jumlah_material ?></td>
                <td><?php echo $c_digitalisasi_dppb_detail->satuan ?></td>
                <td><?php echo $c_digitalisasi_dppb_detail->kode_material ?></td>
                <td><?php echo '' ?></td>
                <td><?php echo $c_digitalisasi_dppb_detail->detail_keterangan ?></td>
            </tr>
        <?php } ?>
        <tr style="text-align: center;">
            <td>Name</td>
            <td><?= $approve_1_nama ?></td>
            <td><?= $approve_2_nama ?></td>
            <td><?= $approve_3_nama ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align: center;">
            <td style="line-height: 30px;">Signature :</td>
            <td>
                <?php
                if ($approve_3_timestamp or empty($uuid)) { ?>
                    <img width="36" height="36" src="<?= 'uploads/spesimen/' . $approve_1_image ?>" alt="<?= $approve_1_nama ?>">
                <?php } ?>
            </td>
            <td>
                <?php
                if ($approve_3_timestamp or empty($uuid)) { ?>
                    <img width="36" height="36" src="<?= 'uploads/spesimen/' . $approve_2_image ?>" alt="<?= $approve_2_nama ?>">
                <?php } ?>
            </td>
            <td>
                <?php
                if ($approve_3_timestamp or empty($uuid)) { ?>
                    <img width="36" height="36" src="<?= 'uploads/spesimen/' . $approve_3_image ?>" alt="<?= $approve_3_nama ?>">
                <?php } ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align: center;">
            <td>Date :</td>
            <td><?= date('d M y H:i', strtotime($approve_1_timestamp)) ?></td>
            <td><?= ($approve_2_timestamp) ? date('d M y H:i', strtotime($approve_2_timestamp)) : '' ?></td>
            <td><?= ($approve_3_timestamp) ? date('d M y H:i', strtotime($approve_3_timestamp)) : '' ?></td>
            <td></td>
            <td colspan="2"></td>
            <td></td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>