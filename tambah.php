<?php
require 'Book.php';
require 'koneksi.php';
$database = new Database();
$bookObj = new Book($database->conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookObj->tambahBuku($_POST['title'], $_POST['author'], $_POST['published_year'], $_POST['genre']);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Tambah Buku Baru</h2>
        <form action="tambah.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="published_year" class="form-label">Published Year</label>
                <input type="number" name="published_year" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Tambah Buku</button>
        </form>
    </div>
</body>
</html>