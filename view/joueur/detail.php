
        <?php
        echo '<arcticle>
                <div class="card-panel" style="height: 50%;text-align: center; margin-top: 5%; background-color:rgba(34, 61, 68, 0.8);padding-bottom: 5%;color:white">';
                echo '<h3 style="text-decoration:underline">'.htmlspecialchars($j->get('login')).'</h3>';
                if(Session::is_user($j->get('login')) ||  Session::is_admin()){
                    echo '<p> Si vous voulez supprimer votre compte cliquez <a href="./index.php?action=delete&controller=joueur&login='.htmlspecialchars($j->get('login')).'" style="color:white;text-decoration:underline">ici</a> . </p>';
                    echo '<h4> Vos statistiques </h4>';
                    echo '<div style="display:flex;width:50%;margin:auto"><div style="margin:auto"><h6>IA</h6>
                    <p>Nb parties : '.$nbPartie[0].'</p><p>Nb victoires : '.$nbWin[0].'</p><p>Ratio : ';
                    if($nbPartie[0]!=0){echo intval(($nbWin[0]/$nbPartie[0])*100).'%</p></div><div style="margin:auto">';}
                    else{echo '0%</p></div><div style="margin:auto">';}
                    echo'<h6>Multi</h6>
                    <p>Nb parties : '.$nbPartie[1].'</p><p>Nb victoires : '.$nbWin[1].'</p><p>Ratio : ';
                    if($nbPartie[1]!=0){echo intval(($nbWin[1]/$nbPartie[1])*100).'%</p></div><div style="margin:auto">';}
                    else{echo '0%</p></div><div style="margin:auto">';}
                    echo '<h6>Général</h6>
                    <p>Nb parties : '.intval($nbPartie[0]+$nbPartie[1]).'</p><p>Nb victoires : '.intval($nbWin[0]+$nbWin[1]).'</p><p>Ratio : ';
                    if(intval($nbPartie[0]+$nbPartie[1])!=0){ echo intval((intval($nbWin[0]+$nbWin[1])/intval($nbPartie[0]+$nbPartie[1]))*100).'%</p></div></div>';}
                    else{echo '0%</p></div><div style="margin:auto">';}
                }
          echo '</div>
            </arcticle>'

        ?>
