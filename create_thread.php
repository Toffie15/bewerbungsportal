<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo 'Du musst eingeloggt sein!';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare('INSERT INTO threads (title, user_id, category_id) VALUES (?, ?, ?)');
    $stmt->execute([$title, $user_id, $category_id]);

    echo 'Thread erfolgreich erstellt!';
}
?>

<form method="post">
    Titel: <input type="text" name="title" required><br>
    Kategorie: <select name="category_id">
        <option value="1">Kategorie 1</option>
        <option value="2">Kategorie 2</option>
    </select><br>
    <button type="submit">Thread erstellen</button>
</form>
