<?php
			if(!empty($_POST))
			{
				$user = $bdd->prepare("SELECT id_u,login,mdp FROM users WHERE login=:login AND mdp=:mdp");
				$user->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
				$user->bindValue(':mdp',$_POST['mdp'],PDO::PARAM_STR);
				$user->execute();
				if($donnee = $user->fetch())
				{
					if(isset($_POST['remember']))
					{
						setcookie('auth',$donnee['id_u'].'-----'.sha1($donnee['login'].$donnee['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);
						//le dernier argument evite que le cookie soit editable en javascript
					}
					
					if($donnee)
						$_SESSION['auth'] = $donnee;
					
					header("Location:admin");
					die();
				}

                else {
                    setFlash("Vos identifiants sont incorrects", "danger");
                }
			}
			if(isset($_COOKIE['auth']) && !isset($_SESSION['auth']))
			{
				$auth = $_COOKIE['auth'];
				$auth = explode('-----',$auth);
				$user = $bdd->prepare("SELECT * FROM users WHERE id_u=:id_u");
				$user->bindValue(':id_u',$auth[0],PDO::PARAM_INT);
				$user->execute();
				$donnee = $user->fetch();
				$key = sha1($donnee['login'].$donnee['mdp'].$_SERVER['REMOTE_ADDR']);
				if($key == $auth[1])
				{
					$_SESSION['auth'] = $donnee;
					setcookie('auth',$donnee['id_u'].'-----'.sha1($donnee['login'].$donnee['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);
					//le dernier argument evite que le cookie soit editable en javascript
					
					header("Location:admin");
					die();
				}
				else
				{
					setcookie('auth','',time()-3600,'/','localhost',false,true);
					//A mettre aussi sur la page de deconnexion
				}
			}
		?>
	<form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Veuillez-vous connecter</h1>
      <label for="login" class="sr-only">Login</label>
      <input type="text" id="login" name="login" class="form-control" placeholder="Votre login" required autofocus>
      <label for="mdp" class="sr-only">Mdp</label>
      <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" value="remember"> Se souvenir de moi
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Connexion</button>
    </form>
 