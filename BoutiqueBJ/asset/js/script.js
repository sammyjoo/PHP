/* JS */


// ---- Disparaître les notifications

// création de la fonction messageOff()
function messageOff()
{
    if(document.querySelector(".disparition"))
    {
        setTimeout(
            function() // quoi ? display none sur la class
            {
                document.querySelector(".disparition").style.display = "none";
            },
            3000 // quand ? temps en millisecondes
        )
    }
}


// appel de la fonction
messageOff();
