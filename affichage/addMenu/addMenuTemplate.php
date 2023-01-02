
<form method="POST" action="db/uploadStudy.php" enctype="multipart/form-data" class="modifStudy">
        <div class="StudyName">
            <h4>Nom de l'étude</h4>
            <input class="title" maxlength="200" name="nom" required >
        </div>
        <div class="StudyDescr">
            <h4>Description:</h4>
            <textarea name="textarea" class="desc"id="textarea-a" name="description" required></textarea>
        </div>
        <div class="upload">
            <h4>Fichier JSON</h4>
            <input type="file" name="uploadfile" accept="application/JSON" required/>
        </div>
        <div class="choix">
            <button class="valider" type="submit" name="valider">Valider</button>
            <button class="annuler">Annuler</button>
        </div>
        <input class="invisible--data" maxlength="200" name="id">
</form>