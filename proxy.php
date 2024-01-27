<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

//Récupère les paramètres du formulaire
$gameName = $_GET['gameName'];
$tagLine = $_GET['tagLine'];
$apiKey = 'RGAPI-4007140b-d559-47ad-88ec-b66757f8a415';

//Construit l'URL de l'API de Riot Games
$url = "https://europe.api.riotgames.com/riot/account/v1/accounts/by-riot-id/$gameName/$tagLine?api_key=$apiKey";

$response = file_get_contents($url);

if ($response === FALSE) {
    //Affiche un message d'erreur détaillé
    die('Erreur lors de la requête : ' . error_get_last()['message']);
}

$data = json_decode($response, true);

//Démarre la session PHP
session_start();

//Stocke le PUUID et le nom dans des variables de session
$_SESSION['puuid'] = $data['puuid'];
$_SESSION['nom'] = $gameName;

//Envoi la réponse JSON au client
header('Content-Type: application/json');
echo $response;
?>