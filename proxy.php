<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$gameName = $_GET['gameName'];
$tagLine = $_GET['tagLine'];
$apiKey = 'RGAPI-089bc969-c402-4645-937e-028e1a5b3d5a';

$url = "https://europe.api.riotgames.com/riot/account/v1/accounts/by-riot-id/$gameName/$tagLine?api_key=$apiKey";

$response = file_get_contents($url);

echo $response;
?>