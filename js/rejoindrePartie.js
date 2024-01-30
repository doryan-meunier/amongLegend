document.addEventListener("DOMContentLoaded", function () {
    const inputRechercheNavbar = document.getElementById('recherchePartieInputNavbar');
    const parties = document.querySelectorAll('.card'); // Sélectionnez toutes les cartes

    inputRechercheNavbar.addEventListener('input', function () {
        const termeRecherche = inputRechercheNavbar.value.toLowerCase();

        parties.forEach(function (partie) {
            const cardHeader = partie.querySelector('.card-header');
            const cardTitle = partie.querySelector('.card-title');

            if (cardHeader && cardTitle) {
                const nomPartie = cardHeader.innerText.toLowerCase();
                const createurPartie = cardTitle.innerText.toLowerCase();

                if (nomPartie.includes(termeRecherche) || createurPartie.includes(termeRecherche)) {
                    partie.style.display = 'block';
                } else {
                    partie.style.display = 'none';
                }
            }
        });
    });

    const triPartiesDropdown = document.getElementById('triPartiesDropdown');
    const partiesListe = document.getElementById('partiesListe');

    triPartiesDropdown.addEventListener('click', function (event) {
        if (event.target.dataset.tri === 'alphabetique') {
            trierPartiesAlphabetique();
        }else if (event.target.dataset.tri === 'alphabetique-inverse') {
            trierPartiesAlphabetiqueInverse();
        }else if (event.target.dataset.tri === 'joueurs') {
            trierPartiesParNombreJoueurs();
        }
    });

    function trierPartiesAlphabetique() {
        console.log("A")
        const partiesArray = Array.from(partiesListe.children);
    
        // Filtrer les éléments pour ne conserver que ceux avec la classe .card
        const cartesArray = partiesArray.filter(element => element.classList.contains('card'));
    
        const partiesTriees = cartesArray.sort((a, b) => {
            const nomAElement = a.querySelector('.card-header');
            const nomBElement = b.querySelector('.card-header');
    
            if (nomAElement && nomBElement && nomAElement.innerText && nomBElement.innerText) {
                const nomA = nomAElement.innerText.toLowerCase();
                const nomB = nomBElement.innerText.toLowerCase();
                return nomA.localeCompare(nomB);
            }
    
            return 0;
        });
        
    
        partiesListe.innerHTML = '';
    
        partiesTriees.forEach(partie => {
            partiesListe.appendChild(partie);
        });
    }
    function trierPartiesAlphabetiqueInverse() {
        const partiesArray = Array.from(partiesListe.children);
        const cartesArray = partiesArray.filter(element => element.classList.contains('card'));
    
        cartesArray.sort((a, b) => {
            const nomAElement = a.querySelector('.card-header');
            const nomBElement = b.querySelector('.card-header');
    
            if (nomAElement && nomBElement && nomAElement.innerText && nomBElement.innerText) {
                const nomA = nomAElement.innerText.toLowerCase();
                const nomB = nomBElement.innerText.toLowerCase();
                return nomB.localeCompare(nomA);
            }
    
            return 0;
        });
    
        partiesListe.innerHTML = '';
    
        cartesArray.forEach(partie => {
            partiesListe.appendChild(partie);
        });
    }
    function trierPartiesParNombreJoueurs() {
        const partiesArray = Array.from(partiesListe.children);
        const cartesArray = partiesArray.filter(element => element.classList.contains('card'));
    
        const partiesNonPleines = cartesArray.filter(partie => {
            const nbJoueursElement = partie.querySelector('.nbJoueurs');
    
            if (nbJoueursElement) {
                const contenuNbJoueurs = nbJoueursElement.innerText;
                const partieNumerique = contenuNbJoueurs.substring(contenuNbJoueurs.lastIndexOf(':') + 1).trim();
                const nbJoueurs = parseInt(partieNumerique.split('/')[0], 10);
                const maxJoueurs = parseInt(partieNumerique.split('/')[1], 10);
    
                console.log(nbJoueurs + "/" + maxJoueurs);
                return nbJoueurs < maxJoueurs;
            }
    
            return false;
        });
    
        const partiesPleines = cartesArray.filter(partie => {
            const nbJoueursElement = partie.querySelector('.nbJoueurs');
    
            if (nbJoueursElement) {
                const contenuNbJoueurs = nbJoueursElement.innerText;
                const partieNumerique = contenuNbJoueurs.substring(contenuNbJoueurs.lastIndexOf(':') + 1).trim();
                const nbJoueurs = parseInt(partieNumerique.split('/')[0], 10);
                const maxJoueurs = parseInt(partieNumerique.split('/')[1], 10);
    
                return nbJoueurs === maxJoueurs;
            }
    
            return false;
        });
    
        const partiesTriees = [...partiesNonPleines, ...partiesPleines];
    
        partiesListe.innerHTML = '';
    
        partiesTriees.forEach(partie => {
            partiesListe.appendChild(partie);
        });
    }    
    
});