<?php

class Book {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tampilBuku() {
        $stmt = $this->conn->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahBuku($title, $author, $published_year, $genre) {
        $stmt = $this->conn->prepare("INSERT INTO books (title, author, published_year, genre) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $author, $published_year, $genre]);
    }

    public function getBookById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBuku($id, $title, $author, $published_year, $genre) {
        $stmt = $this->conn->prepare("UPDATE books SET title = ?, author = ?, published_year = ?, genre = ? WHERE id = ?");
        return $stmt->execute([$title, $author, $published_year, $genre, $id]);
    }

    public function hapusBuku($id) {
        $stmt = $this->conn->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }

}
?>