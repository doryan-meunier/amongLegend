const apiKey = "RGAPI-089bc969-c402-4645-937e-028e1a5b3d5a"; 
const gameName = "Doteos"; 
const tagLine = "GOD"; 

// Obtain PUUID from Riot ID
fetch(`https://na1.api.riotgames.com/riot/account/v1/accounts/by-riot-id/${gameName}/${tagLine}?api_key=${apiKey}`)
    .then(response => response.json())
    .then(data => {
        const puuid = data.puuid;

        console.log("PUUID:", puuid);

        fetch(`https://na1.api.riotgames.com/lol/summoner/v4/summoners/by-puuid/${puuid}?api_key=${apiKey}`)
            .then(response => response.json())
            .then(summonerData => {
                console.log("Summoner ID:", summonerData.id);
                console.log("Summoner Name:", summonerData.name);
                console.log("Riot ID:", `${gameName}#${tagLine}`);
            })
            .catch(error => console.error("Error fetching summoner data:", error));
    })
    .catch(error => console.error("Error fetching PUUID:", error));
