
<?php
    
    require __DIR__ ."/../models/usersModel.php";
    require __DIR__ ."/../views/usersView.php";

    //Update
    if(isset($_POST['login']) AND !empty($_POST['login']) AND $_POST['login'] != $user['user_login'])
    {
        $newlogin = htmlspecialchars($_POST['login']);
        $insertlogin = $bdd->prepare("UPDATE users SET user_login = ? WHERE user_id = ?");
        $insertlogin->execute(array($newlogin, $_POST['user_id']));
        header('Location: users');
    }

    if(isset($_POST['new_mdp1']) AND !empty($_POST['new_mdp1']) AND isset($_POST['new_mdp2']) AND !empty($_POST['new_mdp2']))
    {
        $newpass = sha1($_POST['new_mdp1']);
        $newpass2 = sha1($_POST['new_mdp2']);
        
        if($newpass == $newpass2)
        {   
            $insertpass = $bdd->prepare("UPDATE users SET user_pass = ? WHERE user_id = ?");
            $insertpass->execute(array($newpass, $_POST['user_id']));
            header('Location: users');
        }
        else
        {       
            echo "Les deux mots de passes ne correspondent pas.";
        }
    }

    if(isset($_POST['email']) AND !empty($_POST['email']) AND $_POST['email'] != $user['user_email'])
    {   
        $newemail = htmlspecialchars($_POST['email']);
        $insertemail = $bdd->prepare("UPDATE users SET user_email = ? WHERE user_id = ?");
        $insertemail->execute(array($newemail, $_POST['user_id']));
        header('Location: users');
    }

    if(isset($_POST['poste']) AND !empty($_POST['poste']) AND $_POST['poste'] != $user['user_poste'])
    {   
        $newposte = htmlspecialchars($_POST['poste']);
        $insertemail = $bdd->prepare("UPDATE users SET user_poste = ? WHERE user_id = ?");
        $insertemail->execute(array($newposte, $_POST['user_id']));
        header('Location: users');
    }


 //Delete
    if (isset($_POST['userdelete']))
    {
        $id = $_POST['id_delete'];
        delete_user($id);
    }

?>

