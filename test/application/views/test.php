
    <table border="0">
        <tbody>
            <tr>
                <td style="border-bottom: 2px solid black;" width="0.5cm"></td>
                <td style="border-bottom: 2px solid black;" width="4.0cm"></td>
                <td style="border-bottom: 2px solid black;" width="4.7cm"></td>
                <td style="border-bottom: 2px solid black;" width="1.95cm"></td>
                <td style="border-bottom: 2px solid black;" width="1.75cm"></td>
                <td style="border-bottom: 2px solid black;" width="1.75cm"></td>
                <td style="border-bottom: 2px solid black;" width="1.75cm"></td>
                <td style="border-bottom: 2px solid black;" width="1.76cm"></td>
                <td style="border-bottom: 2px solid black;" width="0.5cm"></td>
            </tr>
            <tr>
                <td style="border-left: 2px solid black;"colspan="7"></td>
                <td style="border-bottom: 2px solid black; border-right: 2px solid black; border-left: 2px solid black;" colspan="2" align="center">
                    <b>HRF-020</b></td>
            </tr>
            <tr>
                <td style="border-left: 2px solid black;"colspan="7"></td>
                <td style="border-right: 2px solid black;"colspan="2"></td>
            </tr>
            <tr>
                <td style="border-left: 2px solid black;"colspan="7"></td>
                <td style="border-right: 2px solid black;"colspan="2"></td>
            </tr>
            <tr>
                <td style="border-left: 2px solid black;"></td>
                <td style="border-right: 2px solid black; text-align:center;" colspan="9">
                    <font size="14"><b>EVALUASI UMUM PENYELENGGARAAN PELATIHAN</b></font>
                </td>
            </tr>
            <tr>
                <td style="border-left: 2px solid black;" height="25"></td>
                <td style="border-right: 2px solid black; text-align:center;" colspan="9">
                    <font size="14"><b>Daftar Pertanyaan / Kuisioner</b></font>
                </td>
            </tr>           
            <tr>
                <td colspan="9" style="border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black;"></td>
            </tr>

<!-- ISI IDENTITAS & PELATIHAN AWAL -->
            <tr>
                <td height="25"></td>
                <td>Nama Pelatihan</td>
                <td colspan="6">: <?= $nama_pelatihan ?> </td>
            </tr>
            <tr>
                <td height="25"></td>
                <td>Waktu Pelatihan</td>
                <td colspan="5">: <?= $tanggal_pelatihan_awal ?>/<?= $tanggal_pelatihan_akhir ?></td>
            </tr>
            <tr>
                <td height="25"></td>
                <td>Nama Penyelenggara</td>
                <td colspan="5">: <?= $nama_pemateri ?></td>
            </tr>
            <tr>
                <td height="25"></td>
                <td>Nama Pemateri</td>
                <td colspan="5">: <?= $nama_pemateri ?></td>
            </tr>
            <tr>
                <td colspan="9"></td>
            </tr>
<!-- ISI IDENTITAS & PELATIHAN AKHIR -->

<!-- Header Tabel awal -->
            <tr>
                <td ></td>
                <td style="border: 2px solid black; text-align: center;" colspan="2" rowspan="3">
                    <br><br>ASPEK
                </td>
                <td style="border: 2px solid black; text-align: center;" colspan="5">PENILAIAN</td>
            </tr>
            <tr style= "text-align: center;">
                <td></td>
                <td style="border: 2px solid black;">1</td>
                <td style="border: 2px solid black;">2</td>
                <td style="border: 2px solid black;">3</td>
                <td style="border: 2px solid black;">4</td>
                <td style="border: 2px solid black;">5</td>
            </tr>
            <tr style= "text-align: center; font-size:13px;" >
                <td></td>
                <td style="border: 2px solid black;">Sangat<br> tidak puas</td>
                <td style="border: 2px solid black;">Tidak<br>Puas</td>
                <td style="border: 2px solid black;">Cukup<br>Puas</td>
                <td style="border: 2px solid black;">Puas</td>
                <td style="border: 2px solid black;">Sangat<br>Puas</td>
            </tr>
<!-- Header Tabel akhir -->

<!-- Tabel isi Pemateri awal -->
            <tr style="text-align: center;">
                <td height="22"></td>
                <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="2" bgcolor="#D8D8D8"><u>Pemateri</u></td>
                <td style="border-right: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="5" bgcolor="#D8D8D8"></td>
            </tr>
            <tr>
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 1. Metode pengajaran yang digunakan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_1 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_1 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_1 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_1 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_1 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr>
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 2. Bahasa yang digunakan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_2 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_2 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_2 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_2 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_2 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr>
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 3. Cara menjawab pertanyaan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_3 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_3 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_3 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_3 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_3 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 4. Penguasaan materi</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_4 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_4 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_4 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_4 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_4 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 5. Penyampaian materi</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_5 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_5 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_5 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_5 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_5 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
<!-- Tabel isi Pemateri akhir -->

