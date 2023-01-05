<?php
include_once '../../db/animalDB.php';

if(isset($_GET['id'])){
    $id = (String) trim($_GET['id']);
    $info = animalDB::getStudieByID($id);
    $title = $info[0]['NomEtude'];
    $desc = $info[0]['DescriptionEtude'];
}
?>

<form method="POST" action="db/uploadIMG.php" enctype="multipart/form-data" class="modifStudy">
        <div class="StudyName">
            <h4>Nom de l'étude</h4>
            <input class="title" maxlength="200" value="<?php echo($title);?>">
        </div>
        <div class="StudyDescr">
            <h4>Description:</h4>
            <textarea name="textarea" class="desc"id="textarea-a"><?php echo($desc);?></textarea>
        </div>
        <div class="upload">
            <h4>Sticker</h4>
            <input type="file" name="uploadfile" accept="image/png"/>
        </div>
        <div class="choix">
            <button class="valider" type="submit" name="valider">Valider</button>
            <button class="annuler">Annuler</button>
        </div>
        <input class="invisible--data" maxlength="200" name="id" value="<?php echo($id);?>">
</form>


