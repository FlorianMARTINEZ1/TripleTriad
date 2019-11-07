
<?php
require_once '../lib/File.php';
require_once File::build_path(array('model','ModelHistorique.php'));
require_once File::build_path(array('model','ModelDecks.php'));

$functionName = $_GET["func"];

if (function_exists($functionName)) {
    $functionName();
}


/** Ajoute la partie a l'historique */
function addToHistorique()
{
    $arr = array(
        "nomJ1" => $_GET["nomJ1"], "nomJ2" => $_GET["nomJ2"], "scoreJ1" => $_GET["scoreJ1"], "scoreJ2" => $_GET["scoreJ2"]
    );
    ModelHistorique::save($arr);
    echo "test";
}

/** Ajoute le deck s'il n'existe pas */
function addNewDeck()
{
    $arr = array(
        "idC1" => $_GET["idC1"], "idC2" => $_GET["idC2"], "idC3" => $_GET["idC3"], "idC4" => $_GET["idC4"], "idC5" => $_GET["idC5"]
    );
    ModelDecks::save($arr);
}

?>
