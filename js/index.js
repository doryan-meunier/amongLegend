function submitForm() {
    //Récupère les valeurs du formulaire
    var nom = document.getElementById("inputNomUser").value;
    var tag = document.getElementById("inputTagUser").value;
    
    //Construit l'URL du proxy PHP avec les valeurs du formulaire
    var proxyUrl = "http://localhost/amongLegend/proxy.php?gameName=" + encodeURIComponent(nom) + "&tagLine=" + encodeURIComponent(tag);
    
    //Effectue la requête AJAX avec le proxy PHP
    fetch(proxyUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('La requête a échoué avec le statut ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            //Traite les données
            console.log(data);
            window.location.href = 'creerJoueur.php';
        })
        .catch(error => {
            console.error('Erreur lors de la requête AJAX:', error);
        });
}