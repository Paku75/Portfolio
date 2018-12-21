Login : <?= $_SESSION['user_login']; ?> <br>
Email : <?= $_SESSION['user_email']; ?> <br>
Poste : <?= $_SESSION['user_poste']; ?> <br>


<a href="#" id="btn_edit" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="">Modifier votre profil</a>


<!--MODAL EDIT PROFIL-->
<div class="modal fade" id="myModal_edit_profil" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> Modifier le profil</h4>
      </div>
      <div style="color:black;" class="modal-body" style="padding:40px 50px;">
        <form method="POST" id="client_edit" role="form">
            <h5>- NOUVEAU LOGIN -</h5>
              <div class="form-group">
                <label for="login"><span class="glyphicon glyphicon-user"></span> </label>
                <input type="hidden" name="id" value="<?= $_SESSION['user_id'] ?>">
                <input type="text" name="login" class="form-control" value="<?= $_SESSION['user_login']; ?>">
              </div>
            <h5>- NOUVEAU MOT DE PASSE -</h5>
              <div class="form-group">
                <label for="login"><span class="glyphicon glyphicon-user"></span> </label>
                <input type="password" name="new_mdp1" class="form-control">
              </div>
            <h5>- CONFIRMER LE NOUVEAU MOT DE PASSE -</h5>
              <div class="form-group">
                <label for="login"><span class="glyphicon glyphicon-user"></span> </label>
                <input type="password" name="new_mdp2" class="form-control">
              </div>
            <h5>- NOUVEL EMAIL -</h5>
              <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-user"></span> </label>
                <input type="text" name="new_email" class="form-control" value="<?= $_SESSION['user_email']; ?>">
              </div>

            <button type="submit" name="profiledit" class="btn btn-success btn-block">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php 
    if(isset($mdp))
        echo $mdp;
?>