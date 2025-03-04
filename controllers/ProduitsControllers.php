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

    public function details() {
/*    public function details(int $id_produits) {*/
        // Chargement du produit
        $produit = Produit::lister();
     /*   $produit = Produit::lister($id_produits);*/

        if (!$produit){
            echo "Produit non trouvée";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . '/../views/produitDetail.php';
    }

    // A FAIRE function

}