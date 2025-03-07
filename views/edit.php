<?php

require_once "../models/Produits.php";

session_start();

$pdo = Database::getInstance()->getConnection();
if (isset($_GET['id_produits'])) {
    $id_produits = $_GET['id_produits'];
} else {
    $id_produits = 0;
}

$produits = Produits::loadById($id_produits);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier produit</title>
</head>
<body>
<h1>Modifier un produit</h1>
<form action="../../brief_crud_mvc/index.php?action=modifier&id_produits=<?= $id_produits ?>" method="post">

    <label for="name">Nom :</label>
    <input type="text" id="name" name="nom" required value="<?= htmlspecialchars($produits->getNom() ?? '') ?>">

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" required value="<?= htmlspecialchars($produits->getPrix() ?? '') ?>">

    <label for="stock">Stock :</label>
    <input type="number" id="stock" name="stock" required value="<?= htmlspecialchars($produits->getStock() ?? '') ?>">

    <button type="submit">Valider</button>
</form>
</body>
</html>