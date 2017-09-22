<?php



// Création  compte avec succès
function notification(){
    switch ($_GET['n']) {
        case 100:
            echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Bravo " . $_SESSION['prenom'] . " ! Le compte a bien été enregistré, notez bien l'identifiant: <strong>" . $_GET['id'] . "</strong></div>";
            break;
	    case 400:
		    echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Bravo " . $_SESSION['prenom'] . " ! Le praticien a bien été supprimé: <strong>" . $_GET['id'] . "</strong></div>";
		    break;
	    case 420:
		    echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Bravo " . $_SESSION['prenom'] . " ! Le patient a bien été supprimé.</div>";
		    break;
	    case 500:
		    echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Erreur " . $_SESSION['prenom'] . " ! Voici l'erreur: <strong>" . $_GET['erreur'] . "</strong></div>";
		    break;
	    case 560:
		    echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Identifiant introuvable</strong></div>";
		    break;

        case 200:
            echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span> </button>Utilisateur créée avec succès !</div>";
            break;
    }
}

