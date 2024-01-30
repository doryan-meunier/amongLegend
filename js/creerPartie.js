/////////////////////////           SELECTION DES ROLES           /////////////////////////

function carte(idcarte) {
    var carte = document.getElementById(idcarte);
    var etat = 0;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updateCarte.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
        }
    };
    if (carte.classList.contains("selected")) {
        carte.classList.remove("selected");
        etat = 0;
    } else {
        carte.classList.add("selected");
        etat = 1;
    }
    var data = "role=" + idcarte + "&etat=" + etat;
    xhr.send(data);
}


/////////////////////////           CHANGEMENT DE MODE           /////////////////////////

function toggleFond() {
    var body = document.getElementById('body');
    var checkBox = document.getElementById('toggle');
    var normalJoueurs = document.getElementById('normalPlayerContainer');
    var persoJoueurs = document.getElementById('persoPlayerContainer');

    if (checkBox.checked == true)
    {
        body.style.backgroundImage = 'url("https://raw.githubusercontent.com/doryan-meunier/amongLegend/main/images/creerPartie/SummonersRift.jpeg")';
        normalJoueurs.style.display = 'flex';
        persoJoueurs.style.display = 'none';
    }
    else
    {
        body.style.backgroundImage = 'url("https://raw.githubusercontent.com/doryan-meunier/amongLegend/main/images/creerPartie/howlingAbyss.jpeg")';
        normalJoueurs.style.display = 'none';
        persoJoueurs.style.display = 'flex';
    }
}



/////////////////////////           CHANGEMENT POSITION PERSO           /////////////////////////

function changerPosition(idJoueur, idBouton) {

}





/////////////////////////            RECUPERATION JSON                     ///////////////////////////

$.ajax({
    type: "GET",
    url: "jsonBdd.php",
    dataType: "json",
    success: function (data) {
        console.log(data);
    },
    error: function (xhr, status, error) {
        console.error("Erreur lors de la récupération des données:", status, error);
    }
});



/////////////////////////            RECUPERATION JSON                     ///////////////////////////