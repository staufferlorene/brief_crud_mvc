<?php

// Class ProduitsController

// Ce contrôleur gère les actions qui concernent la voiture
// Son but est de récupérer les données et d'inclure la vue

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Produits.php';

class ProduitsController {
    /**
     * function details
     * Afficher les détails du produit (selon l'id)
     *
     *@param int $id_produits id du produit
     */

    // Afficher les produits
    public function details(int $id_produits) {
        // Chargement du produit
        $produit = Produits::lister();

        if (!$produit){
            echo "Produits non trouvé";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . '/../views/produitDetail.php';
    }

    // Ajouter un produit
    public function add() {

        Produits::ajouter($_POST['nom'], $_POST['prix'], $_POST['stock']);

        // Redirection
        header("Location: index.php");

      // Inclusion de la vue
      include __DIR__ . '/../views/produitDetail.php';
    }

    public function delete() {
        Produits::delete($_GET['id_produits']);
        header("Location: index.php");
        exit();
    }

    public function modifier($id_produits) {
        Produits::modifier($_POST['nom'], $_POST['prix'], $_POST['stock'], $id_produits);
        header("Location: index.php");
        exit();
    }
}