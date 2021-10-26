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
        width: 3.175cm;
        height: 3.175cm;
        position: absolute;
        right: 1.8520831cm;
        top: 0.5291666cm;
        border: 0.07937499cm solid #005da2;
    }

    .logo {
        width: 4cm;
        height: 1.0181818181243443cm;
        position: absolute;
        left: 1.0583332cm;
        top: 1cm;
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
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=4 height="21" align="center" valign=top>
                <font color="#000000">K - 3.2</font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=10 align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=14
                height="35" align="center" valign=top><b>
                    <font size=5 color="#000000"> PT Len Telekomunikasi Indonesia</font>
                </b></td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=14
                height="21" align="center" valign=top><b>
                    <font size=3 color="#000000">PENGAJUAN PERJALANAN DINAS</font>
                </b>
                <br>&nbsp;
            </td>

        </tr>

        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" colspan=2
                rowspan=3 height="60" align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000">Nomor</font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=4 align="left" valign=top>
                <font color="#000000"><?= $nomor_digitalisasi_form_k32 ?></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=4 rowspan=3 align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td align="left" valign=top>
                <font color="#000000">Tanggal</font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=4 align="left" valign=top sdnum="1033;1033;D-MMM-YY">
                <font color="#000000"><?= $tanggal_pengajuan_digitalisasi_form_k32 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000" colspan=3 align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" colspan=4 align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000">Kebutuhan</font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=5 align="left" valign=top>
                <font color="#000000"><?= $kebutuhan_digitalisasi_form_k32 ?></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000">Untuk Keperluan</font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">: </font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" colspan=4 align="left" valign=top>
                <font color="#000000">
                    <?= $retVal = ($keperluan_digitalisasi_form_k32) ? $keperluan_digitalisasi_form_k32 : '-'; ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000">Kode Proyek</font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=6 align="left" valign=top>
                <font color="#000000"><?= $kode_proyek_digitalisasi_form_k32 ?></font>
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
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000"
                height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000">Nama Proyek</font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" colspan=6 align="left" valign=top>
                <font color="#000000"><?= $nama_proyek_digitalisasi_form_k32 ?></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000"
                height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="width:1cm;border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                height="20" align="center" valign=top>
                <font color="#000000">No.</font>
            </td>
            <td style="width:8cm; border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=5 align="center" valign=top>
                <font color="#000000">N A M A / N I K</font>
            </td>
            <td style="width:4cm; border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=2 align="center" valign=top>
                <font color="#000000">GOL. GRADE</font>
            </td>
            <td style="width:6cm; border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=2 align="center" valign=top>
                <font color="#000000">JABATAN</font>
            </td>
            <td style="width:6cm; border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=4 align="center" valign=top>
                <font color="#000000">DIVISI</font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                rowspan=2 height="40" align="center" valign=top sdval="1" sdnum="1033;">
                <font color="#000000">1</font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=5 rowspan=2 align="center" valign=top>
                <font color="#000000"><?= $nama_digitalisasi_form_k32 ?> / <?= $nip_digitalisasi_form_k32 ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=2 rowspan=2 align="center" valign=top>
                <font color="#000000"><?= $gol_digitalisasi_form_k32 ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=2 rowspan=2 align="center" valign=top>
                <font color="#000000"><?= $jabatan_digitalisasi_form_k32 ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=4 rowspan=2 align="center" valign=top>
                <font color="#000000"><?= $unit_kerja_digitalisasi_form_k32 ?></font>
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td style="border-top: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000" height="20"
                align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" colspan=4 align="left" valign=top>
                <font color="#000000">Jangka Waktu</font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" colspan=4 align="left" valign=top
                sdnum="1033;1033;D-MMM-YY">
                <font color="#000000"><?= date('d M Y', strtotime($tanggal_berangkat_digitalisasi_form_k32)) ?> s.d
                    <?= date('d M Y', strtotime($tanggal_pulang_digitalisasi_form_k32)) ?></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" rowspan=7 align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 0.0264583333cm solid #000000;border-right: 0.0264583333cm solid #000000" align="left"
                valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left" valign=top>
                <font color="#000000">Lokasi / Tujuan</font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=3 align="left" valign=top>
                <font color="#000000"><?= $dari_digitalisasi_form_k32 ?> - <?= $lokasi_tujuan_digitalisasi_form_k32 ?>
                </font>
            </td>
            <td colspan="5"
                style="border-top: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=4 align="center" valign=top>
                <font color="#000000">Request</font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left" valign=top>
                <font color="#000000">Cara Pembayaran </font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=3 align="left" valign=top>
                <font color="#000000"><?= $cara_pembayaran_digitalisasi_form_k32 ?></font>
            </td>
            <td colspan="2" style="border-left: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"> Tiket</font>
            </td>
            <td colspan="3" style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000">: <?= $tiket = ($req_tiket_digitalisasi_form_k32) ? 'yes' : '-'; ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left" valign=top>
                <font color="#000000"><br> </font>
            </td>
            <td align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=3 align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=2 style="border-left: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"> Penginapan</font>
            </td>
            <td colspan=3 style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000">: <?= $penginapan = ($req_penginapan_digitalisasi_form_k32) ? 'yes' : '-'; ?>
                </font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left" valign=top>
                <font color="#000000">Uang Muka </font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=3 align="left" valign=top>
                <font color="#000000">
                    <?= $uang_muka_digitalisasi_form_k32 = ($uang_muka_digitalisasi_form_k32) ? numfmt_format_currency($fmt, $uang_muka_digitalisasi_form_k32, 'Rp ') : '-'; ?>
                </font>
            </td>
            <td colspan=2 style="border-left: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"> Transport lokal</font>
            </td>
            <td colspan=3 style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000">:
                    <?= $transport_lokal = ($req_transport_lokal_digitalisasi_form_k32) ? 'yes' : '-'; ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=4 align="left" valign=top>
                <font color="#000000">Keperluan Uang Muka </font>
            </td>
            <td align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td colspan=3 align="left" valign=top>
                <font color="#000000">
                    <?= $detail_uang_muka_digitalisasi_form_k32 = ($detail_uang_muka_digitalisasi_form_k32) ? $detail_uang_muka_digitalisasi_form_k32 : '-'; ?>
                </font>
            </td>
            <td colspan="2"
                style="border-left: 0.0264583333cm solid #000000; border-bottom: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000"> Detail Req</font>
            </td>
            <td colspan="3"
                style="border-bottom: 0.0264583333cm solid #000000;border-right: 0.0264583333cm solid #000000"
                align="left" valign=top>
                <font color="#000000">:
                    <?= $catatan_digitalisasi_form_k32 = ($catatan_digitalisasi_form_k32) ? $catatan_digitalisasi_form_k32 : '-'; ?>
                </font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align=" center" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan="12" style="border-right: 0.0264583333cm solid #000000" align="right" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=2 align="left" valign=top>
                <font color="#000000">Diajukan oleh</font>
            </td>
            <td colspan=5 align="left" valign=top>
                <font color="#000000">: <?= $diajukan_digitalisasi_form_k32 ?></font>
            </td>
            <td colspan=2 align="left" valign=top>
                <font color="#000000"><?= $diajukan_timestamp_digitalisasi_form_k32 ?></font>
            </td>
            <td colspan=2 align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000" height="20" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td colspan=2 align="left" valign=top>
                <font color="#000000">Disetujui oleh</font>
            </td>
            <td colspan=5 align="left" valign=top>
                <font color="#000000">: <?= $disetujui_digitalisasi_form_k32 ?></font>
            </td>
            <td colspan=2 align="left" valign=top>
                <font color="#000000"><?= $disetujui_timestamp_digitalisasi_form_k32 ?></font>
            </td>
            <td colspan=2 align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 0.0264583333cm solid #000000" align="left" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000" colspan=14
                height="49" align="center" valign=top>
                <font color="#000000">Form ini dianggap sah jika terdapat QR-Code yang dapat diverifikasi by sistem
                </font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 0.0264583333cm solid #000000; border-left: 0.0264583333cm solid #000000; border-right: 0.0264583333cm solid #000000"
                colspan=14 height="20" align="center" valign=top>
                <font color="#000000"><?= $uuid_digitalisasi_form_k32 ?></font>
            </td>
        </tr>
        <tr>
            <td width="0.714375cm">&nbsp;</td>
            <td width="2.6cm">&nbsp;</td>
            <td width="0.4233333333cm">&nbsp;</td>
            <td width="0.1cm">&nbsp;</td>
            <td width="0.8466666667cm">&nbsp;</td>
            <td width="1.6404166667cm">&nbsp;</td>
            <td width="2.2754166667cm">&nbsp;</td>
            <td width="0.2910416667cm">&nbsp;</td>
            <td width="0.9789583333cm">&nbsp;</td>
            <td width="0.47625cm">&nbsp;</td>
            <td width="0.3704166667cm">&nbsp;</td>
            <td width="0.3704166667cm">&nbsp;</td>
            <td width="2.4870833333cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
        </tr>
    </table>
    <?php if ($revisi_sistem_digitalisasi_form_k32) {
        echo $revisi_sistem_digitalisasi_form_k32 . '<br>';
    } ?>
    <?= 'Generated by System Server: V-1.1 / ' . date('r') ?>
    <!-- ************************************************************************** -->
</body>

</html>