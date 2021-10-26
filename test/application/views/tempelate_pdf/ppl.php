<div class="tg-wrap">
    <table style="table-layout: fixed; width: 100%;border: 1px solid black; ">
        <tbody>
            <tr>
                <td width="20">&nbsp;</td>
                <td width="30">&nbsp;</td>
                <td width="180">&nbsp;</td>
                <td width="60">&nbsp;</td>
                <td width="60">&nbsp;</td>
                <td width="190">&nbsp;</td>
                <td style="text-align: center; border:1px solid black;" width="200">&nbsp;PFR-018</td>
                <td width="20">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr>
                <td style="font-size:14px;text-align:center;" colspan="8"><b>Persetujuan Penunjukan Langsung</b></td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td style="border:1px solid black; vertical-align:middle;">NO</td>
                <td style="border:1px solid black; vertical-align:middle;">Deskripsi Barang/Jasa</td>
                <td style="border:1px solid black; vertical-align:middle;">Jumlah</td>
                <td style="border:1px solid black; vertical-align:middle;">Satuan </td>
                <td style="border:1px solid black; vertical-align:middle;">Alasan Penunjukan Langsung</td>
                <td style="border:1px solid black; vertical-align:middle;">Keterangan</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="border:1px solid black; vertical-align:middle;"><?= '1' ?></td>
                <td style="border:1px solid black; vertical-align:middle;"><?= $deskripsi ?></td>
                <td style="border:1px solid black; vertical-align:middle; text-align:center;"><?= $jumlah ?></td>
                <td style="border:1px solid black; vertical-align:middle; text-align:center;"><?= $satuan ?></td>
                <td style="border:1px solid black; vertical-align:middle;"><?= $alasan ?></td>
                <td style="border:1px solid black; vertical-align:middle;"><?= $keterangan_ppl ?></td>
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
            </tr>
            <tr style="text-align: center;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Jakarta, 24 Maret 2020</td>
                <td></td>
            </tr>
            <tr style="text-align: center">
                <td></td>
                <td></td>
                <td>Disetujui</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Pemohon,</td>
                <td></td>
            </tr>
            <tr style="text-align: center">
                <td></td>
                <td></td>
                <td>Direktur Bisnis dan Operasi</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Divisi Manajemen Aset dan Risiko</td>
                <td></td>
            </tr>
            <tr style="text-align: center">
                <td></td>
                <td></td>
                <td>
                    <?php
                    if ($disetujui_timestamp) {
                        echo '<img width="128" height="72" src="' . "uploads/spesimen/" . $disetujui_image . '" alt="' . $disetujui_nama . '">';
                    } else {
                        echo '<br><br>=== VOID ===<br><br>';
                    }
                    ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <?php
                    if ($pemohon_timestamp) {
                        echo '<img width="128" height="72" src="' . "uploads/spesimen/" . $pemohon_image . '" alt="' . $pemohon_nama . '">';
                    } else {
                        echo '<br><br>=== VOID ===<br><br>';
                    }
                    ?>
                </td>
                <td></td>
            </tr>
            <tr style="text-align: center">
                <td></td>
                <td></td>
                <td><?= $disetujui_nama ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $pemohon_nama ?></td>
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
            </tr>
            <tr style="text-align: center">
                <td colspan=" 8">Form ini dianggap sah jika terdapat QR-Code yang dapat diverifikasi by sistem</td>
            </tr>
            <tr style="text-align: center">
                <td colspan="8"><?= $uuid ?></td>
            </tr>
        </tbody>
    </table>
</div>