<?php
    require_once"functions.php";
    if(isset($_GET["matricule"])){
        $id_user = sanitize($_GET["matricule"]);
    }       
    try {
        $query = $pdo->prepare("SELECT * FROM employes where matricule = :matricule");
        $query->execute(array("matricule" => $id_user));
        $profile = $query->fetch(); //un seul résultat au maximum    
    } catch (Exception $ex) {
        die("Erreur lors de l'accès à la base de données.");
    }
    if($query->rowCount()==0){
        die("L'utilisateur n'existe pas");
    }
    else {
        $prenom = $profile["prenom"];
        $nom = $profile["nom_de_famille"];
    }
?>
<html>
    

<!doctype html>

<head>
    <meta charset='UTF_8'>
    <title>Formulaire demande de congée</title>
    <link href="styleformemploye.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
    <?php include 'menu.php'; ?>
    <img class="logo" src="happymorty.gif" alt="BananaRick">
</header>
<div class='Titre'>
    <h1><?php echo"Demande de Congé par ".$prenom." ".$nom;?> </h1>
</div>

</div>
<form method="post" action="/mesconges.php">
    <div class="corps">




        
        <label class="demande" for="datedebut">Date de début</label>
        <input type="date" name="date1">

        </p>
        <p>
            <label class="checkbox" for="Matin">Matin:</label>
            <input type="checkbox" name="Matin">
            <label class="checkbox" for="Aprem">Aprem:</label>
            <input type="checkbox" name="Aprem">
        </p>
 
            <label class="demande" for="datedefin">Date de fin:</label>
            <input type="date" name="date1">

        <p>
            <label class="checkbox" for="Matin">Matin:</label>
            <input type="checkbox" name="matin">
            <label class="checkbox" for="Aprem">Aprem:</label>
            <input type="checkbox" name="aprem">
        </p>
        <p>
            <label class="demande" for="typeconge">Types de congé:</label>

            <select name="selectType">
                <option value="congés payés">Congés payés</option>
                <option value="congé sans soldes">Congé sans soldes</option>
                <option value="congé Parental">Congé Parental</option>
                <option value="conge_maladie">Congés Maladie</option>
                <optgroup label="Absence injustifiée">
                    <option value="congés Maladie">CongésMaladie</option>
                    <option value="congé d'ordre familliale">Congé pour raison familliale</option>
                </optgroup>
                <option value="autre">Autres</option>
            </select>
        </p>
        <p>
            <label class="demande" for="infos">Informations complémentaires :</label>

            <textarea rows="4" cols="40" name="comment" id="ta"></textarea>

        </p>
        <div class="buttons">
            <input class="button" id="envoyer" type="submit" value="Envoyer">
            <input class="button" id="annuler" type="reset" value="Annuler">
        </div>
    </div>
    	<div class="logo"> <image src="logo.png" width='300' alt="Logo"> </div>
</form>

</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>




