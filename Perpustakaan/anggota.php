<?php
class Anggota {
    private $idAnggota;
    private $nama;

    public function __construct($idAnggota, $nama) {
        $this->idAnggota = $idAnggota;
        $this->nama = $nama;
    }

    public function getIdAnggota() {
        return $this->idAnggota;
    }

    public function getNama() {
        return $this->nama;
    }

    public function tampilkanInfo() {
        echo "ID Anggota: {$this->idAnggota}<br>";
        echo "Nama: {$this->nama}<br>";
    }
}
?>