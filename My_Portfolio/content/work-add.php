<?php
	if(isset($_POST['submit']))
	{
		$categorie = $_POST['cat'];
		$libelle = $_POST['libelle'];
		$date_deb = $_POST['date_deb'];
		$date_fin = $_POST['date_fin'];
		$url = $_POST['url'];
		$description = $_POST['description'];
		$competences = $_POST['competences'];
		
		$requete = $bdd->prepare("INSERT INTO projets(libelle,date_deb,date_fin,url,description,id_cat) 
		VALUES(:libelle,:date_deb,:date_fin,:url,:description,:id_cat)");
		$requete->bindValue(":libelle",$libelle,PDO::PARAM_STR);
		$requete->bindValue(":date_deb",$date_deb,PDO::PARAM_STR);
		$requete->bindValue(":date_fin",$date_fin,PDO::PARAM_STR);
		$requete->bindValue(":url",$url,PDO::PARAM_STR);
		$requete->bindValue(":description",$description,PDO::PARAM_STR);
		$requete->bindValue(":id_cat",$categorie,PDO::PARAM_INT);
		$requete->execute();
		
		$id_p = $bdd->lastInsertId();//dernier id auto_incrementé
        setFlash("Votre projet a bien été enregistré");
		
		foreach($competences as $competence)
		{
			$requete = $bdd->prepare("INSERT INTO competences VALUES(:id_p,:id_comp)");
			$requete->bindValue(":id_p",$id_p,PDO::PARAM_INT);
			$requete->bindValue(":id_comp",$competence,PDO::PARAM_INT);
			$requete->execute();
		}
	}
	
	$requete = $bdd->query("SELECT * FROM categories");
	$categories = $requete->fetchAll();
	
	$requete = $bdd->query("SELECT * FROM competences");
	$competences = $requete->fetchAll();
?>
    <div class="row">
        <div class="offset-md-1 col-md-10">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="cat">Catégorie</label>
                    <select name="cat">
			  <?php
				foreach($categories as $categorie)
				{
					echo "<option value='{$categorie['id_cat']}'>{$categorie['libelle']}</option>";
				}
			  ?>
			  </select><br>
                </div>
                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" id="libelle">

                </div>
                <div class="form-group">
                    <label for="date_deb">Début</label>
                    <input type="date" class="form-control" id="date" name="date_deb" placeholder="jj/mm/aa">
                </div>
                <div class="form-group">
                    <label for="date_fin">Fin</label>
                    <input type="date" class="form-control" id="date" name="date_fin" placeholder="jj/mm/aa">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control" id="desc" name="desc">
                </div>
                <?php
//                foreach($competences as $competence)
//                {
//                    echo "<input type='checkbox' name='competences[]' value='($competence['id_comp'])'>
//                    {$competence['libelle']}<br>";
//                }
                ?>
                <button type="submit" class="btn btn-primary">Enregistrer</button>

            </form>
            
            
        </div>
    </div>
