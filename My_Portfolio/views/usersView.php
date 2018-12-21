<br><br>
<h1>Liste des utilisateurs</h1>
<br><br>

<a href="register" class="btn btn-primary btn-lg" role="button">Inscrire un nouvel utilisateur</a>
<br><br><br>

<!--Table-->
<div class="table-responsive">
    <table style="color: black;" id="defaultTable" class="defaultTable" style="width:100%">
        <thead>
            <tr>
                <th>
                    Login
                </th>
                <th>
                    Email
                </th>
                <th>
                    Mot de passe
                </th>
                <th>
                    Poste
                </th>
                <th>
                    Date inscription
                </th>
                <th>
                    Modifier
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($users as $user)
            {   ?>
                <tr>
                    <td>
                        <?php echo $user['user_login']; ?>
                    </td>
                    <td>
                        <?php echo $user['user_email']; ?>
                    </td>
                    <td>
                        <?php echo $user['user_pass']; ?>
                    </td>
                    <td>
                        <?php echo $user['user_poste']; ?>
                    </td>
                    <td>
                        <?php echo $user['user_date_inscription']; ?>
                    </td>
                    <td>
                        <div class="edit">
                           <a href="#edit_<?php echo $user['user_id']; ?>" data-toggle="modal" class="btn btn-default"> 
                               <i id="edit" class="fa fa-pencil fa-lg"> </i>
                           </a>
                           <a href="#delete_<?php echo $user['user_id']; ?>" data-toggle="modal" class="btn btn-default"> 
                               <i id="edit" class="fa fa-trash fa-lg remove-item "> </i>
                           </a>
                       </div>
                    </td>
                    <?php include ('Modals/users.php') ?>
                </tr>
      <?php } ?>
        </tbody>
    </table>
</div>


