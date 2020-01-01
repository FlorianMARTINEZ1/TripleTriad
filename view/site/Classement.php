<?php
    function array_sort($array, $on, $order=SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();
    
        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }
    
            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }
    
            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }
    
        return $new_array;
    }
    echo '<article><div="card-container"> <div class="card-panel"><div class="card-content" style="height:100%"><h3 style="text-align:center"> Classement </h3>';
    
    if(!isset($_GET['IA'])||$_GET['IA']==1)
    {
        echo '<div class="buttons"><a class="active" href="#">Classement Général</a>';
    }
    else
    {
        echo '<div class="buttons"><a href="index.php?action=classement&IA=1';
        if(isset($_GET['win'])){echo '&win='.$_GET['win'];}else{echo '&win=0';}
        echo '">Classement Général</a>';
    }
    if(isset($_GET['IA'])&&$_GET['IA']!=1)
    {
        echo '<a class="active" href="#">Multijoueur Seulement</a></div>';
    }
    else
    {
        echo '<a href="index.php?action=classement&IA=0';
        if(isset($_GET['win'])){echo '&win='.$_GET['win'];}else{echo '&win=0';}
        echo '">Multijoueur Seulement</a></div>';
    }
    
    if(!isset($_GET['win'])||$_GET['win']!=1)
    {
        echo '<div class="buttons"><a class="active" href="#">Nombre de parties jouées</a>';
    }
    else
    {
        echo '<div class="buttons"><a href="index.php?action=classement';
        if(isset($_GET['IA'])){echo '&IA='.$_GET['IA'];}else{echo'&IA=0';}
        echo'&win=0">Nombre de parties jouées</a>';
    }
    if(isset($_GET['win'])&&$_GET['win']==1)
    {
        echo '<a class="active" href="#">Nombre de parties gagnées</a></div>';
    }
    else
    {
        echo '<a href="index.php?action=classement';
        if(isset($_GET['IA'])){echo '&IA='.$_GET['IA'];}else{echo'&IA=0';}
        echo '&win=1">Nombre de parties gagnées</a></div>';
    }

    $size = sizeof($tabClassement);
    
    if(!isset($_GET['page']))
    {
    $page = 1;
    }
    else
    {
        if($_GET['page'] >= 1 &&$_GET['page']<=intval(($size/15)+1))
        {
            $page = $_GET['page'];
        }
        else
        {
            $page = 1;
        }
    }
    $ClassementTrié = array_sort($tabClassement, 'COUNT(*)', SORT_DESC);
    echo '<div class="contain"><p>Place</p><p style="flex-grow:1;padding-left:3%">Nom </p><p>Nombre de parties';if(isset($_GET['win'])&&$_GET['win']==1){echo' gagnées';}echo'</p></div>';
    $i = 1;
    foreach($ClassementTrié as $value)
    {
        if($i>intval($page*15-15)&&$i<=intval($page*15))
        {
            if(isset($_SESSION['login'])&&$value['nom']==$_SESSION['login'])
            {
                echo '<div id=place'.$i.' class="contain logged"><p>'.$i.'</p><p class="name"> '.$value['nom'].'</p><p>'.$value['COUNT(*)']. '</p></div>';
            }
            else
            {
                echo '<div id=place'.$i.' class="contain"><p>'.$i.'</p><p class="name"> '.$value['nom'].'</p><p>'.$value['COUNT(*)']. '</p></div>';

            }
        }
        $i++;
    }


    echo '<div class="center">
    <div class="pagination">';
    if($page >1){
    echo '<a href="index.php?action=classement&page='.intval($page-1).'">&laquo;</a>';
    }
    for ($i = 1; $i<=intval(($size/15)+1);$i++)
    {
        if($i == $page)
        {
            echo '<a class="active" href="#">'.$i.'</a>';
        }
        else
        {
            echo '<a href="index.php?action=classement&page='.$i.'">'.$i.'</a>';
        }
    }
    if($page<intval(($size/15)+1))
    {
        echo '<a href="index.php?action=classement&page='.intval($page+1).'">&raquo;</a>';
    }
    echo'
    </div>
  </div>';
    echo '</div></div></article>';
?>
