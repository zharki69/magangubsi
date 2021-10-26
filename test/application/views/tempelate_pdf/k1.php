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
            height: 20px;
        }

        .qr {
            position: absolute;
            right: 27px;
            top: 35px;
            border: 3px solid #005da2;
            width: 1.984375cm;
            height: 1.984375cm;
        }

        .logo {
            position: absolute;
            left: 0.9cm;
            top: 0.9cm;
            width: 1.3cm;
            height: 1.3cm;
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
    $image = $_SERVER['DOCUMENT_ROOT'] . $envi . '/application/views/tempelate_pdf/img/logo.png';
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
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=11 height="25" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                    <font size=4 color="#000000">K - 1</font>
                </b></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="45" align="center" valign=bottom><b>
                    <font size=6 color="#000000">PT Len Telekomunikasi Indonesia</font>
                </b></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="28" align="center" valign=bottom><b>
                    <font size=4 color="#000000">BUKTI PENGELUARAN KAS / BANK</font>
                </b></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="28" align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom>
                <font color="#000000"> Kas/Bank</font>
            </td>
            <td align="right" valign=bottom>
                <font color="#000000">:</font>
            </td>
            <td colspan=4 align="left" valign=bottom>
                <font color="#000000"><?= $no_kas_digitalisasi_form_k1 ?></font>
            </td>
            <td colspan=3 align="left" valign=bottom>
                <font color="#000000">No. Cek/Giro Bilyet</font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000">:</font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=2 align="left" valign=bottom>
                <font color="#000000"><?= $no_cek_giro_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 height="21" align="left" valign=middle>
                <font color="#000000"> No. Rek.</font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="right" valign=middle>
                <font color="#000000">:</font>
            </td>
            <td style="border-bottom: 1px solid #000000" colspan=4 align="left" valign=middle>
                <font color="#000000"><?= $no_rekening_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-bottom: 1px solid #000000" colspan=3 align="left" valign=middle>
                <font color="#000000">No. Kasir</font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle>
                <font color="#000000">:</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom>
                <font color="#000000"><?= $no_kasir_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=2 height="21" align="left" valign=top>
                <font color="#000000"> Dibayarkan Kepada</font>
            </td>
            <td align="left" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="left" valign=top>
                <font color="#000000"><?= $dibayarkan_kepada_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="23" align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=2 height="24" align="left" valign=middle>
                <font color="#000000"> Uang Sejumlah</font>
            </td>
            <td align="left" valign=middle>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 2px double #000000; border-bottom: 2px double #000000; border-left: 2px double #000000; border-right: 2px double #000000" colspan=4 align="right" valign=middle sdnum="1033;0;&quot;Rp&quot;#,##0.00_);[RED]\(&quot;Rp&quot;#,##0.00\)"><b>
                    <font size=2 color="#000000"><?= numfmt_format_currency($fmt, $uang_sejumlah_digitalisasi_form_k1, 'Rp ') ?></font>
                </b></td>
            <td style="border-left: 2px double #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=2 rowspan=2 height="44" align="left" valign=middle>
                <font color="#000000"> Dengan Huruf</font>
            </td>
            <td rowspan=2 align="left" valign=middle>
                <font color="#000000">:</font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=10 rowspan=2 align="left" valign=middle>
                <b>
                    <i>
                        <u>
                            <font size=2 color="#000000"><?= ucwords(number_to_words($uang_sejumlah_digitalisasi_form_k1)); ?></font>
                        </u>
                    </i>
                </b>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom>
                <font color="#000000"> Untuk Pengeluaran</font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=3 align="left" valign=top>
                <font face="Arial" size=2 color="#000000"><?= $untuk_pengeluaran_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=3 rowspan=2 height="43" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="center" valign=bottom>
                <font color="#000000">Dibukukan</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=bottom>
                <font color="#000000">Kode Rekening</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom>
                <font color="#000000">Kode Kegiatan</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom>
                <font color="#000000">Debet</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom>
                <font color="#000000">Kredit</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom>
                <font color="#000000">Catatan</font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="center" valign=bottom>
                <font size=2 color="#000000">Fungsi Akuntansi/</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=8 align="center" valign=middle>
                <font size=2 color="#000000"><?= $kode_rekening_debet_digitalisasi_form_k1 ?><br><?= $kode_rekening_kredit_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=8 align="center" valign=middle>
                <font color="#000000"><?= $kode_kegiatan_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=8 align="center" valign=middle>
                <font color="#000000"><?= numfmt_format_currency($fmt, doubleval($debet_digitalisasi_form_k1), 'Rp.') ?> <br> &nbsp;</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=8 align="center" valign=middle>
                <font color="#000000">&nbsp;<br><?= numfmt_format_currency($fmt, doubleval($kredit_digitalisasi_form_k1), 'Rp.') ?></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=8 align="center" valign=middle><u>
                    <font size=2 color="#000000"><?= $catatan_digitalisasi_form_k1 ?></font>
                </u></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="center" valign=top>
                <font size=2 color="#000000">Pemegang Buku</font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 2px double #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=6 height="128" align="center" valign=middle>
                <font color="#000000">&nbsp;</font>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td style="border-top: 2px double #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="23" align="center" valign=bottom><b>
                    <font size=2 color="#000000">No. Verifikasi <?= $no_verifikasi_digitalisasi_form_k1 ?></font>
                </b></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="left" valign=bottom><i>
                    <font size=2 color="#000000">Catatan : No. Kasir diisi Manual</font>
                </i></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="21" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><i>
                    <font size=2 color="#000000"><br></font>
                </i></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000">Approval by system</font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                <font color="#000000">Verifikasi Anggaran</font>
            </td>
            <td colspan=5 align="left" valign=bottom>
                <font color="#000000"><?= $verifikasi_anggaran_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                <font color="#000000"><?= $verifikasi_anggaran_timestamp_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                <font color="#000000">Kadiv Keuangan</font>
            </td>
            <td colspan=5 align="left" valign=bottom>
                <font color="#000000"><?= $kadiv_keuangan_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                <font color="#000000"><?= $kadiv_keuangan_timestamp_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <?php if ($dirkeu_digitalisasi_form_k1 or $uang_sejumlah_digitalisasi_form_k1 > 50000000) { ?>
            <tr>
                <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                    <font color="#000000">Direktur Keuangan</font>
                </td>
                <td colspan=5 align="left" valign=bottom>
                    <font color="#000000"><?= $dirkeu_digitalisasi_form_k1 ?></font>
                </td>
                <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                    <font color="#000000"><?= $dirkeu_timestamp_digitalisasi_form_k1 ?></font>
                </td>
            </tr>
        <?php } ?>
        <?php if ($dirut_digitalisasi_form_k1 or $uang_sejumlah_digitalisasi_form_k1 > 500000000) { ?>
            <tr>
                <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                    <font color="#000000">Direktur Utama</font>
                </td>
                <td colspan=5 align="left" valign=bottom>
                    <font color="#000000"><?= $dirut_digitalisasi_form_k1 ?></font>
                </td>
                <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                    <font color="#000000"><?= $dirut_timestamp_digitalisasi_form_k1 ?></font>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                <font color="#000000">Pembayaran & Verifikasi</font>
            </td>
            <td colspan=5 align="left" valign=bottom>
                <font color="#000000"><?= $akuntansi_bayar_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                <font color="#000000"><?= $akuntansi_bayar_timestamp_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                <font color="#000000">Pejalan Dinas</font>
            </td>
            <td colspan=5 align="left" valign=bottom>
                <font color="#000000"><?= $pejalan_dinas_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                <font color="#000000"><?= $pejalan_dinas_timestamp_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=4 height="21" align="left" valign=bottom>
                <font color="#000000">Akuntansi </font>
            </td>
            <td colspan=5 align="left" valign=bottom>
                <font color="#000000"><?= $akuntansi_verifikasi_digitalisasi_form_k1 ?></font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=4 align="left" valign=bottom>
                <font color="#000000"><?= $akuntansi_verifikasi_timestamp_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" height="21" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 1px solid #000000" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000;border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000">Form ini dianggap sah jika terdapat QR-Code yang dapat diverifikasi by sistem</font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000;border-right: 1px solid #000000" colspan=13 height="21" align="center" valign=bottom>
                <font color="#000000"><?= $uuid_digitalisasi_form_k1 ?></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="21" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td width="2cm">&nbsp;</td>
            <td width="1.5cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
            <td width="1.5cm">&nbsp;</td>
            <td width="1.1cm">&nbsp;</td>
            <td width="2.1cm">&nbsp;</td>
            <td width="0.8cm">&nbsp;</td>
            <td width="1.8cm">&nbsp;</td>
            <td width="1.5cm">&nbsp;</td>
            <td width="1.5cm">&nbsp;</td>
            <td width="1cm">&nbsp;</td>
        </tr>
    </table>
    <?php if ($revisi_sistem_digitalisasi_form_k1) {
        echo $revisi_sistem_digitalisasi_form_k1 . '<br>';
    } ?>
    <?= 'Generated by System Server: V-1.1 / ' . date('r') ?>
    <!-- ************************************************************************** -->
</body>

</html>