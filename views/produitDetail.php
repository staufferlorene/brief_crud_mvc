<?php if (!empty($produit)):  ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des produits</title>
</head>
<body>
<h1>Liste des produits</h1>
<table>
    <thead>
    <tr>
        <th>ID produits</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <!--PHP-->
    <?php foreach ($produit as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['id_produits']) ?></td>  <!--?= équivaut à un "echo"-->
            <td><?= htmlspecialchars($a['nom']) ?></td>
            <td><?= htmlspecialchars($a['prix']) ?></td>
            <td><?= htmlspecialchars($a['stock']) ?></td>
            <td><button><a href="/views/edit.php?id_produits=<?=$a['id_produits'];?>">Modifier</a></button></td>
            <td><button><a href="index.php?action=delete&id_produits=<?=$a['id_produits'];?>">Supprimer</a></button></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
        <button><a href="../views/add.php">Ajouter un nouveau produit</a></button>

    <?php else: ?>
    <p>Aucun Produit</p>
    <?php endif; ?>

    </body>
</html>