<!-- Tabel isi Materi awal -->
            <tr style="text-align: center;">
                <td height="22"></td>
                <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="2" bgcolor="#D8D8D8"><u>Materi</u></td>
                <td style="border-right: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="5" bgcolor="#D8D8D8"></td>
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 1. Kesesuaian materi dengan modul yang diberikan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_6 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_6 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_6 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_6 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_6 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 2. Manfaat materi dalam pekerjaan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_7 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_7 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_7 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_7 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_7 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 3. Modul membantu proses pembelajaran</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_8 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_8 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_8 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_8 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_8 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 4. Sistematika penyajian materi</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_9 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_9 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_9 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_9 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_9 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 5. Kejelasan / kemudahan materi untuk dipahami</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_10 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_10 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_10 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_10 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_10 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
<!-- Tabel isi Materi akhir -->

<!-- Tabel isi Fasilitas Pelatihan awal -->
            <tr style="text-align: center;">
                <td height="22"></td>
                <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="2" bgcolor="#D8D8D8"><u>Fasilitas Pelatihan</u></td>
                <td style="border-right: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="5" bgcolor="#D8D8D8"></td>
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 1. Konsumsi</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_11 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_11 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_11 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_11 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_11 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 2. Seminar Kit</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_12 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_12 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_12 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_12 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_12 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 3. Fasilitas ruangan (meja, kursi)</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_13 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_13 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_13 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_13 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_13 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 4. Kualitas dan kesesuaian audio visual/alat peraga</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_14 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_14 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_14 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_14 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_14 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 5. Ruangan (cahaya, luas, akustik, ventilasi)</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_15 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_15 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_15 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_15 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_15 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
<!-- Tabel isi Fasilitas Pelatihan akhir -->

<!-- Tabel isi Penyelenggaraan Pelatihan awal -->
            <tr style="text-align: center;">
                <td height="22"></td>
                <td style="border-left: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="2" bgcolor="#D8D8D8"><u>Penyelenggaraan Pelatihan</u></td>
                <td style="border-right: 2px solid #000000; border-bottom: 2px solid #000000;" colspan="5" bgcolor="#D8D8D8"></td>
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 1. Ketepatan waktu pelaksanaan pelatihan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_16 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_16 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_16 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_16 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_16 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 2. Kesediaan panitia dalam membantu peserta</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_17 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_17 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_17 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_17 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_17 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 3. Kesigapan panitia dalam membantu peserta</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_18 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_18 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_18 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_18 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_18 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
            <tr >
                <td></td>
                <td style="border: 2px solid black; font-size:13px;" colspan="2"> 4. Suasana kelas selama pelatihan</td>
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_19 == $STP ? '4' : '';  ?></font></td> <!-- SANGAT TIDAK-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_19 == $TP ? '4' : '';  ?></font> </td> <!-- TIDAK PUAS-->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_19 == $CP ? '4' : '';  ?></font> </td> <!-- CUKUP PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_19 == $P ? '4' : ''; ?></font>   </td> <!-- PUAS -->
                <td style="border: 2px solid black;" align="center"><font face="zapfdingbats"><?= $nilai_19 == $SP ? '4' : '';  ?></font> </td> <!-- SANGAT PUAS--> 
            </tr>
<!-- Tabel isi Penyelenggaraan Pelatihan akhir -->

<!-- KOMENTAR AWAL -->
            <tr>
                <td colspan="8"></td>
            </tr>
            <tr>
                <td height="22"></td>
                <td style="font-size:13px;" colspan="8">Apakah pelatihan ini perlu diberikan kepada rekan anda yang belum pernah mengikuti? 
                    ( <?= $nilai_20 == $Y ? '<s>YA</s>' : 'TIDAK';  ?> / <?= $nilai_20 == $T ? '<s>TIDAK</s>' : 'TIDAK';  ?> )
                </td>
            </tr>
            <tr>
                <td height="22"></td>
                <td style="font-size:13px;" colspan="8">Apakah anda akan merekomendasikan penyelenggara pelatihan ini kepada rekan anda? 
                    ( <?= $nilai_21 == $Y ? '<s>YA</s>' : 'YA';  ?> / <?= $nilai_21 == $T ? '<s>TIDAK</s>' : 'TIDAK';  ?>  )
            </td>
            </tr>
            <tr>
                <td height="22"></td>
                <td colspan="8" >KOMENTAR : <?= $komentar ?></td>
            </tr>
            <tr>
                <td colspan="9"><br><br></td>
            </tr>
<!-- KOMENTAR AKHIR -->
        </tbody>
    </table>