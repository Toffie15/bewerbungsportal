<?php
$host = 'localhost';
$dbname = 'meinServerForum';
$username = 'root'; // Benutzername, den du beim Hosting einrichtest
$password = ''; // Passwort, das du beim Hosting einrichtest

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}
?>
