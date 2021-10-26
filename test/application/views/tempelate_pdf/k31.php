<?php $fmt = new NumberFormatter('id-ID', NumberFormatter::CURRENCY); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title><?= str_replace(array("\\", "/", ":", "*", "?", "\"", "<", ">", "|", "."), '_', $nama_file) ?></title>
    <meta name="generator" content="https://conversiontools.io" />
    <meta name="author" content="http://hisyambsa.github.io/" />
    <meta name="created" content="2019-02-28T07:22:09" />
    <meta name="changedby" content="Microsoft Office User" />
    <meta name="changed" content="2020-07-21T06:03:19" />
    <meta name="AppVersion" content="16.0300" />
    <meta name="Company" content="PT Len Telekomunikasi Indonesia" />
    <meta name="DocSecurity" content="0" />
    <meta name="HyperlinksChanged" content="false" />
    <meta name="LinksUpToDate" content="false" />
    <meta name="ScaleCrop" content="false" />
    <meta name="ShareDoc" content="false" />

    <style type="text/css">
        body,
        div,
        table,
        thead,
        tbody,
        tfoot,
        tr,
        th,
        td,
        p {
            font-family: "Calibri";
            font-size: small,
        }

        td {
            /* position: absolute; */
            height: 0.5291666cm;
        }

        .qr {
            width: 2.6458333333cm;
            height: 2.6458333333cm;
            position: absolute;
            right: 3cm;
            top: 0.5291666cm;
            border: 0.07937499cm solid #005da2;
        }

        .logo {
            width: 4cm;
            height: 1.0181818181243443cm;
            position: absolute;
            left: 1.0583332cm;
            top: 1.24354151cm;
        }
    </style>

</head>

