<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo 'Du musst eingeloggt sein!';
    exit;
}

$thread_id = $_GET['thread_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare('INSERT INTO posts (thread_id, user_id, content) VALUES (?, ?, ?)');
    $stmt->execute([$thread_id, $user_id, $content]);

    echo 'Beitrag erfolgreich erstellt!';
}
?>

<form method="post">
    Beitrag: <textarea name="content" required></textarea><br>
    <button type="submit">Beitrag erstellen</button>
</form>
