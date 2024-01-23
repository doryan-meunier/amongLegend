<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=connection;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM festival");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);
    exit(); // Assurez-vous de terminer le script après avoir envoyé la réponse JSON

} catch (PDOException $e) {
    header('Location: rejoindrePartie.php');
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>
