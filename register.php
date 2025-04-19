<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$username, $email, $password]);

    echo 'Registrierung erfolgreich!';
}
?>

<form method="post">
    Benutzername: <input type="text" name="username" required><br>
    E-Mail: <input type="email" name="email" required><br>
    Passwort: <input type="password" name="password" required><br>
    <button type="submit">Registrieren</button>
</form>
