 <?php 
    function inscription()
    {
        global $bdd;
        $requete = $bdd->query("INSERT INTO users (user_login,user_pass,user_email,user_date_inscription,user_poste,user_level) VALUES('$user_login','$user_pass','$user_email','$user_date_inscription','$user_poste','$user_level',)");
        
    }

?>