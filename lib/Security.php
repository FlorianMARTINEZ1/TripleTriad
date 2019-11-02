<?php

class Security{
private static $seed = 'FD85de48f';


public static function chiffrer($texte_en_clair) {
  $chiffrer = Security::getSeed().$texte_en_clair;
  $texte_chiffre = hash('sha256', $chiffrer);
  return $texte_chiffre;
}

static public function getSeed() {
   return self::$seed;
}



}

?>



