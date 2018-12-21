<?php 
    require __DIR__ ."/../models/profilModel.php";
    require __DIR__ ."/../views/profilView.php";

    

    if(isset($_POST['login']) AND !empty($_POST['login']) AND $_POST['login'] != $user['user_login'])
    {
        $newlogin = htmlspecialchars($_POST['login']);
        $insertlogin = $bdd->prepare("UPDATE users SET user_login = ? WHERE user_id = ?");
        $insertlogin->execute(array($newlogin, $_SESSION['user_id']));
        header('Location: profil');
    }

    if(isset($_POST['new_mdp1']) AND !empty($_POST['new_mdp1']) AND isset($_POST['new_mdp2']) AND !empty($_POST['new_mdp2']))
    {
        $newpass = sha1($_POST['new_mdp1']);
        $newpass2 = sha1($_POST['new_mdp2']);
        
        if($newpass == $newpass2)
        {   
            $insertpass = $bdd->prepare("UPDATE users SET user_pass = ? WHERE user_id = ?");
            $insertpass->execute(array($newpass, $_SESSION['user_id']));
            header('Location: profil');
        }
        else
        {       
            echo "Les deux mots de passes ne correspondent pas.";
        }
    }

    if(isset($_POST['new_email']) AND !empty($_POST['new_email']) AND $_POST['new_email'] != $user['user_email'])
    {   
        $newemail = htmlspecialchars($_POST['new_email']);
        $insertemail = $bdd->prepare("UPDATE users SET user_email = ? WHERE user_id = ?");
        $insertemail->execute(array($newemail, $_SESSION['user_id']));
        header('Location: profil');
    }