<form method="POST" action="db/changeCredentials.php" enctype="multipart/form-data" class="modifStudy">
    <h2>Remplissez les champs dont vous souhaitez la modification</h2>
        <div class="Name">
            <h4>Pseudo</h4>
            <input class="name--input prof--input" maxlength="99" name="name">
        </div>
        <div class="mail">
            <h4>Mail</h4>
            <input class="mail--input prof--input" maxlength="99" name="mail">
        </div>
        <div class="mdp">
            <h4>Mot de passe</h4>
            <input class="mdp--input prof--input" maxlength="99" name="mdp">
        </div>
        <div class="upload">
            <h4>Photo de Profil</h4>
            <input type="file" name="uploadfile" accept="Image/jpg" />
        </div>
        <div class="choix">
            <button class="valider" type="submit" name="valider">Valider</button>
            <button class="annuler">Annuler</button>
        </div>
</form>