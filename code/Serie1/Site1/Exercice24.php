<?php

include './libraryToInclude.php';

function fonctionMagique() {
  
    return fonctionDeMaLibrairie();
}
echo  fonctionMagique();
?>