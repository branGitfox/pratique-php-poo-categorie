<h1>Bonjour vous etes dans la page d'acceuil</h1>

<?php foreach(Database::selectAllWithCategory() as $all):?>
    <h3><?= $all['produit']?></h3>
    <p>categorie: <?= $all['categorie']?></p>
<?php endforeach ?>    

