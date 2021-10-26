<span class="page">
    <span class="">
        <p style="text-align: center; font-size:14px;"><span style="text-decoration: underline;"><b>SURAT PERMINTAAN PENAWARAN HARGA</b></span></p>
        <p style="border-top: 1px solid black;"></p>
        <span>
            <table class="mceNonEditable" style="border-collapse: collapse; width: 100%;">
                <tbody>
                    <tr>
                        <td style="width:20%;">No. SPPH</td>
                        <td style="width: 21%">: <?= $no_spph ?></td>
                        <td style="width: 4%;">&nbsp;</td>
                        <td style="width: 55%;"><b>Kepada Yth. <?= $jenis_kelamin ?> <?= $contact_person ?></b></td>
                    </tr>
                    <tr>
                        <td style="width:20%;">&nbsp;</td>
                        <td style="width: 21%">&nbsp;</td>
                        <td style="width: 4%;">&nbsp;</td>
                        <td style="width: 55%;"><b><?= $nama_supplier ?></b><br><?= $alamat ?></td>
                    </tr>
                    <tr>
                        <td style="width:20%;">&nbsp;</td>
                        <td style="width: 21%">&nbsp;</td>
                        <td style="width: 4%;">&nbsp;</td>
                        <td style="width: 55%;">Telp / Hp : <?= $telp . ' / ' . $handphone ?></td>
                    </tr>
                    <tr>
                        <td style="width:20%;">Tanggal SPPH</td>
                        <td style="width: 21%">: <?= $tanggal_spph ?></td>
                        <td style="width: 4%;">&nbsp;</td>
                        <td style="width: 55%;">Email: <a href="mailto:<?= $email_1 ?>" target="_blank" rel="noopener"><span style="color: #0563c1;"><?= $email_1 ?></span></a><?= ($email_2) ? ' / <a href="mailto:' . $email_2 . '" target="_blank" rel="noopener"><span style="color: #0563c1;">' . $email_2 : ''; ?></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <p style="border-top: 1px solid black;"></p>
        <span class="mceNonEditable">
            <p>Dengan hormat,</p>
            <p style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; Bersama ini kami meminta Bapak/Ibu untuk mengirimkan Proposal Penawaran Harga untuk pekerjaan Pengadaan barang dan jasa dengan spesifikasi pada tabel deskripsi. Penawaran harga meliputi harga, tempo pembayaran, jangka waktu pengiriman, spesifikasi teknis dan garansi (jika ada).</p>
        </span>
        <table style="border-collapse: collapse; width: 100%;" border="1" cellpadding="5">
            <thead>
                <tr class="">
                    <td style="width: 10%; text-align: center;"><b>NO</b></td>
                    <?php if ($jenis == 'dpbj') : ?>
                        <td style="width: 60%;"><b>Deskripsi</b></td>
                        <td style="width: 20%; text-align: center;"><b>&nbsp; Jumlah</b></td>
                    <?php elseif ($jenis == 'gi') : ?>
                        <td style="width: 80%;"><b>Deskripsi</b></td>
                        <td style="width: 15%; text-align: center;"><b>&nbsp; Jumlah</b></td>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($jenis == 'dpbj') : ?>

                    <?php foreach ($detail_spph as $key) { ?>
                        <tr class="">
                            <td style="width: 10%; text-align: center;"><?= ++$start ?></td>
                            <td style="width: 60%;"><?= $key->nama_barang_jasa ?></td>
                            <td style="width: 20%; text-align: center;"><?= $key->jumlah . ' ' . $key->satuan ?></td>
                        </tr>
                    <?php } ?>
                <?php elseif ($jenis == 'gi') : ?>
                    <?php foreach ($detail_spph as $key) { ?>
                        <tr class="">
                            <td style="width: 10%; text-align: center;"><?= ++$start ?></td>
                            <td style="width: 80%;">Jasa Pengantaran Barang dari <?= $key->source_address . ' ke ' . $key->destination_wh_address ?></td>
                            <td style="width: 15%;text-align: center;">???</td>
                        </tr>
                    <?php } ?>

                <?php endif ?>
            </tbody>
        </table>
        <span>
            <p>Catatan:</p>
            <ol>
                <li>Harga yang ditawarkan belum termasuk pajak.</li>
                <li>Segala kewajiban pajak atas transaksi akan ditanggung masing-masing pihak sesuai peraturan yang berlaku;</li>
                <li>Segala ketentuan detail mengacu pada <em>Term of Reference </em>(TOR)<em>.</em></li>
            </ol>
            <p class="mceNonEditable">Penawaran ditujukan kepada:&nbsp;</p>
            <p class="mceNonEditable"><b>PT Len Telekomunikasi Indonesia</b><br><b>Up. Divisi Manajemen Aset dan Risiko</b><br>Menara MTH Lantai M <br>Jalan MT Haryono Kav 23, Jakarta 12820<br>Email: <a href="mailto:putri.dwina@len-telko.co.id" target="_blank" rel="noopener"><span style="color: #0563c1;"><?= $pic_spph ?></span></a>
                <br><br>Demikian, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
            </p>
        </span>
        <table class="mceNonEditable" style="border-collapse: collapse; width: 100%; margin-left: auto; margin-right: auto;  text-align: center; vertical-align: middle;" border="0">
            <tbody>
                <tr style="height: 18px;">
                    <td style="width: 49.0773%; height: 18px;">&nbsp;</td>
                    <td style="width: 49.1398%; height: 18px; text-align: center;"><b>PT Len Telekomunikasi Indonesia</b></td>
                </tr>
                <tr style="height: 18px;">
                    <td style="width: 49.0773%; height: 18px;">&nbsp;</td>
                    <td style="width: 49.1398%; height: 18px; text-align: center;"><b>&nbsp;Manajer Pengadaan dan Manajemen Aset</b></td>
                </tr>
                <tr style="height: 85px;">
                    <td style="width: 49.0773%;">&nbsp;</td>
                    <td class="ttd_nama" style="width: 49.1398%; vertical-align:middle">
                        <!--CODE
                        if ($ttd_timestamp) {
                            echo '<img width="128" height="72" src="' . "uploads/spesimen/" . $ttd_image . '" alt="' . $ttd_nama . '">';
                        } else {
                            echo '<br><br>=== VOID ===<br><br>';
                        }
                    CODE-->
                    </td>
                </tr>
                <tr style="height: 18px;">
                    <td style="width: 49.0773%; height: 18px;">&nbsp;</td>
                    <td style="width: 49.1398%; height: 18px; text-align: center;"><b><span style="text-decoration: underline;">Nur Dafiq Aqsat</span></b></td>
                </tr>
            </tbody>
        </table>
    </span>
</span>