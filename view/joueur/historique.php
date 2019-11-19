<?php

    echo '<article> <div class="card-panel"><h3> Historique : </h3>';
    foreach($tabHistorique as $value)
    {
        if($value['nomJ1'] == $_SESSION['login'])
            {
            if($value['scoreJ1']>$value['scoreJ2'])
            {
                echo '<div style="background-color:darkgreen;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.$value['nomJ2'].'</br> Vous avez gagné '.$value['scoreJ1'].' à '.$value['scoreJ2'].' </div>';
            }
            else
            {
                echo '<div style="background-color:darkred;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.$value['nomJ2'].'</br> Vous avez perdu '.$value['scoreJ1'].' à '.$value['scoreJ2'].'  </div>';
            }
        }
        else
        {
            if($value['scoreJ1']<$value['scoreJ2'])
            {
                echo '<div style="background-color:darkgreen;">'.$value[0].' </div>';
            }
            else
            {
                echo '<div style="background-color:darkred;">'.$value[0].' </div>';
            }
        }
    }










    echo '</article>';
?>
