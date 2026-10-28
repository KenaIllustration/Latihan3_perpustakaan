<?php
require_once "buku.php";
require_once "anggota.php";

class Peminjaman {
    private $anggota;
    private $buku;
    private $tanggalPinjam;
    private $tanggalKembali;
    private $status;

    public function __construct($anggota, $buku) {
        $this->anggota = $anggota;
        $this->buku = $buku;
        $this->tanggalPinjam = "-";
        $this->tanggalKembali = "-";
        $this->status = "Belum dipinjam";
    }

    public function getAnggota() {
        return $this->anggota;
    }

    public function getBuku() {
        return $this->buku;
    }

    public function getTanggalPinjam() {
        return $this->tanggalPinjam;
    }

    public function getTanggalKembali() {
        return $this->tanggalKembali;
    }

    public function getStatus() {
        return $this->status;
    }

    public function pinjam($tanggal) {
        if ($this->status != "Belum dipinjam") {
            echo "Transaksi ini sudah diproses.<br>";
        } else if ($this->buku->getStok() <= 0) {
            echo "Maaf, stok buku '" . $this->buku->getJudul() . "' sedang habis.<br>";
        } else {
            $this->buku->setStok($this->buku->getStok() - 1);
            $this->tanggalPinjam = $tanggal;
            $this->status = "Dipinjam";
            echo $this->anggota->getNama() . " berhasil meminjam buku '" . $this->buku->getJudul() . "'.<br>";
        }
    }

    public function kembalikan($tanggal) {
        if ($this->status == "Dipinjam") {
            $this->buku->setStok($this->buku->getStok() + 1);
            $this->tanggalKembali = $tanggal;
            $this->status = "Dikembalikan";
            echo $this->anggota->getNama() . " mengembalikan buku '" . $this->buku->getJudul() . "'.<br>";
        } else {
            echo "Buku ini belum dipinjam atau sudah dikembalikan.<br>";
        }
    }

    public function tampilkanInfo() {
        echo "Peminjam: " . $this->anggota->getNama() . " (" . $this->anggota->getIdAnggota() . ")<br>";
        echo "Buku: " . $this->buku->getJudul() . " oleh " . $this->buku->getPenulis() . "<br>";
        echo "Tanggal Pinjam: {$this->tanggalPinjam}<br>";
        echo "Tanggal Kembali: {$this->tanggalKembali}<br>";
        echo "Status: {$this->status}<br>";
    }
}
?>
