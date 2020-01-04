<?php
    echo '
    <div class="container">
        <div class="card"> 
            <div class="card-content">
                <h3> Statistiques </h3>
    

                <p>Nombre de joueurs inscrits : <span>'.htmlspecialchars($nbJoueur).'</span></p>
                <p>Nombre de parties totales : <span>'.htmlspecialchars($nbPartie).'</span></p>
                <p>Nombre de parties actuellement en cours : <span>'.htmlspecialchars($nombreDePartieMultiEnCeMomentEnLigne).'</span></p>
                
                <h5>IA</h5>
                
                <p>Taux de victoire de l\'IA Faible : <span>'.round($win_rate_IAFaible*100).'%</span></p>
                
                <p>Taux de victoire de l\'IA Moyen : <span>'.round($win_rate_IAMoyen*100).'%</span></p>
                <p>Taux de victoire de l\'IA Forte : <span>'.round($win_rate_IAForte*100).'%</span></p>

                <h5>Cartes</h5>
                <p> Nombre de cartes créées : <span>'.htmlspecialchars($nbCartes).'</span>
            </div>
        </div>
    </div>';
?>
