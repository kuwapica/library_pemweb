<?php
require 'Book.php';
require 'koneksi.php';

$database = new Database();
$bookObj = new Book($database->conn);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid book ID.");
}

$id = $_GET['id'];
$book = $bookObj->getBookById($id);

if (!$book) {
    die("Book not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $genre = $_POST['genre'];

    if ($bookObj->updateBuku($id, $title, $author, $published_year, $genre)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='text-danger'>Gagal mengupdate buku.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Update Buku</h2>
    <form action="update.php?id=<?= ($id) ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= ($book['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="<?= ($book['author']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="published_year" class="form-label">Published Year</label>
            <input type="number" name="published_year" class="form-control" value="<?= ($book['published_year']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" value="<?= ($book['genre']) ?>">
        </div>
        <button type="submit" class="btn btn-warning">Update Buku</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
