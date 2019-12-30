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
    echo '<article><div="card-container"> <div class="card-panel" style="width:70%;height:100%;margin:5% auto;background-color: rgba(72, 131, 146, 0.5);"><div class="card-content" style="height:100%"><h3 style="text-align:center"> Classement </h3>';
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
    echo '<div style="display:flex;width:40%;margin:auto"><div>Place</div><div style="flex-grow:1;padding-left:3%">Nom </div><div>Nombre de parties gagnées</div></div>';
    $i = 1;
    foreach($ClassementTrié as $value)
    {
        if($i>intval($page*15-15)&&$i<=intval($page*15))
        if(isset($_SESSION['login'])&&$value['nom']==$_SESSION['login'])
        {
            echo '<div style="background-color:darkgray;display:flex;width:40%;margin:auto"><div>'.$i.'</div><div style="flex-grow:1;padding-left:10%"> '.$value['nom'].'</div><div>'.$value['COUNT(*)']. '</div></div>';
        }
        else
        {
            echo '<div style="display:flex;width:40%;margin:auto"><div>'.$i.'</div><div style="flex-grow:1;padding-left:10%"> '.$value['nom'].'</div><div>'.$value['COUNT(*)']. '</div></div>';

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
