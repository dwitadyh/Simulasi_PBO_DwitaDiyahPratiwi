<?php
// index.php

require_once 'koneksi/database.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

try {
    $dataReguler   = PendaftaranReguler::getDaftarReguler($pdo);
    $dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($pdo);
    $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($pdo);
    
    // Menghitung ringkasan data untuk Summary Cards
    $totalReguler   = count($dataReguler);
    $totalPrestasi  = count($dataPrestasi);
    $totalKedinasan = count($dataKedinasan);
    $totalPendaftar = $totalReguler + $totalPrestasi + $totalKedinasan;
} catch (PDOException $e) {
    die("Gagal mengambil data dari database: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard PMB - Minimalist iOS</title>
</head>
<body style="background-color: #f0f3f7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #333333; margin: 0; padding: 40px;">

    <!-- HEADER DASHBOARD -->
    <div style="margin-bottom: 30px;">
        <h1 style="font-size: 28px; font-weight: 700; color: #1c1c1e; margin: 0 0 8px 0;">Dashboard Penerimaan Mahasiswa Baru</h1>
        <p style="color: #8e8e93; margin: 0; font-size: 14px;">Mengelola dan memantau data calon mahasiswa secara dinamis</p>
    </div>

    <!-- SUMMARY CARDS (Efek Timbul Neumorphism) -->
    <div style="display: flex; gap: 20px; margin-bottom: 40px;">
        <!-- Card Total -->
        <div style="flex: 1; background: #f0f3f7; padding: 20px; border-radius: 16px; box-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff; border: 1px solid rgba(255,255,255,0.2);">
            <div style="color: #007aff; font-size: 13px; font-weight: 600; text-transform: uppercase; margin-bottom: 8px;">Total Pendaftar</div>
            <div style="font-size: 28px; font-weight: 700; color: #1c1c1e;"><?php echo $totalPendaftar; ?> <span style="font-size: 14px; font-weight: 400; color: #8e8e93;">Orang</span></div>
        </div>
        <!-- Card Reguler -->
        <div style="flex: 1; background: #f0f3f7; padding: 20px; border-radius: 16px; box-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff; border: 1px solid rgba(255,255,255,0.2);">
            <div style="color: #5856d6; font-size: 13px; font-weight: 600; text-transform: uppercase; margin-bottom: 8px;">Jalur Reguler</div>
            <div style="font-size: 28px; font-weight: 700; color: #1c1c1e;"><?php echo $totalReguler; ?> <span style="font-size: 14px; font-weight: 400; color: #8e8e93;">Siswa</span></div>
        </div>
        <!-- Card Prestasi -->
        <div style="flex: 1; background: #f0f3f7; padding: 20px; border-radius: 16px; box-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff; border: 1px solid rgba(255,255,255,0.2);">
            <div style="color: #34c759; font-size: 13px; font-weight: 600; text-transform: uppercase; margin-bottom: 8px;">Jalur Prestasi</div>
            <div style="font-size: 28px; font-weight: 700; color: #1c1c1e;"><?php echo $totalPrestasi; ?> <span style="font-size: 14px; font-weight: 400; color: #8e8e93;">Siswa</span></div>
        </div>
        <!-- Card Kedinasan -->
        <div style="flex: 1; background: #f0f3f7; padding: 20px; border-radius: 16px; box-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff; border: 1px solid rgba(255,255,255,0.2);">
            <div style="color: #ff2d55; font-size: 13px; font-weight: 600; text-transform: uppercase; margin-bottom: 8px;">Jalur Kedinasan</div>
            <div style="font-size: 28px; font-weight: 700; color: #1c1c1e;"><?php echo $totalKedinasan; ?> <span style="font-size: 14px; font-weight: 400; color: #8e8e93;">Siswa</span></div>
        </div>
    </div>


    <!-- CONTAINER TABEL 1: REGULER -->
    <div style="background: #f0f3f7; padding: 25px; border-radius: 20px; box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff; margin-bottom: 40px;">
        <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <div style="width: 4px; height: 20px; background-color: #5856d6; border-radius: 2px; margin-right: 10px;"></div>
            <h2 style="font-size: 18px; font-weight: 600; color: #1c1c1e; margin: 0;">Kategori: Jalur Reguler</h2>
        </div>
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 10px;">
            <thead>
                <tr style="color: #8e8e93; font-size: 13px; text-transform: uppercase; text-align: left;">
                    <th style="padding: 10px 15px;">ID</th>
                    <th style="padding: 10px 15px;">Nama Calon</th>
                    <th style="padding: 10px 15px;">Asal Sekolah</th>
                    <th style="padding: 10px 15px; text-align: center;">Nilai Ujian</th>
                    <th style="padding: 10px 15px;">Biaya Dasar</th>
                    <th style="padding: 10px 15px;">Informasi Spesifik Jalur</th>
                    <th style="padding: 10px 15px; text-align: right;">Total Biaya Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dataReguler)): ?>
                    <tr><td colspan="7" style="text-align: center; padding: 20px; color: #8e8e93; background: #ffffff; border-radius: 12px;">Tidak ada data pendaftar.</td></tr>
                <?php else: ?>
                    <?php foreach ($dataReguler as $row): ?>
                        <?php 
                        $objekReguler = new PendaftaranReguler($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['pilihan_prodi'], $row['lokasi_campust'] ?? $row['lokasi_kampus']);
                        ?>
                        <tr style="background: #ffffff; box-shadow: 2px 2px 5px rgba(0,0,0,0.02); font-size: 14px; color: #3a3a3c;">
                            <td style="padding: 15px; border-top-left-radius: 12px; border-bottom-left-radius: 12px; font-weight: 600; color: #8e8e93;"><?php echo $row['id_pendaftaran']; ?></td>
                            <td style="padding: 15px; font-weight: 600; color: #1c1c1e;"><?php echo htmlspecialchars($row['nama_calon']); ?></td>
                            <td style="padding: 15px;"><?php echo htmlspecialchars($row['asal_sekolah']); ?></td>
                            <td style="padding: 15px; text-align: center; font-weight: 600; color: #007aff;"><?php echo $row['nilai_ujian']; ?></td>
                            <td style="padding: 15px; color: #636366;">Rp <?php echo number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                            <td style="padding: 15px; font-size: 13px; color: #5856d6;"><?php echo htmlspecialchars($objekReguler->tampilkanInfoJalur()); ?></td>
                            <td style="padding: 15px; text-align: right; border-top-right-radius: 12px; border-bottom-right-radius: 12px; font-weight: 700; color: #1c1c1e;">Rp <?php echo number_format($objekReguler->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <!-- CONTAINER TABEL 2: PRESTASI -->
    <div style="background: #f0f3f7; padding: 25px; border-radius: 20px; box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff; margin-bottom: 40px;">
        <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <div style="width: 4px; height: 20px; background-color: #34c759; border-radius: 2px; margin-right: 10px;"></div>
            <h2 style="font-size: 18px; font-weight: 600; color: #1c1c1e; margin: 0;">Kategori: Jalur Prestasi</h2>
        </div>
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 10px;">
            <thead>
                <tr style="color: #8e8e93; font-size: 13px; text-transform: uppercase; text-align: left;">
                    <th style="padding: 10px 15px;">ID</th>
                    <th style="padding: 10px 15px;">Nama Calon</th>
                    <th style="padding: 10px 15px;">Asal Sekolah</th>
                    <th style="padding: 10px 15px; text-align: center;">Nilai Ujian</th>
                    <th style="padding: 10px 15px;">Biaya Dasar</th>
                    <th style="padding: 10px 15px;">Informasi Spesifik Jalur</th>
                    <th style="padding: 10px 15px; text-align: right;">Total Biaya Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dataPrestasi)): ?>
                    <tr><td colspan="7" style="text-align: center; padding: 20px; color: #8e8e93; background: #ffffff; border-radius: 12px;">Tidak ada data pendaftar.</td></tr>
                <?php else: ?>
                    <?php foreach ($dataPrestasi as $row): ?>
                        <?php 
                        $objekPrestasi = new PendaftaranPrestasi($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['jenis_prestasi'], $row['tingkat_prestasi']);
                        ?>
                        <tr style="background: #ffffff; box-shadow: 2px 2px 5px rgba(0,0,0,0.02); font-size: 14px; color: #3a3a3c;">
                            <td style="padding: 15px; border-top-left-radius: 12px; border-bottom-left-radius: 12px; font-weight: 600; color: #8e8e93;"><?php echo $row['id_pendaftaran']; ?></td>
                            <td style="padding: 15px; font-weight: 600; color: #1c1c1e;"><?php echo htmlspecialchars($row['nama_calon']); ?></td>
                            <td style="padding: 15px;"><?php echo htmlspecialchars($row['asal_sekolah']); ?></td>
                            <td style="padding: 15px; text-align: center; font-weight: 600; color: #007aff;"><?php echo $row['nilai_ujian']; ?></td>
                            <td style="padding: 15px; color: #636366;">Rp <?php echo number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                            <td style="padding: 15px; font-size: 13px; color: #34c759;"><?php echo htmlspecialchars($objekPrestasi->tampilkanInfoJalur()); ?></td>
                            <td style="padding: 15px; text-align: right; border-top-right-radius: 12px; border-bottom-right-radius: 12px; font-weight: 700; color: #24b04b;">Rp <?php echo number_format($objekPrestasi->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <!-- CONTAINER TABEL 3: KEDINASAN -->
    <div style="background: #f0f3f7; padding: 25px; border-radius: 20px; box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <div style="width: 4px; height: 20px; background-color: #ff2d55; border-radius: 2px; margin-right: 10px;"></div>
            <h2 style="font-size: 18px; font-weight: 600; color: #1c1c1e; margin: 0;">Kategori: Jalur Kedinasan</h2>
        </div>
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 10px;">
            <thead>
                <tr style="color: #8e8e93; font-size: 13px; text-transform: uppercase; text-align: left;">
                    <th style="padding: 10px 15px;">ID</th>
                    <th style="padding: 10px 15px;">Nama Calon</th>
                    <th style="padding: 10px 15px;">Asal Sekolah</th>
                    <th style="padding: 10px 15px; text-align: center;">Nilai Ujian</th>
                    <th style="padding: 10px 15px;">Biaya Dasar</th>
                    <th style="padding: 10px 15px;">Informasi Spesifik Jalur</th>
                    <th style="padding: 10px 15px; text-align: right;">Total Biaya Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dataKedinasan)): ?>
                    <tr><td colspan="7" style="text-align: center; padding: 20px; color: #8e8e93; background: #ffffff; border-radius: 12px;">Tidak ada data pendaftar.</td></tr>
                <?php else: ?>
                    <?php foreach ($dataKedinasan as $row): ?>
                        <?php 
                        $objekKedinasan = new PendaftaranKedinasan($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['sk_ikatan_dinas'], $row['instansi_sponsor']);
                        ?>
                        <tr style="background: #ffffff; box-shadow: 2px 2px 5px rgba(0,0,0,0.02); font-size: 14px; color: #3a3a3c;">
                            <td style="padding: 15px; border-top-left-radius: 12px; border-bottom-left-radius: 12px; font-weight: 600; color: #8e8e93;"><?php echo $row['id_pendaftaran']; ?></td>
                            <td style="padding: 15px; font-weight: 600; color: #1c1c1e;"><?php echo htmlspecialchars($row['nama_calon']); ?></td>
                            <td style="padding: 15px;"><?php echo htmlspecialchars($row['asal_sekolah']); ?></td>
                            <td style="padding: 15px; text-align: center; font-weight: 600; color: #007aff;"><?php echo $row['nilai_ujian']; ?></td>
                            <td style="padding: 15px; color: #636366;">Rp <?php echo number_format($row['biaya_pendaftaran_dasar'], 0, ',', '.'); ?></td>
                            <td style="padding: 15px; font-size: 13px; color: #ff2d55;"><?php echo htmlspecialchars($objekKedinasan->tampilkanInfoJalur()); ?></td>
                            <td style="padding: 15px; text-align: right; border-top-right-radius: 12px; border-bottom-right-radius: 12px; font-weight: 700; color: #ff2d55;">Rp <?php echo number_format($objekKedinasan->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>