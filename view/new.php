
<h1>Bonjour vous etes dans la page d'ajout</h1>
<form method="post">
    <input type="text" name="nom" placeholder="le nom">
    <select  name="opt" id="">
        <?php foreach(Database::category() as $opt):?>
            <option value="<?=$opt['id']?>"><?= $opt['name']?></option>
        <?php endforeach ?>
    </select>
    <input type="submit">
</form>
<?php Database::insertInto();
?>