<?php
include_once '../../db/animalDB.php';
if(isset($_GET['name'])){
    $name = (String) trim($_GET['name']);
    $info = animalDB::getAnimalDescription($name);
    $texte = $info['Texte_'];
}
?>

<form method="POST" action="db/modifAnimalInfo.php" enctype="multipart/form-data" class="modifAnimal">
        <div class="Animal--name">
            <h4><?php echo($name);?></h4>
        </div>
        <div class="Animal--description">
            <h4>Description</h4>
            <textarea name="textarea" class="desc"id="textarea-a" required><?php echo($texte);?></textarea>
        </div>
        <div class="upload">
            <h4>Image</h4>
            <input type="file" name="uploadfile" accept="image/" required/>
        </div>
        <div class="choix">
            <button class="valider--animal" type="submit" name="valider">Valider</button>
            <button class="annuler--animal">Annuler</button>
        </div>
        <input class="invisible--data" maxlength="200" name="id" value="<?php echo($name);?>">
</form>


