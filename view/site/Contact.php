<!--Code pour la page contact ici --->
<div class="container">
    <div class="form-contact center">
        <div class="card">
            <div class="card-content">
               <div class="container">
                <form action="">
                    <div class="row">
                        <div class="pseudo input-field col s5">
                            <label id="label-contact" for="pseudo">Pseudo</label>
                            <input id="pseudo" type="text" name="pseudo" maxlength=20 require>
                        </div>
                    </div>
                    <div class="subject input-field">
                        <label id="label-contact" for="subject">Sujet</label>
                        <input id="subject" type="text" name="subject"  maxlength=100 require>
                    </div>
                    <div class="proove input-field">
                        <label id="label-contact" for="detail-msg"></label>
                        <textarea name="detail-msg" id="detail-msg" cols="30" rows="10" minlength=140 maxlength=1500></textarea>
                    </div>
                    <div class="send">
                        <input class="waves-effect waves-light ff8 btn " type="submit" value="Envoyer">
                    </div>

                </form>
               </div>
            </div>
        </div>
    </div>
</div>