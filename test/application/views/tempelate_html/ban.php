<div class="page">
    <h2 style="text-align: center;">BERITA ACARA NEGOSIASI</h2>
    <h2 style="text-align: center;"><span style="text-decoration: underline;">NO : <?= $no_ban ?></span></h2>
    <p style="text-align: justify;">Pada hari ini, <?= $tanggal_ban->dayName ?> Tanggal <?= number_to_words($tanggal_ban->day, '') ?> <?= $tanggal_ban->monthName ?> Tahun <?= number_to_words($tanggal_ban->year, '') ?>, bertempat di <?= $tempat_negosiasi ?>, telah diadakan Negosiasi antara PT Len Telekomunikasi Indonesia dengan <?= $nama_supplier ?> untuk mengadakan barang/jasa sebagai berikut:</p>
    <!-- <p style="text-align: justify;">1. AMF Interface Board Huawei EN2M000AIB00</p> -->

    <table style="border-collapse: collapse; width: 100%;" border="0" cellpadding="5">
        <!-- <thead>
            <tr class="">
                <td style="width: 10%; text-align: center;"><strong>NO</strong></td>
                <?php if ($jenis == 'dpbj') : ?>
                    <td style="width: 60%;"><strong>Deskripsi</strong></td>
                    <td style="width: 20%; text-align: center;"><strong>&nbsp; Jumlah</strong></td>
                <?php elseif ($jenis == 'gi') : ?>
                    <td style="width: 80%;"><strong>Deskripsi</strong></td>
                <?php endif ?>
            </tr>
        </thead> -->
        <tbody>
            <?php if ($jenis == 'dpbj') : ?>

                <?php foreach ($detail_ban as $key) { ?>
                    <tr class="">
                        <td style="width: 10%; text-align: center;"><?= ++$start ?></td>
                        <td style="width: 60%;"><?= $key->nama_barang_jasa ?></td>
                        <td style="width: 20%; text-align: center;"><?= $key->jumlah . ' ' . $key->satuan ?></td>
                    </tr>
                <?php } ?>
            <?php elseif ($jenis == 'gi') : ?>
                <?php foreach ($detail_ban as $key) { ?>
                    <tr class="">
                        <td style="width: 10%; text-align: center;"><?= ++$start ?></td>
                        <td style="width: 80%;">Jasa Pengantaran Barang dari <?= $key->source_address . ' ke ' . $key->destination_wh_address ?></td>
                    </tr>
                <?php } ?>

            <?php endif ?>
        </tbody>
    </table>
    <p style="text-align: justify;">Hasil Negosiasi :</p>
    <ol>
        <li style="text-align: justify;">Harga penawaran Rp <?= number_format($penawaran_harga, 0, ',', '.') ?>,- (<?= $penawaran_harga_terbilang ?>)</li>
        <li style="text-align: justify;">Harga setelah Negosiasi Rp <?= number_format($harga_negosiasi, 0, ',', '.') ?>,- (<?= $harga_negosiasi_terbilang ?>)</li>

        <li style="text-align: justify;">Harga yang ditawarkan <?= ($termasuk_ppn == 'on') ? 'sudah' : 'belum' ?> termasuk PPN 10%</li>


        <li style="text-align: justify;">Harga Negosiasi berlaku sampai dengan <?= $masa_berlaku->day . ' ' . $masa_berlaku->monthName . ' ' . $masa_berlaku->year ?></li>
        <li style="text-align: justify;">Cara penyerahan barang/jasa : <?= $cara_penyerahan ?> <span style="color: red;">Jakarta</span></li>
        <li style="text-align: justify;">Cara pembayaran : <?= $cara_pembayaran ?> </li>
        <li style="text-align: justify;">Penyelesaian pekerjaan selama : <?= $tanggal_ban->diffInWeeks($prakiraan_tanggal) ?> Minggu sejak (......) </li>
        <li style="text-align: justify;">Garansi : <?= $garansi ?></li>
    </ol>
    <p style="text-align: center;">Pelaksana Negosiasi</p>

    <table style="border-collapse: collapse; width: 100%;" border="0">
        <tbody>
            <tr>
                <td style="width: 48.3333%; text-align: center;">
                    <p><?= $nama_supplier ?></p>
                    <p>&nbsp;</p>
                </td>
                <td style="width: 48.4568%; text-align: center;">
                    <p>PT Len Telekomunikasi Indonesia</p>
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <table style="border-collapse: collapse; width: 100%;" border="0">
                        <tbody>
                            <?php foreach ($pelaksana_eksternal as $key) { ?>
                                <tr>
                                    <td style="width: 70%; height:30px;"><?= $key ?></td>
                                    <td style="width: 30%;">
                                        <?php if (is_array($ttd_image_internal)) { ?>

                                        <?php } else { ?>
                                            <h6 style="border-bottom: 1px solid black;"></h6>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </td>
                <td style="width: 50%; vertical-align: top;">
                    <table style="border-collapse: collapse; width: 100%;" border="0">
                        <tbody>
                            <?php foreach ($pelaksana_internal as $key) { ?>
                                <tr>
                                    <td style="width: 70%; height:30px;"><?= $key ?></td>
                                    <td style="width: 30%;">
                                        <?php if (is_array($ttd_image_eksternal)) { ?>

                                        <?php } else { ?>
                                            <h6 style="border-bottom: 1px solid black;"></h6>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: center;">Diketahui oleh</p>
    <p style="text-align: center;">Kepala Divisi Manajemen Aset dan Risiko</p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: center;"><?= $kadiv_mar_nama ?></p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: left;">Catatan : <?= $catatan_tambahan ?>
        <!-- pagebreakssssss -->
    </p>
    <div style="page-break-before:always">
    </div>
    <h3 style="text-align: center;">LAMPIRAN</h3>
    <h3 style="text-align: center;"><strong>BERITA ACARA NEGOSIASI</strong></h3>
    <p>&nbsp;</p>
    <p>NO <span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span><span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span>:&nbsp;<?= $no_ban ?></p>
    <p>TANGGAL <span class="mce-nbsp-wrap" contenteditable="false">&nbsp;&nbsp;&nbsp;</span>: &nbsp; <?= $tanggal_ban->day . ' ' . $tanggal_ban->monthName . ' ' . $tanggal_ban->year ?></p>
</div>