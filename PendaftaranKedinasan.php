<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Metode Query Spesifik
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementasi wajib dari abstract method induk
    public function hitungTotalBiaya() {
    // Dikenakan surcharge/biaya tambahan administrasi khusus sebesar 25%
    return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | Instansi: " . $this->instansiSponsor . " | No SK: " . $this->skIkatanDinas;
    }
}
?>