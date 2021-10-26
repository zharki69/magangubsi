-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2021 at 12:53 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lti_localhost`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nip_absensi` varchar(64) NOT NULL,
  `nama_absensi` varchar(100) DEFAULT NULL,
  `unit_kerja_absensi` varchar(100) DEFAULT NULL,
  `tanggal_absensi` date NOT NULL,
  `mode_kerja_absensi` varchar(55) DEFAULT NULL,
  `keterangan_absensi` varchar(100) DEFAULT NULL,
  `lokasi_absensi` varchar(55) DEFAULT NULL,
  `scan_masuk_absensi` timestamp NULL DEFAULT NULL,
  `ip_masuk_absensi` varchar(24) DEFAULT NULL,
  `scan_keluar_absensi` timestamp NULL DEFAULT NULL,
  `ip_keluar_absensi` varchar(24) DEFAULT NULL,
  `durasi_jam_absensi` int(2) DEFAULT NULL,
  `durasi_menit_absensi` int(3) DEFAULT NULL,
  `durasi_kurang_absensi` int(3) DEFAULT NULL,
  `durasi_terlambat_absensi` int(3) DEFAULT NULL,
  `total_menit_absensi` int(5) DEFAULT NULL,
  `shareloc_masuk_absensi` varchar(200) DEFAULT NULL,
  `shareloc_akurasi_masuk_absensi` decimal(5,0) DEFAULT NULL,
  `shareloc_keluar_absensi` varchar(200) DEFAULT NULL,
  `shareloc_akurasi_keluar_absensi` decimal(5,0) DEFAULT NULL,
  `deskripsi_tugas_keluar_absensi` varchar(200) DEFAULT NULL,
  `dokumen_pendukung_keluar_absensi` varchar(64) DEFAULT NULL,
  `created_at_absensi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modifed_absensi` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_at_absensi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `approval_logistik`
