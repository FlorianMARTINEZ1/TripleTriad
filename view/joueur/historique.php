<?php
    echo '<article><div="card-container"> <div class="card-panel" style="width:70%;height:100%;margin:5% auto;background-color: rgba(72, 131, 146, 0.5);"><div class="card-content" style="height:100%"><h3> Historique </h3>';
    if($tabHistorique!=false){
        $size = sizeof($tabHistorique);
        if(!isset($_GET['page']))
        {
            $page = 1;
        }
        else
        {
            if($_GET['page'] >= 1 &&$_GET['page']<=intval(($size/4)+1))
            {
                $page = $_GET['page'];
            }
            else
            {
                $page = 1;
            }
        }
        $reverse = array_reverse($tabHistorique);
        $reverseSliced = array_slice($reverse, intval(($page-1)*4), 4);
        foreach($reverseSliced as $value)
        {
            $deckJ1 = ModelHistorique::getDeck($value['deckJ1']);
            $deckJ2 = ModelHistorique::getDeck($value['deckJ2']);
            if($value['nomJ1'] == $_SESSION['login'])
                {
                if($value['scoreJ1']>$value['scoreJ2'])
                {
                    echo '<div class="card horizontal" style="border:solid;background-color:darkgreen;height:135px"><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC1'])[1].'/'.ModelHistorique::getNom($deckJ1['idC1'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC2'])[1].'/'.ModelHistorique::getNom($deckJ1['idC2'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC3'])[1].'/'.ModelHistorique::getNom($deckJ1['idC3'])[0].'.bleue.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC4'])[1].'/'.ModelHistorique::getNom($deckJ1['idC4'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC5'])[1].'/'.ModelHistorique::getNom($deckJ1['idC5'])[0].'.bleue.jpg"></div></div><div class="card-stacked row"><div style="display:flex"><div class="card-stacked"><div>Vous</div><div>'.$value['scoreJ1'].'</div></div><div class="card-stacked"><div>'.$value['nomJ2'].'</div><div>'.$value['scoreJ2'].'</div></div></div></div><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC1'])[1].'/'.ModelHistorique::getNom($deckJ2['idC1'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC2'])[1].'/'.ModelHistorique::getNom($deckJ2['idC2'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC3'])[1].'/'.ModelHistorique::getNom($deckJ2['idC3'])[0].'.rouge.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC4'])[1].'/'.ModelHistorique::getNom($deckJ2['idC4'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC5'])[1].'/'.ModelHistorique::getNom($deckJ2['idC5'])[0].'.rouge.jpg"></div></div></div>';
                }
                else if($value['scoreJ1']<$value['scoreJ2'])
                {
                    echo '<div class="card horizontal" style="border:solid;background-color:darkred;height:135px"><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC1'])[1].'/'.ModelHistorique::getNom($deckJ1['idC1'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC2'])[1].'/'.ModelHistorique::getNom($deckJ1['idC2'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC3'])[1].'/'.ModelHistorique::getNom($deckJ1['idC3'])[0].'.bleue.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC4'])[1].'/'.ModelHistorique::getNom($deckJ1['idC4'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC5'])[1].'/'.ModelHistorique::getNom($deckJ1['idC5'])[0].'.bleue.jpg"></div></div><div class="card-stacked row"><div style="display:flex"><div class="card-stacked"><div>Vous</div><div>'.$value['scoreJ1'].'</div></div><div class="card-stacked"><div>'.$value['nomJ2'].'</div><div>'.$value['scoreJ2'].'</div></div></div></div><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC1'])[1].'/'.ModelHistorique::getNom($deckJ2['idC1'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC2'])[1].'/'.ModelHistorique::getNom($deckJ2['idC2'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC3'])[1].'/'.ModelHistorique::getNom($deckJ2['idC3'])[0].'.rouge.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC4'])[1].'/'.ModelHistorique::getNom($deckJ2['idC4'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC5'])[1].'/'.ModelHistorique::getNom($deckJ2['idC5'])[0].'.rouge.jpg"></div></div></div>';
                }
                else
                {
                    echo '<div class="card horizontal" style="border:solid;background-color:darkgray;height:135px"><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC1'])[1].'/'.ModelHistorique::getNom($deckJ1['idC1'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC2'])[1].'/'.ModelHistorique::getNom($deckJ1['idC2'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC3'])[1].'/'.ModelHistorique::getNom($deckJ1['idC3'])[0].'.bleue.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC4'])[1].'/'.ModelHistorique::getNom($deckJ1['idC4'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC5'])[1].'/'.ModelHistorique::getNom($deckJ1['idC5'])[0].'.bleue.jpg"></div></div><div class="card-stacked row"><div style="display:flex"><div class="card-stacked"><div>Vous</div><div>'.$value['scoreJ1'].'</div></div><div class="card-stacked"><div>'.$value['nomJ2'].'</div><div>'.$value['scoreJ2'].'</div></div></div></div><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC1'])[1].'/'.ModelHistorique::getNom($deckJ2['idC1'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC2'])[1].'/'.ModelHistorique::getNom($deckJ2['idC2'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC3'])[1].'/'.ModelHistorique::getNom($deckJ2['idC3'])[0].'.rouge.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC4'])[1].'/'.ModelHistorique::getNom($deckJ2['idC4'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC5'])[1].'/'.ModelHistorique::getNom($deckJ2['idC5'])[0].'.rouge.jpg"></div></div></div>';
                }
            }
            else
            {
                if($value['scoreJ1']<$value['scoreJ2'])
                {
                    echo '<div class="card horizontal" style="border:solid;background-color:darkgreen;height:135px"><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC1'])[1].'/'.ModelHistorique::getNom($deckJ2['idC1'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC2'])[1].'/'.ModelHistorique::getNom($deckJ2['idC2'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC3'])[1].'/'.ModelHistorique::getNom($deckJ2['idC3'])[0].'.bleue.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC4'])[1].'/'.ModelHistorique::getNom($deckJ2['idC4'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC5'])[1].'/'.ModelHistorique::getNom($deckJ2['idC5'])[0].'.bleue.jpg"></div></div><div class="card-stacked row"><div style="display:flex"><div class="card-stacked"><div>Vous</div><div>'.$value['scoreJ2'].'</div></div><div class="card-stacked"><div>'.$value['nomJ1'].'</div><div>'.$value['scoreJ1'].'</div></div></div></div><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC1'])[1].'/'.ModelHistorique::getNom($deckJ1['idC1'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC2'])[1].'/'.ModelHistorique::getNom($deckJ1['idC2'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC3'])[1].'/'.ModelHistorique::getNom($deckJ1['idC3'])[0].'.rouge.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC4'])[1].'/'.ModelHistorique::getNom($deckJ1['idC4'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC5'])[1].'/'.ModelHistorique::getNom($deckJ1['idC5'])[0].'.rouge.jpg"></div></div></div>';
                }
                else if($value['scoreJ1']>$value['scoreJ2'])
                {
                    echo '<div class="card horizontal" style="border:solid;background-color:darkred;height:135px"><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC1'])[1].'/'.ModelHistorique::getNom($deckJ2['idC1'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC2'])[1].'/'.ModelHistorique::getNom($deckJ2['idC2'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC3'])[1].'/'.ModelHistorique::getNom($deckJ2['idC3'])[0].'.bleue.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC4'])[1].'/'.ModelHistorique::getNom($deckJ2['idC4'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC5'])[1].'/'.ModelHistorique::getNom($deckJ2['idC5'])[0].'.bleue.jpg"></div></div><div class="card-stacked row"><div style="display:flex"><div class="card-stacked"><div>Vous</div><div>'.$value['scoreJ2'].'</div></div><div class="card-stacked"><div>'.$value['nomJ1'].'</div><div>'.$value['scoreJ1'].'</div></div></div></div><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC1'])[1].'/'.ModelHistorique::getNom($deckJ1['idC1'])[0].'.rouge.jpg"><img src="css/cartes:'.ModelHistorique::getNom($deckJ1['idC2'])[1].'/'.ModelHistorique::getNom($deckJ1['idC2'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC3'])[1].'/'.ModelHistorique::getNom($deckJ1['idC3'])[0].'.rouge.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC4'])[1].'/'.ModelHistorique::getNom($deckJ1['idC4'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC5'])[1].'/'.ModelHistorique::getNom($deckJ1['idC5'])[0].'.rouge.jpg"></div></div></div>';
                }
                else
                {
                    echo '<div class="card horizontal" style="border:solid;background-color:darkgray;height:135px"><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC1'])[1].'/'.ModelHistorique::getNom($deckJ2['idC1'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC2'])[1].'/'.ModelHistorique::getNom($deckJ2['idC2'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC3'])[1].'/'.ModelHistorique::getNom($deckJ2['idC3'])[0].'.bleue.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC4'])[1].'/'.ModelHistorique::getNom($deckJ2['idC4'])[0].'.bleue.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ2['idC5'])[1].'/'.ModelHistorique::getNom($deckJ2['idC5'])[0].'.bleue.jpg"></div></div><div class="card-stacked row"><div style="display:flex"><div class="card-stacked"><div>Vous</div><div>'.$value['scoreJ2'].'</div></div><div class="card-stacked"><div>'.$value['nomJ1'].'</div><div>'.$value['scoreJ1'].'</div></div></div></div><div class="card-stacked"><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC1'])[1].'/'.ModelHistorique::getNom($deckJ1['idC1'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC2'])[1].'/'.ModelHistorique::getNom($deckJ1['idC2'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC3'])[1].'/'.ModelHistorique::getNom($deckJ1['idC3'])[0].'.rouge.jpg"></div><div><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC4'])[1].'/'.ModelHistorique::getNom($deckJ1['idC4'])[0].'.rouge.jpg"><img src="css/cartes/'.ModelHistorique::getNom($deckJ1['idC5'])[1].'/'.ModelHistorique::getNom($deckJ1['idC5'])[0].'.rouge.jpg"></div></div></div>';
                }
            }
        }
    }
    else
    {
        echo 'Vous n\'avez aucune partie dans votre historique !';
    }


    echo '<div class="center">
    <div class="pagination">';
    if($page >1){
    echo '<a href="index.php?action=historique&controller=joueur&login='.$_GET['login'].'&page='.intval($page-1).'">&laquo;</a>';
    }
    for ($i = 1; $i<=intval(($size/4)+1);$i++)
    {
        if($i == $page)
        {
            echo '<a class="active" href="#">'.$i.'</a>';
        }
        else
        {
            echo '<a href="index.php?action=historique&controller=joueur&login='.$_GET['login'].'&page='.$i.'">'.$i.'</a>';
        }
    }
    if($page<intval(($size/4)+1))
    {
        echo '<a href="index.php?action=historique&controller=joueur&login='.$_GET['login'].'&page='.intval($page+1).'">&raquo;</a>';
    }
    echo'
    </div>
  </div>';
    echo '</div></div></article>';
?>
