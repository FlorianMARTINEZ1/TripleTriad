<!--Code pour la page contact ici --->
<div class="container">
    <div class="form-contact center">
        <div class="card">
            <div class="card-content">
               <div class="container">
                <form action="">
                    <h4 class="center">Contact</h4>
                    <div class="row">
                        <div class="pseudo input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <label id="label-contact" for="pseudo">Pseudo</label>
                            <input id="pseudo" type="text" name="pseudo" maxlength=20 require>
                        </div>
                        <div class="email input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <label id="label-contact" for="email">Email</label>
                            <input id="email" type="email" name="email" require>
                        </div>
                    </div>
                    <div class="subject input-field">
                        <i class="material-icons prefix">contact_support</i>
                        <label id="label-contact" for="subject">Objet</label>
                        <input id="subject" type="text" name="subject"  maxlength=100 require>
                    </div>
                    <div class="proove input-field">
                        <label id="label-contact" for="detail-msg"></label>
                        <textarea name="detail-msg" id="detail-msg" cols="30" rows="10" minlength=140 maxlength=1500 placeholder="Entrez votre message..."></textarea>
                    </div>
                    <div class="send">
                        <input class="waves-effect waves-light ff8 btn" type="submit" value="Envoyer">
                    </div>

                </form>
               </div>
            </div>
        </div>
    </div>
</div>