-- (See below for the actual view)
--
CREATE TABLE `approval_logistik` (
`create_by` varchar(255)
,`no_dppb` varchar(255)
,`no_gi` varchar(255)
,`status` enum('proses','selesai','batal')
,`dppb_approve_1` datetime
,`dppb_approve_2` datetime
,`dppb_approve_3` datetime
,`dppb_approve_4` datetime
,`dppb_approve_5` datetime
,`dppb_approve_6` datetime
,`dppb_approve_7` datetime
,`dppb_approve_8` datetime
,`metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung')
,`carrying_mode` varchar(255)
,`gi_status` enum('proses','selesai','batal')
,`dn_status` enum('proses','selesai','batal')
,`delete_at_digitalisasi_dppb` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `approval_pengadaan`
-- (See below for the actual view)
--
CREATE TABLE `approval_pengadaan` (
`no_dpbj` varchar(255)
,`po_spmk` enum('po','spmk')
,`status` enum('proses','selesai','batal')
,`metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung')
,`dpbj_approve_1` datetime
,`dpbj_approve_2` datetime
,`ppl_approve_1` timestamp
,`ppl_approve_2` timestamp
,`spph_approve_1` timestamp
,`po_approve_1` timestamp
,`spmk_approve_1` timestamp
,`lpp_approve_1` timestamp
,`lpp_approve_2` timestamp
,`lpp_approve_3` timestamp
,`delete_at_digitalisasi_dpbj` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `approval_pengadaan_logistik`
-- (See below for the actual view)
--
CREATE TABLE `approval_pengadaan_logistik` (
`no_gi` varchar(255)
,`po_spmk` enum('po','spmk')
,`status` enum('proses','selesai','batal')
,`metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung')
,`gi_approve_1` datetime
,`gi_approve_2` datetime
,`gi_approve_3` datetime
,`ppl_approve_1` timestamp
,`ppl_approve_2` timestamp
,`spph_approve_1` timestamp
,`po_approve_1` timestamp
,`spmk_approve_1` timestamp
,`lpp_approve_1` timestamp
,`lpp_approve_2` timestamp
,`lpp_approve_3` timestamp
,`delete_at_digitalisasi_gi` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `aset_diat`
--

CREATE TABLE `aset_diat` (
  `id` int(11) NOT NULL,
  `qr` varchar(32) NOT NULL,
  `nama_aset` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `nomor_seri` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `nip_karyawan` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `masa_habis_pakai` date DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `last_scan_at` timestamp NULL DEFAULT NULL,
  `last_ip` varchar(32) DEFAULT NULL,
  `last_scan_by` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link_active` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collect_sudah_vaksin`
--

CREATE TABLE `collect_sudah_vaksin` (
  `id_sudah_vaksin` int(11) NOT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `nik_peserta` varchar(255) DEFAULT NULL,
  `no_hp_peserta` varchar(255) DEFAULT NULL,
  `pernyataan_vaksin` varchar(255) DEFAULT NULL,
  `vaksin_tahap_1` varchar(255) DEFAULT NULL,
  `lokasi_vaksin_tahap_1` varchar(255) DEFAULT NULL,
  `tanggal_vaksin_tahap_1` varchar(255) DEFAULT NULL,
  `vaksin_tahap_2` varchar(255) DEFAULT NULL,
  `lokasi_vaksin_tahap_2` varchar(255) DEFAULT NULL,
  `tanggal_vaksin_tahap_2` varchar(255) DEFAULT NULL,
  `keterangan_belum_vaksin` text,
  `keterangan_sakit` varchar(255) DEFAULT NULL,
  `keterangan_terpapar` varchar(255) DEFAULT NULL,
  `keterangan_tanggal_terpapar` varchar(255) DEFAULT NULL,
  `tidak_bersedia` varchar(255) DEFAULT NULL,
  `keterangan_tidak_bersedia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collect_vaksin_lansia`
--

CREATE TABLE `collect_vaksin_lansia` (
  `no` int(11) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `nik_karyawan` varchar(255) DEFAULT NULL,
  `status_peserta` varchar(255) DEFAULT 'Orang Tua',
  `jenis_kelamin_peserta` varchar(255) DEFAULT NULL,
  `domisili_prov_peserta` varchar(255) DEFAULT NULL,
  `domisili_kota_peserta` varchar(255) DEFAULT NULL,
  `nik_peserta` varchar(255) DEFAULT NULL,
  `usia_peserta` varchar(255) DEFAULT NULL,
  `no_handphone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `name` varchar(20) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_dpbj_join`
-- (See below for the actual view)
--
CREATE TABLE `detail_dpbj_join` (
`kode_barang_jasa` varchar(255)
,`nama_barang_jasa` varchar(255)
,`jumlah_barang_jasa` double
,`satuan` varchar(255)
,`mu` varchar(255)
,`harga_satuan` double
,`total` double
,`id` int(11)
,`uuid` varchar(255)
,`no_dpbj` varchar(255)
,`kode_proyek` varchar(255)
,`tanggal_pengajuan` date
,`tanggal_dibutuhkan` date
,`yang_membuat` varchar(255)
,`unit_kerja` varchar(255)
,`kode_kegiatan` varchar(255)
,`jumlah` double
,`termasuk_ppn` varchar(255)
,`jumlah_ppn` double
,`yang_meminta_nama` varchar(255)
,`yang_meminta_image` varchar(255)
,`yang_meminta_timestamp` datetime
,`yang_menyetujui_nama` varchar(255)
,`yang_menyetujui_image` varchar(255)
,`yang_menyetujui_timestamp` datetime
,`file_tor` varchar(255)
,`metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung')
,`timestamp` timestamp
,`create_by` varchar(255)
,`modify` timestamp
,`modify_by` varchar(255)
,`status` enum('proses','selesai','batal')
,`keterangan` varchar(255)
,`revisi_sistem` varchar(255)
,`delete_at_digitalisasi_dpbj` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_dppb_join`
-- (See below for the actual view)
--
CREATE TABLE `detail_dppb_join` (
`no_po_spmk` varchar(255)
,`nama_proyek` varchar(255)
,`kode_lokasi` varchar(255)
,`kode_proyek` varchar(255)
,`lokasi` varchar(100)
,`alamat` varchar(255)
,`no_po` varchar(255)
,`no_gi` varchar(255)
,`no_dn` varchar(255)
,`no_gr` varchar(255)
,`kode_material` varchar(255)
,`nama_material` varchar(255)
,`satuan` varchar(255)
,`jumlah_material` double
,`lokasi_pengiriman` varchar(255)
,`detail_keterangan` varchar(255)
,`id` int(11)
,`uuid` varchar(255)
,`no_dppb` varchar(255)
,`tanggal_pengajuan` date
,`tanggal_dibutuhkan` date
,`nama_pemohon` varchar(255)
,`unit_kerja` varchar(255)
,`regional` varchar(255)
,`proyek` varchar(255)
,`approve_1_nama` varchar(255)
,`approve_1_image` varchar(255)
,`approve_1_timestamp` datetime
,`approve_2_nama` varchar(255)
,`approve_2_image` varchar(255)
,`approve_2_timestamp` datetime
,`approve_3_nama` varchar(255)
,`approve_3_image` varchar(255)
,`approve_3_timestamp` datetime
,`approve_4_nama` varchar(255)
,`approve_4_image` varchar(255)
,`approve_4_timestamp` datetime
,`approve_5_nama` varchar(255)
,`approve_5_image` varchar(255)
,`approve_5_timestamp` datetime
,`penandatangan_nama` varchar(255)
,`penandatangan_jabatan` varchar(255)
,`penandatangan_nip` varchar(255)
,`timestamp` timestamp
,`create_by` varchar(255)
,`modify` timestamp
,`modify_by` varchar(255)
,`status` enum('proses','selesai','batal')
,`keterangan` varchar(255)
,`revisi_sistem` varchar(255)
,`delete_at_digitalisasi_dppb` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_hasil_mingguan_survey_gt_covid`
--

CREATE TABLE `detail_hasil_mingguan_survey_gt_covid` (
  `id_detail_hasil_mingguan_survey_gt_covid` int(8) NOT NULL,
  `id_hasil_mingguan` int(8) NOT NULL,
  `tanggal_mingguan_survey_gt_covid` date NOT NULL,
  `nama_jenis_anggota_keluarga` varchar(55) NOT NULL,
  `index_jenis_anggota_keluarga_mingguan_survey_gt_covid` int(2) NOT NULL,
  `kondisi_kesehatan_mingguan_survey_gt_covid` varchar(24) NOT NULL,
  `demam__mingguan_survey_gt_covid` varchar(30) DEFAULT NULL,
  `batuk_mingguan_survey_gt_covid` varchar(30) DEFAULT NULL,
  `pilek_mingguan_survey_gt_covid` varchar(30) DEFAULT NULL,
  `bersin_mingguan_survey_gt_covid` varchar(30) DEFAULT NULL,
  `pegal_mingguan_survey_gt_covid` varchar(30) DEFAULT NULL,
  `lainnya_mingguan_survey_gt_covid` varchar(100) DEFAULT NULL,
  `delete_at_detail_hasil_mingguan_survey_gt_covid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_ban`
--

CREATE TABLE `digitalisasi_ban` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_ban` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_sph` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `tanggal_ban` varchar(255) DEFAULT NULL,
  `tempat_negosiasi` varchar(255) DEFAULT NULL,
  `pelaksana_internal` text,
  `ttd_image_internal` text,
  `ttd_timestamp_internal` text,
  `pelaksana_eksternal` text,
  `ttd_image_eksternal` text,
  `ttd_timestamp_eksternal` text,
  `kadiv_mar_timestamp` varchar(255) DEFAULT NULL,
  `kadiv_mar_nama` varchar(255) DEFAULT NULL,
  `kadiv_mar_image` varchar(255) DEFAULT NULL,
  `harga_negosiasi` double DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `jumlah_hari` varchar(255) DEFAULT NULL,
  `jumlah_bulan` varchar(255) DEFAULT NULL,
  `jumlah_tahun` varchar(255) DEFAULT NULL,
  `prakiraan_tanggal` date DEFAULT NULL,
  `cara_penyerahan` varchar(255) DEFAULT NULL,
  `garansi` varchar(255) DEFAULT NULL,
  `cara_pembayaran` varchar(255) DEFAULT NULL,
  `tahapan_pembayaran` varchar(255) DEFAULT NULL,
  `catatan_tambahan` varchar(255) DEFAULT NULL,
  `render_dokumen` text,
  `tempelate` varchar(255) DEFAULT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_dn`
--

CREATE TABLE `digitalisasi_dn` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_dn` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `no_gr` varchar(255) DEFAULT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `no_detail_dppb` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `koordinator` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `creator` varchar(255) DEFAULT NULL,
  `applicant` varchar(255) DEFAULT NULL,
  `carrier` varchar(255) DEFAULT NULL,
  `consignee` varchar(255) DEFAULT NULL,
  `outbound_date` date DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `vehicle_id` varchar(255) DEFAULT NULL,
  `consignee_telephone` varchar(255) DEFAULT NULL,
  `destination_add` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `file_dn_upload` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_dn_detail`
--

CREATE TABLE `digitalisasi_dn_detail` (
  `id` int(11) NOT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `no_dn` varchar(255) DEFAULT NULL,
  `no_gr` varchar(255) DEFAULT NULL,
  `kode_material` varchar(255) DEFAULT NULL,
  `nama_material` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `mu` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(255) DEFAULT NULL,
  `lokasi_pengiriman` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_dpbj`
--

CREATE TABLE `digitalisasi_dpbj` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `po_spmk` enum('po','spmk') DEFAULT NULL COMMENT 'metode_order via po / spmk',
  `kode_proyek` varchar(255) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanggal_dibutuhkan` date DEFAULT NULL,
  `yang_membuat` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `kode_kegiatan` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `termasuk_ppn` varchar(255) DEFAULT NULL,
  `jumlah_ppn` double DEFAULT NULL,
  `yang_meminta_nama` varchar(255) DEFAULT NULL,
  `yang_meminta_image` varchar(255) DEFAULT NULL,
  `yang_meminta_timestamp` datetime DEFAULT NULL,
  `yang_menyetujui_nama` varchar(255) DEFAULT NULL,
  `yang_menyetujui_image` varchar(255) DEFAULT NULL,
  `yang_menyetujui_timestamp` datetime DEFAULT NULL,
  `file_tor` varchar(255) DEFAULT NULL,
  `metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at_digitalisasi_dpbj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_dpbj_detail`
--

CREATE TABLE `digitalisasi_dpbj_detail` (
  `id` int(11) NOT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `kode_barang_jasa` varchar(255) DEFAULT NULL,
  `nama_barang_jasa` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `mu` varchar(255) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_dppb`
--

CREATE TABLE `digitalisasi_dppb` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanggal_dibutuhkan` date DEFAULT NULL,
  `nama_pemohon` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `regional` varchar(255) DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `approve_1_nama` varchar(255) DEFAULT NULL,
  `approve_1_image` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` datetime DEFAULT NULL,
  `approve_2_nama` varchar(255) DEFAULT NULL,
  `approve_2_image` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` datetime DEFAULT NULL,
  `approve_3_nama` varchar(255) DEFAULT NULL,
  `approve_3_image` varchar(255) DEFAULT NULL,
  `approve_3_timestamp` datetime DEFAULT NULL,
  `approve_4_nama` varchar(255) DEFAULT NULL,
  `approve_4_image` varchar(255) DEFAULT NULL,
  `approve_4_timestamp` datetime DEFAULT NULL,
  `approve_5_nama` varchar(255) DEFAULT NULL,
  `approve_5_image` varchar(255) DEFAULT NULL,
  `approve_5_timestamp` datetime DEFAULT NULL,
  `penandatangan_nama` varchar(255) DEFAULT NULL,
  `penandatangan_jabatan` varchar(255) DEFAULT NULL,
  `penandatangan_nip` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at_digitalisasi_dppb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_dppb_detail`
--

CREATE TABLE `digitalisasi_dppb_detail` (
  `id` int(11) NOT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `no_dn` varchar(255) DEFAULT NULL,
  `no_gr` varchar(255) DEFAULT NULL,
  `kode_material` varchar(255) DEFAULT NULL,
  `nama_material` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `mu` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(255) DEFAULT NULL,
  `lokasi_pengiriman` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_evaluasi_penyelenggaraan_pelatihan`
--

CREATE TABLE `digitalisasi_evaluasi_penyelenggaraan_pelatihan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `nama_pelatihan` varchar(255) DEFAULT NULL,
  `tanggal_pelatihan_awal` date DEFAULT NULL,
  `tanggal_pelatihan_akhir` date DEFAULT NULL,
  `nama_pemateri` varchar(255) DEFAULT NULL,
  `nilai_1` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_2` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_3` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_4` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_5` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_6` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_7` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_8` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_9` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_10` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_11` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_12` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_13` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_14` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_15` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_16` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_17` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_18` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_19` enum('Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas') DEFAULT NULL,
  `nilai_20` enum('Ya','Tidak') DEFAULT NULL,
  `nilai_21` enum('Ya','Tidak') DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT 'proses',
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_form_k1`
--

CREATE TABLE `digitalisasi_form_k1` (
  `id_digitalisasi_form_k1` int(11) NOT NULL,
  `uuid_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `jenis_dokumen_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `nomor_digitalisasi_form_k1` varchar(64) DEFAULT NULL,
  `no_kas_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `no_rekening_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `no_cek_giro_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `no_kasir_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `dibayarkan_kepada_digitalisasi_form_k1` varchar(100) NOT NULL,
  `uang_sejumlah_digitalisasi_form_k1` double NOT NULL,
  `untuk_pengeluaran_digitalisasi_form_k1` varchar(200) NOT NULL,
  `verifikasi_anggaran_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `verifikasi_anggaran_timestamp_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `kadiv_keuangan_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `kadiv_keuangan_timestamp_digitalisasi_form_k1` datetime DEFAULT NULL,
  `dirkeu_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `dirkeu_timestamp_digitalisasi_form_k1` datetime DEFAULT NULL,
  `dirut_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `dirut_timestamp_digitalisasi_form_k1` datetime DEFAULT NULL,
  `akuntansi_bayar_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `akuntansi_bayar_timestamp_digitalisasi_form_k1` datetime DEFAULT NULL,
  `pejalan_dinas_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `pejalan_dinas_timestamp_digitalisasi_form_k1` datetime DEFAULT NULL,
  `akuntansi_verifikasi_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `akuntansi_verifikasi_as_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `akuntansi_verifikasi_timestamp_digitalisasi_form_k1` datetime DEFAULT NULL,
  `kode_rekening_debet_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `kode_rekening_kredit_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `kode_kegiatan_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `debet_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `kredit_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `catatan_digitalisasi_form_k1` varchar(200) DEFAULT NULL,
  `no_verifikasi_digitalisasi_form_k1` varchar(100) DEFAULT NULL,
  `status_digitalisasi_form_k1` varchar(255) DEFAULT NULL,
  `revisi_sistem_digitalisasi_form_k1` varchar(255) DEFAULT NULL,
  `delete_at_digitalisasi_form_k1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_form_k31`
--

CREATE TABLE `digitalisasi_form_k31` (
  `id_digitalisasi_form_k31` int(11) NOT NULL,
  `uuid_digitalisasi_form_k31` varchar(100) DEFAULT NULL,
  `kategori_digitalisasi_form_k31` varchar(20) NOT NULL,
  `nomor_digitalisasi_form_k31` varchar(64) NOT NULL,
  `nomor_k32_digitalisasi_form_k31` varchar(64) NOT NULL,
  `nomor_lumpsum_k1_digitalisasi_form_k31` varchar(100) DEFAULT NULL,
  `nomor_uang_muka_k1_digitalisasi_form_k31` varchar(100) DEFAULT NULL,
  `tanggal_digitalisasi_form_k31` date NOT NULL,
  `dari_digitalisasi_form_k31` varchar(100) NOT NULL,
  `lokasi_tujuan_digitalisasi_form_k31` varchar(100) NOT NULL,
  `tanggal_berangkat_digitalisasi_form_k31` date NOT NULL,
  `tanggal_pulang_digitalisasi_form_k31` date NOT NULL,
  `jumlah_hari_digitalisasi_form_k31` varchar(3) NOT NULL,
  `nama_digitalisasi_form_k31` varchar(100) NOT NULL,
  `jabatan_digitalisasi_form_k31` varchar(100) NOT NULL,
  `gol_digitalisasi_form_k31` varchar(2) NOT NULL,
  `uang_harian_digitalisasi_form_k31` double NOT NULL,
  `total_diterima_digitalisasi_form_k31` double NOT NULL,
  `diketahui_digitalisasi_form_k31` varchar(100) NOT NULL,
  `diketahui_timestamp_digitalisasi_form_k31` datetime DEFAULT NULL,
  `uang_muka_digitalisasi_form_k31` double DEFAULT NULL,
  `detail_uang_muka_digitalisasi_form_k31` varchar(255) DEFAULT NULL,
  `revisi_sistem_digitalisasi_form_k31` varchar(255) DEFAULT NULL,
  `delete_at_digitalisasi_form_k31` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_form_k32`
--

CREATE TABLE `digitalisasi_form_k32` (
  `id_digitalisasi_form_k32` int(11) NOT NULL,
  `uuid_digitalisasi_form_k32` varchar(100) DEFAULT NULL,
  `kategori_digitalisasi_form_k32` varchar(20) NOT NULL,
  `nomor_digitalisasi_form_k32` varchar(64) NOT NULL,
  `tanggal_pengajuan_digitalisasi_form_k32` timestamp NULL DEFAULT NULL,
  `kebutuhan_digitalisasi_form_k32` varchar(50) DEFAULT NULL,
  `kode_proyek_digitalisasi_form_k32` varchar(32) DEFAULT NULL,
  `nama_proyek_digitalisasi_form_k32` varchar(32) DEFAULT NULL,
  `keperluan_digitalisasi_form_k32` varchar(100) DEFAULT NULL,
  `nama_digitalisasi_form_k32` varchar(100) NOT NULL,
  `nip_digitalisasi_form_k32` varchar(20) DEFAULT NULL,
  `gol_digitalisasi_form_k32` varchar(2) NOT NULL,
  `jabatan_digitalisasi_form_k32` varchar(100) NOT NULL,
  `unit_kerja_digitalisasi_form_k32` varchar(100) NOT NULL,
  `tanggal_berangkat_digitalisasi_form_k32` date NOT NULL,
  `tanggal_pulang_digitalisasi_form_k32` date NOT NULL,
  `dari_digitalisasi_form_k32` varchar(100) NOT NULL,
  `lokasi_tujuan_digitalisasi_form_k32` varchar(100) NOT NULL,
  `cara_pembayaran_digitalisasi_form_k32` varchar(60) NOT NULL,
  `req_tiket_digitalisasi_form_k32` varchar(10) DEFAULT NULL,
  `req_akomodir_tiket_digitalisasi_form_k32` varchar(32) DEFAULT NULL,
  `req_penginapan_digitalisasi_form_k32` varchar(10) DEFAULT NULL,
  `req_akomodir_penginapan_digitalisasi_form_k32` varchar(32) DEFAULT NULL,
  `req_transport_lokal_digitalisasi_form_k32` varchar(10) DEFAULT NULL,
  `req_akomodir_transport_lokal_digitalisasi_form_k32` varchar(32) DEFAULT NULL,
  `catatan_digitalisasi_form_k32` varchar(255) DEFAULT NULL,
  `uang_muka_digitalisasi_form_k32` double NOT NULL,
  `detail_uang_muka_digitalisasi_form_k32` varchar(255) DEFAULT NULL,
  `diajukan_digitalisasi_form_k32` varchar(100) NOT NULL,
  `diajukan_timestamp_digitalisasi_form_k32` datetime DEFAULT NULL,
  `disetujui_digitalisasi_form_k32` varchar(100) NOT NULL,
  `disetujui_timestamp_digitalisasi_form_k32` datetime DEFAULT NULL,
  `timestamp_digitalisasi_form_k32` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_digitalisasi_form_k32` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_by_digitalisasi_form_k32` varchar(60) DEFAULT NULL,
  `status_digitalisasi_form_k32` varchar(32) NOT NULL,
  `create_digitalisasi_form_k32` varchar(100) DEFAULT NULL,
  `keterangan_digitalisasi_form_k32` text,
  `revisi_sistem_digitalisasi_form_k32` varchar(255) DEFAULT NULL,
  `delete_at_digitalisasi_form_k32` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_form_lembur`
--

CREATE TABLE `digitalisasi_form_lembur` (
  `id_digitalisasi_form_lembur` int(11) NOT NULL,
  `uuid_digitalisasi_form_lembur` varchar(100) DEFAULT NULL,
  `nama_digitalisasi_form_lembur` varchar(100) NOT NULL,
  `nip_digitalisasi_form_lembur` varchar(20) NOT NULL,
  `unit_kerja_digitalisasi_form_lembur` varchar(100) NOT NULL,
  `tanggal_pengajuan_digitalisasi_form_lembur` timestamp NULL DEFAULT NULL,
  `tanggal_lembur_digitalisasi_form_lembur` date NOT NULL,
  `alasan_digitalisasi_form_lembur` varchar(200) NOT NULL,
  `mulai_jam_digitalisasi_form_lembur` time NOT NULL,
  `selesai_jam_digitalisasi_form_lembur` time NOT NULL,
  `total_jam_digitalisasi_form_lembur` time NOT NULL,
  `diajukan_digitalisasi_form_lembur` varchar(100) DEFAULT NULL,
  `diajukan_timestamp_digitalisasi_form_lembur` datetime DEFAULT NULL,
  `disetujui_digitalisasi_form_lembur` varchar(100) DEFAULT NULL,
  `disetujui_timestamp_digitalisasi_form_lembur` datetime DEFAULT NULL,
  `diverifikasi_digitalisasi_form_lembur` varchar(100) DEFAULT NULL,
  `diverifikasi_timestamp_digitalisasi_form_lembur` datetime DEFAULT NULL,
  `diketahui_digitalisasi_form_lembur` varchar(100) DEFAULT NULL,
  `diketahui_timestamp_digitalisasi_form_lembur` datetime DEFAULT NULL,
  `timestamp_digitalisasi_form_lembur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_digitalisasi_form_lembur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_by_digitalisasi_form_lembur` varchar(100) NOT NULL,
  `status_digitalisasi_form_lembur` varchar(20) NOT NULL DEFAULT 'proses',
  `create_digitalisasi_form_lembur` varchar(100) NOT NULL,
  `keterangan_digitalisasi_form_lembur` varchar(100) DEFAULT NULL,
  `is_download_digitalisasi_form_lembur` int(11) DEFAULT NULL,
  `revisi_sistem_digitalisasi_form_lembur` varchar(255) DEFAULT NULL,
  `delete_at_digitalisasi_form_lembur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_gi`
--

CREATE TABLE `digitalisasi_gi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `po_spmk` enum('po','spmk') DEFAULT NULL COMMENT 'PO atau SPMK tipe',
  `no_po_spmk` varchar(255) DEFAULT NULL,
  `metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung') DEFAULT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `id_detail_dppb` int(11) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `applied_by` varchar(255) DEFAULT NULL,
  `applicant_id` varchar(255) DEFAULT NULL,
  `applicant_tel` varchar(255) DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `consignee_type` enum('internal','eksternal') DEFAULT NULL,
  `consignee_id` varchar(255) DEFAULT NULL,
  `consignee_tel` varchar(255) DEFAULT NULL,
  `carrying_mode` varchar(255) DEFAULT NULL,
  `transportation_method` varchar(255) DEFAULT NULL,
  `carrier` varchar(255) DEFAULT NULL,
  `lokasi_source` varchar(255) DEFAULT NULL,
  `start_site` varchar(255) DEFAULT NULL,
  `destination_wh` varchar(255) DEFAULT NULL,
  `source_province` varchar(255) DEFAULT NULL,
  `source_city` varchar(255) DEFAULT NULL,
  `source_regional` varchar(255) DEFAULT NULL,
  `destination_province` varchar(255) DEFAULT NULL,
  `destination_city` varchar(255) DEFAULT NULL,
  `destination_regional` varchar(255) DEFAULT NULL,
  `required_truck_type` varchar(255) DEFAULT NULL,
  `etd` varchar(255) DEFAULT NULL,
  `source_address` varchar(255) DEFAULT NULL,
  `destination_wh_address` varchar(255) DEFAULT NULL,
  `approve_1_nama` varchar(255) DEFAULT NULL,
  `approve_1_image` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` datetime DEFAULT NULL,
  `approve_2_nama` varchar(255) DEFAULT NULL,
  `approve_2_image` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` datetime DEFAULT NULL,
  `approve_3_nama` varchar(255) DEFAULT NULL,
  `approve_3_image` varchar(255) DEFAULT NULL,
  `approve_3_timestamp` datetime DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_gi_detail`
--

CREATE TABLE `digitalisasi_gi_detail` (
  `id` int(11) NOT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `no_dn` varchar(255) DEFAULT NULL,
  `no_gr` varchar(255) DEFAULT NULL,
  `kode_material` varchar(255) DEFAULT NULL,
  `nama_material` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `mu` varchar(255) DEFAULT NULL,
  `lokasi_sumber` varchar(255) DEFAULT NULL,
  `lokasi_pengiriman` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_gr`
--

CREATE TABLE `digitalisasi_gr` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_gr` varchar(255) DEFAULT NULL,
  `no_dn` varchar(255) DEFAULT NULL,
  `po_spmk` enum('po','spmk') DEFAULT NULL COMMENT 'PO atau SPMK tipe',
  `no_po_spmk` varchar(255) DEFAULT NULL,
  `metode_pengadaan` enum('pembelian langsung','pemilihan langsung','penunjukan langsung') DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `id_detail_dppb` int(11) DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `consignee_type` enum('internal','eksternal') DEFAULT NULL,
  `consignee_id` varchar(255) DEFAULT NULL,
  `consignee_tel` varchar(255) DEFAULT NULL,
  `carrying_mode` varchar(255) DEFAULT NULL,
  `transportation_method` varchar(255) DEFAULT NULL,
  `carrier` varchar(255) DEFAULT NULL,
  `destination_wh` varchar(255) DEFAULT NULL,
  `destination_province` varchar(255) DEFAULT NULL,
  `destination_city` varchar(255) DEFAULT NULL,
  `destination_regional` varchar(255) DEFAULT NULL,
  `destination_wh_address` varchar(255) DEFAULT NULL,
  `approve_1_nama` varchar(255) DEFAULT NULL,
  `approve_1_image` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` datetime DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_gr_detail`
--

CREATE TABLE `digitalisasi_gr_detail` (
  `id` int(11) NOT NULL,
  `no_dppb` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `no_dn` varchar(255) DEFAULT NULL,
  `no_gr` varchar(255) DEFAULT NULL,
  `kode_material` varchar(255) DEFAULT NULL,
  `nama_material` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `mu` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(255) DEFAULT NULL,
  `lokasi_pengiriman` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_laporan_hasil_pelatihan`
--

CREATE TABLE `digitalisasi_laporan_hasil_pelatihan` (
  `id` int(11) NOT NULL,
  `evaluasi_penyelenggaraan_pelatihan_id` int(11) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `divisi_peserta` varchar(255) DEFAULT NULL,
  `jabatan_peserta` varchar(255) DEFAULT NULL,
  `jenis_pelatihan` enum('Kompetensi','Pelatihan','Webinar/Seminar') DEFAULT NULL,
  `tempat_pelatihan` varchar(255) DEFAULT NULL,
  `tanggal_pelatihan_awal` date DEFAULT NULL,
  `tanggal_pelatihan_akhir` date DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `nama_pemateri` varchar(255) DEFAULT NULL,
  `nama_pelatihan` varchar(255) DEFAULT NULL,
  `ringkasan_materi` text,
  `manfaat_kesesuaian` text,
  `kekurangan` text,
  `kelebihan` text,
  `kritik` text,
  `saran` text,
  `dokumentasi` varchar(255) DEFAULT NULL,
  `copy_sertifikat` enum('Ada','Tidak Ada') DEFAULT NULL,
  `copy_materi` enum('hardcopy','softcopy','tidak ada') DEFAULT NULL,
  `approve_1_nama` varchar(255) DEFAULT NULL,
  `approve_1_image` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_nama` varchar(255) DEFAULT NULL,
  `approve_2_image` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_3_nama` varchar(255) DEFAULT NULL,
  `approve_3_image` varchar(255) DEFAULT NULL,
  `approve_3_timestamp` timestamp NULL DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT 'proses',
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_lpp`
--

CREATE TABLE `digitalisasi_lpp` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_lpp` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_ban` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `render_dokumen` mediumtext,
  `tanggal_pengesahan` date DEFAULT NULL,
  `ttd_manajer_nama` varchar(255) DEFAULT NULL,
  `ttd_manajer_image` varchar(255) DEFAULT NULL,
  `ttd_manajer_timestamp` timestamp NULL DEFAULT NULL,
  `ttd_kadiv_nama` varchar(255) DEFAULT NULL,
  `ttd_kadiv_image` varchar(255) DEFAULT NULL,
  `ttd_kadiv_timestamp` timestamp NULL DEFAULT NULL,
  `ttd_dirbisops_nama` varchar(255) DEFAULT NULL,
  `ttd_dirbisops_image` varchar(255) DEFAULT NULL,
  `ttd_dirbisops_timestamp` timestamp NULL DEFAULT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) NOT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_pks`
--

CREATE TABLE `digitalisasi_pks` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_pks` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_ban` varchar(255) DEFAULT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `tanggal_pks` date DEFAULT NULL,
  `tempelate_dokumen` varchar(255) DEFAULT NULL,
  `render_dokumen` mediumtext,
  `tanggal_digitalisasi` date DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `file_pks_upload` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_po`
--

CREATE TABLE `digitalisasi_po` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_ban` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `tanggal_digitalisasi` date DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `tanggal_po` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ppn` double DEFAULT NULL,
  `jumlah_ppn` double DEFAULT NULL,
  `telp_supplier` varchar(255) DEFAULT NULL,
  `cp_supplier` varchar(255) DEFAULT NULL COMMENT 'contact person',
  `id_supplier` varchar(255) NOT NULL,
  `contact_penagihan` varchar(255) DEFAULT NULL,
  `approve_1_nama` varchar(255) DEFAULT NULL,
  `approve_1_image` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_nama` varchar(255) DEFAULT NULL,
  `approve_2_image` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_jabatan` varchar(255) DEFAULT NULL,
  `render_dokumen` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_po_detail`
--

CREATE TABLE `digitalisasi_po_detail` (
  `id` int(11) NOT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `kode_barang_jasa` varchar(255) DEFAULT NULL,
  `nama_barang_jasa` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `mu` varchar(255) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_ppl`
--

CREATE TABLE `digitalisasi_ppl` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_ppl` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `render_dokumen` mediumtext,
  `deskripsi` varchar(255) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `alasan` text,
  `keterangan_ppl` text,
  `pemohon_nama` varchar(255) DEFAULT NULL,
  `pemohon_image` varchar(255) DEFAULT NULL,
  `pemohon_timestamp` timestamp NULL DEFAULT NULL,
  `disetujui_nama` varchar(255) DEFAULT NULL,
  `disetujui_image` varchar(255) DEFAULT NULL,
  `disetujui_timestamp` timestamp NULL DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_spmk`
--

CREATE TABLE `digitalisasi_spmk` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_ban` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `tanggal_digitalisasi` date DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `tanggal_spmk` date DEFAULT NULL,
  `render_dokumen` text,
  `approve_1_nama` varchar(255) DEFAULT NULL,
  `approve_1_image` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_nama` varchar(255) DEFAULT NULL,
  `approve_2_image` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_jabatan` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_spmk_detail`
--

CREATE TABLE `digitalisasi_spmk_detail` (
  `id` int(11) NOT NULL,
  `no_spmk` varchar(255) DEFAULT NULL,
  `kode_barang_jasa` varchar(255) DEFAULT NULL,
  `nama_barang_jasa` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `digitalisasi_spph`
--

CREATE TABLE `digitalisasi_spph` (
  `id` int(11) NOT NULL,
  `no_spph` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `tanggal_spph` date DEFAULT NULL,
  `cp_supplier` varchar(255) DEFAULT NULL COMMENT 'Contact Person',
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `email_supplier` text,
  `pic_spph` varchar(255) DEFAULT NULL,
  `ttd_nama` varchar(255) DEFAULT NULL,
  `ttd_image` varchar(255) DEFAULT NULL,
  `ttd_timestamp` timestamp NULL DEFAULT NULL,
  `render_dokumen` mediumtext,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` char(7) NOT NULL,
  `regency_id` char(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `delete_at_districts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_isar_survey_gt_covid`
--

CREATE TABLE `hasil_isar_survey_gt_covid` (
  `id_hasil_isar_survey_gt_covid` int(6) NOT NULL,
  `tanggal_isar_survey_gt_covid` date NOT NULL,
  `nama_isar_survey_gt_covid` varchar(100) NOT NULL,
  `nip_isar_survey_gt_covid` varchar(100) DEFAULT NULL,
  `unit_isar_survey_gt_covid` varchar(100) NOT NULL,
  `posisi_isar_survey_gt_covid` varchar(100) NOT NULL,
  `region_isar_survey_gt_covid` varchar(100) NOT NULL,
  `pertanyaan_1_isar_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_2_isar_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_3_isar_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_4_isar_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_5_isar_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_6_isar_survey_gt_covid` varchar(15) NOT NULL,
  `total_isar_survey_gt_covid` varchar(40) DEFAULT NULL,
  `klasifikasi_isar_survey_gt_covid` varchar(25) DEFAULT NULL,
  `keterangan_isar_survey_gt_covid` text,
  `create_time_stamp_isar_survey_gt_covid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_isar_survey_gt_covid` timestamp NULL DEFAULT NULL,
  `delete_at_hasil_isar_survey_gt_covid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_mingguan_survey_gt_covid`
--

CREATE TABLE `hasil_mingguan_survey_gt_covid` (
  `id_hasil_mingguan_survey_gt_covid` int(6) NOT NULL,
  `tanggal_mingguan_survey_gt_covid` date NOT NULL,
  `nama_mingguan_survey_gt_covid` varchar(100) NOT NULL,
  `nip_mingguan_survey_gt_covid` varchar(100) DEFAULT NULL,
  `unit_mingguan_survey_gt_covid` varchar(100) NOT NULL,
  `posisi_mingguan_survey_gt_covid` varchar(100) NOT NULL,
  `region_mingguan_survey_gt_covid` varchar(100) NOT NULL,
  `jenis_tempat_tinggal_mingguan_survey_gt_covid` varchar(55) DEFAULT NULL,
  `jumlah_anggota_keluarga_mingguan_survey_gt_covid` int(2) NOT NULL,
  `istri_mingguan_survey_gt_covid` int(2) NOT NULL,
  `anak_mingguan_survey_gt_covid` int(2) NOT NULL,
  `orang_tua_mingguan_survey_gt_covid` int(2) NOT NULL,
  `asisten_rumah_tangga_mingguan_survey_gt_covid` int(2) NOT NULL,
  `lainnya_mingguan_survey_gt_covid` int(2) NOT NULL,
  `kondisi_kesehatan_keluarga_mingguan_survey_gt_covid` varchar(55) DEFAULT NULL,
  `detail_kondisi_kesehatan_keluarga_mingguan_survey_gt_covid` text,
  `detail_gejala_kesehatan_keluarga_mingguan_survey_gt_covid` text,
  `pertanyaan_1_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_2_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_3_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_4_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_5_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_6_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_7_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_8_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_9_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_10_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_11_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_12_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_13_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_14_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_15_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_16_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_17_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_18_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_19_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_20_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_21_mingguan_survey_gt_covid` varchar(15) NOT NULL,
  `total_mingguan_survey_gt_covid` varchar(40) NOT NULL,
  `klasifikasi_mingguan_survey_gt_covid` varchar(25) NOT NULL,
  `create_time_stamp_mingguan_survey_gt_covid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_mingguan_survey_gt_covid` timestamp NULL DEFAULT NULL,
  `delete_at_hasil_mingguan_survey_gt_covid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_srq_29_survey_gt_covid`
--

CREATE TABLE `hasil_srq_29_survey_gt_covid` (
  `id_hasil_srq_29_survey_gt_covid` int(6) NOT NULL,
  `tanggal_srq_29_survey_gt_covid` date NOT NULL,
  `nama_srq_29_survey_gt_covid` varchar(100) NOT NULL,
  `nip_srq_29_survey_gt_covid` varchar(100) DEFAULT NULL,
  `unit_srq_29_survey_gt_covid` varchar(100) NOT NULL,
  `posisi_srq_29_survey_gt_covid` varchar(100) NOT NULL,
  `region_srq_29_survey_gt_covid` varchar(100) NOT NULL,
  `pertanyaan_1_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_2_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_3_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_4_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_5_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_6_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_7_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_8_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_9_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_10_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_11_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_12_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_13_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_14_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_15_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_16_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_17_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_18_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_19_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_20_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_21_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_22_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_23_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_24_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_25_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_26_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_27_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_28_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `pertanyaan_29_srq_29_survey_gt_covid` varchar(15) NOT NULL,
  `total_srq_29_survey_gt_covid` varchar(40) DEFAULT NULL,
  `klasifikasi_srq_29_survey_gt_covid` varchar(25) DEFAULT NULL,
  `keterangan_srq_29_survey_gt_covid` text,
  `create_time_stamp_srq_29_survey_gt_covid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_srq_29_survey_gt_covid` timestamp NULL DEFAULT NULL,
  `delete_at_hasil_srq_29_survey_gt_covid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_suhu_gt_covid`
--

CREATE TABLE `hasil_suhu_gt_covid` (
  `id_hasil_suhu_gt_covid` int(11) NOT NULL,
  `tanggal_hasil_suhu_gt_covid` date NOT NULL,
  `nama_hasil_suhu_gt_covid` varchar(100) NOT NULL,
  `suhu_pagi_hasil_suhu_gt_covid` float DEFAULT NULL,
  `time_stamp_pagi_hasil_suhu_gt_covid` time DEFAULT NULL,
  `nama_pemeriksa_pagi_hasil_suhu_gt_covid` varchar(100) DEFAULT NULL,
  `suhu_siang_hasil_suhu_gt_covid` float DEFAULT NULL,
  `time_stamp_siang_hasil_suhu_gt_covid` time DEFAULT NULL,
  `nama_pemeriksa_siang_hasil_suhu_gt_covid` varchar(100) DEFAULT NULL,
  `delete_at_hasil_suhu_gt_covid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survey_gt_covid`
--

CREATE TABLE `hasil_survey_gt_covid` (
  `id_hasil_survey_gt_covid` int(8) NOT NULL,
  `tanggal_survey_gt_covid` date NOT NULL,
  `nama_survey_gt_covid` varchar(100) NOT NULL,
  `nip_survey_gt_covid` varchar(100) DEFAULT NULL,
  `unit_kerja_survey_gt_covid` varchar(100) NOT NULL,
  `posisi_survey_gt_covid` varchar(100) NOT NULL,
  `region_survey_gt_covid` varchar(100) NOT NULL,
  `in_charge_company` varchar(100) DEFAULT NULL,
  `mode_kerja_survey_gt_covid` varchar(55) NOT NULL,
  `keterangan_survey_gt_covid` varchar(100) DEFAULT NULL,
  `lokasi_survey_gt_covid` varchar(55) NOT NULL,
  `kondisi_kesehatan_survey_gt_covid` varchar(24) NOT NULL,
  `demam_survey_gt_covid` varchar(30) DEFAULT 'tidak',
  `batuk_survey_gt_covid` varchar(30) DEFAULT 'tidak',
  `pilek_survey_gt_covid` varchar(30) DEFAULT 'tidak',
  `bersin_survey_gt_covid` varchar(30) DEFAULT 'tidak',
  `pegal_pegal_survey_gt_covid` varchar(30) DEFAULT 'tidak',
  `lainnya_survey_gt_covid` varchar(100) DEFAULT 'tidak',
  `geo_lokasi_survey_gt_covid` varchar(150) DEFAULT NULL,
  `gps_survey_gt_covid` varchar(200) DEFAULT NULL,
  `gps_akurasi_survey_gt_covid` varchar(5) DEFAULT NULL,
  `gps_ketinggian_survey_gt_covid` varchar(10) DEFAULT NULL,
  `create_timestamp_survey_gt_covid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_timestamp_survey_gt_covid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_at_hasil_survey_gt_covid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_aset`
--

CREATE TABLE `inventaris_aset` (
  `id_inventaris_aset` int(11) NOT NULL,
  `qr_inventaris_aset` varchar(32) DEFAULT NULL,
  `nama_inventaris_aset` varchar(255) DEFAULT NULL,
  `tipe_inventaris_aset` varchar(255) DEFAULT NULL,
  `nomor_seri_inventaris_aset` varchar(255) DEFAULT NULL,
  `harga_inventaris_aset` double DEFAULT NULL,
  `tanggal_pembelian_inventaris_aset` date DEFAULT NULL,
  `nama_karyawan_inventaris_aset` varchar(100) DEFAULT NULL,
  `nip_karyawan_inventaris_aset` varchar(100) DEFAULT NULL,
  `unit_kerja_inventaris_aset` varchar(100) DEFAULT NULL,
  `masa_habis_pakai_inventaris_aset` date DEFAULT NULL,
  `posisi_inventaris_aset` varchar(255) DEFAULT NULL,
  `update_by_inventaris_aset` varchar(255) DEFAULT NULL,
  `last_scan_at_inventaris_aset` timestamp NULL DEFAULT NULL,
  `last_ip_inventaris_aset` varchar(32) DEFAULT NULL,
  `last_scan_by_inventaris_aset` varchar(255) DEFAULT NULL,
  `image_inventaris_aset` varchar(255) DEFAULT NULL,
  `link_active_inventaris_aset` enum('active','invalid') DEFAULT 'active',
  `create_at_inventaris_aset` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at_inventaris_aset` timestamp NULL DEFAULT NULL,
  `delete_at_inventaris_aset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `keu_akun`
--

CREATE TABLE `keu_akun` (
  `id` int(11) NOT NULL,
  `kode_akun` varchar(255) DEFAULT NULL,
  `keterangan_akun` varchar(255) DEFAULT NULL,
  `kelompok_akun` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` varchar(255) DEFAULT NULL,
  `modify_by` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `libur_indonesia`
--

CREATE TABLE `libur_indonesia` (
  `tanggal_libur_nasional_indonesia` varchar(10) NOT NULL,
  `deskripsi_libur_nasional_indonesia` varchar(39) DEFAULT NULL,
  `status_libur_nasional_indonesia` varchar(9) DEFAULT NULL,
  `create_at_libur_nasional_indonesia` datetime DEFAULT NULL,
  `delete_at_libur_indonesia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_spesimen_paraf`
--

CREATE TABLE `log_spesimen_paraf` (
  `id_spesimen_paraf` int(11) NOT NULL,
  `uuid_spesimen_paraf` varchar(255) NOT NULL,
  `first_name_log_spesimen_paraf` varchar(100) DEFAULT NULL,
  `image_spesimen_paraf` varchar(255) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_spesimen_ttd`
--

CREATE TABLE `log_spesimen_ttd` (
  `id_spesimen_ttd` int(11) NOT NULL,
  `uuid_spesimen_ttd` varchar(255) NOT NULL,
  `first_name_log_spesimen_ttd` varchar(100) DEFAULT NULL,
  `image_spesimen_ttd` varchar(255) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_gudang`
--

CREATE TABLE `lokasi_gudang` (
  `id` int(11) NOT NULL,
  `jenis_gudang` enum('wh','serpo') DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `proyek` varchar(255) NOT NULL,
  `kode_lokasi` varchar(255) NOT NULL,
  `kode_proyek` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) NOT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota_kab` varchar(255) DEFAULT NULL,
  `regional` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected','') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_survey_gt_covid`
--

CREATE TABLE `lokasi_survey_gt_covid` (
  `id_lokasi_survery_gt_covid` int(11) NOT NULL,
  `nama_lokasi_survey_gt_covid` varchar(100) NOT NULL,
  `delete_at_ lokasi_survey_gt_covid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_kode_barang_jasa`
-- (See below for the actual view)
--
CREATE TABLE `master_kode_barang_jasa` (
`kode` varchar(255)
,`nama` varchar(255)
,`approve_status` varchar(8)
);

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_barang`
--

CREATE TABLE `pmalp_master_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_jasa`
--

CREATE TABLE `pmalp_master_jasa` (
  `id` int(11) NOT NULL,
  `kode_jasa` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_konsultan`
--

CREATE TABLE `pmalp_master_konsultan` (
  `id` int(11) NOT NULL,
  `kode_konsultan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_material`
--

CREATE TABLE `pmalp_master_material` (
  `id` int(11) NOT NULL,
  `kode_material` varchar(255) DEFAULT NULL,
  `material_kategori` int(11) DEFAULT NULL,
  `material_kelompok` int(11) DEFAULT NULL,
  `material_sub_kelompok` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `deskripsi_material` varchar(255) DEFAULT NULL,
  `stok_minimum` int(11) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_material_kategori`
--

CREATE TABLE `pmalp_master_material_kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_material_kelompok`
--

CREATE TABLE `pmalp_master_material_kelompok` (
  `id` int(11) NOT NULL,
  `kode_kelompok` varchar(255) DEFAULT NULL,
  `kelompok_kategori` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_master_material_sub_kelompok`
--

CREATE TABLE `pmalp_master_material_sub_kelompok` (
  `id` int(11) NOT NULL,
  `kode_sub_kelompok` varchar(255) DEFAULT NULL,
  `kelompok_sub_kelompok` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_sph`
--

CREATE TABLE `pmalp_sph` (
  `id` int(11) NOT NULL,
  `no_sph` varchar(255) DEFAULT NULL,
  `jenis_doc` enum('dpbj','gi') NOT NULL,
  `no_spph` varchar(255) DEFAULT NULL,
  `no_dpbj` varchar(255) DEFAULT NULL,
  `no_gi` varchar(255) DEFAULT NULL,
  `penawaran_harga` double NOT NULL,
  `file_sph` varchar(255) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `id_supplier` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` enum('proses','selesai','batal') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmalp_supplier`
--

CREATE TABLE `pmalp_supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `akta_pendirian` varchar(255) DEFAULT NULL,
  `akta_pernyataan` varchar(255) DEFAULT NULL,
  `akta_perubahan` varchar(255) DEFAULT NULL,
  `kemenkumham_pendirian` varchar(255) DEFAULT NULL,
  `kemenkumham_perubahan` varchar(255) DEFAULT NULL,
  `nib` varchar(255) DEFAULT NULL,
  `surat_domisili` varchar(255) DEFAULT NULL,
  `izin_usaha` varchar(255) DEFAULT NULL,
  `izin_usaha_konstruksi` varchar(255) DEFAULT NULL,
  `tdp` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `sppkp` varchar(255) DEFAULT NULL,
  `izin_lokasi` varchar(255) DEFAULT NULL,
  `portofolio` varchar(255) DEFAULT NULL,
  `pakta_integritas` varchar(255) DEFAULT NULL,
  `dokumen_lainnya` text,
  `approve_1_timestamp` timestamp NULL DEFAULT NULL,
  `approve_1_by` varchar(255) DEFAULT NULL,
  `approve_2_timestamp` timestamp NULL DEFAULT NULL,
  `approve_2_by` varchar(255) DEFAULT NULL,
  `approve_status` enum('waiting','listed','rejected') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portal_berita`
--

CREATE TABLE `portal_berita` (
  `id_portal_berita` int(11) NOT NULL,
  `kategori_portal_berita` varchar(255) NOT NULL,
  `judul_portal_berita` varchar(255) NOT NULL,
  `isi_portal_berita` text NOT NULL,
  `timestamp_portal_berita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attachment_portal_berita` text,
  `thumbnail_portal_berita` varchar(255) NOT NULL,
  `penulis_portal_berita` varchar(255) NOT NULL,
  `status_portal_berita` enum('DRAFT','PUBLISHED') DEFAULT NULL,
  `count_portal_berita` int(11) DEFAULT NULL,
  `create_at_portal_berita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_at_portal_berita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `delete_at_provinces` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id_qrcode` int(11) NOT NULL,
  `uuid_qrcode` varchar(100) NOT NULL,
  `jenis_dokumen_qrcode` varchar(30) NOT NULL,
  `verifikasi_qrcode` varchar(200) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_at_ qrcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) NOT NULL,
  `province_id` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `delete_at_regencies` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_appsetting`
--

CREATE TABLE `rekrutmen_appsetting` (
  `id_appsetting` int(11) NOT NULL,
  `batch_appsetting` int(4) NOT NULL,
  `tanggal_pembukaan_appsetting` datetime NOT NULL,
  `tanggal_penutupan_appsetting` datetime NOT NULL,
  `text_pengumuman_appsetting` varchar(90) DEFAULT NULL,
  `status_rekrutmen_appsetting` tinyint(1) NOT NULL DEFAULT '1',
  `last_modified_appsetting` datetime DEFAULT NULL,
  `delete_at_ rekrutmen_appsetting` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_data_pelamar`
--

CREATE TABLE `rekrutmen_data_pelamar` (
  `id_data_pelamar` int(11) NOT NULL,
  `no_registrasi_data_pelamar` varchar(15) DEFAULT NULL,
  `batch_data_pelamar` int(4) NOT NULL,
  `no_ktp_data_pelamar` varchar(16) NOT NULL,
  `nama_data_pelamar` varchar(100) NOT NULL,
  `tempat_lahir_data_pelamar` varchar(50) NOT NULL,
  `tanggal_lahir_data_pelamar` varchar(255) NOT NULL,
  `umur_data_pelamar` int(11) DEFAULT '0',
  `jenis_kelamin_data_pelamar` varchar(9) NOT NULL,
  `agama_data_pelamar` varchar(45) DEFAULT NULL,
  `no_handphone_data_pelamar` varchar(15) NOT NULL,
  `email_data_pelamar` varchar(50) NOT NULL,
  `domisili_data_pelamar` mediumtext,
  `alamat_asli_data_pelamar` mediumtext,
  `foto_url_data_pelamar` varchar(100) NOT NULL,
  `cv_url_data_pelamar` varchar(100) NOT NULL,
  `kode_posisi_data_pelamar` varchar(10) NOT NULL,
  `universitas_data_pelamar` varchar(100) DEFAULT NULL,
  `jurusan_data_pelamar` varchar(100) DEFAULT NULL,
  `jenjang_data_pelamar` varchar(4) DEFAULT NULL,
  `ipk_data_pelamar` decimal(4,2) DEFAULT NULL,
  `tahun_ijazah_data_pelamar` year(4) DEFAULT NULL,
  `no_ijazah_data_pelamar` varchar(100) DEFAULT NULL,
  `sedang_kuliah_data_pelamar` varchar(32) NOT NULL,
  `pengalaman_kerja_data_pelamar` mediumtext,
  `pengalaman_lainnya_data_pelamar` longtext,
  `status_pengalaman_data_pelamar` varchar(25) DEFAULT NULL,
  `status_perkawinan_data_pelamar` varchar(30) NOT NULL,
  `info_loker_data_pelamar` varchar(45) NOT NULL,
  `konfirmasi_data_pelamar` tinyint(4) NOT NULL DEFAULT '0',
  `administrasi_data_pelamar` int(4) DEFAULT NULL,
  `tertulis_data_pelamar` int(4) DEFAULT NULL,
  `wawancara_data_pelamar` int(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `delete_at_ rekrutmen_data_pelamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_data_pendidikan`
--

CREATE TABLE `rekrutmen_data_pendidikan` (
  `id` int(11) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `jenjang` varchar(2) NOT NULL,
  `ipk` decimal(10,2) DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL,
  `no_ijazah` varchar(20) DEFAULT NULL,
  `data_pelamar_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `delete_at_ rekrutmen_data_pendidikan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_data_test_online`
--

CREATE TABLE `rekrutmen_data_test_online` (
  `id_data_test_online` int(8) NOT NULL,
  `no_registrasi_data_test_online` varchar(100) NOT NULL,
  `batch_data_test_online` int(4) NOT NULL,
  `tanggal_data_test_online` datetime DEFAULT NULL,
  `nama_data_test_online` varchar(100) DEFAULT NULL,
  `email_data_test_online` varchar(100) DEFAULT NULL,
  `no_ktp_data_test_online` varchar(32) DEFAULT NULL,
  `start_time_psikologi` timestamp NULL DEFAULT NULL,
  `create_time_stamp_psikologi` timestamp NULL DEFAULT NULL,
  `end_time_psikologi` timestamp NULL DEFAULT NULL,
  `start_time_pilihan_ganda` timestamp NULL DEFAULT NULL,
  `create_time_stamp_pilihan_ganda` timestamp NULL DEFAULT NULL,
  `end_time_pilihan_ganda` timestamp NULL DEFAULT NULL,
  `start_time_essay` timestamp NULL DEFAULT NULL,
  `create_time_stamp_essay` timestamp NULL DEFAULT NULL,
  `end_time_essay` timestamp NULL DEFAULT NULL,
  `pertanyaan_1_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_2_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_3_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_4_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_5_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_6_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_7_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_8_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_9_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_10_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_11_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_12_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_13_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_14_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_15_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_16_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_17_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_18_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_19_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_20_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_21_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_22_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_23_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_24_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_25_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_26_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_27_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_28_psikologi` varchar(15) DEFAULT NULL,
  `pertanyaan_29_psikologi` varchar(15) DEFAULT NULL,
  `total_psikologi` varchar(40) DEFAULT NULL,
  `klasifikasi_psikologi` varchar(25) DEFAULT NULL,
  `keterangan_psikologi` text,
  `pertanyaan_1_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_2_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_3_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_4_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_5_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_6_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_7_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_8_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_9_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_10_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_11_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_12_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_13_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_14_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_15_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_16_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_17_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_18_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_19_pilihan_ganda` varchar(15) DEFAULT NULL,
  `pertanyaan_20_pilihan_ganda` varchar(15) DEFAULT NULL,
  `total_pilihan_ganda` varchar(40) DEFAULT NULL,
  `klasifikasi_pilihan_ganda` varchar(25) DEFAULT NULL,
  `keterangan_pilihan_ganda` text,
  `pertanyaan_essay` text,
  `modify_psikologi` timestamp NULL DEFAULT NULL,
  `modify_pilihan_ganda` timestamp NULL DEFAULT NULL,
  `modify_essay` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_at_ rekrutmen_data_test_online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_setup_jurusan`
--

CREATE TABLE `rekrutmen_setup_jurusan` (
  `id_setup_jurusan` int(11) NOT NULL,
  `nama_setup_jurusan` varchar(100) NOT NULL,
  `batch_setup_jurusan` int(4) DEFAULT NULL,
  `kode_jurusan_setup_jurusan` varchar(10) DEFAULT NULL,
  `isActive_setup_jurusan` tinyint(1) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `last_modified` varchar(255) DEFAULT NULL,
  `delete_at_ rekrutmen_setup_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_setup_pendidikan`
--

CREATE TABLE `rekrutmen_setup_pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenjang` varchar(10) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `delete_at_ rekrutmen_setup_pendidikan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_setup_posisi`
--

CREATE TABLE `rekrutmen_setup_posisi` (
  `id` int(11) NOT NULL,
  `nama_setup_posisi` varchar(100) NOT NULL,
  `batch_setup_posisi` int(4) NOT NULL,
  `kode_posisi_setup_posisi` varchar(10) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `delete_at_ rekrutmen_setup_posisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_setup_universitas`
--

CREATE TABLE `rekrutmen_setup_universitas` (
  `id` int(11) NOT NULL,
  `kode_negara` varchar(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `singkatan` varchar(55) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `last_modified` varchar(255) DEFAULT NULL,
  `delete_at_ rekrutmen_setup_universitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen_test_online_setting`
--

CREATE TABLE `rekrutmen_test_online_setting` (
  `id` int(11) NOT NULL,
  `tanggal_pembukaan_test` datetime NOT NULL,
  `tanggal_penutupan_test` datetime NOT NULL,
  `text_pengumuman_open_test` varchar(90) DEFAULT NULL,
  `text_pengumuman_close_test` varchar(90) DEFAULT NULL,
  `status_rekrutmen_test` tinyint(1) NOT NULL DEFAULT '1',
  `last_modified_test` datetime DEFAULT NULL,
  `delete_at_ rekrutmen_test_online_setting` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routing`
--

CREATE TABLE `routing` (
  `id` int(11) NOT NULL,
  `nama_routing` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `fk_groups` mediumint(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_bagian_organisasi`
--

CREATE TABLE `setup_bagian_organisasi` (
  `id_setup_bagian_organisasi` int(11) NOT NULL,
  `nama_setup_bagian_organisasi` varchar(100) NOT NULL,
  `nama_view_setup_bagian_organisasi` varchar(100) NOT NULL,
  `delete_at_setup_bagian_organisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_bidang_kerja`
--

CREATE TABLE `setup_bidang_kerja` (
  `id_setup_bidang_kerja` int(11) NOT NULL,
  `nama_setup_bidang_kerja` varchar(100) NOT NULL,
  `nama_view_setup_bidang_kerja` varchar(100) NOT NULL,
  `delete_at_setup_bidang_kerja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_direktorat_organisasi`
--

CREATE TABLE `setup_direktorat_organisasi` (
  `id_setup_direktorat_organisasi` int(11) NOT NULL,
  `nama_setup_direktorat_organisasi` varchar(100) NOT NULL,
  `nama_view_setup_direktorat_organisasi` varchar(100) NOT NULL,
  `delete_at_setup_direktorat_organisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_divisi_organisasi`
--

CREATE TABLE `setup_divisi_organisasi` (
  `id_setup_divisi_organisasi` int(11) NOT NULL,
  `nama_setup_divisi_organisasi` varchar(100) NOT NULL,
  `nama_view_setup_divisi_organisasi` varchar(100) NOT NULL,
  `delete_at_setup_divisi_organisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_fungsional`
--

CREATE TABLE `setup_fungsional` (
  `id_setup_fungsional` int(11) NOT NULL,
  `nama_setup_fungsional` varchar(255) NOT NULL,
  `data_setup_fungsional` double NOT NULL,
  `keterangan_entry_setup_fungsional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_golongan_organisasi`
--

CREATE TABLE `setup_golongan_organisasi` (
  `id_setup_golongan_organisasi` int(11) NOT NULL,
  `nama_setup_golongan_organisasi` varchar(100) NOT NULL,
  `nama_view_setup_golongan_organisasi` varchar(100) NOT NULL,
  `delete_at_setup_golongan_organisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_grade`
--

CREATE TABLE `setup_grade` (
  `id_setup_grade` int(11) NOT NULL,
  `data_grade_setup_grade` int(11) NOT NULL,
  `gaji_pokok_setup_grade` double NOT NULL,
  `tunjangan_perumahan_setup_grade` double NOT NULL,
  `tunjangan_transport` double NOT NULL,
  `tunjangan_kehadiran` double NOT NULL,
  `total_gaji_dasar` double NOT NULL,
  `keterangan_entry_setup_grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_jabatan_organisasi`
--

CREATE TABLE `setup_jabatan_organisasi` (
  `id_setup_jabatan_organisasi` int(11) NOT NULL,
  `nama_setup_jabatan_organisasi` varchar(100) NOT NULL,
  `nama_view_setup_jabatan_organisasi` varchar(100) NOT NULL,
  `delete_at_setup_jabatan_organisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_job_level`
--

CREATE TABLE `setup_job_level` (
  `id_setup_job_level` int(11) NOT NULL,
  `nama_setup_job_level` varchar(100) NOT NULL,
  `nama_view_setup_job_level` varchar(100) NOT NULL,
  `delete_at_setup_job_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_kategori_surat`
--

CREATE TABLE `setup_kategori_surat` (
  `id_setup_kategori_surat` int(3) NOT NULL,
  `nama_kategori_surat` varchar(100) NOT NULL,
  `delete_at_ setup_kategori_surat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_kode_divisi_unit_kerja`
--

CREATE TABLE `setup_kode_divisi_unit_kerja` (
  `id_kode_divisi_unit_kerja` int(11) NOT NULL,
  `nama_kode_divisi_unit_kerja` varchar(100) DEFAULT NULL,
  `nama_divisi_unit_kerja` varchar(100) DEFAULT NULL,
  `nama_sub_divisi_unit_kerja` varchar(100) DEFAULT NULL,
  `delete_at_setup_kode_divisi_unit_kerja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_level_struktur`
--

CREATE TABLE `setup_level_struktur` (
  `id_setup_level_struktur` int(2) NOT NULL,
  `nama_level_struktur` varchar(64) NOT NULL,
  `tingkat_level_struktur` int(2) NOT NULL,
  `atasan_level_struktur` varchar(64) NOT NULL,
  `delete_at_ setup_level_struktur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_modul`
--

CREATE TABLE `setup_modul` (
  `id_setup_modul` int(11) NOT NULL,
  `nama_setup_modul` varchar(100) DEFAULT NULL,
  `first_name_setup_modul` varchar(100) DEFAULT NULL,
  `keterangan_setup_modul` varchar(100) DEFAULT NULL,
  `delete_at_setup_modul` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_organ_perusahaan`
--

CREATE TABLE `setup_organ_perusahaan` (
  `id_setup_organ_perusahaan` int(11) NOT NULL,
  `nama_setup_organ_perusahaan` varchar(100) NOT NULL,
  `nama_view_setup_organ_perusahaan` varchar(100) NOT NULL,
  `delete_at_setup_organ_perusahaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_posisi`
--

CREATE TABLE `setup_posisi` (
  `id_setup_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(55) NOT NULL,
  `delete_at_ setup_posisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_rekening_bank`
--

CREATE TABLE `setup_rekening_bank` (
  `id_setup_rekening_bank` int(11) NOT NULL,
  `nip_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `nama_rekening_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `nama_bank_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `kode_bank_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `no_rekening_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `no_rekening_detaill_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `keterangan_setup_rekening_bank` varchar(100) DEFAULT NULL,
  `delete_at_setup_rekening_bank` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_status_karyawan`
--

CREATE TABLE `setup_status_karyawan` (
  `id_setup_status_karyawan` int(11) NOT NULL,
  `nama_setup_status_karyawan` varchar(100) NOT NULL,
  `nama_view_setup_status_karyawan` varchar(100) NOT NULL,
  `delete_at_setup_status_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_tarif_perjalanan_dinas_dalam_negeri`
--

CREATE TABLE `setup_tarif_perjalanan_dinas_dalam_negeri` (
  `id_setup_tarif_perjalanan_dinas_dalam_negeri` int(11) NOT NULL,
  `golongan_setup_tarif_perjalanan_dinas_dalam_negeri` varchar(32) NOT NULL,
  `uang_makan_saku_setup_tarif_perjalanan_dinas_dalam_negeri` double NOT NULL,
  `delete_at_setup_tarif_perjalanan_dinas_dalam_negeri` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setup_unit_kerja`
--

CREATE TABLE `setup_unit_kerja` (
  `id_setup_unit_kerja` int(11) NOT NULL,
  `nama_setup_unit_kerja` varchar(100) NOT NULL,
  `nama_view_setup_unit_kerja` varchar(100) NOT NULL,
  `delete_at_setup_unit_kerja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_visits`
--

CREATE TABLE `site_visits` (
  `id_site_visits` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `visitor_organic` int(11) NOT NULL,
  `page_counter` int(11) NOT NULL,
  `mobile_visits` int(11) NOT NULL,
  `browser_visits` int(11) NOT NULL,
  `robot_visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_opname`
--

CREATE TABLE `stock_opname` (
  `id` int(11) NOT NULL,
  `kode_stock` varchar(255) NOT NULL,
  `kode_material` varchar(255) DEFAULT NULL,
  `nama_material` varchar(255) DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `stock_temp` double DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `kode_lokasi` varchar(255) DEFAULT NULL,
  `lokasi_proyek` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_opname_log`
--

CREATE TABLE `stock_opname_log` (
  `id` int(11) NOT NULL,
  `kode_stock` varchar(255) DEFAULT NULL,
  `kategori_log` enum('in','out') DEFAULT NULL COMMENT 'in-out',
  `jumlah` int(11) DEFAULT NULL,
  `jumlah_temp` int(11) DEFAULT NULL,
  `jenis_log` enum('initial','GI','DN','GR','M-U') DEFAULT NULL,
  `detail_log` varchar(255) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `dokumen_pendukung` varchar(255) DEFAULT NULL,
  `lokasi_source` varchar(255) DEFAULT NULL,
  `lokasi_destination` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(255) DEFAULT NULL,
  `modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi_sistem` varchar(255) DEFAULT NULL,
  `delete_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi_perjalanan_dinas`
--

CREATE TABLE `struktur_organisasi_perjalanan_dinas` (
  `id_struktur_organisasi_perjalanan_dinas` int(11) NOT NULL,
  `nama_struktur_organisasi_perjalanan_dinas` varchar(100) NOT NULL,
  `boss_struktur_organisasi_perjalanan_dinas` varchar(100) DEFAULT NULL,
  `golongan_struktur_organisasi_perjalanan_dinas` varchar(100) DEFAULT NULL,
  `jabatan_struktur_organisasi_perjalanan_dinas` varchar(100) DEFAULT NULL,
  `delete_at_struktur_organisasi_perjalanan_dinas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi_perjalanan_dinas_copy`
--

CREATE TABLE `struktur_organisasi_perjalanan_dinas_copy` (
  `id_struktur_organisasi_perjalanan_dinas` int(11) NOT NULL,
  `nama_struktur_organisasi_perjalanan_dinas` varchar(100) NOT NULL,
  `boss_struktur_organisasi_perjalanan_dinas` varchar(100) DEFAULT NULL,
  `golongan_struktur_organisasi_perjalanan_dinas` varchar(100) DEFAULT NULL,
  `jabatan_struktur_organisasi_perjalanan_dinas` varchar(100) DEFAULT NULL,
  `delete_at_struktur_organisasi_perjalanan_dinas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(5) NOT NULL,
  `nomor_surat` varchar(32) NOT NULL,
  `grup_surat` varchar(70) NOT NULL,
  `kategori_surat` varchar(100) NOT NULL,
  `perihal_surat` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `yang_meminta_surat` varchar(200) DEFAULT NULL,
  `penandatanganan_surat` varchar(200) DEFAULT NULL,
  `kepada_surat` varchar(200) DEFAULT NULL,
  `tembusan_surat` varchar(200) DEFAULT NULL,
  `dikirim_surat` varchar(24) DEFAULT NULL,
  `status_surat` int(2) NOT NULL,
  `nama_file_surat` varchar(255) NOT NULL,
  `create_by_surat` varchar(55) NOT NULL,
  `create_timestamp_surat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by_surat` varchar(55) NOT NULL,
  `modify_timestamp_surat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lock_surat` int(1) NOT NULL,
  `delete_at_ surat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `last_user_agent` varchar(100) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `nomor_rek_bank` varchar(100) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `boss` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `dump_phone` varchar(20) DEFAULT NULL,
  `job_level` varchar(40) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `region` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `alamat_provinsi` varchar(255) DEFAULT NULL,
  `alamat_kota` varchar(255) DEFAULT NULL,
  `in_charge_company` enum('LTI','MKU','EGS','JSP') DEFAULT NULL,
  `gol_pejalan_dinas` varchar(2) DEFAULT NULL,
  `organ_perusahaan` varchar(25) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(75) DEFAULT NULL,
  `bidang_kerja` varchar(100) DEFAULT NULL,
  `mulai_kerja` date DEFAULT NULL,
  `akhir_kerja` date DEFAULT NULL,
  `status_karyawan` varchar(35) DEFAULT NULL,
  `status_aktif` tinyint(1) UNSIGNED DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `no_npwp` varchar(25) DEFAULT NULL,
  `jumlah_tanggungan` tinyint(3) UNSIGNED DEFAULT NULL,
  `detail_tanggungan` varchar(5) DEFAULT NULL,
  `tingkat_pendidikan` enum('S3','S2','S1','D4','D3','SLTA/SMK','lain-lain') DEFAULT NULL,
  `bidang_pendidikan` varchar(100) DEFAULT NULL,
  `email_lentelko` varchar(50) DEFAULT NULL,
  `telp` varchar(16) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `keterangan_status` varchar(200) DEFAULT NULL,
  `foto_karyawan` varchar(100) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Konghucu') DEFAULT NULL,
  `delete_at_karyawan` int(11) DEFAULT NULL,
  `kemeja_user` varchar(255) DEFAULT NULL,
  `polo_user` varchar(255) DEFAULT NULL,
  `celana_user` varchar(255) DEFAULT NULL,
  `penggunaan_outlook` varchar(255) DEFAULT NULL,
  `email_backup` varchar(255) DEFAULT NULL,
  `fitur_calendar` varchar(255) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `jumlah_keluarga_inti` int(11) DEFAULT NULL,
  `riwayat_ayana` varchar(255) DEFAULT NULL,
  `hadir_offline_ayana` varchar(255) DEFAULT NULL,
  `prokes_offline_ayana` varchar(255) DEFAULT NULL,
  `hadir_online_zoom` varchar(255) DEFAULT NULL,
  `survey_vaksin_lansia` varchar(255) DEFAULT NULL,
  `survey_sudah_vaksin` varchar(255) DEFAULT NULL,
  `gaji_dasar` double DEFAULT NULL,
  `spesimen_ttd` varchar(255) DEFAULT NULL,
  `spesimen_paraf` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `tingkat_setuju` int(1) DEFAULT NULL,
  `alasan_tidak_setuju` text,
  `pilihan_syarat` varchar(255) DEFAULT NULL,
  `keterangan_syarat` varchar(255) DEFAULT NULL,
  `saran_survey` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_data_keluarga`
--

CREATE TABLE `users_data_keluarga` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `hubungan_keluarga` enum('Ayah','Ibu','Suami','Istri','Anak','Kakek','Nenek','Cucu') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `agama` enum('ISLAM','Kristen','Katolik','Hindu','Budha','Konghucu') DEFAULT NULL,
  `pendidikan` enum('S3 atau setara','S2 atau setara','S1 atau setara','Diploma I-III atau setara','SMA atau setara','SMP atau setara','SD atau setara','belum atau tidak sekolah') DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `golongan_darah` enum('A','B','AB','O') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_fungsional`
--

CREATE TABLE `users_fungsional` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `level_fungsional` varchar(255) DEFAULT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `terakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_grade`
--

CREATE TABLE `users_grade` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `no_sk` varchar(255) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `terakhir` date DEFAULT NULL,
  `evaluasi_berikutnya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_notifications`
--

CREATE TABLE `users_notifications` (
  `id_users_notifications` int(11) NOT NULL,
  `nama_users_notifications` varchar(100) DEFAULT NULL,
  `nip_users_notifications` varchar(100) DEFAULT NULL,
  `user_id_users_notifications` varchar(100) DEFAULT NULL,
  `device_os_users_notifications` varchar(100) DEFAULT NULL,
  `device_type_users_notifications` varchar(100) DEFAULT NULL,
  `device_model_users_notifications` varchar(100) DEFAULT NULL,
  `tags_users_notifications` varchar(255) DEFAULT NULL,
  `create_at_users_notifications` varchar(255) DEFAULT NULL,
  `last_active_users_notifications` varchar(255) DEFAULT NULL,
  `badge_count_users_notifications` int(11) DEFAULT NULL,
  `session_count_users_notifications` int(11) DEFAULT NULL,
  `identifier_users_notifications` varchar(255) DEFAULT NULL,
  `delete_at_ users_notifications` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_pelatihan`
--

CREATE TABLE `users_pelatihan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nama_pelatihan` varchar(255) DEFAULT NULL,
  `lembaga_pelatihan` varchar(255) DEFAULT NULL,
  `kota_pelatihan` varchar(255) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_pendidikan`
--

CREATE TABLE `users_pendidikan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `jenjang` varchar(255) DEFAULT NULL,
  `lembaga_pendidikan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `spesialisasi` enum('Teknik','Non Teknik','') DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_pengalaman_kerja`
--

CREATE TABLE `users_pengalaman_kerja` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `pengalaman_sebagai` varchar(255) DEFAULT NULL,
  `lembaga` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_pengalaman_tugas`
--

CREATE TABLE `users_pengalaman_tugas` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `kode_proyek` varchar(255) DEFAULT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `kualifikasi` varchar(255) DEFAULT NULL,
  `mulai_proyek` date DEFAULT NULL,
  `akhir_proyek` date DEFAULT NULL,
  `detail_tugas` varchar(255) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_sertifikasi`
--

CREATE TABLE `users_sertifikasi` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nama_sertifikasi` varchar(255) DEFAULT NULL,
  `lembaga_sertifikasi` varchar(255) DEFAULT NULL,
  `nomor_sertifikasi` varchar(255) DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_unit_kerja`
--

CREATE TABLE `users_unit_kerja` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nama_unit_kerja` varchar(255) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `terakhir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `_dump_karyawan`
--

CREATE TABLE `_dump_karyawan` (
  `id_karyawan` smallint(3) UNSIGNED NOT NULL,
  `NIK` varchar(8) DEFAULT NULL,
  `organ_perusahaan` varchar(25) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(75) DEFAULT NULL,
  `job_level_karyawan` varchar(50) DEFAULT NULL,
  `unit_kerja_karyawan` varchar(50) DEFAULT NULL,
  `bidang_kerja` varchar(100) DEFAULT NULL,
  `mulai_kerja` date DEFAULT '1999-12-31',
  `akhir_kerja` date DEFAULT NULL,
  `status_pekerjaan` varchar(35) DEFAULT NULL,
  `status_aktif` tinyint(1) UNSIGNED DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT '1999-12-31',
  `no_npwp` varchar(25) DEFAULT NULL,
  `jumlah_tanggungan` tinyint(3) UNSIGNED DEFAULT NULL,
  `detail_tanggungan` varchar(5) DEFAULT NULL,
  `tingkat_pendidikan` varchar(9) DEFAULT NULL,
  `bidang_pendidikan` varchar(100) DEFAULT NULL,
  `email_lentelko` varchar(50) DEFAULT NULL,
  `telp` varchar(16) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `keterangan_status` varchar(200) DEFAULT NULL,
  `foto_karyawan` varchar(100) NOT NULL,
  `delete_at_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `_dump_karyawan_struktur`
--

CREATE TABLE `_dump_karyawan_struktur` (
  `id_karyawan_struktur` int(11) NOT NULL,
  `nip_karyawan_struktur` varchar(8) NOT NULL,
  `nama_karyawan_struktur` varchar(100) NOT NULL,
  `nip_atasan_karyawan_struktur` varchar(8) DEFAULT NULL,
  `nama_atasan_karyawan_struktur` varchar(100) DEFAULT NULL,
  `karyawan_level_struktur` int(2) NOT NULL,
  `jenis_karyawan_struktur` varchar(30) NOT NULL DEFAULT 'Fungsional',
  `delete_at_ karyawan_struktur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `approval_logistik`
--
DROP TABLE IF EXISTS `approval_logistik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `approval_logistik`  AS SELECT `digitalisasi_dppb`.`create_by` AS `create_by`, `digitalisasi_dppb`.`no_dppb` AS `no_dppb`, `digitalisasi_gi`.`no_gi` AS `no_gi`, `digitalisasi_dppb`.`status` AS `status`, `digitalisasi_dppb`.`approve_1_timestamp` AS `dppb_approve_1`, `digitalisasi_dppb`.`approve_2_timestamp` AS `dppb_approve_2`, `digitalisasi_dppb`.`approve_3_timestamp` AS `dppb_approve_3`, `digitalisasi_dppb`.`approve_4_timestamp` AS `dppb_approve_4`, `digitalisasi_dppb`.`approve_5_timestamp` AS `dppb_approve_5`, `digitalisasi_gi`.`approve_1_timestamp` AS `dppb_approve_6`, `digitalisasi_gi`.`approve_2_timestamp` AS `dppb_approve_7`, `digitalisasi_gi`.`approve_3_timestamp` AS `dppb_approve_8`, `digitalisasi_gi`.`metode_pengadaan` AS `metode_pengadaan`, `digitalisasi_gi`.`carrying_mode` AS `carrying_mode`, `digitalisasi_gi`.`status` AS `gi_status`, `digitalisasi_dn`.`status` AS `dn_status`, `digitalisasi_dppb`.`delete_at_digitalisasi_dppb` AS `delete_at_digitalisasi_dppb` FROM ((`digitalisasi_dppb` left join `digitalisasi_gi` on((`digitalisasi_dppb`.`no_dppb` = `digitalisasi_gi`.`no_dppb`))) left join `digitalisasi_dn` on((`digitalisasi_dppb`.`no_dppb` = `digitalisasi_dn`.`no_dppb`))) ;

-- --------------------------------------------------------

--
-- Structure for view `approval_pengadaan`
--
DROP TABLE IF EXISTS `approval_pengadaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `approval_pengadaan`  AS SELECT `digitalisasi_dpbj`.`no_dpbj` AS `no_dpbj`, `digitalisasi_dpbj`.`po_spmk` AS `po_spmk`, `digitalisasi_dpbj`.`status` AS `status`, `digitalisasi_dpbj`.`metode_pengadaan` AS `metode_pengadaan`, `digitalisasi_dpbj`.`yang_meminta_timestamp` AS `dpbj_approve_1`, `digitalisasi_dpbj`.`yang_menyetujui_timestamp` AS `dpbj_approve_2`, `digitalisasi_ppl`.`pemohon_timestamp` AS `ppl_approve_1`, `digitalisasi_ppl`.`disetujui_timestamp` AS `ppl_approve_2`, `digitalisasi_spph`.`ttd_timestamp` AS `spph_approve_1`, `digitalisasi_po`.`approve_1_timestamp` AS `po_approve_1`, `digitalisasi_spmk`.`approve_1_timestamp` AS `spmk_approve_1`, `digitalisasi_lpp`.`ttd_manajer_timestamp` AS `lpp_approve_1`, `digitalisasi_lpp`.`ttd_kadiv_timestamp` AS `lpp_approve_2`, `digitalisasi_lpp`.`ttd_dirbisops_timestamp` AS `lpp_approve_3`, `digitalisasi_dpbj`.`delete_at_digitalisasi_dpbj` AS `delete_at_digitalisasi_dpbj` FROM ((((((((`digitalisasi_dpbj` left join `digitalisasi_ppl` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_ppl`.`no_dpbj`))) left join `digitalisasi_spph` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_spph`.`no_dpbj`))) left join `pmalp_sph` on((`digitalisasi_dpbj`.`no_dpbj` = `pmalp_sph`.`no_dpbj`))) left join `digitalisasi_ban` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_ban`.`no_dpbj`))) left join `digitalisasi_po` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_po`.`no_dpbj`))) left join `digitalisasi_spmk` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_spmk`.`no_dpbj`))) left join `digitalisasi_lpp` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_lpp`.`no_dpbj`))) left join `digitalisasi_pks` on((`digitalisasi_dpbj`.`no_dpbj` = `digitalisasi_pks`.`no_dpbj`))) ;

-- --------------------------------------------------------

--
-- Structure for view `approval_pengadaan_logistik`
--
DROP TABLE IF EXISTS `approval_pengadaan_logistik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `approval_pengadaan_logistik`  AS SELECT `digitalisasi_gi`.`no_gi` AS `no_gi`, `digitalisasi_gi`.`po_spmk` AS `po_spmk`, `digitalisasi_gi`.`status` AS `status`, `digitalisasi_gi`.`metode_pengadaan` AS `metode_pengadaan`, `digitalisasi_gi`.`approve_1_timestamp` AS `gi_approve_1`, `digitalisasi_gi`.`approve_2_timestamp` AS `gi_approve_2`, `digitalisasi_gi`.`approve_3_timestamp` AS `gi_approve_3`, `digitalisasi_ppl`.`pemohon_timestamp` AS `ppl_approve_1`, `digitalisasi_ppl`.`disetujui_timestamp` AS `ppl_approve_2`, `digitalisasi_spph`.`ttd_timestamp` AS `spph_approve_1`, `digitalisasi_po`.`approve_1_timestamp` AS `po_approve_1`, `digitalisasi_spmk`.`approve_1_timestamp` AS `spmk_approve_1`, `digitalisasi_lpp`.`ttd_manajer_timestamp` AS `lpp_approve_1`, `digitalisasi_lpp`.`ttd_kadiv_timestamp` AS `lpp_approve_2`, `digitalisasi_lpp`.`ttd_dirbisops_timestamp` AS `lpp_approve_3`, `digitalisasi_gi`.`delete_at` AS `delete_at_digitalisasi_gi` FROM ((((((((`digitalisasi_gi` left join `digitalisasi_ppl` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_ppl`.`no_gi`))) left join `digitalisasi_spph` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_spph`.`no_gi`))) left join `pmalp_sph` on((`digitalisasi_gi`.`no_gi` = `pmalp_sph`.`no_gi`))) left join `digitalisasi_ban` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_ban`.`no_gi`))) left join `digitalisasi_po` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_po`.`no_gi`))) left join `digitalisasi_spmk` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_spmk`.`no_gi`))) left join `digitalisasi_lpp` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_lpp`.`no_gi`))) left join `digitalisasi_pks` on((`digitalisasi_gi`.`no_gi` = `digitalisasi_pks`.`no_gi`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_dpbj_join`
--
DROP TABLE IF EXISTS `detail_dpbj_join`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_dpbj_join`  AS SELECT `detail`.`kode_barang_jasa` AS `kode_barang_jasa`, `detail`.`nama_barang_jasa` AS `nama_barang_jasa`, `detail`.`jumlah` AS `jumlah_barang_jasa`, `detail`.`satuan` AS `satuan`, `detail`.`mu` AS `mu`, `detail`.`harga_satuan` AS `harga_satuan`, `detail`.`total` AS `total`, `MASTER`.`id` AS `id`, `MASTER`.`uuid` AS `uuid`, `MASTER`.`no_dpbj` AS `no_dpbj`, `MASTER`.`kode_proyek` AS `kode_proyek`, `MASTER`.`tanggal_pengajuan` AS `tanggal_pengajuan`, `MASTER`.`tanggal_dibutuhkan` AS `tanggal_dibutuhkan`, `MASTER`.`yang_membuat` AS `yang_membuat`, `MASTER`.`unit_kerja` AS `unit_kerja`, `MASTER`.`kode_kegiatan` AS `kode_kegiatan`, `MASTER`.`jumlah` AS `jumlah`, `MASTER`.`termasuk_ppn` AS `termasuk_ppn`, `MASTER`.`jumlah_ppn` AS `jumlah_ppn`, `MASTER`.`yang_meminta_nama` AS `yang_meminta_nama`, `MASTER`.`yang_meminta_image` AS `yang_meminta_image`, `MASTER`.`yang_meminta_timestamp` AS `yang_meminta_timestamp`, `MASTER`.`yang_menyetujui_nama` AS `yang_menyetujui_nama`, `MASTER`.`yang_menyetujui_image` AS `yang_menyetujui_image`, `MASTER`.`yang_menyetujui_timestamp` AS `yang_menyetujui_timestamp`, `MASTER`.`file_tor` AS `file_tor`, `MASTER`.`metode_pengadaan` AS `metode_pengadaan`, `MASTER`.`timestamp` AS `timestamp`, `MASTER`.`create_by` AS `create_by`, `MASTER`.`modify` AS `modify`, `MASTER`.`modify_by` AS `modify_by`, `MASTER`.`status` AS `status`, `MASTER`.`keterangan` AS `keterangan`, `MASTER`.`revisi_sistem` AS `revisi_sistem`, `MASTER`.`delete_at_digitalisasi_dpbj` AS `delete_at_digitalisasi_dpbj` FROM (`digitalisasi_dpbj_detail` `detail` join `digitalisasi_dpbj` `MASTER` on((`MASTER`.`no_dpbj` = `detail`.`no_dpbj`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_dppb_join`
--
DROP TABLE IF EXISTS `detail_dppb_join`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_dppb_join`  AS SELECT `GI`.`no_po_spmk` AS `no_po_spmk`, `LOKASI`.`proyek` AS `nama_proyek`, `LOKASI`.`kode_lokasi` AS `kode_lokasi`, `LOKASI`.`kode_proyek` AS `kode_proyek`, `LOKASI`.`lokasi` AS `lokasi`, `LOKASI`.`alamat` AS `alamat`, `detail`.`no_po` AS `no_po`, `detail`.`no_gi` AS `no_gi`, `detail`.`no_dn` AS `no_dn`, `detail`.`no_gr` AS `no_gr`, `detail`.`kode_material` AS `kode_material`, `detail`.`nama_material` AS `nama_material`, `detail`.`satuan` AS `satuan`, `detail`.`jumlah` AS `jumlah_material`, `detail`.`lokasi_pengiriman` AS `lokasi_pengiriman`, `detail`.`keterangan` AS `detail_keterangan`, `MASTER`.`id` AS `id`, `MASTER`.`uuid` AS `uuid`, `MASTER`.`no_dppb` AS `no_dppb`, `MASTER`.`tanggal_pengajuan` AS `tanggal_pengajuan`, `MASTER`.`tanggal_dibutuhkan` AS `tanggal_dibutuhkan`, `MASTER`.`nama_pemohon` AS `nama_pemohon`, `MASTER`.`unit_kerja` AS `unit_kerja`, `MASTER`.`regional` AS `regional`, `MASTER`.`proyek` AS `proyek`, `MASTER`.`approve_1_nama` AS `approve_1_nama`, `MASTER`.`approve_1_image` AS `approve_1_image`, `MASTER`.`approve_1_timestamp` AS `approve_1_timestamp`, `MASTER`.`approve_2_nama` AS `approve_2_nama`, `MASTER`.`approve_2_image` AS `approve_2_image`, `MASTER`.`approve_2_timestamp` AS `approve_2_timestamp`, `MASTER`.`approve_3_nama` AS `approve_3_nama`, `MASTER`.`approve_3_image` AS `approve_3_image`, `MASTER`.`approve_3_timestamp` AS `approve_3_timestamp`, `MASTER`.`approve_4_nama` AS `approve_4_nama`, `MASTER`.`approve_4_image` AS `approve_4_image`, `MASTER`.`approve_4_timestamp` AS `approve_4_timestamp`, `MASTER`.`approve_5_nama` AS `approve_5_nama`, `MASTER`.`approve_5_image` AS `approve_5_image`, `MASTER`.`approve_5_timestamp` AS `approve_5_timestamp`, `MASTER`.`penandatangan_nama` AS `penandatangan_nama`, `MASTER`.`penandatangan_jabatan` AS `penandatangan_jabatan`, `MASTER`.`penandatangan_nip` AS `penandatangan_nip`, `MASTER`.`timestamp` AS `timestamp`, `MASTER`.`create_by` AS `create_by`, `MASTER`.`modify` AS `modify`, `MASTER`.`modify_by` AS `modify_by`, `MASTER`.`status` AS `status`, `MASTER`.`keterangan` AS `keterangan`, `MASTER`.`revisi_sistem` AS `revisi_sistem`, `MASTER`.`delete_at_digitalisasi_dppb` AS `delete_at_digitalisasi_dppb` FROM (((`digitalisasi_dppb_detail` `detail` left join `digitalisasi_dppb` `MASTER` on((`MASTER`.`no_dppb` = `detail`.`no_dppb`))) left join `lokasi_gudang` `LOKASI` on((`LOKASI`.`kode_lokasi` = `detail`.`kode_lokasi`))) left join `digitalisasi_gi` `GI` on((`GI`.`no_gi` = `detail`.`no_gi`))) ;

-- --------------------------------------------------------

--
-- Structure for view `master_kode_barang_jasa`
--
DROP TABLE IF EXISTS `master_kode_barang_jasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_kode_barang_jasa`  AS SELECT `pmalp_master_barang`.`kode_barang` AS `kode`, `pmalp_master_barang`.`nama` AS `nama`, `pmalp_master_barang`.`approve_status` AS `approve_status` FROM `pmalp_master_barang` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nip_absensi` (`nip_absensi`),
  ADD KEY `nama_absensi` (`nama_absensi`),
  ADD KEY `unit_kerja_absensi` (`unit_kerja_absensi`);

--
-- Indexes for table `aset_diat`
--
ALTER TABLE `aset_diat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collect_sudah_vaksin`
--
ALTER TABLE `collect_sudah_vaksin`
  ADD PRIMARY KEY (`id_sudah_vaksin`);

--
-- Indexes for table `collect_vaksin_lansia`
--
ALTER TABLE `collect_vaksin_lansia`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_hasil_mingguan_survey_gt_covid`
--
ALTER TABLE `detail_hasil_mingguan_survey_gt_covid`
  ADD PRIMARY KEY (`id_detail_hasil_mingguan_survey_gt_covid`),
  ADD KEY `detail_hasil_mingguan-hasilmingguan` (`id_hasil_mingguan`);

--
-- Indexes for table `digitalisasi_ban`
--
ALTER TABLE `digitalisasi_ban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ban` (`no_ban`) USING BTREE,
  ADD KEY `no_sph` (`no_sph`);

--
-- Indexes for table `digitalisasi_dn`
--
ALTER TABLE `digitalisasi_dn`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_dn` (`no_dn`),
  ADD KEY `no_dppb` (`no_dppb`),
  ADD KEY `no_gi` (`no_gi`),
  ADD KEY `no_gr` (`no_gr`);

--
-- Indexes for table `digitalisasi_dn_detail`
--
ALTER TABLE `digitalisasi_dn_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_dppb_dn` (`no_dn`),
  ADD KEY `fk_detail_dppb_dppb` (`no_dppb`),
  ADD KEY `fk_detail_dppb_gi` (`no_gi`),
  ADD KEY `fk_detail_dppb_gr` (`no_gr`),
  ADD KEY `fk_detail_dppb_material` (`kode_material`),
  ADD KEY `fk_detail_dppb_po` (`no_po`),
  ADD KEY `fk_detail_dppb_spmk` (`no_spmk`);

--
-- Indexes for table `digitalisasi_dpbj`
--
ALTER TABLE `digitalisasi_dpbj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_dpbj` (`no_dpbj`);

--
-- Indexes for table `digitalisasi_dpbj_detail`
--
ALTER TABLE `digitalisasi_dpbj_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_master` (`no_dpbj`);

--
-- Indexes for table `digitalisasi_dppb`
--
ALTER TABLE `digitalisasi_dppb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_dppb` (`no_dppb`) USING BTREE;

--
-- Indexes for table `digitalisasi_dppb_detail`
--
ALTER TABLE `digitalisasi_dppb_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_dppb_dn` (`no_dn`),
  ADD KEY `fk_detail_dppb_dppb` (`no_dppb`),
  ADD KEY `fk_detail_dppb_gi` (`no_gi`),
  ADD KEY `fk_detail_dppb_gr` (`no_gr`),
  ADD KEY `fk_detail_dppb_material` (`kode_material`),
  ADD KEY `fk_detail_dppb_po` (`no_po`),
  ADD KEY `fk_detail_dppb_spmk` (`no_spmk`);

--
-- Indexes for table `digitalisasi_evaluasi_penyelenggaraan_pelatihan`
--
ALTER TABLE `digitalisasi_evaluasi_penyelenggaraan_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digitalisasi_form_k1`
--
ALTER TABLE `digitalisasi_form_k1`
  ADD PRIMARY KEY (`id_digitalisasi_form_k1`),
  ADD UNIQUE KEY `nomor_digitalisasi_form_k1` (`nomor_digitalisasi_form_k1`),
  ADD UNIQUE KEY `uuid_digitalisasi_form_k1` (`uuid_digitalisasi_form_k1`);

--
-- Indexes for table `digitalisasi_form_k31`
--
ALTER TABLE `digitalisasi_form_k31`
  ADD PRIMARY KEY (`id_digitalisasi_form_k31`),
  ADD UNIQUE KEY `nomor_k32_digitalisasi_form_k31` (`nomor_k32_digitalisasi_form_k31`),
  ADD UNIQUE KEY `uuid_digitalisasi_form_k31` (`uuid_digitalisasi_form_k31`);

--
-- Indexes for table `digitalisasi_form_k32`
--
ALTER TABLE `digitalisasi_form_k32`
  ADD PRIMARY KEY (`id_digitalisasi_form_k32`),
  ADD UNIQUE KEY `nomor_digitalisasi_form_k32` (`nomor_digitalisasi_form_k32`),
  ADD UNIQUE KEY `uuid_digitalisasi_form_k32` (`uuid_digitalisasi_form_k32`);

--
-- Indexes for table `digitalisasi_form_lembur`
--
ALTER TABLE `digitalisasi_form_lembur`
  ADD PRIMARY KEY (`id_digitalisasi_form_lembur`),
  ADD UNIQUE KEY `uuid_digitalisasi_form_lembur` (`uuid_digitalisasi_form_lembur`);

--
-- Indexes for table `digitalisasi_gi`
--
ALTER TABLE `digitalisasi_gi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_gi` (`no_gi`);

--
-- Indexes for table `digitalisasi_gi_detail`
--
ALTER TABLE `digitalisasi_gi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_dppb_dn` (`no_dn`),
  ADD KEY `fk_detail_dppb_dppb` (`no_dppb`),
  ADD KEY `fk_detail_dppb_gi` (`no_gi`),
  ADD KEY `fk_detail_dppb_gr` (`no_gr`),
  ADD KEY `fk_detail_dppb_material` (`kode_material`),
  ADD KEY `fk_detail_dppb_po` (`no_po`),
  ADD KEY `fk_detail_dppb_spmk` (`no_spmk`);

--
-- Indexes for table `digitalisasi_gr`
--
ALTER TABLE `digitalisasi_gr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_gi` (`no_gr`),
  ADD KEY `no_dppb` (`no_dppb`),
  ADD KEY `id_detail_dppb` (`id_detail_dppb`),
  ADD KEY `no_dn` (`no_dn`);

--
-- Indexes for table `digitalisasi_gr_detail`
--
ALTER TABLE `digitalisasi_gr_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_dppb_dn` (`no_dn`),
  ADD KEY `fk_detail_dppb_dppb` (`no_dppb`),
  ADD KEY `fk_detail_dppb_gi` (`no_gi`),
  ADD KEY `fk_detail_dppb_gr` (`no_gr`),
  ADD KEY `fk_detail_dppb_material` (`kode_material`),
  ADD KEY `fk_detail_dppb_po` (`no_po`),
  ADD KEY `fk_detail_dppb_spmk` (`no_spmk`);

--
-- Indexes for table `digitalisasi_laporan_hasil_pelatihan`
--
ALTER TABLE `digitalisasi_laporan_hasil_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digitalisasi_lpp`
--
ALTER TABLE `digitalisasi_lpp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_lpp` (`no_lpp`),
  ADD KEY `no_ban` (`no_ban`);

--
-- Indexes for table `digitalisasi_pks`
--
ALTER TABLE `digitalisasi_pks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pks` (`no_pks`),
  ADD KEY `no_ban` (`no_ban`);

--
-- Indexes for table `digitalisasi_po`
--
ALTER TABLE `digitalisasi_po`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_po` (`no_po`),
  ADD KEY `no_ban` (`no_ban`);

--
-- Indexes for table `digitalisasi_po_detail`
--
ALTER TABLE `digitalisasi_po_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_master` (`no_po`);

--
-- Indexes for table `digitalisasi_ppl`
--
ALTER TABLE `digitalisasi_ppl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ppl` (`no_ppl`);

--
-- Indexes for table `digitalisasi_spmk`
--
ALTER TABLE `digitalisasi_spmk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_spmk` (`no_spmk`),
  ADD KEY `no_ban` (`no_ban`);

--
-- Indexes for table `digitalisasi_spmk_detail`
--
ALTER TABLE `digitalisasi_spmk_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_master` (`no_spmk`);

--
-- Indexes for table `digitalisasi_spph`
--
ALTER TABLE `digitalisasi_spph`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_isar_survey_gt_covid`
--
ALTER TABLE `hasil_isar_survey_gt_covid`
  ADD PRIMARY KEY (`id_hasil_isar_survey_gt_covid`),
  ADD KEY `fk_isar_nip` (`nip_isar_survey_gt_covid`);

--
-- Indexes for table `hasil_mingguan_survey_gt_covid`
--
ALTER TABLE `hasil_mingguan_survey_gt_covid`
  ADD PRIMARY KEY (`id_hasil_mingguan_survey_gt_covid`),
  ADD KEY `fk_survey_mingguan_nip` (`nip_mingguan_survey_gt_covid`);

--
-- Indexes for table `hasil_srq_29_survey_gt_covid`
--
ALTER TABLE `hasil_srq_29_survey_gt_covid`
  ADD PRIMARY KEY (`id_hasil_srq_29_survey_gt_covid`),
  ADD KEY `fk_srq_nip` (`nip_srq_29_survey_gt_covid`);

--
-- Indexes for table `hasil_suhu_gt_covid`
--
ALTER TABLE `hasil_suhu_gt_covid`
  ADD PRIMARY KEY (`id_hasil_suhu_gt_covid`);

--
-- Indexes for table `hasil_survey_gt_covid`
--
ALTER TABLE `hasil_survey_gt_covid`
  ADD PRIMARY KEY (`id_hasil_survey_gt_covid`),
  ADD KEY `fk_survey_nip` (`nip_survey_gt_covid`);

--
-- Indexes for table `inventaris_aset`
--
ALTER TABLE `inventaris_aset`
  ADD PRIMARY KEY (`id_inventaris_aset`);

--
-- Indexes for table `keu_akun`
--
ALTER TABLE `keu_akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_akun` (`kode_akun`);

--
-- Indexes for table `libur_indonesia`
--
ALTER TABLE `libur_indonesia`
  ADD PRIMARY KEY (`tanggal_libur_nasional_indonesia`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_spesimen_paraf`
--
ALTER TABLE `log_spesimen_paraf`
  ADD PRIMARY KEY (`id_spesimen_paraf`),
  ADD UNIQUE KEY `uuid_spesimen_paraf` (`uuid_spesimen_paraf`),
  ADD UNIQUE KEY `image_spesimen_paraf` (`image_spesimen_paraf`),
  ADD KEY `first_name_log_spesimen_paraf` (`first_name_log_spesimen_paraf`);

--
-- Indexes for table `log_spesimen_ttd`
--
ALTER TABLE `log_spesimen_ttd`
  ADD PRIMARY KEY (`id_spesimen_ttd`),
  ADD UNIQUE KEY `uuid_spesimen_ttd` (`uuid_spesimen_ttd`),
  ADD UNIQUE KEY `image_spesimen_ttd` (`image_spesimen_ttd`),
  ADD KEY `first_name_log_spesimen_ttd` (`first_name_log_spesimen_ttd`);

--
-- Indexes for table `lokasi_gudang`
--
ALTER TABLE `lokasi_gudang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_lokasi` (`kode_lokasi`);

--
-- Indexes for table `lokasi_survey_gt_covid`
--
ALTER TABLE `lokasi_survey_gt_covid`
  ADD PRIMARY KEY (`id_lokasi_survery_gt_covid`);

--
-- Indexes for table `pmalp_master_barang`
--
ALTER TABLE `pmalp_master_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `pmalp_master_jasa`
--
ALTER TABLE `pmalp_master_jasa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jasa` (`kode_jasa`);

--
-- Indexes for table `pmalp_master_konsultan`
--
ALTER TABLE `pmalp_master_konsultan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_konsultan` (`kode_konsultan`);

--
-- Indexes for table `pmalp_master_material`
--
ALTER TABLE `pmalp_master_material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_material` (`kode_material`),
  ADD KEY `material_sub_kelompok` (`material_sub_kelompok`),
  ADD KEY `material_kelompok` (`material_kelompok`),
  ADD KEY `material_kategori` (`material_kategori`);

--
-- Indexes for table `pmalp_master_material_kategori`
--
ALTER TABLE `pmalp_master_material_kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `pmalp_master_material_kelompok`
--
ALTER TABLE `pmalp_master_material_kelompok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kelompok` (`kode_kelompok`),
  ADD KEY `kelompok_kategori` (`kelompok_kategori`);

--
-- Indexes for table `pmalp_master_material_sub_kelompok`
--
ALTER TABLE `pmalp_master_material_sub_kelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelompok_sub_kelompok` (`kelompok_sub_kelompok`);

--
-- Indexes for table `pmalp_sph`
--
ALTER TABLE `pmalp_sph`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_sph` (`no_sph`),
  ADD KEY `no_spph` (`no_spph`);

--
-- Indexes for table `pmalp_supplier`
--
ALTER TABLE `pmalp_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portal_berita`
--
ALTER TABLE `portal_berita`
  ADD PRIMARY KEY (`id_portal_berita`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id_qrcode`),
  ADD UNIQUE KEY `uuid_qrcode` (`uuid_qrcode`),
  ADD UNIQUE KEY `verifikasi_qrcode` (`verifikasi_qrcode`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekrutmen_appsetting`
--
ALTER TABLE `rekrutmen_appsetting`
  ADD PRIMARY KEY (`id_appsetting`);

--
-- Indexes for table `rekrutmen_data_pelamar`
--
ALTER TABLE `rekrutmen_data_pelamar`
  ADD PRIMARY KEY (`id_data_pelamar`),
  ADD UNIQUE KEY `no_registrasi_UNIQUE` (`no_registrasi_data_pelamar`);

--
-- Indexes for table `rekrutmen_data_pendidikan`
--
ALTER TABLE `rekrutmen_data_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Pendidikan_Pelamar_idx` (`data_pelamar_id`);

--
-- Indexes for table `rekrutmen_data_test_online`
--
ALTER TABLE `rekrutmen_data_test_online`
  ADD PRIMARY KEY (`id_data_test_online`);

--
-- Indexes for table `rekrutmen_setup_jurusan`
--
ALTER TABLE `rekrutmen_setup_jurusan`
  ADD PRIMARY KEY (`id_setup_jurusan`);

--
-- Indexes for table `rekrutmen_setup_pendidikan`
--
ALTER TABLE `rekrutmen_setup_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekrutmen_setup_posisi`
--
ALTER TABLE `rekrutmen_setup_posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekrutmen_setup_universitas`
--
ALTER TABLE `rekrutmen_setup_universitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekrutmen_test_online_setting`
--
ALTER TABLE `rekrutmen_test_online_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routing`
--
ALTER TABLE `routing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_bagian_organisasi`
--
ALTER TABLE `setup_bagian_organisasi`
  ADD PRIMARY KEY (`id_setup_bagian_organisasi`),
  ADD UNIQUE KEY `nama_setup_bagian_organisasi` (`nama_setup_bagian_organisasi`),
  ADD UNIQUE KEY `nama_view_setup_bagian_organisasi` (`nama_view_setup_bagian_organisasi`);

--
-- Indexes for table `setup_bidang_kerja`
--
ALTER TABLE `setup_bidang_kerja`
  ADD PRIMARY KEY (`id_setup_bidang_kerja`),
  ADD UNIQUE KEY `nama_setup_bidang_kerja` (`nama_setup_bidang_kerja`),
  ADD UNIQUE KEY `nama_view_setup_bidang_kerja` (`nama_view_setup_bidang_kerja`);

--
-- Indexes for table `setup_direktorat_organisasi`
--
ALTER TABLE `setup_direktorat_organisasi`
  ADD PRIMARY KEY (`id_setup_direktorat_organisasi`),
  ADD UNIQUE KEY `nama_view_setup_direktorat_organisasi` (`nama_view_setup_direktorat_organisasi`),
  ADD UNIQUE KEY `id_setup_direktorat_organisasi` (`id_setup_direktorat_organisasi`),
  ADD UNIQUE KEY `nama_setup_direktorat_organisasi` (`nama_setup_direktorat_organisasi`);

--
-- Indexes for table `setup_divisi_organisasi`
--
ALTER TABLE `setup_divisi_organisasi`
  ADD PRIMARY KEY (`id_setup_divisi_organisasi`),
  ADD UNIQUE KEY `nama_setup_divisi_organisasi` (`nama_setup_divisi_organisasi`),
  ADD UNIQUE KEY `nama_view_setup_divisi_organisasi` (`nama_view_setup_divisi_organisasi`);

--
-- Indexes for table `setup_fungsional`
--
ALTER TABLE `setup_fungsional`
  ADD PRIMARY KEY (`id_setup_fungsional`);

--
-- Indexes for table `setup_golongan_organisasi`
--
ALTER TABLE `setup_golongan_organisasi`
  ADD PRIMARY KEY (`id_setup_golongan_organisasi`),
  ADD UNIQUE KEY `nama_setup_golongan_organisasi` (`nama_setup_golongan_organisasi`),
  ADD UNIQUE KEY `nama_view_setup_golongan_organisasi` (`nama_view_setup_golongan_organisasi`);

--
-- Indexes for table `setup_grade`
--
ALTER TABLE `setup_grade`
  ADD PRIMARY KEY (`id_setup_grade`);

--
-- Indexes for table `setup_jabatan_organisasi`
--
ALTER TABLE `setup_jabatan_organisasi`
  ADD PRIMARY KEY (`id_setup_jabatan_organisasi`),
  ADD UNIQUE KEY `nama_setup_jabatan_organisasi` (`nama_setup_jabatan_organisasi`),
  ADD UNIQUE KEY `nama_view_setup_jabatan_organisasi` (`nama_view_setup_jabatan_organisasi`);

--
-- Indexes for table `setup_job_level`
--
ALTER TABLE `setup_job_level`
  ADD PRIMARY KEY (`id_setup_job_level`),
  ADD UNIQUE KEY `nama_setup_job_level` (`nama_setup_job_level`),
  ADD UNIQUE KEY `nama_view_setup_job_level` (`nama_view_setup_job_level`);

--
-- Indexes for table `setup_kategori_surat`
--
ALTER TABLE `setup_kategori_surat`
  ADD PRIMARY KEY (`id_setup_kategori_surat`),
  ADD UNIQUE KEY `nama_kategori_surat` (`nama_kategori_surat`);

--
-- Indexes for table `setup_kode_divisi_unit_kerja`
--
ALTER TABLE `setup_kode_divisi_unit_kerja`
  ADD PRIMARY KEY (`id_kode_divisi_unit_kerja`),
  ADD UNIQUE KEY `nama_kode_divisi_unit_kerja` (`nama_kode_divisi_unit_kerja`),
  ADD KEY `fk_kode_divisi_unit_kerja` (`nama_divisi_unit_kerja`);

--
-- Indexes for table `setup_level_struktur`
--
ALTER TABLE `setup_level_struktur`
  ADD PRIMARY KEY (`id_setup_level_struktur`);

--
-- Indexes for table `setup_modul`
--
ALTER TABLE `setup_modul`
  ADD PRIMARY KEY (`id_setup_modul`);

--
-- Indexes for table `setup_organ_perusahaan`
--
ALTER TABLE `setup_organ_perusahaan`
  ADD PRIMARY KEY (`id_setup_organ_perusahaan`),
  ADD UNIQUE KEY `nama_setup_golongan_organisasi` (`nama_setup_organ_perusahaan`),
  ADD UNIQUE KEY `nama_view_setup_golongan_organisasi` (`nama_view_setup_organ_perusahaan`);

--
-- Indexes for table `setup_posisi`
--
ALTER TABLE `setup_posisi`
  ADD PRIMARY KEY (`id_setup_posisi`),
  ADD UNIQUE KEY `nama_posisi` (`nama_posisi`);

--
-- Indexes for table `setup_rekening_bank`
--
ALTER TABLE `setup_rekening_bank`
  ADD PRIMARY KEY (`id_setup_rekening_bank`);

--
-- Indexes for table `setup_status_karyawan`
--
ALTER TABLE `setup_status_karyawan`
  ADD PRIMARY KEY (`id_setup_status_karyawan`),
  ADD UNIQUE KEY `nama_setup_status_karyawan` (`nama_setup_status_karyawan`),
  ADD UNIQUE KEY `nama_view_setup_status_karyawan` (`nama_view_setup_status_karyawan`);

--
-- Indexes for table `setup_tarif_perjalanan_dinas_dalam_negeri`
--
ALTER TABLE `setup_tarif_perjalanan_dinas_dalam_negeri`
  ADD PRIMARY KEY (`id_setup_tarif_perjalanan_dinas_dalam_negeri`),
  ADD UNIQUE KEY `golongan_setup_tarif_perjalanan_dinas_dalam_negeri` (`golongan_setup_tarif_perjalanan_dinas_dalam_negeri`);

--
-- Indexes for table `setup_unit_kerja`
--
ALTER TABLE `setup_unit_kerja`
  ADD PRIMARY KEY (`id_setup_unit_kerja`),
  ADD UNIQUE KEY `nama_setup_unit_kerja` (`nama_setup_unit_kerja`),
  ADD UNIQUE KEY `nama_view_setup_unit_kerja` (`nama_view_setup_unit_kerja`);

--
-- Indexes for table `site_visits`
--
ALTER TABLE `site_visits`
  ADD PRIMARY KEY (`id_site_visits`);

--
-- Indexes for table `stock_opname`
--
ALTER TABLE `stock_opname`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_stock` (`kode_stock`);

--
-- Indexes for table `stock_opname_log`
--
ALTER TABLE `stock_opname_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_opname_log_stock_opname` (`kode_stock`);

--
-- Indexes for table `struktur_organisasi_perjalanan_dinas`
--
ALTER TABLE `struktur_organisasi_perjalanan_dinas`
  ADD PRIMARY KEY (`id_struktur_organisasi_perjalanan_dinas`);

--
-- Indexes for table `struktur_organisasi_perjalanan_dinas_copy`
--
ALTER TABLE `struktur_organisasi_perjalanan_dinas_copy`
  ADD PRIMARY KEY (`id_struktur_organisasi_perjalanan_dinas`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD UNIQUE KEY `nomor_surat_keluar` (`nomor_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `first_name` (`first_name`),
  ADD KEY `fk_organ_perusahaan` (`organ_perusahaan`),
  ADD KEY `fk_unit_kerja` (`unit_kerja`),
  ADD KEY `fk_bidang_kerja` (`bidang_kerja`),
  ADD KEY `fk_status_pekerjaan` (`status_karyawan`),
  ADD KEY `fk_gol_pejalan_dinas` (`gol_pejalan_dinas`),
  ADD KEY `fk_atasan` (`boss`);

--
-- Indexes for table `users_data_keluarga`
--
ALTER TABLE `users_data_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_fungsional`
--
ALTER TABLE `users_fungsional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_grade`
--
ALTER TABLE `users_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_notifications`
--
ALTER TABLE `users_notifications`
  ADD PRIMARY KEY (`id_users_notifications`),
  ADD UNIQUE KEY `user_id_users_notifications` (`user_id_users_notifications`);

--
-- Indexes for table `users_pelatihan`
--
ALTER TABLE `users_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_pendidikan`
--
ALTER TABLE `users_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_pengalaman_kerja`
--
ALTER TABLE `users_pengalaman_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_pengalaman_tugas`
--
ALTER TABLE `users_pengalaman_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sertifikasi`
--
ALTER TABLE `users_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_unit_kerja`
--
ALTER TABLE `users_unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dump_karyawan`
--
ALTER TABLE `_dump_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `_dump_karyawan_struktur`
--
ALTER TABLE `_dump_karyawan_struktur`
  ADD PRIMARY KEY (`id_karyawan_struktur`),
  ADD UNIQUE KEY `nip_karyawan_struktur` (`nip_karyawan_struktur`),
  ADD KEY `karyawan_level_struktur` (`karyawan_level_struktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aset_diat`
--
ALTER TABLE `aset_diat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collect_sudah_vaksin`
--
ALTER TABLE `collect_sudah_vaksin`
  MODIFY `id_sudah_vaksin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collect_vaksin_lansia`
--
ALTER TABLE `collect_vaksin_lansia`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_hasil_mingguan_survey_gt_covid`
--
ALTER TABLE `detail_hasil_mingguan_survey_gt_covid`
  MODIFY `id_detail_hasil_mingguan_survey_gt_covid` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_ban`
--
ALTER TABLE `digitalisasi_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_dn`
--
ALTER TABLE `digitalisasi_dn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_dn_detail`
--
ALTER TABLE `digitalisasi_dn_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_dpbj`
--
ALTER TABLE `digitalisasi_dpbj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_dpbj_detail`
--
ALTER TABLE `digitalisasi_dpbj_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_dppb`
--
ALTER TABLE `digitalisasi_dppb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_dppb_detail`
--
ALTER TABLE `digitalisasi_dppb_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_evaluasi_penyelenggaraan_pelatihan`
--
ALTER TABLE `digitalisasi_evaluasi_penyelenggaraan_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_form_k1`
--
ALTER TABLE `digitalisasi_form_k1`
  MODIFY `id_digitalisasi_form_k1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_form_k31`
--
ALTER TABLE `digitalisasi_form_k31`
  MODIFY `id_digitalisasi_form_k31` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_form_k32`
--
ALTER TABLE `digitalisasi_form_k32`
  MODIFY `id_digitalisasi_form_k32` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_form_lembur`
--
ALTER TABLE `digitalisasi_form_lembur`
  MODIFY `id_digitalisasi_form_lembur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_gi`
--
ALTER TABLE `digitalisasi_gi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_gi_detail`
--
ALTER TABLE `digitalisasi_gi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_gr`
--
ALTER TABLE `digitalisasi_gr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_gr_detail`
--
ALTER TABLE `digitalisasi_gr_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_laporan_hasil_pelatihan`
--
ALTER TABLE `digitalisasi_laporan_hasil_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_lpp`
--
ALTER TABLE `digitalisasi_lpp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_pks`
--
ALTER TABLE `digitalisasi_pks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_po`
--
ALTER TABLE `digitalisasi_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_po_detail`
--
ALTER TABLE `digitalisasi_po_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_ppl`
--
ALTER TABLE `digitalisasi_ppl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_spmk`
--
ALTER TABLE `digitalisasi_spmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_spmk_detail`
--
ALTER TABLE `digitalisasi_spmk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitalisasi_spph`
--
ALTER TABLE `digitalisasi_spph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_isar_survey_gt_covid`
--
ALTER TABLE `hasil_isar_survey_gt_covid`
  MODIFY `id_hasil_isar_survey_gt_covid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_mingguan_survey_gt_covid`
--
ALTER TABLE `hasil_mingguan_survey_gt_covid`
  MODIFY `id_hasil_mingguan_survey_gt_covid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_srq_29_survey_gt_covid`
--
ALTER TABLE `hasil_srq_29_survey_gt_covid`
  MODIFY `id_hasil_srq_29_survey_gt_covid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_suhu_gt_covid`
--
ALTER TABLE `hasil_suhu_gt_covid`
  MODIFY `id_hasil_suhu_gt_covid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_survey_gt_covid`
--
ALTER TABLE `hasil_survey_gt_covid`
  MODIFY `id_hasil_survey_gt_covid` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_aset`
--
ALTER TABLE `inventaris_aset`
  MODIFY `id_inventaris_aset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keu_akun`
--
ALTER TABLE `keu_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_spesimen_paraf`
--
ALTER TABLE `log_spesimen_paraf`
  MODIFY `id_spesimen_paraf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_spesimen_ttd`
--
ALTER TABLE `log_spesimen_ttd`
  MODIFY `id_spesimen_ttd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_gudang`
--
ALTER TABLE `lokasi_gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_survey_gt_covid`
--
ALTER TABLE `lokasi_survey_gt_covid`
  MODIFY `id_lokasi_survery_gt_covid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_barang`
--
ALTER TABLE `pmalp_master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_jasa`
--
ALTER TABLE `pmalp_master_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_konsultan`
--
ALTER TABLE `pmalp_master_konsultan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_material`
--
ALTER TABLE `pmalp_master_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_material_kategori`
--
ALTER TABLE `pmalp_master_material_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_material_kelompok`
--
ALTER TABLE `pmalp_master_material_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_master_material_sub_kelompok`
--
ALTER TABLE `pmalp_master_material_sub_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_sph`
--
ALTER TABLE `pmalp_sph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmalp_supplier`
--
ALTER TABLE `pmalp_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portal_berita`
--
ALTER TABLE `portal_berita`
  MODIFY `id_portal_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id_qrcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_appsetting`
--
ALTER TABLE `rekrutmen_appsetting`
  MODIFY `id_appsetting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_data_pendidikan`
--
ALTER TABLE `rekrutmen_data_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_data_test_online`
--
ALTER TABLE `rekrutmen_data_test_online`
  MODIFY `id_data_test_online` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_setup_jurusan`
--
ALTER TABLE `rekrutmen_setup_jurusan`
  MODIFY `id_setup_jurusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_setup_pendidikan`
--
ALTER TABLE `rekrutmen_setup_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_setup_posisi`
--
ALTER TABLE `rekrutmen_setup_posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_setup_universitas`
--
ALTER TABLE `rekrutmen_setup_universitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekrutmen_test_online_setting`
--
ALTER TABLE `rekrutmen_test_online_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routing`
--
ALTER TABLE `routing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_bagian_organisasi`
--
ALTER TABLE `setup_bagian_organisasi`
  MODIFY `id_setup_bagian_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_bidang_kerja`
--
ALTER TABLE `setup_bidang_kerja`
  MODIFY `id_setup_bidang_kerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_direktorat_organisasi`
--
ALTER TABLE `setup_direktorat_organisasi`
  MODIFY `id_setup_direktorat_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_divisi_organisasi`
--
ALTER TABLE `setup_divisi_organisasi`
  MODIFY `id_setup_divisi_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_fungsional`
--
ALTER TABLE `setup_fungsional`
  MODIFY `id_setup_fungsional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_golongan_organisasi`
--
ALTER TABLE `setup_golongan_organisasi`
  MODIFY `id_setup_golongan_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_grade`
--
ALTER TABLE `setup_grade`
  MODIFY `id_setup_grade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_jabatan_organisasi`
--
ALTER TABLE `setup_jabatan_organisasi`
  MODIFY `id_setup_jabatan_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_job_level`
--
ALTER TABLE `setup_job_level`
  MODIFY `id_setup_job_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_kategori_surat`
--
ALTER TABLE `setup_kategori_surat`
  MODIFY `id_setup_kategori_surat` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_kode_divisi_unit_kerja`
--
ALTER TABLE `setup_kode_divisi_unit_kerja`
  MODIFY `id_kode_divisi_unit_kerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_level_struktur`
--
ALTER TABLE `setup_level_struktur`
  MODIFY `id_setup_level_struktur` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_modul`
--
ALTER TABLE `setup_modul`
  MODIFY `id_setup_modul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_organ_perusahaan`
--
ALTER TABLE `setup_organ_perusahaan`
  MODIFY `id_setup_organ_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_posisi`
--
ALTER TABLE `setup_posisi`
  MODIFY `id_setup_posisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_rekening_bank`
--
ALTER TABLE `setup_rekening_bank`
  MODIFY `id_setup_rekening_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_status_karyawan`
--
ALTER TABLE `setup_status_karyawan`
  MODIFY `id_setup_status_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_tarif_perjalanan_dinas_dalam_negeri`
--
ALTER TABLE `setup_tarif_perjalanan_dinas_dalam_negeri`
  MODIFY `id_setup_tarif_perjalanan_dinas_dalam_negeri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_unit_kerja`
--
ALTER TABLE `setup_unit_kerja`
  MODIFY `id_setup_unit_kerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_visits`
--
ALTER TABLE `site_visits`
  MODIFY `id_site_visits` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_opname`
--
ALTER TABLE `stock_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_opname_log`
--
ALTER TABLE `stock_opname_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_organisasi_perjalanan_dinas`
--
ALTER TABLE `struktur_organisasi_perjalanan_dinas`
  MODIFY `id_struktur_organisasi_perjalanan_dinas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_organisasi_perjalanan_dinas_copy`
--
ALTER TABLE `struktur_organisasi_perjalanan_dinas_copy`
  MODIFY `id_struktur_organisasi_perjalanan_dinas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_data_keluarga`
--
ALTER TABLE `users_data_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_fungsional`
--
ALTER TABLE `users_fungsional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_grade`
--
ALTER TABLE `users_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_notifications`
--
ALTER TABLE `users_notifications`
  MODIFY `id_users_notifications` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_pelatihan`
--
ALTER TABLE `users_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_pendidikan`
--
ALTER TABLE `users_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_pengalaman_kerja`
--
ALTER TABLE `users_pengalaman_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_pengalaman_tugas`
--
ALTER TABLE `users_pengalaman_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_sertifikasi`
--
ALTER TABLE `users_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_unit_kerja`
--
ALTER TABLE `users_unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_dump_karyawan`
--
ALTER TABLE `_dump_karyawan`
  MODIFY `id_karyawan` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_dump_karyawan_struktur`
--
ALTER TABLE `_dump_karyawan_struktur`
  MODIFY `id_karyawan_struktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_hasil_mingguan_survey_gt_covid`
--
ALTER TABLE `detail_hasil_mingguan_survey_gt_covid`
  ADD CONSTRAINT `detail_hasil_mingguan-hasilmingguan` FOREIGN KEY (`id_hasil_mingguan`) REFERENCES `hasil_mingguan_survey_gt_covid` (`id_hasil_mingguan_survey_gt_covid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `digitalisasi_ban`
--
ALTER TABLE `digitalisasi_ban`
  ADD CONSTRAINT `fk_ban_sph` FOREIGN KEY (`no_sph`) REFERENCES `pmalp_sph` (`no_sph`);

--
-- Constraints for table `digitalisasi_dn`
--
ALTER TABLE `digitalisasi_dn`
  ADD CONSTRAINT `fk_dn_dppb` FOREIGN KEY (`no_dppb`) REFERENCES `digitalisasi_dppb` (`no_dppb`),
  ADD CONSTRAINT `fk_dn_gi` FOREIGN KEY (`no_gi`) REFERENCES `digitalisasi_gi` (`no_gi`),
  ADD CONSTRAINT `fk_dn_gr` FOREIGN KEY (`no_gr`) REFERENCES `digitalisasi_gr` (`no_gr`);

--
-- Constraints for table `digitalisasi_dpbj_detail`
--
ALTER TABLE `digitalisasi_dpbj_detail`
  ADD CONSTRAINT `fk_detail_master` FOREIGN KEY (`no_dpbj`) REFERENCES `digitalisasi_dpbj` (`no_dpbj`) ON UPDATE CASCADE;

--
-- Constraints for table `digitalisasi_dppb_detail`
--
ALTER TABLE `digitalisasi_dppb_detail`
  ADD CONSTRAINT `fk_detail_dppb_dn` FOREIGN KEY (`no_dn`) REFERENCES `digitalisasi_dn` (`no_dn`),
  ADD CONSTRAINT `fk_detail_dppb_dppb` FOREIGN KEY (`no_dppb`) REFERENCES `digitalisasi_dppb` (`no_dppb`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_dppb_gi` FOREIGN KEY (`no_gi`) REFERENCES `digitalisasi_gi` (`no_gi`),
  ADD CONSTRAINT `fk_detail_dppb_gr` FOREIGN KEY (`no_gr`) REFERENCES `digitalisasi_gr` (`no_gr`),
  ADD CONSTRAINT `fk_detail_dppb_material` FOREIGN KEY (`kode_material`) REFERENCES `pmalp_master_material` (`kode_material`),
  ADD CONSTRAINT `fk_detail_dppb_po` FOREIGN KEY (`no_po`) REFERENCES `digitalisasi_po` (`no_po`),
  ADD CONSTRAINT `fk_detail_dppb_spmk` FOREIGN KEY (`no_spmk`) REFERENCES `digitalisasi_spmk` (`no_spmk`);

--
-- Constraints for table `digitalisasi_form_k31`
--
ALTER TABLE `digitalisasi_form_k31`
  ADD CONSTRAINT `fk_k31-k32` FOREIGN KEY (`nomor_k32_digitalisasi_form_k31`) REFERENCES `digitalisasi_form_k32` (`nomor_digitalisasi_form_k32`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `digitalisasi_gr`
--
ALTER TABLE `digitalisasi_gr`
  ADD CONSTRAINT `fk_gi_dppb` FOREIGN KEY (`no_dppb`) REFERENCES `digitalisasi_dppb` (`no_dppb`);

--
-- Constraints for table `digitalisasi_lpp`
--
ALTER TABLE `digitalisasi_lpp`
  ADD CONSTRAINT `fk_lpp_ban` FOREIGN KEY (`no_ban`) REFERENCES `digitalisasi_ban` (`no_ban`);

--
-- Constraints for table `digitalisasi_pks`
--
ALTER TABLE `digitalisasi_pks`
  ADD CONSTRAINT `fk_pks_ban` FOREIGN KEY (`no_ban`) REFERENCES `digitalisasi_ban` (`no_ban`);

--
-- Constraints for table `digitalisasi_po`
--
ALTER TABLE `digitalisasi_po`
  ADD CONSTRAINT `fk_po_ban` FOREIGN KEY (`no_ban`) REFERENCES `digitalisasi_ban` (`no_ban`);

--
-- Constraints for table `digitalisasi_po_detail`
--
ALTER TABLE `digitalisasi_po_detail`
  ADD CONSTRAINT `fk_po_detail_po` FOREIGN KEY (`no_po`) REFERENCES `digitalisasi_po` (`no_po`);

--
-- Constraints for table `digitalisasi_spmk`
--
ALTER TABLE `digitalisasi_spmk`
  ADD CONSTRAINT `fk_spmk_ban` FOREIGN KEY (`no_ban`) REFERENCES `digitalisasi_ban` (`no_ban`);

--
-- Constraints for table `digitalisasi_spmk_detail`
--
ALTER TABLE `digitalisasi_spmk_detail`
  ADD CONSTRAINT `fk_spmk_detail_spmk` FOREIGN KEY (`no_spmk`) REFERENCES `digitalisasi_spmk` (`no_spmk`);

--
-- Constraints for table `digitalisasi_spph`
--
ALTER TABLE `digitalisasi_spph`
  ADD CONSTRAINT `fk_spph_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `pmalp_supplier` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
