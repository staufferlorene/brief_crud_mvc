<?php

// Class ProduitsController

// Ce contrôleur gère les actions qui concernent la voiture
// Son but est de récupérer les données et d'inclure la vue

require_once __DIR__ . '/../models/Produit.php';

class ProduitsController {
    /**
     * function details
     * Afficher les détails du produit (selon l'id)
     *
     *@param int $id id du produit
     */

    // Afficher les produits
    public function details() {
        // Chargement du produit
        $produit = Produit::lister();

        if (!$produit){
            echo "Produit non trouvée";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . '/../views/produitDetail.php';
    }

    // Ajouter un produit
    public function add() {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
            $prix = isset($_POST['prix']) ? trim($_POST['prix']) : '';
            $stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';

            // Ajout du produit
            $produit = Produit::ajouter($nom, $prix, $stock);}

        // Redirection puis quitte
        header("Location: index.php");
        exit();

      // Inclusion de la vue
      include __DIR__ . '/../views/produitDetail.php';
    }



  /*  // Modifier un produit
    public function update() {
        // Chargement du produit
        $produit = Produit::modifier();

        if (!$produit){
            echo "Produit non trouvée";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . '/../views/produitDetail.php';
    }*/


    // A FAIRE function

}