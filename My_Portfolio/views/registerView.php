<form class="loginForm"action="" method="post">
  <h1>Inscrire une personne</h1>
      <div class="inset">
    	<input type="text" name="username" placeholder="Username"/>
        <input type="text" name="email1" placeholder="Email"/>
        <input type="text" name="email2" placeholder="Confirmation de l'email"/>
        <input type="password" name="pass1" placeholder="Password"/>
        <input type="password" name="pass2" placeholder="Confirmation du mot de passe"/>
<!--        <input type="hidden" name="date"/>-->
        <br>
        <select name="user_poste">
          <option value="Informatique">Informatique</option>
          <option value="Communication presse">Communication presse</option>
          <option value="Développement commercial">Développement commercial</option>
          <option value="Comptable">Comptable</option>
          <option value="Ressources humaines">Ressources humaines</option>
          <option value="Administrative">Administrative</option>
        </select>
        <input type="submit" name="submit" value="Valider">
      </div>
</form>
    
    <?php 
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur."</font>";
        }
    ?>