<?php

    echo '<article><div="card-container"> <div class="card-panel" style="width:70%;height:100%;margin:5% auto;background-color: rgba(72, 131, 146, 0.5);"><h3> Historique : </h3>';
    if($tabHistorique!=false){
        foreach($tabHistorique as $value)
        {
            if($value['nomJ1'] == $_SESSION['login'])
                {
                if($value['scoreJ1']>$value['scoreJ2'])
                {
                    echo '<div style="background-color:darkgreen;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.htmlspecialchars($value['nomJ2']).'</br> Vous avez gagné '.htmlspecialchars($value['scoreJ1']).' à '.htmlspecialchars($value['scoreJ2']).' </div>';
                }
                else if($value['scoreJ1']<$value['scoreJ2'])
                {
                    echo '<div style="background-color:darkred;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.htmlspecialchars($value['nomJ2']).'</br> Vous avez perdu '.htmlspecialchars($value['scoreJ1']).' à '.htmlspecialchars($value['scoreJ2']).'  </div>';
                }
                else
                {
                    echo '<div style="background-color:darkgray;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.htmlspecialchars($value['nomJ2']).'</br> Vous avez fini sur une égalité ! </div>';
                }
            }
            else
            {
                if($value['scoreJ1']<$value['scoreJ2'])
                {
                    echo '<div style="background-color:darkgreen;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.htmlspecialchars($value['nomJ1']).'</br> Vous avez gagné '.htmlspecialchars($value['scoreJ2']).' à '.htmlspecialchars($value['scoreJ1']).' </div>';
                }
                else if($value['scoreJ1']>$value['scoreJ2'])
                {
                    echo '<div style="background-color:darkred;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.htmlspecialchars($value['nomJ1']).'</br> Vous avez perdu '.htmlspecialchars($value['scoreJ2']).' à '.htmlspecialchars($value['scoreJ1']).'  </div>';
                }
                else
                {
                    echo '<div style="background-color:darkgray;display: flex;justify-content: center;align-content: center;flex-direction: column;">Vous avez joué contre : '.htmlspecialchars($value['nomJ1']).'</br> Vous avez fini sur une égalité ! </div>';
                }
            }
        }
    }
    else
    {
        echo 'Vous n\'avez aucune partie dans votre historique !';
    }
    
    echo '</div></article>';
?>
