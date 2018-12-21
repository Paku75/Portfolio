<?php
    if(isset ($_POST['submit']))
        {     
            $user_login = $_POST['user_login'];
            $user_pass = sha1($_POST['user_pass']);
            $requete = $bdd->query("SELECT * FROM user WHERE user_login ='$user_login' AND user_pass='$user_pass'"); 
            if($reponse = $requete->fetch()) 
            {
                $_SESSION['connecte'] = true;
//                $user_id = $_SESSION['user_id'];
//                $user_login = $_SESSION['user_login'];
//                $user_level = $_SESSION['user_level'];
                $_SESSION['user_id'] = $reponse['user_id'];
                $_SESSION['user_login'] = $reponse['user_login'];
                $_SESSION['user_email'] = $reponse['user_email'];
                $_SESSION['user_level'] = $reponse['user_level'];
                $_SESSION['user_poste'] = $reponse['user_poste'];

                if($user_level==1)
                {
                    header("Location:admin");
                }
                else
                { 
                    header("Location:admin");
                } 
            }
            else
            {
                echo 'Identifiant ou mot de passe incorrect';
            }
        }
?>