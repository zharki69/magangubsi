<table style="border-collapse: collapse; width: 100%;" border="0" cellpadding="2">
    <tbody>
        <tr style="text-align: left;">
            <td style="width: 20%;" colspan="2">No. Purchase Order</td>
            <td style="width: 80%;" colspan="7">: <?= $no_po ?></td>
        </tr>
        <tr style="text-align: left;">
            <td style="width: 20%;" colspan="2">Tanggal</td>
            <td style="width: 80%;" colspan="7">: <?= $tanggal_po ?></td>
        </tr>
        <tr style="text-align: left;">
            <td style="width: 20%;" colspan="2">Kepada</td>
            <td style="width: 80%;" colspan="7">: <?= $nama_supplier ?></td>
        </tr>
        <tr style="text-align: left;">
            <td style="width: 20%;" colspan="2">Alamat</td>
            <td style="width: 80%;" colspan="7">: <?= $alamat_supplier ?></td>
        </tr>
        <tr style="text-align: left;">
            <td style="width: 20%;" colspan="2">Telepon/Fax</td>
            <td style="width: 80%;" colspan="7">: <?= $telp_supplier ?></td>
        </tr>
        <tr style="text-align: left;">
            <td style="width: 20%;" colspan="2">Att</td>
            <td style="width: 70%;" colspan="7">: <?= $cp_supplier ?></td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="8">&nbsp;</td>
        </tr>
    </tbody>
</table>
<table style="border-collapse: collapse;" border="1" cellpadding="3">
    <tbody>
        <?php if ($jenis == 'dpbj') : ?>
            <tr style="text-align: center;">
                <td style="width: 5%;">No</td>
                <td style="width: 23%;">Item</td>
                <td style="width: 13%;">Uraian</td>
                <td style="width: 7%;">Jumlah</td>
                <td style="width: 7%;">Satuan</td>
                <td style="width: 15%;">Harga Satuan <br>(Rp)</td>
                <td style="width: 15%;">Harga Total <br>(Rp)</td>
                <td style="width: 15%;">Keterangan</td>
            </tr>
            <?php $total_row_merge =  count($detail_dpbj) + 6; ?>

            <?php foreach ($detail_dpbj as $key) : ?>
                <tr style="text-align: center;">
                    <td style="width: 5%;"><?= ++$start ?></td>
                    <td style="width: 23%;"><?= $key->nama_barang_jasa ?></td>
                    <td style="width: 13%;">-</td>
                    <td style="width: 7%;"><?= $key->jumlah ?></td>
                    <td style="width: 7%;"><?= $key->satuan ?></td>
                    <td style="width: 15%;"><?= number_format($key->harga_satuan, 0, ',', '.') ?></td>
                    <td style="width: 15%;"><?= number_format($key->total, 0, ',', '.') ?></td>
                    <?php
                    if ($start == '1') :
                        '<td rowspan="' . $total_row_merge . '" style="width: 15%;">&nbsp;</td>';
                    endif
                    ?>
                </tr>

            <?php endforeach ?>
            <tr style="text-align: center;">
                <td rowspan="3" style="width: 55%; text-align: left;" colspan="5">Terbilang : <?= $terbilang_jumlah_ppn ?></td>
                <td style="width: 15%;">Total</td>
                <td style="width: 15%;"><?= $jumlah ?></td>
            </tr>
            <tr style="text-align: center;">
                <td style="width: 15%;">PPN 10%</td>
                <td style="width: 15%;"><?= $ppn ?></td>
            </tr>
            <tr class="" style="text-align: center;">
                <td style="width: 15%;">Grand Total</td>
                <td style="width: 15%;">Rp. <?= number_format($master_ban->harga_negosiasi, 0, ',', '.'); ?></td>
            </tr>
        <?php elseif ($jenis == 'gi') : ?>
            <tr style="text-align: center;">
                <td style="width: 5%;">No</td>
                <td style="width: 23%;">Item</td>
                <td style="width: 13%;">Uraian</td>
                <td style="width: 7%;">Jumlah</td>
                <td style="width: 7%;">Satuan</td>
                <td style="width: 15%;">Harga Satuan <br>(Rp)</td>
                <td style="width: 15%;">Harga Total <br>(Rp)</td>
                <td style="width: 15%;">Keterangan</td>

            </tr>
            <?php $total_row_merge =  count($master_gi) + 3; ?>
            <?php foreach ($detail_dppb as $key) : ?>
                <tr style="text-align: center;">
                    <td style="width: 5%;"><?= ++$start ?></td>
                    <td style="width: 23%;"><?= "Pengiriman Barang " . $key->nama_material . ' ' . $key->start_site . " - " . $key->destination_wh ?></td>
                    <td style="width: 13%;">Tujuan <?= $key->destination_wh ?></td>
                    <td style="width: 7%;"><?= $key->jumlah ?></td>
                    <td style="width: 7%;"><?= $key->satuan ?></td>
                    <td style="width: 15%;"><?= number_format(999999, 0, ',', '.') ?></td>
                    <td style="width: 15%;"><?= number_format(999999, 0, ',', '.') ?></td>
                    <td style="width: 15%;">Keterangan</td>
                </tr>
            <?php endforeach ?>
            <tr style="text-align: center;">
                <td rowspan="3" colspan="3" style="width: 60%; text-align: left;">Terbilang : <?= $terbilang_jumlah_ppn ?></td>
                <td style="width: 10%;">Total</td>
                <td style="width: 15%;"><?= $jumlah ?></td>
            </tr>
            <tr style="text-align: center;">
                <td style="width: 10%;">PPN 10%</td>
                <td style="width: 15%;"><?= $ppn ?></td>
            </tr>
            <tr class="" style="text-align: center;">
                <td style="width: 10%;">Grand Total</td>
                <td style="width: 15%;">Rp. <?= number_format($master_ban->harga_negosiasi, 0, ',', '.'); ?></td>
            </tr>
        <?php endif ?>


    </tbody>
