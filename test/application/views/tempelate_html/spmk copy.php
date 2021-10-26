<h1 style="text-align: center;">SURAT PERINTAH MULAI KERJA (SPMK)</h1>
<table style="border-collapse: collapse; width: 100%;  margin-left: auto; margin-right: auto;" border="0">
    <tbody>
        <tr class="mceNonEditable">
            <td style="width: 100%; ">Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $no_spmk ?></td>
        </tr>
        <tr class="mceNonEditable">
            <td style="width: 100%; ">Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $tanggal_spmk ?></td>
        </tr>
        <tr>
            <td style="width: 100%; ">Pekerjaan &nbsp;&nbsp;: <?= $pekerjaan ?></td>
        </tr>
    </tbody>
</table>
<table style="border-collapse: collapse; width: 100%;  margin-left: auto; margin-right: auto;" border="0">
    <tbody>
        <tr>
            <td style="width: 100%; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="mceNonEditable">Berdasarkan Berita Acara Negosiasi Pengadaan</span> <?= $pekerjaan ?> <span class="mceNonEditable">No. <?= $no_ban ?> tanggal <?= $tanggal_ban ?> , maka dengan ini PT Len Telekomunikasi Indonesia menerbitkan Surat Perintah Mulai Kerja kepada:</span></td>
        </tr>
        <tr class="mceNonEditable">
            <td style="width: 100%; ">Nama Perusahaan <span class=" mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span>: <?= $nama_supplier ?></td>
        </tr>
        <tr class="mceNonEditable">
            <td style="width: 100%; ">Alamat <span class=" mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span>: <?= $alamat_supplier ?></td>
        </tr>
        <tr class="mceNonEditable">
            <td style="width: 100%; ">Untuk melaksanakan pekerjaan dengan rincian sebagai berikut:</td>
        </tr>
    </tbody>
</table>


<table cellpadding="5" style="width: 104%; text-align:center;border-collapse: collapse;" border="1">
    <tbody>
        <?php if ($jenis == 'dpbj') : ?>
            <tr>
                <td style="width: 5%; text-align: center;">NO</td>
                <td style="width: 24%; text-align: center;">Nama Barang/Jasa</td>
                <td style="width: 25%; text-align: center;">Deskripsi</td>
                <td style="width: 12%; text-align: center;">Jumlah</td>
                <td style="width: 17%; text-align: center;">Harga Satuan (Rp)</td>
                <td style="width: 16%; text-align: center;">Harga Total (Rp)</td>
            </tr>
            <?php foreach ($detail_dpbj->result() as $key) { ?>
                <tr>
                    <td style="width: 5%;"><?= ++$start ?></td>
                    <td style="width: 24%;">&nbsp;<?= $key->nama_barang_jasa ?></td>
                    <td style="width: 25%;">&nbsp;</td>
                    <td style="width: 12%;">&nbsp;<?= $key->jumlah ?></td>
                    <td style="width: 17%;">&nbsp;<?= number_format($key->harga_satuan, 0, ',', '.') ?></td>
                    <td style="width: 16%;">&nbsp;<?= number_format($key->total, 0, ',', '.') ?></td>
                </tr>
            <?php } ?>
        <?php elseif ($jenis == 'gi') : ?>

            <tr style="text-align: center;">
                <td style="width: 7%;">No</td>
                <td style="width: 30%;">Item</td>
                <td style="width: 25%;">Uraian</td>
                <td style="width: 10%;">Satuan</td>
                <td style="width: 15%;">Harga </td>
                <td style="width: 15%;">Keterangan</td>

            </tr>
            <?php $total_row_merge =  count($master_gi) + 3; ?>

            <?php foreach ($master_gi as $key) : ?>
                <tr style="text-align: center;">
                    <td style="width: 7%;"><?= ++$start ?></td>
                    <td style="width: 30%;"><?= "Jasa Pengiriman Barang dari " . $key->start_site . " ke " . $key->destination_wh ?></td>
                    <td style="width: 25%;">Tujuan <?= $key->destination_wh ?></td>
                    <td style="width: 10%;">&nbsp;</td>
                    <td style="width: 15%;"><?= number_format($master_ban->harga_negosiasi, 0, ',', '.') ?></td>
                    <?php
                    if ($start == '1') :
                        '<td rowspan="' . $total_row_merge . '" style="width: 10%;">&nbsp;</td>';
                    endif
                    ?>
                </tr>
            <?php endforeach ?>
        <?php endif ?>

        <tr class="mceNonEditable">
            <td style="text-align: left;" colspan="4">Terbilang <br /><strong><?= $terbilang_harga_negosiasi ?></strong></td>
            <td>Total</td>
            <td>Rp. <?= number_format($harga_negosiasi, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td style="text-align: left;" colspan="6">
                <b>Ketentuan:</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;" colspan="6">
                <ol style="list-style-type: lower-alpha;">
                    <li>Periode efektif asuransi selama 1 (satu) bulan terhitung sejak tanggal 20 November 2020 sampai dengan 19 November 2021;</li>
                    <li>Tipe Asuransi</li>
                    <li>Coverage Area: Jakarta dan Jaringan Palapa Ring Paket tengah;</li>
                    <li>Segala kewajiban pajak yang terjadi atas transaksi menjadi kewajiban masing-masing pihak sesuai peraturan yang berlaku.</li>
                </ol>
            </td>
        </tr>
    </tbody>
</table>
<p style="text-align: justify;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Segala ketentuan yang berkaitan dengan SPMK ini akan dituangkan dalam Perjanjian Kerja Sama (PKS). SPMK ini bersifat final, mengikat dan tidak dapat diperbaharui dalam hal uraian pekerjaan dan nilai, kecuali atas persetujuan kedua belah pihak. Perjanjian Kerja Sama (PKS) akan diterbitkan maksimal 14 (empat belas) hari sejak surat ini ditandatangani.
    Demikian SPMK ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
</p>
<table class="mceNonEditable" style="border-collapse: collapse; width: 100%;  margin-left: auto; margin-right: auto; text-align: center; vertical-align: middle;" border="0">
    <tbody>
        <tr>
            <td style="width: 49.0773%; ">&nbsp;</td>
            <td style="width: 49.1398%;  text-align: center;"><strong>PT Len Telekomunikasi Indonesia</strong></td>
        </tr>
        <tr>
            <td style="width: 49.0773%; ">&nbsp;</td>
            <td style="width: 49.1398%;  text-align: center;"><strong>&nbsp;<?= $jabatan ?></strong></td>
        </tr>
        <tr>
            <td style="width: 49.0773%; ">&nbsp;</td>
            <td class="ttd_nama" style="width: 49.1398%; vertical-align: middle;">
                <span style="">
                    <!--CODE
                        if ($approve_2_timestamp) {
                            echo '<img width="128" height="72" src="' . "uploads/spesimen/" . $approve_2_image . '" alt="' . $approve_2_nama . '">';
                        }
                        if ($approve_1_timestamp) {
                            echo '<img width="36" height="36" src="' . "uploads/spesimen/" . $approve_1_image . '" alt="' . $approve_1_nama . '">';
                        } else {
                            echo '<br><br> === VOID === <br><br>'; 
                        }
                    CODE-->
                </span>
            </td>
        </tr>
        <tr>
            <td style="width: 49.0773%; ">&nbsp;</td>
            <td style="width: 49.1398%;  text-align: center;"><strong><span style="text-decoration: underline;"><?= $approve_2_nama ?></span></strong></td>
        </tr>
    </tbody>
</table>