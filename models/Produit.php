<?php

require 'Database.php';

class Produit {

    // propriétés privées (encapsulation)
    private $id_produits; // id unique de la BDD
    private $nom;
    private $prix;
    private $stock;

    // Constructeur : initialisation du produit
    // public function => pour que la fonction soit accessible partout
    public function __construct($nom, $prix, $stock, $id_produits = null) {
        $this->nom         = $nom;
        $this->prix        = $prix;
        $this->stock       = $stock;
        $this->id_produits = $id_produits;
    }

    // Getter pour l'id
    public function getId() {
        return $this->id_produits;
    }

    // Getter pour le nom
    public function getNom() {
        return $this->nom;
    }

    // Getter pour le prix
    public function getPrix() {
        return $this->prix;
    }

    // Getter pour le stock
    public function getStock() {
        return $this->stock;
    }

    // Get des détails du produit
    public function getDetails() {
        return "Produit : " .$this->id_produits . $this->nom . " " . $this->prix . " " . $this->stock;
    }

     //Méthode pour charger les produits provenant de la BDD
    /**
     * Charger un produit depuis la BDD via son ID
     *
     * @param int id_produits id de du produit
     * @return array|null retourne l'objet produit (ou rien si non trouvé)
     */

    public static function lister() {
   /* public static function lister(int $id_produits) {*/
        // On récupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();

        // Récupération des infos dans la BDD
        $stmt = $db->prepare("SELECT * FROM produits");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajout d'un produit dans la BDD
    public static function ajouter ($nom, $prix, $stock) {
        // On récupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();
        // Ajout
        $stmt = $db->prepare("INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $prix, $stock]);
    }

    // Modification d'un produit dans la BDD
    public static function modifier ($nom, $prix, $stock, $id_produits) {
        // On récupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();
        // Màj
        $stmt = $db->prepare("UPDATE produits SET nom=?, prix=?, stock=? WHERE id_produits=?");
        $stmt->execute([$nom, $prix, $stock, $id_produits]);
    }

}

