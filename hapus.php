<?php
require 'Book.php';
require 'koneksi.php';

$database = new Database();
$bookObj = new Book($database->conn);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid book ID.");
}

$id = $_GET['id'];

if ($bookObj->hapusBuku($id)) {
    header("Location: index.php");
    exit();
} else {
    echo "<p class='text-danger'>Gagal menghapus buku.</p>";
}
?>
