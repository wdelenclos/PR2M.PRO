<?php



// Création  compte avec succès
function notification(){
    switch ($_GET['n']) {
        case 100:
            echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Bienvenue " . $_SESSION['prenom'] . " ! Votre compte a bien été enregistré, notez bien votre identifiant: <strong>" . $_SESSION['identifiant'] . "</strong></div>";
            break;
        case 200:
            echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Utilisateur créée avec succès !</div>";
            break;
    }
}

