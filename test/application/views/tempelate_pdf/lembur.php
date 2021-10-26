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
            position: absolute;
            right: 1.8520833333cm;
            top: 0.5291666cm;
            border: 0.079375cm solid #005da2;
            width: 3cm;
            height: 3cm;
        }

        .logo {
            width: 5.8208333333cm;
            height: 1.508125cm;
            position: absolute;
            left: 1.0583333333cm;
            top: 0.1852083333cm;
        }

        a.comment-indicator:hover+comment {
            background: #ffd;
            position: absolute;
            display: block;
            border: 0.0264583333cm solid black;
            padding: 0.5em;
        }

        a.comment-indicator {
            background: red;
            display: inline-block;
            border: 0.0264583333cm solid black;
            width: 0.5em;
            height: 0.5em;
        }

        comment {
            display: none;
        }
    </style>

</head>

<body>
    <?php if ($qrcode) { ?>
        <?php $envi = (ENVIRONMENT == 'development') ? '/' . $this->config->item('development_folder') : ''; ?>
        <?php
        // A few settings
        $image = $_SERVER['DOCUMENT_ROOT'] . $envi . '/application/libraries/qrcode/assets/' . $qrcode . '.png';
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));
        // Format the image SRC: data:{mime};base64,{data};
        $src_qr = 'data:' . mime_content_type($image) . ';base64,' . $imageData;
        ?>
        <img class="qr" src="<?php echo $src_qr ?>" alt="qrcode">
        <?php
        // A few settings
        $image = $_SERVER['DOCUMENT_ROOT'] . $envi . '/application/views/tempelate_pdf/img/logo_full_transparant.png';
        // Read image path, convert to base64 encoding
        $imageData = base64_encode(file_get_contents($image));
        // Format the image SRC: data:{mime};base64,{data};
        $src_logo = 'data:' . mime_content_type($image) . ';base64,' . $imageData;
        ?>
        <img class="logo" src="<?php echo $src_logo ?>" alt="logo">
    <?php } ?>

    <table cellspacing="0" border="0">
        <tr>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=4 rowspan=3 height="65" align="left">
                <font color="#000000"><br>
                </font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=5 align="left"><b>
                    <font size=2 color="#000000">Menara MTH, M Floor </font>
                </b></td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=5 align="left"><b>
                    <font size=2 color="#000000">Jl. Letjen MT Haryono, Kav. 23 Jakarta 12820</font>
                </b></td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td colspan=2 rowspan=6 align="center" valign=middle>
                </font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=5 align="left" valign=top><b>
                    <font size=2 color="#000000">Telp. : +62 21 8378 2445 Fax. : +62 21 8378 2447</font>
                </b></td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="height:2.1cm; border-left: 0.0264583333cm solid #000000" height="41" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td colspan=7 align="center"><b>
                    <font size=5 color="#000000">LEMBAR KERJA LEMBUR</font>
                </b></td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="35" align="left">
                <font color="#000000"><br></font>
            </td>
            <td colspan=6 align="left" valign=middle>
                <font color="#000000">Form ini harus dilengkapi sebelum kerja lembur berjalan</font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="23" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000">Nama</font>
            </td>
            <td colspan="3" align="left">
                <font color="#000000">: <?= $nama_digitalisasi_form_lembur ?></font>
            </td>
            <td colspan=2 align="left">
                <font color="#000000">Tanggal Pengajuan :</font>
            </td>
            <td colspan=3 align="left" sdnum="1033;1033;M/D/YYYY">
                <font color="#000000"><?= $tanggal_pengajuan_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000">Divisi/Unit</font>
            </td>
            <td colspan=3 align="left">
                <font color="#000000">: <?= $unit_kerja_digitalisasi_form_lembur ?></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <!--         <colgroup width="37"></colgroup>
        <colgroup width="80"></colgroup>
        <colgroup width="93"></colgroup>
        <colgroup span="2" width="74"></colgroup>
        <colgroup width="72"></colgroup>
        <colgroup width="93"></colgroup>
        <colgroup span="2" width="74"></colgroup>
        <colgroup width="72"></colgroup>
        <colgroup width="93"></colgroup>
        <colgroup width="83"></colgroup>
        <colgroup width="37"></colgroup>
        <colgroup width="89"></colgroup> -->
            <td width='37' style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#f5f5f5"><br></font>
            </td>
            <td width='80' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=middle bgcolor="#616161">
                <font color="#f5f5f5">Hari</font>
            </td>
            <td width='93' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=middle bgcolor="#616161">
                <font color="#f5f5f5">Tgl.</font>
            </td>
            <td width='300' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=5 rowspan=2 align="center" valign=middle bgcolor="#616161">
                <font color="#f5f5f5">Alasan untuk Kerja Lembur</font>
            </td>
            <td width='100' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=4 align="center" bgcolor="#616161">
                <font color="#f5f5f5">(Total waktu yang diperlukan)</font>
            </td>
            <td width='40' style="border-right: 0.0264583333cm solid #000000" align="center">
                <font color="#f5f5f5"><br></font>
            </td>
            <td align="left">
                <font color="#f5f5f5"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#f5f5f5"><br></font>
            </td>
            <td width='50' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="center" bgcolor="#616161">
                <font color="#f5f5f5">Mulai</font>
            </td>
            <td width='50' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="center" bgcolor="#616161">
                <font color="#f5f5f5">Selesai</font>
            </td>
            <td width='90' style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=2 align="center" bgcolor="#616161">
                <font color="#f5f5f5">Total Durasi Lembur</font>
            </td>
            <td width='10' style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#f5f5f5"><br></font>
            </td>
            <td align="left">
                <font color="#f5f5f5"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td rowspan="2" style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=top>
                <font color="#000000"> <?= $hari_lembur_digitalisasi_form_lembur ?></font>
            </td>
            <td rowspan="2" style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=top sdnum="1033;1033;M/D/YYYY">
                <font color="#000000"><?= $tanggal_lembur_digitalisasi_form_lembur ?></font>
            </td>
            <td rowspan="3" style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=5 rowspan=2 align="center" valign=top>
                <font color="#000000"><?= $alasan_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=top sdnum="1033;1033;H:MM">
                <font color="#000000"><?= $mulai_jam_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=top sdnum="1033;1033;H:MM">
                <font color="#000000"><?= $selesai_jam_digitalisasi_form_lembur ?></font>
            </td>
            <td align="right" style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=top sdnum="1033;1033;H:MM">
                <font color="#000000"><?= $total_jam_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" rowspan=2 align="center" valign=top sdnum="1033;0;0.00">
                <font color="#000000">jam</font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000;" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-left: 0.0264583333cm solid #123321; border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#321312"><br></font>
            </td>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="center">
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000">Diajukan oleh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Admin Divisi / Staff SDM</font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000"><?= $diajukan_digitalisasi_form_lembur ?></font>
            </td>
            <td colspan=3 align="center" sdnum="1033;1033;M/D/YYYY">
                <font color="#000000"><?= $diajukan_timestamp_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="center">
                <font color="#000000"><br></font>
            </td>
            <td align="center">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="center">
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000">Disetujui oleh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Atasan Langsung</font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000"><?= $disetujui_digitalisasi_form_lembur ?></font>
            </td>
            <td colspan=3 align="center" sdnum="1033;1033;M/D/YYYY">
                <font color="#000000"><?= $disetujui_timestamp_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="center">
                <font color="#000000"><br></font>
            </td>
            <td align="center">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="center">
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000">Diverifikasi oleh &nbsp;: Staff SDM</font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000"><?= $diverifikasi_digitalisasi_form_lembur ?></font>
            </td>
            <td colspan=3 align="center" sdnum="1033;1033;M/D/YYYY">
                <font color="#000000"><?= $diverifikasi_timestamp_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="center">
                <font color="#000000"><br></font>
            </td>
            <td align="center">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000">Diketahui oleh &nbsp;&nbsp;&nbsp;&nbsp;: Kepala Divisi SDM &amp; Umum</font>
            </td>
            <td colspan=4 align="left">
                <font color="#000000"><?= $diketahui_digitalisasi_form_lembur ?></font>
            </td>
            <td colspan=3 align="center" sdnum="1033;1033;M/D/YYYY">
                <font color="#000000"><?= $diketahui_timestamp_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td colspan=11 align="center">
                <font color="#000000">Form ini dianggap sah jika dapat diverifikasi by sistem</font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td colspan=11 align="center">
                <font color="#000000"><?= $uuid_digitalisasi_form_lembur ?></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" height="21" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" align="left">
                <font color="#000000"><br></font>
            </td>
            <td align="left">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <!-- <tr>
            <td width="1cm">&nbsp;</td>
            <td width="2.1166666667cm">&nbsp;</td>
            <td width="2.460625cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="1.8cm">&nbsp;</td>
            <td width="2.4cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="1.7cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="2.1cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="2.1cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
        </tr> -->
    </table>
    <?php if ($revisi_sistem_digitalisasi_form_lembur) {
        echo $revisi_sistem_digitalisasi_form_lembur . '<br>';
    } ?>
    <?= 'Generated by System Server: V-1.1 / ' . date('r') ?>
    <!-- ************************************************************************** -->
</body>

</html>