<?php
/**
 *Front controller
 *
 * Point d'entrée de l'application
 * Il lit les paramètres passés dans l'URL
 * Selon ces paramètres, il instancie le contrôleur qui convient
 */

// Démarrage de la session
session_start();

// Inclusion des contrôleurs (ici il n'y a que voiture)
require_once 'controllers/ProduitsControllers.php';

// Récupération des paramètres de l'action via l'URL (ex : index.php?action=details)
$action = isset($_GET['action']) ? $_GET['action'] : 'details';

// Même chose avec l'id
$id_produits = isset($_GET['id_produits']) ? intval($_GET['id_produits']) : 1;

// Instanciation du contrôleur
$controller = new ProduitsController();

// Routage (selon la valeur de l'action)
/*if ($action == 'details') {
    // Appel de la méthode pour afficher les détails de la voiture
    $controller->details($id);
} else {
    // Si l'action n'existe pas
    echo "Action n'existe pas";
}*/

// if et else du dessus écrit avec un switch
switch ($action) {
    case 'details':
        // Appel de la méthode pour afficher les détails de la voiture
        $controller->details($id_produits);
        break;

    case 'add':
        // Appel de la méthode pour afficher les détails de la voiture
        $controller->add($id_produits);
        break;

/*    // Appel de la méthode pour réparer la voiture
    case 'repair':
        $controller->repair($id);
        break;

    // Appel de la méthode pour constater la panne de la voiture
    case 'constat':
        $controller->constat($id);
        break;*/

    //Après avoir fini tous les cas on fait un default
    default:
        // Si l'action n'existe pas
        echo "Action n'existe pas";

}