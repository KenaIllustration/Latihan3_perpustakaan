<?php
require_once "buku.php";
require_once "anggota.php";
require_once "peminjaman.php";

$buku1 = new Buku("Belajar PHP Dasar", "Rudi Hartono", 3);
$buku2 = new Buku("Pemrograman Web", "Sari Dewi", 2);
$buku3 = new Buku("Basis Data Dasar", "Putu Arya", 1);

$anggota1 = new Anggota("A001", "Budi");
$anggota2 = new Anggota("A002", "Ani");
$anggota3 = new Anggota("A003", "Made");

echo "<h2>Sistem Peminjaman Buku</h2>";

echo "<h3>Proses Peminjaman</h3>";
$pinjam1 = new Peminjaman($anggota1, $buku1);
$pinjam1->pinjam("2026-10-20");
$pinjam1->kembalikan("2026-10-27");

$pinjam2 = new Peminjaman($anggota2, $buku2);
$pinjam2->pinjam("2026-10-25");

$pinjam3 = new Peminjaman($anggota3, $buku3);
$pinjam3->pinjam("2026-10-28");

$daftarPinjam = [$pinjam1, $pinjam2, $pinjam3];
$daftarBuku = [$buku1, $buku2, $buku3];

echo "<h3>Daftar Peminjaman</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama Anggota</th><th>Buku yang Dipinjam</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Status</th></tr>";
$no = 1;
foreach ($daftarPinjam as $p) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $p->getAnggota()->getNama() . "</td>";
    echo "<td>" . $p->getBuku()->getJudul() . "</td>";
    echo "<td>" . $p->getTanggalPinjam() . "</td>";
    echo "<td>" . $p->getTanggalKembali() . "</td>";
    echo "<td>" . $p->getStatus() . "</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";

echo "<h3>Stok Buku</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>No</th><th>Judul Buku</th><th>Penulis</th><th>Stok</th></tr>";
$no = 1;
$totalStok = 0;
foreach ($daftarBuku as $b) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $b->getJudul() . "</td>";
    echo "<td>" . $b->getPenulis() . "</td>";
    echo "<td>" . $b->getStok() . "</td>";
    echo "</tr>";
    $totalStok = $totalStok + $b->getStok();
    $no++;
}
echo "<tr><th colspan='3'>Total Stok</th><th>" . $totalStok . "</th></tr>";
echo "</table>";
?>
