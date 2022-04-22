<?php
include_once("include/header.php");
require_once("include/nav.php");
// La différence entre include et require est en cas d'erreur sur l'appel du fichier:
    // - include : génère une erreur et poursuit l'execution du script
    // - require : génère une erreur et interrompt l'execution du script
// si l'on a ajouté _once, on vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.
?>

<h1 class="display-4 text-center">Contact</h1>

<?php
include_once("include/footer.php");
?>
