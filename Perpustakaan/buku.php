<?php
class Buku {
    private $judul;
    private $penulis;
    private $stok;

    public function __construct($judul, $penulis, $stok) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->stok = $stok;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function getStok() {
        return $this->stok;
    }

    public function setStok($stok) {
        if ($stok >= 0) {
            $this->stok = $stok;
        } else {
            echo "Stok {$stok} tidak valid!<br>";
        }
    }

    public function tampilkanInfo() {
        echo "Judul: {$this->judul}<br>";
        echo "Penulis: {$this->penulis}<br>";
        echo "Stok: {$this->stok}<br>";
    }
}
?>