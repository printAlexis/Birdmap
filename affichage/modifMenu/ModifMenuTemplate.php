<?php
include '../../db/animalDB.php';
if(isset($_GET['id'])){
    $id = (String) trim($_GET['id']);
    $info = animalDB::getStudieByID($id);
    $title = $info[0]['NomEtude'];
    $desc = $info[0]['DescriptionEtude'];
}
?>

<div class="StudyName">
    <h4>Nom de l'étude</h4>
    <input type="text" maxlength="200" value="<?php echo($title);?>">
</div>
<div class="StudyDescr">
    <h4>Description:</h4>
    <textarea name="textarea" id="textarea-a"><?php echo($desc);?></textarea>
</div>

<div class="choix">
    <button class="valider">Valider</button>
    <button class="annuler">Annuler</button>
</div>