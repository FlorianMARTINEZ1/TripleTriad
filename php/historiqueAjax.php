
<?php
require_once '../lib/File.php';
require_once File::build_path(array('model','ModelHistorique.php'));

$functionName = $_GET["func"];

if (function_exists($functionName)) {
    $functionName();
}

function addToHistorique()
{
    $arr = array(
        "nomJ1" => $_GET["nomJ1"], "nomJ2" => $_GET["nomJ2"], "scoreJ1" => $_GET["scoreJ1"], "scoreJ2" => $_GET["scoreJ2"]
    );
    ModelHistorique::save($arr);
    echo "test";
}

?>
