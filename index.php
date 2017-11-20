<?php
    require_once "functions.php";
          if (isset($_POST["matricule"]) && isset ($_POST["password"])) {
            $matricule = sanitize($_POST["matricule"]);
            $password =sanitize($_POST["password"]);
            try
            {
                $query = $pdo->prepare("SELECT * FROM employes where matricule = :matricule" );
                $query->execute(array("matricule" => $matricule));
                $row = $query->fetch();
            }
            catch (Exception $exc) {
                     die($exc->getMessage()."Erreur lors de l'accès à la base de données.");
             }
            if ($query->rowCount()==0)
                $error = "L'utilisateur n'existe pas";
            else {
                if ($row["password"]==$password){
                    redirect("/formemploye.php?matricule=$matricule",303);
                }
                else 
                    $error = "mot de passe incorrect";
            }
          }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Intranet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styleslogin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="title">Intranet Banana's Corporation</div>
        <div class="menu">
        </div>
		
        <div class="main">
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <td>Matricule:</td>
                        <td><input id="matricule" name="matricule" type="varchar" value=""></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input id="password" name="password" type="password" value=""></td>
                    </tr>
                </table>
                <input type="submit" value="Log In">
            </form>
        </div>
            <?php 
            if (isset($error))
                echo "<div class='errors'><br><br>$error</div>";
            ?>
    </body>
	<div class="logo"> <image src="logo.png" width='300' alt="Logo"> </div>
	<footer>
    <?php include 'footer.php'; ?>
    </footer>
</html>
