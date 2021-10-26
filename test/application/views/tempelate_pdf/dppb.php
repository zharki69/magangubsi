<div class="tg-wrap">
    <table style="table-layout: fixed; width: 100%;">
        <tbody>
            <tr>
                <th width="30">&nbsp;</th>
                <th width="160">&nbsp; </th>
                <th width="45">&nbsp;</th>
                <th width="45">&nbsp;</th>
                <th width="120">&nbsp;</th>
                <th width="120">&nbsp;</th>
                <td></td>
            </tr>
            <tr>
                <th style="font-size: 14px; text-align:center" colspan="6"><b><u>DAFTAR PERMINTAAN PENGIRIMAN BARANG</u></b></th>
                <td></td>
            </tr>
            <tr>
                <th style="font-size: 12px; text-align:center" colspan="6"><b><?= $no_dppb ?></b></th>
                <td></td>
            </tr>
            <tr>
                <th colspan="6">&nbsp;</th>
                <td></td>
            </tr>
            <tr>
                <th colspan="6">&nbsp;</th>
                <td></td>
            </tr>
            <tr>
                <td style="border-left: 0.5px solid black; border-top:0.5px solid black;" colspan="2"><b>Nama Pemohon &nbsp;&nbsp;&nbsp;&nbsp;: Subhan Jaba</b></td>
                <td style="border-top:0.5px solid black;"></td>
                <td style="border-top:0.5px solid black;"></td>
                <td style="border-top:0.5px solid black; text-align:left;"><b>Tanggal Pengajuan &nbsp;&nbsp;:</b></td>
                <td style="border-top:0.5px solid black;border-right:0.5px solid black;"><b>19 Agusutus 2019</b></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-top:0.5px solid black; border-left:0.5px solid black;" colspan="2"><b>Regional/Proyek &nbsp;&nbsp;&nbsp;: 1/8</b></td>
                <td style="border-top:0.5px solid black"></td>
                <td style="border-top:0.5px solid black"></td>
                <td style="border-top:0.5px solid black"><b>Dibutuhkan Tanggal &nbsp;:</b></td>
                <td style="border-top:0.5px solid black; border-right:0.5px solid black;"><b>2 September 2019</b></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-top:0.5px solid black" colspan="6"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: center;">
                <td style="border:0.5px solid black">No</td>
                <td style="border:0.5px solid black">Nama Barang/Type &amp; Spesifikasi</td>
                <td style="border:0.5px solid black">Satuan</td>
                <td style="border:0.5px solid black">Jumlah</td>
                <td style="border:0.5px solid black">Lokasi Pengiriman</td>
                <td style="border:0.5px solid black">Keterangan</td>
                <td></td>
            </tr>

            <?php
            $start = 0;
            foreach ($detail_dppb as $c_digitalisasi_dppb_detail) {
            ?>
                <tr style="text-align: center;">
                    <td style="border: 1px solid black;"><?php echo ++$start ?></td>
                    <td style="border: 1px solid black;">
                        <?php echo $c_digitalisasi_dppb_detail->nama_material ?>
                    </td>
                    <td style="border: 1px solid black;"><?php echo $c_digitalisasi_dppb_detail->satuan ?></td>
                    <td style="border: 1px solid black;"><?php echo number_format($c_digitalisasi_dppb_detail->jumlah_material, 0, ',', '.') ?></td>
                    <td style="border: 1px solid black;">
                        <?php echo $c_digitalisasi_dppb_detail->lokasi_pengiriman ?>
                    </td>
                    <td style="border: 1px solid black;text-align: left;"><?php echo $c_digitalisasi_dppb_detail->detail_keterangan  ?> </td>
                    <td></td>
                </tr>
            <?php
            }
            ?>

            <tr>
                <td colspan="6"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="3"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;" colspan="3"><?= $penandatangan_jabatan ?></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center; line-height:60px;" colspan="3">
                    <?php
                    if ($approve_3_timestamp) { ?>
                        <img width="128" height="72" src="<?= 'uploads/spesimen/' . $approve_3_image ?>" alt="<?= $approve_3_nama ?>">
                    <?php } else { ?>
                        === VOID ===
                    <?php } ?>
                </td>
                <td>
                    <?php
                    if ($approve_2_timestamp) { ?>
                        <img width="36" height="36" src="<?= 'uploads/spesimen/' . $approve_2_image ?>" alt="<?= $approve_2_nama ?>">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;" colspan="3"><?= $approve_3_nama ?></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;" colspan="3"><?= $penandatangan_nip ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<?= 'Status Logistik : ' . ucwords($status) . '<br>' ?>
<?php if ($revisi_sistem) {
    echo $revisi_sistem . '<br>';
} ?>