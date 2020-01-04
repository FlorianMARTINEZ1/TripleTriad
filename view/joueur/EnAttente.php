<div id="content-load" class="container">

<div class="card">
      <div class="card-content">
        <div id="back" class="preloader-background transitionloader">
        <div class="preloader-wrapper big active">
       <div class="spinner-layer spinner-blue">
       <div class="circle-clipper left">
         <div class="circle"></div>
       </div><div class="gap-patch">
         <div class="circle"></div>
       </div><div class="circle-clipper right">
         <div class="circle"></div>
       </div>
     </div>

     <div class="spinner-layer spinner-red">
       <div class="circle-clipper left">
         <div class="circle"></div>
       </div><div class="gap-patch">
         <div class="circle"></div>
       </div><div class="circle-clipper right">
         <div class="circle"></div>
       </div>
     </div>

     <div class="spinner-layer spinner-yellow">
       <div class="circle-clipper left">
         <div class="circle"></div>
       </div><div class="gap-patch">
         <div class="circle"></div>
       </div><div class="circle-clipper right">
         <div class="circle"></div>
       </div>
     </div>

     <div class="spinner-layer spinner-green">
       <div class="circle-clipper left">
         <div class="circle"></div>
       </div><div class="gap-patch">
         <div class="circle"></div>
       </div><div class="circle-clipper right">
         <div class="circle"></div>
       </div>
     </div>
   </div>

   <div>
     <h4  id="h4">Temps d'attente ...</h4>
   </div>

   <div>
     <h5 id="h5">Joueurs dans la file d'attente : 0.</h5>
   </div>



 </div>
 <div id="button-file">
    <a class="waves-effect waves-light ff8 btn" href="./index.php?action=quitteFile&controller=joueur" >Quitter la file</a>
 </div>
 <div id="joueurActu" style="display:none;"><?php echo htmlspecialchars($login); ?></div>
 <div id="papa" style="display:none;">

      </div>
    </div>
 </div>

</div>

<script type="text/javascript" src="./script/EnAttente.js"></script>
