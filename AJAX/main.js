// SOURCE: https://api.code.jquery.com/jQuery.ajax/
// EXTENSION: jQuery Code Snippets 

// Quand le DOM est entièrement chargé...
$(document).ready(function() {

    // Je capte l'événement 'click' sur le bouton '#action'
    $('#action').click(function() {

        // J'effectue une requête AJAX pour lire et récupérer les données dans le fichier "ajax-info.txt"
        $.ajax({
        // ajax() représente l'objet XMLHttpRequest
            url: "ajax-info.txt",
            type: GET, // Par défaut, la méthode sollicitée est GET
            dataType: "text",
            success: function(data) {
                // Je récupère les données et je les affecte à mon <h1> avec la méthode '.html()'
                console.log(data);
                $('#demo').html(data);
            }

        })

        // Autre METHODE avec '.done'

        // $.ajax({
        //     url: "ajax-info.txt",
        //     dataType: "text",
            
        // }).done(function (data) {

        //     console.log(data);
        //     $('#demo').html(data);

        // }).fail(function() {
        //     // taper instruction ci-dessous
        // })
    })
})

// SOURCE: https://api.code.jquery.com/jQuery.ajax/
// EXTENSION: jQuery Code Snippets 

// Quand le DOM est entièrement chargé...
$(document).ready(function() {

    // Je capte l'événement 'click' sur le bouton '#action'
    $('#action').click(function() {

        // J'effectue une requête AJAX pour lire et récupérer les données dans le fichier "ajax-info.txt"
        $.ajax({
        // ajax() représente l'objet XMLHttpRequest
            url: "ajax-info.txt",
            type: GET, // Par défaut, la méthode sollicitée est GET
            dataType: "text",
            success: function(data) {
                // Je récupère les données et je les affecte à mon <h1> avec la méthode '.html()'
                console.log(data);
                $('#demo').html(data);
            }

        })

        // Autre METHODE avec '.done'

        // $.ajax({
        //     url: "ajax-info.txt",
        //     dataType: "text",
            
        // }).done(function (data) {

        //     console.log(data);
        //     $('#demo').html(data);

        // }).fail(function() {
        //     // taper instruction ci-dessous
        // })
    })
})

