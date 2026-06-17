<?php
// PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Metode Query Spesifik
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementasi wajib dari abstract method induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar; // Nanti bisa dikurangi potongan prestasi di Tahap Polimorfisme
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Jenis: " . $this->jenisPrestasi . " (" . $this->tingkatPrestasi . ")";
    }
}
?>