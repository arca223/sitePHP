<title>Création d'un compte utilisateur</title>
<div class="corps">
    <form method="post" action="#">
        <label for="nom">Nom :</label>
        <input id="nom" type="text" name="nom" size="30"  placeholder="Entrez votre nom"/>
        <label for ="prenom">Prénom :</label>
        <input id="prenom" type="text" name="prenom" size="30"  placeholder="Entrez votre prénom"/>

        <label for ="prof">Profession/Rôle :</label>
        <select id="prof" name="profession">
            <option value="Acupuncteur">Acupuncteur</option>
            <option value="Médecin">Médecin</option>
            <option value="Chirurgien">Chirurgien</option>
            <option value="Patient">Patient</option>
            <option value="Autre">Autre</option>
        </select>
        <label for ="mail">E-mail :</label>
        <input id="mail" type="text" name="mail" size="30"  placeholder="Entrez votre e-mail"/>
        <label for ="login">Nom d'utilisateur :</label>
        <input id="login" type="text" name="login" size="30"  placeholder="Entrez votre login"/>
        <label for ="pass">Mot de passe :</label>
        <input id="pass" type="password" name="password" size="30" placeholder="Entrez votre password"/>
        <br /><br />
        <button id="btncrea" name="creation" type="submit" >Créer le compte</button>
    </form>

</div>
