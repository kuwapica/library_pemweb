<?php

require 'koneksi.php';
require 'Book.php';
$database = new Database();
$bookObj = new Book($database->conn);
$books = $bookObj->tampilBuku();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Manajemen Buku Perpustakaan</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Buku</a>
        <table id="booksTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($books as $row): ?>
                    <tr>
                        <td><?= ($row['id']) ?></td>
                        <td><?= ($row['title']) ?></td>
                        <td><?= ($row['author']) ?></td>
                        <td><?= ($row['published_year']) ?></td>
                        <td><?= ($row['genre']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#booksTable').DataTable();
        });
</script>

</body>


</html>

