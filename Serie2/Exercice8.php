<?php 
$heure = 12;
if($heure >= 5 && $heure < 12) {
    echo 'nous sommes le matin.';
}elseif($heure >= 12 && $heure < 18) {
    echo 'nous sommes l\'après-midi.';
}elseif($heure >= 18 && $heure < 22) {
    echo 'nous sommes le soir.';
}else {
    echo 'nous sommes la nuit.';
}
?>