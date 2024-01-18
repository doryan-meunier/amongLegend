<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

// Récupérer les paramètres du formulaire
$gameName = $_GET['gameName'];
$tagLine = $_GET['tagLine'];
$apiKey = 'RGAPI-089bc969-c402-4645-937e-028e1a5b3d5a';

// Construire l'URL de l'API de Riot Games
$url = "https://europe.api.riotgames.com/riot/account/v1/accounts/by-riot-id/$gameName/$tagLine?api_key=$apiKey";

$response = file_get_contents($url);

if ($response === FALSE) {
    // Afficher un message d'erreur détaillé
    die('Erreur lors de la requête : ' . error_get_last()['message']);
}

$data = json_decode($response, true);

// Démarrer la session PHP
session_start();

// Stocker le PUUID et le nom dans des variables de session
$_SESSION['puuid'] = $data['puuid'];
$_SESSION['nom'] = $gameName;

// Envoyer la réponse JSON au client
header('Content-Type: application/json');
echo $response;
?>