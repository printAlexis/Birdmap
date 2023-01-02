<?php
$msg = $parametres['message'];
unset($parametres);
echo("

<div class='error-message'>
<h1>Erreur</h1>
<p>$msg</p>
</div>")
?>