<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $nachricht = htmlspecialchars($_POST["nachricht"]);

    $eintrag = "Name: $name\nE-Mail: $email\nNachricht: $nachricht\n---\n";

    file_put_contents("bewerbungen.txt", $eintrag, FILE_APPEND);

    echo "Danke für deine Bewerbung!";
} else {
    echo "Ungültige Anfrage.";
}
?>
