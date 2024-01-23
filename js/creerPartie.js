/////////////////////////           SELECTION DES ROLES           /////////////////////////

function carte(idcarte) {
    var carte = document.getElementById(idcarte);
    if (carte.style.backgroundColor == 'rgb(138, 255, 161)')
        deselectionCarte(carte);
    else
        selectionCarte(carte);
}

function selectionCarte(carte) {
    carte.style.backgroundColor = 'rgb(138, 255, 161)';
}

function deselectionCarte(carte) {
    carte.style.backgroundColor = 'white';
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