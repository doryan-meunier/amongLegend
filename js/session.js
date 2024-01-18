document.addEventListener("DOMContentLoaded", function () {

////////////                        index                        ////////////









////////////                     choixPartie.                    ////////////
function expand(side) {
    document.querySelector('.' + side).classList.add('hovered');
}

function shrink(side) {
    document.querySelector('.' + side).classList.remove('hovered');
}

document.querySelector('.left').addEventListener('click', function() {
    // Redirection vers la page pour rejoindre une partie
    window.location.href = 'rejoindrePartie.html';
});

document.querySelector('.right').addEventListener('click', function() {
    // Redirection vers la page pour créer une partie
    window.location.href = 'creerPartie.html';
});



});