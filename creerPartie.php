<?php
    session_start();
    if (!isset($_SESSION['idPartie'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/creerPartie.css">
    <title>Rejoindre partie</title>
</head>
<body id="body">

<div class="gameTypeContainer">
    <input type="checkbox" id="toggle" class="toggleCheckbox" />
    <label for="toggle" class='toggleContainer' onclick="toggleFond()">
      <div>Normal Game</div>   
      <div>Partie Perso</div>
    </label>
</div>

<div class="carteContainer">
<?php
    
?>
    <div class="roleCarte" id="Imposteur" onclick="carte(this.id)">
        <img src="images/creerPartie/roles/impostor.jpg" alt="Imposteur">
        <div class="roleInfos">
            <h2>Imposteur</h2>
            <p>Faire perdre la game sans se faire démasquer</p>
        </div>
    </div>
    
    <div class="roleCarte" id="Droide" onclick="carte(this.id)">
        <img src="images/creerPartie/roles/droide.jpg" alt="Droide">
        <div class="roleInfos">
            <h2>Droïde</h2>
            <p>Gagner la game en suivant les instructions reçues</p>
        </div>
    </div>
    
    <div class="roleCarte" id="Serpentin" onclick="carte(this.id)">
        <img src="images/creerPartie/roles/serpentin.jpg" alt="Serpentin">
        <div class="roleInfos">
            <h2>Serpentin</h2>
            <p>Gagner la game en ayant le plus de morts et de dégâts de sa team</p>
        </div>
    </div>
    
    <div class="roleCarte" id="Double-face" onclick="carte(this.id)">
        <img src="images/creerPartie/roles/doubleFace.jpg" alt="Double-face">
        <div class="roleInfos">
            <h2>Double-face</h2>
            <p>Change de rôle aléatoirement. Doit gagner la game en tant que gentil ou perdre en imposteur</p>
        </div>
    </div>
    
    <div class="roleCarte" id="Super-héros" onclick="carte(this.id)">
        <img src="images/creerPartie/roles/superHero.png" alt="Super-héros">
        <div class="roleInfos">
            <h2>Super-héros</h2>
            <p>Gagner la game en ayant le plus de dégâts, d'assistances et de kills. Gravement pénalisé en cas de défaite</p>
        </div>
    </div>
</div>



<div id="normalPlayerContainer">

    <div id="normalj4">
        <img src="images/creerPartie/joueurs/plusJoueur.png" alt="Player 4" class="boutonPlus">     
        <img src="images/creerPartie/joueurs/joueur.png" alt="Player 4" class="normalPlayer normalQuatrieme">
    </div>

    <div id="normalj2">
        <img src="images/creerPartie/joueurs/plusJoueur.png" alt="Player 2" class="boutonPlus">
        <img src="images/creerPartie/joueurs/joueur.png" alt="Player 2" class="normalPlayer normalDeuxieme">
    </div>

    <div id="normalj1">
        <img src="images/creerPartie/joueurs/joueur.png" alt="Player 1" class="normalPlayer normalPremier">
    </div>

    <div id="normalj3">
        <img src="images/creerPartie/joueurs/plusJoueur.png" alt="Player 3" class="boutonPlus">
        <img src="images/creerPartie/joueurs/joueur.png" alt="Player 3" class="normalPlayer normalTroisieme">
    </div>

    <div id="normalj5">
        <img src="images/creerPartie/joueurs/plusJoueur.png" alt="Player 5" class="boutonPlus">
        <img src="images/creerPartie/joueurs/joueur.png" alt="Player 5" class="normalPlayer normalCinquieme">
    </div>
</div>

<div id="persoPlayerContainer">

    <div class="joueurPerso gauche cadre">
        <div id="persoj1" class="infoConteneur">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
            <p>nom jouer</p>
        </div>
    </div>

    <div class="joueurPerso droite cadre">
        <div class="btn" id="btn1">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso gauche cadre">

    </div>

    <div class="joueurPerso droite cadre">
        
    </div>

    <div class="joueurPerso gauche cadre">

    </div>

    <div class="joueurPerso droite cadre">
        
    </div>

    <div class="joueurPerso gauche cadre">

    </div>

    <div class="joueurPerso droite cadre">
        
    </div>

    <div class="joueurPerso gauche cadre">

    </div>

    <div class="joueurPerso droite cadre">
        
    </div>













<!--
    <div class="joueurPerso droite cadre">
        <div id="persoj2">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn2">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso gauche cadre">
        <div id="persoj3">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn3">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso droite cadre" id="persoj7">
        <div id="persoj4">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn4">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso gauche cadre" id="persoj9">
        <div id="persoj5">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn5">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso droite cadre" id="persoj2">
        <div id="persoj6">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn6">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso gauche cadre" id="persoj4">
        <div id="persoj7">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn7">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso droite cadre" id="persoj6">
        <div id="persoj8">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn8">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso gauche cadre" id="persoj8">
        <div id="persoj9">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn9">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>

    <div class="joueurPerso droite cadre" id="persoj10">
        <div id="persoj10">
            <img src="images/creerPartie/joueurs/pp.png" alt="pp">
        </div>

        <div class="btn" id="btn10">
            <button class="custom-button">Rejoindre</button>
        </div>
    </div>
-->


    
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="js/creerPartie.js"></script>
</body>

</html>