<?php
    echo '<article><div="card-container"> <div class="card-panel" style="width:70%;height:100%;margin:5% auto;"><div class="card-content" style="height:100%"><h3> Statistiques : </h3>';
    
    echo '<p>Nombre de joueurs inscrits : '.$nbJoueur.'</p>';
    echo '<p>Nombre de parties totales : '.$nbPartie.'</p>';
    echo '<p>Nombre de parties actuellement en cours : '.$nombreDePartieMultiEnCeMomentEnLigne.'</p>';
    echo '<h5>IA</h5><p>Taux de victoire de l\'IA Faible : '.round($win_rate_IAFaible*100).'%</p><p>Taux de victoire de l\'IA Moyen : '.round($win_rate_IAMoyen*100).'%</p><p>Taux de victoire de l\'IA Forte : '.round($win_rate_IAForte*100).'%</p>';
    echo '<h5>Cartes</h5><p> Nombre de cartes créées : '.$nbCartes;
    echo '</div></div></article>';
?>
