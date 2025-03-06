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

// Inclusion des contrôleurs
require_once 'controllers/ProduitsControllers.php';

// Récupération des paramètres de l'action via l'URL (ex : index.php?action=details)
$action = isset($_GET['action']) ? $_GET['action'] : 'details';

// Même chose avec l'id
$id_produits = isset($_GET['id_produits']) ? intval($_GET['id_produits']) : 0;

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
        // Appel de la méthode pour afficher les détails du produit
        $controller->details($id_produits);
        break;

    case 'add':
        // Appel de la méthode pour ajouter un produit
        $controller->add();
        break;

    case "modifier" :
        // Appel de la méthode pour modifier les détails du produit
        $controller->modifier($id_produits);
        break;

    // Appel de la méthode pour supprimer un produit
    case "delete" :
        $controller->delete();
        break;

    //Après avoir fini tous les cas on fait un default
    default:
        // Si l'action n'existe pas
        echo "Action n'existe pas";

}