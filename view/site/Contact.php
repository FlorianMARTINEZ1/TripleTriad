<!--Code pour la page contact ici --->
<div class="container">
    <div class="form-contact center">
        <div class="card">
            <div class="card-content">
               <div class="container">
                <form <?php if(Conf::getDebug()==false){echo 'method="post"';}else{echo 'method="get"';}?> action="./index.php">
                    <h4 class="center">Contact</h4>
                    <div class="row">
                        <div class="pseudo input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <label id="label-contact" for="pseudo">Pseudo</label>
                            <input id="pseudo" type="text" <?php if(isset($_SESSION["login"])){echo 'value="'.htmlspecialchars($_SESSION["login"]).'" readonly';} ?> name="pseudo" maxlength=20 required="required">
                        </div>
                        <div class="email input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <label id="label-contact" for="email">Email</label>
                            <input id="email" type="email" name="email" required="required"/>
                        </div>
                    </div>
                    <div class="subject input-field">
                        <i class="material-icons prefix">contact_support</i>
                        <label id="label-contact" for="subject">Objet</label>
                        <input id="subject" type="text" name="subject"  maxlength=100 required="required">
                    </div>
                    <div class="proove input-field">
                        <label id="label-contact" for="detail-msg"></label>
                        <textarea name="detail-msg" id="detail-msg" cols="30" rows="10" minlength=140 maxlength=1500 placeholder="Entrez votre message..." required="required"></textarea>
                    </div>
                    <input type="hidden" name="controller" value="site" />
                    <input type="hidden" name="action" value="demandeContact" />

                    <div class="send">
                        <input class="waves-effect waves-light ff8 btn" type="submit" value="Envoyer">
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
</div>
<?php
  if(isset($message)){
    echo '<script type="text/javascript"> alert("'.htmlspecialchars($message).'") </script> ';
  }
?>