<body>
    <?php $envi = (ENVIRONMENT == 'development') ? '/' . $this->config->item('development_folder') : ''; ?>
    <?php if ($qrcode) { ?>
        <?php
        // A few settings
        $image = $_SERVER['DOCUMENT_ROOT'] . $envi . '/application/libraries/qrcode/assets/' . $qrcode . '.png';
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));
        // Format the image SRC: data:{mime};base64,{data};
        $src_qr = 'data:' . mime_content_type($image) . ';base64,' . $imageData;
        ?>
    <?php } ?>
    <?php
    // A few settings
    $image = $_SERVER['DOCUMENT_ROOT'] . $envi . '/application/views/tempelate_pdf/img/logo_full_transparant.png';
    // Read image path, convert to base64 encoding
    $imageData = base64_encode(file_get_contents($image));
    // Format the image SRC: data:{mime};base64,{data};
    $src_logo = 'data:' . mime_content_type($image) . ';base64,' . $imageData;
    ?>

    <?php if ($qrcode) { ?>
        <img class="qr" src="<?php echo $src_qr ?>" alt="qrcode">
    <?php } ?>
    <img class="logo" src="<?php echo $src_logo ?>" alt="logo">

    <table cellspacing="0" border="0">
        <tr>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" height="20" align="center" valign=middle>
                <font face="Tahoma">K - 3.1</font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="center" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=11 height="37" align="center" valign=middle>
                <b>
                    <br> &nbsp;
                    <font face="Tahoma">PERHITUNGAN LUMPSUM PERJALANAN DINAS DALAM NEGERI</font>
                    <br> &nbsp;
                </b>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="right" valign=middle>
                <font face="Tahoma">Nomor</font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=4 align="left" valign=middle>
                <font face="Tahoma"><?= $nomor_digitalisasi_form_k31 ?></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="right" valign=top>
                <font face="Tahoma">Tanggal </font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" colspan=4 align="left" valign=top sdnum="1033;1033;D-MMM-YY">
                <font face="Tahoma"><?= $tanggal_digitalisasi_form_k31 ?></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font face="Tahoma"><br> &nbsp;</font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font face="Tahoma"><br> </font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <br> &nbsp;
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <b>
                    <font color="#000000">Kategori</font>
                </b>
            </td>
            <td align="left" valign=top>
                <font color="#000000">:</font>
            </td>
            <td align="left" colspan="3" valign=top>
                <font color="#000000"><?= $kategori_digitalisasi_form_k31 ?></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">Dari</font>
                </b></td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">:</font>
                </b></td>
            <td colspan=6 align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><?= $dari_digitalisasi_form_k31 ?></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">Lokasi / Tujuan</font>
                </b></td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">:</font>
                </b></td>
            <td colspan=6 align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><?= $lokasi_tujuan_digitalisasi_form_k31 ?></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=middle sdnum="1033;0;0.00">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">Tanggal PD / Lama PD</font>
                </b></td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">:</font>
                </b></td>
            <td colspan=7 align="left" valign=middle sdnum="1033;1033;D-MMM-YY">
                <font face="Tahoma"><?= $tanggal_berangkat_digitalisasi_form_k31 ?> s/d <?= $tanggal_pulang_digitalisasi_form_k31 ?> &nbsp;&nbsp;&nbsp;atau &nbsp;&nbsp;&nbsp;<?= $jumlah_hari_digitalisasi_form_k31 ?> hari</font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">K.32. Nomor</font>
                </b></td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">:</font>
                </b></td>
            <td style="border-right: 0.0264583333cm solid #000000" colspan=8 align="left" valign=middle>
                <font face="Tahoma"><?= $nomor_k32_digitalisasi_form_k31 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">Pelaksana Perjalanan Dinas</font>
                </b></td>
            <td align="left" valign=middle><b>
                    <font face="Tahoma">:</font>
                </b></td>
            <td colspan=6 align="left" valign=middle>
                <font face="Tahoma"><?= $nama_digitalisasi_form_k31 ?></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" height="49" align="center" valign=top>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top><b>
                    <font face="Tahoma">Jabatan</font>
                </b></td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font face="Tahoma">:</font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" colspan=4 align="left" valign=top>
                <font face="Tahoma"><?= $jabatan_digitalisasi_form_k31 ?></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="center" valign=top>
                <font face="Tahoma">Gol PD :</font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="center" valign=top>
                <font face="Tahoma"><b><?= $gol_digitalisasi_form_k31 ?></b></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="center" valign=top>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <br> &nbsp;
                <font color="#000000"><br></font>
            </td>
            <td align="center" colspan="8" valign=top>
                <strong>
                    <font color="#000000">Perhitungan Perjalanan Dinas <?= $uang_muka_digitalisasi_form_k31_data = ($uang_muka_digitalisasi_form_k31) ? 'Lumpsum dan Uang Muka' : 'Lumpsum'; ?><br></font>
                </strong>
            </td>
            <td align="center" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000;border-right: 0.0264583333cm solid #000000" colspan="11">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="right" valign=top>
                <font color="#000000">Uang Harian :</font>
            </td>
            <td colspan="3" align="center" valign=top>
                <font color="#000000">Rp. <?= number_format($uang_harian_digitalisasi_form_k31, 0, ',', '.') ?>,-</font>
            </td>
            <!-- <font color="#000000"><?= $uang_muka_digitalisasi_form_k31_data = ($uang_muka_digitalisasi_form_k31) ? 'Uang Muka' : ''; ?></font> -->
            <!-- <td align="right" colspan="2" valign=top>
                <font color="#000000"><br></font>
            </td> -->
            <!-- <font color="#000000"><?= $uang_muka_digitalisasi_form_k31_data = ($uang_muka_digitalisasi_form_k31) ? numfmt_format_currency($fmt, $uang_muka_digitalisasi_form_k31, 'Rp ') : ''; ?></font> -->
            <!-- <td align="center" colspan="3" valign=middle>
                <font color="#000000"><br></font>
            </td> -->
            <td align="center" rowspan="2" colspan="2" valign=top>
                <font color="#000000"><?= $uang_muka_digitalisasi_form_k31_data_html_detail_uang_muka = ($uang_muka_digitalisasi_form_k31) ? 'Keperluan Uang Muka : ' : ''; ?></font>
            </td>
            <td align="left" rowspan="2" colspan="3" valign=top>
                <font color="#000000"><?= $detail_uang_muka_digitalisasi_form_k31 = ($detail_uang_muka_digitalisasi_form_k31) ? $detail_uang_muka_digitalisasi_form_k31 : ''; ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="right" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="right" valign=top>
                <font color="#000000">Jumlah Hari :</font>
            </td>
            <td align="center" colspan="3" valign=top>
                <font color="#000000"><?= $jumlah_hari_digitalisasi_form_k31 ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="right" valign=top>
                <font color="#000000">Total Lumpsum :</font>
            </td>
            <td colspan="3" style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="center" valign=top>
                <strong>
                    <font color="#000000">Rp. <?= number_format($total_diterima_digitalisasi_form_k31, 0, ',', '.') ?>,-</font>
                </strong>
            </td>
            <td align="center" colspan=" 2" valign=top>
                <font color="#000000"><?= $uang_muka_digitalisasi_form_k31_data_html_total_uang_muka = ($uang_muka_digitalisasi_form_k31) ? 'Total Uang Muka : ' : ''; ?></font>
            </td>
            <?php if ($uang_muka_digitalisasi_form_k31) { ?>
                <td colspan="3" style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="center" valign=top>
                    <strong>
                        <font color="#000000"><?= $uang_muka_digitalisasi_form_k31_data = ($uang_muka_digitalisasi_form_k31) ? $uang_muka_digitalisasi_form_k31_data : '-'; ?></font>
                    </strong>
                </td>
            <?php } else { ?>
                <td colspan="3"></td>
            <?php } ?>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=11 height="20" align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=middle>
                <br> &nbsp;
                <font color="#000000"><br></font>
            </td>
            <td colspan="3" style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font color="#000000">Diketahui oleh Kepala Divisi SDM &amp; Umum :</font>
            </td>
            <!-- <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font color="#000000"></font>
            </td> -->
            <td colspan="3" style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font color="#000000"><?= $diketahui_digitalisasi_form_k31 ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=middle>
                <font color="#000000"><br></font>
            </td>
            <td colspan="3" style="border-top: 0.0264583333cm solid #000000;border-right: 0.0264583333cm solid #000000"" align=" left" valign=middle>
                <font color="#000000"><?= $diketahui_timestamp_digitalisasi_form_k31 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=11 height="36" align="center" valign=top>
                <br> &nbsp;
                <font color="#000000">Form ini dianggap sah jika terdapat QR-Code yang dapat diverifikasi by sistem</font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=11 height="20" align="center" valign=top>
                <font color="#000000"><?= $uuid_digitalisasi_form_k31 ?></font>
                <br> &nbsp;
            </td>
        </tr>
        <tr>
            <td width="1cm">&nbsp;</td>
            <td width="3cm">&nbsp;</td>
            <td width="1.42875cm">&nbsp;</td>
            <td width="0.5820833333cm">&nbsp;</td>
            <td width="0.5820833333cm">&nbsp;</td>
            <td width="0.5820833333cm">&nbsp;</td>
            <td width="2.8310416667cm">&nbsp;</td>
            <td width="1.7197916667cm">&nbsp;</td>
            <td width="2.8310416667cm">&nbsp;</td>
            <td width="1.7197916667cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
        </tr>
    </table>
    <?php if ($revisi_sistem_digitalisasi_form_k31) {
        echo $revisi_sistem_digitalisasi_form_k31 . '<br>';
    } ?>
    <?= 'Generated by system : V-1.1 / ' . date('r') ?>
    <!-- ************************************************************************** -->
</body>

</html>