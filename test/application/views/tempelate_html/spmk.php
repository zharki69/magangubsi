<h1 class="mceNonEditable" style="text-align: center;">SURAT PERINTAH MULAI KERJA (SPMK)</h1>
<table class="mceNonEditable" style="border-collapse: collapse; width: 100%;  margin-left: auto; margin-right: auto;" border="0">
    <tbody>
        <tr>
            <td style="width: 100%; ">Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $no_spmk ?></td>
        </tr>
        <tr>
            <td style="width: 100%; ">Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $tanggal_spmk ?></td>
        </tr>
        <tr>
            <td style="width: 100%; ">Pekerjaan &nbsp;&nbsp;: <span class="mceEditable"><?= $pekerjaan ?></span></td>
        </tr>
    </tbody>
</table>
<table class="mceNonEditable" style="border-collapse: collapse; width: 100%;  margin-left: auto; margin-right: auto;" border="0">
    <tbody>
        <tr>
            <td style="width: 100%; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Berdasarkan Berita Acara Negosiasi Pengadaan</span> <span class="mceEditable"><?= $pekerjaan ?></span> <span>No. <?= $no_ban ?> tanggal <?= $tanggal_ban ?> , maka dengan ini PT Len Telekomunikasi Indonesia menerbitkan Surat Perintah Mulai Kerja kepada:</span></td>
        </tr>
        <tr>
            <td style="width: 100%; ">Nama Perusahaan <span class=" mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span>: <?= $nama_supplier ?></td>
        </tr>
        <tr>
            <td style="width: 100%; ">Alamat <span class=" mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span>: <?= $alamat_supplier ?></td>
        </tr>
        <tr>
            <td style="width: 100%; ">Untuk melaksanakan pekerjaan dengan rincian sebagai berikut:</td>
        </tr>
    </tbody>
</table>

<table class="" cellpadding="5" style="border-collapse: collapse; width: 100%;" border="1">
    <tbody>
        <tr style="text-align: center;">
            <td class="mceEditable" style="width: 5%;">No</td>
            <td class="mceEditable" style="width: 30%;">Nama Barang/Jasa</td>
            <td class="mceEditable" style="width: 25%;">Deskripsi</td>
            <td class="mceEditable" style="width: 10%;">Jumlah</td>
            <td class="mceEditable" style="width: 15%;">Harga Satuan <br> (Rp)</td>
            <td class="mceEditable" style="width: 15%;">Harga Total <br> (Rp)</td>
        </tr>
        <?php $total_row_merge =  count($kode_barang_jasa) + 3; ?>
        <?php for ($i = 0; $i < $jumlah_data; $i++) { ?>
            <tr style="text-align: center;">
                <td style="width: 5%;"><?= ++$start ?></td>
                <td style="width: 30%;">
                    <?php
                    $this->db->where('kode', $kode_barang_jasa[$i]);
                    echo $this->db->get('master_kode_barang_jasa')->row()->nama
                    ?>
                </td>
                <td style="width: 25%;"><?= $deskripsi[$i] ?></td>
                <td style="width: 10%;"><?= $jumlah_barang[$i] ?><span class="mceEditable"> satuan</span></td>
                <td style="width: 15%;"><?= number_format($harga_satuan[$i], 0, ',', '.') ?></td>
                <td style="width: 15%;"><?= number_format($total[$i], 0, ',', '.') ?></td>
            </tr>

        <?php } ?>
        <?php if ($ppn) : ?>
            <tr>
                <td rowspan="2" style="text-align: left;" colspan="4">Terbilang <br /><strong><?= $terbilang_jumlah_ppn ?></strong></td>
                <td>PPn</td>
                <td style="text-align: center;"><?= $ppn ?></td>
            </tr>
        <?php endif ?>
        <tr>
            <?php if ($ppn) : ?>
            <?php else : ?>
                <td style="text-align: left;" colspan="4">Terbilang <br /><strong><?= $terbilang_jumlah_ppn ?></strong></td>
            <?php endif ?>
            <td>Total</td>
            <td>Rp. <?= $jumlah_ppn ?></td>
        </tr>
        <tr class="mceEditable">
            <td style="text-align: left;" colspan="6">
                <b>Ketentuan:</b>
            </td>
        </tr>
        <tr class="mceEditable">
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