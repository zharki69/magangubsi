<div class="tg-wrap">
    <table style="table-layout: fixed; width: 100%;border: 1px solid black; ">
        <tbody>
            <tr>
                <td width="14">&nbsp;</td>
                <td width="51">&nbsp;</td>
                <td width="80">&nbsp;</td>
                <td width="7">&nbsp;</td>
                <td width="52">&nbsp;</td>
                <td width="52">&nbsp;</td>
                <td width="2">&nbsp;</td>
                <td width="43">&nbsp;</td>
                <td width="66">&nbsp;</td>
                <td width="63">&nbsp;</td>
                <td width="80">&nbsp;</td>
                <td width="124">&nbsp;</td>
                <td width="124" style="text-align: right;">&nbsp;PFR-001</td>
                <td width="22">&nbsp;</td>
                <td width="1">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:center; font-size:14px;" colspan="15"><b>DAFTAR PERMINTAAN BARANG &amp; JASA (DPB/J)</b></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Nomor DPB/J</td>
                <td>:</td>
                <td colspan="4"><?= $no_dpbj ?></td>
                <td></td>
                <td></td>
                <td>Unit Kerja</td>
                <td colspan="3">: <?= $unit_kerja ?></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Tanggal Pengajuan</td>
                <td>:</td>
                <td colspan="4"><?= $tanggal_pengajuan ?></td>
                <td></td>
                <td></td>
                <td>Kode Akun</td>
                <td colspan="3">: <?= $kode_kegiatan ?></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Tanggal Dibutuhkan</td>
                <td>:</td>
                <td colspan="4"><?= $tanggal_dibutuhkan ?></td>
                <td></td>
                <td></td>
                <td>Kode Proyek</td>
                <td colspan="3">: <?= $kode_proyek ?></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Yang Membuat DPB/J</td>
                <td>:</td>
                <td colspan="4"><?= $yang_membuat ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td style="border: 1px solid black;"><b>No.</b></td>
                <td style="border: 1px solid black;" colspan="6"><b>Nama Barang/Jasa, Tipe &amp; Spesifikasi</b></td>
                <td style="border: 1px solid black;"><b>Jumlah</b></td>
                <td style="border: 1px solid black;"><b>Satuan</b></td>
                <td style="border: 1px solid black;"><b>MU</b></td>
                <td style="border: 1px solid black;"><b>Harga Satuan</b></td>
                <td style="border: 1px solid black;"><b>Total</b></td>
                <td></td>
            </tr>
            <?php
            $start = 0;
            foreach ($detail_dpbj as $c_digitalisasi_dpbj_detail) {
            ?>
                <tr style="text-align: center;">
                    <td></td>
                    <td style="border: 1px solid black;"><?php echo ++$start ?></td>
                    <td style="border: 1px solid black;" colspan="6">
                        <?php echo $c_digitalisasi_dpbj_detail->nama_barang_jasa ?>
                    </td>
                    <td style="border: 1px solid black;"><?php echo number_format($c_digitalisasi_dpbj_detail->jumlah_barang_jasa, 0, ',', '.') ?></td>
                    <td style="border: 1px solid black;"><?php echo $c_digitalisasi_dpbj_detail->satuan ?></td>
                    <td style="border: 1px solid black;"><?php echo $c_digitalisasi_dpbj_detail->mu ?></td>
                    <td style="border: 1px solid black;"><?php echo number_format($c_digitalisasi_dpbj_detail->harga_satuan, 0, ',', '.') ?></td>
                    <td style="border: 1px solid black;text-align: right;"><?php echo number_format($c_digitalisasi_dpbj_detail->total, 0, ',', '.') ?></td>
                </tr>
            <?php
            }
            ?>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: 1px solid black;">Jumlah</td>
                <td style="text-align: right;border: 1px solid black;"> <?= number_format($jumlah, 0, ',', '.') ?></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: 1px solid black;">PPn 10%</td>
                <td style="text-align: right;border: 1px solid black;"> <?= ($termasuk_ppn) ? number_format($termasuk_ppn, 0, ',', '.') : '-' ?></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: 1px solid black;">Jumlah Total</td>
                <td style="text-align: right;border: 1px solid black;">Rp. <?= number_format($jumlah_ppn, 0, ',', '.') ?></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;" colspan="3">Jakarta, <?= $ditandatangani ?></td>
                <td></td>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                <td colspan="5">Menyetujui,</td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="3">Yang Meminta</td>
                <td></td>
            </tr>
            <tr style="text-align: center;">
                <td rowspan="1"></td>
                <td rowspan=""></td>
                <td rowspan="" colspan="5">
                    <?php
                    if ($yang_menyetujui_timestamp) { ?>
                        <img width="128" height="72" src="<?= 'uploads/spesimen/' . $yang_menyetujui_image ?>" alt="<?= $yang_menyetujui_nama ?>">
                    <?php } else { ?>
                        <br><br>
                        === VOID ===
                        <br><br>
                    <?php } ?>
                </td>
                <td rowspan=""></td>
                <td rowspan=""></td>
                <td rowspan=""></td>
                <td rowspan="" colspan="3">
                    <?php
                    if ($yang_meminta_timestamp) { ?>
                        <img width="128" height="72" src="<?= 'uploads/spesimen/' . $yang_meminta_image ?>" alt="<?= $yang_meminta_nama ?>">
                    <?php } else { ?>
                        <br><br>
                        === VOID ===
                        <br><br>
                    <?php } ?>
                </td>
                <td></td>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                <td colspan="5"><?= $yang_menyetujui_nama ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="3"><?= $yang_meminta_nama ?></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="15">Form ini dianggap sah jika dapat diverifikasi by sistem</td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="15"><?= $uuid ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?= 'Status Pengadaan : ' . ucwords($status) . '<br>' ?>
<?php if ($revisi_sistem) {
    echo $revisi_sistem . '<br>';
} ?>