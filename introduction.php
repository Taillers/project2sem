
<article>
    <p>
    En remplissant ce questionnaire :</br>Je certifie donner volontairement mon accord pour participer à une étude de sciences humaines. 
    Je comprends que ma participation n'est pas obligatoire et que je peux stopper ma participation à tout moment sans avoir à me justifier 
    ni encourir aucune responsabilité. Mon consentement ne décharge pas les organisateurs de la recherche de leurs responsabilités et je conserve 
    tous mes droits garantis par la loi.  Au cours de cette enquête, j’accepte que soient recueillies des données sur mes réponses. 
    Je comprends que les informations recueillies sont strictement confidentielles et que les résultats anonymés sont à usage exclusif de la 
    communauté scientifique dans son ensemble.  Je suis informé-e que mon identité n’apparaîtra dans aucun rapport ou publication et que toute 
    information me concernant sera traitée de façon confidentielle. J’accepte qu'une fois anonymées, les données enregistrées à l’occasion de 
    cette étude puissent être conservées dans une base de données et faire l’objet d’un traitement informatisé non nominatif en vue de publication 
    scientifique.
    </p>
    <form method="post" action="traitement1.php" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-10" for="oui">J'ai pris connaissance de ces informations et donne mon accord à cette enquête</label>
            <div class="col-sm-2">
                <?php
                    $isChecked = "";
                    if(isset($_SESSION['accord']))
                    {
                        if($_SESSION['accord'] == "oui")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="accord" value="oui"  id="oui"'.$isChecked .' />';
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-10" for="non">Je ne souhaite pas continuer</label>
            <div class="col-sm-2">
                <?php
                    $isChecked = "";
                    if(isset($_SESSION['accord']))
                    {
                        if($_SESSION['accord'] == "non")
                        {
                            $isChecked = "checked=\"checked\"";
                        }
                    }
                    echo '<input class="form-control" type="radio" name="accord" value="non"  id="non"'.$isChecked .' />';
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-9 col-sm-10">
                <!--<input type="submit" value="Confirmer" />-->
                <button type="submit" class="btn btn-default">Valider</button>
            </div>
        </div>
    </form>
</article>
