<?php

    $path = "../../study/json/".$_POST['id'].".json";
    $file = fopen($path, "r");
    $content = fread($file, filesize($path));
    echo $content;
    fclose($file);


?>