</table>
<table style="margin-bottom:1cm; border-collapse: collapse; width: 100%;" border="0" cellpadding="2">
    <tbody>
        <tr style="text-align: center;">
            <td style="width: 5%;">&nbsp;</td>
            <td style="width: 23%;">&nbsp;</td>
            <td style="width: 13%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 16%;">&nbsp;</td>
            <td style="width: 16%;">&nbsp;</td>
            <td style="width: 7.39665%;">&nbsp;</td>
        </tr>
        <tr style="text-align: center;">
            <td style="width: 86.2572%; text-align: left;" colspan="8">Catatan</td>
        </tr>
        <tr style="text-align: center;">
            <td style="width: 86.2572%; text-align: left;" colspan="8" rowspan="2"><?= $catatan ?></td>
        </tr>
        <tr></tr>
        <tr style="text-align: center;">
            <td style="width: 5%;">&nbsp;</td>
            <td style="width: 23%;">&nbsp;</td>
            <td style="width: 13%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 16%;">&nbsp;</td>
            <td style="width: 16%;">&nbsp;</td>
            <td style="width: 7.39665%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 34.7832%; text-align: center;" colspan="3">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 33.807%; text-align: center;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 50%;" colspan="3" rowspan="5">
                <table class="mceNonEditable" style="border-collapse: collapse; width: 99.2908%; border:0.1px solid black;" cellpadding="2">
                    <tbody>
                        <tr>
                            <td style="width: 97.3927%; text-align: center;border-bottom:0.1px solid black;">Alamat Pengiriman</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">Up. <?= $pic_nama ?></td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">( 021-28543839 | <?= $pic_email ?>)</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">PT Len Telekomunikasi Indonesia</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">Jl. Tebet Barat VII No. 3</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">Jakarta Selatan 12810</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="text-align: center; width: 33.807%;" colspan="3" rowspan="9">
                <table class="mceNonEditable" style="border-collapse: collapse; width: 98.9091%; border:0.1px solid black;" cellpadding="2">
                    <tbody>
                        <tr>
                            <td style="width: 100%;border-bottom:0.1px solid black;">Disetujui Oleh
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?= $jabatan ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 100%;">&nbsp;
                                <!--CODE
                                if ($approve_2_timestamp) {
                                    echo '<img width="128" height="72" src="' . "uploads/spesimen/" . $approve_2_image . '" alt="' . $approve_2_nama . '">';
                                }
                                if ($approve_1_timestamp) {
                                    echo '<img width="36" height="36" src="' . "uploads/spesimen/" . $approve_1_image . '" alt="' . $approve_1_nama . '">';
                                } else {
                                    echo '<br><br>=== VOID ===<br><br>';
                                }
                                 CODE-->
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100%;"><?= $approve_2_nama ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 50%;" colspan="3" rowspan="5">
                <table class="mceNonEditable" style="border-collapse: collapse; width: 99.2908%;border:0.1px solid black;" cellpadding="2">
                    <thead>
                        <tr>
                            <td style="width: 97.3927%; text-align: center;border-bottom:0.1px solid black;">Alamat Tagihan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 97.3927%;">Up. <?= $nama_contact_penagihan ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">( 021-28543839 | <?= $email_contact_penagihan ?>)</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">PT Len Telekomunikasi Indonesia</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">Menara MTH Lantai M&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 97.3927%;">Jalan MT Haryono Kav. 23 Tebet, Jakarta Selatan</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 7%;">&nbsp;</td>
            <td style="width: 7%;">&nbsp;</td>
            <td style="text-align: center; width: 33.807%;" colspan="3">&nbsp;</td>
        </tr>
    </tbody>
</table>