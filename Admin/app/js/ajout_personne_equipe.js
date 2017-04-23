$(document).ready(function(){
    var maximum_p = 10;
    var wrapper = $(".form-ajout-equipe");
    var ajout_bouton = $("#ajout_bouton");

    var x = 1; // Initialisation du nombre d'input (ici 1 car il y a déjà le premier de crée)
    $(ajout_bouton).click(function(e){ // Evènement lors du clique
        e.preventDefault(); // Permet de ne pas rediriger vers une autre page au cas où
        if(x < maximum_p){
            x++;
            $(wrapper).append('<select class="form-control" id="sel1"><?php $utilisateurs = new utilisateur; $list_utilisateurs = $utilisateurs->getUtilisateurs(); $utilisateurs->fillInputUtilisateur($list_utilisateurs); ?></select>')
        }
    })
});