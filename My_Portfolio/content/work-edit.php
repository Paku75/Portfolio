<?php
	session_start();

	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=portfolio","root","root");
	}
	catch(Exception $e)
	{
		die("bdd introuvable");
	}
	
	if(isset($_POST['submit']))
	{
		$categorie = $_POST['cat'];
		$libelle = $_POST['libelle'];
		$date_deb = $_POST['date_deb'];
		$date_fin = $_POST['date_fin'];
		$url = $_POST['url'];
		$description = $_POST['desc'];
		$competences = $_POST['competences'];
		
		$requete = $bdd->prepare("UPDATE INTO 			projets(libelle,date_deb,date_fin,url,description,id_cat) 
		SET(libelle = :libelle,
            date_deb = :date_deb,
            date_fin = :date_fin,
            url = :url,
            :description,:id_cat)");
		$requete->bindValue(":libelle",$libelle,PDO::PARAM_STR);
		$requete->bindValue(":date_deb",$date_deb,PDO::PARAM_STR);
		$requete->bindValue(":date_fin",$date_fin,PDO::PARAM_STR);
		$requete->bindValue(":url",$url,PDO::PARAM_STR);
		$requete->bindValue(":description",$description,PDO::PARAM_STR);
		$requete->bindValue(":id_cat",$categorie,PDO::PARAM_INT);
		$requete->execute();
		
		$id_p = $bdd->lastInsertId();//dernier id auto_incrementé
		
		foreach($competences as $competence)
		{
			$requete = $bdd->prepare("INSERT INTO englober VALUES(:id_p,:id_comp)");
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
<link rel="stylesheet" href="style.css">
<div class="workEdit">
<form action="#" method="post">
	Categorie:<select name="cat">
			  <?php
				foreach($categories as $categorie)
				{
					echo "<option value='{$categorie['id_cat']}'>{$categorie['libelle']}</option>";
				}
			  ?>
			  </select><br>
	Libelle:<input type="text" name="libelle"/><br />
	Début:<input type="text" name="date_deb"/><br />
	Fin:<input type="text" name="date_fin"/><br />
	Url:<input type="text" name="url"/><br />
	Description: <textarea name="desc" id="" cols="30" rows="10"></textarea><br />
	<?php
		foreach($competences as $competence)
		{
			echo "<input type='checkbox' name='competences[]' value='{$competence['id_comp']}'>{$competence['libelle']}<br>";
		}
	?>
	<input type="submit" name="submit"/> 
</form>
</div>