<div class="row justify-content-end">
    <div class="col-3">
        <a href="index.php?p=work-add" class="btn btn-success pull-right">Ajouter un projet</a>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Projet</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
               <?php
                if(isset($_GET['id']))
                {
                    $requete = $bdd->query("DELETE FROM projets WHERE id_p = ".(int)$_GET['id']);
                    setFlash("Projet supprimé");
                }
                
                
                $requete = $bdd->query("SELECT id_p, projets.libelle as lib_p, categories.libelle as lib_cat FROM projets,categories WHERE projets.id_cat = categories.id_cat");
                while($reponse = $requete->fetch())
                {
                    echo '<tr>
                    <th scope="row">'.$reponse['lib_p'].'</th>
                    <td>'.$reponse['lib_cat'].'</td>
                    <td><a href="#" class="btn btn-warning">Modifier</a></td>
                    <td><a href="admin/'.$reponse['id_p'].'" class="btn btn-danger">Supprimer</a></td>
                </tr>';
                }
                
                
                
                ?>
            </tbody>
        </table>
    </div>
</div>